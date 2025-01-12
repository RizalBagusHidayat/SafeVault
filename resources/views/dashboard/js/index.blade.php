@push('scripts')
    <script>
        $.ajax({
            url: "/api/platform",
            type: "GET",
            success: function(response) {
                console.log(response.data);
                const container = $("#account-list");
                container.empty();

                // Periksa apakah data kosong atau null
                if (!response.data || response.data.length === 0) {
                    // Ubah grid menjadi satu kolom
                    container.removeClass("sm:grid-cols-2 lg:grid-cols-3").addClass("grid-cols-1");
                    const noDataMessage = `
                <div class="text-center pt-5 text-gray-600 dark:text-gray-300">
                    Tidak ada data akun, silahkan tambahkan akun terlebih dahulu
                </div>
            `;
                    container.append(noDataMessage);
                    return;
                }

                // Jika data ada, pastikan grid memiliki kolom yang sesuai
                container.removeClass("grid-cols-1").addClass("sm:grid-cols-2 lg:grid-cols-3");

                // Loop data dari response
                response.data.forEach(function(platform) {
                    const iconPath =
                        platform.is_editable == 0 ?
                        `assets/images/icons/${platform.icon}` :
                        `assets/images/icons/users/${platform.icon}`;
                    const card = `
                <div class="col-span-1">
                    <div class="card rounded-lg shadow-sm bg-blue-50 px-4 py-8 flex items-center justify-between">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">${platform.accounts.length} Akun</h2>
                            <p class="text-gray-500 text-sm">${platform.name}</p>
                        </div>
                        <div class="bg-blue-100 rounded-full">
                            <img src="{{ asset('${iconPath}') }}" class="h-8 w-8 text-blue-500" alt="Icon Platform">
                        </div>
                    </div>
                </div>
            `;
                    container.append(card);
                });
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
                const errorMessage = `
            <div class="text-center pt-5 text-red-600 dark:text-red-300">
                Gagal memuat data, silakan coba lagi nanti.
            </div>
        `;
                $("#account-list").append(errorMessage);
            }
        });


        function generatePassword() {
            const length = 12; // Panjang password tetap 12
            const upperCaseChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            const lowerCaseChars = 'abcdefghijklmnopqrstuvwxyz';
            const numberChars = '0123456789';
            const symbolChars = '!@#$%^&*()_+[]{}|;:,.<>?';

            // Pastikan mencakup setidaknya satu karakter dari setiap kategori
            const mandatoryChars = [
                upperCaseChars[Math.floor(Math.random() * upperCaseChars.length)],
                lowerCaseChars[Math.floor(Math.random() * lowerCaseChars.length)],
                numberChars[Math.floor(Math.random() * numberChars.length)],
                symbolChars[Math.floor(Math.random() * symbolChars.length)],
            ];

            // Gabungkan semua karakter ke dalam pool
            const charPool = upperCaseChars + lowerCaseChars + numberChars + symbolChars;

            // Tambahkan karakter acak dari pool untuk memenuhi panjang yang diinginkan
            let password = mandatoryChars.join('');
            for (let i = mandatoryChars.length; i < length; i++) {
                const randomIndex = Math.floor(Math.random() * charPool.length);
                password += charPool[randomIndex];
            }

            // Acak password agar karakter mandatory tidak selalu di awal
            password = password.split('').sort(() => Math.random() - 0.5).join('');

            // Tampilkan password
            document.getElementById('generatedPassword').value = password;
        }

        function copyToClipboard() {
            const passwordField = document.getElementById('generatedPassword');
            passwordField.select();
            passwordField.setSelectionRange(0, 99999); // Untuk perangkat seluler
            navigator.clipboard.writeText(passwordField.value)
                .then(() => alert('Password copied to clipboard!'))
                .catch(err => alert('Failed to copy password.'));
        }
    </script>
@endpush
