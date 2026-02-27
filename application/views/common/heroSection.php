<style>
    .hero-section {
        padding-top: 50px;
        background: radial-gradient(circle at 10% 20%, rgba(59, 130, 246, 0.12) 0%, rgba(59, 130, 246, 0) 45%), linear-gradient(135deg, #f0f9ff 0%, #fff 45%, #ffffff 100%);
    }
</style>
<!-- Hero start -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-6">
                <!-- <span class="hero-badge">Ready to Find Your Dream Job?</span> -->
                <h1 class="hero-title">
                    Bridging Francophone Talent To Canadian Opportuinities
                </h1>

                <p class="hero-copy">
                    Connect with Francophone professionals and hire directly<br>
                    without recruiters in between.
                    Built for employers <br>
                    who want a clean, simple and reliable hiring flow. </p>

                <div class="hero-actions d-flex flex-wrap align-items-center gap-3">
                    <!-- <div class="hero-stat">
                        <span class="stat-value">50k+</span>
                        <span class="stat-label">Active Jobs</span>
                    </div> -->
                    <div class="hero-links d-flex gap-3 post-job-link" style="width: 50%;">
                        <?php if (isset($loggedin) && $loggedin == TRUE) { ?>
                            <a href="<?php echo base_url() ?>employer/post-a-job" class="btn btn-primary post-job-btn btn-lg w-100 mb-2">Post A Job</a>
                        <?php } else { ?>
                            <a href="<?php echo base_url() ?>sign-in" class="btn btn-primary post-job-btn btn-lg w-100 mb-2">Post A Job</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-visual">
                    <img
                        src="<?php echo base_url() ?>resources/images/hero-image.png"
                        alt="Find a perfect job"
                        class="img-fluid hero-image" />
                    <!-- <div class="hero-floating-card">
                        <span class="card-label">Post Your Job Across 5 Countries</span>
                        <button type="button" class="btn btn-sm btn-primary">
                            Post Now
                        </button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Hero End -->