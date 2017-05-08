<?php include_once '_loaderclasses.php';
$cad 				= new manipulacaoDeDados();
$ver_user 			= new DadosUsuario;
$ver_informacoes 	= new DadosInformacoes;
$ver_dadosUser 		= new DadosDadosUser;
$ver_endereco       = new DadosEndereco;

$ver_categoria      = new DadosCategoria;
$ver_fornecedor     = new DadosFornecedor;
$ver_cliente         = new DadosCliente;
$ver_produto         = new DadosProduto;
$ver_pedido 	     = new DadosPedido;





//print_r($_SESSION);
if (!isset($_SESSION["SESSIONPASS"]) && !isset($_SESSION["SESSIONUSER"])) {
	echo "<script type='text/javascript'>location.href='../' </script> ";
}
//include_once("in/nomedapagina.php");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Painel administrativo</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="<?php echo BASE;?>/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo BASE;?>/assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="<?php echo BASE;?>/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="<?php echo BASE;?>/assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   	<!-- CAIXA DE TEXTO -->
   	<!-- DAILOG -->
	
	<link rel="icon" href="<?php echo BASE ?>/img/favicon.gif" type="image/gif"/>
</head>
<body>

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo BASE;?>/painel/">Painel de controle</a>
            </div>
			
			<form name="sair" action="<?php echo BASE;?>/sair.php" method="post">
				<div style="padding: 12px 50px 0px 50px; float: right; font-size: 16px;">
							<?php echo data(date('Y-m-d Y:i:s'));?> &nbsp;					
							<input name="acao" value="SAIR" type="hidden"/>				
							<input name="url" value="<?php echo BASE;?>/" type="hidden"/>		
							<a href="<?php echo BASE;?>" class="btn btn-default" target="_blank">Ver site</a>
							<button type="submit" class="btn btn-danger square-btn-adjust">Sair <span class="fa fa-sign-out"></span></button>			
				</div>							
			</form>
			<div class="sair" style="color: red;padding: 15px 50px 5px 50px;float:right;font-size:20px; font-weight:bold">				
			</div>
			
        </nav><!-- /. NAV TOP  -->
        <?php include 'in/menu.php';?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
				<div class="row">		
                    <div class="col-md-12">
                     <h2><?php //echo $nomefinal;?></h2>
                    </div>
				</div>
                <div class="row">
					
                <?php			
				
                    $url = (isset($_GET['url'])) ? $_GET['url'] : '';
                    $explode = explode('/', $url);
                    $paginas = array('painel','lista-categoria','form-sistema','lista-fornecedor','lista-cliente','lista-produto','lista-usuario','lista-pedido');
                    if (isset($explode[0]) && $explode[0] == '') {
						include "painel.php";
                    } elseif ($explode[0] != '') {
						if (isset($explode[0]) && in_array($explode[0], $paginas)) {
							include $explode[0] . ".php";
						} else {
							include "painel.php";
						}
                    }
                ?>
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
	<script src="<?php echo BASE ?>/jsc/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo BASE ?>/jsc/jquery-ui.js" type="text/javascript"></script>
	
    <!-- JQUERY SCRIPTS
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> -->
	<!-- <script src="<?php //echo BASE;?>/assets/js/jquery-1.10.2.js"></script>
      BOOTSTRAP SCRIPTS -->
    <script src="<?php echo BASE;?>/assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo BASE;?>/assets/js/jquery.metisMenu.js"></script>
	<!-- SCRIPTS -CONTROLES DE PROCESSOS-->
	<script src="<?php echo BASE ?>/jsc/mascara.js" type="text/javascript"></script>	
	<script src="<?php echo BASE ?>/jsc/jquery.maskMoney.js" type="text/javascript"></script>
    <script src="<?php echo BASE;?>/jsc/controllers.js"></script>    
    <script src="<?php echo BASE;?>/jsc/atualiza.js"></script>    
    <script src="<?php echo BASE;?>/jsc/funcoes_genericas.js"></script>
    <script src="<?php echo BASE;?>/jsc/cep.js"></script>
	
    
     <!-- MORRIS CHART SCRIPTS -->
     <script src="<?php echo BASE;?>/assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo BASE;?>/assets/js/morris/morris.js"></script>
	<!-- DAILOG -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <script src="<?php echo BASE;?>/assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo BASE;?>/assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>     
	<script>
            $(document).ready(function () {
                $('#dataTables-example5000').dataTable({
					// "paging":   false,
					"ordering": false,
					"iDisplayLength": 50,
					"info":     false
				});
            });
    </script>
	
	<script>
    function somenteNumeros(num) {
        var er = /[^0-9.]/;
        er.lastIndex = 0;
        var campo = num;
        if (er.test(campo.value)) {
          campo.value = "";		  
        }
    }
 </script>
    <script src="<?php echo BASE;?>/assets/js/custom.js"></script>
