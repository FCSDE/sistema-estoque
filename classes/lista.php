<?php

include_once("paginacao.php");
include_once("confSistema.php");
class Lista extends Paginacao {
    private $strNumPagina, $strPaginas, $strUrl;
    public function setNumPagina($valor) {
        $this->strNumPagina = $valor;
    }
    public function setUrl($valor) {
        $this->strUrl = $valor;
    }

    public function getPaginas() {
        return $this->strNumPagina;
    }

    public function listaCategoria() {
        $sql = "SELECT * FROM tb_categoria WHERE ativo_categoria != 'X' ORDER BY id_categoria desc";
        $this->setParametro($this->strNumPagina);
        $this->setFileName($this->strUrl);
        $this->setInfoMaxPag(10);
        $this->setMaximoLinks(50);
        $this->setSQL($sql);
        self::iniciaPaginacao();
        $cont = 0;
        while ($linha = self::results()) {
            $cont++;
           $verificaStatus = $linha['ativo_categoria'];
			if($verificaStatus == "N"){
				$status_mostra = "S";
				$disabled = "disabled";
				$classe = "btn btn-warning";
			}else{
				$status_mostra = "N";
				$disabled = "";
				$classe = "btn btn-default";
			}
            echo "
                <tr>
                    <td align='left'> <strong>$linha[id_categoria]</strong> </td>
                    <td align='left'> $linha[categoria] </td>
                    <td alig='center'>
					
						<form name='congelar' action='' method='post'> 
							<button class='$classe'>$verificaStatus</button>
							<input type='hidden' name='nomeTabela' 	value='tb_categoria'/>
							<input type='hidden' name='nomeDoCampoDoId' value='id_categoria'/>
							<input type='hidden' name='valorDoId' 	value='$linha[id_categoria]'/>
							<input type='hidden' name='nomeDoCampoDatabela' value='ativo_categoria'/> 
							<input type='hidden' name='valorDoCampo' value='$status_mostra'/>
							<input  type='hidden' name='acao' value='CONGELA_GERAL' />
							
						</form>
                    </td>				
                    <td alig='center'>
                        <form name='' action='principal.php?link=form-de-cadastro-de-categoria' enctype='multipart/form-data' method='post'>
                            <input type='hidden' name='id' value='$linha[id_categoria]'/>
                            <input type='hidden' name='status_user' value='$verificaStatus'/>
                            <input type='hidden' name='acao' value='Atualizar'/>	
                            <input type='hidden' name='botao' value='Atualizar'/>
                            <button type='submit' class='btn btn-warning' $disabled >Editar</button>
                        </form>
                    </td>

                    <td alig='center'>
                        <form name='excluir' action='' enctype='multipart/form-data' method='post'>
                        <input type='hidden' name='nomeTabela' 		value='tb_categoria'/> 
						<input type='hidden' name='valorDoId' 		value='$linha[id_categoria]'/> 
						<input type='hidden' name='nomeDoCampoDoId' value='id_categoria'/> 
                        <input type='hidden' name='acao' value='EXCLUIR_GERAL'/>
                        <button type='submit' class='btn btn-danger'>Excluir</button>			
                        </form>
                    </td>	
		</tr>";
            self::setContador($cont);
        }
    }

