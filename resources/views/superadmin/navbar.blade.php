    <nav class="nav">
        <a class="nav-link @if(isset($active) && $active == 'dashboard') active @endif" aria-current=" page"
            href="{{ route('dashboard') }}">all
            withdraw</a>
        <a class="nav-link @if(isset($active) && $active == 'userlist') active @endif"
            href="{{ route('userlist') }}">user
            list</a>
        <a class="nav-link @if(isset($active) && $active == 'notes') active @endif" href="{{ route('notes') }}">notes
            avliable</a>
        <a class="nav-link " href="{{ route('logout') }}">Logout</a>
    </nav>