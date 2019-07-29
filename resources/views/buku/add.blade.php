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

            <form action="{{route('buku.store')}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="" value="">
                {{ csrf_field()}}
                <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nm" placeholder="Masukan nama buku" required class="form-control" required><br>
            </div>

        <div>
            <label>Kategori Id</label>
            <select name="kategori_id" class="form-control" required>
                    <option value="">-------</option>
                    @foreach($kategori as $kt)
                    <option value="{{$kt->id}}">{{ $kt->nama_kategori}}</option>
                    @endforeach
                  </select>
            </div>

            <div>
                <label>Stock</label>
                <input type="number" name="stck" placeholder="Masukan Stock" required class="form-control" required><br>
            </div>

            <div>
                <label>Keterangan</label>
                <input type="text" name="kt" placeholder="Masukan Keterangan Buku" required class="form-control" required><br>
            </div>

            <div>
                <label>cover</label>
                <input type="file" name="file" required class="form-control" required><br>
            </div>

            <div>
              <label>denda</label>
              <input type="number" name="ded" placeholder="Masukan denda buku" required class="form-control" required><br>
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
