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

        {{-- Boton para CRUD de "PQRS" --}}
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-envelope"></i>
            <p>
              PQRS
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/requests" class="nav-link">
                <i class="fa fa-eye nav-icon"></i>
                <p>Ver Todos</p>
              </a>
            </li>
            {{-- <li class="nav-item">
              <a href="/requests/create" class="nav-link">
                <i class="fas fa-plus nav-icon"></i>
                <p>Crear</p>
              </a>
            </li> --}}
          </ul>
        </li>

    </ul>

</nav>