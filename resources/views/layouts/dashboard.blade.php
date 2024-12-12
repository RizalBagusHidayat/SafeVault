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
                        <div class="m-1 hs-dropdown [--trigger:hover] relative inline-flex">
                            <a class="relative cursor-pointer align-middle rounded-full hs-dropdown-toggle">
                                <img class="object-cover w-9 h-9 rounded-full" src="../assets/images/profile/user-1.jpg"
                                    alt="User Profile" aria-hidden="true" />
                            </a>

                            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-[200px] bg-white shadow-md rounded-lg mt-2 dark:divide-neutral-700 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full z-10 py-2"
                                role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-hover-event">
                                <div class="px-4 py-2 border-b text-gray-700">
                                    <p class="text-sm font-semibold">{{ $user->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $user->email }}</p>
                                </div>
                                <div class="p-1 space-y-0.5">
                                    <a href="javascript:void(0)"
                                        class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-blue-500 ">
                                        <i class="ti ti-user text-xl"></i>
                                        <span class="text-sm">My Profile</span>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-blue-500 ">
                                        <i class="ti ti-mail text-xl"></i>
                                        <span class="text-sm">My Account</span>
                                    </a>
                                    <a href="javascript:void(0)"
                                        class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-blue-500 ">
                                        <i class="ti ti-list-check text-xl"></i>
                                        <span class="text-sm">My Task</span>
                                    </a>
                                    <div class="px-4 mt-2">
                                        <form action="{{ route('auth.logout') }}" method="POST">
                                            @csrf

                                            <input type="hidden" name="user" value="{{ $user }}">
                                            <button type="submit"
                                                class="block w-full text-center border border-blue-500 text-blue-500 py-2 rounded-md hover:bg-blue-600 hover:text-white mt-2">
                                                Logout
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="hs-dropdown relative inline-flex items-center gap-4">
                            <div
                                class="z-50 relative inline-flex hs-dropdown [--placement:bottom-right] sm:[--trigger:hover]">
                                <a class="relative cursor-pointer align-middle rounded-full hs-dropdown-toggle">
                                    <img class="object-cover w-9 h-9 rounded-full"
                                        src="../assets/images/profile/user-1.jpg" alt="User Profile"
                                        aria-hidden="true" />
                                </a>
                                <div
                                    class="hidden hs-dropdown-menu transition-opacity duration-200 opacity-0 hs-dropdown-open:opacity-100 mt-2 z-20 min-w-[200px] w-[200px] bg-white border border-gray-300 rounded-lg shadow-lg">
                                    <div class="py-2">
                                        <a href="javascript:void(0)"
                                            class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-blue-500 hover:text-white">
                                            <i class="ti ti-user text-xl"></i>
                                            <span class="text-sm">My Profile</span>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-blue-500 hover:text-white">
                                            <i class="ti ti-mail text-xl"></i>
                                            <span class="text-sm">My Account</span>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-blue-500 hover:text-white">
                                            <i class="ti ti-list-check text-xl"></i>
                                            <span class="text-sm">My Task</span>
                                        </a>
                                        <div class="px-4 mt-2">
                                            <a href="../../pages/authentication-login.html"
                                                class="block w-full text-center border border-blue-500 text-blue-500 py-2 rounded-md hover:bg-blue-600 hover:text-white">
                                                Logout
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

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
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
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
