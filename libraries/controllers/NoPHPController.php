<?php 

class NoPHPController
{
    private function display()
    {
        require "templates/template.phtml";
    }

    public function login()
    {
        $title = "Connexion";
        $template = "login-form";
        $this->display();
    }

    public function signup()
    {
        $title = "Sign up to Tindew !";
        $template = "signup-form";
        $this->display();
    }
}

?>