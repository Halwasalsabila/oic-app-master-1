<!-- partial:partials/_sidebar.html -->
<div class="sidebar">
    <div class="user-profile">
        <div class="display-avatar animated-avatar">
            <img class="profile-img img-lg rounded-circle" src="{{ asset('images/profile/male/image_1.png') }}"
                alt="profle image">
        </div>
        <div class="info-wrapper">
            <p class="user-name">{{ Auth::user()->name }}</p>
        </div>
    </div>
    <ul class="navigation-menu">
        <li class="nav-category-divider">MAIN</li>
        <li>
            <a href="{{ route('dashboard.index') }}">
                <span class="link-title">Dashboard</span>
                <i class="mdi mdi-gauge link-icon"></i>
            </a>
        </li>
        <li>
            <a href="{{ route('tanah.index') }}">
                <span class="link-title">Tanah</span>
                <i class="mdi mdi-gauge link-icon"></i>
            </a>
        </li>
        <li>
            <a href="{{ route('build.index') }}">
                <span class="link-title">Bangunan</span>
                <i class="mdi mdi-hospital-building link-icon"></i>
            </a>
        </li>
        <li>
            <a href="#ui-elements" data-toggle="collapse" aria-expanded="false">
                <span class="link-title">Project</span>
                <i class="mdi mdi-bullseye link-icon"></i>
            </a>
            <ul class="collapse navigation-submenu" id="ui-elements">
                @foreach ($project as $item)
                    <li>
                        <a href="{{ route('project.index', $item->slug) }}">{{ $item->name }}</a>
                    </li>
                @endforeach

            </ul>
        </li>
        <li>
            <a href="{{ route('kendaraan.index') }}">
                <span class="link-title">Kendaraan</span>
                <i class="mdi mdi-car link-icon"></i>
            </a>
        </li>
        <li>
            <a href="{{ route('office.index') }}">
                <span class="link-title">Office</span>
                <i class="mdi mdi-clipboard-outline link-icon"></i>
            </a>
        </li>
        <li>
            <a href="pages/charts/chartjs.html">
                <span class="link-title">Inv Card Master</span>
                <i class="mdi mdi-chart-donut link-icon"></i>
            </a>
        </li>
        <li class="nav-category-divider">Kategori</li>
        <li>
            <a href="{{ route('kategori_project.index') }}">
                <span class="link-title">Kategori Project</span>
                <i class="mdi mdi-asterisk link-icon"></i>
            </a>
        </li>
        <li>
            <a href="../docs/docs.html">
                <span class="link-title">Documentation</span>
                <i class="mdi mdi-asterisk link-icon"></i>
            </a>
        </li>
    </ul>
</div>
