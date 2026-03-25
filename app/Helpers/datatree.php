<?php

function datatree($data,$parent_id = 0,$level = 0){
    $arr = [];
    foreach($data as $value){

        if($value['parent_id'] == $parent_id){
            $value['level'] = $level;
            $arr[] = $value;
            $child = datatree($data,$value['id'],$level + 1);
            $arr = array_merge($arr,$child);
        };
    };
    
    return $arr;
}