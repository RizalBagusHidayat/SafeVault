@extends('layouts.dashboard')
@push('scripts')
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
@endpush
@include('dashboard.js.index')
@section('content')
    <div class="container full-container py-5 flex flex-col gap-6">
        <section class="mb-10">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">Selamat Datang!</h1>
                <p class="text-gray-600">Di halaman ini, Anda dapat melihat berbagai tipe akun dan menggunakan fitur
                    generator password.</p>
            </div>
        </section>

        <section class="mb-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Akun Anda</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="account-list">

            </div>
        </section>

        <section>
            <h2 class="text-2xl font-semibold text-gray-800 mb-6">Generator Password</h2>
            <div class="card">
                <div class="card-body">
                    <div>
                        <div class="mb-4">
                            <label class="block mb-2 font-semibold rounded-md">Generated Password</label>
                            <input type="text" id="generatedPassword" class="w-full p-2 border rounded-md " readonly />
                        </div>
                        <div class="flex gap-4">
                            <button class="btn bg-primary font-semibold" onclick="generatePassword()">Generate
                                Password</button>
                            <button class="btn bg-secondary font-semibold" onclick="copyToClipboard()">Copy to
                                Clipboard</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
