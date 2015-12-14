@extends('layouts.master')
@section('content')
<div>
    <table class="table table-striped">
        <thead>
            <tr>
				<th>Id</th>
				<th>Nama</th>
				<th>Kode</th>
				<!--<th>Nama Koki</th>-->
                <th>Aksi</th>
            </tr>
        </thead>
			<tbody>
			@foreach ($items as $item)
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
				<!--<td>
					{{	$item->koki->nama	}}
				</td>-->
				<td>
					<a href="{{url('resep/update/'.$item->id)}}">Update Resep</a>
					<a href="{{url('resep/delete/'.$item->id)}}">Delete Resep</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
    <div>
        <a style="margin-left: 640px;" href="resep/create" class="btn btn-info" role="button">Tambah</a>
    </div>
</div>

@stop