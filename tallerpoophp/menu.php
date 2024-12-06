<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Menu Principal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample02">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/proyectolp3/tallerpoophp/dashboard.php">Inicio<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/proyectolp3/tallerpoophp/listacategorias.php">Categorias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/proyectolp3/tallerpoophp/listaarticulos.php">Articulos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/proyectolp3/tallerpoophp/listacompras.php">Compras</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/proyectolp3/tallerpoophp/listaclientes.php">Clientes</a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="/proyectolp3/tallerpoophp/listaventas.php">Ventas</a>
            </li>            <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <!-- <img class="img-profile rounded-circle" width="20%" height="20%" src="/proyectolp3/tallerpoophp/images/user.png"> -->
                Cuenta: <?php echo $_SESSION["usuario"]; ?>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/proyectolp3/tallerpoophp/php/logout.php">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Cerrar Sesión
                    </a>
                </div>
            </li>
            </ul>
            <form class="form-inline my-2 my-md-0">
            </form>
        </div>
    </nav>