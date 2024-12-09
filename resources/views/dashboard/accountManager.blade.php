@extends('layouts.dashboard')
@include('dashboard.js.accountManager')
@section('content')
    <div class="container full-container py-5 flex flex-col gap-6">
        <div class="grid grid-cols-1 lg:grid-cols-1 lg:gap-x-6 gap-x-0 gap-y-6">
            <div class="col-span-3">
                <div class="card">
                    <div class="card-body">
                        <div class="sm:flex flex-col gap-2 mb-5">
                            <h4 class="text-gray-600 text-lg font-semibold sm:mb-0 mb-2">
                                Account Manager
                            </h4>
                            <ol class="flex items-center whitespace-nowrap gap-1" aria-label="Breadcrumb">
                                <li class="flex items-center">
                                    <a class="opacity-80 text-sm text-link dark:text-darklink leading-none"
                                        href="">Feature</a>
                                </li>
                                <li class="flex items-baseline">
                                    <i class="ti ti-chevron-right mt-1 text-"></i>
                                </li>
                                <li class="flex items-center text-sm text-link dark:text-darklink leading-none"
                                    aria-current="page">
                                    Account Manager
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-3">
                <div class="card">
                    <div class="card-body">
                        <!-- Header untuk Daftar Akun -->
                        <div class="flex justify-between mb-4">
                            <div>
                                <h2 class="text-gray-600 text-xl font-semibold sm:mb-0 mb-2">Daftar Akun</h2>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Kelola akun Anda dengan mudah.</p>
                            </div>
                            <button class="btn bg-primary font-semibold" onclick="openModal('addAccountModal')">Tambah
                                Akun</button>
                        </div>

                        <!-- Daftar Akun -->
                        <div class="sm:flex flex-col gap-2 mb-5">
                            <div class="grid grid-cols-1 sm:grid-cols-3">
                                <!-- Card 1 -->
                                <div
                                    class="p-2 lg:p-4 hover:shadow-lg hover:bg-gray-100 hover:transform hover:scale-105 transition-all duration-300 border-b">
                                    <div class="flex items-center justify-between py-5">
                                        <!-- Logo Google -->
                                        <div class="flex gap-2">
                                            <span class="flex items-center justify-center rounded-full">
                                                <img src="{{ asset('assets/images/icons/google.svg') }}" width="24px"
                                                    height="24px" alt="Logo-Google" />
                                            </span>
                                            <h5 class="ml-4 text-lg text-gray-600 dark:text-gray-300 font-semibold">Google
                                            </h5>
                                        </div>
                                        <!-- Button Aksi -->
                                        <div>
                                            <i class="ti ti-chevron-right mt-1 text-gray-600 dark:text-gray-200"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card 2 -->
                                <div
                                    class="p-2 lg:p-4 hover:shadow-lg hover:bg-gray-100 hover:transform hover:scale-105 transition-all duration-300 border-b">
                                    <div class="flex items-center justify-between py-5">
                                        <!-- Logo Google -->
                                        <div class="flex gap-2">
                                            <span class="flex items-center justify-center rounded-full">
                                                <img src="{{ asset('assets/images/icons/facebook.svg') }}" width="24px"
                                                    height="24px" alt="Logo-Google" />
                                            </span>
                                            <h5 class="ml-4 text-lg text-gray-600 dark:text-gray-300 font-semibold">Facebook
                                            </h5>
                                        </div>
                                        <!-- Button Aksi -->
                                        <div>
                                            <i class="ti ti-chevron-right mt-1 text-gray-600 dark:text-gray-200"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.modal', [
        'id' => 'addAccountModal',
        'title' => 'Tambah Akun',
        'onSave' => 'saveAccount',
        'slot' => View::make('partials.add-account-form'), // Form diletakkan di file terpisah
    ])
@endsection
