<?php

require_once("../../../conexao.php");
$tabela = 'cargos';

$query = $pdo->query("SELECT * FROM $tabela ORDER BY id desc ");
$result = $query->fetchAll(PDO::FETCH_ASSOC);
$total_result = count($result);
if ($total_result > 0) {

echo <<<HTML

<small>
<div class="container-table">          
  <table class="table table-hover" style="font-size:12px" id="tabela">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Ações</th>
      </tr>
    </thead>
    
    <tbody>
HTML;

for($i=0; $i < $total_result; $i++){
	foreach ($result[$i] as $key => $value){}
	$id = $result[$i]['id'];
	$nome = $result[$i]['nome'];
	
echo <<<HTML
      <tr class="">
        <td>  
        {$nome}</td>

        <td>
		<big><a href="#" onclick="editar('{$id}','{$nome}')" title="Editar Dados"><i class="fa fa-edit text-primary"></i></a></big>

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

		</td>

HTML;


}

echo <<<HTML
    </tbody>
    <small><div align="center" id="mensagem-excluir"></div></small>
  </table>
</div>
</small>

HTML;


} else {
    echo '<small> Não possui nenhum registro Cadastrado. </small>';
}

?>

<!-- Inserindo datatables para paginação e controle da tabela -->
<script type="text/javascript"> 
	$(document).ready( function () {
    $('#tabela').DataTable();
} );

</script>

<script type="text/javascript"> 

function editar(id, nome) {
		
	$('#titulo_inserir').text('Editar Registro');
	$('#id').val(id);
	$('#nome').val(nome);

	$('#modalForm').modal('show');
}
function limparCampos() {	
		$('#nome').val('');
}

</script>