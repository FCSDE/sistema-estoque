$(document).ready(function () {
$('[data-toggle="tooltip"]').tooltip();
$("#dinheiro").maskMoney({showSymbol:true, symbol:"R$", decimal:".", thousands:","});
$("#dinheiro1").maskMoney({showSymbol:true, symbol:"R$", decimal:",", thousands:"."});
$('.collapse').collapse('hide');
 $('.sonums').keypress(function(event) {
        var tecla = (window.event) ? event.keyCode : event.which;
        if ((tecla > 47 && tecla < 58)) return true;
        else {
            if (tecla != 8) return false;
            else return true;
        }
    });
	
	var cadusuario = $('form[name="frmcadusuario"]');
	cadusuario.submit(function(){
		var msg = $('.msgusuario');
		var valUsuario = $(this).serialize();
		$.ajax({
			url: $('form[name="frmcadusuario"]').attr('action'),
			data: valUsuario,
			type: 'POST',
			success: function(dados){
				if(dados == 1){
					msg.empty().html('<p class="alert alert-success"><b>Cadastro finalizado!</b></p>');
					window.setTimeout(function(){$(location).attr('href','');},1000);
				}else if(dados == 2){
					//var url = $('input[name="url"]').val();
					msg.empty().html('<p class="alert alert-info"><b>Alteração com sucesso!</b></p>');
					setTimeout(function() {location.reload()}, 1500);
				}else{
					msg.empty().html('');
					msg.empty().html(dados).fadeIn('slow');
					window.setTimeout(function(){
						msg.fadeOut(500);
					},1500);
				}
			},
			beforeSend: function(){$('.panel-heading img').fadeIn('fast');},
			complete: function(){$('.panel-heading img').fadeOut('slow');},
			error: function(){msg.empty().html('Erro! Verifique a conexão');}
		});
		return false;
	});
	
	var cadGenerico = $('form[name="frmgenerico"]');
	var imagen = $('.img_img').hide();
	cadGenerico.submit(function(){
		var urls = $(this).attr('id');
		//alert($('form[name="frmgenerico"]').attr('action'));
		var msg = $('.msg span');		
		var valGenerico = $(this).serialize();
		//alert( valGenerico );
		$.ajax({
			url: $('form[name="frmgenerico"]').attr('action'),
			data: valGenerico,
			type: 'POST',
			success: function( dados ){
				//alert( dados );
				if(dados == 1){					
					msg.empty().html('<p class="alert alert-success"><b>Cadastro finalizado!</b></p>');
					window.setTimeout(function(){$(location).attr('href',urls);},1000);
					//window.setTimeout(function(){$(location).attr('href','/2016petshop/petshop1'+urls);},1000);
					//setTimeout(function() { location.reload(urls); }, 500);
				}else{
					msg.empty().html('');
					msg.empty().html( dados ).fadeIn('slow');
					window.setTimeout(function(){
						msg.fadeOut(500);
					},3500);
				}
			},
			beforeSend: function(){$(imagen).fadeIn('fast');},
			complete: function(){$(imagen).fadeOut('slow');},
			error: function(){msg.empty().html('<p class="alert alert-danger"><b>Erro! Verifique a conexão</b></p>');}
		});
		return false;
	});	
		
	//CONTEUDO COM TEXTO HTML
	var imagen = $('.img_img').hide();
	$("form#frmcomtextohtml").submit(function (event) {
	tinyMCE.triggerSave();
	var msg = $('.msg span');
	var urls = $(this).attr('name');
        event.preventDefault();
        var forMultData = new FormData($(this)[0]);
		//alert(forMultData);
        $.ajax({            
            type: 'POST',
			url: $("form#frmcomtextohtml").attr('action'),
            data: new FormData($(this)[0]),
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (dados) {
				//alert(dados);
                if (dados == 1) {
					msg.empty().html('<p class="alert alert-success"><b>Cadastro finalizado!</b></p>');
					window.setTimeout(function(){$(location).attr('href',urls);},1000);
                }else {
					msg.empty().html('');
					msg.empty().html( dados ).fadeIn('slow');
					window.setTimeout(function(){
						msg.fadeOut(500);
					},3500);
                }
            },
            beforeSend: function(){$(imagen).fadeIn('fast');},
			complete: function(){$(imagen).fadeOut('slow');},
			error: function(){msg.empty().html('<p class="alert alert-danger"><b>Erro! Verifique a conexão</b></p>');}
        });
        return false;
    });
	
	//FILES
	var imagen = $('.img_img').hide();
	$("form#ARQUIVO").submit(function (event) {		
		var msg = $('.msg span');
		var urld = $(this).attr('name');
		//alert(urld);
        event.preventDefault();
        var forMultImg = new FormData($(this)[0]);
        $.ajax({
            url: $("form#ARQUIVO").attr('action'),
            type: 'POST',
            data: forMultImg,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success: function (dados) {
                if (dados == 1) {
					msg.empty().html('<p class="alert alert-success"><b>Cadastro finalizado!</b></p>');
					window.setTimeout(function(){$(location).attr('href',urld);},500);
                } else {
					msg.empty().html('');
					msg.empty().html(dados).fadeIn('slow');
					window.setTimeout(function(){
						msg.fadeOut( 1500 );
					},4500);
                }
            },
            beforeSend: function(){$(imagen).fadeIn('fast');},
			complete: function(){$(imagen).fadeOut('slow');},
			error: function(){msg.empty().html('<p class="alert alert-danger"><b>Erro! Verifique a conexão</b></p>');}
        });
        return false;
    });
	
	
});// fim do documento
