<?php
/**
     * ID:602110198
     * Name: Jingrong Zhuang
     * WeChat: Rz
     */
if ($argv[2]=="name"|| $argv[2]=="section"||$argv[2]==="1"||$argv[2]==="2"||$argv[2]==="3"||$argv[2]=="total") {   
    $input=$argv[2];
    function ssort ($a,$b){
        global $input;
        if ($a[$input]==$b[$input]){
            if ($input=='name'){return($a['section']<$b['section'])?-1:1;}
            if ($input=='section'){return($a['name']<$b['name'])?-1:1;}
            if ($input==1 || $input==2 || $input==3 || $input=='total'){
                if ($a['section']==$b['section']){return($a['name']<$b['name'])?-1:1;}
                return($a['section']<$b['section'])?-1:1;}
        }
    return ($a[$input]<$b[$input])? -1:1;
    }

    $file=fopen($_SERVER['argv'][1],'r');
    fscanf($file,"%d",$n);
    $students=[];
for ($i=0;$i<$n;$i++){
    $student=[];
    fscanf ($file,"%s %s %f %f %f",$student['name'],$student['section'],$student[1],$student[2],$student[3]);
    $student['total']=$student[1]+$student[2]+$student[3];
    $student0[]=$student;
}
fclose($file);

usort($student0,"ssort");

$filter=$argv[3];
if ($filter=='001' || $filter=='002'){
    $students=array_filter($student0,function($student) use ($filter){
        return $student['section']==$filter;
    });
}
else $students=$student0;

foreach ($students as $key => $value){
    printf("%-11s%3s:%7.2f%7.2f%7.2f =%7.2f\n",$value['name'],$value['section'],$value['1'],$value['2'],$value['3'],$value['total']);
}

$average=array_reduce($students,function($carry,$student){
    $carry+=$student['total'];
    return $carry;},0)/(count($students));
printf("Average total score :%7.2f\n",$average);
}
else echo"Please input right filed!!";