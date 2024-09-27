<?php
namespace App\Controllers;
use App\Providers\View;

class CatalogueController{
    public function index(){
        return View::render('catalogue/index');
    }
}

?>