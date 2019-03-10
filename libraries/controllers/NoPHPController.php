<?php 

class NoPHPController
{
    public function login()
    {
        $title = "Connexion";
        $template = "login";
        require "templates/template.phtml";
    }

    public function signup()
    {
        $title = "Sign up to Tindew !";
        $template = "signup";
        require "templates/template.phtml";
    }
}

?>