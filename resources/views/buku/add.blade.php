<div class="modal fade" id="exampleModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">
					Tambah Buku
				</h5>
			</div>
			<div class="modal-body">
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
    			<input type="file" name="file" placeholder="Masukan Harga Jual" required class="form-control" required><br>
    		</div>

        <div>
          <label>denda</label>
          <input type="number" name="ded" placeholder="Masukan deda buku" required class="form-control" required><br>
        </div>




    		<br><input type="submit" value="Simpan Data" class="btn btn-primary">
    		<a class="btn btn-danger" href="{{route('buku.index')}}"> Kembali</a>
			</div>
			</form>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
			</div>
		</div>
	</div>
</div>
