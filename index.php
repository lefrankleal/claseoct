<?php
require_once('action.php');

$userController = new Usuario();
$users = $userController->mostrar();
if($_GET && $_GET["action"] == "mostrar") {
    $user = $userController->mostrar($_GET['id']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Clase Oct</title>
</head>

<body class="p-4">
    <div class="row">
        <div class="col">
            <table class="w-100">
                <thead>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Contraseña</th>
                    <th>Sexo</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php
                    if (count($users) < 1) {
                    ?>
                        <tr>
                            <td colspan='4'>No hay datos para mostrar</td>
                        </tr>
                        <?php
                    } else {
                        foreach ($users as $current) {
                        ?>
                            <tr>
                                <td><?php echo $current->name; ?></td>
                                <td><?php echo $current->lastname; ?></td>
                                <td><?php echo $current->password; ?></td>
                                <td><?php echo $current->gender; ?></td>
                                <td>
                                    <a href="action.php?action=eliminar&item=<?php echo $current->id; ?>" type="button" class="btn btn-danger">Eliminar</button>
                                        <a href="?action=mostrar&id=<?php echo $current->id; ?>" type="button" class="btn btn-primary">Actualizar</button>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <form action="action.php?action=<?php if ($_GET['action'] === 'mostrar') { echo 'actualizar'; } else { echo 'crear'; } ?>" method="post">
        <div class="row">
            <div class="form-group col">
                <input type="hidden" name="id" value="<?php echo $user[0]->id; ?>">
                <label for="name">Nombre</label>
                <input value="<?php echo $user[0]->name; ?>" type="text" class="form-control" name="name" placeholder="Nombre" required>
            </div>
            <div class="form-group col">
                <label for="lastname">Apellido</label>
                <input value="<?php echo $user[0]->lastname; ?>" type="text" class="form-control" name="lastname" placeholder="Apellido" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="password">Contraseña</label>
                <input value="<?php echo $user[0]->password; ?>" type="password" class="form-control" name="password" placeholder="Contraseña" required>
            </div>
            <div class="form-group col">
                <label for="gender">Genero</label>
                <select name="gender" required class="form-control">
                    <option <?php if ($user[0]->gender === 'masculino') { echo ('selected'); } ?> value="masulino" >Masculino</option>
                    <option <?php if ($user[0]->gender === 'femenino') { echo ('selected'); } ?> value="femenino">Femenino</option>
                    <option <?php if ($user[0]->gender === 'otro') { echo ('selected'); } ?> value="otro">Otro</option>
                </select>
            </div>
        </div>
        <input type="submit" value="Enviar" class="btn btn-primary float-right">
    </form>
</body>

</html>