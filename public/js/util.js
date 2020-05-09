const BASE_URL = "http://localhost/web/gecad-dynamic/";
const DATATABLE_PT_BR = {
	"sEmptyTable": "Nenhum registro encontrado",
	"sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
	"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
	"sInfoFiltered": "(Filtrados de _MAX_ registros)",
	"sInfoPostFix": "",
	"sInfoThousands": ".",
	"sLengthMenu": "_MENU_ resultados por página",
	"sLoadingRecords": "Carregando...",
	"sProcessing": "Processando...",
	"sZeroRecords": "Nenhum registro encontrado",
	"sSearch": "Pesquisar",
	"oPaginate": {
		"sNext": "Próximo",
		"sPrevious": "Anterior",
		"sFirst": "Primeiro",
		"sLast": "Último"
	},
	"oAria": {
		"sSortAscending": ": Ordenar colunas de forma ascendente",
		"sSortDescending": ": Ordenar colunas de forma descendente"
	},
	"select": {
		"rows": {
			"_": "Selecionado %d linhas",
			"0": "Nenhuma linha selecionada",
			"1": "Selecionado 1 linha"
		}
	}
}



function clearErrors() {
	$(".has-error").removeClass("has-error");
	$(".help-block").html("");
}

function showErrors(error_list) {
	clearErrors();

	$.each(error_list, function (id, message) {
		$(id).parent().parent().addClass("has-error");
		$(id).parent().siblings(".help-block").html(message);
	})
}

function loadingImg(message="") {
	return "<i class 'fa fa-circle-o-notch fa-spin'></i>&nbsp;" + message;
}

function uploadImagem(input_arquivo, input_imagem, input_dir) {
	src_bkp = input_imagem.attr("src");
	img_arquivo = input_arquivo[0].files[0];

	form_data = new FormData();
	form_data.append("imagem_arquivo", img_arquivo);

	$.ajax({
		url: BASE_URL + "imageUpload",
		dataType: "json",
		cache: false,
		contentType: false,
		processData: false,
		data: form_data,
		type: "POST",
		beforeSend: function () {
			clearErrors();
			input_dir.siblings(".help-block").html(loadingImg("Carregando Imagem..."));
		},
		success: function (response) {
			clearErrors();
			if(response["status"]){
				input_imagem.attr("src", response["imagem_dir"]);
				input_dir.val(response["imagem_dir"]);
			}else{
				input_imagem.attr("src", src_bkp);
				input_dir.siblings(".help-block").html(response["error_list"]);
			}
		},
		error: function () {
			input_imagem.attr("src", src_bkp);
		}
	})
}


