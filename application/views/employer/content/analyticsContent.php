<!-- Page Styles -->
<link href="<?php echo base_url() ?>resources/css/dashboard.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/6.6.6/css/flag-icons.min.css">
<style>
    .table-modern td {
        text-align: center;
        font-weight: 600;
    }
</style>

<?php //if (isset($data_by_jobs)) {
//foreach ($data_by_jobs as $data);
//} 
?>
<div class="employer-hero">
    <div class="container">
        <div class="employer-hero-content">
            <div>
                <h1>Job Analytics Overview</h1>
                <!-- <p>Track job postings, packages, and CV views in one place.</p> -->
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
                <?php include_once("subcontent/jobAnalytics.php") ?>

                <div class="dashboard-main">

                    <div class="current-plan-card">
                        <div class="current-plan-meta">
                            <div class="plan-icon primary">
                                <i class="fa-solid fa-percent" aria-hidden="true"></i>
                            </div>
                            <div>
                                <!-- <span class="plan-badge">Current Plan</span> -->
                                <h3>Overall Conversion</h3>
                                <p>Applicantion / Views</p>
                            </div>
                        </div>
                        <div class="current-plan-price">
                            <!-- <span class="currency">USD</span> -->
                            <strong><?= $conversion_rate ?>&nbsp;%</strong>
                        </div>
                    </div>
                    <!-- <div id="jobBox" data-register-id="<?= $data['id'] ?>" style="display:none;"></div> -->
                    <div class="list-card">
                        <h3>Engagement Details By Country</h3>
                        <div class="table-responsive">
                            <table class="table-modern">
                                <thead>
                                    <tr>
                                        <th>Country</th>
                                        <th>Views</th>
                                        <th>Quick Apply</th>
                                        <th>WhatsApp Apply</th>
                                        <th>Total Applications</th>
                                        <th>Conversion %</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($analyticsdata) && count($analyticsdata) > 0) {
                                        foreach ($analyticsdata as $a_data) {
                                            if ($a_data['total_job_views'] > 0) {
                                                $conversion_rate = round(
                                                    ($a_data['total_applicants'] / $a_data['total_job_views']) * 100,
                                                    2
                                                );
                                            } else {
                                                $conversion_rate = 0;
                                            }
                                    ?>
                                            <tr>
                                                <td style="text-align: left;">
                                                    <span class="fi fi-<?= $a_data['country_flag'] ?>" style="font-size: 16px;border-radius: 5px;"></span>&nbsp;&nbsp;
                                                    <span style="font-weight: 600;"><?= $a_data['country'] ?></span>
                                                </td>
                                                <td><?= $a_data['total_job_views'] ?></td>
                                                <td><?= $a_data['quick_apply_count'] ?></td>
                                                <td><?= $a_data['whatsapp_apply_count'] ?></td>
                                                <td>
                                                    <?= $a_data['total_applicants'] ?>
                                                </td>
                                                <td>
                                                    <?= $conversion_rate ?>&nbsp;%
                                                </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>