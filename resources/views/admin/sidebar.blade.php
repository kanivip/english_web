<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="{{route('admin.dashbroad')}}">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link {{ Route::is('admin.dashbroad') ? 'active' : '' }}"
                            href="{{route('admin.dashbroad')}}" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-1" aria-controls="submenu-1"><i
                                class="fa fa-fw fa-user-circle"></i>Dashboard <span
                                class="badge badge-success">6</span></a>
                        <div id="submenu-1" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                        data-target="#submenu-1-2" aria-controls="submenu-1-2">E-Commerce</a>
                                    <div id="submenu-1-2" class="collapse submenu">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="index.html">E Commerce Dashboard</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="ecommerce-product.html">Product
                                                    List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="ecommerce-product-single.html">Product
                                                    Single</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="ecommerce-product-checkout.html">Product
                                                    Checkout</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="dashboard-finance.html">Finance</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="dashboard-sales.html">Sales</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                                        data-target="#submenu-1-1" aria-controls="submenu-1-1">Infulencer</a>
                                    <div id="submenu-1-1" class="collapse submenu">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="dashboard-influencer.html">Influencer</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="influencer-finder.html">Influencer
                                                    Finder</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="influencer-profile.html">Influencer
                                                    Profile</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('admin.categories.*') ? 'active' : '' }}" href="#"
                            data-toggle="collapse" aria-expanded="false" data-target="#submenu-2"
                            aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Categories</a>
                        <div id="submenu-2" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.categories.index')}}">Data <span
                                            class="badge badge-secondary">New</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.categories.create')}}">Add <span
                                            class="badge badge-secondary">New</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('admin.vocabularies.*') ? 'active' : '' }}" href="#"
                            data-toggle="collapse" aria-expanded="false" data-target="#submenu-3"
                            aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Vocabularies</a>
                        <div id="submenu-3" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.vocabularies.index')}}">Data</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.vocabularies.create')}}">Add <span
                                            class="badge badge-secondary">New</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('admin.users.*') ? 'active' : '' }}" href="#"
                            data-toggle="collapse" aria-expanded="false" data-target="#submenu-12"
                            aria-controls="submenu-12"><i class="fas fa-fw fa-chart-pie"></i>Users</a>
                        <div id="submenu-12" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.users.index')}}">Data</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.users.create')}}">Add <span
                                            class="badge badge-secondary">New</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('admin.level.*') ? 'active' : '' }}" href="#"
                            data-toggle="collapse" aria-expanded="false" data-target="#submenu-10"
                            aria-controls="submenu-10"><i class="fas fa-fw fa-chart-pie"></i>Levels Lesson</a>
                        <div id="submenu-10" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.levels.index')}}">Data</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.levels.create')}}">Add <span
                                            class="badge badge-secondary">New</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('admin.questions.*') ? 'active' : '' }}" href="#"
                            data-toggle="collapse" aria-expanded="false" data-target="#submenu-15"
                            aria-controls="submenu-15"><i class="fas fa-fw fa-chart-pie"></i>Questions</a>
                        <div id="submenu-15" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.questions.index')}}">Data</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.questions.create')}}">Add <span
                                            class="badge badge-secondary">New</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('admin.lessons.*') ? 'active' : '' }}" href="#"
                            data-toggle="collapse" aria-expanded="false" data-target="#submenu-16"
                            aria-controls="submenu-16"><i class="fas fa-fw fa-chart-pie"></i>Lessons</a>
                        <div id="submenu-16" class="collapse submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.lessons.index')}}">Data</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('admin.lessons.create')}}">Add <span
                                            class="badge badge-secondary">New</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>




                </ul>
            </div>
        </nav>
    </div>
</div>
