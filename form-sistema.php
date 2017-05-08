	<?php
	include_once("_loaderclasses.php");
	$cad = new manipulacaoDeDados();
	$url = (isset($_GET['url'])) ? $_GET['url'] : '';
	$explode = explode('/', $url);
	$nomedapagina 	= $explode[1];
	$chave 			= $explode[2];
	$alterar 		= $explode[3];
	
	?>
	<div class="col-md-12">     
		<?php
		$acao = @mysql_real_escape_string($_POST['acao']);
		switch ($nomedapagina) {
			case 'categoria':
				if($alterar != ''){							
					$ver_categoria->setId($chave);
					$ver_categoria->mostrarDados(); 					
					$idcategoria 	= $ver_categoria->getId();
					$cat_categoria	= $ver_categoria->getCat_categoria();
					$cat_bloqueio	= $ver_categoria->getCat_bloqueio();
					$cat_slug		= $ver_categoria->getCat_slug();
					$cat_ordem		= $ver_categoria->getCat_ordem();
				}					
			?>
				<div class="panel panel-default">
					<div class="panel-heading">Cadastro de categoria</div>
					<div class="panel-body">
						<div class="row">
							<form name="frmgenerico" action="<?php echo BASE;?>/model/model-sistema.php" method="post" enctype="multipart/form-data" role="form" id="<?php echo BASE;?>/lista-categoria/">								
								<div class="form-group col-md-12">
									<label>Nome da categoria</label>
                                    <input name="categoria" class="form-control" value="<?php echo $cat_categoria;?>" placeholder="Nome da categoria" />
								</div>
								<div class="form-group col-md-12">
									 <label>Ordem de exibição</label>
                                    <input name="ordem" value="<?php echo $cat_ordem;?>" class="form-control" placeholder="Ordem da categoria" />
								</div>								
								<div class="form-group col-md-12">
									<div class="msg">
										<img class="img_img" src="<?php echo BASE;?>/img/loader.gif" width="15" height="15"> 
										<span style="margin-left:25px"></span>
									</div>
								</div>
								<div class="form-group col-md-12">
									<input name="acao" type="hidden" value="<?php if($alterar != ''){echo 'editarfrmcategoria';}else{echo 'cadfrmcategoria';}?>">
									<input name="id_categoria" type="hidden" value="<?php echo $idcategoria;?>">
									<button type="submit" class="btn btn-primary"><?php if($alterar != ''){echo $alterar;}else{echo 'Cadastrar';}?></button>
									<button type="reset" class="btn btn-danger"<?php if($alterar != ''){echo 'disabled';}?>>Limpar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<?php
			break;
			case 'fornecedor':
				if($alterar != ''){							
					$ver_fornecedor->setId($chave);
					$ver_fornecedor->mostrarDados(); 					
					$idtb_fornecedor 				= $ver_fornecedor->getId();
					$idtb_usuario_do_sistema 		= $ver_fornecedor->getIdtb_usuario_do_sistema();
					$td_fornecedor_empresa 			= $ver_fornecedor->getTd_fornecedor_empresa();
					$td_fornecedor_representante1 	= $ver_fornecedor->getTd_fornecedor_representante1();
					$td_fornecedor_representante2 	= $ver_fornecedor->getTd_fornecedor_representante2();
					$td_fornecedor_datatime 		= $ver_fornecedor->getTd_fornecedor_datatime();
					$td_fornecedor_observacoes 		= $ver_fornecedor->getTd_fornecedor_observacoes();

				}					
			?>
				<div class="panel panel-default">
					<div class="panel-heading">Fornecedor</div>
					<div class="panel-body">
						<div class="row">
							<form name="frmgenerico" action="<?php echo BASE;?>/model/model-sistema.php" method="post" enctype="multipart/form-data" role="form" id="<?php echo BASE;?>/lista-fornecedor/">								
								<div class="form-group col-md-12">
									<label>Nome da empresa:</label>
                                    <input name="td_fornecedor_empresa" class="form-control" maxlength="80" value="<?php echo $td_fornecedor_empresa;?>" placeholder="Nome da empresa" />
								</div>
								<div class="form-group col-md-12">
									 <label>Nome do representate principal:</label>
                                    <input name="td_fornecedor_representante1" maxlength="80" value="<?php echo $td_fornecedor_representante1;?>" class="form-control" placeholder="Nome do representate " />
								</div>	
								<div class="form-group col-md-12">
									 <label>Nome do representate 2:</label>
                                    <input name="td_fornecedor_representante2" maxlength="80" value="<?php echo $td_fornecedor_representante2;?>" class="form-control" placeholder="Nome do representate " />
								</div>
								<div class="form-group col-md-12">
									 <label>Observações:</label>
									 <textarea class="form-control" name="td_fornecedor_observacoes" rows="4"><?php echo $td_fornecedor_observacoes;?></textarea>
								</div>

								<div class="form-group col-md-12">
									<div class="msg">
										<img class="img_img" src="<?php echo BASE;?>/img/loader.gif" width="15" height="15"> 
										<span style="margin-left:25px"></span>
									</div>
								</div>
								<div class="form-group col-md-12">
									<input name="acao" type="hidden" value="<?php if($alterar != ''){echo 'EDFORNECEDOR';}else{echo 'CADFORNECEDOR';}?>">
									<input name="id" type="hidden" value="<?php echo $idtb_fornecedor;?>">
									<input name="idtb_usuario_do_sistema" type="hidden" value="<?php echo $_SESSION['SESSIONID'];?>">
									<button type="submit" class="btn btn-primary"><?php if($alterar != ''){echo $alterar;}else{echo 'Cadastrar';}?></button>
									<button type="reset" class="btn btn-danger"<?php if($alterar != ''){echo 'disabled';}?>>Limpar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">Bloco cadastro endereço <SMALL> <b>em construção</b></SMALL></div>
					<div class="panel-body">
						<div class="row"></div>
					</div>
				</div>
				<?php
			break;			
			case 'cliente':
				if($alterar != ''){							
					$ver_cliente->setId($chave);
					$ver_cliente->mostrarDados(); 					
					$idtb_cliente 				= $ver_cliente->getId();
					$idtb_usuario_do_sistema 	= $ver_cliente->getIdtb_usuario_do_sistema();
					$cliente_nome 				= $ver_cliente->getCliente_nome();
					$cliente_email 				= $ver_cliente->getCliente_email();
					$cliente_telefone 			= $ver_cliente->getCliente_telefone();
					$cliente_data 				= $ver_cliente->getCliente_data();
					$cliente_obsevacoes 		= $ver_cliente->getCliente_obsevacoes ();
				}					
			?>
				<div class="panel panel-default">
					<div class="panel-heading">Fornecedor</div>
					<div class="panel-body">
						<div class="row">
							<form name="frmgenerico" action="<?php echo BASE;?>/model/model-sistema.php" method="post" enctype="multipart/form-data" role="form" id="<?php echo BASE;?>/lista-cliente/">								
								<div class="form-group col-md-12">
									<label>Nome:</label>
                                    <input name="cliente_nome" class="form-control" maxlength="80" value="<?php echo $cliente_nome;?>" placeholder="Nome" />
								</div>
								<div class="form-group col-md-6">
									 <label>Nome do representate principal:</label>
                                    <input name="cliente_email" maxlength="80" value="<?php echo $cliente_email;?>" class="form-control" placeholder="E-mail" />
								</div>	
								<div class="form-group col-md-6">
									 <label>Número de contato:</label>
                                    <input name="cliente_telefone" maxlength="15" value="<?php echo $cliente_telefone;?>" class="form-control" placeholder="Telefone" onkeyup="maskIt(this,event,'## #####-####')"/>
								</div>
								<div class="form-group col-md-12">
									 <label>Observações:</label>
									 <textarea class="form-control" name="cliente_obsevacoes" rows="4"><?php echo $cliente_obsevacoes;?></textarea>
								</div>

								<div class="form-group col-md-12">
									<div class="msg">
										<img class="img_img" src="<?php echo BASE;?>/img/loader.gif" width="15" height="15"> 
										<span style="margin-left:25px"></span>
									</div>
								</div>
								<div class="form-group col-md-12">
									<input name="acao" type="hidden" value="<?php if($alterar != ''){echo 'EDCLIENTE';}else{echo 'CADCLIENTE';}?>">
									<input name="id" type="hidden" value="<?php echo $idtb_cliente;?>">
									<input name="idtb_usuario_do_sistema" type="hidden" value="<?php echo $_SESSION['SESSIONID'];?>">
									<button type="submit" class="btn btn-primary"><?php if($alterar != ''){echo $alterar;}else{echo 'Cadastrar';}?></button>
									<button type="reset" class="btn btn-danger"<?php if($alterar != ''){echo 'disabled';}?>>Limpar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">Bloco cadastro endereço <SMALL> <b>em construção</b></SMALL></div>
					<div class="panel-body">
						<div class="row"></div>
					</div>
				</div>
				<?php
			break;
			case 'produto':
				if($alterar != ''){							
					$ver_produto->setId($chave);
					$ver_produto->mostrarDados(); 					
						$idtb_produto 				= $ver_produto->getId();
						$tb_usuario_do_sistema 		= $ver_produto->getIdtb_usuario_do_sistema();
						$produto_titulo 			= $ver_produto->getProduto_titulo();
						$produto_descricao 			= $ver_produto->getProduto_descricao();
						$produto_preco 				= $ver_produto->getProduto_preco();
						$produto_data 				= $ver_produto->getProduto_data ();	

						$idtb_categoria 			= $ver_produto->getIdtb_categoria();
						$idtb_fornecedor 			= $ver_produto->getIdtb_fornecedor();
				}					
			?>
				<div class="panel panel-default">
					<div class="panel-heading">Fornecedor</div>
					<div class="panel-body">
						<div class="row">
							<form name="frmgenerico" action="<?php echo BASE;?>/model/model-sistema.php" method="post" enctype="multipart/form-data" role="form" id="<?php echo BASE;?>/lista-produto/">								
								<div class="form-group col-md-6">
									<label>Nome:</label>
                                    <input name="produto_titulo" class="form-control" maxlength="80" value="<?php echo $produto_titulo;?>" placeholder="Título do produto" />
								</div>
								<div class="form-group col-md-6">
									 <label>Valor R$: <small style="color: red">Use ponto ex 1500,99</small></label>
                                    <input id="dinheiro1" name="produto_preco" maxlength="80" value="<?php echo $produto_preco;?>" class="form-control" placeholder="EX 10,90" />
								</div>
								<div class="form-group col-md-6">
									<label>Escolha categoria</label>
                                    <select class="form-control" name="idtb_categoria">
                                    	<option value="0">Selecione uma categoria</option>
                						<?php $ver_categoria->ListaCategoria($idtb_categoria);?>
            						</select>
								</div>

								<div class="form-group col-md-6">
									<label>Escolha um fornecedor</label>
                                    <select class="form-control" name="idtb_fornecedor">
                                    	<option value="0">Selecione um fornecedor</option>
                						<?php $ver_fornecedor->ListaFornecedor($idtb_fornecedor);?>
            						</select>
								</div>
								<div class="form-group col-md-12">
									 <label>Observações:</label>
									 <textarea class="form-control" name="produto_descricao" rows="4"><?php echo $produto_descricao;?></textarea>
								</div>

								<div class="form-group col-md-12">
									<div class="msg">
										<img class="img_img" src="<?php echo BASE;?>/img/loader.gif" width="15" height="15"> 
										<span style="margin-left:25px"></span>
									</div>
								</div>
								<div class="form-group col-md-12">
									<input name="acao" type="hidden" value="<?php if($alterar != ''){echo 'EDPRODUTO';}else{echo 'CADPRODUTO';}?>">
									<input name="id" type="hidden" value="<?php echo $idtb_produto;?>">
									<input name="idtb_usuario_do_sistema" type="hidden" value="<?php echo $_SESSION['SESSIONID'];?>">
									<button type="submit" class="btn btn-primary"><?php if($alterar != ''){echo $alterar;}else{echo 'Cadastrar';}?></button>
									<button type="reset" class="btn btn-danger"<?php if($alterar != ''){echo 'disabled';}?>>Limpar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">Bloco cadastro endereço <SMALL> <b>em construção</b></SMALL></div>
					<div class="panel-body">
						<div class="row"></div>
					</div>
				</div>
				<?php
			break;
			case 'usuarios':
				if($alterar != ''){							
					$dadosUsuario = new DadosUsuario();
					$dadosUsuario->setId($chave);
					$dadosUsuario->mostrarDados();							
					$id_usuario			=	$dadosUsuario->getId();					
					$us_login			= 	$dadosUsuario->getUs_login();
					$us_password		= 	$dadosUsuario->getUs_password();
					$us_codRecupera		= 	$dadosUsuario->getUs_codRecupera();
					$us_dataCadastrado	= 	$dadosUsuario->getUs_dataCadastrado();
					$us_nivel			= 	$dadosUsuario->getUs_nivel();
					$us_bloqueio		= 	$dadosUsuario->getUs_bloqueio();
					$us_codRegistro		= 	$dadosUsuario->getUs_codRegistro();
					$us_nome			= 	$dadosUsuario->getUs_nome();
				}
				?>
			<!--Bloco-->
			<div class="panel panel-default">
				<div class="panel-heading">Dados de acesso</div>
				<div class="panel-body">
					<div class="row">
					<form name="frmgenerico" action="<?php echo BASE;?>/model/model-sistema.php" method="post" enctype="multipart/form-data" role="form" id="<?php echo BASE;?>/lista-usuario/">
						<div class="form-group col-md-12">
							<label>Nome:</label>
							<input type="text" name="us_nome" value="<?php echo $us_nome;?>" class="form-control" placeholder="Nome do usuário" />
						</div>
						<div class="form-group col-md-12">
							<label>Login:</label>
							<input type="email" name="us_login" value="<?php echo $us_login;?>" class="form-control" placeholder="Login de acesso" />
						</div> 
						<div class="form-group col-md-12">
							<label>Senha <small style="color:#069;">O sistema não informa a senha antiga, desculpe!</small></label>
							<input type="password" name="us_pass" class="form-control" placeholder="Senha de acesso"/>
						</div>
						<div class="form-group col-md-12" style="display: <?php if($_SESSION['SESSIONNIVEL'] != 3){echo "none";}else{echo '';} ?>">
							<label>Nivel de acesso</label>
							<select class="form-control" name="us_nivel">
								<option value="2" <?php if($us_nivel == 2)echo "selected" ?>> Funcionário </option>										
								<option value="3" <?php if($us_nivel == 3)echo "selected" ?>> Administrador </option>										
							</select>
						</div>
						<div class="form-group col-md-12">
							<div class="msg">
								<img class="img_img" src="<?php echo BASE;?>/admin/img/loader.gif" width="15" height="15"> 
								<span style="margin-left:25px"></span>
							</div>
							<input name="acao" type="hidden" value="<?php if($alterar != ''){echo 'EDUSUARIO';}else{echo 'CADUSUARIO';}?>">
							<input name="id_informacoes" type="hidden" value="<?php echo $id_informacoes;?>">
							<input name="id_usuario" type="hidden" value="<?php echo $id_usuario;?>">
							<button type="submit" class="btn btn-primary"><?php if($alterar != ''){echo $alterar;}else{echo 'Cadastrar';}?></button>
							<button type="reset" class="btn btn-danger"<?php if($alterar != ''){echo 'disabled';}?>>Limpar</button>
						</div>
					</form>
					</div>
				</div>
			</div>
			<?php
			break;
			
			
		}
		?>