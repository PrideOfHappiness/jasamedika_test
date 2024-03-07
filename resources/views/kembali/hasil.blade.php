<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Ruangan</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>   
         </div>
        @endif 
        @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif 
        <div class="mt-4"> 
            <section class="content"> 
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>User ID</th>
                            <th>Nama</th>
                            <th>Mobil yang Dipinjam</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i = 1 @endphp
                        @foreach ($hasil as $user)
                            <tr>
                                <td>{{ $i++}}</td>
                                <td>{{ $user->userID }}</td>
                                <td>{{ $user->pinjams->name }}</td>
                                <td>{{ $user->mobilIDs->getMobil->nama .' ' . $user->mobilIDs->model }}</td>
                                <td>{{ $user->status }}</td>
                                <td></td>
                                <td>
                                    <form action = "{{ route('kembali.create', $user->ruangID) }}" method="Post">
                                            @csrf
                                            <input type="hidden" name="car_id" value="{{ $user->pinjamID }}">
                                            <button type="submit" class="btn btn-success">Kembalikan Mobil</button>
                                        </form>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>