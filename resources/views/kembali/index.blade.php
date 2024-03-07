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
                <form action="{{ route('kembali.cekData') }}" method="POST">
                    @csrf
                    <label for="cekData" class="form-label">Pilih pengguna</label>
                    <select name="users" id="users" class="form-control select2-multiple">
                        <option value="">Silahkan pilih pengguna terlebih dahulu!</option>
                        @foreach($data as $neg)
                            <option value="{{$neg->userID}}"> {{ $neg->name }} </option>
                        @endforeach
                    </select>
                    <br>
                    <button type="submit" class="btn btn-primary">Cari Data</button>
                </form>
            </section>
        </div>
    </div>
</body>
@include('template/footer')
</html>