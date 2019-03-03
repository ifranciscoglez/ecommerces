$(obtener_registros());

function obtener_registros(categoria)
{
	$.ajax({
		url : 'consulta_categorias.php',
		type : 'POST',
		dataType : 'html',
		data : { categoria: categoria },
		})

	.done(function(resultado){
		$("#tabla_resultado").html(resultado);
	})
    
    	.fail(function(resultado){
        console.log("error");
	})
}

$(document).on('keyup', '#busqueda', function()
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_registros(valorBusqueda);
	}
	else
		{
			obtener_registros();
		}
});
