<div class="row g-3 dashboard-stats">
    <div class="col-sm-4">
        <div class="stat-card" style="background: linear-gradient(135deg, #1ABC9C, #16A085);">
            <span class="stat-icon"><i class="fa-solid fa-briefcase"></i></span>
            <div>
                <span>Active Jobs</span>
                <strong><?php if (isset($total_active_jobs)) {
                            echo $total_active_jobs;
                        } ?></strong>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="stat-card" style="background: linear-gradient(135deg, #667EEA, #764BA2);">
            <span class="stat-icon"><i class="fa-solid fa-eye"></i></span>
            <div>
                <span>Total Views</span>
                <strong><?= $data['total_job_views'] ?></strong>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="stat-card" style="background: linear-gradient(135deg, #FF9A00, #FF6A00);">
            <span class="stat-icon"><i class="fa-solid fa-paper-plane" aria-hidden="true"></i></span>
            <div>
                <span>Quick Apply</span>
                <strong><?= $data['quick_apply_count'] ?></strong>
            </div>
        </div>
    </div>
</div>
<div class="row g-3 dashboard-stats">
    <div class="col-sm-4">
        <div class="stat-card" style="background: linear-gradient(135deg, #25D366, #128C7E);">
            <span class="stat-icon"><i class="fa-brands fa-whatsapp"></i></span>
            <div>
                <span>WhatsApp Apply</span>
                <strong><?= $data['whatsapp_apply_count'] ?></strong>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="stat-card" style="background: linear-gradient(135deg, #0ea5e9, #14b8a6);">
            <span class="stat-icon"><i class="fa-solid fa-user-group"></i></span>
            <div>
                <span>Total Applicants</span>
                <strong><?= $data['total_applicants'] ?></strong>
            </div>
        </div>
    </div>

</div>