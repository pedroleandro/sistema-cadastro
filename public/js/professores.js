function showErrorsModal(error_list) {
	clearErrors();

	$.each(error_list, function (id, message) {
		$(id).parent().parent().addClass("has-error");
		$(id).siblings(".help-block").html(message);
	})
}

$(function() {
	$("#btn_adicionar_professor").click(function () {
		clearErrors();
		$("#form_professor")[0].reset();
		$("#imagem_arquivo").attr("src", "");
		$("#modal_professor").modal();
	});

	$("#btn_upload_professor_avatar").change(function () {
		uploadImagem($(this), $("#imagem_arquivo"), $("#imagem_dir"));

		// const file = $(this)[0].files[0];
		// const fileReader = new FileReader();
		//
		// fileReader.onloadend = function () {
		// 	$("#imagem_arquivo").attr("src", fileReader.result);
		// }
		// fileReader.readAsDataURL(file);

	});

	$("#form_professor").submit(function () {
		$.ajax({
			type: "post",
			url: BASE_URL + "salvarProfessor",
			dataType: "json",
			data: $(this).serialize(),
			beforeSend: function () {
				clearErrors();
				$("#btn_salvar_professor").siblings(".help-block").html(loadingImg("Verificando..."));
			},
			success: function (response) {
				clearErrors();
				if(response["status"]){
					$("#modal_professor").modal("hide");
					Swal.fire(
						'Bom trabalho!',
						'Professor salvo com sucesso!',
						'success'
					);
					tb_professores.ajax.reload();
				}else{
					showErrorsModal(response["error_list"]);
				}
			}
		})

		return false;
	});

	function ativar_btn_professor() {

		$(".btn-editar-professor").click(function () {
			$.ajax({
				type: "post",
				url: BASE_URL + "editarProfessor",
				dataType: "json",
				data: {"professor_id": $(this).attr("professor_id")},
				success: function (response) {
					clearErrors();
					$("#form_professor")[0].reset();
					$.each(response["input"], function (id, value) {
						$("#"+id).val(value);
					});
					$("#imagem_arquivo").attr("src", response["img"]["imagem_dir"]);
					$("#modal_professor").modal();
				}
			})
			return false;
		});

		$(".btn-deletar-professor").click(function () {
			professor_id = $(this);

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
						url: BASE_URL + "deletarProfessor",
						dataType: "json",
						data: {"professor_id": professor_id.attr("professor_id")},
						success: function (response) {
							Swal.fire(
								'Apagado!',
								'Seu registro foi apagado com sucesso.',
								'success'
							)
							tb_professores.ajax.reload();
						}
					});
				}
			})
			return false;
		});

	}

	var tb_professores = $("#tabela_professores").DataTable({
		"oLanguage" : DATATABLE_PT_BR,
		"autoWidth": false,
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url": BASE_URL + "listarProfessores",
			"type": "post"
		},
		"drawCallback": function () {
			ativar_btn_professor();
		}
	})

})
