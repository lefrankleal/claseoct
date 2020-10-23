<?php
require_once('database.php');
class Usuario {

    private $db;
    private $link;

    public function __construct()
    {
        $this->db = new Database();
        $this->link = $this->db->PDO();
    }

    public function mostrar($id = null) {
        if($id !== null) {
            $query = $this->link->prepare("SELECT * FROM users WHERE id = :id");
            $query->bindValue(":id", $_GET["id"]);
        } else {
            $query = $this->link->prepare("SELECT * FROM users");
        }
        return $this->db->PDOSelect($query);
    }

    public function crear() {
        $sql = $this->link->prepare('INSERT INTO users (name, lastname, password, gender) VALUES (:name, :lastname, :password, :gender)');
        $sql->bindValue(':name', $_POST['name']);
        $sql->bindValue(':lastname', $_POST['lastname']);
        $sql->bindValue(':password', $_POST['password']);
        $sql->bindValue(':gender', $_POST['gender']);
        if ($sql->execute()) {
            header('Location: http://localhost:3200');
        } else {
            echo 'Hubo un problema al registrar el usuario.';
        }
    }

    public function eliminar() {
        try {
            $id = $_GET['item'];
            $this->link->beginTransaction();
            $sql = $this->link->prepare('DELETE FROM users WHERE id = ?');
            $sql->bindParam(1, $id, PDO::PARAM_INT);
            $sql->execute();
            $this->link->commit();
            header('Location: http://localhost:3200');
        } catch (\Exception $e) {
            $this->link->rollBack();
            echo 'Hubo un problema al eliminar el usuario.' . $e->getMessage();
        }
    }

    public function actualizar(){
        $sql = $this->link->prepare('UPDATE users SET name = :name, lastname = :lastname, password = :password, gender = :gender WHERE id = :id');
        foreach ($_POST as $key => $value) {
            $sql->bindValue(":$key", $value);
        }
        if ($sql->execute()) {
            header('Location: http://localhost:3200');
        } else {
            echo 'Hubo un problema al actualizar el usuario.';
        }
    }
}

$usuario = new Usuario();
switch ($_GET['action']) {
    case 'crear':
        $usuario->crear();
        break;
    case 'eliminar':
        $usuario->eliminar();
        break;
    case 'actualizar':
        $usuario->actualizar();
        break;
    
    default:
        break;
}