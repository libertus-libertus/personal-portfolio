<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="BE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> {{ Auth::user()->email }}</a>
        </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="{{ request()->is('/dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}">
                <i class="fa fa-th"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="header">MASTER DATA</li>
        <li class="{{ request()->is('category') ? 'active' : '' }}">
            <a href="{{ route('category.index') }}">
                <i class="fa fa-cubes"></i>
                <span>Kategori</span>
            </a>
        </li>
        <li class="{{ request()->is('skill') ? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-lightbulb-o"></i>
                <span>Keahlian (Skills)</span>
            </a>
        </li>
        <li class="{{ request()->is('project') ? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-briefcase"></i>
                <span>Portfolio Project</span>
            </a>
        </li>
        <li class="{{ request()->is('experience') ? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-suitcase"></i>
                <span>Experience</span>
            </a>
        </li>
        <li class="header">PENGATURAN</li>
        <li class="{{ request()->is('profile') ? 'active' : '' }}">
            <a href="{{ route('profile.edit') }}">
                <i class="fa fa-cogs"></i>
                <span>Kelola Profil</span>
            </a>
        </li>
        <li class="{{ request()->is('contact') ? 'active' : '' }}">
            <a href="#">
                <i class="fa fa-phone"></i>
                <span>Kontak & Media Sosial</span>
            </a>
        </li>
    </ul>
</section>
