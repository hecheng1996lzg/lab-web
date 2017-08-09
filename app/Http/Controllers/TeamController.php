<?php

namespace App\Http\Controllers;

use App\Student;
use App\Visitor;
use App\Teacher;
use Illuminate\Http\Request;



class TeamController extends Controller
{

    private $index = ['index-2','index-1','index-3'];

    private $typeObject = ['App\Teacher','App\Student','App\Visitor'];

    //获取教师/学生/访学信息
    public function team(Request $request) {
        $type = $request->get('type');
        $year = $request->get('year');

        $response = [];

        $team = new $this->typeObject[$type-1];
        $data = $team->getHtml($year,$this->index);
        if($data){
            $response['status'] = 1;
            $response['data']['year'] = $data['year'];
            $response['data']['content'] = $data['content'];
        }else{
            $response['status'] = 2;
        }

        return json_encode($response);
    }

}
