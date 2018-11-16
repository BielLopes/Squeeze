function sumir(i) {
    document.getElementById(i).style.display = "none";
}

function aparecer(i) {
    document.getElementById(i).style.display = "initial";
}

//Achar o Objeto responsavel pelo Assincronismo

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



//Agora vamos adaptar a funcao
function buscarArtista(){
	if(document.getElementById){//Varifica se a funca getById funciona
		var termo = document.getElementById('ajaxArtista').value;
		var exibeResult = document.getElementById('reusultadoArtista');

		if(termo.length >= 0){
			var ajax = openAjax();
			ajax.open("GET", "buscaArtista.php?artist="+termo, true);
			ajax.onreadystatechange = function(){
			
				if(ajax.readyState == 1){
					exibeResult.innerHTML = '<tr><td>Carregando ...</td><td>Carregando ...</td><td>Carregando ...</td><td>Carregando ...</td></tr>';
				}

				if(ajax.readyState == 4){
					if(ajax.status == 200){
						var result = ajax.responseText;
						result = result.replace(/\+/g, " ");
						result = unescape(result);
						exibeResult.innerHTML = result;
					}else{
						exibeResult.innerHTML ="<tr><td>Erro ...</td><td>Erro ...</td><td>Erro ...</td><td>Erro ...</td></tr>";
					}
				}

			}

			ajax.send(null);
			
		}
	}
}



//Agora vamos adaptar a funcao para gênero
function buscarGenero(){
	if(document.getElementById){//Varifica se a funca getById funciona
		var termo = document.getElementById('ajaxGenero').value;
		var exibeResult = document.getElementById('reusultadoGenero');

		if(termo.length >= 0){
			var ajax = openAjax();
			ajax.open("GET", "buscaGenero.php?gener="+termo, true);
			ajax.onreadystatechange = function(){	
			
				if(ajax.readyState == 1){
					exibeResult.innerHTML = '<tr><td>Carregando ...</td><td>Carregando ...</td><td>Carregando ...</td><td>Carregando ...</td></tr>';
				}

				if(ajax.readyState == 4){
					if(ajax.status == 200){
						var result = ajax.responseText;
						result = result.replace(/\+/g, " ");
						result = unescape(result);
						exibeResult.innerHTML = result;
					}else{
						exibeResult.innerHTML ="<tr><td>Erro ...</td><td>Erro ...</td><td>Erro ...</td><td>Erro ...</td></tr>";
					}
				}

			}

			ajax.send(null);
			
		}
	}
}