@extends('layouts.app')

@section('contents')
<div class="row justify-content-center">
    <div class="col-lg-6">
        <main class="form-login">
            <h1 class="h3 mb-2 mt-3 fw-normal text-center"> <b>Pendaftaran</b></h1>
            <p class="mb-4 fw-normal text-center">Isi data dibawah dengan benar ya!</p>
                <form action="{{ route('pelaporan-simpan-tamu') }}" method="POST" enctype="multipart/form-data">
                    
                    @csrf
                    @foreach ($formdata as $key=>$value)
                    @if ($value[0]=='select')
                        <div class="form-floating mb-1">
                            <select type="{{ $key }}"  name="{{ $key }}" class="form-select @error($key) is-invalid @enderror" aria-label="Default select example">
                                <option selected disabled><label for="floatingInput">{{ $value[1] }}</label></option>
                                @foreach ($value[2] as $index=>$value)
                                    <option value="{{ $value }}">{{ $value }}<br></option> 
                                @endforeach
                            </select>
                            @error($key)
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    @endif

                    @if ($value[0]=='text')
                    <div class="form-floating mb-1">
                        <input type="{{ $value[0] }}" class="form-control @error($key) is-invalid @enderror" name="{{ $key }}" id="floatingInput" placeholder="{{ $value[1] }}" value="{{ old($key) }}">
                        <label for="floatingInput">{{ $value[1] }}</label>
                        @error($key)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    @endif
                
                    @if ($value[0]=='password')
                    <div class="form-floating mb-1">
                        <input type="{{ $value[0] }}" class="form-control @error($key) is-invalid @enderror" name="{{ $key }}" id="floatingInput" placeholder="{{ $value[1] }}">
                        <label for="floatingInput">{{ $value[1] }}</label>
                        @error($key)
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    @endif
                    @endforeach

                    <div class="mt-3 mb-2 d-grid gap-2" id="tombol">
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                    <small class="d-block mt-3 fw-normal text-center">Sudah punya akun? <a href="{{ route("pelaporan-login") }}">Masuk disini</a></small>
                </form>
            </main>
        </div>
    </div>
@endsection