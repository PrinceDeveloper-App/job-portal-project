\<?php if (isset($registerdata)) {
        foreach ($registerdata as $data);
    } ?>
<section class="dashboard-section">
    <div class="container">
        <div class="dashboard-layout">
            <?php include_once(VIEWPATH . "common/employerLeftMenu.php"); ?>
            <div class="dashboard-main">
                <div class="dashboard-page-header">
                    <div>
                        <h1>Applications</h1>
                        <p>
                            All application details and resumes monitor here...
                        </p>
                    </div>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="<?php echo base_url() ?>employer/dashboard" class="btn btn-outline-primary"><i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
                            Back To Dashboard</a>
                        <a href="<?php echo base_url() ?>employer/post-a-job" class="btn btn-primary"><i class="fa-solid fa-plus" aria-hidden="true"></i>
                            Post A Job</a>
                    </div>
                </div>
                <div class="list-card">
                    <h3>Recent Applications</h3>
                    <div class="table-responsive">
                        <table class="table-modern">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Job Title</th>
                                    <th>Candidate Name</th>
                                    <th>Email</th>
                                    <th>Country</th>
                                    <th>Message</th>
                                    <th>Resume</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($applicationdata) && count($applicationdata) > 0) {
                                    foreach ($applicationdata as $apps) {
                                        $newDate = DateTime::createFromFormat('d-m-Y', $apps['created_at'])->format('M d, Y');
                                ?>
                                        <tr>
                                            <td><?= $newDate ?></td>
                                            <td><?= $apps['job_title'] ?></td>
                                            <td><?= $apps['name'] ?></td>
                                            <td><?= $apps['email'] ?></td>
                                            <td><?= $apps['country'] ?></td>
                                            <td><?= $apps['message'] ?></td>
                                            <td>
                                                <a
                                                    href="<?= base_url('uploads/resumes/' . $apps['resume']); ?>"
                                                    class="btn btn-outline-primary btn-sm rounded-3"
                                                    target="_blank"
                                                    rel="noopener noreferrer"
                                                    download>
                                                    <i class="fa-solid fa-download" aria-hidden="true"></i>&nbsp;<?= $apps['name'] ?></a>
                                            </td>
                                        </tr>
                                    <?php }
                                } else { ?>
                                    <tr>
                                        <td>No Applications Yet</td>
                                    </tr>
                                <?php } ?>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>