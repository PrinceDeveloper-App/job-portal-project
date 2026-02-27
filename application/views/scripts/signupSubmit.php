<script type="text/javascript">
    $('#signupSubmit').click(function(event) {
        event.preventDefault();
        var email = $("#email").val();
        var planid = $("#planid").val();
        //alert(planid);
        var password = $("#password").val();
        var confirmpassword = $("#confirm_password").val();
        var businessname = $("#businessName").val();
        var tradename = $("#tradeName").val();
        var phonenumber = $("#phoneNumber").val();
        var address = $("#address").val();
        var city = $("#city").val();
        var province = $("#province").val();
        var postalcode = $("#postalCode").val();
        var businesstype = $("#businessType").val();
        var registrationnumber = $("#registrationNumber").val();
        var numbers = /[0-9]/g;

        if (email == "" || !email.match(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/)) {
            $('#emailError').text('Enter a valid email address');
            $("#email").focus();
            return false;
        } else if (password.length < 8) {
            $('#passError').text('Minimum 8 characters');
            $("#password").focus();
            return false;
        } else if (password != confirmpassword) {
            $('#confirmError').text('Passwords must match');
            $("#confirm_password").focus();
            return false;
        } else {
            $.ajax({
                url: '<?php echo site_url('Auth/save'); ?>',
                method: 'POST',
                data: {
                    email: email,
                    password: password,
                    businessname: businessname,
                    tradename: tradename,
                    phonenumber: phonenumber,
                    address: address,
                    city: city,
                    province: province,
                    postalcode: postalcode,
                    businesstype: businesstype,
                    registrationnumber: registrationnumber
                },
                beforeSend: function() {
                    $(".signupSubmit").text("Wait...");
                },
                success: function(data) {
                    console.log(data);
                    if (data == "0") {
                        $("#submiterrdisp").html("Email ID Allready Registered.Please try another.").show();
                        $(".signupSubmit").text("Create Employer Account");
                    } else {
                        //window.location = "<?php //echo base_url('Auth/activation/') ?>" + data + "/" + planid;
                        window.location = "<?= base_url('Auth/activation') ?>" +
                            "?data=" + encodeURIComponent(data) +
                            "&planid=" + encodeURIComponent(planid);
                        //$('#register').html(data);


                    }
                },
                //error: function (result) { console.log("Error : "+result); }
            });
        }

    });
</script>