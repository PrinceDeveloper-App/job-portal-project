<?php foreach ($jobdata as $data) { ?>
    <div class="job-list-item">
        <div class="job-card-status">
            <span class="job-type <?php if ($data['current_status'] == "active") { ?>active<?php } else { ?>expired<?php } ?>"><?= $data['current_status'] ?></span>
        </div>
        <div class="job-list-main">
            <!-- <div class="job-list-logo">
                                    <img
                                        src="images/employers/emplogo1.jpg"
                                        alt="Multimedia Design" />
                                </div> -->
            <div class="job-list-content">
                <h4><a href="#."><?= $data['jobtitle'] ?></a></h4>
                <div class="job-list-meta">
                    <span><i class="fa fa-briefcase" aria-hidden="true"></i>
                        <?= $data['jobcategory'] ?></span>
                    <span><i class="fa fa-map-marker" aria-hidden="true"></i>
                        <?= $data['job_location'] ?></span>
                </div>
                <p class="job-list-summary">
                    <?php
                    $countryArray = json_decode($data['countrylist'], true);
                    foreach ($countryArray as $country) { ?>
                        <a href="#." class="btn btn-outline-primary btn-sm"><?= $country ?></a>
                    <?php } ?>

                </p>
            </div>
            <div class="job-list-actions">
                <a href="#." class="btn btn-outline-primary btn-sm">Edit</a>
                <a href="#." class="btn btn-outline-primary btn-sm">Disable</a>
            </div>
        </div>
        <div
            class="job-list-footer d-flex justify-content-between align-items-center flex-wrap">
            <span class="job-list-posted"><?= $data['posted_date'] ?></span>
            <!-- <span class="job-list-posted">ID: JP-2184</span> -->
        </div>
    </div>
<?php } ?>