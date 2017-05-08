<div class="col-md-12">
    <a href="<?php echo BASE; ?>/form-sistema/produto/" class="btn btn-success duz"><span class="glyphicon glyphicon-plus"></span> Adicionar produto</a>
    <!-- Advanced Tables -->
    <div class="panel panel-default">
        <div class="panel-heading">
          produto
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Funcionário:</th>
                            <th>Fornecedor:</th>
                            <th>Categoria:</th>
                            <th>Produto:</th>
                            <th>Preço R$:</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php
					$sql_produto = "SELECT * FROM tb_produto";
					$total_produto = $ver_produto->totalRegistros($sql_produto);
					for($p = 0; $p < $total_produto; $p++){
						$ver_produto-> verDados($sql_produto,$p);
						$id 						= $ver_produto->getId();
						$tb_usuario_do_sistema 		= $ver_produto->getIdtb_usuario_do_sistema();
						$produto_titulo 			= $ver_produto->getProduto_titulo();
						$produto_descricao 			= $ver_produto->getProduto_descricao();
						$produto_preco 				= $ver_produto->getProduto_preco();
						$produto_data 				= $ver_produto->getProduto_data ();	

						$idtb_categoria 			= $ver_produto->getIdtb_categoria();
						$idtb_fornecedor 			= $ver_produto->getIdtb_fornecedor();

						//funcionário	
						$ver_user->setId($tb_usuario_do_sistema);
						$ver_user->mostrarDados(); 					
						$nome_funcionário 	= $ver_user->getUs_nome();

						//fornecedor	
						$ver_fornecedor->setId($idtb_fornecedor);
						$ver_fornecedor->mostrarDados(); 					
						$td_fornecedor_empresa 	= $ver_fornecedor->getTd_fornecedor_empresa();

						//Categoria
						$ver_categoria->setId($idtb_categoria);
						$ver_categoria->mostrarDados();
						$cat_categoria	= $ver_categoria->getCat_categoria();						
						
					?>
                        <tr class="odd gradeX">
                            <td><?php echo $nome_funcionário;?></td>                           
                            <td><?php echo lmWord($td_fornecedor_empresa,80);?></td>
                            <td><?php echo lmWord($cat_categoria,80);?></td>
                             <td><?php echo lmWord($produto_titulo,80);?></td>
                            <td>R$ <?php echo $produto_preco;?></td>
                                                      
                            <td class="center"><a href="<?php echo BASE; ?>/form-sistema/produto/<?php echo $id;?>/Alterar/" class="btn btn-primary duz"><i class="fa fa-pencil"></i> Editar</a></td>
                            <td class="center">							
								<form name="excluir" action="<?php echo BASE;?>/model/funcoes_genericas.php" enctype="multipart/form-data" method="post">
								<input type="hidden" name="nomeTabela" 	value="tb_produto"/>								
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

