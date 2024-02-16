<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">
                @if (\Illuminate\Support\Facades\Auth::check())
                    <h3><strong>if {{\Illuminate\Support\Facades\Auth::user()->given_name}}  {{\Illuminate\Support\Facades\Auth::user()->middle_name}}  {{\Illuminate\Support\Facades\Auth::user()->family_name}}</strong></h3>
                @endif
            </a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
            @if (\Illuminate\Support\Facades\Auth::check())
                <a href="{{ route('home') }}" class="nav-link bg-black">Home</a>
            @endif
        </li>
    </ul>
</nav>
