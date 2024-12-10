<script>
    function updateLengthLabel() {
        const length = document.getElementById('passwordLength').value;
        document.getElementById('lengthLabel').textContent = `Length: ${length}`;
    }

    function generatePassword() {
        const length = document.getElementById('passwordLength').value;
        const includeUppercase = document.getElementById('uppercase').checked;
        const includeLowercase = document.getElementById('lowercase').checked;
        const includeNumbers = document.getElementById('numbers').checked;
        const includeSymbols = document.getElementById('symbols').checked;

        const upperCaseChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        const lowerCaseChars = 'abcdefghijklmnopqrstuvwxyz';
        const numberChars = '0123456789';
        const symbolChars = '!@#$%^&*()_+[]{}|;:,.<>?';

        let charPool = '';
        if (includeUppercase) charPool += upperCaseChars;
        if (includeLowercase) charPool += lowerCaseChars;
        if (includeNumbers) charPool += numberChars;
        if (includeSymbols) charPool += symbolChars;

        if (!charPool) {
            alert('Please select at least one character type.');
            return;
        }

        let password = '';
        for (let i = 0; i < length; i++) {
            const randomIndex = Math.floor(Math.random() * charPool.length);
            password += charPool[randomIndex];
        }

        document.getElementById('generatedPassword').value = password;
    }

    function copyToClipboard() {
        const passwordField = document.getElementById('generatedPassword');
        passwordField.select();
        passwordField.setSelectionRange(0, 99999); // For mobile devices
        navigator.clipboard.writeText(passwordField.value)
            .then(() => alert('Password copied to clipboard!'))
            .catch(err => alert('Failed to copy password.'));
    }
</script>
