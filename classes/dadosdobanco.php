<?php
include_once("conexaoMySQL.php");

class DadosUsuario extends conexaoMySQL {
    private $id, $us_login,$us_password,$us_codRecupera,$us_dataCadastrado,$us_nivel,$us_bloqueio,$us_codRegistro,$us_tipoCadastro,$us_nome;
    public function setId($id) {$this->id = $id;}
    public function getId() {return $this->id;}
	public function getUs_login(){return $this-> us_login;}
	public function getUs_password(){return $this-> us_password;}
	public function getUs_codRecupera(){return $this-> us_codRecupera;}
	public function getUs_dataCadastrado(){return $this-> us_dataCadastrado;}
	public function getUs_nivel(){return $this-> us_nivel;}
	public function getUs_bloqueio(){return $this-> us_bloqueio;}
	public function getUs_codRegistro(){return $this-> us_codRegistro;}
	public function getUs_tipoCadastro(){return $this-> us_tipoCadastro;}
	public function getUs_nome(){return $this-> us_nome;}

    public function mostrarDados() {
        $sql = "SELECT * FROM tb_usuario WHERE id = '$this->id'";
        $qry = self::executarSQL($sql);
        $linha = self::listar($qry);
        $this->id = $linha["id"];
		$this->us_login = $linha["us_login"];
		$this->us_password = $linha["us_password"];
		$this->us_codRecupera = $linha["us_codRecupera"];
		$this->us_dataCadastrado = $linha["us_dataCadastrado"];
		$this->us_nivel = $linha["us_nivel"];
		$this->us_bloqueio = $linha["us_bloqueio"];
		$this->us_codRegistro = $linha["us_codRegistro"];
		$this->us_tipoCadastro = $linha["us_tipoCadastro"];
		$this->us_nome = $linha["us_nome"];
    }
    public function totalRegistros($sql) {
        $qry = self::executarSQL($sql);
        $total = self::contaDados($qry);
        return $total;
    }
    public function verDados($sql, $i) {
        $qry = mysql_query($sql);
        $this->id = mysql_result($qry, $i, "id");
		$this->us_login = mysql_result($qry,$i,"us_login");
		$this->us_password = mysql_result($qry,$i,"us_password");
		$this->us_codRecupera = mysql_result($qry,$i,"us_codRecupera");
		$this->us_dataCadastrado = mysql_result($qry,$i,"us_dataCadastrado");
		$this->us_nivel = mysql_result($qry,$i,"us_nivel");
		$this->us_bloqueio = mysql_result($qry,$i,"us_bloqueio");
		$this->us_codRegistro = mysql_result($qry,$i,"us_codRegistro");
		$this->us_tipoCadastro = mysql_result($qry,$i,"us_tipoCadastro");
		$this->us_nome = mysql_result($qry,$i,"us_nome");
    }
	public function ListaUsuarioSYS($id){
		$sql= "SELECT * from tb_usuario WHERE us_nivel = '2'";
		$qry = self::executarSQL($sql);
		while($linha = self::listar($qry)){
			if($id==$linha["id"]){
				$selecionado = "selected='selected' ";
			}else{$selecionado = "";}
			echo "<option value=$linha[id] $selecionado>$linha[us_nome]</option>\n";
		}
	}
}
class DadosDadosUser extends conexaoMySQL {
    private $id,$CPF,$CNPJ,$RG,$tb_usuario_id;
    public function setId($id) {$this->id = $id;}
    public function getId(){return $this-> id;}
	public function getCPF(){return $this-> CPF;}
	public function getCNPJ(){return $this-> CNPJ;}
	public function getRG(){return $this-> RG;}
	public function getTb_usuario_id (){return $this-> tb_usuario_id ;}

