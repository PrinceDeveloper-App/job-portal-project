<!-- Stripe JavaScript library -->
<script src="https://js.stripe.com/v3/"></script>

<script type="text/javascript">
  //const myModal = new bootstrap.Modal(document.getElementById('confirmModal'));
var stripe = Stripe("pk_test_51SPt1WHz56QdCFhGsjKLXIZ3aHN9dKdbcYCBJCH18HTppZRjW9Ieh3tUKdgBbUEdQ5S4EFQ6tLEsYeiZReFxcl1800gJRGbrrx");
var elements = stripe.elements();

var style = {
    base: {
        color: "#32325d",
        fontSize: "16px",
        fontFamily: "'Helvetica Neue', sans-serif",
        fontSmoothing: "antialiased",
        "::placeholder": {
            color: "#a0aec0"
        },
        padding: "12px 14px"
    },
    invalid: {
        color: "#e53e3e",
        iconColor: "#e53e3e"
    }
};

var card = elements.create('card', { style: style, hidePostalCode: true });
card.mount('#card-element');

$('#form-4').on('submit', function (e) {
   
     e.preventDefault(); // stop form submit
     stripe.createPaymentMethod({
        type: 'card',
        card: card
    }).then(function(result) {

        if (result.error) {
            $("#payment-errors").text(result.error.message);
            alert("hi");
            return false;
        } else {
            $("#payment_method").val(result.paymentMethod.id);
           var dataString = $("#form-4").serialize();
           console.log(result);
        $.ajax({
                url: '<?php echo base_url('Pricing/payment'); ?>',
                type: "post",
                data: dataString,
                beforeSend: function() {
                    $(".pay-btn").text("Wait...");
                },
                success: function(data) {
                    //alert(data);
                     console.log(data);
                     if(data == "success"){
                        window.location = "<?php echo base_url('Pricing/success_message/'); ?>";
                      } else {
                         window.location = "<?php echo base_url('Pricing/fail_message/'); ?>";
                      }
                },
                //error: function (result) { console.log("Error : "+result); }
            });
             }
        });
      
  });
</script>