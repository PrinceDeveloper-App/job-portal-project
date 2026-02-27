<script>
$(document).ready(function () {
  const $form = $('#signup');
  const $submitBtn = $('#signupSubmit');

  function checkFormValidity() {
    $submitBtn.prop('disabled', !$form[0].checkValidity());
  }

  // Listen to all input changes
  $form.on('input change', function () {
    checkFormValidity();
  });

  // Initial check (page load)
  checkFormValidity();
});
</script>