<?php
namespace App\Controllers;
use App\Providers\View;

class AproposController{
    public function index(){
        return View::render('apropos/index');
    }
}

?>