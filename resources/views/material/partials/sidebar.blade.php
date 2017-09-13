<div class="page-sidebar-wrapper">
    {{-- BEGIN SIDEBAR --}}
    <div class="page-sidebar navbar-collapse collapse">
        {{-- BEGIN SIDEBAR MENU --}}
        <ul class="page-sidebar-menu  page-header-fixed" data-keep-expanded="true" data-auto-scroll="true"
            data-slide-speed="200">
            {{-- HOME Y COMPONENTES --}}
            @include('themes.menus.home-menu')
            {{-- ESCUELAS DEPORTIVAS --}}
            @include('themes.menus.sportcit-menu')
        </ul>
        {{-- BEGIN SIDEBAR MENU --}}
        {{-- Menu::make( config('html.sidebar') )->setActiveClass('start active open') !!}--}}
    </div>
    {{-- BEGIN SIDEBAR MENU --}}
</div>