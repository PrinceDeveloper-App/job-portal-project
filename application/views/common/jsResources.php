<!-- Bootstrap's JavaScript -->
<script src="<?php echo base_url() ?>resources/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>resources/js/bootstrap.bundle.min.js"></script>

<!-- Owl carousel -->
<script src="<?php echo base_url() ?>resources/js/owl.carousel.js"></script>

<!-- Custom js -->
<script src="<?php echo base_url() ?>resources/js/script.js"></script>
<script src="<?php echo base_url() ?>resources/js/jquery-3.7.0.min.js"></script>
<script src="<?php echo base_url() ?>resources/js/index.js"></script>
<script src="<?php echo base_url() ?>resources/js/jquery-input-mask-phone-number.js"></script>


<link href="<?php echo base_url(); ?>resources/vendors/magicsuggest/magicsuggest-min.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>resources/vendors/magicsuggest/magicsuggest-min.js"></script>



<script>
  // select French as initial language
  $.setLanguage({attribute: "data-language", lang: "fr"});

  // on change
  $("#select").on("change", function () {
    // set the new language
    $.setLanguage({
      attribute: "data-language",
      lang: $(this).val()
    });
  });
</script><script async src="https://www.googletagmanager.com/gtag/js?id=G-1VDDWMRSTH"></script>

<!-- <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> -->

<script>
// function googleTranslateElementInit() {
//     new google.translate.TranslateElement({
//         pageLanguage: 'en',
//         includedLanguages: 'en,fr',
//         layout: google.translate.TranslateElement.InlineLayout.SIMPLE
//     }, 'google_translate_element');
// }
</script>

