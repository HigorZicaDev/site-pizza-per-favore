<?php 
@session_start();
require_once("verificar.php");
require_once("../conexao.php");

$pag = 'produtos';
?>

<div class="">      
	<a class="btn btn-primary" onclick="inserir()">Novo Produto</a>
</div>

<div class="bs-example widget-shadow" style="padding:15px" id="listar">
	
</div>


<!-- Modal Inserir-->
<div class="modal fade" id="modalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><span id="titulo_inserir"></span></h4>
				<button id="btn-fechar" type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px">
					<span aria-hidden="true" >&times;</span>
				</button>
			</div>
			<form id="form">
			<div class="modal-body">

					<div class="row">
						<div class="col-md-7">
							<div class="form-group">
								<label for="exampleInputEmail1">Nome</label>
								<input type="text" class="form-control" id="nome" name="nome" placeholder="Nome" required>    
							</div> 	
						</div>
						<div class="col-md-5">
							
							<div class="form-group">
								<label for="exampleInputEmail1">Categoria</label>
								<select class="form-control sel2" id="categoria" name="categoria" style="width:100%;" > 

									<?php 
									$query = $pdo->query("SELECT * FROM categorias ORDER BY nome asc");
									$res = $query->fetchAll(PDO::FETCH_ASSOC);
									$total_reg = @count($res);
									if($total_reg > 0){
										for($i=0; $i < $total_reg; $i++){
										foreach ($res[$i] as $key => $value){}
										echo '<option value="'.$res[$i]['nome'].'">'.$res[$i]['nome'].'</option>';
										}
									}else{
											echo '<option value="0">Cadastre um Cargo</option>';
										}
									 ?>
									

								</select>   
							</div> 	
						</div>
					</div>


					<div class="row">
						<div class="col-md-12">						
							<div class="form-group"> 
								<label>Descrição do Prato: <small>(<span id="cont">500</span> Restantes) <br></small></label> 
								
								<textarea onkeyup="limite_textarea(this.value)" cols="30" rows="5" maxlength="500" type="text" 
								class="form-control" name="descricao" id="descricao"></textarea>
							</div>						
						</div>
					</div>

					

					<div class="row">
						<div class="col-md-5">
							<div class="form-group">
								<label for="exampleInputEmail1">Preço R$</label>
								<input type="text" class="form-control" id="preco" name="preco" >    
							</div> 	
						</div>
						<div class="col-md-5">
							<div class="form-group">
								<label for="exampleInputEmail1">Nº de Calorias</label>
								<input type="text" class="form-control" id="calorias" name="calorias" >    
							</div> 	
						</div>
						<div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Destaque</label>
                                    <select type="text" class="form-control" id="destaque" name="destaque" style="width:100%;" style="align:center;" >  
                                            <option value= "SIM">SIM</option>
                                            <option value= "NÃO">NÃO</option>

                                    </select>     
                                </div> 	
                        </div>
						
					</div>

						<div class="row">
							<div class="col-md-8">						
								<div class="form-group"> 
									<label>Foto</label> 
									<input class="form-control" type="file" name="foto" onChange="carregarImg();" id="foto">
								</div>						
							</div>
							<div class="col-md-4">
								<div id="divImg">
									<img src="img/produtos/sem-foto.jpg"  width="80px" id="target">									
								</div>
							</div>

						</div>


					
						<input type="hidden" name="id" id="id">

					<br>
					<small><div id="mensagem" align="center"></div></small>
				</div>

				<div class="modal-footer">      
					<button type="submit" class="btn btn-primary">Salvar</button>
				</div>
			</div>
			</form>

			
		</div>
	</div>
</div>




<!-- Modal Dados-->
<div class="modal fade" id="modalDados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="exampleModalLabel"><span id="nome_dados"></span></h4>
				<button id="btn-fechar-perfil" type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top: -20px">
					<span aria-hidden="true" >&times;</span>
				</button>
			</div>
			
			<div class="modal-body">

				<div class="row" style="border-bottom: 1px solid #cac7c7;">
					<div class="col-md-6">							
						<span><b>Categoria: </b></span>
						<span id="categoria_dados"></span>							
					</div>
					<div class="col-md-6">							
						<span><b>Preço R$:</b></span>
						<span id="preco_dados"></span>
					</div>					

				</div>

				<div class="row" style="border-bottom: 1px solid #cac7c7;">
					<div class="col-md-6">							
						<span><b>Calorias: </b></span>
						<span id="calorias_dados"></span>								
					<div class="col-md-6">							
						<span><b>Destaque:</b></span>
						<span id="destaque_dados"></span>
					</div>				

				</div>


				<div class="row" style="border-bottom: 1px solid #cac7c7;">
					
					<div class="col-md-12">							
						<span><b>Descrição do Prato: </b></span>
						<span id="descricao_dados"></span>
					</div>					

				</div>


				<div class="row">
					<div class="col-md-12" align="center">		
						<img width="250px" id="target_mostrar">	
					</div>					
				</div>


			</div>

			
		</div>
	</div>
</div>





<script type="text/javascript">var pag = "<?=$pag?>"</script>
<script src="js/ajax.js"></script>

<script type="text/javascript">
	function carregarImg() {
    var target = document.getElementById('target');
    var file = document.querySelector("#foto").files[0];
    
        var reader = new FileReader();

        reader.onloadend = function () {
            target.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);

        } else {
            target.src = "";
        }
    }
</script>


<script type="text/javascript">
function limite_textarea(valor) {
    quant = 500;
    total = valor.length;
    if(total <= quant) {
        resto = quant - total;
        document.getElementById('cont').innerHTML = resto;
    } else {
        document.getElementById('texto').value = valor.substr(0,quant);
    }
}
</script>