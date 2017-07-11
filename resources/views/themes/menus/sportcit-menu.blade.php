<li class="nav-item {{ active(['sportcit.*'], 'start active open') }}">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-futbol-o"></i>
        <span class="title">Organización</span>
        <span class="arrow {{ active(['sportcit.*'], 'open') }}"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item {{ active(['sportcit.create-organization'], 'start active open') }}">
            <a href="{{ route('organization.create') }}" class="nav-link">
                <i class="icon-frame"></i>
                <span class="title">Crear Organización</span>
            </a>
        </li>
    </ul>
</li>