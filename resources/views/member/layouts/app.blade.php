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

    <title>Park Shadow - Member</title>
</head>

<body>
    <div id="header"></div>
    <!--start wrapper-->

    <div class="wrapper">
        <!--start top header-->
        <header class="top-header">
            <nav class="navbar navbar-expand gap-3 align-items-center">
                <div class="mobile-toggle-icon fs-3">
                    <i class="bi bi-list"></i>
                </div>
                <form class="searchbar">
                    <div class="position-absolute top-50 translate-middle-y search-icon ms-3"><i
                            class="bi bi-search"></i></div>
                    <input class="form-control" type="text" placeholder="Type here to search">
                    <div class="position-absolute top-50 translate-middle-y search-close-icon"><i
                            class="bi bi-x-lg"></i></div>
                </form>
                <div class="top-navbar-right ms-auto">
                    <ul class="navbar-nav align-items-center">
                        <li class="nav-item search-toggle-icon">
                            <a class="nav-link" href="javaScript:;">
                                <div class="">
                                    <i class="bi bi-search"></i>
                                </div>
                            </a>
                        </li>


                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javaScript:;"
                                data-bs-toggle="dropdown">
                                <div class="messages">
                                    <span class="notify-badge">5</span>
                                    <i class="bi bi-chat-right-fill"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end p-0">
                                <div class="p-2 border-bottom m-2">
                                    <h5 class="h5 mb-0">Messages</h5>
                                </div>
                                <div class="header-message-list p-2">
                                    <a class="dropdown-item" href="javaScript:;">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('backend/images/avatars/avatar-1.png') }}"
                                                alt="" class="rounded-circle" width="50" height="50">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Amelio Joly <span
                                                        class="msg-time float-end text-secondary">1 m</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">The
                                                    standard chunk of lorem...</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javaScript:;">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('backend/images/avatars/avatar-2.png') }}"
                                                alt="" class="rounded-circle" width="50" height="50">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Althea Cabardo <span
                                                        class="msg-time float-end text-secondary">7 m</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Many
                                                    desktop publishing</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javaScript:;">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('backend/images/avatars/avatar-3.png') }}"
                                                alt="" class="rounded-circle" width="50" height="50">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Katherine Pechon <span
                                                        class="msg-time float-end text-secondary">2 h</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Making
                                                    this the first true</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javaScript:;">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('backend/images/avatars/avatar-4.png') }}"
                                                alt="" class="rounded-circle" width="50" height="50">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Peter Costanzo <span
                                                        class="msg-time float-end text-secondary">3 h</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">It
                                                    was popularised in the 1960</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javaScript:;">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('backend/images/avatars/avatar-5.png') }}"
                                                alt="" class="rounded-circle" width="50" height="50">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Thomas Wheeler <span
                                                        class="msg-time float-end text-secondary">1 d</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">If
                                                    you are going to use a passage</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javaScript:;">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('backend/images/avatars/avatar-6.png') }}"
                                                alt="" class="rounded-circle" width="50" height="50">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Johnny Seitz <span
                                                        class="msg-time float-end text-secondary">2 w</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">All
                                                    the Lorem Ipsum generators</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javaScript:;">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('backend/images/avatars/avatar-1.png') }}"
                                                alt="" class="rounded-circle" width="50" height="50">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Amelio Joly <span
                                                        class="msg-time float-end text-secondary">1 m</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">The
                                                    standard chunk of lorem...</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javaScript:;">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('backend/images/avatars/avatar-2.png') }}"
                                                alt="" class="rounded-circle" width="50" height="50">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Althea Cabardo <span
                                                        class="msg-time float-end text-secondary">7 m</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Many
                                                    desktop publishing</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javaScript:;">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('backend/images/avatars/avatar-3.png') }}"
                                                alt="" class="rounded-circle" width="50" height="50">
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Katherine Pechon <span
                                                        class="msg-time float-end text-secondary">2 h</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Making
                                                    this the first true</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <div>
                                        <hr class="dropdown-divider">
                                    </div>
                                    <a class="dropdown-item" href="javaScript:;">
                                        <div class="text-center">View All Messages</div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-large">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javaScript:;"
                                data-bs-toggle="dropdown">
                                <div class="notifications">
                                    <span class="notify-badge">8</span>
                                    <i class="bi bi-bell-fill"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end p-0">
                                <div class="p-2 border-bottom m-2">
                                    <h5 class="h5 mb-0">Notifications</h5>
                                </div>
                                <div class="header-notifications-list p-2">
                                    <a class="dropdown-item" href="javaScript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box bg-light-primary text-primary"><i
                                                    class="bi bi-basket2-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">New Orders <span
                                                        class="msg-time float-end text-secondary">1 m</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">You
                                                    have recived new orders</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javaScript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box bg-light-purple text-purple"><i
                                                    class="bi bi-people-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">New Customers <span
                                                        class="msg-time float-end text-secondary">7 m</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">5
                                                    new user registered</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javaScript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box bg-light-success text-success"><i
                                                    class="bi bi-file-earmark-bar-graph-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">24 PDF File <span
                                                        class="msg-time float-end text-secondary">2 h</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">The
                                                    pdf files generated</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javaScript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box bg-light-orange text-orange"><i
                                                    class="bi bi-collection-play-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Time Response <span
                                                        class="msg-time float-end text-secondary">3 h</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">5.1
                                                    min avarage time response</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javaScript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box bg-light-info text-info"><i
                                                    class="bi bi-cursor-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">New Product Approved <span
                                                        class="msg-time float-end text-secondary">1 d</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Your
                                                    new product has approved</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javaScript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box bg-light-pink text-pink"><i
                                                    class="bi bi-gift-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">New Comments <span
                                                        class="msg-time float-end text-secondary">2 w</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">New
                                                    customer comments recived</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javaScript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box bg-light-warning text-warning"><i
                                                    class="bi bi-droplet-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">New 24 authors<span
                                                        class="msg-time float-end text-secondary">1 m</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">24
                                                    new authors joined last week</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javaScript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box bg-light-primary text-primary"><i
                                                    class="bi bi-mic-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Your item is shipped <span
                                                        class="msg-time float-end text-secondary">7 m</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Successfully
                                                    shipped your item</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javaScript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box bg-light-success text-success"><i
                                                    class="bi bi-lightbulb-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">Defense Alerts <span
                                                        class="msg-time float-end text-secondary">2 h</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">45%
                                                    less alerts last 4 weeks</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javaScript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box bg-light-info text-info"><i
                                                    class="bi bi-bookmark-heart-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">4 New Sign Up <span
                                                        class="msg-time float-end text-secondary">2 w</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">New
                                                    4 user registartions</small>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javaScript:;">
                                        <div class="d-flex align-items-center">
                                            <div class="notification-box bg-light-bronze text-bronze"><i
                                                    class="bi bi-briefcase-fill"></i></div>
                                            <div class="ms-3 flex-grow-1">
                                                <h6 class="mb-0 dropdown-msg-user">All Documents Uploaded <span
                                                        class="msg-time float-end text-secondary">1 mo</span></h6>
                                                <small
                                                    class="mb-0 dropdown-msg-text text-secondary d-flex align-items-center">Sussessfully
                                                    uploaded all files</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <div>
                                        <hr class="dropdown-divider">
                                    </div>
                                    <a class="dropdown-item" href="javaScript:;">
                                        <div class="text-center">View All Notifications</div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-user-setting">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javaScript:;"
                                data-bs-toggle="dropdown">
                                <div class="user-setting d-flex align-items-center">
                                    <img src="{{ asset('backend/images/avatars/avatar-1.png') }}" class="user-img"
                                        alt="">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="javaScript:;">
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('backend/images/avatars/avatar-1.png') }}"
                                                alt="" class="rounded-circle" width="54" height="54">
                                            <div class="ms-3">
                                                <h6 class="mb-0 dropdown-user-name">Jhon Deo</h6>
                                                <small class="mb-0 dropdown-user-designation text-secondary">HR
                                                    Manager</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="pages-user-profile.html">
                                        <div class="d-flex align-items-center">
                                            <div class=""><i class="bi bi-person-fill"></i></div>
                                            <div class="ms-3"><span>Profile</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="javaScript:;">
                                        <div class="d-flex align-items-center">
                                            <div class=""><i class="bi bi-gear-fill"></i></div>
                                            <div class="ms-3"><span>Setting</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="index.html">
                                        <div class="d-flex align-items-center">
                                            <div class=""><i class="bi bi-speedometer"></i></div>
                                            <div class="ms-3"><span>Dashboard</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="javaScript:;">
                                        <div class="d-flex align-items-center">
                                            <div class=""><i class="bi bi-piggy-bank-fill"></i></div>
                                            <div class="ms-3"><span>Earnings</span></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="javaScript:;">
                                        <div class="d-flex align-items-center">
                                            <div class=""><i class="bi bi-cloud-arrow-down-fill"></i></div>
                                            <div class="ms-3"><span>Downloads</span></div>
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
                    <img src="{{ asset('backend/images/logo-icon.png') }}" alt="logo icon">
                </div>
                <div class="toggle-icon ms-auto"> <i class="bi bi-list"></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li class="{{ request()->routeIs('member.dashboard') ? 'mm-active' : '' }}">
                    <a href="{{ route('member.dashboard') }}" class="">
                        <div class="parent-icon"><img src="{{ asset('backend/images/icons/dashboard icon.png') }}">
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <li class="{{ request()->routeIs('member.announcements') ? 'mm-active' : '' }}">
                    <a href="{{ route('member.announcements') }}">
                        <div class="parent-icon"><img src="{{ asset('backend/images/icons/Campaigns icon.png') }}">
                        </div>
                        <div class="menu-title">Announcements</div>
                    </a>
                </li>
                <li class="{{ request()->routeIs('member.forum') ? 'mm-active' : '' }}">
                    <a href="{{ route('member.forum') }}">
                        <div class="parent-icon"><img src="{{ asset('backend/images/icons/statement-new.png') }}">
                        </div>
                        <div class="menu-title">Community Forum</div>
                    </a>
                </li>
                <li class="{{ request()->routeIs('member.lostfound') ? 'mm-active' : '' }}">
                    <a href="{{ route('member.lostfound') }}">
                        <div class="parent-icon"><img src="{{ asset('backend/images/icons/Schedules icon.png') }}">
                        </div>
                        <div class="menu-title">Lost & Found</div>
                    </a>
                </li>
                <li class="{{ request()->routeIs('member.ccnrs') ? 'mm-active' : '' }}">
                    <a href="{{ route('member.ccnrs') }}">
                        <div class="parent-icon"><img src="{{ asset('backend/images/icons/project icon.png') }}">
                        </div>
                        <div class="menu-title">Community CC&Rs...</div>
                    </a>
                </li>
                <li class="{{ request()->routeIs('member.architectural') ? 'mm-active' : '' }}">
                    <a href="{{ route('member.architectural') }}">
                        <div class="parent-icon"><img src="{{ asset('backend/images/icons/payout iocn.png') }}">
                        </div>
                        <div class="menu-title">Architectural Request...</div>
                    </a>
                </li>
                <li class="{{ request()->routeIs('member.newsletter') ? 'mm-active' : '' }}">
                    <a href="{{ route('member.newsletter') }}">
                        <div class="parent-icon"><img src="{{ asset('backend/images/icons/inbox icon.png') }}">
                        </div>
                        <div class="menu-title">Newsletter</div>
                    </a>
                </li>

                <li class="menu-label" style="margin-top: 90px;">Insights</li>

                <li>
                    <a href="javascript:;">
                        <div class="parent-icon"><img
                                src="{{ asset('backend/images/icons/Notifications icon.png') }}"></div>
                        <div class="menu-title">Notifications</div>
                    </a>
                </li>
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

@yield('script')
</body>

</html>
