<?php
include_once(VIEWPATH . "common/resourceSection.php");
include_once(VIEWPATH . "common/headerSection.php");
include_once("content/checkout.php");
include_once(VIEWPATH . "common/footerSection.php");
include_once(VIEWPATH . "common/jsResources.php"); ?>
<script src="https://js.stripe.com/v3/"></script>
<script>
    const CONFIG = {
        BASE_URL: "<?= base_url(); ?>",
        STRIPE_PUBLIC_KEY: "<?= $stripe_publishable_key; ?>"
    };
</script>

<script src="<?= base_url('resources/js/custom/payment.js'); ?>"></script>
<?php
//include_once(VIEWPATH . "scripts/paymentSubmit.php");
include_once(VIEWPATH . "common/templateScript.php");
?>
