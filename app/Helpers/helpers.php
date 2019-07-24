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

if(!function_exists('toObj'))
{
    function toObj($things)
    {
        return (object)$things;
    }
}


if(!function_exists('pricify'))
{
    function pricify($things)
    {
        return (object)$things;
    }
}

if(!function_exists('errApi'))
{
    function errApi($e)
    {
        return response()->json(['message'=>$e->getMessage(),'err'=>(string) $e,'status'=>false,'code'=>$e->getCode()],400);
    }
}

