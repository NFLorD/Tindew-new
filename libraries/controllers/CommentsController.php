<?php 
require "libraries/controllers/_Controller.php";

class CommentsController extends Controller
{
    protected $modelName = "Comments";

    public function index()
    {

    }

    public function show()
    {
        
    }

    public function create()
    {
        if (!$_SESSION['connected']){
            echo "You need to fill in all the fields !";
            exit;
        }
        
        if(empty($_POST['content']) || empty($_POST['status_id'])) {
            echo "You need to fill in all the fields !";
            exit;
        }

        $created = $this->model->create(['status_id' => $_POST['status_id'], 'content' => $_POST['content'], 'user_id' => $_SESSION['user']['id']]);

        if ($created == 0) {
            echo("Something went wrong...");
            exit;
        } else {
            echo "Everything went well";
        }
    }

    public function delete()
    {

    }
}


?>