<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Mobil</title>
    <style>
        .card {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarUsers')

    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif 
        <div class="mt-4"> 
            <section class="content"> 
                <br>
                <h4>Hasil Pencarian Mobil</h4>
                
                @foreach($hasil as $dataItem)
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <img src="{{ asset('fotoMobil/'. $dataItem->namaFileFoto)}}" class="card-img-top" alt="namaMobil">
                                <div class="card-body">
                                    <h5 class="card-title">{{$dataItem->getMobil->nama}} {{$dataItem->model}}</h5>
                                    <p class="card-text">Kapasitas:  {{$dataItem->kapasitasOrang}} penumpang</p>
                                    <p class="card-text">Transmisi {{$dataItem->transmisi}}</p>
                                    <p class="card-text">Mulai Dari Rp{{number_format($dataItem->harga_perHari, 0, ',', '.')}}/Hari</p>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('showMobilDetail', $dataItem->nomorPlat)}}" class="btn btn-primary">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
</body>
@include('template/footer')
</html>