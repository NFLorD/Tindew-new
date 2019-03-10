<?php 
require "libraries/controllers/_Controller.php";

class UsersController extends Controller
{
    protected $modelName = "Users";

    public function index()
    {
        $users = $this->model->findAll();

        $title = "Liste des utilisateurs";
        $template = "userlist";
        $this->display($template, compact("title", "users"));
    }

    public function show()
    {
        if (empty($_GET['id'])) {
            Http::redirect("home");
        }

        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $user = $this->model->find($id);

        $statusesTable = new Statuses();
        $statuses = $statusesTable->find($user['id'], "user_id", true);

        $commentsTable = new Comments();

        foreach ($statuses as $index => $status) {
            $comments = $commentsTable->find($status['id'], "status_id", true);
            foreach ($comments as $indox => $comment) {
                $comments[$indox]['user_id'] = $this->model->find($comment['user_id'], "id");
            }
            $statuses[$index]['comments'] = $comments;
        }

        $title = "Profil";
        $template = "profile";
        $this->display($template, compact("title", "user", "statuses"));
    }

    public function create()
    {
        if (empty($_POST['firstName']) || empty($_POST['lastName']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['passwordConfirm'])) {
            Session::addError("You need to fill in all the fields !");
            Http::redirectBack();
        }

        if ($_POST['password'] != $_POST['passwordConfirm']) {
            Session::addError("You need to enter the same password !");
            Http::redirectBack();
        }

        $created = $this->model->create(['firstName' => $_POST['firstName'], 'lastName' => $_POST['lastName'], 'email' => $_POST['email'], 'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)]);

        if ($created == 0) {
            Session::addError("Something went wrong...");
            Http::redirectBack();
        }

        Http::redirect("home");
    }

    public function update()
    {

    }

    public function delete()
    {

    }

    public function search(){
        if (empty($_POST['searchValue'])) {
            Http::redirect("index.php");
        }

        $seek = filter_input(INPUT_POST, "searchValue", FILTER_SANITIZE_SPECIAL_CHARS);
        $found = $this->model->findLike($seek, ['firstName', 'lastName']);

        $title = "Résultats";
        $template = "search";
        require "templates/template.phtml";
    }
}

?>