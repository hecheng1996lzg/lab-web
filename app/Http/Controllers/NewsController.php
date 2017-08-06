<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Request;

class NewsController extends BaseController
{
    public function index($id){
        $dir = asset('');

        $new = News::find($id);
        $html = file_get_contents($dir.$new->news_path);
        return view('news',['content'=>$html,'new'=>$new]);
    }
}
