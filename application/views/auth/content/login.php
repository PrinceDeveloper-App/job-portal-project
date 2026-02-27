<!-- Page Styles -->
<style>
    /* The message box is shown when the user clicks on the password field */

    .error {
        color: red;
        font-size: 14px;
    }

    @media (max-width: 767.98px) {
        .left-col {
            display: none !important;
        }
    }
</style>
<!-- Page Title start -->
<section class="auth-section">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 left-col">
                <div class="auth-intro">
                    <span class="auth-badge">Welcome Back</span>
                    <h1 class="auth-title">Log in to continue your job search</h1>
                    <p class="auth-copy">
                        Access personalised recommendations, manage your applications,
                        and stay ahead with instant updates from top employers.
                    </p>
                    <ul class="auth-benefits">
                        <li>
                            <i class="fa-solid fa-check-circle" aria-hidden="true"></i>
                            Track your applications in real time
                        </li>
                        <li>
                            <i class="fa-solid fa-check-circle" aria-hidden="true"></i>
                            Discover openings tailored to your skills
                        </li>
                        <li>
                            <i class="fa-solid fa-check-circle" aria-hidden="true"></i>
                            Save jobs and set alerts in one dashboard
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 ms-lg-auto">
                <div class="auth-card">
                    <h3 style="text-align: center;">Employer Sign In</h3>
                    <p class="auth-subtitle" style="text-align: center;">
                       Access your employer account.
                    </p>
                    <!-- <div class="auth-social">
                        <a href="#." class="auth-social-btn google"><i class="fa-brands fa-google" aria-hidden="true"></i> Login
                            with Google</a>
                        <a href="#." class="auth-social-btn linkedin"><i class="fa-brands fa-linkedin" aria-hidden="true"></i>
                            Login with LinkedIn</a>
                    </div>
                    <div class="auth-divider"><span>or</span></div> -->
                     <?php if(isset($plan_id)){ 
                        $enc = $this->encryption->encrypt((string)$plan_id);
                        $enc_id = rtrim(strtr($enc, '+/', '-_'), '='); 
                      } ?>
                    <?php include_once("forms/signin.php"); ?>
                    <p class="auth-switch">
                        Don't have an account? <a href="<?php echo base_url('register/' . $enc_id) ?>">Create an employer account</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Page Title End -->