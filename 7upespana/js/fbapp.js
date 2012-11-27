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
						html="<div style='text-align:center;'><img src='images/ganadores.png' alt='ganadores' width='500px'/></div>";
			
						html=html+"<div style='text-align:center;'"+decode_data[0].vencedores+"</div>";	
						html=html+"<div class='reload2' style='position:absolute;top:545px;left:34px;cursor:pointer'><img src='images/back.png' alt=''/></div></div>";
						$('#all').html(html);
					}	
				}
			);
		
		return false;
	});
	
	$(".reload2").live("click", function(){location.reload();});
	
	$(".votar").click(function() {
		id=$(this).attr('alt');
		$.post("index.php", { id: id, formato: "json",funcao: "votar" },function(data) {
			decode_votar=$.parseJSON(data);
			//alert(decode_votar.length);
			var html="";
			for(var i=0;i<decode_votar.length;i++)
			{
				html=html+"<div style='border-radius:5px;border:1px dotted black;margin:10px;padding:10px;background-image:url(\'images/1.png\');'>"+decode_votar[i].resposta+"<form method='post' action='index.php'><input type='submit' alt='"+decode_votar[i].id+"' id='votar_user'  value='Votar' style='float:right;position:relative;top:-20px;'/></form></div>"
			}
			$('#all').html(html);
		});
		
		return false;
	});
	
	$("#votar_user").live("click", function(){
		id=$(this).attr('alt');
		$.post("index.php", { id: id, formato: "json",funcao: "votar_id" },function(data) {});
		return false;
	});
	
});	
var createhtml=function(data,id)
{
	var html
	html="";
	if(data.mostrar_imagem==1)
	{
		html=html+"<center><img src='../"+data.imagem+"' alt='imagem_passatempo' /></center>";
	}
	
	html=html+"<div style='width:100%;height:100%;'><center>"+data.desafio+"";
	html=html+"<form method='post' action='' id='passatempo_question'>";
	html=html+"<input type='text' style='display:none;' name='id' style='' value='"+id+"'/><br>";
	switch(data.tipo)
	{
		case 'imagem':
			html=html+"Link Imagem:<input type='text' name='question'/>";
		break;
		case 'link_video':
			html=html+"Link Video:<input type='text' name='question'/>";
		break;
		
		case 'imagem_video':
			html=html+"Link imagem<input type='text' name='question'/>";
		break;
		
		case 'texto':
			html=html+"<textarea name='question' style='width:692px;height:121px;'></textarea>";
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
		html=html+"<br>Teléfono: <input type='text' name='telefone'/>";
	}
	html=html+"<br><br><input type='checkbox' id='termos' name='termos' value='aceito'>Acepto las condiciones de <span id='termos_checkbox' style='font-weight:bold;text-decoration:underline;cursor:pointer;'>uso</span><br><br>";
	html=html+"<input type='submit' id='concorrer' value='Concorrer'/><br>";
	html=html+"</form>";
	html=html+"</center><div class='reload' style='position:absolute;top:545px;left:34px;cursor:pointer'><img src='images/back.png' alt=''/></div>";
	html=html+"<div style='position:absolute;top:480px;left:690px;'><img src='images/logo.png' alt='logo'/></div>";
	html=html+"</div>";
	
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
			if(data.tipo=='multiplas'){question=$('.question:checked').val();}
			else{question=1;}

			if(termos!=undefined && question!=undefined){sending=true;}else{sending=false;}
			if(sending)
			{
				
				$.post("to_users.php", $('#passatempo_question').serialize(),function(data_final){});
				html="<div style='text-align:center;margin-top:100px;'><img src='images/gracias.png' alt='gracias'/></div>"
				html=html+"<div style='text-align:center;font-weight:bold;'"+data.agradecimentos+"</div><div class='reload' style='position:absolute;top:545px;left:34px;cursor:pointer'><img src='images/back.png' alt=''/></div>";
				
				$('#all').html(html);	
			}
			else
			{
				alert("não preencheu os campos obrigatorios");
			}
		return false;		
	});
	
	$(".reload").live("click", function(){location.reload();});
	
}
