
//ocultar formulario
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

//mostrar formulario
$("#btn_nuevo").click(function(){
    change_view("formulario_datos");
  });
  $("#main").find(".cancelar").click(function(){
    $("#frm_datos")[0].reset();
    change_view();
});

//Cargar imagen
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

//reviews

$("#main").on("click",".eliminar_rev",function(e){
    e.preventDefault();
    let id = $(this).data('id');
    let obj = {
        "accion" : "eliminar_rev",
        "rev" : id
    }
    
    $.ajax({
        url:'../includes/_funciones.php',
        type: 'POST',
        dataType: 'json',
        data: obj,
        success:function(data){
            if(data==1){
                $.notify("Registro eliminado","success");
                mostrar_sta();
                
            }else{
                $.notify("Error","error");
            }
        }
        
    });
    
    
});
$("#main").on("click",".editar_rev", function(e){
    e.preventDefault();
    change_view("formulario_datos");
    let id=$(this).data("id")
    let obj={
        "accion" : "consulta_rev",
        "registro" : $(this).data("id")
    }
    $.post("../includes/_funciones.php", obj, function(data){
         $("#nombre").val(data.rev_nom);
         $("#descripcion").val(data.rev_com);
         $("#icono").val(data.rev_cli);
         $("#icono").val(data.rev_img);
    }, "JSON");
    $("#registrar_rev").text("Actualizar").data("edicion", 1).data("registro", id);
});
function mostrar_rev(){
    let obj = {
      "accion" : "mostrar_rev"
    }
    
    $.post("../includes/_funciones.php",obj, function(data){
      let template = ``; 
      $.each(data, function(e,elem){
        template += `
        <tr>
        <td>${elem.rev_nom}</td>
        <td>${elem.rev_com}</td>
        <td>${elem.rev_cli}</td>
        <td>${elem.rev_img}</td>
        <td>
        <a href="#" class="editar_rev"data-id="${elem.rev_id}"><i class="fas fa-edit"></i></a>
        </td>
    <td>
        <a href="#" class="eliminar_rev" data-id="${elem.rev_id}"><i class="fas fa-trash"></i></a></td>
        </tr>
        `;
      });
      $("#table_datos tbody").html(template);
    },"JSON");      
  }
$("#registrar_rev").click(function(){
    let nom=$("#nombre").val();
    let des=$("#descripcion").val();
    let ico=$("#icono").val();
    let foto=$("#foto").val();
    let obj = {
    "accion" : "insertar_rev",
    "nom":nom,
    "des":des,
    "ico":ico,
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
            obj["accion"]="editar_rev";
            obj["registro"]=$(this).data("registro");
          $(this).text("Guardar").removeData("edicion").removeData("registro");
         }
      
        if(nom.length==0 || des.length==0  || ico.length==0){
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
                    mostrar_rev();
                    $("#frm_datos")[0].reset(); 
                }else if(data==3){
                    $.notify("Registro actualizado","success");
                    change_view(); 
                    mostrar_rev();
                    $("#frm_datos")[0].reset(); 
                }else{
                    $.notify("Error","error");
                }
            }
        })
      }
  });

//Integrantes

