<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Dashboard</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets-guest/img/svg/logo.svg') }}" type="image/x-icon">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('assets-guest/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-guest/css/style.min.css') }}">


</head>


<body>
    <div class="layer"></div>
    <!-- ! Body -->
    <a class="skip-link sr-only" href="#skip-target">Skip to content</a>
    <div class="page-flex">
        <!-- ! Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-start">
                <div class="sidebar-head">
                    <a href="/" class="logo-wrapper" title="Home">
                        <span class="sr-only">Home</span>
                        <span class="icon logo" aria-hidden="true"></span>
                        <div class="logo-text">
                            <span class="logo-title">Elegant</span>
                            <span class="logo-subtitle">Dashboard</span>
                        </div>
                    </a>
                    <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                        <span class="sr-only">Toggle menu</span>
                        <span class="icon menu-toggle" aria-hidden="true"></span>
                    </button>
                </div>
                @include('layouts.guest.sidebar')
                
            </div>
            <div class="sidebar-footer">
                <a href="##" class="sidebar-user">
                    <span class="sidebar-user-img">
                        <picture>
                            <img src="{{ asset('assets-guest/img/avatar/avatar-illustrated-01.png') }}" type="image/png"
                                alt="User name" />
                        </picture>
                    </span>
                    <div class="sidebar-user-info">
                        <span class="sidebar-user__title">Guest</span>
                        <span class="sidebar-user__subtitle"></span>
                    </div>
                </a>
            </div>
        </aside>
        {{-- close sidebar --}}

        <div class="main-wrapper">
            <!-- ! Main nav -->
            <nav class="main-nav--bg">
                <div class="container main-nav">
                    <div class="main-nav-start">
                        <div class="search-wrapper">
                            <i data-feather="search" aria-hidden="true"></i>
                            <input type="text" placeholder="Enter keywords ..." required />
                        </div>
                    </div>
                    <div class="main-nav-end">
                        <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                            <span class="sr-only">Toggle menu</span>
                            <span class="icon menu-toggle--gray" aria-hidden="true"></span>
                        </button>
                        <div class="lang-switcher-wrapper">
                            <button class="lang-switcher transparent-btn" type="button">
                                EN
                                <i data-feather="chevron-down" aria-hidden="true"></i>
                            </button>
                            <ul class="lang-menu dropdown">
                                <li><a href="##">English</a></li>
                                <li><a href="##">French</a></li>
                                <li><a href="##">Uzbek</a></li>
                            </ul>
                        </div>
                        <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
                            <span class="sr-only">Switch theme</span>
                            <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
                            <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
                        </button>
                        <div class="notification-wrapper">
                            <button class="gray-circle-btn dropdown-btn" title="To messages" type="button">
                                <span class="sr-only">To messages</span>
                                <span class="icon notification active" aria-hidden="true"></span>
                            </button>
                            <ul class="users-item-dropdown notification-dropdown dropdown">
                                <li>
                                    <a href="##">
                                        <div class="notification-dropdown-icon info">
                                            <i data-feather="check"></i>
                                        </div>
                                        <div class="notification-dropdown-text">
                                            <span class="notification-dropdown__title">System just updated</span>
                                            <span class="notification-dropdown__subtitle">The system has been
                                                successfully upgraded. Read
                                                more here.</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="##">
                                        <div class="notification-dropdown-icon danger">
                                            <i data-feather="info" aria-hidden="true"></i>
                                        </div>
                                        <div class="notification-dropdown-text">
                                            <span class="notification-dropdown__title">The cache is full!</span>
                                            <span class="notification-dropdown__subtitle">Unnecessary caches take up
                                                a lot of memory space and
                                                interfere ...</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="##">
                                        <div class="notification-dropdown-icon info">
                                            <i data-feather="check" aria-hidden="true"></i>
                                        </div>
                                        <div class="notification-dropdown-text">
                                            <span class="notification-dropdown__title">New Subscriber here!</span>
                                            <span class="notification-dropdown__subtitle">A new subscriber has
                                                subscribed.</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="link-to-page" href="##">Go to Notifications page</a>
                                </li>
                            </ul>
                        </div>
                        <div class="nav-user-wrapper">
                            <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
                                <span class="sr-only">My profile</span>
                                <span class="nav-user-img">
                                    <picture>
                                        <source srcset="
                                                    ./img/avatar/avatar-illustrated-02.webp
                                                " type="image/webp" />
                                        <img src="./img/avatar/avatar-illustrated-02.png" alt="User name" />
                                    </picture>
                                </span>
                            </button>
                            <ul class="users-item-dropdown nav-user-dropdown dropdown">
                                <li>
                                    <a href="##">
                                        <i data-feather="user" aria-hidden="true"></i>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="##">
                                        <i data-feather="settings" aria-hidden="true"></i>
                                        <span>Account settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="danger" href="##">
                                        <i data-feather="log-out" aria-hidden="true"></i>
                                        <span>Log out</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- ! Main -->
            <main class="main users chart-page" id="skip-target">
                <div class="container">
                    <h2 class="main-title">Dashboard</h2>
                    <div class="row stat-cards">
                        <div class="col-md-6 col-xl-3">
                            <article class="stat-cards-item">
                                <div class="stat-cards-icon primary">
                                    <i data-feather="bar-chart-2" aria-hidden="true"></i>
                                </div>
                                <div class="stat-cards-info">
                                    <p class="stat-cards-info__num">
                                        1478 286
                                    </p>
                                    <p class="stat-cards-info__title">
                                        Total visits
                                    </p>
                                    <p class="stat-cards-info__progress">
                                        <span class="stat-cards-info__profit success">
                                            <i data-feather="trending-up" aria-hidden="true"></i>4.07%
                                        </span>
                                        Last month
                                    </p>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <article class="stat-cards-item">
                                <div class="stat-cards-icon warning">
                                    <i data-feather="file" aria-hidden="true"></i>
                                </div>
                                <div class="stat-cards-info">
                                    <p class="stat-cards-info__num">
                                        1478 286
                                    </p>
                                    <p class="stat-cards-info__title">
                                        Total visits
                                    </p>
                                    <p class="stat-cards-info__progress">
                                        <span class="stat-cards-info__profit success">
                                            <i data-feather="trending-up" aria-hidden="true"></i>0.24%
                                        </span>
                                        Last month
                                    </p>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <article class="stat-cards-item">
                                <div class="stat-cards-icon purple">
                                    <i data-feather="file" aria-hidden="true"></i>
                                </div>
                                <div class="stat-cards-info">
                                    <p class="stat-cards-info__num">
                                        1478 286
                                    </p>
                                    <p class="stat-cards-info__title">
                                        Total visits
                                    </p>
                                    <p class="stat-cards-info__progress">
                                        <span class="stat-cards-info__profit danger">
                                            <i data-feather="trending-down" aria-hidden="true"></i>1.64%
                                        </span>
                                        Last month
                                    </p>
                                </div>
                            </article>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <article class="stat-cards-item">
                                <div class="stat-cards-icon success">
                                    <i data-feather="feather" aria-hidden="true"></i>
                                </div>
                                <div class="stat-cards-info">
                                    <p class="stat-cards-info__num">
                                        1478 286
                                    </p>
                                    <p class="stat-cards-info__title">
                                        Total visits
                                    </p>
                                    <p class="stat-cards-info__progress">
                                        <span class="stat-cards-info__profit warning">
                                            <i data-feather="trending-up" aria-hidden="true"></i>0.00%
                                        </span>
                                        Last month
                                    </p>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="">
                            </div>
                            <div class="users-table table-wrapper">
                                <table class="posts-table">
                                    <thead>
                                        <tr class="users-table-info">
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
    {{-- DEBUG --}}
    <tr style="background: yellow;">
        <td colspan="2">
            DEBUG:
            Variable exists: {{ isset($dataWarga) ? 'YES' : 'NO' }} |
            Data count: {{ isset($dataWarga) ? $dataWarga->count() : '0' }} |
            Data type: {{ isset($dataWarga) ? get_class($dataWarga) : 'N/A' }}
        </td>
    </tr>

    @if(isset($dataWarga) && $dataWarga->count() > 0)
        @foreach($dataWarga as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td>Tombol Edit & Tombol Hapus</td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="2" class="text-center">Tidak ada data warga</td>
        </tr>
    @endif
</tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <article class="">
                            </article>
                            <article class="white-block">
                                <div class="top-cat-title">
                                    <h3>Top categories</h3>
                                    <p>28 Categories, 1400 Posts</p>
                                </div>
                                <ul class="top-cat-list">
                                    <li>
                                        <a href="##">
                                            <div class="top-cat-list__title">
                                                Lifestyle <span>8.2k</span>
                                            </div>
                                            <div class="top-cat-list__subtitle">
                                                Dailiy lifestyle articles
                                                <span class="purple">+472</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="##">
                                            <div class="top-cat-list__title">
                                                Tutorials <span>8.2k</span>
                                            </div>
                                            <div class="top-cat-list__subtitle">
                                                Coding tutorials
                                                <span class="blue">+472</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="##">
                                            <div class="top-cat-list__title">
                                                Technology <span>8.2k</span>
                                            </div>
                                            <div class="top-cat-list__subtitle">
                                                Dailiy technology articles
                                                <span class="danger">+472</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="##">
                                            <div class="top-cat-list__title">
                                                UX design <span>8.2k</span>
                                            </div>
                                            <div class="top-cat-list__subtitle">
                                                UX design tips
                                                <span class="success">+472</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="##">
                                            <div class="top-cat-list__title">
                                                Interaction tips
                                                <span>8.2k</span>
                                            </div>
                                            <div class="top-cat-list__subtitle">
                                                Interaction articles
                                                <span class="warning">+472</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="##">
                                            <div class="top-cat-list__title">
                                                App development
                                                <span>8.2k</span>
                                            </div>
                                            <div class="top-cat-list__subtitle">
                                                Mobile development articles
                                                <span class="warning">+472</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="##">
                                            <div class="top-cat-list__title">
                                                Nature <span>8.2k</span>
                                            </div>
                                            <div class="top-cat-list__subtitle">
                                                Wildlife animal articles
                                                <span class="warning">+472</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="##">
                                            <div class="top-cat-list__title">
                                                Geography <span>8.2k</span>
                                            </div>
                                            <div class="top-cat-list__subtitle">
                                                Geography articles
                                                <span class="primary">+472</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </article>
                        </div>
                    </div>
                </div>
            </main>
            <!-- ! Footer -->
            <footer class="footer">
                <div class="container footer--flex">
                    <div class="footer-start">
                        <p>
                            2021 © Elegant Dashboard -
                            <a href="elegant-dashboard.com" target="_blank"
                                rel="noopener noreferrer">elegant-dashboard.com</a>
                        </p>
                    </div>
                    <ul class="footer-end">
                        <li><a href="##">About</a></li>
                        <li><a href="##">Support</a></li>
                        <li><a href="##">Puchase</a></li>
                    </ul>
                </div>
            </footer>
        </div>
    </div>

    <!-- Chart library -->
    <script src={{asset('js/script.js')}}></script>
</body>

</html>
