<style>
    .select-grid {
        width: auto;
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        gap: 12px;
        /* max-width: 500px; */
    }

    .grid-item {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px 14px;
        border: 2px solid #2563EB;
        border-radius: 6px;
        background: #fff;
        color: #2563EB;
        font-weight: 500;
        cursor: pointer;
        user-select: none;
        transition: all 0.2s ease;
    }

    /* hide checkbox */
    .grid-item input {
        display: none;
    }

    /* selected state */
    .grid-item input:checked+span,
    .grid-item.active {
        background: #2563EB;
        color: #fff;
    }

    .error {
        color: #dc3545;
        display: none;
        font-size: 14px;
        margin-top: 8px;
    }
</style>
<?php
if (isset($jobdata)) {
    foreach ($jobdata as $rowdata);
}
?>
<div class="employer-hero">
    <div class="container">
        <div class="employer-hero-content">
            <div>
                <span class="company-pill">Update Your Job</span>
                <h1>Edit job details</h1>
                <p>
                    Share role details, requirements, and perks so the right
                    candidates can find you faster.
                </p>
            </div>
            <a href="<?php echo base_url() ?>employer/dashboard" class="btn btn-outline-primary">Back to Dashboard</a>
        </div>
    </div>
</div>
<section class="dashboard-section employer-dashboard post-job-dashboard">
    <div class="container mt-4">
        <div class="dashboard-layout">
            <?php include_once(VIEWPATH . "common/employerLeftMenu.php"); ?>
            <div class="dashboard-main">
                <section class="post-job-panel">
                    <div class="panel-heading">
                        <h3>Job overview</h3>
                        <span class="panel-note">Fields marked * are required</span>
                    </div>
                    <form class="post-job-form" id="post-job-form" method="post" action="<?php echo base_url() ?>employer/JobManagement/update">
                        <div class="form-section">
                            <h4>Company Details</h4>
                            <div class="form-grid two-col">
                                <label class="form-field">
                                    <span>Company Name *</span>
                                    <input
                                        type="text"
                                        name="companyname"
                                        value="<?php echo $rowdata['companyname'] ?>"
                                        placeholder="Company Name" required />
                                </label>
                                <label class="form-field">
                                    <span>Contact Email *</span>
                                    <input type="text" name="email" value="<?php echo $rowdata['email']  ?>" placeholder="Contact Email" required />
                                    <input type="hidden" name="jobid" value="<?php echo $rowdata['job_id']  ?>">
                                </label>
                                <label class="form-field">
                                    <span>Whatsapp Number *</span>
                                    <input type="text" name="whatsapp" value="<?php echo $rowdata['whatsapp']  ?>" placeholder="Whatsapp Number" required />
                                </label>

                            </div>
                        </div>

                        <div class="form-section">
                            <h4>Job Details</h4>
                            <div class="form-grid two-col">
                                <label class="form-field">
                                    <span>Job Title *</span>
                                    <input
                                        type="text"
                                        name="jobtitle"
                                        value="<?php echo $rowdata['jobtitle']  ?>"
                                        placeholder="e.g. Senior Product Designer" required />
                                </label>
                                <label class="form-field">
                                    <span>Job Category *</span>
                                    <select name="jobcategory">
                                        <?php foreach ($categories as $cat) { ?>
                                            <option <?php if ($rowdata['jobcategory'] == $cat['jb_category_name']) { ?> selected <?php } ?>><?php echo $cat['jb_category_name'] ?></option>
                                        <?php } ?>
                                    </select>

                                </label>
                            </div>
                            <label class="form-field">
                                <span>Description *</span>
                                <textarea
                                    rows="4"
                                    name="description"
                                    placeholder="Describe the details for this job..." required><?php echo $rowdata['description']  ?></textarea>
                            </label>
                            <label class="form-field">
                                <span>Requirements *</span>
                                <textarea
                                    rows="4"
                                    name="requirements"
                                    placeholder="Describe the requirements for this job..." required><?php echo $rowdata['requirements']  ?></textarea>
                            </label>
                            <label class="form-field">
                                <span>Location</span>
                                <input type="text" name="job_location" id="mscategory" placeholder="<?php echo $rowdata['job_location'] ?>" data-error="select a location" autocomplete="off" required />

                            </label>
                            <div class="form-grid two-col">


                                <label class="form-field">
                                    <span>Salary *</span>
                                    <input type="text" name="salary" value="<?php echo $rowdata['salary']  ?>" placeholder="Salary In CAD" required />
                                </label>

                                <label class="form-field">
                                    <span>Job Type *</span>
                                    <select name="job_type">
                                        <option <?php if ($rowdata['job_type'] == "Full Time") { ?> selected <?php } ?>>Full Time</option>
                                        <option <?php if ($rowdata['job_type'] == "Part Time") { ?> selected <?php } ?>>Part Time</option>
                                        <option <?php if ($rowdata['job_type'] == "Contract") { ?> selected <?php } ?>>Contract</option>
                                        <option <?php if ($rowdata['job_type'] == "Freelance") { ?> selected <?php } ?>>Freelance</option>
                                    </select>
                                </label>
                            </div>
                        </div>

                        <div class="form-section">
                            <?php
                            //$countrylist = 
                            //$countries = $rowdata['countrylist'];
                            $countries = json_decode($rowdata['countrylist'], true);

                            if (json_last_error() !== JSON_ERROR_NONE) {
                                $countries = [];
                            }
                            // $countryArray = is_array($countrylist)
                            //     ? $countrylist
                            //     : array_map('trim', explode(',', $countrylist));
                            // // Convert to array
                            // $raw = $countryArray[0];

                            // // Remove square brackets
                            // $raw = trim($raw, '[]');
                            // $country_list = array_map('trim', explode(',', str_replace('"', '', $raw)));
                            ?>
                            <h4>Posting Controls
                            </h4>
                            <label class="form-field">
                                <span>Select countries to post job</span>
                                <div class="select-grid">
                                    <label class="grid-item <?php if (in_array('Morocco', $countries, true)) { ?>active<?php } ?>">
                                        <input type="checkbox" name="countries[]" value="Morocco" <?php if (in_array('Morocco', $countries, true)) { ?>checked<?php } ?>>
                                        Morocco
                                    </label>

                                    <label class="grid-item <?php if (in_array('Tunisia', $countries, true)) { ?>active<?php } ?>">
                                        <input type="checkbox" name="countries[]" value="Tunisia" <?php if (in_array('Tunisia', $countries, true)) { ?>checked<?php } ?>>
                                        Tunisia
                                    </label>

                                    <label class="grid-item <?php if (in_array('Ivory Coast', $countries, true)) { ?>active<?php } ?>">
                                        <input type="checkbox" name="countries[]" value="Ivory Coast" <?php if (in_array('Ivory Coast', $countries, true)) { ?>checked<?php } ?>>
                                        Ivory Coast
                                    </label>

                                    <label class="grid-item <?php if (in_array('Cameroon', $countries, true)) { ?>active<?php } ?>">
                                        <input type="checkbox" name="countries[]" value="Cameroon" <?php if (in_array('Cameroon', $countries, true)) { ?>checked<?php } ?>>
                                        Cameroon
                                    </label>

                                    <label class="grid-item <?php if (in_array('Mauritius', $countries, true)) { ?>active<?php } ?>">
                                        <input type="checkbox" name="countries[]" value="Mauritius" <?php if (in_array('Mauritius', $countries, true)) { ?>checked<?php } ?>>
                                        Mauritius
                                    </label>
                                </div>
                            </label>
                            <div class="form-grid three-col">
                                <label class="form-field">
                                    <span>Enable Quick Apply</span>
                                    <select name="quickapply">
                                        <option <?php if ($rowdata['quickapply'] == "Yes") { ?> selected <?php } ?>>Yes</option>
                                        <option <?php if ($rowdata['quickapply'] == "No") { ?> selected <?php } ?>>No</option>
                                    </select>
                                </label>
                                <label class="form-field">
                                    <span>Enable WhatsApp Apply</span>
                                    <select name="whatsapp_apply">
                                        <option <?php if ($rowdata['whatsapp_apply'] == "Yes") { ?> selected <?php } ?>>Yes</option>
                                        <option <?php if ($rowdata['whatsapp_apply'] == "No") { ?> selected <?php } ?>>No</option>
                                    </select>
                                </label>

                            </div>
                        </div>




                        <div class="error" id="countriesError">
                            Please select at least one country.
                        </div>
                        <div class="form-actions">
                            <!-- <button type="button" class="btn btn-outline-primary">
                                Save Draft
                            </button> -->
                            <button type="submit" class="btn btn-primary">
                                Publish Job
                            </button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</section>