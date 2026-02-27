<aside class="dashboard-sidebar employer-sidebar">
    <div class="sidebar-header">
        <h2><?php if (isset($name)) echo $name;  ?></h2>
        <p><?php if (isset($email)) echo $email;  ?></p>
        <!-- <span class="company-pill">Premium Employer</span> -->
    </div>
    <ul class="dashboard-nav">
        <li class="<?php if (isset($pageid) && $pageid == "dashboard") { ?>active<?php } ?>">
            <a href="<?php echo base_url() ?>employer/dashboard"><i class="fa-solid fa-gauge"></i> Dashboard</a>
        </li>
        
        <li class="<?php if (isset($pageid) && $pageid == "postjob") { ?>active<?php } ?>">
            <a href="<?php echo base_url() ?>employer/post-a-job"><i class="fa-solid fa-plus"></i> Post a Job</a>
        </li>
        <li class="<?php if (isset($pageid) && $pageid == "jobslisting") { ?>active<?php } ?>">
            <a href="<?php echo base_url() ?>employer/jobs-listing"><i class="fa-solid fa-briefcase"></i> Active Jobs</a>
        </li>

        <li class="<?php if (isset($pageid) && $pageid == "profile") { ?>active<?php } ?>">
            <a href="<?php echo base_url() ?>employer/Profile"><i class="fa-solid fa-user-pen"></i> Edit Account Details</a>
        </li>
        
        <li class="<?php if (isset($pageid) && $pageid == "orders") { ?>active<?php } ?>">
            <a href="<?php echo base_url() ?>employer/payment-history"><i class="fa-solid fa-credit-card"></i> Payment History</a>
        </li>

        <li class="<?php if (isset($pageid) && $pageid == "applications") { ?>active<?php } ?>">
            <a href="<?php echo base_url() ?>candidate/applications"><i class="fa-solid fa-credit-card"></i> Applicants</a>
        </li>
        
        <li>
            <a href="<?php echo base_url() ?>logout"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
        </li>
    </ul>
</aside>