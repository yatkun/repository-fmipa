<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::all(),
            'title' => 'Posts'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'title' => 'Posts'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {

        $validatedData = $request->validate(
            [
                'title' => 'required',
                'author1' => 'required',
                'author2' => 'required',
                'author3' => 'required',
                'abstract' => 'required',
                'category' => 'required',
                'skripsi' => 'required|mimes:pdf|max:5120'
            ]
        );
        $t = time();

        $fileName = $validatedData['author1'];
        $extension = pathinfo($validatedData['skripsi']->getClientOriginalName(), PATHINFO_EXTENSION);
        $fullFileName = $fileName . "-" . date("Ymdhms", $t) . ".$extension";


        $validatedData['skripsi'] = $request->file('skripsi')->storeAs('public/post-skripsi', $fullFileName);

        $validatedData['excerpt'] = Str::limit(strip_tags($request->abstract), 225);
        $Save = Post::create($validatedData);
        
        return redirect('/dashboard/posts')->with('success', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'title' => 'Posts'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate(
            [
                'title' => 'required',
                'author1' => 'required',
                'author2' => 'required',
                'author3' => 'required',
                'abstract' => 'required',
                'category' => 'required',
            ]
        );

        // $t = time();

        // $fileName = $validatedData['author1'];
        // $extension = pathinfo($validatedData['skripsi']->getClientOriginalName(), PATHINFO_EXTENSION);
        // $fullFileName = $fileName . "-" . date("Ymdhms", $t) . ".$extension";
        

        // $validatedData['skripsi'] = $request->file('skripsi')->storeAs('post-skripsi', $fullFileName);
       

        // if ($image = $request->file('skripsi')) {
        //     $t = time();
        //     $fileName = $validatedData['author1'];
        //     // $extension = pathinfo($validatedData['skripsi']->getClientOriginalName(), PATHINFO_EXTENSION);
        //     // $file = storage_path('app/public').'/'. $post->skripsi;
        //     $destinationPath = storage_path('app/public').'/post-skripsi';
        //      $fullFileName = $fileName . "-" . date("Ymdhms", $t) . '.'.$image->getClientOriginalExtension();
        //     $image->move($destinationPath, $fullFileName);
        //     $validatedData['skripsi'] = "$fullFileName";
          
        // }else{
        //     unset($validatedData['skripsi']);
        // }

        if (request()->hasFile('skripsi') && request('skripsi') != '') {
            $imagePath = storage_path('app/public/'.$post->skripsi);
    
            if(Storage::exists($imagePath)){
           
                unlink($imagePath);
            }
            $t = time();

            $fileName = $validatedData['author1'];
          
            $fullFileName = $fileName . "-" . date("Ymdhms", $t) . ".pdf";

            $validatedData['skripsi'] = $request->file('skripsi')->storeAs('public/post-skripsi', $fullFileName);
            // $image = request()->file('skripsi')->store('uploads', 'public');
            // $validatedData['skripsi'] = $image;
         
        }
        $validatedData['excerpt'] = Str::limit(strip_tags($request->abstract), 225);

        

        Post::where('id', $post->id)->update($validatedData);

        return redirect('/dashboard/posts')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::findOrFail($id);

        $image_path = public_path() .'/storage' .'/' . $post->skripsi;
        // dd($image_path);
        if (file_exists($image_path)) // check if the image indeed exists
            unlink($image_path);
        $post->delete();

        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
    }
}
