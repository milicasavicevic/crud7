<?php

namespace Controllers;
use Model\User;
//require_once('model/User.php');
  //start session

session_start();
class UserController

{
    public function viewUsers(){
include('views/view_user.php');
    }
   

    public function index ()
    {
        $users= User::all();
        require $_SERVER['DOCUMENT_ROOT'] . '/views/view_user.php';
    }



    public function add($name, $surname, $position, $email, $password)
    {

        User::add($name, $surname, $position, $email, $password);
        header('Location: /users' );
    }



    public function addUser()
    {
        if($_SERVER['REQUEST_METHOD']==="POST")
        {


           
                $name=$_POST['name'];
                $surname=$_POST['surname'];
                $position=$_POST['position'];
                $email=$_POST['email'];
                $password=$_POST['password'];


                $this->add($name, $surname, $position, $email, $password);
                  $_SESSION['message'] = 'User added successfully';
                exit();

            
        }
        elseif ($_SERVER['REQUEST_METHOD']==="GET"){

            require_once  ('views/view_user.php');
        }else{
            $_SESSION['message'] = 'Cannot add user';
        }
    }
    public function editUser(){
        if($_SERVER['REQUEST_METHOD']==="POST")
        {
           
                $id=$_GET['id'];
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $position = $_POST['position'];
                $email = $_POST['email'];
                $password = $_POST['password'];


                $this->update($id, $name, $surname, $position, $email, $password);

               $_SESSION['message'] = 'User updated successfully';
                 

            
        }
        elseif ($_SERVER['REQUEST_METHOD']==="GET"){
            $user = $this->findById();

            require_once  ('views/view_user.php');
        }else{
            $_SESSION['message'] = 'Cannot update user';
        }
    }
    public function findById()
    {
        if (!isset($_GET['id']))
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        $user = User::find($_GET['id']);
        return $user;
    }
    public function update($id, $name, $surname, $position, $email, $password)
    {

        User::update($id, $name, $surname, $position, $email, $password);

        header('Location: /users' );
    }
    public function delete()
    {
        if (!isset($_GET['id'])){
            header('Location: ' . $_SERVER['HTTP_REFERER']);

            exit();
            
        }

        User::delete($_GET['id']);
$_SESSION['message'] = 'User deleted successfully';
    }
}