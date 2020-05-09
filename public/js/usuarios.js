function showErrorsModal(error_list) {
	clearErrors();

	$.each(error_list, function (id, message) {
		$(id).parent().parent().addClass("has-error");
		$(id).siblings(".help-block").html(message);
	})
}

$(function() {
	$("#btn_adicionar_usuario").click(function () {
		clearErrors();
		$("#form_usuario")[0].reset();
		$("#modal_usuario").modal();
	});

	$("#form_usuario").submit(function () {
		$.ajax({
			type: "post",
			url: BASE_URL + "salvarUsuario",
			dataType: "json",
			data: $(this).serialize(),
			beforeSend: function () {
				clearErrors();
				$("#btn_salvar_usuario").siblings(".help-block").html(loadingImg("Verificando..."));
			},
			success: function (response) {
				clearErrors();
				if(response["status"]){
					$("#modal_usuario").modal("hide");
					Swal.fire(
						'Bom trabalho!',
						'Usuario salvo com sucesso!',
						'success'
					);
					tb_usuarios.ajax.reload();
				}else{
					showErrorsModal(response["error_list"]);
				}
			}
		})
		return false;
	});

	$("#btn_editar_perfil_usuario").click(function () {
		$.ajax({
			type: "post",
			url: BASE_URL + "editarUsuario",
			dataType: "json",
			data: {"usuario_id": $(this).attr("usuario_id")},
			success: function (response) {
				clearErrors();
				$("#form_usuario")[0].reset();
				$.each(response["input"], function (id, value) {
					$("#"+id).val(value);
				});
				$("#modal_usuario").modal();
			}
		})
		return false;
	});

	function ativar_btn_usuario() {

		$(".btn-editar-usuario").click(function () {
			$.ajax({
				type: "post",
				url: BASE_URL + "editarUsuario",
				dataType: "json",
				data: {"usuario_id": $(this).attr("usuario_id")},
				success: function (response) {
					clearErrors();
					$("#form_usuario")[0].reset();
					$.each(response["input"], function (id, value) {
						$("#"+id).val(value);
					});
					$("#modal_usuario").modal();
				}
			})
			return false;
		});

		$(".btn-deletar-usuario").click(function () {
			usuario_id = $(this);

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
						url: BASE_URL + "deletarUsuario",
						dataType: "json",
						data: {"usuario_id": usuario_id.attr("usuario_id")},
						success: function (response) {
							Swal.fire(
								'Apagado!',
								'Seu registro foi apagado com sucesso.',
								'success'
							)
							tb_usuarios.ajax.reload();
						}
					});
				}
			})
			return false;
		});
	}

	var tb_usuarios = $("#tabela_usuarios").DataTable({
		"oLanguage" : DATATABLE_PT_BR,
		"autoWidth": false,
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url": BASE_URL + "listarUsuarios",
			"type": "post"
		},
		"drawCallback": function () {
			ativar_btn_usuario();
		}
	})

})
