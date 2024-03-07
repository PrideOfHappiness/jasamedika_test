<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Peminjaman Mobil</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    <div class="container">
        <div class="mt-2"> 
            <section class="content"> 
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <form action="{{ route('pengembalian.store') }}" method="post" enctype="multipart/form-data"> 
                    @csrf
                    <input type="hidden" name="userID" value="{{$hasil->userID}}">
                    <input type="hidden" name="pinjamID" value="{{$hasil->pinjamID}}">
                    <div class="mb-3">
                        <label for="nopol" class="form-label">Nomor Polisi</label>
                        <input type="text" name="nopol" id="nopol" class="form-control" value="{{$hasil->mobilIDs->nomorPlat}}">
                    </div>
                    <div class="mb-3">
                        <label for="manaMerk" class="form-label">Nama Mobil</label>
                        <input type="text" name="manaMerk" id="manaMerk" class="form-control" value="{{ $hasil->mobilIDs->getMobil->nama}} {{ $hasil->mobilIDs->model}}">
                    </div>
                    <div class="mb-3">
                        <label for="jenisBodi" class="form-label">Lama Hari Pinjam (dalam Hari)</label>
                        <input type="text" name="lamaSewa" id="lamaSewa" class="form-control" value="{{$hasil->lamaHariPinjam}}">
                    </div>
                    <div class="mb-3">
                        <label for="totalBayar" class="form-label">Total Bayar</label>
                        <input type="text" name="totalBayar" id="totalBayar" class="form-control" value="{{number_format($hasil->totalBayar, 0, ',', '.')}}">
                    </div>
                    <div class="mb-3">
                        <label for="jumlahBayar" class="form-label">Jumlah Bayar</label>
                        <input type="number" name="jumlahBayar" id="jumlahBayar" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Unggah Data</button>
                </form>
            </section>
        </div>
    </div>
</body>
@include('template/footer')
</html>