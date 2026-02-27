<script type="text/javascript">
    $('#profileUpdate').click(function(event) {
        event.preventDefault();
        var email = $("#email").val();
        var registerID = $("#registerID").val();
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
        } else {
            $.ajax({
                url: '<?php echo site_url('employer/Profile/update'); ?>',
                method: 'POST',
                data: {
                    email: email,
                    registerID: registerID,
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
                    $(".profileUpdate").text("Wait...");
                },
                success: function(data) {
                    console.log(data);
                    if (data == "success") {

                        // 1️⃣ Scroll to settings header
                        $('html, body').animate({
                            scrollTop: $('#settingsHeader').offset().top
                        }, 600);

                        // 2️⃣ Show alert info div
                        $('#updateSuccess').stop(true, true).fadeIn();

                        // 3️⃣ Fade out after 20 seconds
                        setTimeout(function() {
                            $('#updateSuccess').fadeOut();
                        }, 20000);

                        // 4️⃣ Update email & phone spans
                        $('#titleHead').text(businessname); // or your new business name
                        $('#emailSpan').text(email); // or your new email value
                        $('#phoneSpan').text(phonenumber); // or your new phone value
                        $('#address_span').text(
                            address + ', ' + city + ', ' + province + ' ' + postalcode
                        );
                        $('#type').text(businesstype); //  business type

                        $(".profileUpdate").text("Update");


                    }
                },
                error: function(result) {
                    console.log("Error : " + data);
                }
            });
        }

    });
</script>