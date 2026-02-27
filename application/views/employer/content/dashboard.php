<!-- Page Styles -->
<link href="<?php echo base_url() ?>resources/css/dashboard.css" rel="stylesheet" />

<?php if (isset($registerdata)) {
    foreach ($registerdata as $data);
} ?>
<div class="employer-hero">
    <div class="container">
        <div class="employer-hero-content">
            <div>
                <h1>Welcome to Employer Dashboard</h1>
                <p>Track job postings, packages, and CV views in one place.</p>
            </div>
            <div class="post-job-link">
                <a href="<?php echo base_url() ?>employer/post-a-job" class="btn btn-primary post-job-btn"><i class="fa-solid fa-plus"></i> Post a Job</a>

            </div>

        </div>
    </div>
</div>

<section class="dashboard-section employer-dashboard">
    <div class="container mt-4">
        <div class="dashboard-layout">
            <?php include_once(VIEWPATH . "common/employerLeftMenu.php"); ?>
            <div class="dashboard-main">

                <!-- Count of Active Jobs, Total Views, Quick Apply, Whatsapp Apply, Total Applicants  -->
                <?php include_once("subcontent/dashboardStatusRow.php") ?>

                <div class="dashboard-main">
                    <div class="dashboard-page-header">
                        <div>
                            <h1>Create New Job</h1>
                            <p>
                                One platform. Five countries. No recruiters in between.
                            </p>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="<?php echo base_url() ?>employer/post-a-job" class="btn btn-outline-primary"><i class="fa-solid fa-plus" aria-hidden="true"></i>
                                Post A Job</a>

                        </div>
                    </div>
                    <div id="jobBox" data-register-id="<?= $data['id'] ?>" style="display:none;"></div>
                    <div class="list-card" id="listCard">
                        <h3>Your Job Posts</h3>
                        <div class="table-responsive">
                            <table class="table-modern">
                                <thead>
                                    <tr>
                                        <th>Job Title/Location</th>
                                        <th>Status</th>
                                        <th>Modify</th>
                                        <th>Views</th>
                                        <th>Analytics</th>
                                    </tr>
                                </thead>
                                <tbody id="jobList">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="pagination"></div>
                </div>

            </div>
        </div>
    </div>
</section>