

 function loadDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
      if (this.readyState == 4 && this.status == 200) {
        var obj = JSON.parse(this.responseText);
        console.log(obj);
        document.getElementById("id").value= obj.id;
        document.getElementById("nombreProducto").value = obj.nombreProducto;
        document.getElementById("marca").value = obj.marca;
        document.getElementById("precio").value = obj.precio;
        document.getElementById("imagen").src = "./imagenes/"+obj.imagen;
        
        
      }
    };
    var valor=document.getElementById("producto").value;
    var url="http://localhost/ParaParcial/api.php?identificador="+ valor;
    xhttp.open("GET",url, true);
    xhttp.send();

    return xhttp.responseText;
}







 