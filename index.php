<?php
require_once('database.php');
$sql = "SELECT * FROM users";
$db = new Database();
$users = $db->select($sql);
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
                        foreach ($users as $user) {
                        ?>
                            <tr>
                                <td><?php echo $user->name; ?></td>
                                <td><?php echo $user->lastname; ?></td>
                                <td><?php echo $user->password; ?></td>
                                <td><?php echo $user->gender; ?></td>
                                <td>
                                    <a href="action.php?action=eliminar&item=<?php echo $user->id; ?>" type="button" class="btn btn-danger">Eliminar</button>
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
    <form action="action.php?action=crear" method="post">
        <div class="row">
            <div class="form-group col">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" placeholder="Nombre" required>
            </div>
            <div class="form-group col">
                <label for="lastname">Apellido</label>
                <input type="text" class="form-control" name="lastname" placeholder="Apellido" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
            </div>
            <div class="form-group col">
                <label for="gender">Genero</label>
                <select name="gender" required class="form-control">
                    <option value="masulino">Masculino</option>
                    <option value="femenino">Femenino</option>
                    <option value="otro">Otro</option>
                </select>
            </div>
        </div>
        <input type="submit" value="Enviar" class="btn btn-primary float-right">
    </form>
</body>

</html>