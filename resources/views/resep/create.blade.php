<div>
	<!--<form method="post" role="form">
		<div>
			{{	csrf_field()	}}
			<label>Nama</label>
			<input type="text" name="nama" />
		</div>
		<div>
			<label>Kode</label>
			<input type="text" name="kode" />
		</div>
		<div>
			<label>Nama Koki</label>
			<select name="koki_id">

			</select>
		</div>
		<button type="submit">Tambah</button>
	</form>-->
    <div class="col-md-6">
		<form action="" method="post" role="form">
		<table class="table">
			<tr>
				<td>Nama Resep</td>
				<td>:</td>
				<td><input type="text" class="form-control" name="nama"></td>
			</tr>
		</table>
		<label for="">Bahan yang digunakan</label>
		<table>
			@foreach($bahans as $bahan)
			<tr>
				<!--<td><input type="checkbox" name="bahan_ids[]" id="">{{$bahan->nama}}</td>-->
                <td><input type="checkbox" name="bahan_ids[]" id="" value="{{$bahan->id}}">{{$bahan->nama}}</td>
			</tr>
			@endforeach
			<tr>
				<td>
					<select name="koki_id" id="" class="form-control">
					@foreach($kokis as $koki)
					<option value="{{$koki->id}}">{{$koki->nama}}</option>
					@endforeach
				</select>
				</td>
			</tr>
		</table>
		{{csrf_field()}}
		<button class="btn btn-block">Submit</button>
		</form>
    </div>
</div>