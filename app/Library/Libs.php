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

    public function jsonUnauth()
    {
        return \Responder::error("unauthorized","unauthorized")->respond(401);
    }
}
