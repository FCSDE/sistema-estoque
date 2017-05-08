<div class="col-md-12">
    <a href="<?php echo BASE; ?>/form-sistema/categoria/" class="btn btn-success duz"><span class="glyphicon glyphicon-plus"></span> Adicionar categoria</a>
    <!-- Advanced Tables -->
    <div class="panel panel-default">
        <div class="panel-heading">
            Advanced Tables
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Categoria:</th>
                            <th>Ordem de exibição:</th>
                            <th>Status</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php					
					$sql_categoria = "SELECT * FROM tb_categoria";
					$total_categoria = $ver_categoria->totalRegistros($sql_categoria);
					for($cat = 0; $cat < $total_categoria; $cat++){
					$ver_categoria-> verDados($sql_categoria,$cat);
					$id 			= 	$ver_categoria->getId();
					$cat_categoria	=	$ver_categoria->getCat_categoria();
					$cat_bloqueio	=	$ver_categoria->getCat_bloqueio();
					$cat_slug		=	$ver_categoria->getCat_slug();
					$cat_ordem		=	$ver_categoria->getCat_ordem ();
								
					if($cat_bloqueio == "N"){
						$nomeStatus = "Desativado";
						$class = "bg-warning";
						$bt = "btn btn-warning";
						$status_mostra = "S";
					}else{
						$nomeStatus = "Ativo";
						$class = "bg-default";
						$bt = "btn btn-info";
						$status_mostra = "N";
					}
					?>
                        <tr class="odd gradeX">
                            <td><?php echo $cat_categoria;?></td>
                            <td><?php echo $cat_ordem;?></td>
                            <td>
							<form name="congelar" action="<?php echo BASE;?>/model/funcoes_genericas.php" method="post">								
								<input type="hidden" name="nomeTabela" 	value="tb_categoria"/>
								<input type="hidden" name="nomeDoCampoDoId" value="id"/>
								<input type="hidden" name="valorDoId" 	value="<?php echo $id;?>"/>
								<input type="hidden" name="nomeDoCampoDatabela" value="cat_bloqueio"/> 
								<input type="hidden" name="valorDoCampo" value="<?php echo $status_mostra;?>"/>
								<input  type="hidden" name="acao" value="CONGELA_GERAL" />
								<button class="<?php echo $bt;?>"><?php echo $nomeStatus;?></button>
							</form>
							
							</td>                            
                            <td class="center"><a href="<?php echo BASE; ?>/form-sistema/categoria/<?php echo $id;?>/Alterar/" class="btn btn-primary duz"><i class="fa fa-pencil"></i> Editar</a></td>
                            <td class="center">							
								<form name="excluir" action="<?php echo BASE;?>/model/funcoes_genericas.php" enctype="multipart/form-data" method="post">
								<input type="hidden" name="nomeTabela" 	value="tb_categoria"/>								
								<input type="hidden" name="nomeDoArquivo" 		value="<?php echo $XXX;?>"/> 
								<input type="hidden" name="nomeDoDiretorio" 	value=""/>
								<input type="hidden" name="valorDoId" value="<?php echo $id;?>"/> 
								<input type="hidden" name="nomeDoCampoDoId" value="id"/> 
								<input type="hidden" name="identificacaoAcao" value="1"/> 
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

