$(obtener_registros());

function obtener_registros(gafas)
{
	$.ajax({
		url : 'consulta_gafas.php',
		type : 'POST',
		dataType : 'html',
		data : { gafas: gafas },
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
