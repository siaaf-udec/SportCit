<li class="nav-item {{ active(['sportcit.*'], 'start active open') }}">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-globe"></i>
        <span class="title">Organización</span>
        <span class="arrow {{ active(['sportcit.*'], 'open') }}"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item {{ active(['sportcit.create-organization'], 'start active open') }}">
            <a href="{{ route('organization.index') }}" class="nav-link">
                <i class="icon-frame"></i>
                <span class="title">Organizaciones</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item {{ active(['sportcit.*'], 'start active open') }}">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-futbol-o"></i>
        <span class="title">Deportistas</span>
        <span class="arrow {{ active(['sportcit.*'], 'open') }}"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item {{ active(['sportcit.create-organization'], 'start active open') }}">
            <a href="{{ route('organization.index') }}" class="nav-link">
                <i class="fa fa-users"></i>
                <span class="title">Deportista</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item {{ active(['sportcit.*'], 'start active open') }}">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-book"></i>
        <span class="title">Test</span>
        <span class="arrow {{ active(['sportcit.*'], 'open') }}"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item {{ active(['sportcit.create-organization'], 'start active open') }}">
            <a href="{{ route('test.index') }}" class="nav-link">
                <i class="fa fa-file-text"></i>
                <span class="title">Test</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item {{ active(['access-control.*'], 'start active open') }}">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-lock"></i>
        <span class="title">Permisos</span>
        <span class="arrow {{ active(['access-control.*'], 'open') }}"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item {{ active(['access-control.permissions'], 'start active open') }}">
            <a href="{{ route('roles.permission.index') }}" class="nav-link">
                <i class="fa fa-clone"></i>
                <span class="title">Asignaciones</span>
            </a>
        </li>
        <li class="nav-item {{ active(['access-control.permissions'], 'start active open') }}">
            <a href="{{ route('permissions.index') }}" class="nav-link">
                <i class="fa fa-get-pocket"></i>
                <span class="title">Gestion de Permisos</span>
            </a>
        </li>
        <li class="nav-item {{ active(['access-control.roles'], 'start active open') }}">
            <a href="{{ route('roles.index') }}" class="nav-link">
                <i class="fa fa-map-signs"></i>
                <span class="title">Gestion de Roles</span>
            </a>
        </li>
        <li class="nav-item {{ active(['access-control.modules'], 'start active open') }}">
            <a href="{{ route('modules.index') }}" class="nav-link">
                <i class="fa fa-genderless"></i>
                <span class="title">Gestion de Modulos</span>
            </a>
        </li>
    </ul>
</li>