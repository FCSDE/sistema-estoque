<?php session_start();
$acao = strip_tags($_POST['acao']);	
	switch($acao){
		case 'SAIR':		
			session_destroy();
			echo 1;
		break;
		default;
			echo 'Erro ão sair';
	}
?>