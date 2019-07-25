@extends('navbar.app')
@section('content')
<!DOCTYPE html>
<html>
<head>
	<title>Member</title>
	<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>
<body>

	<div class="container"><br>
	<h3>Member List</h3>
	<hr>
		<div class="row">
			<div class="col-md-4">

			</div>

			<div class="col-md-4">

			</div>

			<div class="col-md-4">
				<button class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
					+ Add Data Member
				</button><br><br>
			</div>
		</div>

		<table class="table">
		<tr>

			<th>Nama</th>
			<th>Alamat</th>
			<th>Tanggal Lahir</th>
			<th>Nomor HP</th>
			<th>Opsi</th>
		</tr>

		@foreach($member as $mb)
		<tr>
			<td><a href="{{ route('member.show', $mb->id)}}">{{$mb -> username}}</a></td>
			<td>{{ $mb -> alamat}}</td>
			<td>{{ $mb -> tanggal_lahir}}</td>
			<td>{{ $mb->no_hp}}</td>
			<td>
				<form class="" action="{{route('member.destroy', $mb->id)}}" method="post">
              		<a class="btn btn-primary" href="{{route('member.edit', $mb->id)}}">Edit</a>
    		          {{csrf_field()}}
    		          {{method_field('DELETE')}}
    		          <button type="submit" class="btn btn-danger">delete</button>
    		        </form>
			</td>
		</tr>
		@endforeach
		</table>
	</div>

<div class="modal fade" id="exampleModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">
					Tambah Data
				</h5>
			</div>

			<div class="modal-body">
				<form action="{{route('member.store')}}" method="post">
					{{ csrf_field()}}
					<div class="form-group">
						<label>Nama Member</label>
						<input type="text" name="nm" class="form-control" required>
					</div>

					<div class="form-group">
						<label>Alamat</label>
						<input type="text" name="alt" class="form-control" required>
					</div>

					<div class="form-group">
						<label>No HP</label>
						<input type="number" name="hp" class="form-control" required>
					</div>

					<div class="form-group">
						<label>Tanggal Lahir</label>
						<input type="date" name="tgl" class="form-control" required>
					</div>

					<div class="form-group">
						<button type="button" class="btn btn-danger"
					data-dismiss="modal">Batal</button>
						<button class="btn btn-primary" type="submit">Submit</button>
					</div>
				</form>

				<div class="model-footer">

				</div>
			</div>
		</div>
	</div>
</div>




</div>
</body>
</html>
@endsection