    public function listaSubCategoria() {
        $sql = "SELECT * FROM tb_subcategoria ORDER BY id_subcategoria asc";
        $this->setParametro($this->strNumPagina);
        $this->setFileName($this->strUrl);
        $this->setInfoMaxPag(10);
        $this->setMaximoLinks(50);
        $this->setSQL($sql);
        self::iniciaPaginacao();
        $cont = 0;
        while ($linha = self::results()) {
            $cont++;
           $verificaStatus = $linha['ativo_subcategoria'];
			if($verificaStatus == "N"){
				$status_mostra = "S";
				$disabled = "disabled";
				$classe = "btn btn-warning";
			}else{
				$status_mostra = "N";
				$disabled = "";
				$classe = "btn btn-default";
			}

            echo "
				<tr>
				<td align='left'> <strong>$linha[id_subcategoria]</strong> </td>
				<td align='left'> $linha[subcategoria] </td>
				<td alig='center'>
				<form name='congelar' action='' method='post'> 
					<button class='$classe'>$verificaStatus</button>
					<input type='hidden' name='nomeTabela' 	value='tb_subcategoria'/>
					<input type='hidden' name='nomeDoCampoDoId' value='id_subcategoria'/>
					<input type='hidden' name='valorDoId' 	value='$linha[id_subcategoria]'/>
					<input type='hidden' name='nomeDoCampoDatabela' value='ativo_subcategoria'/> 
					<input type='hidden' name='valorDoCampo' value='$status_mostra'/>
					<input  type='hidden' name='acao' value='CONGELA_GERAL' />
				</form>
				</td>			
				<td alig='center'>
				<form name='' action='principal.php?link=form-de-cadastro-de-sub-categoria' enctype='multipart/form-data' method='post'>
					<input type='hidden' name='id' value='$linha[id_subcategoria]'/>
					<input type='hidden' name='status_user' value='$verificaStatus'/>
					<input type='hidden' name='acao' value='Atualizar'/>	
					<input type='hidden' name='botao' value='Atualizar'/>
					<button type='submit' class='btn btn-warning' $disabled >Editar</button>
				</form>
				</td>
				<td alig='center'>
				<form name='excluir' action='' enctype='multipart/form-data' method='post'>
					<input type='hidden' name='nomeTabela' 		value='tb_subcategoria'/> 
					<input type='hidden' name='valorDoId' 	value='$linha[id_subcategoria]'/> 
					<input type='hidden' name='nomeDoCampoDoId' value='id_subcategoria'/> 
					<input type='hidden' name='acao' value='EXCLUIR_GERAL'/>
					<button type='submit' class='btn btn-danger'>Excluir</button>			
				</form>
				</td>	
				</tr>
				";
            self::setContador($cont);
        }
    }
	
    public function listaBanner() {
        $sql = "SELECT * FROM tb_banner ORDER BY id_banner desc";
        $this->setParametro($this->strNumPagina);
        $this->setFileName($this->strUrl);
        $this->setInfoMaxPag(10);
        $this->setMaximoLinks(50);
        $this->setSQL($sql);
        self::iniciaPaginacao();
        $cont = 0;
        while ($linha = self::results()) {
            $cont++;
           $verificaStatus 	= $linha['ativo_banner'];
		    $capa_banner 	= $linha['capa_banner'];
			
			if($verificaStatus == "N"){
				$status_mostra = "S";
				$disabled = "disabled";
				$classe = "btn btn-warning";
			}else{
				$status_mostra = "N";
				$disabled = "";
				$classe = "btn btn-default";
			}
			
			if($capa_banner == "S"){
				$valorCheck = "N";
				$checked = "checked='checked'";
			}else{
				$valorCheck = "S";
				$checked = "";
			}
            echo "
                <tr>
                    <td align='left'><img src='".BASE."/admin/rdmc.php?src=".BASE."/admin/uploads/banners/$linha[arquivo]&q=100&h=150&w=280'/></td>
					<td align='center'>
						<form name='capa_banner' action='' method='post'>
						
							<input type='hidden' name='nomeTabela' 	value='tb_banner'/>
							<input type='hidden' name='nomeDoCampoDoId' value='id_banner'/>
							<input type='hidden' name='valorDoId' 	value='$linha[id_banner]'/>
							<input type='hidden' name='nomeDoCampoDatabela' value='capa_banner'/>
							<input type='hidden' name='valorDoCampo' value='".$valorCheck."'/>
							<input type='checkbox' name='valor_da_capa'$checked/> 
							<input  type='hidden' name='acao' value='DEFENIR_CAPA' />
						</form>
					</td>
                    <td alig='center'>
					
						<form name='congelar' action='' method='post'> 
							<button class='$classe'>$verificaStatus</button>
							<input type='hidden' name='nomeTabela' 	value='tb_banner'/>
							<input type='hidden' name='nomeDoCampoDoId' value='id_banner'/>
							<input type='hidden' name='valorDoId' 	value='$linha[id_banner]'/>
							<input type='hidden' name='nomeDoCampoDatabela' value='ativo_banner'/> 
							<input type='hidden' name='valorDoCampo' value='$status_mostra'/>
							<input  type='hidden' name='acao' value='CONGELA_GERAL' />
						</form>
                    </td>				
                    <td alig='center'>
                        <form name='excluir' action='' enctype='multipart/form-data' method='post'>
                        <input type='hidden' name='nomeTabela' 	value='tb_banner'/> 
						<input type='hidden' name='nomeDoArquivo' 	value='$linha[arquivo]'/> 
						<input type='hidden' name='nomeDoDiretorio' value='banners'/> 
						<input type='hidden' name='valorDoId' 		value='$linha[id_banner]'/> 
						<input type='hidden' name='nomeDoCampoDoId' value='id_banner'/> 
                        <input type='hidden' name='acao' value='EXCLUIR_GERAL'/>
                        <button type='submit' class='btn btn-danger'>Excluir</button>			
                        </form>
                    </td>	
		</tr>";
            self::setContador($cont);
        }
    }	
	
