<aside id="application-sidebar-brand"
    class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full  transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed top-0 with-vertical h-screen z-[10] flex-shrink-0 border-r-[1px] w-[270px] border-gray-400  bg-white left-sidebar   transition-all duration-300">
    <div class="p-5">

        <a href="{{ route('dashboard') }}" class="text-nowrap flex items-center gap-3 font-semibold text-2xl">
            <img src="{{ asset('assets/images/icons/logo.svg') }}" alt="Logo-Dark" />
            SafeVault
        </a>


    </div>
    <div class="scroll-sidebar" data-simplebar="">
        <div class="px-6 mt-8">
            <nav class=" w-full flex flex-col sidebar-nav">
                <ul id="sidebarnav" class="text-gray-600 text-sm">
                    <!-- Home Section -->
                    <li class="text-xs font-bold pb-4">
                        <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                        <span>HOME</span>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-2 px-3 rounded-md w-full flex items-center hover:text-blue-600 hover:bg-blue-500"
                            href="{{ route('dashboard') }}">
                            <i class="ti ti-layout-dashboard text-xl"></i> <span>Dashboard</span>
                        </a>
                    </li>

                    <!-- Features Section -->
                    <li class="text-xs font-bold mb-4 mt-6">
                        <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                        <span>FEATURE</span>
                    </li>

                    <li class="sidebar-item mb-4">
                        <a class="sidebar-link gap-3 py-2 px-3 rounded-md w-full flex items-center hover:text-blue-600 hover:bg-blue-500
                            {{ Route::currentRouteName() == 'account-manager.provider' ? 'active' : '' }}"
                            href="{{ route('account-manager') }}">
                            <i class="ti ti-article text-xl"></i> <span>Account Manager</span>
                        </a>
                    </li>

                    <li class="sidebar-item mb-4">
                        <a class="sidebar-link gap-3 py-2 px-3 rounded-md w-full flex items-center hover:text-blue-600 hover:bg-blue-500"
                            href="{{ route('password-generator') }}">
                            <i class="ti ti-key text-xl"></i> <span>Password Generator</span>
                        </a>
                    </li>

                    {{-- <li class="sidebar-item mb-4">
                        <a class="sidebar-link gap-3 py-2 px-3 rounded-md w-full flex items-center hover:text-blue-600 hover:bg-blue-500"
                            href="{{ route('activity') }}">
                            <i class="ti ti-history text-xl"></i> <span>Activity</span>
                        </a>
                    </li>

                    <li class="sidebar-item mb-4">
                        <a class="sidebar-link gap-3 py-2 px-3 rounded-md w-full flex items-center hover:text-blue-600 hover:bg-blue-500"
                            href="{{ route('security') }}">
                            <i class="ti ti-shield-check text-xl"></i> <span>Security</span>
                        </a>
                    </li> --}}

                    <!-- Settings and Logout -->
                    {{-- <li class="text-xs font-bold mb-4 mt-8">
                        <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                        <span>SETTINGS</span>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-2 px-3 rounded-md w-full flex items-center hover:text-blue-600 hover:bg-blue-500"
                            href="#">
                            <i class="ti ti-settings text-xl"></i> <span>Settings</span>
                        </a>
                    </li> --}}
                </ul>
            </nav>
        </div>
    </div>

    <!-- Bottom Upgrade Option -->
    {{-- <div class="m-6  relative">
        <div class="bg-blue-500 p-5 rounded-md flex items-center justify-between">
            <div>
                <h5 class="text-base font-semibold text-gray-700 mb-3">Upgrade to Pro</h5>
                <button class="text-xs font-semibold hover:bg-blue-700 text-white bg-blue-600 rounded-md  px-4 py-2">Buy
                    Pro</button>
            </div>
            <div class="-mt-12 -mr-2">
                <img src="../assets/images/profile/rocket.png" class="max-w-fit" alt="profile" />
            </div>
        </div>
    </div> --}}
    <!-- </aside> -->
</aside>
