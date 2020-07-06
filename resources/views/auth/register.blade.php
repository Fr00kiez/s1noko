@extends('layouts.blank')

@section('content')
    <div class="h-100 d-flex align-items-center justify-content-center">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <header class="mb-4 text-center">
                <h1 class="font-weight-bold mb-2" style="letter-spacing: -1px;">Gabung ke S1Noko</h1>
                <h5 class="font-weight-bold text-black-50" style="letter-spacing: -0.5px;">
                    Sudah mempunyai akun? <a href="{{ route('login') }}">Login di sini</a>
                </h5>
            </header>

            <main class="py-3 mb-2">
                <div class="form-group">
                    <label for="name" class="text-black-50 font-weight-bolder" style="font-size: 0.75rem;">NAMA</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="text-black-50 font-weight-bolder" style="font-size: 0.75rem;">ALAMAT EMAIL</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="text-black-50 font-weight-bolder" style="font-size: 0.75rem;">PASSWORD</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="text-black-50 font-weight-bolder" style="font-size: 0.75rem;">KONFIRMASI PASSWORD</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </main>

            <div class="form-group mb-0">
                <button type="submit" class="btn btn-primary w-100 font-weight-bold py-2">
                    <span class="d-inline-block py-1">DAFTAR</span>
                </button>
            </div>
        </form>
    </div>
@endsection
