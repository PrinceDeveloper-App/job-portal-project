<section class="packages-hero">
    <div class="container">
        <div class="packages-hero-content">
            <span class="packages-badge">Job posting plans</span>
            <h1 class="packages-hero-title">
                Choose the perfect plan for your hiring needs
            </h1>
            <p class="packages-hero-subtitle">
                Post jobs, reach top talent, and grow your team with flexible
                packages designed for businesses of all sizes.
            </p>
        </div>
    </div>
</section>

<section class="packages-section">
    <div class="container">
        <!-- <div class="pricing-toggle-wrapper mb-5">
            <div class="pricing-toggle">
                <span class="toggle-label">Billed monthly</span>
                <label class="toggle-switch">
                    <input type="checkbox" id="billingToggle" />
                    <span class="toggle-slider"></span>
                </label>
                <span class="toggle-label">Billed annually <span class="save-badge">Save 20%</span></span>
            </div>
        </div> -->

        <div class="row g-4 pricing-cards">

            <?php foreach ($planlist as $plans) { ?>
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card<?php if ($plans['design_feature_01'] == "popular") { ?> featured<?php } ?>">
                        <?php if ($plans['design_feature_01'] == "popular") { ?><div class="pricing-card-badge">Most Popular</div><?php } ?>
                        <div class="pricing-card-header">
                            <h3 class="pricing-plan-name"><?php echo $plans['plan_name'] ?></h3>
                            <p class="pricing-plan-desc">Published in five Francophone countries<br>
                                (Morocco, Tunisia, Ivory Coast, Cameroon, Mauritius)
                            </p>

                            <div class="pricing-price">
                                <span class="price-currency">$</span>
                                <span class="price-amount"><?php echo $plans['price'] ?></span>
                                <span class="price-period">CAD</span>
                            </div>
                        </div>
                        <div class="pricing-card-body">
                            <ul class="pricing-features">
                                <li>
                                    <i class="fa fa-check"></i> <span><?php echo $plans['jobs_to_post'] ?> job postings</span>
                                </li>
                                <li>
                                    <i class="fa fa-check"></i> <span><?php echo $plans['posting_duration'] ?> days visibility</span>
                                </li>
                                <li>
                                    <i class="fa fa-check"></i> <span><?php echo $plans['additional_feature_01'] ?></span>
                                </li>

                            </ul>
                        </div>
                        <?php
                        $enc = $this->encryption->encrypt((string)$plans['plan_id']);
                        $enc_id = rtrim(strtr($enc, '+/', '-_'), '='); ?>
                        <div class="pricing-card-footer">
                            <?php if (isset($loggedin)) { ?>
                                <a href="<?= base_url('pricing/checkout/' . $enc_id) ?>" class="btn btn-primary w-100">Get Started</a>
                            <?php } else { ?>
                                <a href="<?= base_url('sign-in/' . $enc_id) ?>" class="btn btn-primary w-100">Get Started</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="packages-features-section mt-5">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fa fa-shield"></i>
                        </div>
                        <h4>Secure & Reliable</h4>
                        <p>
                            Your data and transactions are protected with enterprise-grade
                            security and SSL encryption.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fa fa-clock-o"></i>
                        </div>
                        <h4>24/7 Support</h4>
                        <p>
                            Get help whenever you need it with our round-the-clock
                            customer support team.
                        </p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fa fa-refresh"></i>
                        </div>
                        <h4>Flexible Billing</h4>
                        <p>
                            Upgrade, downgrade, or cancel your plan anytime. No long-term
                            contracts required.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>