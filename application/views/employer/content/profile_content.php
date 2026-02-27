<?php if (isset($registerdata) && count($registerdata) > 0) {
    foreach ($registerdata as $data);
} ?>
<div class="employer-hero">
    <div class="container">
        <div class="employer-hero-content">
            <div>
                <span class="company-pill">Your Profile</span>
                <h1>Update Your Profile</h1>
                <p>
                    You can edit your registration details here.
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
                <div class="settings-header" id="settingsHeader">

                    <div class="settings-header-content">
                        <div class="alert alert-info" id="updateSuccess" style="display: none;">
                            Updated! Your Registration Details Updated Successfully.
                        </div>
                        <span>Employer Profile</span>
                        <h2 id="titleHead"><?= $data['businessname'] ?></h2>
                        <!-- <p>
                            Keep your information fresh so hiring teams understand your
                            intent, availability and the type of roles you’re excited
                            about.
                        </p> -->
                        <div class="settings-header-meta">
                            <span><i class="fa-solid fa-envelope-open" aria-hidden="true"></i>
                                <strong id="emailSpan"><?= $data['email'] ?></strong></span>
                            <span><i class="fa-solid fa-phone" aria-hidden="true"></i>
                                <strong id="phoneSpan"><?= $data['phoneNumber'] ?></strong></span>
                            <span><i class="fa-solid fa-location-dot" aria-hidden="true"></i>
                                <strong id="address_span"><?= $data['address'] ?>,&nbsp;<?= $data['city'] ?>,&nbsp;<?= $data['province'] ?>,&nbsp;<?= $data['postalcode'] ?></strong></span>
                            <span><i class="fa-solid fa-briefcase" aria-hidden="true"></i>
                                <strong id="type"><?= $data['businesstype'] ?></strong></span>
                        </div>
                    </div>
                </div>
                <form class="settings-form" id="signup">
                    <div class="settings-card">
                        <div class="settings-card-header">
                            <div>
                                <p class="text-uppercase text-muted small fw-semibold mb-1">
                                    Profile
                                </p>
                                <h3>Edit Your Profile</h3>
                                <p style="color: #2563EB"><span style="color: #FF0000;">Note:</span> Updating this email will not affect your login email. This email is used to receive candidate applications and for further support from FrancoBridge.</p>
                            </div>

                        </div>
                        <div class="settings-grid">
                            <div class="grid-span-2">
                                <label for="email" class="form-label">Email*</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    name="email"
                                    value="<?= $data['email'] ?>"
                                    id="email"
                                    placeholder="Email Address*" required />
                                    <input type="hidden" value="<?= $data['id'] ?>" id="registerID">
                                <small id="emailError" class="error"></small>
                                <small id="emaildup" class="error"></small>
                            </div>
                            <div class="grid-span-2">
                                <label for="businessName" class="form-label">Business name*</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="businessname"
                                    value="<?= $data['businessname'] ?>"
                                    id="businessName"
                                    placeholder="Business Name" required />

                            </div>
                            <div class="grid-span-2">
                                <label for="tradeName" class="form-label">Operating / Trade Name (optional)</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="tradename"
                                    value="<?= $data['tradename'] ?>"
                                    id="tradeName"
                                    placeholder="Trade Name" />
                            </div>
                            <div class="grid-span-2">
                                <label for="phoneNumber" class="form-label">Phone*</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="phoneNumber"
                                    value="<?= $data['phoneNumber'] ?>"
                                    id="phoneNumber"
                                    placeholder="Phone Number*(Format: (###) ###-####)" required />
                            </div>
                            <div class="grid-span-2">
                                <label for="address" class="form-label">Street Address*</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="address"
                                    value="<?= $data['address'] ?>"
                                    id="address"
                                    placeholder="Address" required />
                            </div>
                            <div class="grid-span-2">
                                <label for="city" class="form-label">City*</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="city"
                                    value="<?= $data['city'] ?>"
                                    id="city"
                                    placeholder="City" required />
                            </div>
                            <div class="grid-span-2">
                                <label for="province" class="form-label">Province*</label>
                                <select id="province" class="form-select" name="province" required="" placeholder="Province">
                                    <option value="">Select Province</option>
                                    <option value="Alberta (AB)" <?php if ($data['province'] == "Alberta (AB)") { ?>selected<?php } ?>>Alberta (AB)</option>
                                    <option value="British Columbia (BC)" <?php if ($data['province'] == "British Columbia (BC)") { ?>selected<?php } ?>>British Columbia (BC)</option>
                                    <option value="Manitoba (MB)" <?php if ($data['province'] == "Manitoba (MB)") { ?>selected<?php } ?>>Manitoba (MB)</option>
                                    <option value="New Brunswick (NB)" <?php if ($data['province'] == "New Brunswick (NB)") { ?>selected<?php } ?>>New Brunswick (NB)</option>
                                    <option value="Newfoundland and Labrador (NL)" <?php if ($data['province'] == "Newfoundland and Labrador (NL)") { ?>selected<?php } ?>>Newfoundland and Labrador (NL)</option>
                                    <option value="Nova Scotia (NS)" <?php if ($data['province'] == "Nova Scotia (NS)") { ?>selected<?php } ?>>Nova Scotia (NS)</option>
                                    <option value="Ontario (ON)" <?php if ($data['province'] == "Ontario (ON)") { ?>selected<?php } ?>>Ontario (ON)</option>
                                    <option value="Prince Edward Island (PEI)" <?php if ($data['province'] == "Prince Edward Island (PEI)") { ?>selected<?php } ?>>Prince Edward Island (PEI)</option>
                                    <option value="Quebec (QC)" <?php if ($data['province'] == "Quebec (QC)") { ?>selected<?php } ?>>Quebec (QC)</option>
                                    <option value="Saskatchewan (SK)" <?php if ($data['province'] == "Saskatchewan (SK)") { ?>selected<?php } ?>>Saskatchewan (SK)</option>
                                    <option value="Northwest Territories (NT)" <?php if ($data['province'] == "Northwest Territories (NT)") { ?>selected<?php } ?>>Northwest Territories (NT)</option>
                                    <option value="Nunavut (NU)" <?php if ($data['province'] == "Nunavut (NU)") { ?>selected<?php } ?>>Nunavut (NU)</option>
                                    <option value="Yukon (YT)" <?php if ($data['province'] == "Yukon (YT)") { ?>selected<?php } ?>>Yukon (YT)</option>
                                </select>
                            </div>
                            <div class="grid-span-2">
                                <label for="postalCode" class="form-label">Postal Code*</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="postalcode"
                                    value="<?= $data['postalcode'] ?>"
                                    id="postalCode"
                                    placeholder="Postal Code" required />
                            </div>
                            <div class="grid-span-2">
                                <label for="businessType" class="form-label">Business Type*</label>
                                <select class="form-select" name="businesstype" id="businessType" required="">
                                    <option value="">Select Business Type</option>
                                    <option value="Corporation" <?php if ($data['businesstype'] == "Corporation") { ?>selected<?php } ?>>Corporation</option>
                                    <option value="Sole Proprietor" <?php if ($data['businesstype'] == "Sole Proprietor") { ?>selected<?php } ?>>Sole Proprietor</option>
                                    <option value="Partnership" <?php if ($data['businesstype'] == "Partnership") { ?>selected<?php } ?>>Partnership</option>
                                </select>
                            </div>
                            <div class="grid-span-2">
                                <label for="registrationNumber" class="form-label">Business Registration Number</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="registrationnumber"
                                    value="<?= $data['registrationnumber'] ?>"
                                    id="registrationNumber"
                                    placeholder="Optional but Recommended" />
                            </div>



                        </div>
                        <div class="form-actions">
                            <button type="submit" id="profileUpdate" class="profileUpdate btn btn-primary">
                                Update
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>