<div class="sidebar sidebar-dark">
    <div class="sidebar-content">
        <a class="sidebar-brand" href="{{ route('dashboard.index') }}">{{ config('app.name') }}</a>
        <h4 class="sidebar-heading">Main</h4>
        <ul class="sidebar-menu sm-condensed" data-toggle="sidebar-collapse">
            <li class="sidebar-menu-item {{ html_helper()->active('dashboard.index') }}">
                <a class="sidebar-menu-button" href="{{ route('dashboard.index') }}">
                    <i class="sidebar-menu-icon material-icons">home</i> Dashboard
                </a>
            </li>
            <li class="sidebar-menu-item">
                <a class="sidebar-menu-button" href="#">
                    <i class="sidebar-menu-icon material-icons">assignment</i> Pages
                </a>

            </li>
        </ul>
    </div>
</div>
