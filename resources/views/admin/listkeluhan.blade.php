@extends('layouts_admin.app')

@section('contents')
<table class="table" border="1">
    <thead class="text-center">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Pelapor</th>
        <th scope="col">Judul Keluhan</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">Waktu Keluhan</th>
        <th scope="col">Tanggapan</th>
        <th scope="col">Perbaikan</th>
      </tr>
    </thead>
    <tbody class="text-center">
      @php
        $i = 1;
      @endphp
        @foreach ($keluhans as $keluhan)
        @if ($keluhan->is_delete==0)
        <tr>
          <td>
            {{ $i }}
            @php
              $i += 1;
            @endphp
          </td>
          <td>{{ $keluhan->users->nama}}</td>
          <td>{{ $keluhan->judul_keluhan }}</td>
          <td>{{ Str::limit($keluhan->keluhan_user), 150 }}</td>
          <td>{{ $keluhan->waktu_keluhan }}</td>
          <td>{{ Str::limit($keluhan->balasan_admin), 150 }}</td>
          <td>
            <div class="btn-group" role="group" aria-label="Basic example">
              <a type="button" class="btn btn-warning" href="{{ route('detaillaporan', $keluhan->id) }}">Detail</a>
              <a type="button" class="btn btn-success" href="{{ route('editlaporan', $keluhan->id) }}">Tanggapi</a>
            </div>
          </td>
        </tr>
        @endif
        @endforeach
    </tbody>
  </table>
@endsection