<!doctype html>
<html lang="en" class="semi-dark">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('backend/images/favicon-32x32.png') }}" type="image/png" />
    <!--plugins-->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="{{ asset('backend/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/bootstrap-extended.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/icons.css') }}" rel="stylesheet">
    <!-- Option 1: Include in HTML -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- loader-->
    <link href="{{ asset('backend/css/pace.min.css') }}" rel="stylesheet" />
    <!--Theme Styles-->
    <link href="{{ asset('backend/css/dark-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/light-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/semi-dark.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/css/header-colors.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{ asset('backend/css/responsive.css') }}">
    <title>Park Shadow - Executive</title>
    <style>
        .notification-empty {
            padding: 10px;
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 5px;
            margin-top: 10px;
        }

        .notification-empty p {
            margin: 0;
            color: #6c757d;
            font-size: 14px;
        }
    </style>
</head>

<body>
    <div id="header"></div>
    <!--start wrapper-->

    <div class="wrapper">
        <!--start top header-->
        <header class="top-header">
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i
                    class="bi bi-list"></i></button>

            <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
                aria-labelledby="offcanvasWithBothOptionsLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Menu</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="metismenu" id="menu">
                        <li class="{{ request()->routeIs('executive.dashboard') ? 'mm-active' : '' }}">
                            <a href="{{ route('executive.dashboard') }}" class="">
                                <div class="parent-icon"><img src="{{ asset('backend/images/icons/dashboard icon.png') }}"></div>
                                <div class="menu-title">Dashboard</div>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('executive.announcements') ? 'mm-active' : '' }}">
                            <a href="{{ route('executive.announcements') }}">
                                <div class="parent-icon"><img src="{{ asset('backend/images/icons/Campaigns icon.png') }}"></div>
                                <div class="menu-title">Announcements</div>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('executive.ccnrs') ? 'mm-active' : '' }}">
                            <a href="{{ route('executive.ccnrs') }}">
                                <div class="parent-icon"><img src="{{ asset('backend/images/icons/project icon.png') }}"></div>
                                <div class="menu-title">Community Info</div>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('community.*') ? 'mm-active' : '' }}">
                            <a href="{{ route('community.index') }}">
                                <div class="parent-icon"><img src="{{ asset('backend/images/icons/statement-new.png') }}"></div>
                                <div class="menu-title">Community Forum</div>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('executive.contracts') ? 'mm-active' : '' }}">
                            <a href="{{ route('executive.contracts') }}">
                                <div class="parent-icon"><img src="{{ asset('backend/images/icons/statement-new.png') }}"></div>
                                <div class="menu-title">Contracts</div>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('executive.financial') ? 'mm-active' : '' }}">
                            <a href="{{ route('executive.financial') }}">
                                <div class="parent-icon"><img src="{{ asset('backend/images/icons/Campaigns icon.png') }}"></div>
                                <div class="menu-title">Financial Information</div>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('executive.legal_info') ? 'mm-active' : '' }}">
                            <a href="{{ route('executive.legal_info') }}">
                                <div class="parent-icon"><img src="{{ asset('backend/images/icons/Schedules icon.png') }}"></div>
                                <div class="menu-title">Legal Information</div>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('executive.lostfound') ? 'mm-active' : '' }}">
                            <a href="{{ route('executive.lostfound') }}">
                                <div class="parent-icon"><img src="{{ asset('backend/images/icons/Schedules icon.png') }}"></div>
                                <div class="menu-title">Lost & Found</div>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('executive.minutes') ? 'mm-active' : '' }}">
                            <a href="{{ route('executive.minutes') }}">
                                <div class="parent-icon"><img src="{{ asset('backend/images/icons/inbox icon.png') }}"></div>
                                <div class="menu-title">Executive Minutes</div>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('executive.newsletter') ? 'mm-active' : '' }}">
                            <a href="{{ route('executive.newsletter') }}">
                                <div class="parent-icon"><img src="{{ asset('backend/images/icons/inbox icon.png') }}"></div>
                                <div class="menu-title">Newsletter</div>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('admin.operations') ? 'mm-active' : '' }}">
                            <a href="{{ route('admin.operations') }}">
                                <div class="parent-icon"><img src="{{ asset('backend/images/icons/Schedules icon.png') }}"></div>
                                <div class="menu-title">Operations</div>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('executive.report') ? 'mm-active' : '' }}">
                            <a href="{{ route('executive.report') }}">
                                <div class="parent-icon"><img src="{{ asset('backend/images/icons/project icon.png') }}"></div>
                                <div class="menu-title">Unit/Balance Report</div>
                            </a>
                        </li>
                        <!--<li class="{{ request()->routeIs('admin.artchitectural') ? 'mm-active' : '' }}">-->
                        <!--    <a href="{{ route('admin.artchitectural') }}">-->
                        <!--        <div class="parent-icon"><img src="{{ asset('backend/images/icons/payout iocn.png') }}">-->
                        <!--        </div>-->
                        <!--        <div class="menu-title">Architectural Request...</div>-->
                        <!--    </a>-->
                        <!--</li>-->
                    </ul>

                </div>
            </div>
            <nav class="navbar navbar-expand gap-3 align-items-center">
                <!--<div class="mobile-toggle-icon fs-3">-->
                <!--    <i class="bi bi-list"></i>-->
                <!--</div>-->

                <div class="top-navbar-right ms-auto">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('home') }}">
                                <div class="">
                                    <i class="bi bi-house-fill btn btn-outline-success"></i>
                                </div>
                            </a>
                        </li>



                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javaScript:;"
                                data-bs-toggle="dropdown">
                                <div class="notifications">
                                    @if (auth()->user()->unreadnotifications->count() > 0)
                                        <span
                                            class="notify-badge">{{ auth()->user()->unreadNotifications()->count() }}</span>
                                    @endif
                                    <i class="bi bi-bell-fill"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end p-0">
                                <div class="p-2 border-bottom m-2 d-flex justify-content-between align-items-center">
                                    <h5 class="h5 mb-0">Notifications</h5>
                                    <a href="{{ route('notifications.markAllAsRead') }}">Clear all</a>
                                </div>
                                <div class="header-notifications-list p-2">
                                    @if (auth()->user()->unreadnotifications->count() > 0)
                                        @foreach (auth()->user()->unreadnotifications as $notifications)
                                            @switch($notifications->type)
                                                @case('Post')
                                                    <a data-notification-id="{{ $notifications->id }}"
                                                        class="dropdown-item notification-link"
                                                        href="{{ route('community.index') }}">
                                                        <div class="d-flex align-items-center">
                                                            <div class="notification-box bg-light-orange text-orange">
                                                                <i class="bi bi-collection-play-fill"></i>
                                                            </div>
                                                            <div class="ms-3 flex-grow-1">
                                                                <h6 class="mb-0 dropdown-msg-user">
                                                                    {{ $notifications->type }}<span
                                                                        class="msg-time float-end text-secondary">{{ $notifications->created_at->diffForHumans() }}</span>
                                                                </h6>
                                                                <small
                                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center"
                                                                    style="overflow-wrap: break-word; white-space: break-spaces !important;">{{ $notifications->data['message'] }}</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                @break

                                                @case('Comment')
                                                    <a data-notification-id="{{ $notifications->id }}"
                                                        class="dropdown-item notification-link"
                                                        href="{{ route('community.index') }}">
                                                        <div class="d-flex align-items-center">
                                                            <div class="notification-box bg-light-info text-info">
                                                                <i class="bi bi-cursor-fill"></i>
                                                            </div>
                                                            <div class="ms-3 flex-grow-1">
                                                                <h6 class="mb-0 dropdown-msg-user">
                                                                    {{ $notifications->type }}<span
                                                                        class="msg-time float-end text-secondary">{{ $notifications->created_at->diffForHumans() }}</span>
                                                                </h6>
                                                                <small
                                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center"
                                                                    style="overflow-wrap: break-word; white-space: break-spaces !important;">{{ $notifications->data['message'] }}</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                @break

                                                @case('Announcement')
                                                    <a data-notification-id="{{ $notifications->id }}"
                                                        class="dropdown-item notification-link"
                                                        href="{{ route('executive.announcements') }}">
                                                        <div class="d-flex align-items-center">
                                                            <div class="notification-box bg-light-warning text-warning"><i
                                                                    class="bi bi-droplet-fill"></i></div>
                                                            <div class="ms-3 flex-grow-1">
                                                                <h6 class="mb-0 dropdown-msg-user">
                                                                    {{ $notifications->type }}<span
                                                                        class="msg-time float-end text-secondary">{{ $notifications->created_at->diffForHumans() }}</span>
                                                                </h6>
                                                                <small
                                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center"
                                                                    style="overflow-wrap: break-word; white-space: break-spaces !important;">{{ $notifications->data['message'] }}</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                @break

                                                @case('Architectural')
                                                    <a data-notification-id="{{ $notifications->id }}"
                                                        class="dropdown-item notification-link"
                                                        href="{{ route('admin.artchitectural') }}">
                                                        <div class="d-flex align-items-center">
                                                            <div class="notification-box text-warning"> <i
                                                                    class="bi bi-megaphone-fill"></i></div>
                                                            <div class="ms-3 flex-grow-1">
                                                                <h6 class="mb-0 dropdown-msg-user">
                                                                    {{ $notifications->type }}<span
                                                                        class="msg-time float-end text-secondary">{{ $notifications->created_at->diffForHumans() }}</span>
                                                                </h6>
                                                                <small
                                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center"
                                                                    style="overflow-wrap: break-word; white-space: break-spaces !important;">{{ $notifications->data['message'] }}</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                @break

                                                @case('Real Estate')
                                                    <a data-notification-id="{{ $notifications->id }}"
                                                        class="dropdown-item notification-link" href="#">
                                                        <div class="d-flex align-items-center">
                                                            <div class="notification-box bg-light-primary text-primary"><i
                                                                    class="bi bi-basket2-fill"></i></div>
                                                            <div class="ms-3 flex-grow-1">
                                                                <h6 class="mb-0 dropdown-msg-user">
                                                                    {{ $notifications->type }}<span
                                                                        class="msg-time float-end text-secondary">{{ $notifications->created_at->diffForHumans() }}</span>
                                                                </h6>
                                                                <small
                                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center"
                                                                    style="overflow-wrap: break-word; white-space: break-spaces !important;">{{ $notifications->data['message'] }}</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                @break

                                                @case('Mention')
                                                @case('Reply')
                                                    <a data-notification-id="{{ $notifications->id }}"
                                                        class="dropdown-item notification-link"
                                                        href="{{ $notifications->data['url'] }}">
                                                        <div class="d-flex align-items-center">
                                                            <div class="notification-box bg-light-success text-success"><i
                                                                    class="bi bi-at"></i></div>
                                                            <div class="ms-3 flex-grow-1">
                                                                <h6 class="mb-0 dropdown-msg-user">
                                                                    {{ $notifications->type }}<span
                                                                        class="msg-time float-end text-secondary">{{ $notifications->created_at->diffForHumans() }}</span>
                                                                </h6>
                                                                <small
                                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center"
                                                                    style="overflow-wrap: break-word; white-space: break-spaces !important;">{{ $notifications->data['message'] }}</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                @break

                                                @default
                                                    <a data-notification-id="{{ $notifications->id }}"
                                                        class="dropdown-item notification-link" href="javaScript:;">
                                                        <div class="d-flex align-items-center">
                                                            <div class="notification-box bg-light-success text-success"><i
                                                                    class="bi bi-file-earmark-bar-graph-fill"></i></div>
                                                            <div class="ms-3 flex-grow-1">
                                                                <h6 class="mb-0 dropdown-msg-user">
                                                                    {{ $notifications->type }}<span
                                                                        class="msg-time float-end text-secondary">{{ $notifications->created_at->diffForHumans() }}</span>
                                                                </h6>
                                                                <small
                                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center"
                                                                    style="overflow-wrap: break-word; white-space: break-spaces !important;">{{ $notifications->data['message'] }}</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                            @endswitch
                                        @endforeach
                                    @else
                                        <div class="text-muted italic">
                                            <p>You're all caught up! No new notifications.</p>
                                        </div>
                                    @endif


                                </div>

                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-user-setting">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javaScript:;"
                                data-bs-toggle="dropdown">
                                <div class="user-setting d-flex align-items-center">
                                    <img @if (!Auth::user()->image) src="{{ asset('backend/images/avatars/avatar-1.png') }}"
                                    @else
                                    src="{{ asset('storage/images/' . Auth::user()->image) }}" @endif
                                        class="user-img" alt="">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="javaScript:;">
                                        <div class="d-flex align-items-center">
                                            <img @if (!Auth::user()->image) src="{{ asset('backend/images/avatars/avatar-1.png') }}"
                                            @else
                                            src="{{ asset('storage/images/' . Auth::user()->image) }}" @endif
                                                alt="" class="rounded-circle" width="54" height="54">
                                            <div class="ms-3">
                                                <h6 class="mb-0 dropdown-user-name">{{ Auth::user()->name }}</h6>
                                                {{-- <small class="mb-0 dropdown-user-designation text-secondary">HR
                                                    Manager</small> --}}
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.index') }}">
                                        <div class="d-flex align-items-center">
                                            <div class=""><i class="bi bi-person-fill"></i></div>
                                            <div class="ms-3"><span>Profile</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('change_password') }}">
                                        <div class="d-flex align-items-center">
                                            <div class=""><i class="bi bi-gear-fill"></i></div>
                                            <div class="ms-3"><span>Change Password</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('/logout') }}">
                                        <div class="d-flex align-items-center">
                                            <div class=""><i class="bi bi-lock-fill"></i></div>
                                            <div class="ms-3"><span>Logout</span></div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!--end top header-->

        <!--start sidebar -->
        <aside class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <a href="{{ route('home') }}"><img src="{{ asset('backend/images/logo-icon.png') }}"
                            alt="logo icon"></a>
                </div>
                <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li class="{{ request()->routeIs('executive.dashboard') ? 'mm-active' : '' }}">
                    <a href="{{ route('executive.dashboard') }}" class="">
                        <div class="parent-icon"><img src="{{ asset('backend/images/icons/dashboard icon.png') }}">
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <li class="{{ request()->routeIs('executive.announcements') ? 'mm-active' : '' }}">
                    <a href="{{ route('executive.announcements') }}">
                        <div class="parent-icon"><img src="{{ asset('backend/images/icons/Campaigns icon.png') }}">
                        </div>
                        <div class="menu-title">Announcements</div>
                    </a>
                </li>
                <li class="{{ request()->routeIs('executive.ccnrs') ? 'mm-active' : '' }}">
                    <a href="{{ route('executive.ccnrs') }}">
                        <div class="parent-icon"><img src="{{ asset('backend/images/icons/project icon.png') }}">
                        </div>
                        <div class="menu-title">Community Info</div>
                    </a>
                </li>
                <li class="{{ request()->routeIs('community.*') ? 'mm-active' : '' }}">
                    <a href="{{ route('community.index') }}">
                        <div class="parent-icon"><img src="{{ asset('backend/images/icons/statement-new.png') }}">
                        </div>
                        <div class="menu-title">Community Forum</div>
                    </a>
                </li>
                <li class="{{ request()->routeIs('executive.contracts') ? 'mm-active' : '' }}">
                    <a href="{{ route('executive.contracts') }}">
                        <div class="parent-icon"><img src="{{ asset('backend/images/icons/statement-new.png') }}">
                        </div>
                        <div class="menu-title">Contracts</div>
                    </a>
                </li>
                <li class="{{ request()->routeIs('executive.financial') ? 'mm-active' : '' }}">
                    <a href="{{ route('executive.financial') }}">
                        <div class="parent-icon"><img src="{{ asset('backend/images/icons/Campaigns icon.png') }}">
                        </div>
                        <div class="menu-title">Financial Information</div>
                    </a>
                </li>
                <li class="{{ request()->routeIs('executive.legal_info') ? 'mm-active' : '' }}">
                    <a href="{{ route('executive.legal_info') }}">
                        <div class="parent-icon"><img src="{{ asset('backend/images/icons/Schedules icon.png') }}">
                        </div>
                        <div class="menu-title">Legal Information</div>
                    </a>
                </li>
                <li class="{{ request()->routeIs('executive.lostfound') ? 'mm-active' : '' }}">
                    <a href="{{ route('executive.lostfound') }}">
                        <div class="parent-icon"><img src="{{ asset('backend/images/icons/Schedules icon.png') }}">
                        </div>
                        <div class="menu-title">Lost & Found</div>
                    </a>
                </li>
                <li class="{{ request()->routeIs('executive.minutes') ? 'mm-active' : '' }}">
                    <a href="{{ route('executive.minutes') }}">
                        <div class="parent-icon"><img src="{{ asset('backend/images/icons/inbox icon.png') }}">
                        </div>
                        <div class="menu-title">Executive Minutes</div>
                    </a>
                </li>
                <li class="{{ request()->routeIs('executive.newsletter') ? 'mm-active' : '' }}">
                    <a href="{{ route('executive.newsletter') }}">
                        <div class="parent-icon"><img src="{{ asset('backend/images/icons/inbox icon.png') }}">
                        </div>
                        <div class="menu-title">Newsletter</div>
                    </a>
                </li>
                <li class="{{ request()->routeIs('admin.operations') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.operations') }}">
                        <div class="parent-icon"><img src="{{ asset('backend/images/icons/Schedules icon.png') }}">
                        </div>
                        <div class="menu-title">Operations</div>
                    </a>
                </li>
                <li class="{{ request()->routeIs('executive.report') ? 'mm-active' : '' }}">
                    <a href="{{ route('executive.report') }}">
                        <div class="parent-icon"><img src="{{ asset('backend/images/icons/project icon.png') }}">
                        </div>
                        <div class="menu-title">Unit/Balance Report</div>
                    </a>
                </li>
                <!--<li class="{{ request()->routeIs('admin.artchitectural') ? 'mm-active' : '' }}">-->
                <!--    <a href="{{ route('admin.artchitectural') }}">-->
                <!--        <div class="parent-icon"><img src="{{ asset('backend/images/icons/payout iocn.png') }}">-->
                <!--        </div>-->
                <!--        <div class="menu-title">Architectural Request...</div>-->
                <!--    </a>-->
                <!--</li>-->
            </ul>

            <!--end navigation-->
        </aside>
        <!--end sidebar -->

        <!--start content-->
        <main class="page-content">
            @yield('content')

        </main>
        <!--end page main-->
        <!--start overlay-->
        <div class="overlay nav-toggle-icon"></div>
        <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
    </div>
    <!--end wrapper-->

    <!-- Bootstrap bundle JS -->
    <script src="{{ asset('backend/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('backend/js/pace.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/chartjs/js/Chart.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/chartjs/js/Chart.extension.js') }}"></script>
    <script src="{{ asset('backend/plugins/apexcharts-bundle/js/apexcharts.min.js') }}"></script>
    <!-- Vector map JavaScript -->
    <script src="{{ asset('backend/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!--app-->
    {{-- <script src="{{ asset('backend/js/app.js') }}"></script>
    <script src="{{ asset('backend/js/index.js') }}"></script> --}}
    <script>
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif
        @if (session('error'))
            toastr.error("{{ session('error') }}")
        @endif
        @if (session('warning'))
            toastr.warning("{{ session('warning') }}")
        @endif
        @if (session('info'))
            toastr.info("{{ session('info') }}")
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}")
            @endforeach
        @endif
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const notificationLinks = document.querySelectorAll('.notification-link');
            notificationLinks.forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const notificationId = this.getAttribute('data-notification-id');
                    markNotificationAsRead(notificationId);
                    window.location.href = this.getAttribute('href');
                });
            });

            function markNotificationAsRead(notificationId) {
                // Make an AJAX request to mark the notification as read
                // Replace 'your-mark-read-url' with the actual URL to mark the notification as read
                fetch('/mark-as-read/' + notificationId, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                    })
                    .then(response => response.json())
                    .then(data => console.log(data))
                    .catch(error => console.error('Error:', error));
            }
        });
    </script>
    @yield('script')
</body>

</html>
