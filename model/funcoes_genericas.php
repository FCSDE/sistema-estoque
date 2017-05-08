<?php
	include_once("../_loaderclasses.php");
	$cad = new manipulacaoDeDados();	
	$acao = strip_tags($_POST['acao']);	
	switch($acao){
	
	case 'EXCLUIR_GERAL':
	//print_r($_POST);
		$nomeTabela 			= $_POST['nomeTabela'];		
		$valorDoId 				= $_POST['valorDoId'];
		$nomeDoCampoDoId 		= $_POST['nomeDoCampoDoId'];		
		$nomeDoArquivo 			= $_POST['nomeDoArquivo'];		
		$nomeDoDiretorio 		= $_POST['nomeDoDiretorio'];		
		$arquivo 				= $_POST['nomeDoArquivo'];
		
		$identificacaoAcao 		= $_POST['identificacaoAcao'];
		
		if($identificacaoAcao == 1){
			
			$dir = '../uploads/'.$nomeDoDiretorio.'/';
			if(file_exists($dir.$arquivo)):@unlink($dir.$arquivo);endif;
			
			$cad->setTabela("$nomeTabela");
			$cad->setValorNaTabela("$nomeDoCampoDoId");
			$cad->setValorPesquisa("$valorDoId");
			$cad->excluir();
		}else{
			$dir = '../uploads/'.$nomeDoDiretorio.'/';
			if(file_exists($dir.$arquivo)):@unlink($dir.$arquivo);endif;
			
			$cad->setTabela("$nomeTabela");
			$cad->setValorNaTabela("$nomeDoCampoDoId");
			$cad->setValorPesquisa("$valorDoId");
			$cad->excluir();
		}
	break;
	
	case 'CONGELA_GERAL':
		// nome da tabela para alteração
		$nomeTabela 			= $_POST['nomeTabela'];
		// nome do campo que irá sofre alteração e valor a receber
		$nomeDoCampoDatabela 	= $_POST['nomeDoCampoDatabela'];
		$valorDoCampo 			= strip_tags($_POST['valorDoCampo']);
		// nome do ID da tabela e valor do ID da pesquisa.
		$nomeDoCampoDoId 		= $_POST['nomeDoCampoDoId'];
		$valorDoId				= $_POST['valorDoId'];
		$cat = new manipulacaoDeDados();
		$cat->setTabela("$nomeTabela");
		$cat->setCampos("$nomeDoCampoDatabela='$valorDoCampo'");
		$cat->setValorNaTabela("$nomeDoCampoDoId");
		$cat->setValorPesquisa("$valorDoId");
		$cat->alterar();
		echo '1';
	break;
	
	
		default;
			echo 'Erro! O sistema não pode guardar os dados, fale com o Administrador.';
	}
	
?>
