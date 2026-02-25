<div class="navbar" id="navbar">
<div class="container nav-wrapper">
<div class="logo">KURO <span>KOPISTHETIC</span></div>

<div class="nav-links">
<a href="{{ url('/') }}">Home</a>
<a href="{{ url('/#about') }}">About</a>
<a href="{{ url('/#menu') }}">Menu</a>
<a href="{{ url('/#visit') }}">Visit</a>

@auth
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('menu.index') }}">Admin</a>
    @endif

    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button class="btn" style="margin-left:20px;">Logout</button>
    </form>
@else
    <a href="{{ route('login') }}" class="btn" style="margin-left:20px;">Login</a>
@endauth

</div>
</div>
</div>