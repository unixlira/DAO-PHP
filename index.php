<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>DAO - José Roberto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>
<body>
<?php

require_once 'config.php';

// $sql = new Sql();

// $usuarios = $sql->select('SELECT * FROM users');

// echo json_encode($usuarios);
// $usuario = Usuario::search('');
// echo json_encode($usuario);

$usuario = new Usuario();
$usuario->login('joserobertolira@gmail.com', '3fde6bb0541387e4ebdadf7c2ff31123');
echo $usuario->getName().'<br/>';
echo $usuario->getEmail().'<br/>';
echo $usuario->getActive().'<br/>';
echo $usuario->getDate()->format('d/m/Y');

?>

 </body>
</html>


