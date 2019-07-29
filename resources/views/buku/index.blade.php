@extends('navbar.app')
@section('content')

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>List Buku</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
  </head>
  <body>
    <div class="container">
      <br> <h3>List Buku</h3>
      <hr>
      <div class="row">
        <div class="col-md-4">

        </div>

        <div class="col-md-4">

        </div>

        <div class="col-md-4">
          <a href="{{route('buku.create')}}" class="btn btn-primary float-right">+ Add Buku</a>
          <br><br>
        </div>
      </div>

      <table class="table">
        <tr>
          <th>Cover</th>
          <th>Nama</th>
          <th>Kategori</th>
          <th>Jumlah</th>
          <th>keterangan</th>
          <th>Denda</th>
          <th>Opsi</th>
        </tr>

        @foreach($buku as $bu)
        <tr>
          <td><img width="150px" src="{{ url('/img/'.$bu->cover) }}"</td>
          <td>{{ $bu->nama_buku}}</td>
          <td>{{ $bu->kategori->nama_kategori}}</td>
          <td>{{ $bu->qty}}</td>
          <td>{{ $bu->keterangan}}</td>
          <td>{{ $bu->denda}}</td>
          <td>
    			    <form class="" action="{{route('buku.destroy', $bu->id)}}" method="post">
              		<a class="btn btn-primary" href="{{route('buku.edit', $bu->id)}}">Edit</a>
    		          {{csrf_field()}}
    		          {{method_field('DELETE')}}
    		          <button type="submit" class="btn btn-danger">delete</button>
    		        </form>

    			</td>
        </tr>
        @endforeach
      </table>
    </div>
  </body>
</html>
@endsection
