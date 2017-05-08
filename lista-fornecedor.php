<div class="col-md-12">
    <a href="<?php echo BASE; ?>/form-sistema/fornecedor/" class="btn btn-success duz"><span class="glyphicon glyphicon-plus"></span> Adicionar fornecedor</a>
    <!-- Advanced Tables -->
    <div class="panel panel-default">
        <div class="panel-heading">
          Fornecedor
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Empresa:</th>
                            <th>Representante 1:</th>
                            <th>Representante 2:</th>                            
                            <th>Data de cadastro:</th>                            
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php
					$sql_fornecedor = "SELECT * FROM td_fornecedor";
					$total_fornecedor = $ver_fornecedor->totalRegistros($sql_fornecedor);
					for($for = 0; $for < $total_fornecedor; $for++){
						$ver_fornecedor-> verDados($sql_fornecedor,$for);
						$id 							= $ver_fornecedor->getId();
						$idtb_usuario_do_sistema 		= $ver_fornecedor->getIdtb_usuario_do_sistema();
						$td_fornecedor_empresa 			= $ver_fornecedor->getTd_fornecedor_empresa();
						$td_fornecedor_representante1 	= $ver_fornecedor->getTd_fornecedor_representante1();
						$td_fornecedor_representante2 	= $ver_fornecedor->getTd_fornecedor_representante2();
						$td_fornecedor_datatime 		= $ver_fornecedor->getTd_fornecedor_datatime();
						$td_fornecedor_observacoes 		= $ver_fornecedor->getTd_fornecedor_observacoes();								
						
					?>
                        <tr class="odd gradeX">
                            <td><?php echo $td_fornecedor_empresa;?></td>
                            <td><?php echo $td_fornecedor_representante1;?></td>
                            <td><?php echo $td_fornecedor_representante2;?></td>
                            <td><?php echo formDate($td_fornecedor_datatime);?></td>
                                                      
                            <td class="center"><a href="<?php echo BASE; ?>/form-sistema/fornecedor/<?php echo $id;?>/Alterar/" class="btn btn-primary duz"><i class="fa fa-pencil"></i> Editar</a></td>
                            <td class="center">							
								<form name="excluir" action="<?php echo BASE;?>/model/funcoes_genericas.php" enctype="multipart/form-data" method="post">
								<input type="hidden" name="nomeTabela" 	value="td_fornecedor"/>								
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

