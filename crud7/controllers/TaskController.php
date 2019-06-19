<?php
namespace Controllers;
 //start session

session_start();

    //including the database connection file
    use \Dbconnection;

class TaskController{

    public function viewTasks(){
include('views/view_task.php');
    }
    
 public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['id']))
        {

            if (!isset($_GET['id']))
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            $task = Task::find($_GET['id']);
            require_once('views/view_task.php');

        } else
        {

           // $tasks = Task::all();
$tasks='hi';
            require_once('views/view_tasks.php');
        }

    }

    public function findById()
    {
        if (!isset($_GET['id']))
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        $task = Task::find($_GET['id']);
        return $task;
    }

    public function findByProjectId()
    {
        if (!isset($_GET['id']))
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        $task = Task::findProject($_GET['id']);
        return $task;
    }


    public function addTask(){

        if($_SERVER['REQUEST_METHOD']==="POST")
        {
            if ((!empty($_POST['name'])) && (!empty($_POST['project_name']))&& (!empty($_POST['user_name']))){

                $name=$_POST['name'];
                $project_name=$_POST['project_name'];
                $user_name=$_POST['user_name'];

                Task::add($name,$project_name,$user_name);
                header('Location: /tasks');

            }
        }
        elseif ($_SERVER['REQUEST_METHOD']==="GET"){
            include_once ('controllers/ProjectController.php');
            include_once ('controllers/UserController.php');


            $projectControll=new ProjectController();
            $userControll=new UserController();
            $users=$userControll->allUsers();
            $projects=$projectControll->allProject();

            require_once  ('views/task_add_modal.php');
        }else{
            echo "Method not supported";
        }
    }


    public function editTask(){
        if($_SERVER['REQUEST_METHOD']==="POST")
        {
            if ((!empty($_POST['name'])) && (!empty($_POST['project_name'])) && (!empty($_POST['user_name']))) {

                $id=$_GET['id'];
                $name = $_POST['name'];
                $project_name = $_POST['project_name'];
                $user_name = $_POST['user_name'];

                Task::update($name, $project_name, $user_name ,$id);
                header('Location: /tasks');


            }
        }
        elseif ($_SERVER['REQUEST_METHOD']==="GET"){
            include_once ('controllers/ProjectController.php');
            include_once ('controllers/UserController.php');


            $projectControll=new ProjectController();
            $userControll=new UserController();
            $all_project = $projectControll->allProject();
            $all_users = $userControll->allUsers();
            $selected_data = $this->findById();
            require_once 'views/task_action_modal.php';
        }else{
            echo "Method not supported";
        }
    }
    public function delete()
    {
        if (!isset($_GET['id']))
        {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }

        Task::delete($_GET['id']);

    }

}