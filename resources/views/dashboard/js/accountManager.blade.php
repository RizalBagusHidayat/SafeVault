@push('scripts')
    <script>
        function saveAccount() {
            const form = document.getElementById('addAccountForm');
            const formData = new FormData(form);

            // Kirim data ke server
            fetch('/add-account', {
                    method: 'POST',
                    body: formData,
                }).then(response => response.json())
                .then(data => {
                    alert('Akun berhasil ditambahkan!');
                    closeModal('addAccountModal');
                }).catch(error => {
                    alert('Terjadi kesalahan.');
                });
        }

        $.ajax({
            url: `{{ route('account.index') }}`,
            type: 'GET',
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {}
        })
    </script>
@endpush
