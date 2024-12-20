@if ($showPinModal === true)
    @if ($user->pin == null)
        <div id="setPinModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full flex flex-col items-center space-y-6">
                <h2 class="text-xl font-semibold text-gray-800">Buat PIN Baru:</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400 text-center">Untuk mengamankan akun Anda, silakan buat
                    PIN 6 digit.</p>

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
                    <button
                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded mr-2 w-full"
                        id="cancelSetPin">Batal</button>
                    <button class="bg-primary hover:bg-primary-dark text-white font-semibold py-2 px-4 rounded w-full"
                        id="setPin">Set PIN</button>
                </div>
            </div>
        </div>
    @elseif ($user->pin != null && $user->pin != '')
        <div id="confirmPinModal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
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
                    <button
                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded mr-2 w-full"
                        id="cancelConfirmPin">Batal</button>
                    <button class="bg-primary hover:bg-primary-dark text-white font-semibold py-2 px-4 rounded w-full"
                        id="confirmPin">Konfirmasi</button>
                </div>
            </div>
        </div>
    @endif
@endif

@push('scripts')
    <script>
        function processPin(pin, actionUrl) {
            if (pin.length !== 6) {
                alert('PIN harus terdiri dari 6 digit.');
                return;
            }

            $.ajax({
                url: actionUrl,
                type: 'POST',
                data: {
                    pin: pin,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {

                    if (response.status === true) {
                        alert(response.message); 
                        location.reload(); 
                    } else {
                        alert('Terjadi kesalahan, coba lagi.');
                    }
                },
                error: function() {
                    alert('Terjadi kesalahan, coba lagi.');
                }
            });
        }

        $('#cancelSetPin').click(function() {
            $.ajax({
                url: "{{ route('auth.logout') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.status == true) {
                        window.location.href = '{{ route('login') }}';
                    }
                }
            });
        });

        $('#cancelConfirmPin').click(function() {
            $.ajax({
                url: "{{ route('auth.logout') }}",
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.status == true) {
                        window.location.href = '{{ route('login') }}';
                    }
                }
            });
        });

        $('#setPin').click(function() {
            var pin = '';
            $('#setPinModal input').each(function() {
                pin += $(this).val(); 
            });

            var actionUrl = '{{ route('setPin') }}'; 
            processPin(pin, actionUrl); 
        });

        $('#confirmPin').click(function() {
            var pin = '';
            $('#confirmPinModal input').each(function() {
                pin += $(this).val(); 
            });

            var actionUrl = `{{ route('verifyPin') }}`; 
            processPin(pin, actionUrl); 
        });

        $('#setPinModal input, #confirmPinModal input').on('input', function() {
            var $current = $(this);
            var $next = $current.next('input');
            if ($current.val().length === 1 && $next.length) {
                $next.focus();
            }
        });
    </script>
@endpush
