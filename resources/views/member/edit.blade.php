@extends('navbar.app')
@section('content')
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="{{asset('/css/app.css')}}">
</head>
<body>

	<div class="container">
		<br><h3>Edit data member</h3>
		<hr>

	<form action="{{route('member.update', $member->id)}}" method="post">
		{{csrf_field()}}

		<input type="hidden"  name="_method" value="PUT">


		<label>ID member </label>
		<input class="form-control"  type="text" name="id" readonly="true" value="{{$member->id}}" required> <br>

		<label>Nama Member </label>
		<input class="form-control"  type="text" name="nm" value="{{$member->username}}" required> <br>

		<label>Alamat </label>
		<input class="form-control"  type="text" name="alt" value="{{$member->alamat}}" required> <br>

		<label>Kontak</label>
		<input maxlength="13" class="form-control"  type="text" name="hp" value="{{$member->no_hp}}" required> <br>

		<label>Tanggal Lahir</label>
		<input class="form-control"  type="date" name="tgl" value="{{$member->tanggal_lahir}}" required> <br>




		<button type="submit" class="btn btn-primary">Simpan</button>
		<a href="{{route('member.index')}}" class="btn btn-warning">Kembali</a>
	</form>
	</div>

</body>
</html>
@endsection
