@extends('layouts.blank')

@section('content')
    <div class="h-100 d-flex align-items-center justify-content-center">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <header class="mb-4 text-center">
                <h1 class="font-weight-bold mb-2" style="letter-spacing: -1px;">Masuk ke S1Noko</h1>
                <h5 class="font-weight-bold text-black-50" style="letter-spacing: -0.5px;">
                    Belum mempunyai akun? <a href="{{ route('register') }}">Daftar Sekarang</a>
                </h5>
            </header>

            <main class="py-3 mb-2">
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
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            Ingat Saya
                        </label>
                    </div>
                </div>
            </main>

            <div class="form-group mb-0">
                <button type="submit" class="btn btn-primary w-100 font-weight-bold py-2">
                    <span class="d-inline-block py-1">MASUK</span>
                </button>

{{--                @if (Route::has('password.request'))--}}
{{--                    <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                        {{ __('Forgot Your Password?') }}--}}
{{--                    </a>--}}
{{--                @endif--}}
            </div>
        </form>
    </div>
@endsection
