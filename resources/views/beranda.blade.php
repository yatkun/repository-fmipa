{{-- @dd($posts) --}}

@extends('layouts.main')
@section('content')
    {{-- hero --}}
    <div class="hero row align-items-center">
        
        <div class="col-md-12">
            
            {{-- <img src="{{ asset('assets/images/hero.jpeg') }}" alt=""> --}}
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('assets/images/hero.jpeg') }}" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('assets/images/hero2.jpg') }}" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('assets/images/hero3.jpg') }}" alt="Third slide">
                  </div>
                </div>
               <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
              </div>
        </div>
    </div>

  

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="/" method="get">
                <div class="input-group mb-4 mt-2">
                    <input type="text" class="form-control" placeholder="Search..." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">



        <div class="col-md-8">
          <div class="start mb-5">
            <h2 class="border-bottom mb-3"style="color: #55076b">Welcome to Repository FMIPA Unsulbar</h2>
          
            <div class="welcome">
            <p>Faculty of Mathematics and Natural Sciences Thesis Repository collects, stores, disseminates, and provides access for student research at the Faculty of Mathematics and Natural Sciences, University of West Sulawesi</p>
          </div>
          </div>
          <h2 class="border-bottom mb-3"style="color: #55076b">Recently Added</h2>

          
        
            @forelse ($posts as $post)
                <div class="col-md-12">
                    <article class="mb-3 border-bottom ">
                        <h2 class="title"><a href="/posts/{{ $post['id'] }}" style="text-decoration: none;">
                                {{ $post['title'] }}</a>
                        </h2>
                        <h5 class="author">{{ $post['author1'] }} | {{ $post['author2'] }} | {{ $post['author3'] }}</h5>
                        <p class="abstract">{{ $post['excerpt'] }}</p>
                    </article>
                </div>
            @empty
                <div class="">
                    <p style="text-align: center">Result not found..</p>
                </div>
            @endforelse
        </div>

        <div class="col-md-4">
            <ul class="list-group mb-3">
                <li
                    class="list-group-item d-flex justify-content-between align-items-center list-group-item-primary bg-navi">
                    Collections
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Skripsi Matematika
                    <span class="badge bg-primary rounded-pill">{{ $matematika }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Skripsi Statistika
                    <span class="badge bg-primary rounded-pill">{{ $statistika }}</span>
                </li>
            </ul>


        </div>
    </div>


    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
@endsection
