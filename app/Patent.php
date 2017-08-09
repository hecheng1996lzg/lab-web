<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patent extends Model
{
    private $contentLayout = '<li>
                                <div>
                                    <h2>{{patent_name}}</h2>
                                    <strong class="gr">Status: {{status}}</strong>
                                    <strong class="gr">{{author}}</strong>
                                </div>
                              </li>';

    private function getContentHtml($contents)
    {
        $html = '';
        foreach ($contents as $key=>$content){
            $row = $this->contentLayout;
            $row = str_replace("{{patent_name}}", $content->name, $row);
            $row = str_replace("{{status}}", $content->status, $row);
            $row = str_replace("{{author}}", $content->author, $row);
            $html .= $row;
        }
        return $html;
    }
    public function getHtml(){
        $contents = $this->all();
        return $this->getContentHtml($contents);
    }
}
