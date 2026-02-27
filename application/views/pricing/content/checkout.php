<link rel="stylesheet" href="<?php echo base_url() ?>resources/css/checkout.css">
<style>
    #card-element {
        background: #fff;
        padding: 12px 14px;
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        margin-bottom: 10px;
    }

    #card-element.StripeElement--focus {
        border-color: #6772e5;
        box-shadow: 0 0 5px rgba(103, 114, 229, 0.5);
    }

    #card-element.StripeElement--invalid {
        border-color: #e53e3e;
    }

    #card-element.StripeElement--complete {
        border-color: #38a169;
    }
</style>
<?php if (isset($plandetails) && count($plandetails) > 0) {
    foreach ($plandetails as $plan) {
        $planid = $plan['plan_id'];
        $planname = $plan['plan_name'];
        $price = $plan['price'];
        $jobs_to_post = $plan['jobs_to_post'];
        $posting_duration = $plan['posting_duration'];
    }
}
if (isset($registerdata) && count($registerdata) > 0) {
    foreach ($registerdata as $r_data) {
        $email_id = $r_data['email'];
    }
}
if (isset($packData) && count($packData) > 0) {
    foreach ($packData as $data) {
        $plan_status = $data['plan_status'];
        $currentjobpostcount = $data['remaining_jobs_to_post'];
    }
}
?>


<!-- Contact Content -->
<section class="contact-content">
    <div class="container">
        <form class="contact-form-modern needs-validation" id="form-4" novalidate>
            <div class="row g-4 g-lg-5 align-items-start">
                <?php if ($plan_status == "active") { ?>
                    <div class="alert-stack">
                        <div class="alert alert-warning" style="text-align: center;">
                            Dear customer, You already have an active package, <a href="#">click here</a> for more details.
                        </div>
                    </div>
                <?php } ?>
                <div class="col-lg-7">
                    <div class="contact-card form-card">

                        <p class="contact-card-copy">
                            <img class="payment-logo" src="<?php echo base_url(); ?>resources/images/stripe-badge-transparent.png" style="position: relative; height: auto;" alt="">
                        </p>
                        <!-- <div class="payment-tab-trigger">

                        <img class="payment-logo" src="<?php echo base_url(); ?>resources/images/stripe-badge-transparent.png" style="top: 0px;height: 100px;" alt="">
                    </div> -->

                        <div class="payment margin-top-30">
                            <div class="payment-tab  payment-tab-active">

                                <div class="payment-tab-content" style="padding-top: 5px;margin-top: 25px;">
                                    <div class="form-row">
                                        <label class="form-label" for="card-element">Credit/Debit Card Details</label>
                                        <div id="card-element"></div>
                                    </div>

                                    <input type="hidden" id="payment_method" name="payment_method">
                                    <input type="hidden" name="registerid" value="<?php if (isset($registerid)) {
                                                                                        echo $registerid;
                                                                                    } ?>">
                                    <input type="hidden" name="planid" value="<?php if (isset($planid)) {
                                                                                    echo $planid;
                                                                                } ?>">
                                    <input type="hidden" name="planname" value="<?php if (isset($planname)) {
                                                                                    echo $planname;
                                                                                } ?>">
                                    <input type="hidden" name="jobstopost" value="<?php if (isset($jobs_to_post)) {
                                                                                        echo $jobs_to_post;
                                                                                    } ?>">
                                    <input type="hidden" name="postingduration" value="<?php if (isset($posting_duration)) {
                                                                                            echo $posting_duration;
                                                                                        } ?>">
                                    <input type="hidden" name="price" value="<?php if (isset($price)) {
                                                                                    echo $price;
                                                                                } ?>">
                                    <input type="hidden" name="email" value="<?php if (isset($email_id)) {
                                                                                    echo $email_id;
                                                                                } ?>">
                                    <input type="hidden" name="currentjobpostcount" value="<?php if (isset($currentjobpostcount)) {
                                                                                    echo $currentjobpostcount;
                                                                                } ?>">
                                    <div id="payment-errors" style="color:red;"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-5">
                    <aside class="contact-card">

                        <div class="checkout-wrapper">

                            <div class="checkout-card">
                                <h2>Complete your payment</h2>

                                <div class="plan-box">
                                    <div>
                                        <strong>Pricing Plan</strong>
                                        <p><?= $planname ?></p>
                                    </div>
                                    <div class="price">$ <?= $price ?></div>
                                </div>

                                <div class="summary">
                                    <div class="item">
                                        <span>Jobs To Post</span>
                                        <span><?= $jobs_to_post ?></span>
                                    </div>
                                    <div class="item">
                                        <span>Subtotal</span>
                                        <span>$ <?= $price ?></span>
                                    </div>
                                    <!-- <div class="item">
                                    <span>Tax</span>
                                    <span>$2.50</span>
                                </div> -->
                                    <div class="item total">
                                        <span>Total</span>
                                        <span>$ <?= $price ?></span>
                                    </div>
                                </div>

                                <button type="submit" class="pay-btn" onclick="onConfirm()">
                                    Pay $ <?= $price ?>
                                </button>

                                <p class="secure-text">
                                    🔒 Secure payment powered by Stripe
                                </p>
                            </div>

                        </div>
                    </aside>
                </div>
            </div>
        </form>
    </div>
</section>