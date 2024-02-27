@extends('dashboard.main')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>My Members</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Members</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">

                <div class="card-body">
                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible show fade"><i class="bi bi-check-circle"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif


                    {{-- <a href="/dashboard/posts/create" class="btn btn-primary mb-3" style="font-size: 12px">Create new post</a> --}}
                    <table class="table table-striped" id="table1" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Full Name</th>
                                <th>NIM</th>
                                <th>Study Program</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $post->name }}</td>
                                    <td>{{ $post->nim }}</td>
                                    <td>{{ $post->prodi }}</td>

                                    <td>
                                      
                            

                                        <form action="/dashboard/members/{{ $post->id }}" method="post" class="d-inline">
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
