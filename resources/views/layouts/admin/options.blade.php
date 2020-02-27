<!--Opciones del aside-->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        {{-- Boton para el panel de inicio --}}
        <li class="nav-item">
            <a href="/home" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
                Inicio
            </p>
            </a>
        </li>

        {{-- Boton para CRUD de "Funcionarios" --}}
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Funcionarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/officials" class="nav-link">
                  <i class="fa fa-eye nav-icon"></i>
                  <p>Ver Todos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/officials/create" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Crear</p>
                </a>
              </li>
            </ul>
        </li>

        {{-- Boton para el CRUD de solicitantes --}}
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Solicitantes
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/applicants" class="nav-link">
                  <i class="fa fa-eye nav-icon"></i>
                  <p>Ver Todos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/applicants/create" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Crear</p>
                </a>
              </li>
            </ul>
        </li>
          
        {{-- Boton para el CRUD de Dependencias --}}
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Dependencias
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/dependences" class="nav-link">
                  <i class="fa fa-eye nav-icon"></i>
                  <p>Ver Todas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/dependences/create" class="nav-link">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Crear</p>
                </a>
              </li>
            </ul>
        </li>

        {{-- Boton para el CRUD de Categorias --}}
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file-contract"></i>
            <p>
              Categorías
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/categories" class="nav-link">
                <i class="fa fa-eye nav-icon"></i>
                <p>Ver Todas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/categories/create" class="nav-link">
                <i class="fas fa-plus nav-icon"></i>
                <p>Crear</p>
              </a>
            </li>
          </ul>
        </li>


    </ul>

</nav>