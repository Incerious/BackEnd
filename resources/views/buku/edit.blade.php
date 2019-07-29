@extends('navbar.app')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br><h2>Tambah Buku</h2>
            <hr>

            <form action="{{route('buku.update', $buku->id)}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field()}}
                <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nm" required class="form-control" value="{{ $buku->nama_buku}}" required><br>
            </div>

        <div>
            <label>Kategori Id</label>
            <select name="kategori_id" class="form-control" required>
                    <option value="{{ $buku->kategori->id}}">{{ $buku->kategori->nama_kategori}}"</option>
                    <option>------</option>
                    @foreach($kategori as $kt)
                    <option value="{{$kt->id}}">{{ $kt->nama_kategori}}</option>
                    @endforeach
                  </select>
            </div>

            <div>
                <label>Stock</label>
                <input type="number" name="stck" required class="form-control" value="{{ $buku->qty}}" required><br>
            </div>

            <div>
                <label>Keterangan</label>
                <input type="text" name="kt" required class="form-control" value="{{ $buku->keterangan}}" required><br>
            </div>

            <div>
                <label>cover</label>
                <input type="file" name="file" required class="form-control" required><br>
            </div>

            <div>
              <label>denda</label>
              <input type="number" name="ded" required class="form-control" value="{{ $buku->denda}}" required><br>
            </div>

        </div>

        <div class="col-md-4">
            <br><input type="submit" value="Simpan Data" class="btn btn-primary">
            <a class="btn btn-danger" href="{{route('buku.index')}}"> Kembali</a>
        </div>

        <div class="col-md-4">

        </div>
        </form>
    </div>
</div>

</body>
</html>









@endsection
