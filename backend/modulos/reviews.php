<?php
require_once '../includes/_db.php';
require_once '../includes/_funciones.php';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>Dashboard Template · Bootstrap</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="../css/estilo.css" rel="stylesheet">
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'> 
</head>
<body>
  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="#">Sign out</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
        <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                    <a class="nav-link" href="usuarios.php">
                        <span data-feather="home"></span>
                        <h5>Usuarios</h5>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="servicios.php">
                        <span data-feather="home"></span>
                        <h5>Servicios</h5>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="caracteristica.php">
                        <span data-feather="home"></span>
                        Caracteristica
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="productos.php">
                        <span data-feather="home"></span>
                        Productos
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="cosecha.php">
                        <span data-feather="home"></span>
                        Cosecha
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="galeria.php">
                        <span data-feather="home"></span>
                        <h5>Galeria</h5>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="nosotros.php">
                        <span data-feather="home"></span>
                        <h5>Nosotro somos</h5>
                        
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="stats.php">
                        <span data-feather="home"></span>
                        Stats
                    </a>
                    </li>
                    
                    <li class="nav-item">
                    <a class="nav-link active" href="reviews.php">
                        <span data-feather="home"></span>
                        Reviews
                    </a>
                    </li>
                    
                </ul>
                </div>
            </nav>
       </div>
       
       <main id="main" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

        <h2>Comentarios
            <button type="button" id="btn_nuevo" class="btn btn-primary">Agregar nuevo
                <span class="fas fa-plus"></span>
                </button>
        </h2>
        <div class="table-responsive view" id="mostrar_datos">
          <table class="table table-striped table-sm" id="table_datos">
            <thead>
              <tr>
                <th>Empresa</th>
                <th>Comentario</th>
                <th>Cliente</th>
                <th>Foto</th>
                <th>Editar</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $reviews= $db->select("reviews","*"); 
              foreach ($reviews as $reviews => $rev) {
                ?>
                <tr>
                  <td><?php echo $rev["rev_nom"]; ?></td>
                  <td><?php echo $rev["rev_com"]; ?></td>
                  <td><?php echo $rev["rev_cli"]; ?></td>
                  <td><?php echo $rev["rev_img"]; ?></td>
                  <td>
                    <a href="#" class="editar_rev"data-id="<?php echo $rev["rev_id"]; ?>"><i class="fas fa-edit"></i></a>
                 </td>
                <td>
                <a href="#" class="eliminar_rev" data-id="<?php echo $rev["rev_id"]; ?>"><i class="fas fa-trash"></i></a>
                </td>
                  </tr>
                  <?php
                }
                ?>

              </tbody>
            </table>
          </div>
          <div id="formulario_datos" class="view">
            <form action="#" id="frm_datos">
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="nombre">Empresa</label>
                    <input type="text" class="form-control" name="nombre" id="nombre">
                  </div>
                  <div class="form-group">
                    <label for="descripcion">Comentario</label>
                    <input type="text" class="form-control" name="descripcion" id="descripcion">
                  </div>
                  <div class="form-group">
                    <label for="icono">Cliente</label>
                    <input type="text" class="form-control" name="icono" id="icono">
                  </div>
                  <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" name="archivo" id="archivo">
                    <input type="hidden" readonly="readonly" class="form-control" name="foto" id="foto">
                    <div id="respuesta"></div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <button type="button" class="btn btn-outline-danger cancelar">Cancelar</button>
                  <button type="button" class="btn btn-outline-success" id="registrar_rev">Guardar</button>
                  
                </div>
              </div>
            </form>
          </div>
        </main>
        
      </div>
        
    
    </div>

    
</div>       
 
    
</div>       
    
</body>
   <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
   <script src="../js/main.js"></script>
   <script src="../js/notify.js"></script>
    </html>
