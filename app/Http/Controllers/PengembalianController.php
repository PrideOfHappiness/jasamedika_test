<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengembalian;
use App\Models\Pinjam;
use App\Models\User;
use App\Models\Mobil;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PengembalianController extends Controller
{
    public function index(){
        $data = User::where('status', 'Users')->get();
        return view('kembali.index', compact('data'));
    }

    public function cekData(Request $request){
        $data = $request->input('users');

        $hasil = Pinjam::where('userID', $data)->where('status', 'Sedang Dipinjam')->get();
        return view('kembali.hasil', compact('hasil'));
    }

    public function create(Request $request){
        $pinjam = $request->input('car_id');
        $hasil = Pinjam::find($pinjam);

        if(!$hasil){
            return redirect()->back()->with('error','Data pinjaman tidak ditemukan.');
        }
        return view('kembali.create', compact('hasil'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'userID' => 'required',
            'pinjamID' => 'required',
            'nopol' => 'required',
            'lamaSewa' => 'required',
            'totalBayar' => 'required',
            'jumlahBayar' => 'required',
        ]);

        $nopol = $request->input('nopol');
        $lamaSewa = $request->input('lamaSewa');
        $userIDs = $request->input('userID');
        $pinjamIDs = $request->input('pinjamID');
        $total = (integer) $request->input('totalBayar');
        $jumlahBayar = $request->input('jumlahBayar');

        if($jumlahBayar >= $total){
            $kembali = $jumlahBayar - $total;
            Pengembalian::create([
                'kembaliID' => Str::random(10),
                'pinjamID' => $pinjamIDs, 
                'mobilID' => $nopol, 
                'userID' => $userIDs,
                'lamaHariPinjam' => $lamaSewa, 
                'totalBayar' => $jumlahBayar, 
                'status' => 'Sudah Dibayar',
                'waktuPengembalian' => Carbon::now(),
            ]);

            $mobil = Mobil::find($nopol);
            $pinjam = Pinjam::find($pinjamIDs);
            if($mobil){
                $mobil->Status = 'Tersedia';
                $mobil->save();
            }

            if($pinjam){
                $pinjam->Status = 'Tersedia';
                $pinjam->save();
            }

            return redirect()->route('pengembalian.index')->with('success','Data pengembalian berhasil dicatat. Jumlah kembalian yang perlu diserahkan : ' . $kembali . ' .');
        }else{
            return redirect()->route('pengembalian.create')->with('error','Jumlah uang kurang!');
        }
    }
}
