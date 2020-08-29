<?php

abstract class AdminBase
{

    public function __construct()
    {
        if(!empty($_SESSION['role']))   {
            return true;
        }   else    {
            die('Access denied');
        }
    }

}

?>