@extends('layouts.dashboard')
@include('dashboard.js.passwordGenerator')
@section('content')
    <div class="container full-container py-5 flex flex-col gap-6">
        <div class="grid grid-cols-1 lg:grid-cols-1 lg:gap-x-6 gap-x-0 gap-y-6">
            <div class="col-span-3">
                <div class="card">
                    <div class="card-body">
                        <div class="sm:flex flex-col gap-2 mb-5">
                            <h4 class=" text-lg font-semibold sm:mb-0 mb-2">
                                Password Generator
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
                                    Password Generator
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-3">
                <div class="card">
                    <div class="card-body">
                        <div class="flex justify-between mb-4">
                            <div>
                                <h2 class="text-gray-600 text-xl font-semibold sm:mb-0 mb-2">Buat Password</h2>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Buat password yang kuat dan unik dengan mudah.
                                </p>
                            </div>
                        </div>
                        <div>
                            <div class="grid lg:grid-cols-2 gap-4">
                                <!-- Password Length -->
                                <div>
                                    <label class="block mb-2 font-semibold">Password Length</label>
                                    <input type="range" id="passwordLength" min="8" max="32" value="12"
                                        class="w-full mb-2" oninput="updateLengthLabel()" />
                                    <p id="lengthLabel" class="text-sm text-gray-500">Length: 12</p>
                                </div>

                                <!-- Include Characters -->
                                <div>
                                    <label class="block mb-2 font-semibold">Include Characters</label>
                                    <div class="flex items-center gap-4">
                                        <label>
                                            <input class="" type="checkbox" id="uppercase" checked /> <span
                                                class="text-sm lg:text-md">Uppercase</span>
                                        </label>
                                        <label>
                                            <input class="" type="checkbox" id="lowercase" checked /> <span
                                                class="text-sm lg:text-md">Lowercase</span>
                                        </label>
                                        <label>
                                            <input class="" type="checkbox" id="numbers" checked /> <span
                                                class="text-sm lg:text-md">Numbers</span>
                                        </label>
                                        <label>
                                            <input class="" type="checkbox" id="symbols" checked /> <span
                                                class="text-sm lg:text-md">Symbols</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Generated Password -->
                            <div class="mb-4 mt-4">
                                <label class="block mb-2 font-semibold rounded-md">Generated Password</label>
                                <input type="text" id="generatedPassword" class="w-full p-2 border rounded-md "
                                    readonly />
                            </div>

                            <!-- Buttons -->
                            <div class="flex gap-4">
                                <button class="btn bg-primary font-semibold" onclick="generatePassword()">Generate
                                    Password</button>
                                <button class="btn bg-secondary font-semibold" onclick="copyToClipboard()">Copy to
                                    Clipboard</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
