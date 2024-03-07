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
        <h4>Inventori Mobil</h4>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif 
        <div class="mt-4"> 
            <section class="content"> 
                <br>
                <form action="{{ route('sewa.showMobil') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="tanggal">Tanggal Mulai Sewa</label>
                        <div class="input-group date" id="dataAwal" data-target-input="nearest">
                            <input type="date" class="form-control datepicker-input" name="dataAwal" data-target="#dataAwal"/>
                            <div class="input-group-append" data-target="#dataAwal" data-toggle="datetimepicker">
                                <div class="input-group-text">
                                    <i class="fa fa-calendar"> </i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal">Tanggal Akhir Sewa</label>
                        <div class="input-group date" id="dataAwal" data-target-input="nearest">
                            <input type="date" class="form-control datepicker-input" name="dataAkhir" data-target="#dataAkhir"/>
                            <div class="input-group-append" data-target="#dataAkhir" data-toggle="datetimepicker">
                                <div class="input-group-text">
                                    <i class="fa fa-calendar"> </i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" class=>Cek Ketersediaan</button>
                </form>
                <br>
                <h4>Daftar Mobil Yang Sedang Disewa oleh {{ auth()->user()->name }}</h4>
                @foreach($data as $dataItem)
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <img src="{{ asset('fotoMobil/'. $dataItem->mobilIDs->namaFileFoto)}}" class="card-img-top" alt="namaMobil">
                                <div class="card-body">
                                    <h5 class="card-title">{{$dataItem->mobilIDs->getMobil->nama}} {{$dataItem->mobilIDs->model}} - 
                                        Nomor Polisi: {{substr($dataItem->mobilIDs->nomorPlat, 0, 1) .' '. substr($dataItem->mobilIDs->nomorPlat, 1, 4)
                                    .' '. substr($dataItem->mobilIDs->nomorPlat, 5)}}</h5>
                                    <p class="card-text">Bermesin {{$dataItem->mobilIDs->mesin}}</p>
                                    <p class="card-text">Kapasitas:  {{$dataItem->mobilIDs->kapasitasOrang}} penumpang</p>
                                    <p class="card-text">Transmisi {{$dataItem->mobilIDs->transmisi}}</p>
                                    <p class="card-text">Harga Sewa: Rp{{number_format($dataItem->totalBayar, 0, ',', '.')}} untuk {{$dataItem->lamaHariPinjam}} hari</p>
                                </div>
                                <div class="card-footer">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </section>
        </div>
    </div>
</body>
@include('template/footer')
</html>