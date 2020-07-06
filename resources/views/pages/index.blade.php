@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <header class="text-light banner-section">
        <div class="section-container py-4">
            <div class="container py-4">
                <p
                    class="text-center font-weight-bold mx-auto mb-4"
                    style="font-size: 36px; letter-spacing: -1px; line-height: 1.25;"
                >
                    Nikmati keindahan berbagai karya<br/>
                    di manapun, kapanpun.
                </p>
                <form id="search-form" class="d-flex form py-2">
                    @csrf
                    <div class="search-container">
                        <label class="sr-only" for="search-input">Search</label>
                        <input id="search-input" class="form-control" type="search"
                               placeholder="Cari Foto dan Gambar">
                        <button type="submit" class="btn btn-primary font-weight-bold">
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </header>

    <section id="content" style="background-color: #e9f0f5; flex: 1;">
        <nav class="text-center bg-white">
            <ul id="content-tabs" class="nav nav-tabs">
                <li class="nav-item ml-auto">
                    <a href="#!" class="nav-link active py-3">Beranda</a>
                </li>
                <li class="nav-item">
                    <a href="#!" class="nav-link py-3">Jelajahi</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('favorites') }}" class="nav-link py-3">Favorit</a>
                </li>
                <li class="nav-item mr-auto">
                    <a href="#!" class="nav-link py-3">Papan Peringkat</a>
                </li>
            </ul>
        </nav>
        <main class="container py-5">
            @if (count($posts) == 0)
                <div class="text-center py-5">
                    Belum ada karya. Mulai mengunggah!
                </div>
            @else
                <div class="row">
                    @foreach($posts as $postCol)
                        <div class="col-12 col-md-6 col-lg-3">
                            @foreach($postCol as $post)
                                <a
                                    class="d-block mb-4 shadow rounded-lg overflow-hidden"
                                    href="{{ route('posts.show', ['post' => $post->id]) }}"
                                >
                                    <img class="img-fluid w-100" src="{{ Storage::url($post->picture) }}"
                                         alt="{{ $post->title }}" style="max-height: 350px;"/>
                                </a>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            @endif
        </main>
    </section>
@endsection