    public function listaPaginaEditavel() {
        $sql = "SELECT * FROM tb_pagina_editavel ORDER BY id_pagina_editavel desc";
        $this->setParametro($this->strNumPagina);
        $this->setFileName($this->strUrl);
        $this->setInfoMaxPag(10);
        $this->setMaximoLinks(50);
        $this->setSQL($sql);
        self::iniciaPaginacao();
        $cont = 0;
        while ($linha = self::results()) {
            $cont++;
            echo "
                <tr>
                    <td align='left'>$linha[pagina]</td>
					<td alig='center'>
						<form name='' action='principal.php?link=frm-texto-home' enctype='multipart/form-data' method='post'>
						<input type='hidden' name='id' value='$linha[id_pagina_editavel]'/>
						<input type='hidden' name='acao' value='Atualizar'/>	
						<button type='submit' class='btn btn-warning'>Editar</button>
						</form>
					</td>
		</tr>";
            self::setContador($cont);
        }
    }
	
	    public function listaSEO() {
        $sql = "SELECT * FROM tb_seo ORDER BY id_seo desc";
        $this->setParametro($this->strNumPagina);
        $this->setFileName($this->strUrl);
        $this->setInfoMaxPag(10);
        $this->setMaximoLinks(50);
        $this->setSQL($sql);
        self::iniciaPaginacao();
        $cont = 0;
        while ($linha = self::results()) {
            $cont++;
            echo "
                <tr>
                    <td align='left'>$linha[pagina_seo]</td>
					<td alig='center'>
						<form name='' action='principal.php?link=frm-texto-seo' enctype='multipart/form-data' method='post'>
						<input type='hidden' name='id' value='$linha[id_seo]'/>
						<input type='hidden' name='acao' value='Atualizar'/>	
						<button type='submit' class='btn btn-warning'>Editar</button>
						</form>
					</td>
		</tr>";
            self::setContador($cont);
        }
    }
	public function listaProdutos() {
        $sql = "SELECT * FROM tb_produto WHERE status_produto = 'S' ORDER BY ordem_produto ASC";
        $this->setParametro($this->strNumPagina);
        $this->setFileName($this->strUrl);
        $this->setInfoMaxPag(24);
        $this->setMaximoLinks(50);
        $this->setSQL($sql);
        self::iniciaPaginacao();
        $cont = 0;
        while ($linha = self::results()) {
            $cont++;
            echo "<li class='clique col-sm-2' id='usuario$linha[id_produto]'>
                <a  class='' href='#'>
					<img src='".BASE."/admin/rdmc.php?src=".BASE."/admin/uploads/produtos/$linha[capa_produto]&q=80&h=250' 
                    	alt='$linha[capa_produto]' title='$linha[capa_produto]' style='width:100%;'/> 
                    <h2>$linha[nome_produto] - $linha[cod_produto]</h2>
                </a>
                
                <div id='data_usuario$linha[id_produto]' style='display:none;'>
                    <center> 
					<img src='".BASE."/admin/rdmc.php?src=".BASE."/admin/uploads/produtos/$linha[capa_produto]&q=100&w=580' 
							alt='$linha[nome_produto]' title='$linha[nome_produto]' style='width:100%;'/> 
                    </center>
                    <div class='col-sm-5'>
                        <h4 class='modal-title' id='myModalLabel'>$linha[nome_produto] - $linha[cod_produto]</h4>
                    </div>
                </div><!--div da princioal-->
        </li>";
            self::setContador($cont);
        }
    }
	
	
	public function listaPromocoes() {
        $sql = "SELECT * FROM tb_produto WHERE status_produto = 'S' AND nome_categoria = 'Promoções' ORDER BY ordem_produto ASC";
        $this->setParametro($this->strNumPagina);
        $this->setFileName($this->strUrl);
        $this->setInfoMaxPag(24);
        $this->setMaximoLinks(50);
        $this->setSQL($sql);
        self::iniciaPaginacao();
        $cont = 0;
        while ($linha = self::results()) {
            $cont++;
            echo "<li class='clique col-sm-2' id='usuario$linha[id_produto]'>
                <a  class='' href='#'>
					<img src='".BASE."/admin/rdmc.php?src=".BASE."/admin/uploads/produtos/$linha[capa_produto]&q=80&h=250' 
                    	alt='$linha[capa_produto]' title='$linha[capa_produto]'/> 
                    <h2>$linha[nome_produto] - $linha[cod_produto]</h2>
                </a>
                
                <div id='data_usuario$linha[id_produto]' style='display:none;'>
                    <center> 
					<img src='".BASE."/admin/rdmc.php?src=".BASE."/admin/uploads/produtos/$linha[capa_produto]&q=100&w=580' 
							alt='$linha[nome_produto]' title='$linha[nome_produto]'/> 
                    </center>
                    <div class='col-sm-5'>
                        <h4 class='modal-title' id='myModalLabel'>$linha[nome_produto] - $linha[cod_produto]</h4>
                    </div>
                </div><!--div da princioal-->
        </li>";
            self::setContador($cont);
        }
    }
	
