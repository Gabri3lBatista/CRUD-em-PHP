<?php
    require 'config.php';

    $info= []; //informações do usuarios
    $id = filter_input(INPUT_GET, 'id'); //pega o ID do usuarios
    
    if($id){
        //pega o id de usuario e faz uma preparação pra comparar e achar o id dele 
        //com o do banco e trazer as informações
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if($sql->rowCount() > 0){
            $info = $sql->fetch(PDO::FETCH_ASSOC); //pega todas as informações do usuarios da tabela

        }else{
            header('Location: index.php');
            exit();
        }
    }else{
        header('Location: index.php');
        exit();
    }
?>

<form method="POST" action= "editar_action.php">
    <input type="hidden" name="id" value="<?= $info['id'];?>">
    <h1>Editar Usuário</h1>
    <label for="">
        Nome: </br>
        <input type="text" name="name" value="<?php echo $info['nome'];?>">
    </label></br></br>
    <label for="">
        Email: </br>
        <input type="text" name="email" value="<?php echo $info['email'];?>">
    </label></br></br>

    <input type="submit" value="Salvar">
</form>