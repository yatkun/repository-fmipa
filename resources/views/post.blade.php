{{-- @dd($post) --}}

@extends('layouts.main')



@section('content')
    <article>

        <div class="row">
            <div class="col">
                <h2 class="title" style="font-size: 30px !important">{{ $post['title'] }}</h2>
                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <h6 style="color: #6B074E">Author</h6>
                            <h6 class="author">{{ $post['author1'] }}</h6>
                            <h6 class="author">{{ $post['author2'] }}</h6>
                            <h6 class="author">{{ $post['author3'] }}</h6>
                        </div>
                        {{-- <div class="mb-3">
                            <h6 style="color: #6B074E">Published</h6>
                            <p class="author">{{ $post->created_at->format('d M Y') }}</p>
                        </div> --}}
                    </div>
                    <div class="col">
                        <h6 style="color: #6B074E">Abstract</h6>
                        <p class="abstract" style="font-size: 14px !important">{!! $post['abstract'] !!}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                {{-- <div class="mb-3">
                    <h6 style="color: #6B074E">View/Open</h6>
                    <a href="/download/{{ $post->id }}" style="text-decoration: none; font-size:14px" ><i class="bi bi-file-earmark-lock2"></i> Full text</a>
                </div> --}}
                <div class="mb-3">
                    <h6 style="color: #6B074E">View/Open</h6>
                    @auth
        <a href="{{ $post->skripsi }}" style="text-decoration: none; font-size:14px"><i class="bi bi-file-earmark-lock2"></i> Full text</a>
    @else
        <span style="font-size: 14px; color: red;">Login untuk akses file !</span>
    @endauth
                
                </div>
                <div class="mb-3">
                    <h6 style="color: #6B074E">URL</h6>
                    <a href="/posts/{{ $post->id }}" style="text-decoration: none; font-size:14px" >{{ url()->current() }}</a>
                </div>
            </div>
            
        </div>

    </article>

    <a href="/">Back to home</a>
@endsection

