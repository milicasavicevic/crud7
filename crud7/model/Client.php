<?php
namespace model;
use \Dbconnection;

class Client
{
    public $id;
    public $name;
    public $surname;
    public $phone;


    public function __construct($id, $name, $surname,$phone)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->phone = $phone;
    }


    public static function all()
    {

        $list = [];

        $db = new DbConnection();
        $query = "SELECT * FROM clients";
        $stmt = $db->connection->prepare($query);

        $stmt->execute();
        $res=$stmt->get_result();

        if ($res) {
            while ($client = $res->fetch_object()) {

                $list[] = new Client ($client->id, $client->name, $client->surname, $client->phone);
            }

            return $list;


        }else {
            return null;
        }
    }

    public static function add($name, $surname, $phone)
    {
        $db = new Dbconnection();

        $query = "INSERT INTO clients (name, surname, phone) VALUES (?,?,?)";
        $stmt  = $db->connection->prepare($query);
        $stmt ->bind_param("sss",$name, $surname, $phone);


        $stmt->execute();


    }

    public static function update($id, $name, $surname,$phone)
    {
        $db = new Dbconnection();

        $query = "UPDATE clients SET name=?,surname=?,phone=? WHERE id=?";;
        $stmt = $db->connection->prepare($query);
        $stmt ->bind_param("sssi",$name, $surname, $phone, $id);

        $stmt->execute();
        //$rez=$prep_state->get_result();


    }

    public static function find($id)
    {
        $db = new Dbconnection();
        $id = intval($id);
        $query = "SELECT * from clients WHERE id=?";

        $stmt = $db->connection->prepare($query);
        $stmt ->bind_param("i",$id);

        $stmt->execute();
        $rez=$stmt->get_result();
        $client = $rez->fetch_object();

        return new Client ($client->id, $client->name, $client->surname, $client->phone);

    }

    public static function delete($id)
    {
        $db = new Dbconnection();
        $id = intval($id);
        $query = "DELETE FROM clients WHERE id=?";
        $stmt = $db->connection->prepare($query);
        $stmt ->bind_param("i",$id);

        $stmt->execute();

         header('Location: ' . $_SERVER['HTTP_REFERER']);


    }

}