    public function mostrarDados() {
        $sql = "SELECT * FROM tb_dadosuser WHERE id = '$this->id'";
        $qry = self::executarSQL($sql);
        $linha = self::listar($qry);
        $this->id = $linha["id"];
		$this->CPF = $linha["CPF"];
		$this->CNPJ = $linha["CNPJ"];
		$this->RG = $linha["RG"];
		$this->tb_usuario_id = $linha["tb_usuario_id"];
    }
    public function totalRegistros($sql) {
        $qry = self::executarSQL($sql);
        $total = self::contaDados($qry);
        return $total;
    }
    public function verDados($sql, $i) {
        $qry = mysql_query($sql);
        $this->id = mysql_result($qry,$i,"id");
		$this->CPF = mysql_result($qry,$i,"CPF");
		$this->CNPJ = mysql_result($qry,$i,"CNPJ");
		$this->RG = mysql_result($qry,$i,"RG");
		$this->tb_usuario_id = mysql_result($qry,$i,"tb_usuario_id");
    }
}

class DadosInformacoes extends conexaoMySQL {
    private $id,$infous_nomeCompleto,$infous_sexo,$infous_dataNascimento,$infous_telefone,$infous_telefonecoml,$infous_celular,$infous_apelido,$infous_receberOfertas,$infous_receberSMS,$infous_razaoSocial,$infous_contribuinte,$infous_inscricaoEstadual,$infous_responsavel,$infous_emailContato,$infous_profissao,$infous_codIdentificacao,$infous_clienteEspecial,$infous_CCM,$infous_imposto,$tb_usuario_id,$infous_dd;
    public function setId($id) {$this->id = $id;}
	public function getId(){return $this-> id;}
	public function getInfous_nomeCompleto(){return $this-> infous_nomeCompleto;}
	public function getInfous_sexo(){return $this-> infous_sexo;}
	public function getInfous_dataNascimento(){return $this-> infous_dataNascimento;}
	public function getInfous_telefonecoml(){return $this-> infous_telefonecoml;}
	public function getInfous_telefone(){return $this-> infous_telefone;}
	public function getInfous_celular(){return $this-> infous_celular;}
	public function getInfous_apelido(){return $this-> infous_apelido;}
	public function getInfous_receberOfertas(){return $this-> infous_receberOfertas;}
	public function getInfous_receberSMS(){return $this-> infous_receberSMS;}
	public function getInfous_razaoSocial(){return $this-> infous_razaoSocial;}
	public function getInfous_contribuinte(){return $this-> infous_contribuinte;}
	public function getInfous_inscricaoEstadual(){return $this-> infous_inscricaoEstadual;}
	public function getInfous_responsavel(){return $this-> infous_responsavel;}
	public function getInfous_emailContato(){return $this-> infous_emailContato;}
	public function getInfous_profissao(){return $this-> infous_profissao;}
	public function getInfous_codIdentificacao(){return $this-> infous_codIdentificacao;}
	public function getInfous_clienteEspecial(){return $this-> infous_clienteEspecial;}
	public function getInfous_CCM(){return $this-> infous_CCM;}
	public function getInfous_imposto(){return $this-> infous_imposto;}
	public function getTb_usuario_id (){return $this-> tb_usuario_id;}
	public function getInfous_dd (){return $this-> infous_dd;}

