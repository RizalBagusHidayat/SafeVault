@extends('layouts.dashboard')
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
                                <li class="flex items-center">
                                    <a class="opacity-80 text-sm text-link dark:text-darklink leading-none"
                                        href="">Account Manager</a>
                                </li>
                                <li class="flex items-baseline">
                                    <i class="ti ti-chevron-right mt-1 text-"></i>
                                </li>
                                <li class="flex items-center text-sm text-link dark:text-darklink leading-none"
                                    aria-current="page">
                                    {{ $provider }}
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
                                <h2 class="text-gray-600 text-xl font-semibold sm:mb-0 mb-2">Akun {{ $provider }}
                                </h2>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Kelola akun Anda dengan mudah.</p>
                            </div>
                        </div>
                        <div class="overflow-x-auto border border-gray-300 rounded-lg shadow-sm mb-6">
                            <table class="table-auto w-full border-collapse border-gray-300">
                                <tbody class="divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-4 py-3 align-top w-1/5 font-medium text-gray-600">Nama Akun</td>
                                        <td class="px-4 py-3 align-top text-gray-600">http://127.0.0.1:8000</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 align-top w-1/5 font-medium text-gray-600">Nama Pengguna</td>
                                        <td class="px-4 py-3 align-top flex items-center gap-2 text-gray-600">
                                            <span>peternak</span>
                                            <button class="text-blue-500 hover:underline"
                                                onclick="copyToClipboard('peternak')">Salin</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 align-top w-1/5 font-medium text-gray-600">Kata Sandi</td>
                                        <td class="px-4 py-3 align-top flex items-center gap-2 text-gray-600">
                                            <span>••••••••</span>
                                            <button class="text-blue-500 hover:underline"
                                                onclick="togglePassword()">Lihat</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 align-top w-1/5 font-medium text-gray-600">Catatan</td>
                                        <td class="px-4 py-3 align-top text-gray-500">Tidak ada catatan yang ditambahkan
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- Tombol Aksi -->
                            <div class="flex justify-end p-4 gap-2">
                                <button
                                    class="px-4 py-2 text-sm font-medium text-white bg-primary rounded-lg hover:bg-blue-600"
                                    onclick="editAccount()">Edit</button>
                                <button
                                    class="px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-lg hover:bg-red-600"
                                    onclick="deleteAccount()">Hapus</button>
                            </div>
                        </div>
                        <div class="overflow-x-auto border border-gray-300 rounded-lg shadow-sm mb-6">
                            <table class="table-auto w-full border-collapse border-gray-300">
                                <tbody class="divide-y divide-gray-200">
                                    <tr>
                                        <td class="px-4 py-3 align-top w-1/5 font-medium text-gray-600">Nama Akun</td>
                                        <td class="px-4 py-3 align-top text-gray-600">http://127.0.0.1:8000</td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 align-top w-1/5 font-medium text-gray-600">Nama Pengguna</td>
                                        <td class="px-4 py-3 align-top flex items-center gap-2 text-gray-600">
                                            <span>peternak</span>
                                            <button class="text-blue-500 hover:underline"
                                                onclick="copyToClipboard('peternak')">Salin</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 align-top w-1/5 font-medium text-gray-600">Kata Sandi</td>
                                        <td class="px-4 py-3 align-top flex items-center gap-2 text-gray-600">
                                            <span>••••••••</span>
                                            <button class="text-blue-500 hover:underline"
                                                onclick="togglePassword()">Lihat</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-4 py-3 align-top w-1/5 font-medium text-gray-600">Catatan</td>
                                        <td class="px-4 py-3 align-top text-gray-500">Tidak ada catatan yang ditambahkan
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- Tombol Aksi -->
                            <div class="flex justify-end p-4 gap-2">
                                <button
                                    class="px-4 py-2 text-sm font-medium text-white bg-primary rounded-lg hover:bg-blue-600"
                                    onclick="editAccount()">Edit</button>
                                <button
                                    class="px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-lg hover:bg-red-600"
                                    onclick="deleteAccount()">Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
