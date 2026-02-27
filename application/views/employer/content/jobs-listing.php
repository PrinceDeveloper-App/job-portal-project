<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/6.6.6/css/flag-icons.min.css">
<!-- Jobs Hero -->
<div class="employer-hero">
    <div class="container">
        <div class="employer-hero-content">
            <div>
                <span class="company-pill">Jobs Listing</span>
                <h1>Jobs Management</h1>
                <p>
                    You can manage your data here.
                </p>
            </div>
            <a href="<?php echo base_url() ?>employer/dashboard" class="btn btn-outline-primary">Back to Dashboard</a>
        </div>
    </div>
</div>
<style>
    .job-type.active {
        color: #15803d;
    }

    .job-type.expired {
        color: #b91c1c;
    }

    .link-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;

        padding: 8px 14px;
        border: 1.5px solid #2563EB;
        border-radius: 6px;

        color: #2563EB;
        font-size: 14px;
        font-weight: 500;
        text-decoration: none;

        transition: all 0.25s ease;
    }

    .link-btn .arrow {
        font-size: 16px;
        transition: transform 0.25s ease;
    }

    /* Hover effect */
    .link-btn:hover {
        background-color: #2563EB;
        color: #ffffff;
    }

    .link-btn:hover .arrow {
        transform: translateX(4px);
    }

    /* 📱 Mobile responsiveness */
    @media (max-width: 576px) {
        .link-btn {
            width: 45%;
            padding: 12px 16px;
            margin-top: 10px;
            margin-left: 5px;
            font-size: 15px;
        }
    }
</style>
<section class="jobs-board">
    <div class="container">
        <div class="row g-4">
            <?php include_once(VIEWPATH . "common/employerLeftMenu.php"); ?>
            <div class="col-lg-9">
                <div
                    class="jobs-board-header d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div style="width: 100%;">
                        <form class="hero-search">
                            <div class="hero-search-fields">
                                <label class="hero-field">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    <input
                                        type="text"
                                        class="form-control"
                                        name="keyword"
                                        id="job_title"
                                        placeholder="Enter skills or job title" />
                                </label>

                                <label class="hero-field select-field">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <select class="form-select" name="category" id="category">
                                        <option value="">Select Category</option>
                                        <?php foreach ($categories as $cat) { ?>
                                            <option><?php echo $cat['jb_category_name'] ?></option>
                                        <?php } ?>
                                    </select>
                                </label>
                                <button
                                    type="submit"
                                    class="btn hero-submit"
                                    id="filterBtn"
                                    aria-label="Search jobs">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="job-list" id="jobList">
                    <?php //include_once("subcontent/jobListBox.php"); 
                    ?>
                </div>
                <div class="jobs-pagination" id="pagination">
                    <?php //include_once("subcontent/pagination.php"); 
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>