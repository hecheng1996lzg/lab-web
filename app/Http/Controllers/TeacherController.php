<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function homepage($id) {
        $teacher = Teacher::find($id);
        
        return view('teacher',["teacher"=>$teacher]);
    }
}
