<?php

require_once 'conexao.php';

$usu = $_POST["usu"];
$pass;
$data = date("Y-m-d");

if (isset($usu) && $usu != "" && isset($_POST["pass"]) && $_POST["pass"] != "") {

    $pass = password_hash($_POST["pass"], PASSWORD_BCRYPT);
    
    $sql = 'INSERT INTO usuarios_simples (
        usi_nome,
        usi_senha,
        usi_data_cadastro
    ) VALUES (?, ?, ?)';

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param('sss', $usu, $pass, $data);

    $exe = $stmt->execute();

    if ($exe) {
    
        $stmt->close();    
        exit("T");
    } else {
        exit("F");
    }

} else {
    exit("F");
}

?>