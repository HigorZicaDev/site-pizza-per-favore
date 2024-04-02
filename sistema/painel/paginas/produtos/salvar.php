<?php 
require_once("../../../conexao.php");
$tabela = 'produtos';

$id = $_POST['id'];
$nome = $_POST['nome'];
$categoria = $_POST['categoria'];
$preco = $_POST['preco'];
$preco = str_replace(',', '.', $preco);
$calorias = $_POST['calorias'];
$destaque = $_POST['destaque'];
$descricao = $_POST['descricao'];

if ($destaque == 0) {
    echo 'Selecione a opção de Destaque!';
    exit();
}


//validar nome
$query = $pdo->query("SELECT * from $tabela where nome = '$nome'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
if(@count($res) > 0 and $id != $res[0]['id']){
	echo 'Nome já Cadastrado, escolha outro!';
	exit();
}

//validar troca da foto
$query = $pdo->query("SELECT * FROM $tabela where id = '$id'");
$result = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($result);
if($total_reg > 0){
	$foto = $result[0]['foto'];
}else{
	$foto = 'sem-foto.jpg';
}

//SCRIPT PARA SUBIR FOTO NO SERVIDOR
$nome_img = @$_FILES['foto']['name'];

$caminho = '../../../../img/cardapio/' .$nome_img;

$imagem_temp = @$_FILES['foto']['tmp_name']; 

if(@$_FILES['foto']['name'] != ""){
	$ext = pathinfo($nome_img, PATHINFO_EXTENSION);   
	if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'gif'){ 
	
			//EXCLUO A FOTO ANTERIOR
			if($foto != "sem-foto.jpg"){
				@unlink('../../../../img/cardapio/'.$foto);
			}

			$foto = $nome_img;
		
		move_uploaded_file($imagem_temp, $caminho);
	}else{
		echo 'Extensão de Imagem não permitida!';
		exit();
	}
}


if($id == ""){
	$query = $pdo->prepare("INSERT INTO $tabela SET nome = :nome, categoria = '$categoria', preco = :preco,
    calorias = :calorias, destaque = '$destaque', descricao = :descricao, foto = '$foto' ");
}else{
	$query = $pdo->prepare("UPDATE $tabela SET nome = :nome, categoria = '$categoria', preco = :preco,
    calorias = :calorias, destaque = '$destaque', descricao = :descricao, foto = '$foto'
    WHERE id = '$id'");
}

$query->bindValue(":nome", "$nome");
$query->bindValue(":preco", "$preco");
$query->bindValue(":calorias", "$calorias");
$query->bindValue(":descricao", "$descricao");
$query->execute();

echo 'Salvo com Sucesso';
 ?>