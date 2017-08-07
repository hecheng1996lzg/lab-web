<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    //获取教师个人信息
    public function teacher() {
        $teachers = Teacher::all();
        
    }
}
