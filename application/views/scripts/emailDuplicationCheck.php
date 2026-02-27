<script>
    $("body").on('change', '#email', function() {
        var email = $('#email').val();
        //alert(email);
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('Auth/ajax_checkduplication'); ?>",
            data: 'email=' + email,
            cache: false,
            success: function(data) {
                if (data == "1") {
                    $("#emaildup").html("Email ID Allready Registered.Please try another.").show();
                } else {
                    $("#emaildup").hide();
                }
                //alert(data);
            }
        });
    });
</script>