$("#registrar_nos").click(function(){
        
    let nombre=$("#nombre").val();
    let foto=$("#foto").val();
    let obj = {
    "accion" : "insertar_nos",
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
            obj["accion"]="editar_nos";
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
                        mostrar_nos();
                        $("#frm_datos")[0].reset(); 
                    }else if(data==3){
                        $.notify("Registro actualizado","success");
                        change_view(); 
                        mostrar_nos();
                        $("#frm_datos")[0].reset(); 
                    }else{
                        $.notify("Error","error");
                    }
                }
            })
        }
});
function mostrar_nos(){
    let obj = {
      "accion" : "mostrar_nos"
    }
    
    $.post("../includes/_funciones.php",obj, function(data){
      let template = ``; 
      $.each(data, function(e,elem){
        template += `
        <tr>
        <td>${elem.int_nombre}</td>
        <td>${elem.int_img}</td>
        <td>${elem.int_fa}</td>
        <td>
        <a href="#" class="editar_nos"data-id="${elem.int_id}"><i class="fas fa-edit"></i></a>
        </td>
    <td>
        <a href="#" class="eliminar_nos" data-id="${elem.int_id}"><i class="fas fa-trash"></i></a></td>
        </tr>
        `;
      });
      $("#table_datos tbody").html(template);
    },"JSON");      
  }
  $("#main").on("click",".eliminar_nos",function(e){
    e.preventDefault();
    let id = $(this).data('id');
    let obj = {
        "accion" : "eliminar_nos",
        "nos" : id
    }
    
    $.ajax({
        url:'../includes/_funciones.php',
        type: 'POST',
        dataType: 'json',
        data: obj,
        success:function(data){
            if(data==1){
                $.notify("Foto eliminado","success");
                mostrar_nos();
                
            }else{
                $.notify("Error","error");
            }
        }
        
    });
    
    
});
$("#main").on("click",".editar_nos", function(e){
    e.preventDefault();
    change_view("formulario_datos");
    let id=$(this).data("id")
    let obj={
        "accion" : "consulta_nos",
        "registro" : $(this).data("id")
    }
    $.post("../includes/_funciones.php", obj, function(data){
         $("#nombre").val(data.int_nombre);
         $("#foto").val(data.int_img);
    }, "JSON");
    $("#registrar_nos").text("Actualizar").data("edicion", 1).data("registro", id);
});

//Stats

$("#main").on("click",".eliminar_sta",function(e){
    e.preventDefault();
    let id = $(this).data('id');
    let obj = {
        "accion" : "eliminar_sta",
        "sta" : id
    }
    
    $.ajax({
        url:'../includes/_funciones.php',
        type: 'POST',
        dataType: 'json',
        data: obj,
        success:function(data){
            if(data==1){
                $.notify("Registro eliminado","success");
                mostrar_sta();
                
            }else{
                $.notify("Error","error");
            }
        }
        
    });
    
    
});
$("#main").on("click",".editar_sta", function(e){
    e.preventDefault();
    change_view("formulario_datos");
    let id=$(this).data("id")
    let obj={
        "accion" : "consulta_sta",
        "registro" : $(this).data("id")
    }
    $.post("../includes/_funciones.php", obj, function(data){
         $("#nombre").val(data.sta_nom);
         $("#descripcion").val(data.sta_num);
         $("#icono").val(data.sta_ico);
    }, "JSON");
    $("#registrar_sta").text("Actualizar").data("edicion", 1).data("registro", id);
});
function mostrar_sta(){
    let obj = {
      "accion" : "mostrar_sta"
    }
    
    $.post("../includes/_funciones.php",obj, function(data){
      let template = ``; 
      $.each(data, function(e,elem){
        template += `
        <tr>
        <td>${elem.sta_nom}</td>
        <td>${elem.sta_num}</td>
        <td>${elem.sta_ico}</td>
        <td>
        <a href="#" class="editar_sta"data-id="${elem.sta_id}"><i class="fas fa-edit"></i></a>
        </td>
    <td>
        <a href="#" class="eliminar_sta" data-id="${elem.sta_id}"><i class="fas fa-trash"></i></a></td>
        </tr>
        `;
      });
      $("#table_datos tbody").html(template);
    },"JSON");      
  }
$("#registrar_sta").click(function(){
    let nom=$("#nombre").val();
    let des=$("#descripcion").val();
    let ico=$("#icono").val();
    let obj = {
    "accion" : "insertar_sta",
    "nom":nom,
    "des":des,
    "ico":ico
    
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
            obj["accion"]="editar_sta";
            obj["registro"]=$(this).data("registro");
          $(this).text("Guardar").removeData("edicion").removeData("registro");
         }
      
        if(nom.length==0 || des.length==0  || ico.length==0){
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
                    mostrar_sta();
                    $("#frm_datos")[0].reset(); 
                }else if(data==3){
                    $.notify("Registro actualizado","success");
                    change_view(); 
                    mostrar_sta();
                    $("#frm_datos")[0].reset(); 
                }else{
                    $.notify("Error","error");
                }
            }
        })
      }
  });

//cosechas

