@extends('navbar.app')
@section('content')

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>List Data Pengembalian Buku</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
  </head>
  <body>
    <div class="container">
        <br>
      <div class="row">
      <h5>Pengembalian Data</h5>
        <hr>
        <div class="col-md-4">

  			</div>

  			<div class="col-md-4">

  			</div>

  			<div class="col-md-4">
  			</div>
  		</div>

        <table class="table">
          <tr>
            <th>Nama Member</th>
            <th>Nama buku</th>
            <th>Nama Pengurus</th>
            <th>qty</th>
            <th>Tanggal Pengembalian</th>
          </tr>

          @foreach($pengembalian as $pem)
          <tr>
            <td>{{$pem->member->username}}</td>
            <td>{{$pem->buku->nama_buku}}</td>
            <td>{{$pem->user->name}}</td>
            <td>{{$pem->qty}}</td>
            <td>{{$pem->created_at}}</td>
          </tr>
          @endforeach
        </table>

      </div>
    </div>

  </body>
</html>
@endsection
