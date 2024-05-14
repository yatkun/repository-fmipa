@extends('dashboard.main')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" />
@endsection

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Create New Post</h3>
                    <p class="text-subtitle text-muted"></p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/dashboard/posts">Posts</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>


        <section class="section">
            <div class="card">

                <div class="card-body">
                    <form id="identifier" action="/dashboard/posts" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Title</label>
                                        <textarea class="form-control @error('title') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3"
                                            name="title" autofocus required>{{ old('title') }}</textarea>
                                    </div>

                                </div>
                                <div class="col-12">
                                    {{-- <div id="snow" >
                                    <input type="hidden" id="quill_html" name="abstract"></input>
                                </div> --}}
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Abstract</label>
                                        {{-- <textarea
                                            class="form-control @error('abstract') 
                                    is-invalid
                                    @enderror"
                                            id="exampleFormControlTextarea1" rows="6" name="abstract" required>{{ old('abstract') }}</textarea> --}}
                                            <div id="toolbar-container">
                                                <span class="ql-formats">
                                                    <select class="ql-font"></select>
                                                    <select class="ql-size"></select>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-bold"></button>
                                                    <button class="ql-italic"></button>
                                                    <button class="ql-underline"></button>
                                                    <button class="ql-strike"></button>
                                                </span>
                                                <span class="ql-formats">
                                                    <select class="ql-color"></select>
                                                    <select class="ql-background"></select>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-script" value="sub"></button>
                                                    <button class="ql-script" value="super"></button>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-header" value="1"></button>
                                                    <button class="ql-header" value="2"></button>
                                                    <button class="ql-blockquote"></button>
                                                    <button class="ql-code-block"></button>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-list" value="ordered"></button>
                                                    <button class="ql-list" value="bullet"></button>
                                                    <button class="ql-indent" value="-1"></button>
                                                    <button class="ql-indent" value="+1"></button>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-direction" value="rtl"></button>
                                                    <select class="ql-align"></select>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-link"></button>
                                                    <button class="ql-image"></button>
                                                    <button class="ql-video"></button>
                                                    <button class="ql-formula"></button>
                                                </span>
                                                <span class="ql-formats">
                                                    <button class="ql-clean"></button>
                                                </span>
                                            </div>
                                            <div id="editor" name="abstract">
                                            </div>
                                            <textarea style="display:none" id="hiddenArea" name="abstract"></textarea>
                                    
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
                                                    value="{{ old('author1') }}" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                            <div class="position-relative">
                                                <input type="text"
                                                    class="form-control @error('author2') is-invalid @enderror"
                                                    placeholder="Second Author" id="first-name-icon" name="author2"
                                                    value="{{ old('author2') }}" required>
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                            <div class="position-relative">
                                                <input type="text"
                                                    class="form-control rounded-bottom @error('author3') is-invalid @enderror"
                                                    placeholder="Third Author" id="first-name-icon" name="author3"
                                                    value="{{ old('author3') }}" required>
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
                                            <option value="Matematika">Matematika</option>
                                            <option value="Statistika">Statistika</option>

                                        </select>
                                    </fieldset>
                                </div>
                                {{-- <div class="col-12 mt-3">
                                    <label for="doc" class="form-label">Document (.pdf)</label>
                                    <input class="form-control form-control-sm @error('skripsi') 
                                    is-invalid
                                    @enderror"" id="doc" type="file" name="skripsi">
                                    @error('skripsi')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div> --}}

                                <div class="col-12 mt-3">
                                    <label for="doc" class="form-label">Link dokumen</label>
                                    <input
                                        class="form-control form-control-sm @error('skripsi') 
                                    is-invalid
                                    @enderror""
                                        id="doc" type="text" name="skripsi">
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

@section('js')
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.1/dist/quill.js"></script>
    <script>
        const quill = new Quill('#editor', {
            modules: {
                syntax: true,
                toolbar: '#toolbar-container',
            },
            placeholder: 'Isi abstract disini...',
            theme: 'snow',
        })

        $("#identifier").on("submit", function() {
            $("#hiddenArea").val($("#editor .ql-editor").html());

        })
    </script>
@endsection
