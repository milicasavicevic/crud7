<?php

namespace Model;
use \Dbconnection;

class User
{
    public $id;
    public $name;
    public $surname;
    public $position;
    public $email;
    public $password;

    public function  __construct ($id,$name,$surname,$position,$email,$password) 
    {
        $this->id=$id;
        $this->name=$name;
        $this->surname=$surname;
        $this->position=$position;
        $this->position=$email;
        $this->position=$password;
    }
    public static function all ()
    {

        $list=[];

        $db = new Dbconnection();
        $query = 'SELECT * FROM users';
        $stmt = $db->link->prepare($query);

        $stmt->execute();
        $res=$stmt->get_result();

        if($res){
            while ($user = $res->fetch_object()) {

                $list[]=new User ($user->id,$user->name,$user->surname,$user->position,$user->email,$user->password);
            }
            return $list;
        }else return null;



    }
    public static function  add($name,$surname,$position,$email,$password){
        $db = new DbConnection();

        $query = "INSERT INTO users (name,surname,position,email,password) VALUES (?,?,?,?,?)";
        $stmt = $db->connection->prepare($query);
        $stmt ->bind_param("sssss",$name, $surname,$position,$email,$password);

        $stmt->execute();


    }
    public static function  update($id,$name,$surname,$position,$email,$password){
        $db = new Dbconnection();

        $query = "UPDATE users SET name=?,surname=?,position=?,email=?,password=? WHERE id=?";
        $stmt = $db->connection->prepare($query);
        $stmt ->bind_param("sssssi",$name, $surname, $position, $email, $password, $id);

        $stmt->execute();


    }
    public static function find($id) {
        $db = new Dbconnection();
        $id=intval ($id);
        $query="SELECT * from users WHERE id=?";
        $stmt = $db->connection->prepare($query);
        $stmt ->bind_param("i",$id);

        $stmt->execute();
        $res=$stmt->get_result();
        $user = $res->fetch_object();

        return  new User ($user->id,$user->name,$user->surname,$user->position,$user->email,$user->password);

    }
    public static function  delete($id){
        $db = new Dbconnection();
        $id=intval ($id);
        $query = "DELETE FROM users WHERE id=?";
        $stmt = $db->connection->prepare($query);
        $stmt ->bind_param("i",$id);

        $stmt->execute();

       header('Location: ' . $_SERVER['HTTP_REFERER']);

    }
}