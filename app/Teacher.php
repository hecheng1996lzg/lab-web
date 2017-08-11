<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    private $indexArr;

    private $yearLayout = '';

    private $contentLayout = '<li class="{{index}}">
                            <img src="{{photo}}" alt="">
                            <strong>姓名：{{name}}</strong>
                            <span>职务：{{title}}</span>
                            <span>邮箱：{{email}}</span>
                            <span>电话：{{tel}}</span>
                            <span>个人主页：<a href="#">www.baidu.com</a></span>
                            </li>';

    public function getHtml($year=null){
        $year = $year? $year:date('Y');

        $contents = $this->all();
        $contentHtml = $this->getContentHtml($contents);

        return ['content'=>$contentHtml,
            'year'=>''];
    }

    private function getContentHtml($contents){
        $html = '';
        foreach ($contents as $key=>$content){
            $row = $this->contentLayout;
            $row = str_replace('{{index}}','index-'.($key+1),$row);
            $row = str_replace('{{photo}}',$content->photo,$row);
            $row = str_replace('{{name}}',$content->name,$row);
            $row = str_replace('{{title}}',$content->title,$row);
            $row = str_replace('{{email}}',$content->email,$row);
            $row = str_replace('{{tel}}',$content->tel,$row);
            $html.=$row;
        }
        return $html;
    }
}
