@extends('layouts.master')
@section('content')
<div>
    <div class="col-md-6">
        <form action="" method="post" role="form">
        <table class="table">
            <tr>
                <td>Nama Resep</td>
                <td>:</td>
                <td><input type="text" class="form-control" name="nama" value="{{$resep->nama}}"></td>
            </tr>
        </table>
        <label for="">Bahan yang digunakan</label>
        <table>
            @foreach($bahans as $bahan)
            <tr>
                <td><input type="checkbox" name="bahan_ids[]" id="" value="{{$bahan->id}}">{{$bahan->nama}}</td>
            </tr>
            @endforeach
        </table>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <button class="btn btn-block">Submit</button>
        </form>
    </div>
</div>