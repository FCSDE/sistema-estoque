$(document).ready(function(){
	//var url = 'http://localhost/2015teste/projeto2/admin/php/funcoes_genericas.php';
    var congelar = $('form[name="congelar"]');
    congelar.submit(function () {    
            var valCongelar = $(this).serialize();
            $.ajax({
                url: $('form[name="congelar"]').attr('action'),
                data: valCongelar,
                type: 'POST',
                success: function (dadosCongelar) {
					//alert(dadosCongelar);
                    if (dadosCongelar == 1) {
                       // window.setTimeout(function () {$(location).attr('href', '');}, 1000);
							setTimeout(function() { location.reload(); }, 500);
                    }else { alert( dadosCongelar );}
                },
                beforeSend: function () {$('.panel-heading img').fadeIn('fast');},
                complete: function () {$('.panel-heading img').fadeOut('slow');},
                error: function () { alert('Erro! Verifique a conex√£o');}
            });        
        return false;
    });

    var acaoSair = $('form[name="sair"]');
		acaoSair.submit(function () {	
			var valSair = $(this).serialize();	
			//alert(valSair);
            $.ajax({
                url: $('form[name="sair"]').attr('action'),
                data: valSair,
                type: 'POST',
                success: function (dadosSair) {
					//alert(dadosSair);
                    if (dadosSair == 1) {
							$('.sair').html('Deslogado com sucesso!');	
							setTimeout(function() { location.reload(); }, 1500);
                    }else { alert( dadosSair );}
                },
                beforeSend: function () {$('.panel-heading img').fadeIn('fast');},
                complete: function () {$('.panel-heading img').fadeOut('slow');},
                error: function () { alert('Erro! Verifique a conex√£o');}
            });      
        return false;
    });
	
	var formExcluir = $('form[name="excluir"]');
    formExcluir.submit(function () {
		var d = confirm('Clique em OK para confirmar e CANCELAR para sair.');
		if (!d) {
			//alert('Deseja mesmo excluir ?');
		}else {
			var vExcluir = $(this).serialize();
			//alert(vExcluir);
			$.ajax({
				url: $('form[name="excluir"]').attr('action'),
				data: vExcluir,
				type: 'POST',
				success: function( dadosExcluir ){
					//alert(dadosExcluir);
					window.setTimeout(function(){$(location).attr('href',' ');},1000);
					//setTimeout(function() { location.reload(); }, 500);				
				},
				beforeSend: function(){$('.panel-heading img').fadeIn('fast');},
				complete: function(){$('.panel-heading img').fadeOut('slow');},
				error: function(){alert ('Erro! Sistema encontrou um erro!');}
			});
		}
        return false;
    });		
	
	
	
	var formCapaBannerx = $('form[name="capa_banner"]');
    formCapaBannerx.change(function () {
        var valBannerCapax = $(this).serialize();
		//alert(valBannerCapax);
		$.ajax({
			url: '../php/funcoes_genericas.php',
			data: valBannerCapax,
			type: 'POST',
			success: function( dadosBanner ){
				//alert(dadosBanner);
				window.setTimeout(function(){
					$(location).attr('href',' ');
				},500);	
			},
			beforeSend: function(){$('.panel-heading img').fadeIn('fast');},
			complete: function(){$('.panel-heading img').fadeOut('slow');},
			error: function(){alert ('Erro! Sistema n„o conseguiu completar operaÁ„o..!');}
		});
        return false;
    });	
	
});// fim do documento
