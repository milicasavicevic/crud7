<?php

namespace Controllers;
use Model\Client;
//require_once('model/User.php');
  //start session

session_start();
class ClientController

{
    public function viewClients(){
include('views/view_client.php');
    }
   

    public function index ()
    {
        $clients= Client::all();
        require $_SERVER['DOCUMENT_ROOT'] . '/views/view_client.php';
    }



    public function add($name, $surname, $phone)
    {

        Client::add($name, $surname, $phone);
        header('Location: /clients' );
    }



    public function addClient()
    {
        if($_SERVER['REQUEST_METHOD']==="POST")
        {


           
                $name=$_POST['name'];
                $surname=$_POST['surname'];
                $phone=$_POST['phone'];
               

                $this->add($name, $surname, $phone);
                  $_SESSION['message'] = 'Client added successfully';
                exit();

            
        }
        elseif ($_SERVER['REQUEST_METHOD']==="GET"){

            require_once  ('views/view_client.php');
        }else{
            $_SESSION['message'] = 'Cannot add client';
        }
    }
    public function editClient(){
        if($_SERVER['REQUEST_METHOD']==="POST")
        {
           
                $id=$_GET['id'];
                $name = $_POST['name'];
                $surname = $_POST['surname'];
                $phone = $_POST['phone'];
              

                $this->update($id, $name, $surname, $phone);

               $_SESSION['message'] = 'Client updated successfully';
                 

            
        }
        elseif ($_SERVER['REQUEST_METHOD']==="GET"){
            $client = $this->findById();

            require_once  ('views/view_client.php');
        }else{
            $_SESSION['message'] = 'Cannot update client';
        }
    }
    public function findById()
    {
        if (!isset($_GET['id']))
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        $client = Client::find($_GET['id']);
        return $client;
    }
    public function update($id, $name, $surname, $phone)
    {

        Client::update($id, $name, $surname, $phone);

        header('Location: /clients' );
    }
    public function deleteClient()
    {
        if (!isset($_GET['id'])){
            header('Location: ' . $_SERVER['HTTP_REFERER']);

            exit();
            
        }

        Client::delete($_GET['id']);
$_SESSION['message'] = 'Client deleted successfully';
    }
}