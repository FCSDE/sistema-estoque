<?php
	if($_SESSION['SESSIONNIVEL'] != 3){$hidden = "hidden";}
	$sql_categoria_count 	= "SELECT * FROM tb_categoria";
	$total_categoria_count 	= $ver_categoria->totalRegistros($sql_categoria_count);

	$sql_fornecedor_count = "SELECT * FROM td_fornecedor";
	$total_fornecedor_count = $ver_fornecedor->totalRegistros($sql_fornecedor_count);

	$sql_cliente_count = "SELECT * FROM tb_cliente";
	$total_cliente_count = $ver_cliente->totalRegistros($sql_cliente_count);

	$sql_produto_count = "SELECT * FROM tb_produto";
	$total_produto_count = $ver_produto->totalRegistros($sql_produto_count);

	$sql_pedido_count = "SELECT * FROM tb_pedido";
	$total_pedido_count = $ver_pedido->totalRegistros($sql_pedido_count);
?>
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
			<li>
				<a href="<?php echo BASE;?>/lista-categoria"> <i class="glyphicon glyphicon-pencil"></i> Categoria <span class="badge" style="background-color:#346;float: right"> <?php echo $total_categoria_count;?></span></a>
			</li>
			<li>
				<a href="<?php echo BASE;?>/lista-fornecedor"> <i class="glyphicon glyphicon-th-large"></i> Fornecedor <span class="badge" style="background-color:#346;float: right"> <?php echo $total_fornecedor_count;?></span></a>
			</li>
			<li>
				<a href="<?php echo BASE;?>/lista-cliente"> <i class="glyphicon glyphicon-user"></i> Clientes <span class="badge" style="background-color:#346;float: right"> <?php echo $total_cliente_count;?></span></a>
			</li>
			<li>
				<a href="<?php echo BASE;?>/lista-produto"> <i class="glyphicon glyphicon-th-large"></i> Produtos <span class="badge" style="background-color:#346;float: right"> <?php echo $total_produto_count;?></span></a>
			</li>
			<li>
				<a href="<?php echo BASE;?>/lista-pedido"> <i class="glyphicon glyphicon-usd"></i> Pedidos <span class="badge" style="background-color:#346;float: right"> <?php echo $total_pedido_count;?></span></a>
			</li>

			<li class="<?php echo $hidden;?>">
                <a href="#"><i class="fa fa-gears"></i> Gerência <span class="caret"></span></a>
                <ul class="nav nav-second-level">
					<li>
					<a href="<?php echo BASE;?>/lista-usuario/"> <i class="glyphicon glyphicon-user"></i> Usuários do sistema</a>
					</li>					
                </ul>
            </li>
			
            
        </ul>
    </div>
</nav>