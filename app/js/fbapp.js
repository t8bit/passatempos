$(document).ready(function() {
	var sending;
	$(".submit").click(function() {
		id=$(this).attr('alt');
		estado=$(this).attr('alt2');
		$.post("index.php?route=fbapp", { formato: "json", id: id },
				function(data) 
				{
					decode_data=$.parseJSON(data);
					console.log(decode_data[0].id );
					if(estado=='begin')
					{
						createhtml(decode_data[0],id);
					}
					else
					{
						$('#all').html("Vencedores:<br/>"+decode_data[0].vencedores);
					}
				}
			);
		
		return false;
	});
	
});	
var createhtml=function(data,id)
{
	var html
	html="<div style='border:1px solid green;width:100%;height:100%;'>"+data.desafio;
	html=html+"<form method='post' action='' id='question'>";
	html=html+"<input type='text' style='visibility:hidden;' value='"+id+"'/>";
	switch(data.tipo)
	{
		case 'imagem':
			html=html+"<input type='hidden' name='MAX_FILE_SIZE' value='100000' />Choose a file to upload: <input name='uploadedfile' type='file' /><br /><input type='submit' value='Upload File' />";
		break;
		case 'link_video':
			html=html+"<input type='text' name='link_video'/>";
		break;
		
		case 'imagem_video':
			html=html+"<input type='hidden' name='MAX_FILE_SIZE' value='100000' />Choose a file to upload: <input name='uploadedfile' type='file' /><br /><input type='submit' value='Upload File' />";
		break;
		
		case 'texto':
			html=html+"<textarea name='texto' style='width:100%;height:400px;'></textarea>";
		break;
		
		case 'multiplas':
			if(data.r1){html=html+"<input type='radio' class='question' name='question' value="+data.r1+">"+data.r1+"<br>";}
			if(data.r2){html=html+"<input type='radio' class='question' name='question' value="+data.r2+">"+data.r2+"<br>";}
			if(data.r3){html=html+"<input type='radio' class='question' name='question' value="+data.r3+">"+data.r3+"<br>";}
			if(data.r4){html=html+"<input type='radio' class='question' name='question' value="+data.r4+">"+data.r4+"<br>";}
			if(data.r5){html=html+"<input type='radio' class='question' name='question' value="+data.r5+">"+data.r5+"<br>";}
			if(data.r6){html=html+"<input type='radio' class='question' name='question' value="+data.r6+">"+data.r6+"<br>";}
		break;
	}
	
	html=html+"<input type='checkbox' id='termos' name='termos' value='aceito'>Aceito os termos de <span id='termos' style='font-weight:bold;text-decoration:underline;'>ultilização</span><br>";
	html=html+"<input type='submit' id='concorrer' value='Concorrer'/><br>";
	html=html+"</form>";
	html=html+"</div>";
	html=html+"<div id='regulamento'>"+data.regulamento+"</div>";
	$("#all").html(html);
	
	
	$("#regulamento").hide();
	$("#termos").click(function() {$("#regulamento").show();});
	
	//on click send->dispara agradecimentos
	$("#concorrer").click(function() {
		//ajax send:
			termos=$('#termos:checked').val();
			question=$('.question:checked').val();
			if(termos!=undefined && question!=undefined){sending=true;}else{sending=false;}

			if(sending)
			{
				$.post("to_users.php", $('#question').serialize(),
				function(data_final) 
				{
				
				}
				$('#all').html(data.agradecimentos);	
			}
			else
			{
				alert("não preencheu os campos obrigatorios");
			}
		);
		return false;		
	});
	
}
