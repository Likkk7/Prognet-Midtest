@extends('layouts_admin.app')

@section('contents')
<div class="mb-3" id="tombol">
    <a type="button" class="btn btn-danger" href="{{ route('laporan-list') }}">Kembali</a>
</div>

<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Judul Keluhan</label>
    <input type="text" class="form-control" id="name" value="{{ $keluhan->judul_keluhan }}" readonly>
</div>

<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly>{{ $keluhan->keluhan_user }}</textarea>
</div>

<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Waktu Keluhan</label>
    <input type="text" class="form-control" id="description" value="{{ $keluhan->waktu_keluhan }}" readonly>
</div>

<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Tanggapan</label>
    <input type="text" class="form-control" id="description" value="{{ $keluhan->balasan_admin }}" readonly>
</div>

@endsection