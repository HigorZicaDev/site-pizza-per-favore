<?php 
require_once("../../../conexao.php");
$tabela = 'produtos';

$query = $pdo->query("SELECT * FROM $tabela ORDER BY id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){

echo <<<HTML
	<small>
	<table class="table table-hover" id="tabela">
	<thead> 
	<tr> 
	<th>Nome</th>	
	<th class="esc">Categoria</th> 	
	<th class="esc">Preço</th> 	
	<th class="esc">Calorias</th>
	<th class="esc">Destaque</th>  	
	<th>Ações</th>
	</tr> 
	</thead> 
	<tbody>	
HTML;

for($i=0; $i < $total_reg; $i++){
	foreach ($res[$i] as $key => $value){}
	$id = $res[$i]['id'];
	$nome = $res[$i]['nome'];
	$categoria = $res[$i]['categoria'];
	$descricao = $res[$i]['descricao'];
	$preco = $res[$i]['preco'];
	$calorias = $res[$i]['calorias'];
	$destaque = $res[$i]['destaque'];

	$foto = $res[$i]['foto'];


	if($destaque == 'Sim'){
			$icone = 'fa-check-square';
			$titulo_link = 'Desativar Item';
			$acao = 'Não';
			$classe_linha = '';
		}else{
			$icone = 'fa-square-o';
			$titulo_link = 'Ativar Item';
			$acao = 'Sim';
			$classe_linha = 'text-muted';
		}


echo <<<HTML
<tr class="{$classe_linha}">
<td>
<img src="img/produtos/{$foto}" width="27px" class="mr-2">
{$nome}
</td>
<td class="esc">{$categoria}</td>
<td class="esc">R$ {$preco}</td>
<td class="esc">{$calorias}</td>
<td class="esc">{$destaque}</td>
<td>
		<big><a href="#" onclick="editar('{$id}','{$nome}', '{$categoria}', '{$preco}', '{$calorias}', '{$descricao}', 
		'{$destaque}', '{$foto}')" title="Editar Dados"><i class="fa fa-edit text-primary"></i></a></big>

		<big><a href="#" onclick="mostrar('{$nome}', '{$categoria}', '{$preco}', '{$calorias}', 
		'{$destaque}', '{$descricao}', '{$foto}')" title="Ver Dados">
		<i class="fa fa-info-circle text-secondary"></i></a></big>



		<li class="dropdown head-dpdn2" style="display: inline-block;">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><big><i class="fa fa-trash-o text-danger"></i></big></a>

		<ul class="dropdown-menu" style="margin-left:-230px;">
		<li>
		<div class="notification_desc2">
		<p>Confirmar Exclusão? <a href="#" onclick="excluir('{$id}')"><span class="text-danger">Sim</span></a></p>
		</div>
		</li>										
		</ul>
		</li>



		<big><a href="#" onclick="ativar('{$id}', '{$acao}')" title="{$titulo_link}"><i 
		class="fa {$icone} text-success"></i></a></big>


		</td>
</tr>
HTML;

}

echo <<<HTML
</tbody>
<small><div align="center" id="mensagem-excluir"></div></small>
</table>
</small>
HTML;


}else{
	echo 'Não possui nenhum registro Cadastrado!';
}

?>

<script type="text/javascript"> 

function editar(id, nome, categoria, preco, calorias, destaque, descricao, foto) {

	$('#id').val(id);
	$('#nome').val(nome);
	$('#categoria').val(categoria);
	$('#preco').val(preco);
	$('#calorias').val(calorias);
	$('#destaque').val(destaque);
	$('#descricao').val(descricao);
	$('#titulo_inserir').text('Editar Registro');
	$('#modalForm').modal('show');

	$('#target_mostrar').attr('src','img/produtos/' + foto);
}
function limparCampos() {	
		$('#nome').val('');
		$('#categoria').val('');
		$('#preco').val('');
		$('#destaque').val('');
		$('#descricao').val('');

		$('#target_mostrar').attr('src','img/produtos/sem-foto.jpg');
}

</script>

<script type="text/javascript">
	function mostrar(nome, categoria, preco, calorias, destaque, descricao, foto){

		$('#nome_dados').text(nome);
		$('#categoria_dados').text(categoria);
		$('#preco_dados').text(preco);
		$('#calorias_dados').text(calorias);
		$('#destaque_dados').text(destaque);
		$('#descricao_dados').text(descricao);

		$('#target_mostrar').attr('src','img/perfil/' + foto);

		$('#modalDados').modal('show');
	}
</script>