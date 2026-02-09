<!-- Navbar Atas -->
<div class="ui top fixed inverted menu teal">
    <a class="item" id="sidebar-toggle">
        <i class="sidebar icon"></i>
        Menu
    </a>

    <div class="header item">
        DPUPR Kab. Pasangkayu
    </div>

    <div class="right menu">
        <div class="item">
            <div class="ui icon input">
                <input type="text" placeholder="Cari...">
                <i class="search icon"></i>
            </div>
        </div>

        <div class="ui dropdown item">
            <i class="user circle icon"></i>
            {{ Auth::user()->nama ?? 'Admin' }}
            <i class="dropdown icon"></i>

            <div class="menu">
                <a class="item" href="{{ url('/profil') }}">
                    <i class="user icon"></i> Profil
                </a>
                <a class="item" href="{{ url('/pengaturan') }}">
                    <i class="cog icon"></i> Pengaturan
                </a>
                <div class="ui divider"></div>
                <a class="item"
                   href="#"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="sign-out icon"></i> Logout
                </a>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</div>
