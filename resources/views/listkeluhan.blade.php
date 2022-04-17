@extends('layouts.app')

@section('contents')
<a type="button" class="btn btn-danger btn-lg mb-2" href="{{ route('keluhan-new') }}">Sampaikan Laporan</a>

<table class="table" border="1">
    <thead class="text-center">
      <tr>
        <th scope="col">No</th>
        <th scope="col">Judul Keluhan</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">Waktu Keluhan</th>
        <th scope="col">Tanggapan</th>
        <th scope="col">Perbaikan</th>
      </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($keluhans as $keluhan)
        @if ($keluhan->user_id==\Auth::user()->id && $keluhan->is_delete==0)
        <tr>
          <td>{{ $loop->iteration}}</td>
          <td>{{ $keluhan->judul_keluhan }}</td>
          <td>{{ Str::limit($keluhan->keluhan_user)}}</td>
          <td>{{ $keluhan->waktu_keluhan }}</td>
          <td>{{ Str::limit($keluhan->balasan_admin) }}</td>
          <td>
            <form action="{{ route('keluhan-delete', $keluhan->id) }}" method="POST" onsubmit="return confirm('Yakin menghapus data ini?')">
              @csrf
              <div class="btn-group" role="group" aria-label="Basic example">
                <a type="button" class="btn btn-warning" href="{{ route('keluhan-detail', $keluhan->id)  }}">Detail</a>
                <a type="button" class="btn btn-success" href="{{ route('keluhan-edit', $keluhan->id) }}">Edit</a>
                <button type="submit" class="btn btn-danger">Hapus</button>
              </div>
            </form>
          </td>
        </tr>
        @endif
        @endforeach
    </tbody>
  </table>
@endsection