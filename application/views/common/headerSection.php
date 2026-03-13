<!-- Header start -->
<?php
if (isset($registerdata)) {
    foreach ($registerdata as $data) {
        $job_count = $data['remaining_jobs_to_post'];
    }
}
?>
<div class="header">
    <div class="mobile-menu-overlay"></div>
    <nav class="navbar navbar-expand-lg navbar-light main-navbar">
        <div class="container">
            <a
                href="<?php echo base_url() ?>"
                class="navbar-brand logo d-flex align-items-center">
                <img src="<?php echo base_url() ?>resources/images/franco-logo.png" alt="" />
            </a>
            <button
                class="navbar-toggler mobile-menu-toggle"
                type="button"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Nav start -->
            <div class="collapse navbar-collapse mobile-menu" id="navMain">
                <button
                    class="mobile-menu-close"
                    type="button"
                    aria-label="Close menu">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </button>
                <ul class="navbar-nav mx-auto align-items-lg-center main-menu">
                    <li class="nav-item">
                        <a class="nav-link <?php if (isset($pageid) && $pageid == "home") { ?>active<?php } ?>" href="<?php echo base_url() ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (isset($pageid) && $pageid == "about") { ?>active<?php } ?>" href="<?php echo base_url() ?>about-us">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (isset($pageid) && $pageid == "works") { ?>active<?php } ?>" href="<?php echo base_url() ?>how-it-works">How It Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (isset($pageid) && $pageid == "employer") { ?>active<?php } ?>" href="<?php echo base_url() ?>employers">Employers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (isset($pageid) && $pageid == "pricing") { ?>active<?php } ?>" href="<?php echo base_url() ?>pricing-plans">Pricing Plans </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>

                </ul>
                <div class="navbar-actions d-flex align-items-center gap-2">
                    <!-- <select id="select" class="form-control my-3">
                        <option value="fr">French</option>
                        <option value="en">English</option>
                        <option value="es">Spanish</option>
                    </select> -->
                    <!-- <a href="login.html" class="btn btn-outline-primary signin-btn">Sign in</a>
                    <a href="register.html" class="btn btn-primary register-btn">Register</a> -->
                    <?php if (isset($loggedin) && $loggedin == TRUE) { ?>
                        <?php if ($job_count == 0) { ?>
                            <a href="<?php echo base_url() ?>pricing-plans" class="btn btn-primary btn-lg w-100 mb-2 post-job-btn" style="margin-top: 8px;margin-right: 5px;padding: 8px 35px;">
                                <i class="fa-solid fa-plus"></i>
                                Post A Job</a>
                        <?php } else { ?>
                            <a href="<?php echo base_url() ?>employer/post-a-job" class="btn btn-primary btn-lg w-100 mb-2 post-job-btn" style="margin-top: 8px;margin-right: 5px;padding: 8px 35px;">
                                <i class="fa-solid fa-plus"></i>
                                Post A Job</a><?php } ?>
                        <div class="dropdown user-dropdown">
                            <button
                                class="btn btn-secondary dropdown-toggle"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img src="<?php echo base_url() ?>resources/images/user-avatar.png" alt="user-avatar" />
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li class="<?php if (isset($pageid) && $pageid == "dashboard") { ?>active<?php } ?>">
                                    <a class="dropdown-item" href="<?php echo base_url() ?>employer/dashboard">Dashboard</a>
                                </li>
                                <li class="<?php if (isset($pageid) && $pageid == "postjob") { ?>active<?php } ?>">
                                    <a class="dropdown-item" href="<?php echo base_url() ?>employer/post-a-job">Post A Job</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?php echo base_url() ?>employer/jobs-listing">Active Jobs</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?php echo base_url() ?>employer/Profile">Edit Profile</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?php echo base_url() ?>employer/payment-history">Payment History</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?php echo base_url() ?>candidate/applications">Applicants</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?php echo base_url() ?>logout">Logout</a>
                                </li>
                            </ul>
                        </div>
                    <?php } else { ?>
                        <a href="<?php echo base_url() ?>sign-in" class="btn btn-outline-primary signin-btn">Sign in</a>
                        <a href="<?php echo base_url() ?>register" class="btn btn-primary register-btn">Register</a>
                    <?php } ?>
                </div>
            </div>
            <!-- Nav end -->
        </div>
    </nav>
</div>
<!-- Header end -->