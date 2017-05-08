<?php 
include_once '_loaderclasses.php';
$cliente = new DadosUsuario();
$acao = mysql_real_escape_string($_POST['acao']);
$mensagem = '';
switch ($acao) {
    case 'LOGAR':
        //print_r($_POST);
        $user = mysql_real_escape_string($_POST['usuario_email']);
        $pass = md5(mysql_real_escape_string($_POST['usuario_senha']));

        if (!$user) {
            $mensagem = '<p class="bg-warning">Por favor, prencha os campos!</p>';
        } elseif (!$pass) {
            $mensagem = '<p class="bg-warning">Campo SENHA obrigatório</p>';
        } else {
           $sql = "SELECT * FROM tb_usuario where us_login = '".anti_sql_injection($user)."' AND us_password = '".anti_sql_injection($pass)."' AND us_bloqueio = 1";
            $totalReg = $cliente->totalRegistros($sql);
            for ($i = 0; $i < $totalReg; $i++) {
                $cliente->verDados($sql, $i);
                $id             = $cliente->getId();
                $us_nivel       = $cliente->getUs_nivel();
                $us_login       = $cliente->getUs_login();
                $us_password    = $cliente->getUs_password();
                $us_bloqueio    = $cliente->getUs_bloqueio();
				$codRegistro    = $cliente->getUs_codRegistro();
            }
            if ($totalReg > 0):
                $_SESSION["SESSIONID"]      = $id;
                $_SESSION["SESSIONPASS"]    = $us_password;
                $_SESSION["SESSIONUSER"]    = $us_login;
                $_SESSION["SESSIONNIVEL"]   = $us_nivel;
				$_SESSION["CODREGISTRO"]    = $codRegistro;                
				$mensagem = '<p class="bg-success">Aguarde, sistema redirecionando para área administrativa!</p>';
				sleep(2);
				$sair = BASE.'/painel/';
				echo "<script>location.href='$sair';</script>";
            else:
                $mensagem = '<p class="bg-warning">Verifique se os dados informados estão corretos!</p>';
            endif;
        }
        break;
    default;
        //$mensagem = '<p class="bg-danger">Erro! O sistema não pode guardar os dados, fale com o Administrador.</p>';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Painel administrativo</title>
        <!-- Bootstrap -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="<?php echo BASE ?>/assets/css/bootstrap.css" rel="stylesheet">
                <link href="<?php echo BASE ?>/assets/css/helpers.css" rel="stylesheet">
                    <style>
                        body{background:#f8f8f8; margin:15% 2%}						
                    </style>
                    </head>
                    <body>
                        <div class="panel panel-primary" style="max-width:350px; margin:0 auto; padding-bottom:15px; border: 1px dotted #2d7bf0">
                            <div class="panel-heading" style="background:#2d7bf0;">Área restrita<img src="<?php echo BASE ?>/img/loader.gif" alt="Carregando" title="Carregando" style="display:none;"/></div>
                            <div class="panel-body"> 
                                <?php
                                //if(!$_GET['remember']){
                                ?> 
                                <form name="" method="post" action="">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><div class="glyphicon glyphicon-user"></div></div>
                                            <input class="form-control" type="email" value="<?php echo $_POST['usuario_email'];?>" name="usuario_email" placeholder="Usuário" autofocus="autofocus">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><div class="glyphicon glyphicon-asterisk"></div></div>
                                            <input class="form-control" value="<?php echo $_POST['usuario_senha'];?>" type="password" name="usuario_senha" placeholder="Senha">
                                        </div>
                                    </div>
                                    <input type="submit" value="Logar-se" class="btn btn-success" style="background:#2d7bf0;border: 1px dotted #2d7bf0" />
                                    <input type="hidden" value="LOGAR" name="acao"/>
                                </form>
                                <?php
                                //}else{
                                ?>
                                <!--<form id ="frmlogin" name="recupera" method="post" action="">
                                
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon"><div class="glyphicon glyphicon-user"></div></div>
                                            <input class="form-control" type="text" name="email" placeholder="Informe email de cadastro">
                                        </div>
                                    </div>
                                    <input type="submit" value="Validar" class="btn btn-default" /><br/><br/>
                                    <a href="index.php" title="Voltar">Voltar</a>
                                </form>-->
                                <?php //}?>
                                <div class="login_msg"><?php echo $mensagem;?></div>
                            </div>
                        </div>
                    </body>
                    </html>