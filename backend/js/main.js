function change_view(vista = "mostrar_datos"){
    $("#main").find(".view").each(function(){
      $(this).addClass('d-none');
      let id = $(this).attr("id");
      if(id == vista){
        $(this).removeClass("d-none");
      }
    });
}
change_view();
$("#btn_nuevo").click(function(){
    change_view("formulario_datos");
  });
  $("#main").find(".cancelar").click(function(){
    $("#frm_datos")[0].reset();
    change_view();
});
//Galeria
$("#archivo").change(function(){
    let formDatos=new FormData($("#frm_datos")[0]);
    formDatos.append("accion", "carga_foto");
    $.ajax({
        url: "../includes/_funciones.php",
        type: "POST",
        data: formDatos,
        contentType:false,
        processData:false,
        success: function(datos){
            let respuesta = JSON.parse(datos);
            if(respuesta.status==0){
                alert("No se guardo la foto");
            }
            let imagen=`
                <img src="${respuesta.archivo}" alt="img-fluid"/>
                `;
            $("#foto").val(respuesta.archivo);
            $("#respuesta").html(imagen);
        }
    });
    console.log(formDatos);
}); 
$("#registrar_gal").click(function(){
        
    let nombre=$("#nombre").val();
    let foto=$("#foto").val();
    let obj = {
    "accion" : "insertar_gal",
    "nombre":nombre,
    "foto":foto
        
    };
      
   
    $("#frm_datos").find("input").each(function(){
      $(this).removeClass("error");
      if($(this).val() == ""){
        $(this).addClass("error").focus();
        return false;
      }else{
        obj[$(this).prop("name")] = $(this).val();
      }
      
    });
       if($(this).data("edicion")==1){
            obj["accion"]="editar_portafolio";
            obj["registro"]=$(this).data("registro");
          $(this).text("Guardar").removeData("edicion").removeData("registro");
        }
      
        if(nombre.length==0 || foto.length==0 ){
            $.notify("Por favor no dejes campos vacios","info");
        }else{ 
            $.ajax({
                url:'../includes/_funciones.php',
                type:'POST',
                dataType:'json',
                data:obj,
                success:function(data){
                    if(data==1){
                        $.notify("Registro exitoso","success");
                        change_view(); 
                        mostrar_gal();
                        $("#frm_datos")[0].reset(); 
                    }else if(data==3){
                        $.notify("Registro actualizado","success");
                        change_view(); 
                        mostrar_gal();
                        $("#frm_datos")[0].reset(); 
                    }else{
                        $.notify("Error","error");
                    }
                }
            })
        }
});
function mostrar_gal(){
    let obj = {
      "accion" : "mostrar_gal"
    }
    
    $.post("../includes/_funciones.php",obj, function(data){
      let template = ``; 
      $.each(data, function(e,elem){
        template += `
        <tr>
        <td>${elem.gal_id}</td>
        <td>${elem.gal_titulo}</td>
        <td>${elem.gal_img}</td>
        <td>${elem.gal_fa}</td>
        <td>
        <a href="#" class="editar_gal"data-id="${elem.gal_id}"><i class="fas fa-edit"></i></a>
        </td>
    <td>
        <a href="#" class="eliminar_gal" data-id="${elem.gal_id}"><i class="fas fa-trash"></i></a></td>
        </tr>
        `;
      });
      $("#table_datos tbody").html(template);
    },"JSON");      
  }
  $("#main").on("click",".eliminar_gal",function(e){
    e.preventDefault();
    let id = $(this).data('id');
    let obj = {
        "accion" : "eliminar_gal",
        "gal" : id
    }
    
    $.ajax({
        url:'../includes/_funciones.php',
        type: 'POST',
        dataType: 'json',
        data: obj,
        success:function(data){
            if(data==1){
                $.notify("Foto eliminado","success");
                mostrar_gal();
                
            }else{
                $.notify("Error","error");
            }
        }
        
    });
    
    
});
$("#main").on("click",".editar_gal", function(e){
    e.preventDefault();
    change_view("formulario_datos");
    let id=$(this).data("id")
    let obj={
        "accion" : "consulta_gal",
        "registro" : $(this).data("id")
    }
    $.post("../includes/_funciones.php", obj, function(data){
         $("#nombre").val(data.gal_titulo);
         $("#foto").val(data.gal_img);
    }, "JSON");
    $("#registrar_gal").text("Actualizar").data("edicion", 1).data("registro", id);
});
//servicios
$("#main").on("click",".eliminar_servicios",function(e){
    e.preventDefault();
    let id = $(this).data('id');
    let obj = {
        "accion" : "eliminar_servicios",
        "servicios" : id
    }
    
    $.ajax({
        url:'../includes/_funciones.php',
        type: 'POST',
        dataType: 'json',
        data: obj,
        success:function(data){
            if(data==1){
                $.notify("Servicio eliminado","success");
                mostrar_servicios();
                
            }else{
                $.notify("Error","error");
            }
        }
        
    });
    
    
});
$("#main").on("click",".editar_servicios", function(e){
    e.preventDefault();
    change_view("formulario_datos");
    let id=$(this).data("id")
    let obj={
        "accion" : "consulta_servicios",
        "registro" : $(this).data("id")
    }
    $.post("../includes/_funciones.php", obj, function(data){
         $("#nombre").val(data.ser_nom);
         $("#descripcion").val(data.ser_des);
    }, "JSON");
    $("#registrar_ser").text("Actualizar").data("edicion", 1).data("registro", id);
});
function mostrar_servicios(){
    let obj = {
      "accion" : "mostrar_servicios"
    }
    
    $.post("../includes/_funciones.php",obj, function(data){
      let template = ``; 
      $.each(data, function(e,elem){
        template += `
        <tr>
        <td>${elem.ser_id}</td>
        <td>${elem.ser_nom}</td>
        <td>${elem.ser_des}</td>
        <td>
        <a href="#" class="editar_usuarios"data-id="${elem.ser_id}"><i class="fas fa-edit"></i></a>
        </td>
    <td>
        <a href="#" class="eliminar_usuarios" data-id="${elem.ser_id}"><i class="fas fa-trash"></i></a></td>
        </tr>
        `;
      });
      $("#table_datos tbody").html(template);
    },"JSON");      
  }
