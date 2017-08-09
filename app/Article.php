<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    private $contentLayout = '<li>
                                <div>
                                    <h2>{{article_name}}</h2>
                                    <strong class="gr">{{authors}} @ {{publish_time}}</strong>
                                    <p class="gr02">
                                    {{article_info}}
                                    </p>
                                </div>
                              </li>';
    private function getContentHtml($contents)
    {
        $html = '';
        foreach ($contents as $key=>$content){
            $row = $this->contentLayout;
            $row = str_replace("{{article_name}}", $content->name, $row);
            $row = str_replace("{{publish_time}}", $content->time, $row);
            $row = str_replace("{{authors}}", $content->authors, $row);
            $row = str_replace("{{article_info}}", $content->article_info, $row);
            $html .= $row;
        }
        return $html;
    }
    public function getHtml(){
        $contents = $this->orderBy('time', 'desc')->get();
        return $this->getContentHtml($contents);
    }
}
