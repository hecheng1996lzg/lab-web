<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Teacher extends Model
{
    private $indexArr;
    private $yearLayout = '';
    private $photo_path = "assets\\images\\team\\teacher\\";
    private $contentLayout = '<li class="{{index}}">
                            <img src="{{photo}}" alt="">
                            <strong>{{name}}</strong>
                            <span>{{title}}</span>
                            <span>{{email}}</span>
                            <span><a href= " {{href}} ">个人主页</a></span>
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
            if (!strstr($content->photo, $this->photo_path))
                $content->photo = $this->photo_path . $content->photo;
            $row = str_replace('{{photo}}',$content->photo,$row);
            $row = str_replace('{{name}}',$content->name,$row);
            $row = str_replace('{{title}}',$content->title,$row);
            $row = str_replace('{{email}}',$content->email,$row);
            $row = str_replace('{{tel}}',$content->tel,$row);
            $row = str_replace('{{href}}',asset('teacher/'.$content->id),$row);
            $html.=$row;
        }
        return $html;
    }
}