@extends('layouts.app')

@section('content')
    <article id="show-post" class="pb-4">
        <main class="w-100 bg-dark">
            <img class="d-block mx-auto img-fluid" src="{{ Storage::url($post->picture) }}" style="max-height: 80vh;"
                 alt="{{ $post->title }}"/>
        </main>
        <div class="container">
            <main>
                <div id="post-description" class="py-4">
                    <header class="row mb-4">
                        <div class="col-6">
                            <div class="d-flex align-items-center">
                                <div class="mr-3">
                                    <img src="/avatar.png" alt="User Avatar" style="height: 60px;"
                                         class="rounded-circle">
                                </div>
                                <div>
                                    <h3 class="font-weight-bolder mb-1" style="letter-spacing: .5px;"
                                        id="post-title">{{ $post->title }}</h3>
                                    <div class="font-weight-bold text-black-50">
                                        <span class="d-inline-block mr-1">by {{ $post->author->name }}</span>
                                        &middot;
                                        <span
                                            class="d-inline-block ml-1">{{ $post->created_at->diffForHumans() }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="d-flex">
                                <div class="ml-auto d-flex">
                                    @auth
                                        <form
                                            action="{{ route('posts.'. ($post->isLikedBy(auth()->user()) ? 'un' : '') .'like', ['post' => $post->id]) }}"
                                            method="POST"
                                        >
                                            @csrf
                                            <button type="submit"
                                                    class="btn btn{{ $post->isLikedBy(auth()->user()) ? '' : '-outline' }}-primary px-3 mr-3 font-weight-bold rounded-pill d-flex align-items-center">
                                                <svg fill="none" stroke-linecap="round" stroke-linejoin="round"
                                                     stroke-width="2"
                                                     viewBox="0 0 24 24" stroke="currentColor" width="24" height="24"
                                                     class="mr-2">
                                                    <path
                                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                                </svg>
                                                {{ $post->isLikedBy(auth()->user()) ? 'Batal ' : ''}}Sukai
                                            </button>
                                        </form>
                                    @else
                                        <button type="button"
                                                class="btn btn-outline-primary px-3 mr-3 font-weight-bold rounded-pill d-flex align-items-center"
                                                data-toggle="modal" data-target="#ask-login-modal">
                                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round"
                                                 stroke-width="2"
                                                 viewBox="0 0 24 24" stroke="currentColor" width="24" height="24"
                                                 class="mr-2">
                                                <path
                                                    d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                            </svg>
                                            Sukai
                                        </button>
                                    @endauth

                                    <a
                                        href="#comment-section"
                                        class="d-block btn btn-outline-secondary px-3 font-weight-bold rounded-pill d-flex align-items-center"
                                    >
                                        <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                             viewBox="0 0 24 24" stroke="currentColor" width="24" height="24"
                                             class="mr-2">
                                            <path
                                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                                        </svg>
                                        Komentari
                                    </a>
                                    <div class="dropdown">
                                        <button
                                            class="btn btn-outline-secondary px-3 ml-3 font-weight-bold rounded-pill d-flex align-items-center"
                                            data-toggle="dropdown"
                                        >
                                            &middot; &middot; &middot;
                                        </button>
                                        <div class="dropdown-menu">
                                            @if(auth()->guest() || (auth()->check() && $post->author_id !== auth()->user()->id))
                                                <a class="dropdown-item" href="#!">Laporkan</a>
                                            @endif
                                            @if(auth()->check() && $post->author_id === auth()->user()->id)
                                                <a class="dropdown-item" href="#" id="edit-post" data-toggle="modal"
                                                   data-target="#update-post-modal">Edit</a>
                                                <a class="dropdown-item" href="#" id="delete-post" data-toggle="modal"
                                                   data-target="#delete-post-modal">Hapus</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <section class="mb-4">
                        <p
                            id="post-description"
                            data-has-description="{{ !is_null($post->description) }}"
                        >
                            {{ $post->description ?? 'Tidak ada deskripsi.' }}
                        </p>
                    </section>
                </div>

                <section id="comment-section">
                    <div class="py-3 border-top font-weight-bold">
                        <span class="text-dark">Komentar</span>
                        <span class="text-primary">{{ $post->comments->count() }}</span>
                    </div>
                    @auth
                        <form action="{{ route('posts.comment', ['post' => $post->id]) }}" method="POST">
                            @csrf
                            <div class="d-flex py-2 mb-2">
                                <div class="mr-2">
                                    <img src="/avatar.png" alt="User Avatar" style="height: 45px;"
                                         class="rounded-circle shadow-sm">
                                </div>
                                <div class="d-flex flex-column" style="flex: 1">
                                    <div class="p-3 mb-2 bg-white shadow-sm rounded" style="flex: 1;">
                                        <label for="create-comment" class="sr-only">Comment</label>
                                        <textarea class="form-control" id="create-comment" name="comment"
                                                  placeholder="Komentari karya ini..."></textarea>
                                    </div>
                                    <div class="ml-auto">
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @else
                        <div class="p-3 bg-white mb-2 shadow-sm">
                            <div>Silakan login terlebih dahulu untuk membuat komentar.</div>
                        </div>
                    @endauth

                    @foreach($post->comments as $comment)
                        <div class="d-flex py-2">
                            <div class="mr-2">
                                <img src="/avatar.png" alt="User Avatar" style="height: 45px;"
                                     class="rounded-circle shadow-sm">
                            </div>
                            <div class="p-3 bg-white shadow-sm rounded d-flex" style="flex: 1;">
                                <div>
                                    <h5 class="font-weight-bold mb-1">{{ $comment->author->name }}</h5>
                                    <p class="mb-0">
                                        {{ $comment->comment }}
                                    </p>
                                </div>
                                <div class="ml-auto">
                                    <span
                                        class="font-weight-bold text-black-50">{{ $comment->created_at->diffForHumans() }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </section>
            </main>
        </div>
    </article>
@endsection

@push('modals')
    @auth
        <div class="modal fade" id="update-post-modal" tabindex="-1" role="dialog">
            <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST"
                  class="modal-lg modal-dialog"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Karya</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="w-100">
                            <tr>
                                <td class="px-2 py-2" style="vertical-align: top;">
                                    <label for="upload-title" class="mb-0 pt-2">Judul</label>
                                </td>
                                <td class="px-2 py-2" style="vertical-align: top;">
                                    <input type="text" class="form-control" id="upload-title" name="title"
                                           value="{{ $post->title }}"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-2 py-2" style="vertical-align: top;">
                                    <label for="upload-description" class="mb-0 pt-2">Deskripsi</label>
                                </td>
                                <td class="px-2 py-2" style="vertical-align: top;">
                                    <textarea class="form-control" id="upload-description" name="description"
                                              rows="5">{{ $post->description }}</textarea>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary font-weight-bold" data-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-primary font-weight-bolder">
                            Update Karya
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <div class="modal fade" id="delete-post-modal" tabindex="-1" role="dialog">
            <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST"
                  class="modal-lg modal-dialog">
                @csrf
                @method('DELETE')

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Konfirmasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-1"><strong>Apakah kamu yakin ingin menghapus karya ini?</strong></p>
                        <p>Karya yang sudah dihapus tidak dapat dikembalikan lagi.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary font-weight-bold" data-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit" class="btn btn-danger font-weight-bolder">
                            Hapus
                        </button>
                    </div>
                </div>
            </form>
        </div>
    @endauth
@endpush
