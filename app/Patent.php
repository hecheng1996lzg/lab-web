<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patent extends Model
{
    private $contentLayout = '<li>
                                <div>
                                    <h2>{{patent_name}}</h2>
                                    <strong class="gr">{{author}}</strong>
                                    <strong class="gr status-{{status}}">Status: {{statusStr}}</strong>
                                </div>
                              </li>';

    private function getContentHtml($contents)
    {
        $html = '';
        foreach ($contents as $key=>$content){
            $row = $this->contentLayout;
            $status = $content->status=='授权'? 1:2;
            $row = str_replace("{{patent_name}}", $content->name, $row);
            $row = str_replace("{{status}}", $status, $row);
            $row = str_replace("{{statusStr}}", $content->status, $row);
            $row = str_replace("{{author}}", $content->author, $row);
            $html .= $row;
        }
        return $html;
    }
    public function getHtml($offset,$limit){
        $contents = $this->offset($offset)->limit($limit)->get();
        return $this->getContentHtml($contents);
    }
}
