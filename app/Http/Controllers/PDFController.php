<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function view($id)
    {
        $post = Post::find($id);

        if ($post->skripsi == null){
            return 'adssadas';
        }
        $file = storage_path('app/public').'/'. $post->skripsi;
        $url = asset('storage/' . $post->skripsi);
  
        if (file_exists($file)) {

            $headers = [
                'Content-Type' => 'application/pdf'
            ];

            $name = $post->auhtor1;
            return response()->download($file, $name ,$headers, 'inline');
            // return response()->download($file, 'Test File', $headers, 'inline');
        }

        return 'Data tidak tersedia';
        
    }
}