$("#main").on("click",".eliminar_cos",function(e){
    e.preventDefault();
    let id = $(this).data('id');
    let obj = {
        "accion" : "eliminar_cos",
        "cos" : id
    }
    
    $.ajax({
        url:'../includes/_funciones.php',
        type: 'POST',
        dataType: 'json',
        data: obj,
        success:function(data){
            if(data==1){
                $.notify("Registro eliminado","success");
                mostrar_cos();
                
            }else{
                $.notify("Error","error");
            }
        }
        
    });
    
    
});
$("#main").on("click",".editar_cos", function(e){
    e.preventDefault();
    change_view("formulario_datos");
    let id=$(this).data("id")
    let obj={
        "accion" : "consulta_cos",
        "registro" : $(this).data("id")
    }
    $.post("../includes/_funciones.php", obj, function(data){
         $("#nombre").val(data.cos_nom);
         $("#descripcion").val(data.cos_desc);
         $("#icono").val(data.cos_ico);
    }, "JSON");
    $("#registrar_cos").text("Actualizar").data("edicion", 1).data("registro", id);
});
function mostrar_cos(){
    let obj = {
      "accion" : "mostrar_cos"
    }
    
    $.post("../includes/_funciones.php",obj, function(data){
      let template = ``; 
      $.each(data, function(e,elem){
        template += `
        <tr>
        <td>${elem.cos_nom}</td>
        <td>${elem.cos_desc}</td>
        <td>${elem.cos_ico}</td>
        <td>
        <a href="#" class="editar_cos"data-id="${elem.cos_id}"><i class="fas fa-edit"></i></a>
        </td>
    <td>
        <a href="#" class="eliminar_cos" data-id="${elem.cos_id}"><i class="fas fa-trash"></i></a></td>
        </tr>
        `;
      });
      $("#table_datos tbody").html(template);
    },"JSON");      
  }
$("#registrar_cos").click(function(){
    let nom=$("#nombre").val();
    let des=$("#descripcion").val();
    let ico=$("#icono").val();
    let obj = {
    "accion" : "insertar_cos",
    "nom":nom,
    "des":des,
    "ico":ico
    
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
            obj["accion"]="editar_cos";
            obj["registro"]=$(this).data("registro");
          $(this).text("Guardar").removeData("edicion").removeData("registro");
         }
      
        if(nom.length==0 || des.length==0  || ico.length==0){
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
                    mostrar_cos();
                    $("#frm_datos")[0].reset(); 
                }else if(data==3){
                    $.notify("Registro actualizado","success");
                    change_view(); 
                    mostrar_cos();
                    $("#frm_datos")[0].reset(); 
                }else{
                    $.notify("Error","error");
                }
            }
        })
      }
  });
//Productos

