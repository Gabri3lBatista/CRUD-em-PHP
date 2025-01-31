<?php

require 'config.php';

$sql = $pdo->query("SELECT * FROM usuarios");

if($sql->rowCount() > 0){
    $lista = $sql->fetchAll($pdo::FETCH_ASSOC);
    
}
?>
<a href="adicionar.php">Adicionar Usuário</a>
<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>AÇÕES</th>
    </tr>
    <?php foreach($lista as $usuario): ?>
        <tr>
            <td><?php echo $usuario['id'] ;?> </td>
            <td><?php echo $usuario['nome'] ;?></td>
            <td><?php echo $usuario['email'] ;?></td>
            <td>
                <a href="editar.php?id=<?php echo $usuario['id'];?>">[ Editar ]</a>
                <a href="excluir.php?id=<?php echo $usuario['id'];?>" onclick="return confirm('Tem certeza que deseja excluir?')">[ Excluir ]</a>
            </td>
        </tr>
    <?php endforeach ?>
   
</table>