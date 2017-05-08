<div class="col-md-12">
<?php
	if($_SESSION['SESSIONNIVEL'] != 3){$disabled = "disabled";}
?>
    <a href="<?php echo BASE; ?>/form-sistema/usuarios/" class="btn btn-success duz"><span class="glyphicon glyphicon-plus"></span> Adicionar usuário</a>
    <!-- Advanced Tables -->
    <div class="panel panel-default">
        <div class="panel-heading">
        Usuários do sistema
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Nome:</th>
                            <th>E-mail:</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
					<?php
					$sql_user = "SELECT * FROM tb_usuario WHERE us_nivel = '2' OR us_nivel = '3'";
					$total_user = $ver_user->totalRegistros($sql_user);
					for($us = 0; $us < $total_user; $us++){
					$ver_user-> verDados($sql_user,$us);					
					$id					=	$ver_user->getId();					
					$us_login			= 	$ver_user->getUs_login();
					$us_password		= 	$ver_user->getUs_password();
					$us_codRecupera		= 	$ver_user->getUs_codRecupera();
					$us_dataCadastrado	= 	$ver_user->getUs_dataCadastrado();
					$us_nivel			= 	$ver_user->getUs_nivel();
					$us_bloqueio		= 	$ver_user->getUs_bloqueio();
					$us_codRegistro		= 	$ver_user->getUs_codRegistro();
					$us_nome			= 	$ver_user->getUs_nome();
									
					if($us_bloqueio == 0){
						$nomeStatus = "Desativado";
						$class = "bg-warning";
						$bt = "btn btn-warning";
						$status_mostra = 1;
					}else{
						$nomeStatus = "Ativo";
						$class = "bg-default";
						$bt = "btn btn-info";
						$status_mostra = 0;
					}	
					if($us_nivel == 3){$disabled = "disabled";}else{$disabled = "";}				
					
					?>
                        <tr class="odd gradeX">
                            <td><?php echo $us_nome;?></td>                           
                            <td><?php echo $us_login;?></td>                           
                            <td class="center"><a href="<?php echo BASE; ?>/form-sistema/usuarios/<?php echo $id;?>/Alterar/" class="btn btn-info duz"><span class="fa fa-pencil"></span> Editar</a></td>                           
                            <td>
								<form name="excluir" action="<?php echo BASE;?>/model/funcoes_genericas.php" enctype="multipart/form-data" method="post">
								<input type="hidden" name="nomeTabela" 	value="tb_usuario"/>								
								<input type="hidden" name="nomeDoArquivo" 		value="<?php echo $XXX;?>"/> 
								<input type="hidden" name="nomeDoDiretorio" 	value=""/>
								<input type="hidden" name="valorDoId" value="<?php echo $id;?>"/> 
								<input type="hidden" name="nomeDoCampoDoId" value="id"/> 
								<input type="hidden" name="identificacaoAcao" value="0"/> 
								<input type="hidden" name="acao" value="EXCLUIR_GERAL"/>
								<button class="btn btn-danger" <?php echo $disabled;?>><span class="fa fa-trash-o"></span> Excluir</button>
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

