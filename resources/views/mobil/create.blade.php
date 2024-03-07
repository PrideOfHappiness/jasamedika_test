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
                <form action={{ route('mobil.store') }} method="post" enctype="multipart/form-data"> 
                    @csrf
                    <div class="mb-3">
                        <label for="nopol" class="form-label">Nomor Polisi</label>
                        <input type="text" name="nopol" id="nopol" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="manaMerk" class="form-label">Brand</label>
                        <select name="manaMerk" id="manaMerk" class="form-control select2-multiple">
                            <option value="">Silahkan pilih brand mobil terlebih dahulu!</option>
                            @foreach($data as $neg)
                                <option value="{{$neg->merkID}}"> {{ $neg->nama }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="namaModel" class="form-label">Nama Model</label>
                        <input type="text" name="namaModel" id="namaModel" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="jenisBodi" class="form-label">Jenis Bodi</label>
                        <select name="jenisBodi" id="jenisBodi" class="form-control select2-multiple">
                            <option value="">Silahkan pilih jenis bodi terlebih dahulu!</option>
                            <option value="Sedan">Sedan</option>
                            <option value="Hatchback">City car/Hatchback</option>
                            <option value="MPV">MPV/Minibus</option>
                            <option value="SUV">SUV</option>
                            <option value="Pickup">Pickup</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="mesin" class="form-label">Mesin</label>
                        <select name="mesin" id="mesin" class="form-control select2-multiple">
                            <option value="">Silahkan pilih transmisi terlebih dahulu!</option>
                            <option value="Bensin">Bensin</option>
                            <option value="Diesel">Solar</option>
                            <option value="Listrik">Listrik</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kapasitas" class="form-label">Kapasitas Orang di dalam Kendaraan</label>
                        <input type="number" name="kapasitas" id="kapasitas" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Transmisi</label>
                        <select name="transmisi" id="transmisi" class="form-control select2-multiple">
                            <option value="">Silahkan pilih transmisi terlebih dahulu!</option>
                            <option value="Manual">Transmisi Manual</option>
                            <option value="Otomatis">Transmisi Otomatis</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Sewa per Hari</label>
                        <input type="number" name="harga" id="harga" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="fotoPlatNomor" class="form-label">Foto Mobil</label>
                        <input type="file" class="form-control" id="fotoPlatNomor" name="fotoPlatNomor" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Unggah Data</button>
                </form>
            </section>
        </div>
    </div>
</body>
@include('template/footer')
</html>