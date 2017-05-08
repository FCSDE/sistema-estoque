<?php
	$sql_cliente_count = "SELECT * FROM tb_cliente";
	$total_cliente_count = $ver_cliente->totalRegistros($sql_cliente_count);

	$sql_produto_count = "SELECT * FROM tb_produto";
	$total_produto_count = $ver_produto->totalRegistros($sql_produto_count);

	$sql_pedido_count = "SELECT * FROM tb_pedido";
	$total_pedido_count = $ver_pedido->totalRegistros($sql_pedido_count);

?>
	<div class="row">
	
		<!--BLOCO DE PEDIDO-->
		<a href="<?php echo BASE;?>/lista-cliente/">
		<div class="col-md-4 col-sm-6 col-xs-6">
			<div class="panel panel-back noti-box">
				<span class="icon-box bg-color-black set-icon"><i class="glyphicon glyphicon-user"></i></span>
				<div class="text-box" >
					<p class="main-text" style="font-size:18px">Clientes cadastrados</p>
					<p class="text-muted"><?php echo $total_cliente_count;?></p>
				</div>
			</div>
		</div>
		</a>
		
		<!--BLOCO DE PEDIDO-->
		<a href="<?php echo BASE;?>/lista-produto/">
		<div class="col-md-4 col-sm-6 col-xs-6">
			<div class="panel panel-back noti-box">
				<span class="icon-box bg-color-green set-icon"><i class="glyphicon glyphicon-th-large"></i></span>
				<div class="text-box" >
					<p class="main-text" style="font-size:18px">Produtos</p>
					<p class="text-muted"><?php echo $total_produto_count;?></p>
				</div>
			</div>
		</div>
		</a>
		
		<!--BLOCO DE PEDIDO-->
		<a href="<?php echo BASE;?>/lista-pedido/">
		<div class="col-md-4 col-sm-6 col-xs-6">
			<div class="panel panel-back noti-box">
				<span class="icon-box bg-color-blue set-icon"><i class="fa fa-rocket"></i></span>
				<div class="text-box" >
					<p class="main-text" style="font-size:18px">Pedidos</p>
					<p class="text-muted"><?php echo $total_pedido_count;?></p>
				</div>
			</div>
		</div>
		</a>	
	
	</div>

	<div class="row">
    <!-- Advanced Tables -->
     <a href="#" class="btn btn-success duz" data-toggle="modal" data-target="#myFormPedido"><span class="glyphicon glyphicon-plus"></span> Fazer pedido</a>
    <div class="panel panel-default">
        <div class="panel-heading">
            Pedidos
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            
                            <th>Funcionário:</th>
                            <th>Códido:</th>
                            <th>Cliente:</th>
                            <th>Títuo do pedido:</th>
                            <th>Produto:</th>
                            <th>Preço R$:</th>
                            <th>Data:</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php					
					if($_SESSION['SESSIONNIVEL'] != 3){$disabled = 'disabled="disabled"';}
					$sql_pedido = "SELECT * FROM tb_pedido";
					$total_pedido = $ver_pedido->totalRegistros($sql_pedido);
					for($pp = 0; $pp < $total_pedido; $pp++){
						$ver_pedido-> verDados($sql_pedido,$pp);
						$id 						= $ver_pedido->getId();
						$idtb_usuario_do_sistema 	= $ver_pedido->getIdtb_usuario_do_sistema();
						$idtb_cliente 				= $ver_pedido->getIdtb_cliente();
						$idtb_produto 				= $ver_pedido->getIdtb_produto();
						$pedido_data 				= $ver_pedido->getPedido_data();
						$pedido_codigo 				= $ver_pedido->getPedido_codigo();			
						$pedido_titulo 				= $ver_pedido->getPedido_titulo();			
						$pedido_observacoes 		= $ver_pedido->getPedido_observacoes();			


						//funcionário	
						$ver_user->setId($idtb_usuario_do_sistema);
						$ver_user->mostrarDados(); 					
						$nome_funcionário 	= $ver_user->getUs_nome();

						//ver_produto	
						$ver_produto->setId($idtb_produto);
						$ver_produto->mostrarDados(); 					
						$produto_titulo 			= $ver_produto->getProduto_titulo();
						$produto_preco 				= $ver_produto->getProduto_preco();

						//ver_cliente
						$ver_cliente->setId($idtb_cliente);
						$ver_cliente->mostrarDados();
						$cliente_nome 				= $ver_cliente->getCliente_nome();					
						
					?>
                        <tr class="odd gradeX">
                        	<td><?php echo $nome_funcionário;?></td>
                            <td><?php echo $pedido_codigo;?></td>                           
                            <td><?php echo $cliente_nome;?></td>                   
                            <td><?php echo lmWord($pedido_titulo,80);?></td>
                            <td><?php echo lmWord($produto_titulo,80);?></td>
                            <td><?php echo lmWord($produto_preco,80);?></td>
                            <td><?php echo formDate($pedido_data);?></td>                                                      
                            
                            <td class="center">							
								<form name="excluir" action="<?php echo BASE;?>/model/funcoes_genericas.php" enctype="multipart/form-data" method="post">
								<input type="hidden" name="nomeTabela" 	value="tb_pedido"/>								
								<input type="hidden" name="nomeDoArquivo" 		value="<?php echo $XXX;?>"/> 
								<input type="hidden" name="nomeDoDiretorio" 	value=""/>
								<input type="hidden" name="valorDoId" value="<?php echo $id;?>"/> 
								<input type="hidden" name="nomeDoCampoDoId" value="id"/> 
								<input type="hidden" name="identificacaoAcao" value="0"/> 
								<input type="hidden" name="acao" value="EXCLUIR_GERAL"/>
								<button class="btn btn-danger"<?php echo $disabled;?>><i class="fa fa-trash-o fa-lg"></i> Delete</button>
								</form>
                            </td>
                        </tr>
						<?php } ?>                        					
                    </tbody>
                </table>
            </div>
        </div>
    </div>
	</div>
    <!--End Advanced Tables -->





    <!-- Modal -->
