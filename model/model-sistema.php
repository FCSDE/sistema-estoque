<?php
include_once("../_loaderclasses.php");
$cad = new manipulacaoDeDados();
$acao = mysql_real_escape_string($_POST['acao']);
//print_r($_POST);
//echo '<hr/>';
//print_r($_FILES);

switch ($acao) {   
		case 'cadfrmcategoria':        
        $categoria = mysql_real_escape_string($_POST['categoria']);
		$ordem = mysql_real_escape_string($_POST['ordem']);
		if(!empty($ordem)){$ordem = $ordem;}else{$ordem = 0;}
        if (!$categoria) {
            echo '<p class="alert alert-warning"><b>Aviso!</b> Campo obrigatório.</p>';
        }else {
            $ver_pesquisa = new DadosCategoria;
            $sql = "SELECT * FROM tb_categoria WHERE cat_categoria = '".$categoria."'";
            $total = $ver_pesquisa->totalRegistros($sql);
            if ($total > 0) {
                echo '<p class="alert alert-warning"><i class="fa fa-spinner fa-pulse"></i> <b>Aviso!</b> Categoria já cadastrado</p>';
            } else {
                $slug = setUri($categoria);
                $cad->setTabela("tb_categoria");
                $cad->setCampos("cat_categoria,cat_bloqueio,cat_slug,cat_ordem");
                $cad->setDados("'$categoria','S','$slug','$ordem'");
                $cad->inserir();
                echo 1;
            }
        }
        break;    
		case 'editarfrmcategoria':
        $categoria 	= mysql_real_escape_string($_POST['categoria']);
		$ordem 		= mysql_real_escape_string($_POST['ordem']);		
		$id 		= mysql_real_escape_string($_POST['id_categoria']);	
		if(!empty($ordem)){$ordem = $ordem;}else{$ordem = 0;}		
        if (!$categoria) {
            echo '<p class="alert alert-warning"><b>Aviso!</b> Campo obrigatório.</p>';
        }else {
       		$slug = setUri($categoria);
			$cad->setTabela("tb_categoria");
			$cad ->setCampos("	cat_categoria		='$categoria',
								cat_ordem			='$ordem',
								cat_slug			='$slug'");				
			$cad->setValorNaTabela("id");
			$cad->setValorPesquisa("$id");
			$cad->alterar();
			echo 1;			
		}
        break;		
		
        case 'CADFORNECEDOR':
        $idtb_usuario_do_sistema 		= mysql_real_escape_string($_POST['idtb_usuario_do_sistema']);
        $td_fornecedor_empresa 			= mysql_real_escape_string($_POST['td_fornecedor_empresa']);
        $td_fornecedor_representante1 	= mysql_real_escape_string($_POST['td_fornecedor_representante1']);
        $td_fornecedor_representante2 	= mysql_real_escape_string($_POST['td_fornecedor_representante2']);
        $td_fornecedor_datatime 		= date('Y-m-d H:i:s');
        $td_fornecedor_observacoes 		= mysql_real_escape_string($_POST['td_fornecedor_observacoes']);
        
        if (!$td_fornecedor_empresa) {
            echo '<p class="alert alert-warning"><b>Aviso!</b> Informe nome da empresa</p>';
        }else {                          
            $cad->setTabela("td_fornecedor");
        	$cad->setCampos("idtb_usuario_do_sistema,td_fornecedor_representante1,td_fornecedor_representante2,td_fornecedor_datatime,td_fornecedor_observacoes,td_fornecedor_empresa");
            $cad->setDados("'$idtb_usuario_do_sistema','$td_fornecedor_representante1','$td_fornecedor_representante2','$td_fornecedor_datatime','$td_fornecedor_observacoes','$td_fornecedor_empresa'");
            $cad->inserir();
            echo 1;            
        }
		break;
		case 'EDFORNECEDOR':		
        $id 							= mysql_real_escape_string($_POST['id']);
       	$idtb_usuario_do_sistema 		= mysql_real_escape_string($_POST['idtb_usuario_do_sistema']);
        $td_fornecedor_empresa 			= mysql_real_escape_string($_POST['td_fornecedor_empresa']);
        $td_fornecedor_representante1 	= mysql_real_escape_string($_POST['td_fornecedor_representante1']);
        $td_fornecedor_representante2 	= mysql_real_escape_string($_POST['td_fornecedor_representante2']);
        $td_fornecedor_observacoes 		= mysql_real_escape_string($_POST['td_fornecedor_observacoes']);
        
        if (!$td_fornecedor_empresa) {
            echo '<p class="alert alert-warning"><b>Aviso!</b> Informe nome da empresa</p>';
        }else {			
			$cad->setTabela("td_fornecedor");
			$cad ->setCampos("	idtb_usuario_do_sistema         =	'$idtb_usuario_do_sistema',
								td_fornecedor_representante1        =	'$td_fornecedor_representante1',
								td_fornecedor_representante2           = '$td_fornecedor_representante2',
								td_fornecedor_observacoes           =	'$td_fornecedor_observacoes',
								td_fornecedor_empresa           =	'$td_fornecedor_empresa'");				
			$cad->setValorNaTabela("id");
			$cad->setValorPesquisa("$id");
			$cad->alterar();
		echo 1;			
		}        
        break;

        case 'CADCLIENTE':
        $idtb_usuario_do_sistema 	= mysql_real_escape_string($_POST['idtb_usuario_do_sistema']);
        $cliente_nome 				= mysql_real_escape_string($_POST['cliente_nome']);
        $cliente_email 				= mysql_real_escape_string($_POST['cliente_email']);
        $cliente_telefone 			= mysql_real_escape_string($_POST['cliente_telefone']);
        $cliente_obsevacoes 		= mysql_real_escape_string($_POST['cliente_obsevacoes']);           
        $cliente_data 				= date('Y-m-d H:i:s');
      
        
        if (!$cliente_nome) {
            echo '<p class="alert alert-warning"><b>Aviso!</b> Informe o nome</p>';
        }else if (!$cliente_email) {
        		echo '<p class="alert alert-warning"><b>Aviso!</b> Informe o email</p>';
        }else if(!valMail($cliente_email)) {
        		echo '<p class="alert alert-warning"><b>Aviso!</b> Informe um email válido</p>';
        }else {                          
            $cad->setTabela("tb_cliente");
        	$cad->setCampos("idtb_usuario_do_sistema,cliente_nome,cliente_email,cliente_telefone,cliente_data,cliente_obsevacoes");
            $cad->setDados("'$idtb_usuario_do_sistema','$cliente_nome','$cliente_email','$cliente_telefone','$cliente_data','$cliente_obsevacoes'");
            $cad->inserir();
            echo 1;            
        }
		break;
		case 'EDCLIENTE':		
        $id 						= mysql_real_escape_string($_POST['id']);
        $idtb_usuario_do_sistema 	= mysql_real_escape_string($_POST['idtb_usuario_do_sistema']);
        $cliente_nome 				= mysql_real_escape_string($_POST['cliente_nome']);
        $cliente_email 				= mysql_real_escape_string($_POST['cliente_email']);
        $cliente_telefone 			= mysql_real_escape_string($_POST['cliente_telefone']);
        $cliente_obsevacoes 		= mysql_real_escape_string($_POST['cliente_obsevacoes']);           
        
        if (!$cliente_nome) {
            echo '<p class="alert alert-warning"><b>Aviso!</b> Informe o nome</p>';
        }else if (!$cliente_email) {
        		echo '<p class="alert alert-warning"><b>Aviso!</b> Informe o email</p>';
        }else if(!valMail($cliente_email)) {
        		echo '<p class="alert alert-warning"><b>Aviso!</b> Informe um email válido</p>';
        }else { 		
			$cad->setTabela("tb_cliente");
			$cad ->setCampos("	idtb_usuario_do_sistema         =	'$idtb_usuario_do_sistema',
								cliente_nome        =	'$cliente_nome',
								cliente_email           = '$cliente_email',
								cliente_telefone           =	'$cliente_telefone',
								cliente_obsevacoes           =	'$cliente_obsevacoes'");				
			$cad->setValorNaTabela("id");
			$cad->setValorPesquisa("$id");
			$cad->alterar();
		echo 1;			
		}        
        break; 

        case 'CADPRODUTO':
        $idtb_usuario_do_sistema 	= mysql_real_escape_string($_POST['idtb_usuario_do_sistema']);       
        $produto_titulo 			= mysql_real_escape_string($_POST['produto_titulo']);
        $produto_descricao 			= mysql_real_escape_string($_POST['produto_descricao']);
        $produto_preco 				= mysql_real_escape_string($_POST['produto_preco']);
        $idtb_categoria 			= mysql_real_escape_string($_POST['idtb_categoria']);
        $idtb_fornecedor 			= mysql_real_escape_string($_POST['idtb_fornecedor']);
        $produto_data 				= date('Y-m-d H:i:s');
      
        
        if (!$produto_titulo) {
            echo '<p class="alert alert-warning"><b>Aviso!</b> Informe o título</p>';
        }else if (!$produto_preco) {
        		echo '<p class="alert alert-warning"><b>Aviso!</b> Informe o valor do produto</p>';
        }else {                          
            $cad->setTabela("tb_produto");
        	$cad->setCampos("idtb_usuario_do_sistema,produto_titulo,produto_descricao,produto_preco,produto_data,idtb_categoria,idtb_fornecedor");
            $cad->setDados("'$idtb_usuario_do_sistema','$produto_titulo','$produto_descricao','$produto_preco','$produto_data','$idtb_categoria','$idtb_fornecedor'");
            $cad->inserir();
            echo 1;            
        }
		break;

		case 'EDPRODUTO':		
      	 $id 						= mysql_real_escape_string($_POST['id']);
        $idtb_usuario_do_sistema 	= mysql_real_escape_string($_POST['idtb_usuario_do_sistema']);       
        $produto_titulo 			= mysql_real_escape_string($_POST['produto_titulo']);
        $produto_descricao 			= mysql_real_escape_string($_POST['produto_descricao']);
        $produto_preco 				= mysql_real_escape_string($_POST['produto_preco']);
        $idtb_categoria 			= mysql_real_escape_string($_POST['idtb_categoria']);
        $idtb_fornecedor 			= mysql_real_escape_string($_POST['idtb_fornecedor']);
        //$produto_preco = str_replace(".",".", $produto_preco);
      
        
        if (!$produto_titulo) {
            echo '<p class="alert alert-warning"><b>Aviso!</b> Informe o título</p>';
        }else if (!$produto_preco) {
        		echo '<p class="alert alert-warning"><b>Aviso!</b> Informe o valor do produto</p>';
        }else { 		
			$cad->setTabela("tb_produto");
			$cad ->setCampos("	idtb_usuario_do_sistema         =	'$idtb_usuario_do_sistema',
								produto_titulo        =	'$produto_titulo',
								produto_descricao           = '$produto_descricao',
								idtb_categoria           = '$idtb_categoria',
								idtb_fornecedor           = '$idtb_fornecedor',
								produto_preco           =	'$produto_preco'");				
			$cad->setValorNaTabela("id");
			$cad->setValorPesquisa("$id");
			$cad->alterar();
		echo 1;			
		}        
        break;

        case 'CADUSUARIO':
	$us_pass 			= strip_tags($_POST['us_pass']);
	$us_login 			= strip_tags($_POST['us_login']);
	$us_nivel 			= strip_tags($_POST['us_nivel']);	
	$us_nome 			= strip_tags($_POST['us_nome']);	
	$us_password 		= md5($us_pass);
	$us_codRecupera 	= md5(time());			
	$us_dataCadastrado 	= date('Y-m-d H:i:s');
	$us_bloqueio 		= 1;
	$us_codRegistro 	= md5(time());
	

	if(!$us_login){
		echo MSG("warning", "Aviso! ", "Prencha os campos");
	}else if(!$us_pass){
		echo MSG("warning", "Aviso! ", "Informe uma senha."," Sua senha pode ter de 6 a 14 caracteres.");
	}else if(strlen($us_pass) < 6 || strlen($us_pass) > 14){
		echo MSG("warning", "Aviso! ", "Informe uma senha de 6 a 14 caracteres.");
	}else{
		
		$ver_pesquisa 		= new DadosUsuario;
		
		$sqlRes 		= "SELECT * FROM tb_usuario WHERE us_login = '".$us_login."'";
		$totalRes 	= $ver_pesquisa->totalRegistros($sqlRes);
		for($x=0; $x < $totalRes; $x++){
			$ver_pesquisa-> verDados($sqlRes,$x);
			$id					=	$ver_pesquisa->getId();
		}
		
		if($totalRes > 0){
			echo MSG("warning", "Aviso! ", "E-mail já está ultilizado");
		}else{
			$cad->setTabela("tb_usuario");
			$cad->setCampos("us_login, us_password, us_codRecupera, us_dataCadastrado, us_nivel, us_bloqueio, us_codRegistro, us_tipoCadastro,us_nome");
			$cad->setDados("'$us_login', '$us_password', '$us_codRecupera', '$us_dataCadastrado','$us_nivel', '$us_bloqueio','$us_codRegistro','$us_tipoCadastro','$us_nome'");
			$cad->inserir();
			echo 1;
		}
	}
		
	break;	
	
	case 'EDUSUARIO':
	$id_usuario 		= strip_tags($_POST['id_usuario']);
	$us_pass 			= strip_tags($_POST['us_pass']);
	$us_login 			= strip_tags($_POST['us_login']);
	$us_nivel 			= strip_tags($_POST['us_nivel']);	
	$us_nome 			= strip_tags($_POST['us_nome']);	
	$us_password 		= md5($us_pass);

	if(!$us_login){
		echo MSG("warning", "Aviso! ", "Prencha os campos");
	}else if(!$us_pass){
		echo MSG("warning", "Aviso! ", "Informe uma senha."," Sua senha pode ter de 6 a 14 caracteres.");
	}else if(strlen($us_pass) < 6 || strlen($us_pass) > 14){
		echo MSG("warning", "Aviso! ", "Informe uma senha de 6 a 14 caracteres.");
	}else{
		
		$ver_pesquisa 		= new DadosUsuario;
		
		$sqlRes 		= "SELECT * FROM tb_usuario WHERE us_login = '".$us_login."'";
		$totalRes 	= $ver_pesquisa->totalRegistros($sqlRes);
		for($x=0; $x < $totalRes; $x++){
			$ver_pesquisa-> verDados($sqlRes,$x);
			$id					=	$ver_pesquisa->getId();
		}
		
		if($totalRes > 1){
			echo MSG("warning", "Aviso! ", "E-mail já está ultilizado");
		}else{
			$cad->setTabela("tb_usuario");
			$cad ->setCampos("	us_login 	= '$us_login',
								us_password = '$us_password',
								us_nome 	= '$us_nome',
								us_nivel 	= '$us_nivel'");				
			$cad->setValorNaTabela("id");
			$cad->setValorPesquisa("$id_usuario");
			$cad->alterar();
			echo 1;
		}
	}
		
	break;


	case 'CADPEDIDO':
        $idtb_usuario_do_sistema 	= mysql_real_escape_string($_POST['idtb_usuario_do_sistema']);
        $idtb_cliente 				= mysql_real_escape_string($_POST['idtb_cliente']);       
        $idtb_produto 				= mysql_real_escape_string($_POST['idtb_produto']);       
        $idtb_usuario_do_sistema 	= mysql_real_escape_string($_POST['idtb_usuario_do_sistema']);       
        $pedido_titulo 				= mysql_real_escape_string($_POST['pedido_titulo']);       
        $pedido_observacoes 		= mysql_real_escape_string($_POST['pedido_observacoes']);       
        $pedido_data 				= date('Y-m-d H:i:s');
        $pedido_codigo 				= geraSenha();
      
        
        if (!$pedido_titulo) {
            echo '<p class="alert alert-warning"><b>Aviso!</b> Informe o título</p>';
        }else {                          
            $cad->setTabela("tb_pedido");
        	$cad->setCampos("idtb_usuario_do_sistema,idtb_cliente,idtb_produto,pedido_data,pedido_codigo,pedido_titulo,pedido_observacoes");
            $cad->setDados("'$idtb_usuario_do_sistema','$idtb_cliente','$idtb_produto','$pedido_data','$pedido_codigo','$pedido_titulo','$pedido_observacoes '");
            $cad->inserir();
            echo 1;            
        }
		break;
    default;
        echo '<p class="alert alert-danger"><b>Erro!</b> O sistema não pode guardar os dados, fale com o Administrador.</p>';
}
?>

