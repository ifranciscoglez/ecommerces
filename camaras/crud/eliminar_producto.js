$(document).ready(function(){
	$(".eliminar").click(function(){
		var imagen=$(this).parent('td').parent('tr').find('.id').val();
		$(this).parent('td').parent('tr').remove();
		$.post('./eliminar.php',{
			Caso:'Eliminar',
			Id:$(this).attr('data-id'),
		},function(e){
			alert(e);
		});
		
		});
	});
});