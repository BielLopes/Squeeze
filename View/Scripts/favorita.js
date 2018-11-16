function reloadArt(exib, tip, id){
	if(document.getElementById){//Varifica se a funca getById funciona
        var termo = document.getElementById(tip).value;
        var exibeResult = document.getElementById(exib);
        
        var ajax = openAjax();
        ajax.open("GET", "recarregaArtista.php?tipo="+termo+"&id="+id, true);
        ajax.onreadystatechange = function(){
        
            if(ajax.readyState == 1){
                exibeResult.innerHTML = 'Recarregando ...';
            }

            if(ajax.readyState == 4){
                if(ajax.status == 200){
                    var result = ajax.responseText;
                    result = result.replace(/\+/g, " ");
                    result = unescape(result);
                    exibeResult.innerHTML = result;
                }else{
                    exibeResult.innerHTML = 'Houve alguma Falha no servidor ...';
                }
            }

        }

        ajax.send(null);
        
		
	}
}