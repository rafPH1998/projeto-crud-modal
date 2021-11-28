function editar(id) {
    $.ajax({
        url:'add.php',
        type: 'POST',
        data: {id:id},
        beforeSend:function() {
            $('#modal').fadeTo("slow", 0.9).modal('show');
        },
        success:function(html) {
            $('#modal').find('.modal-body').html(html);
            $('#modal').find('.modal-body').find('form').on('submit', salvar);
            $('#modal').find('show');
        }
    });
}

function add() {
    $.ajax({
        url:'adicionar.php',
        type: 'POST',
        beforeSend:function() {
            $('#modal').fadeTo("slow", 0.9).modal('show');
        },
        success:function(html) {
            $('#modal').find('.modal-body').html(html);
            $('#modal').find('.modal-body').find('form').on('submit', function(e){
                e.preventDefault();
                var name = $(this).find('input[name=name]').val();
                var email = $(this).find('input[name=email]').val();
                var idade = $(this).find('input[name=idade]').val();
                var cidade = $(this).find('input[name=cidade]').val();
                var estado = $(this).find('input[name=estado]').val();
                var empresa = $(this).find('input[name=empresa]').val();

                $.ajax({
                    url:'adicionar_action.php',
                    type:'POST',
                    data: {
                        name:name, 
                        email:email, 
                        idade:idade, 
                        cidade:cidade, 
                        estado:estado, 
                        empresa:empresa
                    },
                    dataType: 'json',
                    success:function(json) {
                        if(json.status !== 'of') {
                            if(json.equals !== 'of') {
                                alert('Usuário cadastrado com sucesso!');
                                window.location.href = window.location.href;
                            } else {
                                alert('Esse e-mail já está cadastrado em nosso sistema!');
                            }
                        } 
                    }
                });
            });

            $('#modal').fadeTo("slow", 0.9).modal('show');
        }
    });
}


function salvar(e) {
    e.preventDefault();
    var name = $(this).find('input[name=name]').val();
    var email = $(this).find('input[name=email]').val();
    var idade = $(this).find('input[name=idade]').val();
    var cidade = $(this).find('input[name=cidade]').val();
    var estado = $(this).find('input[name=estado]').val();
    var empresa = $(this).find('input[name=empresa]').val();

    var id = $(this).find('input[name=id]').val();

    $.ajax({
        url:'update.php',
        type:'POST',
        data: {
            name:name, 
            email:email, 
            idade:idade, 
            cidade:cidade, 
            estado:estado, 
            empresa:empresa, 
            id:id
        },
        success:function() {
            alert('Usuário editado com sucesso');
            window.location.href = window.location.href;
        }
    });
}

function excluir(id) {
    $('#modal').find('.modal-body').html('Dejesa mesmo excluir esse usuário?<br/><button class="btn btn-success" onclick="deleteUser('+id+')">Sim</button><button class="btn btn-danger" onclick="fechar()" id="btn-close">Não</button>');
    $('#modal').fadeTo("slow", 12).modal('show');
}

function deleteUser(id) {

    $.ajax({
        url:'delete.php',
        type:'POST',
        data: {id:id},
        success:function() {
            alert("Usuário excluído com sucesso!");
            window.location.href = window.location.href;
        }
    });
}

function fechar() {
    $('#modal').fadeTo("slow", 0.9).modal('hide');
}

//fazendo a requisição para pegar registros dos usuarios em tempo real
$(document).ready(function(){
	$('.center input').keyup(function(){
		var words = $('input').val();

		if (words != '') {

			$.ajax({
				url:'search.php',
				method:'GET',
				dataType:'json',
				data: {name: words},
				success: function(data, val) {
					$('#table').html(data);
				}
			})
			.fail(function(){
				$('#table').html('');
			});
			
		} else {
			window.location.href = window.location.href;
		}
	});
});