$("#registrar_ser").click(function(){
        
    let nom=$("#nombre").val();
    let des=$("#descripcion").val();
    let obj = {
    "accion" : "insertar_servicios",
    "nom":nom,
    "des":des,
    
    };
      
   
    $("#frm_datos").find("input").each(function(){
      $(this).removeClass("error");
      if($(this).val() == ""){
        $(this).addClass("error").focus();
        return false;
      }else{
        obj[$(this).prop("name")] = $(this).val();
      }
      
    });
       if($(this).data("edicion")==1){
            obj["accion"]="editar_servicios";
            obj["registro"]=$(this).data("registro");
          $(this).text("Guardar").removeData("edicion").removeData("registro");
         }
      
        if(nom.length==0 || des.length==0 ){
          $.notify("Por favor no dejes campos vacios","info");

      }else{
        $.ajax({
            url:'../includes/_funciones.php',
            type:'POST',
            dataType:'json',
            data:obj,
            success:function(data){
                if(data==1){
                    $.notify("Registro exitoso","success");
                    change_view(); 
                    mostrar_servicios();
                    $("#frm_datos")[0].reset(); 
                }else if(data==3){
                    $.notify("Registro actualizado","success");
                    change_view(); 
                    mostrar_servicios();
                    $("#frm_datos")[0].reset(); 
                }else{
                    $.notify("Error","error");
                }
            }
        })
      }
  });

