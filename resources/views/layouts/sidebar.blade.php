<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{asset('image/profile_image_admin.jpg')}}" class="brand-image bg-white img-circle">
        <span class="brand-text font-weight-light">Booking System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu">

                @auth

                    @if (!Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
                            !Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon icon ion-md-apps"></i>
                                <p>
                                    My Profile
                                    <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('profile_page') }}" class="nav-link">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p>View Profile</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('create_family_details_index')}}" class="nav-link">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p>Family Members</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('customer_subscriber') }}" class="nav-link">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p>My subscriptions</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon icon ion-md-apps"></i>
                                <p>
                                    Hall Booking
                                    <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p>Make a Booking</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p>View/Edit Booking</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p>View Catering Menu</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon icon ion-md-apps"></i>
                                <p>
                                    Pooja Booking
                                    <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p>Make a Booking</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p>View/Edit Booking</p>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon icon ion-md-apps"></i>
                                <p>
                                    Payment
                                    <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p>Make a Payment</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    @endif


{{--old admin dashboard sidebar--}}
                    @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
                              Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon icon ion-md-apps"></i>
                                <p>
                                    Admin Dashboard
                                    <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
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
                                    @can('view-any', App\Models\Booking::class)
                                        <li class="nav-item">
                                            <a href="{{ route('bookings.index') }}" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <p>Bookings</p>
                                            </a>
                                        </li>
                                    @endcan
                                    @can('view-any', App\Models\Hall::class)
                                        <li class="nav-item">
                                            <a href="{{ route('halls.index') }}" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <p>Halls</p>
                                            </a>
                                        </li>
                                    @endcan
                                <li class="nav-item">
                                    <a href="{{ route('reset_admin_password') }}" class="nav-link">
                                        <i class="nav-icon icon ion-md-radio-button-off"></i>
                                        <p>Account Settings</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif
{{--old admin dashboard sidebar--}}


                        @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
                             Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon icon ion-md-apps"></i>
                                    <p>
                                        My Profile
                                        <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                                    </p>
                                </a>
                            </li>
                        @endif


                        @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
                        Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon icon ion-md-apps"></i>
                                    <p>
                                        Devotee
                                        <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="{{route('users.create')}}" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <p>Create Devotee Profile</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('users.index') }}" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <p>View/Update Profile</p>
                                            </a>
                                        </li>
                                    @can('view-any', App\Models\FamilyDetails::class)
                                        <li class="nav-item">
                                            <a href="{{ route('all-family-details.index') }}" class="nav-link">
                                                <i class="nav-icon icon ion-md-radio-button-off"></i>
                                                <p>Add/Edit Family members</p>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </li>
                        @endif


               @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
                Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                   <li class="nav-item">
                       <a href="#" class="nav-link">
                           <i class="nav-icon icon ion-md-apps"></i>
                           <p>
                               Hall Booking
                               <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview">
                               <li class="nav-item">
                                   <a href="{{route('bookings.create')}}" class="nav-link">
                                       <i class="nav-icon icon ion-md-radio-button-off"></i>
                                       <p>Make a Booking</p>
                                   </a>
                               </li>
                               <li class="nav-item">
                                   <a href="{{route('bookings.index')}}" class="nav-link">
                                       <i class="nav-icon icon ion-md-radio-button-off"></i>
                                       <p>View/Edit Booking</p>
                                   </a>
                               </li>
                               <li class="nav-item">
                                   <a href="#" class="nav-link">
                                       <i class="nav-icon icon ion-md-radio-button-off"></i>
                                       <p>View Catering Menu</p>
                                   </a>
                               </li>
                       </ul>
                   </li>
               @endif


                @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
                Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon icon ion-md-apps"></i>
                            <p>
                                Pooja Booking
                                <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Make a Booking</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>View/Edit Booking</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif


               @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
               Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                   <li class="nav-item">
                       @can('view-any', App\Models\Booking::class)
                       <a href="#" class="nav-link">
                           <i class="nav-icon icon ion-md-apps"></i>
                           <p>
                               Booking Hall
                               <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                           </p>
                       </a>
                       @endcan
                       <ul class="nav nav-treeview">
                           @can('view-any', App\Models\Booking::class)
                           <li class="nav-item">
                               <a href="#" class="nav-link">
                                   <i class="nav-icon icon ion-md-radio-button-off"></i>
                                   <p>Create Booking Hall Details</p>
                               </a>
                           </li>
                           @endcan
                           @can('view-any', App\Models\Booking::class)
                           <li class="nav-item">
                               <a href="#" class="nav-link">
                                   <i class="nav-icon icon ion-md-radio-button-off"></i>
                                   <p style="font-size: small;">View/Modify Booking Hall Details</p>
                               </a>
                           </li>
                           @endcan
                       </ul>
                   </li>
               @endif


                @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
                               Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon icon ion-md-apps"></i>
                            <p>
                                Catering Menu
                                <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>Create Menu</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon icon ion-md-radio-button-off"></i>
                                    <p>View/Modify Menu</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif


             @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
                     Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon icon ion-md-apps"></i>
                         <p>
                             Pooja
                             <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="#" class="nav-link">
                                 <i class="nav-icon icon ion-md-radio-button-off"></i>
                                 <p>Create Pooja Details</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="#" class="nav-link">
                                 <i class="nav-icon icon ion-md-radio-button-off"></i>
                                 <p>View/Modify Pooja Details</p>
                             </a>
                         </li>
                     </ul>
                 </li>
             @endif


             @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
               Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon icon ion-md-apps"></i>
                         <p>
                             Newsletter
                             <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="#" class="nav-link">
                                 <i class="nav-icon icon ion-md-radio-button-off"></i>
                                 <p>Create Newsletter</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="#" class="nav-link">
                                 <i class="nav-icon icon ion-md-radio-button-off"></i>
                                 <p>View/Modify Newsletter</p>
                             </a>
                         </li>

                         @can('view-any', App\Models\Subscriber::class)
                         <li class="nav-item">
                             <a href="{{ route('subscribers.index') }}" class="nav-link">
                                 <i class="nav-icon icon ion-md-radio-button-off"></i>
                                 <p>Subscriber list</p>
                             </a>
                         </li>
                         @endcan

                         @can('view-any', App\Models\Frequency::class)
                             @can('view-any', App\Models\SubscriberType::class)
                         <li class="nav-item">
                             <a href="{{ route('subscriber-types.index') }}" class="nav-link">
                                 <i class="nav-icon icon ion-md-radio-button-off"></i>
                                 <p>Subscriber type/Frequency</p>
                             </a>
                         </li>
                             @endcan
                         @endcan
                     </ul>
                 </li>
             @endif

                        @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
                               Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon icon ion-md-apps"></i>
                                    <p>
                                        Payment
                                        <i class="nav-icon right icon ion-md-arrow-round-back"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="nav-icon icon ion-md-radio-button-off"></i>
                                            <p>Make a Payment</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endif



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
                                @can('view-any', App\Models\User::class)
                                    <li class="nav-item">
                                        <a href="{{ route('users.index') }}" class="nav-link">
                                            <i class="nav-icon icon ion-md-radio-button-off"></i>
                                            <p>Users</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endif




                    @if (Auth::user()->can('view-any', Spatie\Permission\Models\Role::class) ||
                        Auth::user()->can('view-any', Spatie\Permission\Models\Permission::class))
                        <li class="nav-item">

                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-pulse"></i>
                                <p>
                                    FAQ
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-podium"></i>
                                <p>
                                    Privacy Policy
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link">
                                <i class="nav-icon icon ion-md-sync"></i>
                                <p>
                                    Contact Us
                                </p>
                            </a>
                        </li>


                    @endif

                @endauth

                @auth
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('logout') }}"
                           onclick="event.preventDefault(); if (confirm('Are you sure want to log out?')){document.getElementById('logout-form').submit();}">
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
