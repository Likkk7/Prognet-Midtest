@extends('layouts_admin.app')

@section('contents')

<br>
<h2 style="text-align: left"> <b>LAPOR!</b></h2>
<p style="text-align: justify">LAPOR! adalah layanan penyampaian semua pengaduan, keluhan, keresahan masyarakat Desa Konoha. LAPOR! ini dibentuk agar para pemimpin Konoha Gakure dapat mengelola keluhan dari masyarakat secara sederhana, cepat, tepat, tuntas, dan terkoordinasi dengan baik dan meningkatkan kualitas pelayanan publik.
</p>
<p style="text-align: justify">Kelola dengan benar semua laporan yang diterima!
</p>
<div class="mb-4" id="tombol">
    <a type="button" class="btn btn-danger" href="{{ route('laporan-list') }}">Periksa Laporan</a>
</div>
@endsection