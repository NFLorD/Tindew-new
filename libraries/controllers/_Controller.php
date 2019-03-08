<?php 
require "libraries/models/UsersModel.php";
require "libraries/models/StatusesModel.php";
require "libraries/models/CommentsModel.php";
require "HTTP/Http.php";
require "SESSIONS/Session.php";

abstract class Controller
{
    protected $model;
    protected $modelName;

    public function __construct()
    {
        $this->model = new $this->modelName();
    }

    protected function display(string $template, array $variables)
    {
        extract($variables);
        require "templates/template.phtml";
    }
}

?>