@extends('layouts.app')

@section('contents')

<br>
<h2 style="text-align: center"> <b>Apa itu LAPOR?</b></h2><br>
<p style="text-align: justify">LAPOR! adalah layanan penyampaian semua pengaduan, keluhan, keresahan masyarakat Desa Konoha. LAPOR! ini dibentuk agar para pemimpin Konoha Gakure dapat mengelola keluhan dari masyarakat secara sederhana, cepat, tepat, tuntas, dan terkoordinasi dengan baik dan meningkatkan kualitas pelayanan publik. Ini merupakan salah satu solusi dari Hokage Naruto untuk mengintegrasikan sistem pengelolaan pengaduan masyarakat dalam satu pintu.</p>

<p style="text-align: center"> Sampaikan laporan Anda langsung kepada Hokage Desa Konoha!</p>

@auth
<center><a type="button" class="btn btn-danger" href="{{ route('keluhan-new') }}">Sampaikan Laporan</a></center>
@endauth
<br><br><br>

<h6 style="text-align: center">"Berani LAPOR! Untuk Konoha yang Lebih Baik"
</h6>

@endsection