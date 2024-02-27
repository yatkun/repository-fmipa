@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
            <main class="form-signin">
                <h1 class="h3 mb-3 fw-normal text-center">Please login</h1>
                <form action="/login" method="post">
                    @csrf
                    <div class="form-floating">
                        <input type="text" class="form-control rounded-top @error('nim') is-invalid @enderror" id="nim" placeholder="NIM"
                            name="nim" autofocus required value="{{ old('nim') }}">
                        <label for="floatingInput">NIM</label>
                        @error('nim')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control rounded-bottom" id="password"
                            placeholder="Password" name="password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>

                </form>
                <small class="d-block text-center mt-3">Not registered ?<a href="/register">Register now !</a></small>
            </main>
        </div>
    </div>
@endsection