$("#registrar_pro").click(function(){
        
    let nombre=$("#nombre").val();
    let foto=$("#foto").val();
    let des=$("#descripcion").val();
    let obj = {
    "accion" : "insertar_pro",
    "nombre":nombre,
    "des":des,
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
            obj["accion"]="editar_pro";
            obj["registro"]=$(this).data("registro");
          $(this).text("Guardar").removeData("edicion").removeData("registro");
        }
      
        if(nombre.length==0 || foto.length==0 ||des.length==0 ){
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
                        mostrar_pro();
                        $("#frm_datos")[0].reset(); 
                    }else if(data==3){
                        $.notify("Registro actualizado","success");
                        change_view(); 
                        mostrar_pro();
                        $("#frm_datos")[0].reset(); 
                    }else{
                        $.notify("Error","error");
                    }
                }
            });
        }
});
function mostrar_pro(){
    let obj = {
      "accion" : "mostrar_pro"
    }
    
    $.post("../includes/_funciones.php",obj, function(data){
      let template = ``; 
      $.each(data, function(e,elem){
        template += `
        <tr>
        <td>${elem.pro_nom}</td>
        <td>${elem.pro_desc}</td>
        <td>${elem.pro_img}</td>
        <td>
        <a href="#" class="editar_pro"data-id="${elem.pro_id}"><i class="fas fa-edit"></i></a>
        </td>
    <td>
        <a href="#" class="eliminar_pro" data-id="${elem.pro_id}"><i class="fas fa-trash"></i></a></td>
        </tr>
        `;
      });
      $("#table_datos tbody").html(template);
    },"JSON");      
  }
  $("#main").on("click",".eliminar_pro",function(e){
    e.preventDefault();
    let id = $(this).data('id');
    let obj = {
        "accion" : "eliminar_pro",
        "pro" : id
    }
    
    $.ajax({
        url:'../includes/_funciones.php',
        type: 'POST',
        dataType: 'json',
        data: obj,
        success:function(data){
            if(data==1){
                $.notify("Registro eliminadoeliminado","success");
                mostrar_pro();
                
            }else{
                $.notify("Error","error");
            }
        }
        
    });
    
    
});
$("#main").on("click",".editar_pro", function(e){
    e.preventDefault();
    change_view("formulario_datos");
    let id=$(this).data("id")
    let obj={
        "accion" : "consulta_pro",
        "registro" : $(this).data("id")
    }
    $.post("../includes/_funciones.php", obj, function(data){
         $("#nombre").val(data.pro_nom);
         $("#descripcion").val(data.pro_desc);
         $("#foto").val(data.pro_img);
    }, "JSON");
    $("#registrar_pro").text("Actualizar").data("edicion", 1).data("registro", id);
});
//caracteristicas
$("#main").on("click",".eliminar_car",function(e){
    e.preventDefault();
    let id = $(this).data('id');
    let obj = {
        "accion" : "eliminar_car",
        "car" : id
    }
    
    $.ajax({
        url:'../includes/_funciones.php',
        type: 'POST',
        dataType: 'json',
        data: obj,
        success:function(data){
            if(data==1){
                $.notify("Registro eliminado","success");
                mostrar_car();
                
            }else{
                $.notify("Error","error");
            }
        }
        
    });
    
    
});
$("#main").on("click",".editar_car", function(e){
    e.preventDefault();
    change_view("formulario_datos");
    let id=$(this).data("id")
    let obj={
        "accion" : "consulta_car",
        "registro" : $(this).data("id")
    }
    $.post("../includes/_funciones.php", obj, function(data){
         $("#nombre").val(data.car_nom);
         $("#descripcion").val(data.car_desc);
         $("#icono").val(data.car_ico);
    }, "JSON");
    $("#registrar_car").text("Actualizar").data("edicion", 1).data("registro", id);
});
function mostrar_car(){
    let obj = {
      "accion" : "mostrar_car"
    }
    
    $.post("../includes/_funciones.php",obj, function(data){
      let template = ``; 
      $.each(data, function(e,elem){
        template += `
        <tr>
        <td>${elem.car_nom}</td>
        <td>${elem.car_desc}</td>
        <td>${elem.car_ico}</td>
        <td>
        <a href="#" class="editar_car"data-id="${elem.car_id}"><i class="fas fa-edit"></i></a>
        </td>
    <td>
        <a href="#" class="eliminar_car" data-id="${elem.car_id}"><i class="fas fa-trash"></i></a></td>
        </tr>
        `;
      });
      $("#table_datos tbody").html(template);
    },"JSON");      
  }
$("#registrar_car").click(function(){
    let nom=$("#nombre").val();
    let des=$("#descripcion").val();
    let ico=$("#icono").val();
    let obj = {
    "accion" : "insertar_car",
    "nom":nom,
    "des":des,
    "ico":ico
    
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
            obj["accion"]="editar_car";
            obj["registro"]=$(this).data("registro");
          $(this).text("Guardar").removeData("edicion").removeData("registro");
         }
      
        if(nom.length==0 || des.length==0  || ico.length==0){
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
                    mostrar_car();
                    $("#frm_datos")[0].reset(); 
                }else if(data==3){
                    $.notify("Registro actualizado","success");
                    change_view(); 
                    mostrar_car();
                    $("#frm_datos")[0].reset(); 
                }else{
                    $.notify("Error","error");
                }
            }
        })
      }
  });
//Galeria

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
            obj["accion"]="editar_gal";
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

//Usuarios
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


  //Login 
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


//Crear usuario desde el login
$("#registrar").click(function(event){
    event.preventDefault();
    let nom=$("#reg-nom").val();
    let email=$("#reg-correo").val();
    let pass=$("#reg-pass").val();

    let obj={
        "accion": "registro",
        "nom": nom,
        "email": email,
        "pass": pass
    };

    $.ajax({
        url:'includes/_funciones.php',
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

//Enviar correo
$("#contacto1").on("click",function(e){
    e.preventDefault();
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
        url:"backend/includes/_funciones.php",
        type: "POST",
        dataType:"json",
        data: obj,
        success:function(data){
            if(data==1){
                $.notify("Email enviado","success");
            }else{
                $.notify("Error","error");
            }
        }
    });
    $("#contactos")[0].reset();    

});