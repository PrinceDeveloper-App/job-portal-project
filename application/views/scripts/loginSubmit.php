<script>
    $("#signinSubmit").click(function(event) {
        event.preventDefault();
        email = $("#loginEmail").val();
        password = $("#loginPassword").val();
        planid = $("#planid").val();
        if (email == "" || password == "") {
            $("#logn_err").html("Enter Email and Password").show().fadeOut(5000);
            return false;
        }
        $.ajax({
            type: "POST",
            data: {
                'email': email,
                'password': password
            },
            url: "<?php echo site_url('Auth/loginvalidation') ?>",
            async: false,
            success: function(data) {
                if (data == 1) {
                    if (planid == 0) {
                        window.location = "<?php echo base_url('employer/dashboard') ?>";
                    } else {
                        window.location = "<?= base_url('pricing/checkout/') ?>" + planid;
                    }

                } else if (data == 0) {
                    $("#logn_err").html("The account is not yet verified.Please verify through email verification link.").show().fadeOut(5000);
                } else if (data == 2) {
                    $("#logn_err").html("Your Account is suspended.").show().fadeOut(5000);
                } else {
                    $("#logn_err").html("Invalid username or password").show().fadeOut(5000);
                }
            }
            // beforeSend: function() {
            //     $("#signinSubmit").html("Wait...")
            // }
        });
        return false;
    });
</script>