<?php
namespace App\Controller;

use App\Vue\Template;

class HomeController
{
    public function getHome()
    {
        $error = '';
        Template::render(
            'navbarHome.php',
            'Accueil',
            'vueHome.php',
            'footer.php',
            $error,
            ['script.js', 'main.js'],
            ['style.css', 'main.css']
        );
    }
    public function getAboutUs()
    {
        $error = '';
        Template::render(
            'navbar.php',
            'Notre production',
            'vueAboutUs.php',
            'footer.php',
            $error,
            ['script.js', 'main.js'],
            ['style.css', 'main.css']
        );
    }
    public function getPaniers()
    {
        $error = '';
        Template::render(
            'navbar.php',
            'Les paniers',
            'vueShop.php',
            'footer.php',
            $error,
            ['script.js', 'main.js'],
            ['style.css', 'main.css']
        );
    }
    public function get404()
    {
        $error = '';
        Template::render(
            'navbar.php',
            'Error 404',
            'vueError.php',
            'footer.php',
            $error,
            ['script.js', 'main.js'],
            ['style.css', 'main.css']
        );
    }
}
?>