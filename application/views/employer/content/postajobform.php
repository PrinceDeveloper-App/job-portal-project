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
if(isset($registerdata) && count($registerdata) > 0){
    foreach($registerdata as $r_data){
        $r_email = $r_data['email'];
    }
}
 ?>
<div class="employer-hero">
    <div class="container">
        <div class="employer-hero-content">
            <div>
                <span class="company-pill">Post Your Job</span>
                <h1>Create a new job</h1>
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
                    <form class="post-job-form" id="post-job-form" method="post" action="<?php echo base_url() ?>employer/JobManagement/save">
                        <div class="form-section">
                            <h4>Company Details</h4>
                            <div class="form-grid two-col">
                                <label class="form-field">
                                    <span>Company Name *</span>
                                    <input
                                        type="text"
                                        name="companyname"
                                        value="<?php if (isset($name)) echo $name;  ?>"
                                        placeholder="Company Name" required />
                                </label>
                                <label class="form-field">
                                    <span>Contact Email *</span>
                                    <input type="text" name="email" value="<?php if (isset($r_email)) echo $r_email;  ?>" placeholder="Contact Email" required />
                                </label>
                                <label class="form-field">
                                    <span>Whatsapp Number *</span>
                                    <input type="text" name="whatsapp" placeholder="Whatsapp Number" required />
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
                                        placeholder="e.g. Senior Product Designer" required />
                                </label>
                                <label class="form-field">
                                    <span>Job Category *</span>
                                    <select name="jobcategory">
                                        <?php foreach ($categories as $cat) { ?>
                                            <option><?php echo $cat['jb_category_name'] ?></option>
                                        <?php } ?>
                                    </select>

                                </label>
                            </div>
                            <label class="form-field">
                                <span>Description *</span>
                                <textarea
                                    rows="4"
                                    name="description"
                                    placeholder="Describe the details for this job..." required></textarea>
                            </label>
                            <label class="form-field">
                                <span>Requirements *</span>
                                <textarea
                                    rows="4"
                                    name="requirements"
                                    placeholder="Describe the requirements for this job..." required></textarea>
                            </label>
                            <label class="form-field">
                                <span>Location</span>
                                <input type="text" name="job_location" id="mscategory" placeholder="Eg: Alberta,Banff" data-error="select a location" autocomplete="off" required />

                            </label>
                            <div class="form-grid two-col">


                                <label class="form-field">
                                    <span>Salary *</span>
                                    <input type="text" name="salary" placeholder="Salary In CAD" required />
                                </label>

                                <label class="form-field">
                                    <span>Job Type *</span>
                                    <select name="job_type">
                                        <option>Full Time</option>
                                        <option>Part Time</option>
                                        <option>Contract</option>
                                        <option>Freelance</option>
                                    </select>
                                </label>
                            </div>
                        </div>

                        <div class="form-section">
                            <h4>Posting Controls</h4>
                            <label class="form-field">
                                <span>Select countries to post job</span>
                                <div class="select-grid">
                                    <label class="grid-item">
                                        <input type="checkbox" name="countries[]" value="Morocco">
                                        Morocco
                                    </label>

                                    <label class="grid-item">
                                        <input type="checkbox" name="countries[]" value="Tunisia">
                                        Tunisia
                                    </label>

                                    <label class="grid-item">
                                        <input type="checkbox" name="countries[]" value="Ivory Coast">
                                        Ivory Coast
                                    </label>

                                    <label class="grid-item">
                                        <input type="checkbox" name="countries[]" value="Cameroon">
                                        Cameroon
                                    </label>

                                    <label class="grid-item">
                                        <input type="checkbox" name="countries[]" value="Mauritius">
                                        Mauritius
                                    </label>
                                </div>
                            </label>
                            <div class="form-grid three-col">
                                <label class="form-field">
                                    <span>Enable Quick Apply</span>
                                    <select name="quickapply">
                                        <option>Yes</option>
                                        <option>No</option>
                                    </select>
                                </label>
                                <label class="form-field">
                                    <span>Enable WhatsApp Apply</span>
                                    <select name="whatsapp_apply">
                                        <option>Yes</option>
                                        <option>No</option>
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