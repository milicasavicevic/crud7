<?php

namespace Controllers;
use Model\Project;
use Controllers;



class ProjectController
{

     public function viewProjects(){
include('views/view_project.php');
    }
   

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET['id'])) {
            if (!isset($_GET['id']))
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            $project = Project::find($_GET['id']);
            include_once('controllers/TaskController.php');
            $taskControll = new Controllers\TaskController();

            $taskByProjectId = $taskControll->findByProjectId();
            $project = $this->findById($_GET['id']);
            require_once('views/view_project.php');

        } else {
            $projects = Project::all();
            require_once('views/view_project.php');
        }

    }

    public function findById()
    {
        if (!isset($_GET['id']))
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        $project = Project::find($_GET['id']);
        return $project;
    }

    public function addProject()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (!isset($_POST['name']) && (!isset($_POST['status'])) && (!isset($_POST['duration'])) && (!isset($_POST['client_id']))) {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            } else {

                Project::add($_POST['name'], $_POST['status'], $_POST['duration'], $_POST['client_id']);
                header('Location:/project');

            }
        } else {

            $clientControll = new Controllers\ClientController();
            $clients = $clientControll->viewClients();
            require_once $_SERVER['DOCUMENT_ROOT'] . '/views/view_project.php';

        }

    }

    public function editProject()
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if ((!empty($_POST['client_name'])) && (!empty($_POST['name']))&& (!empty($_GET['id']))) {

                $project_id = $_GET['id'];
                $client_name = $_POST['client_name'];
                $project_name = $_POST['name'];
                Project::update($project_name,$client_name, $project_id);
                header('Location:/project');

            }
        } elseif ($_SERVER['REQUEST_METHOD'] === "GET") {


            $project = $this->findById();
            $clientControll = new Controllers\ClientController();
            $allClients = $clientControll->allClients();
            require 'views/view_project.php';
        } else {
            echo "Method not supported";
        }
    }

    public function allProject()
    {
        $projects = Project::all();
        return $projects;
    }

    public function deleteProject()
    {
        if (!isset($_GET['id'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }

        Project::delete($_GET['id']);

    }
}