<div class="col-md-12">
    <a href="<?php echo BASE; ?>/form-sistema/cliente/" class="btn btn-success duz"><span class="glyphicon glyphicon-plus"></span> Adicionar cliente</a>
    <!-- Advanced Tables -->
    <div class="panel panel-default">
        <div class="panel-heading">
          Cliente
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Funcionário:</th>
                            <th>Cliente:</th>
                            <th>Email:</th>
                            <th>Telefone:</th>                            
                            <th>Data de cadastro:</th>                            
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php
					$sql_cliente = "SELECT * FROM tb_cliente";
					$total_cliente = $ver_cliente->totalRegistros($sql_cliente);
					for($c = 0; $c < $total_cliente; $c++){
						$ver_cliente-> verDados($sql_cliente,$c);
						$id 						= $ver_cliente->getId();
						$idtb_usuario_do_sistema 	= $ver_cliente->getIdtb_usuario_do_sistema();
						$cliente_nome 				= $ver_cliente->getCliente_nome();
						$cliente_email 				= $ver_cliente->getCliente_email();
						$cliente_telefone 			= $ver_cliente->getCliente_telefone();
						$cliente_data 				= $ver_cliente->getCliente_data();
						$cliente_obsevacoes 		= $ver_cliente->getCliente_obsevacoes ();	

                        $ver_user->setId($idtb_usuario_do_sistema);
                        $ver_user->mostrarDados();                  
                        $nome_funcionário   = $ver_user->getUs_nome();  						
						
					?>
                        <tr class="odd gradeX">
                            <td><?php echo $nome_funcionário;?></td>
                            <td><?php echo $cliente_nome;?></td>
                            <td><?php echo $cliente_email;?></td>
                            <td><?php echo $cliente_telefone;?></td>
                            <td><?php echo formDate($cliente_data);?></td>
                                                      
                            <td class="center"><a href="<?php echo BASE; ?>/form-sistema/cliente/<?php echo $id;?>/Alterar/" class="btn btn-primary duz"><i class="fa fa-pencil"></i> Editar</a></td>
                            <td class="center">							
								<form name="excluir" action="<?php echo BASE;?>/model/funcoes_genericas.php" enctype="multipart/form-data" method="post">
								<input type="hidden" name="nomeTabela" 	value="tb_cliente"/>								
								<input type="hidden" name="nomeDoArquivo" 		value="<?php echo $XXX;?>"/> 
								<input type="hidden" name="nomeDoDiretorio" 	value=""/>
								<input type="hidden" name="valorDoId" value="<?php echo $id;?>"/> 
								<input type="hidden" name="nomeDoCampoDoId" value="id"/> 
								<input type="hidden" name="identificacaoAcao" value="0"/> 
								<input type="hidden" name="acao" value="EXCLUIR_GERAL"/>
								<button class="btn btn-danger"><i class="fa fa-trash-o fa-lg"></i> Delete</button>
								</form>
                            </td>
                        </tr>
						<?php } ?>                        					
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--End Advanced Tables -->
</div>
</div>
</div>
</div>

