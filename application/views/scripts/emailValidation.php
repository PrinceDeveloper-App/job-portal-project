<script>
$(document).ready(function () {

  // Email regex
  function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }

  $('#email').on('input change', function () {
    let email = $(this).val().trim();

    if (email === '') {
      $('#emailError').text('');
    } else if (!isValidEmail(email)) {
      $('#emailError').text('Enter a valid email address');
    } else {
      $('#emailError').text('');
    }
  });

});
</script>
