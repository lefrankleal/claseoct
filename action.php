<?php
require_once('database.php');
class Usuario {
    public function crear() {
        $db = new Database();
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $password = $_POST['pass'];
        $gender = $_POST['sexo'];
        $sql = "INSERT INTO users (name, lastname, password, gender)
        VALUES ('$name', '$lastname', '$password', '$gender')";
        if ($db->sql($sql)) {
            header('Location: http://localhost:3200');
        } else {
            echo 'Hubo un problema al registrar el usuario.';
        }
    }

    public function eliminar() {
        $db = new Database();
        $id = $_GET['item'];
        $sql = "DELETE FROM users WHERE id = $id";
        if ($db->sql($sql)) {
            header('Location: http://localhost:3200');
        } else {
            echo 'Hubo un problema al eliminar el usuario.';
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
    
    default:
        break;
}