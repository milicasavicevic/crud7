<?php

namespace model;
use \DbConnection;
class Project
{
    public $id;
    public $name;
    public $status;
    public $duration;
    public $fk_client_id;
    

    public function __construct($id, $name, $status, $duration $fk_client_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->status = $status;
        $this->duration = $duration;
        $this->fk_client_id = $fk_client_id;
        
    }
    

    public static function all()
    {

        $list = [];

        $db = new DbConnection();
        $query = 'SELECT * FROM projects join clients  on projects.fk_client_id = clients.id';
        $stmt = $db->connection->prepare($query);

        $stmt->execute();
        $res = $stmt->get_result();
        if ($res) {
            while ($project = $res->fetch_object()) {

                $list[] = new Project ($project->id, $project->name, $project->status,
                $project->duration, $project->fk_client_id);
            }

            return $list;


        } else
            return null;
    }

    public static function find($id)
    {
        $db = new DbConnection();
        $id = intval($id);
        $query = "SELECT * FROM projects join clients  on projects.fk_client_id = clients.id where id=?";

        $stmt = $db->connection->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();
        $project = $res->fetch_object();

        return new Project ($project->id, $project->name, $project->status, $project->duration, $project->fk_client_id);


    }

    public static function add($name, $status, $duraton $fk_client_id)
    {
        $db = new DbConnection();

        $query = "INSERT INTO projects( name, status, duration, fk_client_id) VALUES (?,?,?,?)";
        $stmt = $db->connection->prepare($query);
        $stmt->bind_param("sssi", $name, $status, $duration, $fk_client_id);
        $stmt->execute();
    }

    public static function update($name, $status, $duration, $fk_client_id, $id)
    {
        $db = new DbConnection();

        $query = " UPDATE projects SET  name=?, status=?, duration=?, fk_client_id =? WHERE id= ?";
        $stmt = $db->connection->prepare($query);
        $stmt->bind_param("sssii", $name, $status, $duration, $fk_client_id, $id);
        $stmt->execute();
    }

    public static function delete($id)
    {
        $db = new DbConnection();
        $id = intval($id);
        $query = "DELETE FROM projects WHERE id=?";
        $stmt = $db->connection->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        header('Location: ' . $_SERVER['HTTP_REFERER']);


    }
}