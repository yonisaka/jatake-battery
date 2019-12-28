<?php

namespace App\Library;

use Responder;

class Libs {
    private static $instance;

    public static function _()
    {
      if ( is_null( self::$instance ) )
      {
        self::$instance = new self();
      }
      return self::$instance;
    }

    public function jsonResp($callback)
    {
        try{
            $result = $callback();
            return response()->json(['data'=>$result,'status'=>true],200);
        }
        catch(\Exception $e)
        {
            return responder()->error(401,$e->getMessage())->respond(401);
            return $this->errJsonResp($e);
        }
    }
}
