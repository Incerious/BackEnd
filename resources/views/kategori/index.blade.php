@extends('navbar.app')
@section('content')
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Kategori</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
  </head>
  <body>

    <div class="container">
      <br> <h3>Trimitra Marvel</h3>
      <hr>
      <div class="row">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-4">

        </div>
        <div class="col-sm-4">
          <a href="{{route('kategori.create')}}"
          class="btn btn-primary" style="float: right"
          >+ Add Kategori</a>
          <label style="float:right">|</label>
          <a href="{{route('buku.create')}}"
          class="btn btn-primary float-right"
          >+ Add Buku</a><br><br>
        </div>
      </div>

      <div>
        <table class="table">
          <tr>
            <th>Nama Kategori</th>
            <th>Di Buat</th>
            <th>Di Update</th>
            <th>Opsi</th>
          </tr>

          @foreach($kategori as $kt)
          <tr>
            <td>{{ $kt->nama_kategori}}</td>
            <td>{{ $kt->created_at}}</td>
            <td>{{ $kt->updated_at}}</td>
            <td>
              <form class="" action="{{route('kategori.destroy', $kt->id)}}" method="post">
              		<a class="btn btn-primary" href="{{route('kategori.edit', $kt->id)}}">Edit</a>
    		          {{csrf_field()}}
    		          {{method_field('DELETE')}}
    		          <button type="submit" class="btn btn-danger">delete</button>
    		        </form>
            </td>
          </tr>
          @endforeach
        </table>

      </div>
    </div>


  </body>
</html>
@endsection
