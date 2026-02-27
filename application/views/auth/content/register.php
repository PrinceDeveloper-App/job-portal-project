<!-- Page Styles -->
<style>
    /* The message box is shown when the user clicks on the password field */
    .left-col {
        position: sticky;
        top: 0;
        align-self: flex-start;
        /* IMPORTANT */
    }

    .error {
        color: red;
        font-size: 12px;
    }

    @media (max-width: 767.98px) {
        .left-col {
            display: none !important;
        }
    }
</style>
<!-- Page Title start -->
<section class="auth-section auth-signup">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 left-col">
                <div class="auth-intro">
                    <span class="auth-badge">Create Account</span>
                    <h1 class="auth-title">
                        Join thousands of professionals hiring and getting hired
                    </h1>
                    <p class="auth-copy">
                        Build a profile that stands out, connect with employers, and
                        unlock tailored recommendations to accelerate your career
                        journey.
                    </p>
                    <ul class="auth-benefits">
                        <li>
                            <i class="fa-solid fa-check-circle" aria-hidden="true"></i>
                            Access curated jobs from verified companies
                        </li>
                        <li>
                            <i class="fa-solid fa-check-circle" aria-hidden="true"></i>
                            Showcase your portfolio and skill badges
                        </li>
                        <li>
                            <i class="fa-solid fa-check-circle" aria-hidden="true"></i>
                            Collaborate with hiring teams in real time
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 ms-lg-auto">
                <div class="auth-card">
                    <h3 style="text-align: center;">Create Employer Account</h3>
                    <p class="auth-subtitle" style="text-align: center;">
                        Hire Francophone talent directly through FrancoBridge.
                    </p>
                    <div class="tab-content" id="registerTabContent">
                        <div
                            class="tab-pane fade show active"
                            id="registerCandidate"
                            role="tabpanel"
                            aria-labelledby="candidate-tab">
                            <?php include_once("forms/signup.php"); ?>
                        </div>
                    </div>
                    <?php if(isset($plan_id)){ 
                        $enc = $this->encryption->encrypt((string)$plan_id);
                        $enc_id = rtrim(strtr($enc, '+/', '-_'), '='); 
                      } ?>
                    <p class="auth-switch">
                        Already have an account? <a href="<?= base_url('sign-in/' . $enc_id) ?>">Sign in</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Page Title End -->