$(buscar_nombre_registro());



function buscar_nombre_registro(consulta1){
    //alert("Dentro buscar: "+consulta1);
    var form = $("#formulario_registro");
    $.ajax({
        url: 'php/busqueda.php',
        //type: 'POST',
        dataType: 'html',
        //data: $('#formulario_registro').serialize(),
       /* success: function(data){
            $('#resultado_registro_nombre').html(data);
            */
            type: "POST",
                //url: form.attr("action"),
                    data: form.serialize(),

                        success: function(response) {
                            if (response === 1) {
                                //load chech.php file  
                            } else {
                                //show error
                            }
                        }
        //}
    })
    .done(function(respuesta1){
        //alert("Funciono");
        $("#resultado_registro_nombre").html(respuesta1);
    })
    .fail(function(){
        console.log("error");
    })

}

$(document).on('keyup','#registro_nombre',function(){
    var valor=$(this).val();
    if(valor!=""){
        //alert('Se busca: ' + valor);
        buscar_nombre_registro(valor);
    }
    else{
        buscar_nombre_registro();
    }
});