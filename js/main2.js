jQuery(document).on('submit','#formlg',function(event){
            event.preventDefault();
            jQuery.ajax({
                url:'Main/login.php',
                type:'POST',
                dataType:'json',
                data:$(this).serialize(),
                beforeSend:function(){
                    $('.botonlg').val('validando...');
                }
              })
              .done(function(respuesta){
                console.log(respuesta);
                if(!respuesta.error){
                  if(respuesta.tipo == 'admin'){
                    //alert("Bienvenido, Administrador...");
                    location.href = 'Main/Admin/';
                  }else if(respuesta.tipo == 'encargado'){
                    //alert("Bienvenido, Encargado...");
                    location.href = 'Main/Encargados/';
                  }
                }else{
                    $('.error').slideDown('slow');
                    setTimeout(function(){
                      $('.error').slideUp('slow');
                    },3000);
                    $('.botonlg').val('Iniciar Sesión');
                }
              })
              .fail(function(resp){
                console.log(resp.responseText);
              })
              .always(function(){
                console.log("complete");
            });
      });
