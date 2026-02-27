<script>
    $(document).ready(function() {

        function validatePassword() {
            let password = $('#password').val();
            let confirmPassword = $('#confirm_password').val();
            let valid = true;

            if (password.length < 8) {
                $('#passError').text('Minimum 8 characters');
                valid = false;
            } else {
                $('#passError').text('');
            }

            if (password !== confirmPassword || confirmPassword === '') {
                $('#confirmError').text('Passwords must match');
                valid = false;
            } else {
                $('#confirmError').text('');
            }

            //$('#signupSubmit').prop('disabled', true);
        }


        $('#password, #confirm_password').on('keyup', function() {
            validatePassword();
        });

    });
</script>