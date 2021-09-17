var xhr = new XMLHttpRequest();

xhr.open('GET','/static/php/conexion.php');
xhr.onload = function(){
    if(xhr.status == 200){
        var json = JSON.parse(xhr.responseText)
        //var json = xhr.responseText
        var template = ``;
       json.map(function(data){
            template += `
            <div class="card mx-3 my-5" style="width: 18rem;">
            <img src="/static/img/laptops/DELLLATITUD.png" width="100%"  class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">${data.marca}</h5>
              <p class="card-text">${data.descripcion}</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">TIENDA</li>
              <li class="list-group-item">NOVA:${data.nova}|COMPU:${data.compu}|RODY:${data.rody}|RODY2:${data.rody2}|LUZ:${data.luz}|ALMACEN:${data.almacen}</li>
              <li class="list-group-item end-aling text-danger">S/.${data.precio_i}</li>
              <li class="list-group-item end-aling text-success">S/.${data.precio_f}</li>
              <li class="list-group-item">cant:${data.conteo}</li>
            </ul>
            </div>
            `;
            return template;
        });
        
        document.getElementById('content-tarjet').innerHTML = template;
        console.log(json);

    }else{
        console.log("EXISTE UN ERROR DE TIPO: "+xhr.status);
    }
}
xhr.send();