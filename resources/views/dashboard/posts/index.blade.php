@extends('dashboard.main')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>My Repository</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Posts</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section" style="font-size: 12px">
            <div class="card">

                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible show fade"><i class="bi bi-check-circle"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif


                    <a href="/dashboard/posts/create" class="btn btn-primary mb-3" style="font-size: 12px">Create new post</a>
                    <table class="table table-striped" id="table1" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Author</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->author1 }}</td>

                                    <td>
                                        <a href="/posts/{{ $post->id }}" class="badge bg-info" target="_blank">lihat</a>
                                        <a href="/dashboard/posts/{{ $post->id }}/edit" class="badge bg-warning">edit</a>

                                        <form action="/dashboard/posts/{{ $post->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0" onclick="return confirm('are you sure ?')">hapus</button>
                                        </form>
                                        
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection
