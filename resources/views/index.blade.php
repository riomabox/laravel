@extends('layouts.master')
@section('content')
		<div>
			<div>
				<a href="bahan/create">Tambah</a>
			</div>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nama</th>
						<th>Kode</th>
						<th>Aksi</th>
					</tr>
				</thead>
			<tbody>
			@foreach ($bahan as $item)
			<tr>
				<td>
					{{$item->id}}
				</td>
				<td>
					{{$item->nama}}
				</td>
				<td>
					{{$item->kode}}
				</td>
				<td>
					<a href="bahan/update/{{$item['id']}}">Ubah</a>
					<a href="bahan/delete/{{$item['id']}}">Hapus</a>
					

				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@stop