<div class="modal fade" id="myFormPedido" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Formulário de pedido</h4>
      </div>
      <div class="modal-body">	 
		<form name="frmgenerico" action="<?php echo BASE;?>/model/model-sistema.php" method="post" enctype="multipart/form-data" role="form" id="<?php echo BASE;?>/lista-pedido/">								
		<div class="form-group col-md-12">
			<label>Título do pedido:</label>
		    <input name="pedido_titulo" class="form-control" maxlength="80"  placeholder="Título do pedido" />
		</div>

		<div class="form-group col-md-6">
			<label>Escolha o cliente</label>
		    <select class="form-control" name="idtb_cliente">
		    	<option value="0">Selecione o cliente</option>
				<?php 
				$cl  = new DadosCliente; 
				$cl->ListaClientes($idtb_cliente);?>
			</select>
		</div>

		<div class="form-group col-md-6">
			<label>Escolha o produto</label>
		    <select class="form-control" name="idtb_produto">
		    	<option value="0">Selecione o produto</option>
				<?php $ver_produto->ListaProduto($idtb_produto);?>
			</select>
		</div>
		<div class="form-group col-md-12">
			 <label>Observações:</label>
			 <textarea class="form-control" name="pedido_observacoes" rows="4"></textarea>
		</div>

		<div class="form-group col-md-12">
			<div class="msg">
				<img class="img_img" src="<?php echo BASE;?>/img/loader.gif" width="15" height="15"> 
				<span style="margin-left:25px"></span>
			</div>
		</div>
		<div class="form-group col-md-12">
			<input name="acao" type="hidden" value="CADPEDIDO">
			<input name="idtb_usuario_do_sistema" type="hidden" value="<?php echo $_SESSION['SESSIONID'];?>">
			<button type="submit" class="btn btn-success">Fazer pedido</button>
		</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">x</button>
      </div>
    </div>
  </div>
</div>


