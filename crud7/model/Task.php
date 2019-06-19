
<?php

namespace model;
use \Database;

class Task
{
    public $id;
    public $name;
    public $project_id;
    public $project_name;
    public $user_id;
    public $user_name;
    public $user_surname;

    public function __construct($id, $name, $project_id, $project_name, $user_id, $user_name, $user_surname)
    {

        $this->id = $id;
        $this->name = $name;
        $this->project_id = $project_id;
        $this->project_name = $project_name;
        $this->user_id = $user_id;
        $this->user_name = $user_name;
        $this->user_surname = $user_surname;
    }

    public static function all()
    {

        $db = new DbConnection();
        $query = '
        SELECT
        id,
        name,
        projects.id,
        projects.name,
        users.id,
        users.name,
        users.surname
        FROM
        tasks
        JOIN projects ON tasks.fk_project_id = projects.id
        JOIN users ON users.id = tasks.fk_user_id';

        $list = [];
        $stmt = $db->connection->prepare($query);

        $stmt->execute();
        $res = $stmt->get_result();
        if ($res) {
            while ($tasks = $res->fetch_object()) {

                $list[] = new Task($tasks->id, $tasks->name, $tasks->project_id, $tasks->project_name, $tasks->user_id, $tasks->user_name, $tasks->user_surname);
            }

            return $list;
        }
    }

    public static function add($name, $fk_project_id, $fk_user_id)
    {
        $db = new DbConnection();

        $query = "INSERT INTO   tasks( name,fk_project_id,fk_user_id)  VALUES (?,?,?)";
        $stmt = $db->connection->prepare($query);
        $stmt->bind_param("sii", $name, $fk_project_id, $fk_user_id);
        $stmt->execute();
    }

    public static function update($name, $fk_project_id, $fk_user_id, $id)
    {
        $db = new DbConnection();

        $query = "UPDATE tasks SET name=?,fk_project_id=?,fk_user_id=? WHERE id=?";
        $stmt = $db->connection->prepare($query);
        $stmt->bind_param("siii", $name, $fk_project_id, $fk_user_id, $task_id);


        $stmt->execute();
    }

    public static function find($id)
    {
        $db = new DbConnection();
        $id = intval($id);
        $query = "SELECT
        id,
        name,
        projects.id,
        projects.name,
        users.id,
        users.name,
        users.surname
        FROM
        tasks
        JOIN projects ON tasks.fk_project_id = projects.id
        JOIN users ON users.id = tasks.fk_user_id WHERE id=?";
        $stmt = $db->connection->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();
        if ($rez) {
            $tasks = $res->fetch_object();

            return new Task($tasks->id, $tasks->name, $tasks->project_id, $tasks->project_name, $tasks->user_id, $tasks->user_name, $tasks->user_surname);

        } else return null;
    }

    public static function findProject($id)
    {

        $db = new DbConnection;
        $id = intval($id);
        $query = "SELECT
        id,
        name,
        projects.id,
        projects.name,
        users.id,
        users.name,
        users.surname
        FROM
        tasks
        JOIN projects ON tasks.fk_project_id = projects.id
        JOIN users ON users.id = tasks.fk_user_id WHERE id=?";
        $stmt = $db->connection->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();
        if ($res) {
            $list = [];
            while ($tasks = $res->fetch_object()) {
                $list[] = new Task($tasks->id, $tasks->name, $tasks->project_id, $tasks->project_name, $tasks->user_id, $tasks->user_name, $tasks->user_surname);

            }
            return $list;
        } else return null;

    }

    public static function delete($id)
    {

        $db = new DbConnection();
        $id = intval($id);
        $query = "DELETE FROM tasks WHERE id=?";
        $stmt = $db->connection->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    }
}