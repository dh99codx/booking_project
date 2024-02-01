<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzYecmvpnNeDHPG0bzQ6KctcLWVT35IZcJPQ&usqp=CAU" alt="Vemto Logo" class="brand-image bg-white img-circle">
        <span class="brand-text font-weight-light">Temple-Booking-Management-System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu">

                @auth
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon icon ion-md-pulse"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon icon ion-md-apps"></i>
                        <p>
                            Apps
                            <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                            @can('view-any', App\Models\User::class)
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Users</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\FamilyDetails::class)
                            <li class="nav-item">
                                <a href="{{ route('all-family-details.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>All Family Details</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Frequency::class)
                            <li class="nav-item">
                                <a href="{{ route('frequencies.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Frequencies</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\SubscriberType::class)
                            <li class="nav-item">
                                <a href="{{ route('subscriber-types.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Subscriber Types</p>
                                </a>
                            </li>
                            @endcan
                            @can('view-any', App\Models\Subscriber::class)
                            <li class="nav-item">
                                <a href="{{ route('subscribers.index') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Subscribers</p>
                                </a>
                            </li>
                                @else
                            <li class="nav-item">
                                <a href="{{ route('customer_subscriber') }}" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Subscribers</p>
                                </a>
                            </li>
                            @endcan

                    </ul>
                </li>

                @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
                    Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon icon ion-md-key"></i>
                        <p>
                            Access Management
                            <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('view-any', Spatie\Permission\Models\Role::class)
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        @endcan

                        @can('view-any', Spatie\Permission\Models\Permission::class)
                        <li class="nav-item">
                            <a href="{{ route('permissions.index') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                <p>Permissions</p>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </li>
                @endif
                @endauth

                <li class="nav-item">
                    <a href="https://adminlte.io/docs/3.1//index.html" target="_blank" class="nav-link">
                        <i class="nav-icon icon ion-md-help-circle-outline"></i>
                        <p>Docs</p>
                    </a>
                </li>

                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon icon ion-md-exit"></i>
                        <p>{{ __('Logout') }}</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endauth
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
