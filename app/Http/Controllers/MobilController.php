<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\merkMobil;
use App\Models\Mobil;

class MobilController extends Controller
{
    public function index(){
        $data = Mobil::all();  
        return view('mobil.index', compact('data'));
    }

    public function indexUsers(){
        $data = Mobil::all();
        $dataMobil = merkMobil::all();
        return view('mobil.indexUsers', compact('data', 'dataMobil'));
    }

    public function create(){
        $data = merkMobil::all();
        return view('mobil.create', compact('data'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'nopol' => 'required|min:2|max:9',
            'manaMerk' => 'required',
            'namaModel' => 'required',
            'jenisBodi' => 'required',
            'mesin' => 'required',
            'kapasitas' => 'required|integer',
            'transmisi' => 'required',
            'harga' => 'required',
            'fotoPlatNomor' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $nopol = $request->input('nopol');
        $namaMerk = $request->input('manaMerk');
        $model = $request->input('namaModel');
        $kapasitas = $request->input('kapasitas');
        $jenisBodi = $request->input('jenisBodi');
        $mesin = $request->input('mesin');
        $transmisi = $request->input('transmisi');
        $hargaPerHari = $request->input('harga');

        if($request->hasFile('fotoPlatNomor')){
            $file = $request->file('fotoPlatNomor');
            $nama = $file->getClientOriginalName();
            $file->move('fotoMobil/', $nama);

            Mobil::create([
                'nomorPlat' => $nopol,
                'mobilID' => $namaMerk,
                'model' => $model,
                'mesin' => $mesin,
                'jenis_bodi' => $jenisBodi,
                'kapasitasOrang' => $kapasitas,
                'transmisi' => $transmisi,
                'harga_perHari' => $hargaPerHari,
                'status' => 'Tersedia',
                'namaFileFoto' => $nama,
            ]);
            
            return redirect()->route('mobil.index')
            ->with('success', 'Data berhasil ditambahkan!');
        }else{
            return redirect()->route('mobil.index')
            ->with('error', 'Foto mobil tidak tersedia!');
        }
    }

    public function show($id){
        $dataItem = Mobil::find($id);
        return view('mobil.showAdmin', compact('dataItem'));
    }

    public function showUsers($id){
        $dataItem = Mobil::find($id);
        return view('mobil.showUsers', compact('dataItem'));
    }

    public function cari(Request $request){
        $merk = $request->input('kategori');
        $model = $request->input('namaModel');
        $status = $request->input('status');

        $hasil = Mobil::where('mobilID', $merk)->orWhere('model', $model)->orWhere('status', $status)->get();

        return view('mobil.hasil', compact('hasil'));
    }
}
