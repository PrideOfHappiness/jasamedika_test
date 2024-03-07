<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Pinjam;
use Carbon\Carbon;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Auth;

class SewaController extends Controller
{
    public function index(){
        $data = Pinjam::where('userID', Auth::user()->userID)->where('status', 'Sedang Dipinjam')->get();
        return view('sewa.index', compact('data'));
    }

    public function prosesCari(Request $request){
        $startDate = Carbon::parse($request->input('dataAwal'));
        $endDate = Carbon::parse($request->input('dataAkhir'));
        //dd($startDate);
        //dd($endDate);

        $mobilTersedia = Mobil::where('status', 'Tersedia')
        ->whereNotIn('nomorPlat', function ($query) use ($startDate, $endDate) {
            $query->select('mobilID')
                ->from('pinjam_mobil')
                ->where(function ($q) use ($startDate, $endDate) {
                    $q->where('hariPinjam', '>=', $startDate)
                        ->where('hariPinjam', '<', $endDate);
                })->orWhere(function ($q) use ($startDate, $endDate) {
                    $q->where('hariSelesai', '>', $startDate)
                        ->where('hariSelesai', '<=', $endDate);
                });
        })->get();

        foreach ($mobilTersedia as $car) {
            $rentalDays = $endDate->diffInDays($startDate);
            $totalPrice = $rentalDays * $car->harga_perHari;
            $car->rentalDays = $rentalDays;
            $car->hargaTotal = $totalPrice;
        }

        return view('sewa.hasil', compact('startDate', 'endDate', 'mobilTersedia'));
    }

    public function store(Request $request){

        $car = Mobil::find($request->input('car_id'));
        $startDate = Carbon::parse($request->input('start_date'));
        $endDate = Carbon::parse($request->input('end_date'));
        $rentalDays = $endDate->diffInDays($startDate);
        $totalPrice = $rentalDays * $car->harga_perHari;

        Pinjam::create([
            'pinjamID' => Str::random(10), 
            'mobilID' => $car->nomorPlat, 
            'userID' => Auth::user()->userID,
            'lamaHariPinjam' => $rentalDays, 
            'totalBayar'=> $totalPrice, 
            'status' => 'Sedang Dipinjam',
            'hariPinjam' => $startDate,
            'hariSelesai' => $endDate,
        ]);

        if($car){
            $car->status = 'Sedang Disewakan';
            $car->save();
        }

        return redirect()->route('sewa.index')->with('success', 'Data sewa berhasil disimpan!');
    }
}
