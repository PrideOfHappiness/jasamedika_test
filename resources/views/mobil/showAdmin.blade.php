<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Dashboard Admin</title>
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
                    <div class="mb-3">
                        <label for="nopol" class="form-label">Nomor Polisi</label>
                        <input type="text" name="nopol" id="nopol" class="form-control" value="{{$dataItem->nomorPlat}}">
                    </div>
                    <div class="mb-3">
                        <label for="manaMerk" class="form-label">Nama Mobil</label>
                        <input type="text" name="manaMerk" id="manaMerk" class="form-control" value="{{ $dataItem->getMobil->nama}} {{ $dataItem->model}}">
                    </div>
                    <div class="mb-3">
                        <label for="jenisBodi" class="form-label">Jenis Bodi</label>
                        <input type="text" name="manaMerk" id="manaMerk" class="form-control" value="{{ $dataItem->jenis_bodi }}">
                    </div>
                    <div class="mb-3">
                        <label for="jenisBodi" class="form-label">Mesin</label>
                        <input type="text" name="manaMerk" id="manaMerk" class="form-control" value="{{ $dataItem->mesin }}">
                    </div>
                    <div class="mb-3">
                        <label for="kapasitas" class="form-label">Kapasitas Orang di dalam Kendaraan</label>
                        <input type="text" name="kapasitas" id="kapasitas" class="form-control" value="{{ $dataItem->kapasitasOrang }} orang">
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Transmisi</label>
                        <input type="text" name="kapasitas" id="kapasitas" class="form-control" value="{{ $dataItem->transmisi }}">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Sewa per Hari</label>
                        <input type="text" name="harga" id="harga" class="form-control" value="Rp{{number_format($dataItem->harga_perHari,0,',','.')}}">
                    </div>
                    <div class="mb-3">
                        <label for="fotoPlatNomor" class="form-label">Foto Mobil</label>
                        <img width="150px" src="{{ asset('fotoMobil/'. $dataItem->namaFileFoto) }}" alt="Gambar Plat Nomor">
                    </div>
            </section>
        </div>
    </div>
</body>
@include('template/footer')
</html>