<link rel="stylesheet" href="<?= base_url('plugins/fontawesome-free/css/all.min.css') ?>">

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
        <i class="fa-solid fa-person-booth"></i>          
        <span class="brand-text font-weight-light">CONCURSO</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="<?= base_url('dist/img/users/'.$session['foto']) ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block"><?= explode(" ", $session['nombres'])[0]." ".explode(" ", $session['apellidos'])[0] ?></a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-header">MENU ADMIN</li>
              <li class="nav-item">
                <a href="<?= base_url('index.php/admin/Inicio/openCreateUser') ?>" class="nav-link <?= ($optionSelected=='openCreateUser')? 'active':'' ?> ">
                  <i class="fas fa-plus-square"></i>
                  <p>
                    Crear Usuario
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('index.php/admin/Inicio/openListUsers') ?>" class="nav-link <?= ($optionSelected=='openListUsers')? 'active':'' ?> ">
                  <i class="fas fa-list"></i>
                  <p>
                    Ver Usuarios
                  </p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="<?= base_url('index.php/Login/cerrarSession') ?>" class="nav-link">
                  <i class="fas fa-sign-out-alt"></i>
                  <p>
                    Cerrar Sesion
                  </p>
                </a>
              </li>
                
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>