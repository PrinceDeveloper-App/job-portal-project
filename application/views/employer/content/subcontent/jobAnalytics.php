<?php if (isset($jobdata)) {
    foreach ($jobdata as $job);
    if ($engagement->total_job_views > 0) {
        $conversion_rate = round(
            ($engagement->total_applicants / $engagement->total_job_views) * 100,
            2
        );
    } else {
        $conversion_rate = 0;
    }
    //$conversion_percentage = ($engagement->total_applicants / $engagement->total_job_views) * 100;
} ?>
<section class="employer-panel package-detail-panel">
    <div class="package-detail-header">
        <span class="package-header-icon"><i class="fa-solid fa-briefcase"></i></span>
        <h3><?= $job['jobtitle'] ?> -
            <span style="font-size: 16px; font-weight:400;color: #94a3b8;"><?= $job['job_location'] ?> | </span>
            <span style="font-size: 16px; font-weight:500;color: #000;"><?= $job['jobcategory'] ?></span>
        </h3>
    </div>
    <div class="package-divider"></div>
    <div class="package-detail-grid exact">
        <article class="package-detail-card exact">
            <span class="detail-icon orange"><i class="fa-solid fa-eye"></i></span>
            <span class="detail-label">Total Views</span>
            <strong><?= $engagement->total_job_views ?></strong>
        </article>
        <article class="package-detail-card exact">
            <span class="detail-icon teal"><i class="fa-solid fa-paper-plane"></i></span>
            <span class="detail-label">Quick Apply</span>
            <strong><?= $engagement->quick_apply_count ?></strong>
        </article>
        <article class="package-detail-card exact">
            <span class="detail-icon green"><i class="fa-brands fa-whatsapp"></i></span>
            <span class="detail-label">WhatsApp Apply</span>
            <strong class="quota"><?= $engagement->whatsapp_apply_count ?></strong>
        </article>
        <article class="package-detail-card exact">
            <span class="detail-icon blue"><i class="fa-solid fa-user-group"></i></span>
            <span class="detail-label">Total Applicants</span>
            <strong><?= $engagement->total_applicants ?></strong>
        </article>

    </div>
</section>