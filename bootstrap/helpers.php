<?php
function dice() {
    $p = rand(0,99);
    if($p<60){
        return 1;
    }else if($p<90){
        return 2;
    }else if($p<97){
        return 3;
    }else{
        return 4;
    }
}
