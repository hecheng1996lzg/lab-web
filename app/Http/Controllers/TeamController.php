<?php

namespace App\Http\Controllers;

use App\Student;
use App\Visitor;
use App\Teacher;
use Illuminate\Http\Request;



class TeamController extends Controller
{
    //获取教师个人信息
    public function team($type, $year = null) {
        switch ($type)
        {
            case "teacher": // 获取教师信息
                $teachers = Teacher::all()
                    ->toJson();
                return response()->json($teachers);
                break;
            case "student": // 获取学生信息
                if ($year == null) {
                    $curYear = date('Y');
                    $students = Student::where('adYear', $curYear)
                        ->get()
                        ->toJson();
                } else {
                    $students = Student::where('adYear', $year)
                        ->get()
                        ->toJson();
                }
                return response()->json($students);
                break;
            case "visitor": // 获取访学信息
                $visitors = Visitor::all()
                    ->toJson();
                return response()->json($visitors);
                break;
        }
    }
}
