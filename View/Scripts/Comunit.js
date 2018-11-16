function sumir(i) {
    document.getElementById(i).style.display = "none";
}

function aparecer(i) {
    document.getElementById(i).style.display = "initial";

}

function openC(cityName) {
	var i;
	var x = document.getElementsByClassName("city");
	for (i = 0; i < x.length; i++) {
		x[i].style.display = "none";
	}
	document.getElementById(cityName).style.display = "block";
}


function openAjax(){
	var ajax = null;

	try{
		// Firefox, Opera 8.0+, Safari
		ajax = new XMLHttpRequest;
	}catch(erro){
		// Internet Explorer
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
