@extends('mahasiswas.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left mt-2">
                <br><br>
                <center>
                    <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2><br>  
                </center>
            </div>
            <form class="form-left my-4" method="get" action="{{ route('search') }}">
                <div class="form-group w-80 mb-3">
                    <input type="text" name="search" class="form-control w-50 d-inline" id="search" placeholder="Search">
                    <button type="submit" class="btn btn-primary mb-1">Cari</button>
                    <a class="btn btn-success" href="{{ route('mahasiswas.create') }}" style="margin-left:9cm"> Input Mahasiswa</a>
                </div>
            </form>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    
    <table class="table table-bordered">
        <tr>
            <th>Email</th>
            <th>Nim</th>
            <th>Nama</th>
            <th>Foto</th>
            <th>Tanggal Lahir</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>No_Handphone</th>
            <th width="225px">Action</th>
        </tr>
        @foreach ($mahasiswas as $Mahasiswa)
        <tr>
            <td>{{ $Mahasiswa->Email}}</td>
            <td>{{ $Mahasiswa->Nim }}</td>
            <td>{{ $Mahasiswa->Nama }}</td>
            <td>
                <img src="{{ asset('storage/' . $Mahasiswa->featured_image) }}" alt="image" style="width: 100px">
            </td>
            <td>{{ $Mahasiswa->Tanggal_Lahir}}</td>
            <td>{{ $Mahasiswa->kelas->nama_kelas}}</td>
            <td>{{ $Mahasiswa->Jurusan }}</td>
            <td>{{ $Mahasiswa->No_Handphone }}</td>
            <td>
                <form action="{{ route('mahasiswas.destroy',$Mahasiswa->Nim) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('mahasiswas.show',$Mahasiswa->Nim) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('mahasiswas.edit',$Mahasiswa->Nim) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <a class="btn btn-warning" href="/mahasiswas/nilai/{{ $Mahasiswa->Nim }}">Nilai</a>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $mahasiswas->withQueryString()->links('pagination::bootstrap-5') !!}
@endsection