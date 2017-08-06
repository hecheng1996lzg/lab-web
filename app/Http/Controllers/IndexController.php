<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $news = News::all();
        return view('index',['news'=>$news]);
    }

    public function test($id){
        $dir = asset('');

        $new = News::find($id);
        $html = file_get_contents($dir.$new->news_path);
        return view('news',['content'=>$html,'new'=>$new]);

    }
}