	public function listaPesquisa($id) {
        $sql = "SELECT * FROM tb_produto WHERE status_produto = 'S' AND id_categoria = '".$id."' ORDER BY ordem_produto ASC";
        $this->setParametro($this->strNumPagina);
        $this->setFileName($this->strUrl);
        $this->setInfoMaxPag(24);
        $this->setMaximoLinks(50);
        $this->setSQL($sql);
        self::iniciaPaginacao();
        $cont = 0;
        while ($linha = self::results()) {
            $cont++;
            echo "<li class='clique col-sm-2' id='usuario$linha[id_produto]'>
                <a  class='' href='#'>
					<img src='".BASE."/admin/rdmc.php?src=".BASE."/admin/uploads/produtos/$linha[capa_produto]&q=80&h=250' 
                    	alt='$linha[capa_produto]' title='$linha[capa_produto]'/> 
                    <h2>$linha[nome_produto] - $linha[cod_produto]</h2>
                </a>
                
                <div id='data_usuario$linha[id_produto]' style='display:none;'>
                    <center> 
					<img src='".BASE."/admin/rdmc.php?src=".BASE."/admin/uploads/produtos/$linha[capa_produto]&q=100&w=580' 
							alt='$linha[nome_produto]' title='$linha[nome_produto]'/> 
                    </center>
                    <div class='col-sm-5'>
                        <h4 class='modal-title' id='myModalLabel'>$linha[nome_produto] - $linha[cod_produto]</h4>
                    </div>
                </div><!--div da princioal-->
        </li>";
            self::setContador($cont);
        }
    }
	
}

//fim da classe geral
?>