function openAjax(){
	var ajax = null;

	try{
		ajax = new XMLHttpRequest;
	}catch(erro){
		try{
			ajax = new ActiveXObject("Msxl2.XMLHTTP");
		}catch(er){
			try{
				ajax = new ActiveXObject("Microsoft.XMLHTTP");
			}catch(err){
				ajax = false;
			}
		}
	}

	return ajax;
}// Detecta dinamicamente o objeto XMLHttp (de acordo com o navegador)

function pesquisaMigos(){
	if(document.getElementById){//Varifica se a funca getById funciona
		var termo = document.getElementById('pesquisa2').value;
		var exibeResult = document.getElementById('resultado');

		if(termo.length >= 2){
			var ajax = openAjax();
			ajax.open("GET", "buscaMigos.php?name="+termo, true);
			ajax.onreadystatechange = function(){
			
				if(ajax.readyState == 1){
					exibeResult.innerHTML = '<ul><li>Pesquisando ...</li></ul>';
				}

				if(ajax.readyState == 4){
					if(ajax.status == 200){
						var result = ajax.responseText;
						result = result.replace(/\+/g, " ");
						result = unescape(result);
						exibeResult.innerHTML = result;
					}else{
						exibeResult.innerHTML = '<ul><li>Pesquisando ...</li></ul>';
					}
				}

			}

			ajax.send(null);
			
		}
	}
}
