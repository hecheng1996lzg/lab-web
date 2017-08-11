<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    private $indexArr;

    private $yearLayout = '<li class="{{active}}"><a href="#">{{adYear}}</a></li>';

    private $contentLayout = '<li class="{{index}}">
                            <img src="{{photo}}" alt="">
                            <strong>{{name}}</strong>
                            <span>毕业状况：{{bool}}</span>
                            <span>研究方向：{{status}}</span>
                            </li>';

    public function getHtml($year){
        $year = $year? $year:date('Y');

        $contents = $this->where('adYear', $year)->get();
        $contentHtml = $this->getContentHtml($contents);

        $years = $this->select(['adYear'])->distinct('adYear')->get();
        $yearHtml = $this->getYearHtml($years,$year);

        return ['content'=>$contentHtml,
                'year'=>$yearHtml];
    }

    private function getContentHtml($contents){
        $html = '';

        foreach ($contents as $key=>$content){
            $bool = $content->bool==1? '在校':'已毕业';
            $row = $this->contentLayout;
            $row = str_replace('{{index}}','index-'.($key+1),$row);
            $row = str_replace('{{photo}}',$content->photo,$row);
            $row = str_replace('{{name}}',$content->name,$row);
            $row = str_replace('{{bool}}',$bool,$row);
            $row = str_replace('{{status}}',$content->status,$row);
            $html.=$row;
        }
        return $html;
    }

    private function getYearHtml($years,$yearActive){
        $html = '';
        foreach ($years as $year){
            $active = $year->adYear==$yearActive? 'active':'';
            $row = $this->yearLayout;
            $row = str_replace('{{active}}',$active,$row);
            $row = str_replace('{{adYear}}',$year->adYear,$row);
            $html.=$row;
        }
        return $html;
    }
}
