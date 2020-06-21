@extends('layouts.app')

@section('content')
    <section id="search" class="py-4 text-light" style="background-color: #1D1F22;">
        <div class="container py-3">
            <p
                class="text-center font-weight-bold mx-auto mb-4"
                style="font-size: 36px; letter-spacing: -1px; line-height: 1.25;"
            >
                Nikmati keindahan berbagai karya<br />
                di manapun, kapanpun.
            </p>
            <form class="form-inline pt-2 mx-auto my-lg-0">
                @csrf
                <input style="background: #FFFFFF;" border-radius=620px
                class="form-control mr-sm-2" type="search" 
                placeholder="Cari Foto dan Gambar">
            </form>
        </div>
    </section>

    <section id="content" style="background-color: #282C31;">
        <div class="text-center">
            <ul id="content-tabs" class="nav nav-tabs" style="border-bottom: 2px solid #1D1F22;">
                <li class="nav-item ml-auto">
                    <a href="{{ route('index') }}" class="nav-link active py-3">Beranda</a>
                </li>
                <li class="nav-item">
                    <a href="/discover" class="nav-link py-3">Jelajahi</a>
                </li>
                <li class="nav-item">
                    <a href="/favorites" class="nav-link py-3">Favorit</a>
                </li>
                <li class="nav-item mr-auto">
                    <a href="/leaderboards" class="nav-link py-3">Papan Peringkat</a>
                </li>
            </ul>
        </div>
    </section>
@endsection