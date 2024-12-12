<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />

    <!-- Core CSS -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css" />

    @stack('styles')

    <title>Dashboard</title>
</head>

<body class="bg-gray-100">
    <main>
        <!-- Project Wrapper -->
        <div id="main-wrapper" class="flex">
            <!-- Sidebar -->
            @include('layouts.sidebar')

            <!-- Page Content -->
            <div class="w-full page-wrapper overflow-hidden">
                <!-- Header -->
                <header class="container full-container w-full text-sm py-5 xl:px-9 px-5">
                    <nav class="w-full flex items-center justify-between" aria-label="Global">
                        <!-- Left Icons -->
                        <ul class="icon-nav flex items-center gap-4">
                            <li class="xl:hidden">
                                <a class="text-xl icon-hover cursor-pointer text-heading" id="headerCollapse"
                                    data-hs-overlay="#application-sidebar-brand" href="javascript:void(0)">
                                    <i class="ti ti-menu-2"></i>
                                </a>
                            </li>
                            <li>
                                <div class="hs-dropdown relative inline-flex">
                                    <a class="relative hs-dropdown-toggle icon-hover text-gray-600" href="#">
                                        <i class="ti ti-bell-ringing text-xl"></i>
                                        <div
                                            class="absolute bg-blue-600 w-2 h-2 rounded-full top-0 right-0 transform translate-x-1/2 -translate-y-1/2">
                                        </div>
                                    </a>
                                    <!-- Dropdown -->
                                    <div class="card hs-dropdown-menu hidden z-10 mt-2 w-[300px] border rounded-md">
                                        <h3 class="text-gray-600 font-semibold text-base px-6 py-3">Notification</h3>
                                        <ul class="list-none flex flex-col">
                                            <li>
                                                <a href="#" class="py-3 px-6 block hover:bg-blue-500">
                                                    <p class="text-sm text-gray-600 font-semibold">Roman Joined the
                                                        Team!</p>
                                                    <p class="text-xs text-gray-500">Congratulate him</p>
                                                </a>
                                            </li>
                                            <!-- Additional notifications -->
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <!-- Profile -->
                        <div class="flex items-center gap-4">
                            <div
                                class="hs-dropdown relative inline-flex [--placement:bottom-right] sm:[--trigger:hover]">
                                <a class="relative hs-dropdown-toggle cursor-pointer align-middle rounded-full">
                                    <img class="object-cover w-9 h-9 rounded-full"
                                        src="../assets/images/profile/user-1.jpg" alt="" aria-hidden="true" />
                                </a>
                                <div class="card hs-dropdown-menu transition-[opacity,margin] border border-gray-400 rounded-[7px] duration hs-dropdown-open:opacity-100 opacity-0 mt-2 min-w-max w-[200px] hidden z-[12]"
                                    aria-labelledby="hs-dropdown-custom-icon-trigger">
                                    <div class="card-body p-0 py-2">
                                        <a href="javscript:void(0)"
                                            class="flex gap-2 items-center px-4 py-[6px] hover:bg-blue-500">
                                            <i class="ti ti-user text-gray-500 text-xl"></i>
                                            <p class="text-sm text-gray-500">My Profile</p>
                                        </a>
                                        <a href="javscript:void(0)"
                                            class="flex gap-2 items-center px-4 py-[6px] hover:bg-blue-500">
                                            <i class="ti ti-mail text-gray-500 text-xl"></i>
                                            <p class="text-sm text-gray-500">My Account</p>
                                        </a>
                                        <a href="javscript:void(0)"
                                            class="flex gap-2 items-center px-4 py-[6px] hover:bg-blue-500">
                                            <i class="ti ti-list-check text-gray-500 text-xl"></i>
                                            <p class="text-sm text-gray-500">My Task</p>
                                        </a>
                                        <div class="px-4 mt-[7px] grid">
                                            <a href="../../pages/authentication-login.html"
                                                class="btn-outline-primary w-full hover:bg-blue-600 hover:text-white">Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </header>

                <!-- Main Content -->
                <main class="h-full overflow-y-auto max-w-full pt-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </main>

    <!-- Scripts -->
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/iconify-icon/dist/iconify-icon.min.js') }}"></script>
    <script src="{{ asset('assets/libs/@preline/dropdown/index.js') }}"></script>
    <script src="{{ asset('assets/libs/@preline/overlay/index.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    @vite('resources/js/app.js')
    @stack('scripts')
</body>

</html>
