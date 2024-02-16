<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">
                <h3><strong>{{\Illuminate\Support\Facades\Auth::user()->given_name}}  {{\Illuminate\Support\Facades\Auth::user()->middle_name}}  {{\Illuminate\Support\Facades\Auth::user()->family_name}}</strong></h3>
            </a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('home') }}" class="nav-link bg-black">Home</a>
        </li>
    </ul>
</nav>
