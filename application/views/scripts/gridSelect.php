<script>
$(document).ready(function () {

  $('.grid-item').on('click', function () {
    let checkbox = $(this).find('input');

    checkbox.prop('checked', !checkbox.prop('checked'));
    $(this).toggleClass('active', checkbox.prop('checked'));
  });

  $('#post-job-form').on('submit', function (e) {

    // count checked checkboxes
    let checkedCount = $('input[name="countries[]"]:checked').length;

    if (checkedCount < 1) {
      e.preventDefault(); // stop form submit
      $('#countriesError').show();
      return false;
    }

    $('#countriesError').hide();
  });

});
</script>
