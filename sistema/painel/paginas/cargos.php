<?php

@session_start();
require_once("verificar.php");
require_once("../conexao.php");

$pag = 'cargos';


?>

<div class="">      
	<a onclick= "inserir()" class="btn btn-primary btn-flat btn-pri espaço"><i class="fa fa-plus" aria-hidden="true" ></i>Cadastrar Novo Cargo</a>
</div>
<div class="bs-example widget-shadow" style="padding:15px" id="listar">
    
</div>


<!-- Modal Inserir Novos Usuarios -->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="margin-top:3px">
				<h4 class="modal-title" ><span id="titulo_inserir"></span></h4>
				<button id="btn-fechar" type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px">
					<span aria-hidden="true" >&times;</span>
				</button>
			</div>
            <form id="form" >
                <!-- Local aonde vai abrigar o modal que abre ao clicar no icone da tabela visualizar -->
				<div class="modal-body">
                    <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Cargo: </label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira o nome do cargo" required>    
                                </div> 	
                            </div>
                            <div class="col-md-4" style="margin-top:40px;">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </div>
                      
                            <input type="hidden" name="id" id="id">

                        <br>
                        <small><div id="mensagem" align="center"></div></small>

                </div>
			</form>

                
            </div>
        </div>
    </div>



<script type="text/javascript"> var pag= "<?=$pag?>"</script>
<script src="js/ajax.js"></script>