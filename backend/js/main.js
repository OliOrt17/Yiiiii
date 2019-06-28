
$("#login").on("click",function(){

    let user=$("#correo").val();
    let password=$("pass").val();

    let obj= {
        "accion": "login",
        "user": user,
        "password": password
      };

    $.ajax({
        url:'./includes/_funciones.php',
        type: 'POST',
        dataType:'json',
        data: obj
    });
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