<?php

if(!function_exists('formating'))
{
    function formating($text,$type)
    {
        if(empty($text) || empty($type))
            return;
        if($type == "price")
        {

            $text = number_format($text,2,',','.');
            return "Rp. ".$text;
        }
        return ;
    }
}
