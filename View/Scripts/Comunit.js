function sumir(i) {
    document.getElementById(i).style.display = "none";
}

function aparecer(i) {
    document.getElementById(i).style.display = "initial";

}


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
