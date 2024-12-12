@extends('layouts.dashboard')
@push('styles')
    <style>
        .dt-length .dt-input {
            /* display: none !important; */
            min-width: 72px !important;
        }
    </style>
@endpush
@include('dashboard.js.activity')
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
        </div>
        <div class="col-span-3">
            <div class="card">
                <div class="card-body">
                    <div class="flex justify-between mb-4">
                        <div>
                            <h2 class="text-gray-600 text-xl font-semibold sm:mb-0 mb-2">Log Aktivitas</h2>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                Daftar aktivitas yang tercatat di sistem.
                            </p>
                        </div>
                    </div>

                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>Column 1</th>
                                <th>Column 2</th>
                                <th>Column 2</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>

    <script></script>
@endsection
