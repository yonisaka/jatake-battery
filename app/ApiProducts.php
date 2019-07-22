<?php

namespace App;

use function GuzzleHttp\json_decode;

class ApiProducts
{
    //
    protected $rest;
    public function __construct($token)
    {
        $this->uri = 'products';
        $this->client = new \GuzzleHttp\Client([
            'base_uri'=>url('v1').'/',
            'headers'=>[
                'Authorization' => 'Bearer '.$token,
                'Accept' => 'application/json',
                'Content-type' => 'application/json'
        ]]);
    }

    private function get($url='')
    {
        $resp = $this->_curl('get',$url)->getBody(true)->getContents();
        return json_decode($resp);
    }

    private function post($url='',$body)
    {
        $resp = $this->_curl('post',$url,['form_params'=>$body]);
        return json_decode($resp->getBody()->getContents());
    }

    private function _curl($method,$url='',$opt=[])
    {
        return $this->client->$method($this->uri.$url,$opt);
    }

    public function getAll()
    {
        return $this->get();
    }

    public function create($url=null,$body)
    {
        // dd($body);
        return $this->post($url,$body);
    }

}
