<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    private $indexArr;

    private $yearLayout = '';

    private $contentLayout = '<li class="{{index}}">
                            <img src="{{photo}}" alt="">
                            <strong>姓名：{{name}}</strong>
                            <span>研究方向：{{research}}</span>
                            <span>联系方式：{{contact}}</span>
                            </li>';

    public function getHtml($year){
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
            $row = str_replace('{{research}}',$content->research,$row);
            $row = str_replace('{{contact}}',$content->contact,$row);
            $html.=$row;
        }
        return $html;
    }
}
