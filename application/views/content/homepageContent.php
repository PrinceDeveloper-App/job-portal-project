<section class="section howit-section">
    <div class="container">
        <div class="titleTop text-center">
            <!-- <div class="subtitle">Simple Steps</div> -->
            <h3>How FrancoBridge Works</h3>
        </div>
        <div class="row g-4 justify-content-center howit-grid">
            <div class="col-12 col-md-4">
                <div class="howit-card">
                    <div class="howit-icon">
                        <img src="<?php echo base_url() ?>resources/images/post-job-img-01.png" alt="post-your-job" width="">
                    </div>
                    <h4>1. Post Your Job</h4>
                    <p>Submit your job post from <span style="font-weight: 600;">Canada</span> </p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="howit-card">
                    <div class="howit-icon">
                        <img src="<?php echo base_url() ?>resources/images/publish-wide-01.png" alt="post-your-job" width="">
                    </div>
                    <h4>2. Publish Widely</h4>
                    <p>Your job is published across 5 Francophone countries</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="howit-card">
                    <div class="howit-icon">
                        <img src="<?php echo base_url() ?>resources/images/message-app-01.png" alt="post-your-job" width="">
                    </div>
                    <h4>3. Receive Applications</h4>
                    <p>
                        Get candidate applications directly via Email & Whatsapp
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="publish-hire-section">
    <div class="container-publish">

        <!-- LEFT CARD -->
        <div class="left-card">
            <h3 class="card-title">Countries we publish in</h3>

            <div class="countries-row">
                <div class="country-item">
                    <img src="https://flagcdn.com/w160/ma.png" alt="Morocco">
                    <span>Morocco</span>
                </div>

                <div class="country-item">
                    <img src="https://flagcdn.com/w160/tn.png" alt="Tunisia">
                    <span>Tunisia</span>
                </div>

                <div class="country-item">
                    <img src="https://flagcdn.com/w160/ci.png" alt="Ivory Coast">
                    <span>Ivory Coast</span>
                </div>

                <div class="country-item">
                    <img src="https://flagcdn.com/w160/cm.png" alt="Cameroon">
                    <span>Cameroon</span>
                </div>

                <div class="country-item">
                    <img src="https://flagcdn.com/w160/mu.png" alt="Mauritius">
                    <span>Mauritius</span>
                </div>
            </div>
        </div>

        <!-- RIGHT CONTENT -->
        <div class="right-content post-job-link">
            <h2>Ready to hire Francophone talent?</h2>
            <?php if(isset($loggedin) && $loggedin == TRUE){ ?>
            <a href="<?php echo base_url() ?>employer/post-a-job" class="btn btn-primary post-job-btn btn-lg w-100 mb-2">Post A Job</a>
            <?php } else { ?> 
                <a href="<?php echo base_url() ?>sign-in" class="btn btn-primary post-job-btn btn-lg w-100 mb-2">Post A Job</a>
                <?php } ?>

        </div>

    </div>
</section>