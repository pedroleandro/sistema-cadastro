function showErrorsModal(error_list) {
	clearErrors();

	$.each(error_list, function (id, message) {
		$(id).parent().parent().addClass("has-error");
		$(id).siblings(".help-block").html(message);
	})
}

$(function() {

	$("#btn_adicionar_curso").click(function () {
		clearErrors();
		$("#form_curso")[0].reset();
		$("#imagem_arquivo").attr("src", "");
		$("#modal_curso").modal();
	});

	$("#btn_upload_curso_avatar").change(function () {
		uploadImagem($(this), $("#imagem_arquivo"), $("#imagem_dir"));

		// const file = $(this)[0].files[0];
		// const fileReader = new FileReader();
		//
		// fileReader.onloadend = function () {
		// 	$("#imagem_arquivo").attr("src", fileReader.result);
		// }
		// fileReader.readAsDataURL(file);

	});

	$("#form_curso").submit(function () {
		$.ajax({
			type: "post",
			url: BASE_URL + "salvarCurso",
			dataType: "json",
			data: $(this).serialize(),
			beforeSend: function () {
				clearErrors();
				$("#btn_salvar_curso").siblings(".help-block").html(loadingImg("Verificando..."));
			},
			success: function (response) {
				clearErrors();
				if(response["status"]){
					$("#modal_curso").modal("hide");
					Swal.fire(
						'Bom trabalho!',
						'Curso salvo com sucesso!',
						'success'
					);
					tb_cursos.ajax.reload();
				}else{
					showErrorsModal(response["error_list"]);
				}
			}
		})

		return false;
	});
	
	function ativar_btn_curso() {

		$(".btn-editar-curso").click(function () {
			$.ajax({
				type: "post",
				url: BASE_URL + "editarCurso",
				dataType: "json",
				data: {"curso_id": $(this).attr("curso_id")},
				success: function (response) {
					clearErrors();
					$("#form_curso")[0].reset();
					$.each(response["input"], function (id, value) {
						$("#"+id).val(value);
					});
					$("#imagem_arquivo").attr("src", response["img"]["imagem_arquivo"]);
					console.log(response["img"]["imagem_arquivo"]);
					$("#modal_curso").modal();
				}
			})
			return false;
		});

		$(".btn-deletar-curso").click(function () {
			curso_id = $(this);

			Swal.fire({
				title: 'Voce tem certeza?',
				text: "Voce vai perder todas as informaçoes desse registro!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Sim, quero apagar!',
				cancelButtonText: 'Nao'
			}).then((result) => {
				if (result.value) {
					$.ajax({
						type: "post",
						url: BASE_URL + "deletarCurso",
						dataType: "json",
						data: {"curso_id": curso_id.attr("curso_id")},
						success: function (response) {
							Swal.fire(
								'Apagado!',
								'Seu registro foi apagado com sucesso.',
								'success'
							)
							tb_cursos.ajax.reload();
						}
					});
				}
			})
			return false;
		});

	}

	var tb_cursos = $("#tabela_cursos").DataTable({
		"oLanguage" : DATATABLE_PT_BR,
		"autoWidth": false,
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url": BASE_URL + "listarCursos",
			"type": "post"
		},
		"drawCallback": function () {
			ativar_btn_curso();
		}
	});

})
