<?php
namespace App\Providers;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class View{
    /**
     * Renders a template using Twig
     *
     * @param string $template The name of the template to render
     * @param array $data An array of data to be passed to the template
     *
     * @return void
     */
    static public function render($template, $data = []){
        $loader = new FilesystemLoader('views');
        $twig = new Environment($loader);
        $twig->addGlobal('asset', ASSET);
        $twig->addGlobal('base', BASE);

        $twig->addGlobal('session', $_SESSION);
        if(isset($_SESSION['fingerPrint']) and ($_SESSION['fingerPrint'] ===  md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR']))){
            $guest = false;
        }else{
            $guest = true;
        }
        $twig->addGlobal('guest',$guest);

        echo $twig->render($template.".php", $data);
    }
    static function redirect($url){
        header('location:'.BASE.'/'.$url);
    }

    
}



?>