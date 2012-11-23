$(document).ready(function() {
	$('#multiplas').hide();
	
	$('#tipo').change(function() {
		tipoValor=$('#tipo').val();
			
		if(tipoValor=='multiplas')
		{
			$('#multiplas').show();
		}
		else
		{
			$('#multiplas').hide();
		}
	});
});
