<?php
/**
     * ID:602110198
     * Name: Jingrong Zhuang
     * WeChat: Rz
     */

function ssort($a,$b){
    if ($a['score']==$b['score']){
        return 0;
    }
    return ($a['score']<$b['score'])? 1:-1;
}

     $file=fopen($_SERVER['argv'][1],'r');
fscanf($file,"%d",$n);
$students=[];
for ($i=0;$i<$n;$i++){
    $student=[];
    fscanf ($file,"%s %s %f",$student['name'],$student['section'],$student['score']);
    $students[]=$student;
}
fclose($file);

usort($students,"ssort");

    foreach ($students as $key => $value){
        printf("%-11s%3s:%7.2f\n",$value['name'],$value['section'],$value['score']);
    }
   