<?php

namespace App\Http\Controllers;

use App\Article;
use App\Patent;
use App\Project;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    private $typeObject = ['App\Project','App\Article','App\Patent'];
    
    // 获取项目/论文/专利信息
    public function achivement(Request $request) {
        $index = $request->get('index');
        $response = [];
        $oneOfAchievement = new $this->typeObject[$index];
        $data = $oneOfAchievement->getHTML();
        //$data = "e";
        if($data){
            $response['status'] = 1;
            $response['content'] = $data;
        }else{
            $response['status'] = 2;
        }

        return json_encode($response);
    }
    
}
