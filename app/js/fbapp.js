$(document).ready(function() {
	var sending;
	$(".submit").click(function() {
		id=$(this).attr('alt');
		estado=$(this).attr('alt2');
		$.post("index.php?route=fbapp", { formato: "json", id: id },
				function(data) 
				{
					decode_data=$.parseJSON(data);
					console.log(decode_data[0]);
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
	

	
	$(".votar").click(function() {
		id=$(this).attr('alt');
		$.post("index.php", { id: id, formato: "json",funcao: "votar" },function(data) {
			decode_votar=$.parseJSON(data);
			//alert(decode_votar.length);
			var html="";
			for(var i=0;i<decode_votar.length;i++)
			{
				html=html+"<div style='border:1px dotted blue;margin:10px;padding:10px;'>"+decode_votar[i].resposta+"<form method='post' action='index.php'><input type='submit' alt='"+decode_votar[i].id+"' id='votar_user'  value='Votar' style='float:right;position:relative;top:-20px;'/></form></div>"
			}
			$('#all').html(html);
		});
		
		return false;
	});
	
	$("#votar_user").live("click", function(){
		id=$(this).attr('alt');
		$.post("index.php", { id: id, formato: "json",funcao: "votar_id" },function(data) {alert(data);});
		return false;
	});
	
});	
var createhtml=function(data,id)
{
	var html
	html="";
	if(data.mostrar_imagem==1)
	{
		html=html+"<center><img src='../"+data.imagem+"' alt='imagem_passatempo' width='150px' height='150px'/></center>";
	}
	
	html=html+"<div style='width:100%;height:100%;'><center>"+data.desafio+"";
	html=html+"<form method='post' action='' id='passatempo_question'>";
	html=html+"<input type='text' name='id' style='' value='"+id+"'/><br>";
	switch(data.tipo)
	{
		case 'imagem':
			html=html+"Choose a file to upload: <input name='question' type='file' /><br /><input type='submit' value='Upload File' />";
		break;
		case 'link_video':
			html=html+"<input type='text' name='question'/>";
		break;
		
		case 'imagem_video':
			html=html+"Choose a file to upload: <input name='question' type='file' /><br /><input type='submit' value='Upload File' />";
		break;
		
		case 'texto':
			html=html+"<textarea name='texto' style='width:100%;height:400px;'></textarea>";
		break;
		
		case 'multiplas':
			if(data.r1){html=html+"<input type='radio' class='question' name='question' value="+data.r1.replace(' ','_')+">"+data.r1+"<br>";}
			if(data.r2){html=html+"<input type='radio' class='question' name='question' value="+data.r2.replace(' ','_')+">"+data.r2+"<br>";}
			if(data.r3){html=html+"<input type='radio' class='question' name='question' value="+data.r3.replace(' ','_')+">"+data.r3+"<br>";}
			if(data.r4){html=html+"<input type='radio' class='question' name='question' value="+data.r4.replace(' ','_')+">"+data.r4+"<br>";}
			if(data.r5){html=html+"<input type='radio' class='question' name='question' value="+data.r5.replace(' ','_')+">"+data.r5+"<br>";}
			if(data.r6){html=html+"<input type='radio' class='question' name='question' value="+data.r6.replace(' ','_')+">"+data.r6+"<br>";}
		break;
	}
	if(data.param4==1)
	{
		html=html+"<br>Telefone: <input type='text' name='telefone'/>";
	}
	html=html+"<br><br><input type='checkbox' id='termos' name='termos' value='aceito'>Aceito os termos de <span id='termos_checkbox' style='font-weight:bold;text-decoration:underline;cursor:pointer;'>ultilização</span><br><br>";
	html=html+"<input type='submit' id='concorrer' value='Concorrer'/><br>";
	html=html+"</form>";
	html=html+"</center></div>";
	$("#all").html(html);
	var r;
	$("#termos_checkbox").live("click", function(){
		data.regulamento=data.regulamento.replace('<p>', '');
		data.regulamento=data.regulamento.replace('</p>', '');
		r=confirm(data.regulamento);
		if(r){$('#termos').prop('checked', true);}
	});
	
	
	
	//on click send->dispara agradecimentos
	$("#concorrer").click(function() {
		//ajax send:
			termos=$('#termos:checked').val();
			question=$('.question:checked').val();
			if(termos!=undefined && question!=undefined){sending=true;}else{sending=false;}
			if(sending)
			{
				
				$.post("to_users.php", $('#passatempo_question').serialize(),function(data_final){alert(data_final);});
				$('#all').html(data.agradecimentos);	
			}
			else
			{
				alert("não preencheu os campos obrigatorios");
			}
		return false;		
	});
	
}
