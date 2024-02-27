<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        // dd(request('search'));

        $posts = Post::latest();

 
        if(request('search')){
            $posts->where('title', 'like', '%' . request('search'). '%')
                ->orWhere('abstract', 'like', '%' . request('search'). '%')
                ->orWhere('author1', 'like', '%' . request('search'). '%')
                ->orWhere('author2', 'like', '%' . request('search'). '%')
                ->orWhere('author3', 'like', '%' . request('search'). '%')
                ;
        }

        return view('beranda', [
            "title" => "Home",
            "posts" => $posts->paginate(10)->withQueryString(),
            'matematika' => Post::where('category', 'Matematika')->count(),
            'statistika' => Post::where('category', 'Statistika')->count(),
        ]);
    }

    public function show($id){
        return view('post',[
            "title" => "",
            "post" => Post::find($id)
        ]);
    }

}
