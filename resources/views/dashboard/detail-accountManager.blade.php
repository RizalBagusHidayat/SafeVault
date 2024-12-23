@extends('layouts.dashboard')
@include('dashboard.js.detail-accountManager')
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
                                    <p class="opacity-80 text-sm text-link dark:text-darklink leading-none">Feature</p>
                                </li>
                                <li class="flex items-baseline">
                                    <i class="ti ti-chevron-right mt-1 text-"></i>
                                </li>
                                <li class="flex items-center">
                                    <a class="opacity-80 text-sm text-link dark:text-darklink leading-none"
                                        href="{{ route('account-manager') }}">Account Manager</a>
                                </li>
                                <li class="flex items-baseline">
                                    <i class="ti ti-chevron-right mt-1 text-"></i>
                                </li>
                                <li class="flex items-center text-sm text-link dark:text-darklink leading-none"
                                    aria-current="page">
                                    {{ $provider }}
                                </li>
                                <input type="hidden" name="provider" value="{{ $provider }}">
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
                                <h2 class="text-gray-600 text-xl font-semibold sm:mb-0 mb-2">Akun {{ $provider }}
                                </h2>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Kelola akun Anda dengan mudah.</p>
                            </div>
                        </div>
                        <div class="table-container"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('components.modal', [
        'id' => 'updateAccountModal',
        'title' => 'Ubah Akun',
        'onSave' => 'updateAccount',
        'saveButtonText' => 'Ubah',
        'slot' => View::make('partials.update-account-form'), // Form diletakkan di file terpisah
    ])
@endsection
