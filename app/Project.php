<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    private $contentLayout = '<li>
                                <div>
                                <h2>{{ project_name }}</h2>
                                <strong class="gr">{{ startTime }} - {{ endTime }}</strong>
                                <strong class="gr status-{{ status }}">Status: {{ statusStr }}</strong>
                                <p class="gr02">
                                {{ project_description }}
                                </p>
                                </div>
                               </li>';

    private function getContentHtml($contents){
        $html = '';

        foreach ($contents as $key=>$content){
            $statusStr = $content->status == 1 ? '已完成': '正在进行';
            $row = $this->contentLayout;
            $row = str_replace("{{ project_name }}", $content->name, $row);
            $row = str_replace("{{ startTime }}", $content->startTime, $row);
            $row = str_replace("{{ endTime }}", $content->endTime, $row);
            $row = str_replace("{{ status }}", $content->status, $row);
            $row = str_replace("{{ statusStr }}", $statusStr, $row);
            $row = str_replace("{{ project_description }}", $content->description, $row);
            $html .= $row;
            }
        return $html;
        }

    public function getHtml(){
        $contents = $this->orderBy('startTime', 'desc')->get();
        return $this->getContentHtml($contents);
    }
}
