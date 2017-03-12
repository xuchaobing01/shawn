<?php

function showOperate($operate=[]){
    if(empty($operate)){
        return '';
    }
    $option=<<<EOT
<div class="btn-group" >
    <button class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        操作 <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
EOT;

    foreach($operate as $k=>$v){
        $option.="<li><a href='".$v."'>".$k."</a></li>";
    }
    $option.="</ul></div>";

    $option .= '<div class="btn-group1">';
    $operate_style=config('operate_style');
    foreach($operate as $k=>$v){
        $option.='<a href="'.$v.'" ><button class="'.$operate_style[$k]['color'].'" type="button" style="border-radius: 3px;margin-right: 5px;" ><i class="'.$operate_style[$k]['style'].'" ></i> '.$k.'</button></a>';
    }
    $option.="</div>";
    return $option;
}

function formatTime($time){
    if(empty($time)){
        return '';
    }
    return date("Y-m-d H:i:s",$time);
}