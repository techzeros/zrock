<li>
    <a href="{{ route('user.logout') }}"
        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
        Logout
    </a>

    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</li>