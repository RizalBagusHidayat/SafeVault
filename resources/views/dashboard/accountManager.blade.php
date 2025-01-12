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
                        <div class="flex flex-wrap justify-between items-center mb-4 gap-4">
                            <div>
                                <h2 class="text-gray-600 text-xl font-semibold">Daftar Akun</h2>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Kelola akun Anda dengan mudah.</p>
                            </div>
                            <button
                                class="bg-blue-600 text-white font-semibold px-6 py-3 rounded-lg shadow-md
                                        transition transform hover:scale-105 hover:bg-blue-700 hover:shadow-lg
                                        focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-50
                                        active:scale-95 w-full sm:w-auto"
                                id="btn-newAccount">
                                Tambah Akun
                            </button>
                        </div>
                        <div class="sm:flex flex-col gap-2 mb-5">
                            <div class="grid grid-cols-1 sm:grid-cols-3" id="account-list">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="PinModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full flex flex-col items-center space-y-6">
            <h2 class="text-xl font-semibold text-gray-800">Konfirmasi PIN:</h2>
            <p class="text-sm text-gray-600 dark:text-gray-400 text-center">Silakan masukkan PIN Anda untuk
                melanjutkan.</p>

            <!-- PIN Inputs -->
            <div id="pinContainer" class="flex gap-3">
                <div class="flex gap-x-3" data-hs-pin-input="">
                    @foreach (range(1, 6) as $i)
                        <input type="text" id="pin{{ $i }}"
                            class="block w-[38px] text-center border-gray-300 rounded-md text-sm focus:border-primary focus:ring-primary dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:focus:ring-neutral-600"
                            data-hs-pin-input-item="" maxlength="1">
                    @endforeach
                </div>
            </div>

            <div class="flex justify-center w-full mt-4">
                <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded mr-2 w-full"
                    id="cancelConfirmPinModal">Batal</button>
                <button class="bg-primary hover:bg-primary-dark text-white font-semibold py-2 px-4 rounded w-full"
                    id="confirmPinModal">Konfirmasi</button>
            </div>
        </div>
    </div>
    @include('components.modal', [
        'id' => 'addAccountModal',
        'title' => 'Tambah Akun',
        'onSave' => 'saveAccount',
        'saveButtonText' => 'Tambah',
        'slot' => View::make('partials.add-account-form'), // Form diletakkan di file terpisah
    ])
    @include('components.modal', [
        'id' => 'addPlatformModal',
        'title' => 'Tambah Platform',
        'onSave' => 'savePlatform',
        'saveButtonText' => 'Tambah',
        'slot' => View::make('partials.add-platform-form'), // Form diletakkan di file terpisah
    ])
@endsection
