<?php

namespace App\Http\Controllers;

use App\News;
use App\Teacher;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $news = News::paginate(11);

        $teacher = new Teacher();
        $teams = $teacher->getHtml();

        return view('index',['news'=>$news,'teams'=>$teams]);
    }

    public function test($id){
        $dir = asset('');

        $new = News::find($id);
        $html = file_get_contents($dir.$new->news_path);
        return view('news',['content'=>$html,'new'=>$new]);

    }
}