    public function mostrarDados() {
        $sql = "SELECT * FROM tb_infouser WHERE id = '$this->id'";
        $qry = self::executarSQL($sql);
        $linha = self::listar($qry);
		$this->id = $linha["id"];
		$this->infous_nomeCompleto = $linha["infous_nomeCompleto"];
		$this->infous_sexo = $linha["infous_sexo"];
		$this->infous_dataNascimento = $linha["infous_dataNascimento"];
		$this->infous_telefonecoml = $linha["infous_telefonecoml"];
		$this->infous_telefone = $linha["infous_telefone"];
		$this->infous_celular = $linha["infous_celular"];
		$this->infous_apelido = $linha["infous_apelido"];
		$this->infous_receberOfertas = $linha["infous_receberOfertas"];
		$this->infous_receberSMS = $linha["infous_receberSMS"];
		$this->infous_razaoSocial = $linha["infous_razaoSocial"];
		$this->infous_contribuinte = $linha["infous_contribuinte"];
		$this->infous_inscricaoEstadual = $linha["infous_inscricaoEstadual"];
		$this->infous_responsavel = $linha["infous_responsavel"];
		$this->infous_emailContato = $linha["infous_emailContato"];
		$this->infous_profissao = $linha["infous_profissao"];
		$this->infous_codIdentificacao = $linha["infous_codIdentificacao"];
		$this->infous_clienteEspecial = $linha["infous_clienteEspecial"];
		$this->infous_CCM = $linha["infous_CCM"];
		$this->infous_imposto = $linha["infous_imposto"];
		$this->tb_usuario_id = $linha["tb_usuario_id"];
		$this->infous_dd = $linha["infous_dd"];
    }
    public function totalRegistros($sql) {
        $qry = self::executarSQL($sql);
        $total = self::contaDados($qry);
        return $total;
    }
    public function verDados($sql, $i) {
        $qry = mysql_query($sql);
		$this->id = mysql_result($qry,$i,"id");
		$this->infous_nomeCompleto = mysql_result($qry,$i,"infous_nomeCompleto");
		$this->infous_sexo = mysql_result($qry,$i,"infous_sexo");
		$this->infous_dataNascimento = mysql_result($qry,$i,"infous_dataNascimento");
		$this->infous_telefonecoml = mysql_result($qry,$i,"infous_telefonecoml");
		$this->infous_telefone = mysql_result($qry,$i,"infous_telefone");
		$this->infous_celular = mysql_result($qry,$i,"infous_celular");
		$this->infous_apelido = mysql_result($qry,$i,"infous_apelido");
		$this->infous_receberOfertas = mysql_result($qry,$i,"infous_receberOfertas");
		$this->infous_receberSMS = mysql_result($qry,$i,"infous_receberSMS");
		$this->infous_razaoSocial = mysql_result($qry,$i,"infous_razaoSocial");
		$this->infous_contribuinte = mysql_result($qry,$i,"infous_contribuinte");
		$this->infous_inscricaoEstadual = mysql_result($qry,$i,"infous_inscricaoEstadual");
		$this->infous_responsavel = mysql_result($qry,$i,"infous_responsavel");
		$this->infous_emailContato = mysql_result($qry,$i,"infous_emailContato");
		$this->infous_profissao = mysql_result($qry,$i,"infous_profissao");
		$this->infous_codIdentificacao = mysql_result($qry,$i,"infous_codIdentificacao");
		$this->infous_clienteEspecial = mysql_result($qry,$i,"infous_clienteEspecial");
		$this->infous_CCM = mysql_result($qry,$i,"infous_CCM");
		$this->infous_imposto = mysql_result($qry,$i,"infous_imposto");
		$this->tb_usuario_id = mysql_result($qry,$i,"tb_usuario_id");
		$this->infous_dd = mysql_result($qry,$i,"infous_dd");
    }
	public function ListaInformacoes($id){
		$sql= "SELECT * from tb_infouser";
		$qry = self::executarSQL($sql);
		while($linha = self::listar($qry)){
			if($id==$linha["tb_usuario_id"]){
				$selecionado = "selected='selected' ";
			}else{$selecionado = "";}
			echo "<option value=$linha[tb_usuario_id] $selecionado>$linha[infous_nomeCompleto]</option>\n";
		}
	}
}
	
	class DadosEndereco extends conexaoMySQL{
		private $id,$tb_usuario_id,$end_tipoLogradouro,$end_cep,$end_logradouro,$end_numero,$end_complemento,$end_referencia,$end_bairro,$end_cidade,$end_uf;
		public function setId($id){$this->id = $id;}
		public function getId(){return $this-> id;}
		public function getTb_usuario_id(){return $this-> tb_usuario_id;}
		public function getEnd_tipoLogradouro(){return $this-> end_tipoLogradouro;}
		public function getEnd_cep(){return $this-> end_cep;}
		public function getEnd_logradouro(){return $this-> end_logradouro;}
		public function getEnd_numero(){return $this-> end_numero;}
		public function getEnd_complemento(){return $this-> end_complemento;}
		public function getEnd_referencia(){return $this-> end_referencia;}
		public function getEnd_bairro(){return $this-> end_bairro;}
		public function getEnd_cidade(){return $this-> end_cidade;}
		public function getEnd_uf (){return $this-> end_uf;}

		public function mostrarDados(){
			$sql= "SELECT * FROM tb_endereco WHERE id = '$this->id'";
			$qry = self::executarSQL($sql);
			$linha = self::listar($qry);
			$this->id = $linha["id"];
			$this->tb_usuario_id = $linha["tb_usuario_id"];
			$this->end_tipoLogradouro = $linha["end_tipoLogradouro"];
			$this->end_cep = $linha["end_cep"];
			$this->end_logradouro = $linha["end_logradouro"];
			$this->end_numero = $linha["end_numero"];
			$this->end_complemento = $linha["end_complemento"];
			$this->end_referencia = $linha["end_referencia"];
			$this->end_bairro = $linha["end_bairro"];
			$this->end_cidade = $linha["end_cidade"];
			$this->end_uf = $linha["end_uf"];
			
		}
		public function totalRegistros($sql){
			$qry = self::executarSQL($sql);
			$total= self::contaDados($qry);
			return $total;
		}
		public function verDados($sql,$i){
			$qry = mysql_query($sql);
			$this->id = mysql_result($qry,$i,"id");
			$this->tb_usuario_id = mysql_result($qry,$i,"tb_usuario_id");
			$this->end_tipoLogradouro = mysql_result($qry,$i,"end_tipoLogradouro");
			$this->end_cep = mysql_result($qry,$i,"end_cep");
			$this->end_logradouro = mysql_result($qry,$i,"end_logradouro");
			$this->end_numero = mysql_result($qry,$i,"end_numero");
			$this->end_complemento = mysql_result($qry,$i,"end_complemento");
			$this->end_referencia = mysql_result($qry,$i,"end_referencia");
			$this->end_bairro = mysql_result($qry,$i,"end_bairro");
			$this->end_cidade = mysql_result($qry,$i,"end_cidade");
			$this->end_uf = mysql_result($qry,$i,"end_uf");
		}
	}
	class DadosCategoria extends conexaoMySQL{
		private $id, $cat_categoria,$cat_bloqueio,$cat_slug,$cat_ordem;
		public function setId($id){$this->id = $id;}
		public function getId(){return $this-> id;}
		public function getCat_categoria(){return $this-> cat_categoria;}
		public function getCat_bloqueio(){return $this-> cat_bloqueio;}
		public function getCat_slug(){return $this-> cat_slug;}
		public function getCat_ordem (){return $this-> cat_ordem;}


		
		public function mostrarDados(){
			$sql= "SELECT * FROM  tb_categoria WHERE id = '$this->id'";
			$qry = self::executarSQL($sql);
			$linha = self::listar($qry);
			
			$this->id  = $linha["id"];
			$this->cat_categoria = $linha["cat_categoria"];
			$this->cat_bloqueio = $linha["cat_bloqueio"];
			$this->cat_slug = $linha["cat_slug"];
			$this->cat_ordem = $linha["cat_ordem"];

		}
		public function totalRegistros($sql){
			$qry = self::executarSQL($sql);
			$total= self::contaDados($qry);
			return $total;
		}
		public function verDados($sql,$i){
			$qry = mysql_query($sql);
			$this->id  = mysql_result($qry,$i,"id");
			$this->cat_categoria = mysql_result($qry,$i,"cat_categoria");
			$this->cat_bloqueio = mysql_result($qry,$i,"cat_bloqueio");
			$this->cat_slug = mysql_result($qry,$i,"cat_slug");
			$this->cat_ordem = mysql_result($qry,$i,"cat_ordem");

		}
		
		 public function ListaCategoria($id){
			$sql= "SELECT * FROM  tb_categoria ";
			$qry = self::executarSQL($sql);
			while($linha = self::listar($qry)){
				if($id==$linha["id"]){
					$selecionado = "selected='selected' ";
				} else{
					$selecionado = "";
				}
				echo "<option value=$linha[id] $selecionado>$linha[cat_categoria]</option>\n";
			}
		}
	}

	class DadosFornecedor extends conexaoMySQL{
		private $id, $idtb_usuario_do_sistema,$td_fornecedor_empresa,$td_fornecedor_representante1,$td_fornecedor_representante2,$td_fornecedor_datatime,$td_fornecedor_observacoes;
		public function setId($id){$this->id = $id;}
		public function getId(){return $this-> id;}
		public function getIdtb_usuario_do_sistema(){return $this-> idtb_usuario_do_sistema;}
		public function getTd_fornecedor_empresa(){return $this-> td_fornecedor_empresa;}
		public function getTd_fornecedor_representante1(){return $this-> td_fornecedor_representante1;}
		public function getTd_fornecedor_representante2(){return $this-> td_fornecedor_representante2;}
		public function getTd_fornecedor_datatime(){return $this-> td_fornecedor_datatime;}
		public function getTd_fornecedor_observacoes (){return $this-> td_fornecedor_observacoes ;}


		
		public function mostrarDados(){
			$sql= "SELECT * FROM  td_fornecedor WHERE id = '$this->id'";
			$qry = self::executarSQL($sql);
			$linha = self::listar($qry);
			
			$this->id  = $linha["id"];
			$this->idtb_usuario_do_sistema = $linha["idtb_usuario_do_sistema"];
			$this->td_fornecedor_empresa = $linha["td_fornecedor_empresa"];
			$this->td_fornecedor_representante1 = $linha["td_fornecedor_representante1"];
			$this->td_fornecedor_representante2 = $linha["td_fornecedor_representante2"];
			$this->td_fornecedor_datatime = $linha["td_fornecedor_datatime"];
			$this->td_fornecedor_observacoes = $linha["td_fornecedor_observacoes"];

		}
		public function totalRegistros($sql){
			$qry = self::executarSQL($sql);
			$total= self::contaDados($qry);
			return $total;
		}
		public function verDados($sql,$i){
			$qry = mysql_query($sql);
			$this->id  = mysql_result($qry,$i,"id");
			$this->idtb_usuario_do_sistema = mysql_result($qry,$i,"idtb_usuario_do_sistema");
			$this->td_fornecedor_empresa = mysql_result($qry,$i,"td_fornecedor_empresa");
			$this->td_fornecedor_representante1 = mysql_result($qry,$i,"td_fornecedor_representante1");
			$this->td_fornecedor_representante2 = mysql_result($qry,$i,"td_fornecedor_representante2");
			$this->td_fornecedor_datatime = mysql_result($qry,$i,"td_fornecedor_datatime");
			$this->td_fornecedor_observacoes = mysql_result($qry,$i,"td_fornecedor_observacoes");

		}
		
		 public function ListaFornecedor($id){
			$sql= "SELECT * FROM  td_fornecedor ";
			$qry = self::executarSQL($sql);
			while($linha = self::listar($qry)){
				if($id==$linha["id"]){
					$selecionado = "selected='selected' ";
				} else{
					$selecionado = "";
				}
				echo "<option value=$linha[id] $selecionado>$linha[td_fornecedor_empresa]</option>\n";
			}
		}
	}
			
	class DadosCliente extends conexaoMySQL{
		private $id, $idtb_usuario_do_sistema,$cliente_nome,$cliente_email,$cliente_telefone,$cliente_data,$cliente_obsevacoes;
		public function setId($id){$this->id = $id;}
		public function getId(){return $this-> id;}
		public function getIdtb_usuario_do_sistema(){return $this-> idtb_usuario_do_sistema;}
		public function getCliente_nome(){return $this-> cliente_nome;}
		public function getCliente_email(){return $this-> cliente_email;}
		public function getCliente_telefone(){return $this-> cliente_telefone;}
		public function getCliente_data(){return $this-> cliente_data;}
		public function getCliente_obsevacoes (){return $this-> cliente_obsevacoes ;}
		
		public function mostrarDados(){
			$sql= "SELECT * FROM  tb_cliente WHERE id = '$this->id'";
			$qry = self::executarSQL($sql);
			$linha = self::listar($qry);
			
			$this->id  = $linha["id"];
			$this->idtb_usuario_do_sistema = $linha["idtb_usuario_do_sistema"];
			$this->cliente_nome = $linha["cliente_nome"];
			$this->cliente_email = $linha["cliente_email"];
			$this->cliente_telefone = $linha["cliente_telefone"];
			$this->cliente_data = $linha["cliente_data"];
			$this->cliente_obsevacoes = $linha["cliente_obsevacoes"];

		}
		public function totalRegistros($sql){
			$qry = self::executarSQL($sql);
			$total= self::contaDados($qry);
			return $total;
		}
		public function verDados($sql,$i){
			$qry = mysql_query($sql);
			$this->id  = mysql_result($qry,$i,"id");
			$this->idtb_usuario_do_sistema = mysql_result($qry,$i,"idtb_usuario_do_sistema");
			$this->cliente_nome = mysql_result($qry,$i,"cliente_nome");
			$this->cliente_email = mysql_result($qry,$i,"cliente_email");
			$this->cliente_telefone = mysql_result($qry,$i,"cliente_telefone");
			$this->cliente_data = mysql_result($qry,$i,"cliente_data");
			$this->cliente_obsevacoes = mysql_result($qry,$i,"cliente_obsevacoes");

		}
		
		 public function ListaClientes($id){
			$sql= "SELECT * FROM  tb_cliente";
			$qry = self::executarSQL($sql);
			while($linha = self::listar($qry)){
				if($id==$linha["id"]){
					$selecionado = "selected='selected' ";
				} else{
					$selecionado = "";
				}
				echo "<option value=$linha[id] $selecionado>$linha[cliente_nome]</option>\n";
			}
		}
	}		
	
	
		
	class DadosProduto extends conexaoMySQL {
		private $id,$idtb_usuario_do_sistema,$produto_titulo,$produto_descricao,$produto_preco,$produto_data,$idtb_categoria,$idtb_fornecedor;
		public function setId($id) {$this->id = $id;}
		public function getId(){return $this-> id;}
		public function getIdtb_usuario_do_sistema(){return $this-> idtb_usuario_do_sistema;}
		public function getIdtb_categoria(){return $this-> idtb_categoria;}
		public function getIdtb_fornecedor(){return $this-> idtb_fornecedor;}
		public function getProduto_titulo(){return $this-> produto_titulo;}
		public function getProduto_descricao(){return $this-> produto_descricao;}
		public function getProduto_preco(){return $this-> produto_preco;}
		public function getProduto_data (){return $this-> produto_data ;}
		
		public function mostrarDados() {
			$sql = "SELECT * FROM tb_produto WHERE id = '$this->id'";
			$qry = self::executarSQL($sql);
			$linha = self::listar($qry);
			$this->id = $linha["id"];
			$this->idtb_usuario_do_sistema = $linha["idtb_usuario_do_sistema"];
			$this->idtb_categoria = $linha["idtb_categoria"];
			$this->idtb_fornecedor = $linha["idtb_fornecedor"];
			$this->produto_titulo = $linha["produto_titulo"];
			$this->produto_descricao = $linha["produto_descricao"];
			$this->produto_preco = $linha["produto_preco"];
			$this->produto_data = $linha["produto_data"];

		}
		public function totalRegistros($sql) {
			$qry = self::executarSQL($sql);
			$total = self::contaDados($qry);
			return $total;
		}
		public function verDados($sql, $i) {
			$qry = mysql_query($sql);
			$this->id = mysql_result($qry,$i,"id");
			$this->idtb_usuario_do_sistema = mysql_result($qry,$i,"idtb_usuario_do_sistema");
			$this->idtb_categoria = mysql_result($qry,$i,"idtb_categoria");
			$this->idtb_fornecedor = mysql_result($qry,$i,"idtb_fornecedor");
			$this->produto_titulo = mysql_result($qry,$i,"produto_titulo");
			$this->produto_descricao = mysql_result($qry,$i,"produto_descricao");
			$this->produto_preco = mysql_result($qry,$i,"produto_preco");
			$this->produto_data = mysql_result($qry,$i,"produto_data");
		}

		public function ListaProduto($id){
			$sql= "SELECT * FROM  tb_produto ";
			$qry = self::executarSQL($sql);
			while($linha = self::listar($qry)){
				if($id==$linha["id"]){
					$selecionado = "selected='selected' ";
				} else{
					$selecionado = "";
				}
				echo "<option value=$linha[id] $selecionado>$linha[produto_titulo]</option>\n";
			}
		}		
	}	
				
	class DadosPedido extends conexaoMySQL {
		private $id,$idtb_usuario_do_sistema,$idtb_cliente,$idtb_produto,$pedido_data,$pedido_codigo,$pedido_titulo,$pedido_observacoes;
		public function setId($id) {$this->id = $id;}
		public function getId(){return $this-> id;}
		public function getIdtb_usuario_do_sistema(){return $this-> idtb_usuario_do_sistema;}
		public function getIdtb_cliente(){return $this-> idtb_cliente;}
		public function getIdtb_produto(){return $this-> idtb_produto;}
		public function getPedido_data(){return $this-> pedido_data;}
		public function getPedido_codigo (){return $this-> pedido_codigo;}
		public function getPedido_titulo (){return $this-> pedido_titulo;}
		public function getPedido_observacoes (){return $this-> pedido_observacoes;}
		
		public function mostrarDados() {
			$sql = "SELECT * FROM tb_pedido WHERE id = '$this->id'";
			$qry = self::executarSQL($sql);
			$linha = self::listar($qry);
			$this->id = $linha["id"];
			$this->idtb_usuario_do_sistema = $linha["idtb_usuario_do_sistema"];
			$this->idtb_cliente = $linha["idtb_cliente"];
			$this->idtb_produto = $linha["idtb_produto"];
			$this->pedido_data = $linha["pedido_data"];
			$this->pedido_codigo = $linha["pedido_codigo"];
			$this->pedido_titulo = $linha["pedido_titulo"];
			$this->pedido_observacoes = $linha["pedido_observacoes"];

		}
		public function totalRegistros($sql) {
			$qry = self::executarSQL($sql);
			$total = self::contaDados($qry);
			return $total;
		}
		public function verDados($sql, $i) {
			$qry = mysql_query($sql);
			$this->id = mysql_result($qry,$i,"id");
			$this->idtb_usuario_do_sistema = mysql_result($qry,$i,"idtb_usuario_do_sistema");
			$this->idtb_cliente = mysql_result($qry,$i,"idtb_cliente");
			$this->idtb_produto = mysql_result($qry,$i,"idtb_produto");
			$this->pedido_data = mysql_result($qry,$i,"pedido_data");
			$this->pedido_codigo = mysql_result($qry,$i,"pedido_codigo");
			$this->pedido_titulo = mysql_result($qry,$i,"pedido_titulo");
			$this->pedido_observacoes = mysql_result($qry,$i,"pedido_observacoes");
		}		
	}
	

?>