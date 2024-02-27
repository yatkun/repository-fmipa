@extends('dashboard.main')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Edit Post</h3>
                    <p class="text-subtitle text-muted"></p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/dashboard/posts">Posts</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>


        <section class="section">
            <div class="card">

                <div class="card-body">
                    <form action="/dashboard/posts/{{ $post->id }}" method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Title</label>
                                        <textarea class="form-control @error('title') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3"
                                            name="title" autofocus required>{{ old('title',  $post->title) }}</textarea>
                                    </div>

                                </div>
                                <div class="col-12">
                                    {{-- <div id="snow" >
                                    <input type="hidden" id="quill_html" name="abstract"></input>
                                </div> --}}
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Abstract</label>
                                        <textarea
                                            class="form-control @error('abstract') 
                                    is-invalid
                                    @enderror"
                                            id="exampleFormControlTextarea1" rows="6" name="abstract" required>{{ old('abstract', $post->abstract)  }}</textarea>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="col-12">
                                    <main class="author-input">
                                        <div class="form-group has-icon-left">
                                            <label for="exampleFormControlTextarea1" class="form-label">Author</label>
                                            <div class="position-relative">
                                                <input type="text"
                                                    class="form-control rounded-top @error('author1') is-invalid @enderror"
                                                    placeholder="First Author" id="first-name-icon" name="author1"
                                                    value="{{ old('author1', $post->author1) }}" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                            <div class="position-relative">
                                                <input type="text"
                                                    class="form-control @error('author2') is-invalid @enderror"
                                                    placeholder="Second Author" id="first-name-icon" name="author2"
                                                    value="{{ old('author2', $post->author2)  }}" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                            <div class="position-relative">
                                                <input type="text"
                                                    class="form-control rounded-bottom @error('author3') is-invalid @enderror"
                                                    placeholder="Third Author" id="first-name-icon" name="author3"
                                                    value="{{ old('author3', $post->author3)  }}" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </main>
                                </div>
                                <div class="col-12">
                                    Category
                                    <fieldset class="form-group">
                                        <select class="form-select" id="basicSelect" name="category">
                                            <option value="Statistika">Statistika</option>
                                            <option value="Matematika">Matematika</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-12 mt-3">
                                    <label for="doc" class="form-label">Update Document (.pdf)</label>
                                    <input class="form-control form-control-sm @error('skripsi') 
                                    is-invalid
                                    @enderror" id="doc" type="file" name="skripsi" value="{{ $post->skripsi }}">
                                    @error('skripsi')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>



                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>


            </div>
        </section>
    </div>
@endsection
