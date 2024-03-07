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
                <h4>Mobil Yang Tersedia</h4>
                <br>
                @php
                    $count = 0;
                @endphp
                @foreach($mobilTersedia as $dataItem)
                    @php
                        $count++;
                    @endphp
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <img src="{{ asset('fotoMobil/'. $dataItem->namaFileFoto)}}" class="card-img-top" alt="namaMobil">
                                <div class="card-body">
                                    <h5 class="card-title">{{$dataItem->getMobil->nama}} {{$dataItem->model}}</h5>
                                    <p class="card-text">Mesin:  {{$dataItem->mesin}}</p>
                                    <p class="card-text">Kapasitas:  {{$dataItem->kapasitasOrang}} penumpang</p>
                                    <p class="card-text">Transmisi {{$dataItem->transmisi}}</p>
                                    <p class="card-text">Harga Total: Rp{{number_format($dataItem->hargaTotal, 0, ',', '.')}} untuk {{$dataItem->rentalDays}} Hari sewa</p>
                                </div>
                                <div class="card-footer">
                                    <form action="{{ route('sewa.storeSewa') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="car_id" value="{{ $dataItem->nomorPlat }}">
                                        <input type="hidden" name="start_date" value="{{ $startDate }}">
                                        <input type="hidden" name="end_date" value="{{ $endDate }}">
                                        <button type="submit" class="btn btn-success">Sewa Mobil</button>
                                    </form>
                                    
                                </div>
                            </div>
                            @if($count % 3 == 0)
                            <br>
                            @endif
                        </div>
                    </div>
                @endforeach
</body>
@include('template/footer')
</html>