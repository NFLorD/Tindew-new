<?php 
require "libraries/controllers/_Controller.php";

class StatusesController extends Controller
{
    protected $modelName = "Statuses";

    public function index()
    {
        $title = "Accueil";
        $statuses = $this->model->findAll();

        $usersTable = new Users();
        $commentsTable = new Comments();

        foreach ($statuses as $index => $status) {
            $statuses[$index]['user_id'] = $usersTable->find($status['user_id']);
            $statuses[$index]['comments'] = count($commentsTable->find($status['id'], 'status_id', true));
        }

        shuffle($statuses);

        $this->display("index", compact("title", "statuses"));
    }

    public function show()
    {
        $statuses = $this->model->find();

        foreach ($statuses as $index => $status) {
            $statuses[$index]['user_id'] = $usersTable->find($status['user_id']);
            $statuses[$index]['comments'] = count($commentsTable->find($status['id'], 'status_id', true));
        }
    }

    public function edit()
    {

    }

    public function delete()
    {

    }
}


?>