$("#main").on("click",".eliminar_usuarios",function(e){
    e.preventDefault();
    let id = $(this).data('id');
    let obj = {
        "accion" : "eliminar_usuarios",
        "usuarios" : id
    }
    
    $.ajax({
        url:'../includes/_funciones.php',
        type: 'POST',
        dataType: 'json',
        data: obj,
        success:function(data){
            if(data==1){
                $.notify("Usuario eliminado","success");
                mostrar_usuarios();
                
            }else{
                $.notify("Error","error");
            }
        }
        
    });
    
    
});
$("#main").on("click",".editar_usuarios", function(e){
    e.preventDefault();
    change_view("formulario_datos");
    let id=$(this).data("id")
    let obj={
        "accion" : "consulta_usuarios",
        "registro" : $(this).data("id")
    }
    $.post("../includes/_funciones.php", obj, function(data){
         $("#nombre").val(data.usr_nombre);
         $("#email").val(data.usr_email);
         $("#password").val(data.usr_password);
    }, "JSON");
    
    $("#registrar_usr").text("Actualizar").data("edicion", 1).data("registro", id);
});
$("#registrar_usr").click(function(){
        
    let nom=$("#nombre").val();
    let email=$("#email").val();
    let password=$("#password").val();
    let obj = {
    "accion" : "insertar_usuarios",
    "nombre":nombre,
    "email":email,
    "password":password
        
    };
      
   
    $("#frm_datos").find("input").each(function(){
      $(this).removeClass("error");
      if($(this).val() == ""){
        $(this).addClass("error").focus();
        return false;
      }else{
        obj[$(this).prop("name")] = $(this).val();
      }
      
    });
       if($(this).data("edicion")==1){
            obj["accion"]="editar_usuarios";
            obj["registro"]=$(this).data("registro");
          $(this).text("Guardar").removeData("edicion").removeData("registro");
         }
      
        if(nombre.length==0 || email.length==0 || password.length==0 ){
          $.notify("Por favor no dejes campos vacios","info");

      }else{
        $.ajax({
            url:'../includes/_funciones.php',
            type:'POST',
            dataType:'json',
            data:obj,
            success:function(data){
                if(data==1){
                    $.notify("Registro exitoso","success");
                    change_view(); 
                    mostrar_usuarios();
                    $("#frm_datos")[0].reset(); 
                }else if(data==3){
                    $.notify("Registro actualizado","success");
                    change_view(); 
                    mostrar_usuarios();
                    $("#frm_datos")[0].reset(); 
                }else{
                    $.notify("Error","error");
                }
            }
        })
      }
  });
function mostrar_usuarios(){
    let obj = {
      "accion" : "mostrar_usuarios"
    }
    
    $.post("../includes/_funciones.php",obj, function(data){
      let template = ``; 
      $.each(data, function(e,elem){
        template += `
        <tr>
        <td>${elem.usr_id}</td>
        <td>${elem.usr_nombre}</td>
        <td>${elem.usr_email}</td>
        <td>
        <a href="#" class="editar_usuarios"data-id="${elem.usr_id}"><i class="fas fa-edit"></i></a>
        </td>
    <td>
        <a href="#" class="eliminar_usuarios" data-id="${elem.usr_id}"><i class="fas fa-trash"></i></a></td>
        </tr>
        `;
      });
      $("#table_datos tbody").html(template);
    },"JSON");      
  }
$("#login").on("click",function(event){
    event.preventDefault();
    let user=$("#correo").val();
    let password=$("#pass").val();
    
    let obj= {
        "accion": "login",
        "user": user,
        "password": password
      };
      $.ajax({
        url:'includes/_funciones.php',
        type: 'POST',
        dataType:'json',
        data: obj,
        success:function(data){
            if(data==0){
                $.notify("El usuario es incorrecto","error")
            }else if (data==1) {
                $.notify("Espere un momento....","success");
                setTimeout(function(){ location.href='modulos/usuarios.php'; }, 2000);
                

            } else {
                $.notify("Contraseña invalida","error");
            }
        }
    });
});
$("#registrar").click(function(event){
    event.preventDefault();
    let nom=$("#nombre").val();
    let email=$("#email").val();
    let pass=$("#password").val();

    let obj={
        "accion": "registro",
        "nom": nom,
        "email": email,
        "pass": pass
    };

    $.ajax({
        url:'../includes/_funciones.php',
        type: 'POST',
        dataType: 'json',
        data: obj,
        success:function(data){
            if(data==1){
                $.notify("Registro exitoso","success");
            }else{
                $.notify("Error","error");
            }
        }
        
    });
    $('.form-content').animate({
        height: "toggle",
        opacity: 'toggle'
    }, 600);
    $('#form-log').trigger("reset");

});


$("#contacto").click(function(){
    let nom=$("#nombre").val();
    let correo=$("#correo").val();
    let tel=$("#tel").val();
    let mensaje=$("#mensaje").val();

    let obj= {
        "accion": "comentario",
        "nom": nom,
        "tel": tel,
        "correo": correo,
        "mensaje": mensaje
    };

    $.ajax({
        url:"./includes/_funciones.php",
        type: "POST",
        dataType:"json",
        data: obj
    });
    console.log(obj);
    
    
});