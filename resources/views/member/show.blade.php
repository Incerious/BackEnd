 @extends('navbar.app')
@section('content')

<div class="row">
	<div class="col-md-12">
		<h2>Detail Member</h2>
		<a class="btn btn-warning" href="{{ route('member.index')}}">
			<strong>
				~(=w= ~)
			</strong>
		</a>

		<button class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
			Peminjaman Buku
		</button>
	</div>
</div>

<hr>
<h5>ID Member : {{$member->id}}</h5>
<h5>Nama Member : {{$member->username}}</h5>
<h5>Tanggal Lahir : {{$member->tanggal_lahir}}</h5>
<h5>Kontak : {{$member->no_hp}}</h5>
<h5>Dibuat Pada : {{$member->created_at}}</h5>

	<table class="table">
		<tr>
			<th>ID Buku</th>
			<th>Nama Buku</th>
			<th>Jumlah</th>
			<th>Tanggal</th>
			<th>Opsi</th>
		</tr>

		@foreach($peminjaman as $pem)
		<tr>


			<td>{{ $pem->buku->id }}</td>
			<td>{{ $pem->buku->nama_buku}}</td>
			<td>{{ $pem->qty}}</td>
			<td>{{$pem->created_at}}</td>
			<td>

            <form action="{{route('peminjaman.destroy', $pem->id)}}" method="post">

              	<div>
              		<input type="hidden" name="pinjaman_id" value="{{$pem->id}}">
              		<input type="hidden" name="admin_id" value="{{$pem->admin_id}}">
              		<input type="hidden" name="member_id" value="{{$member->id}}">
              		<input type="hidden" name="buku_id" value="{{$pem->buku->id}}">
              		<input type="hidden" name="qty" value="{{$pem->qty}}">


					{{csrf_field()}}
    		        {{method_field('DELETE')}}
					<button type="submit" class="btn btn-secondary">Kembalikan Buku</button><br>


				</div>
            </form>

				<!--  -->

				<!--  -->

				<div class="modal fade" id="exampleModal1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">
					Kembalikan buku ini ?
				</h5>
				<hr>
				<!-- <input type="text" name="bid" value="{{$pem->buku->buku_id}}"> -->

			</div>

			<div class="modal-body">
				<form action="{{route('pengembalian.store', $pem->id)}}" method="post">

					<input type="hidden" name="peminjaman_id" value="{{$pem->id}}">
					{{ csrf_field()}}



					<div class="form-group">
						<button type="button" class="btn btn-warning"
					data-dismiss="modal">Batal</button>
						<button class="btn btn-primary" type="submit">Kembalikan</button>
					</div>
				</form>

				<div class="model-footer">

				</div>
			</div>
		</div>
	</div>
</div>


    			<!--  -->
			</td>
		</tr>
		@endforeach
	</table>

<div class="modal fade" id="exampleModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">
					Tambah Data peminjaman Buku
				</h5>
			</div>

			<div class="modal-body">
				<form action="{{route('peminjaman.store')}}" method="post">

					<input type="hidden" name="admin_id" value="{{Auth::user()->id}}">

					<input type="hidden" name="member_id" value="{{ $member->id}}">

					{{ csrf_field()}}

					<div class="form-group">
						<label>Nama Buku</label>
						<select name="buku_id" class="form-control" required>
							<option value="">Pilih</option>
							@foreach($buku as $bu)
							<option value="{{ $bu->id}}">{{ $bu->nama_buku}}</option>
							@endforeach
						</select>
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





@endsection
