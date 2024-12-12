<script>
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }

    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }

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
        url: "/api/activity",
        type: "GET",
        dataType: "json",
        success: function(data) {
            console.log(data);
        },
    });
</script>
