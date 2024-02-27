@extends('layouts.main')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-4">

            
            <main class="form-registration">
                <h1 class="h3 mb-3 fw-normal text-center">Please Registration</h1>
                <form action="/register" method="post">
                    @csrf
                    <div class="form-floating">
                        <input type="text" class="form-control rounded-top @error('name')is-invalid @enderror"
                            id="name" placeholder="name" name="name" value="{{ old('name') }}" required>
                        <label for="floatingInput">Full Name</label>
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                   
                    <div class="form-floating">
                        <input type="text" class="form-control @error('nim')is-invalid @enderror" id="nim"
                            placeholder="nim" name="nim" value="{{ old('nim') }}" required>
                        <label for="floatingInput">NIM</label>
                        @error('nim')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="prodi">
                      
                          <option value="Statistika">Statistika</option>
                          <option value="Matematika">Matematika</option>
                        </select>
                        <label for="floatingSelect">Study Program</label>
                      </div>
                    <div class="form-floating">
                        <input type="password" class="form-control rounded-bottom @error('password')is-invalid @enderror"
                            id="password" placeholder="Password" name="password" required>
                        <label for="floatingPassword">Password</label>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>

                </form>
                <small class="d-block text-center mt-3">Already registered?<a href="/login"> Login !</a></small>
            </main>
        </div>
    </div>
@endsection
