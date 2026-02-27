<form class="auth-form" id="signup">
    <div class="row g-3">
        <h4>Account Information</h4>
        <div class="col-sm-12">
            <label for="candidateEmail" class="form-label">Email address*</label>
            <input
                type="email"
                class="form-control"
                name="email"
                id="email"
                placeholder="Email Address*" required />
            <small id="emailError" class="error"></small>
            <!-- <small id="emaildup" class="error"></small> -->
            <?php if (isset($plan_id)) { ?>
                <input type="hidden" class="form-control" id="planid" value="<?= $plan_id; ?>" />
            <?php } ?>
        </div>
        <div class="col-sm-6">
            <label for="candidatePassword" class="form-label">Password</label>
            <input
                type="password"
                class="form-control"
                name="password"
                id="password"
                placeholder="Password" />
            <small id="passError" class="error"></small>
        </div>
        <div class="col-sm-6">
            <label for="confirmPwd" class="form-label">Confirm Password</label>
            <input
                type="password"
                class="form-control"
                id="confirm_password"
                placeholder="Confirm Password" />
            <small id="confirmError" class="error"></small>

        </div>
        <h4>Business Information</h4>
        <div class="col-sm-12">
            <label for="businessName" class="form-label">Legal Business Name*</label>
            <input
                type="text"
                class="form-control"
                name="businessname"
                id="businessName"
                placeholder="Business Name" required />
        </div>
        <div class="col-sm-12">
            <label for="tradeName" class="form-label">Operating / Trade Name (optional)</label>
            <input
                type="text"
                class="form-control"
                name="tradename"
                id="tradeName"
                placeholder="Trade Name" />
        </div>
        <div class="col-sm-12">
            <label for="phoneNumber" class="form-label">Business Phone Number*</label>
            <input
                type="text"
                class="form-control"
                name="phoneNumber"
                id="phoneNumber"
                placeholder="Phone Number*(Format: (###) ###-####)" required />
        </div>
        <h4>Business Address (Canada)</h4>
        <div class="col-sm-6">
            <label for="address" class="form-label">Street Address*</label>
            <input
                type="text"
                class="form-control"
                name="address"
                id="address"
                placeholder="Address" required />
        </div>
        <div class="col-sm-6">
            <label for="city" class="form-label">City*</label>
            <input
                type="text"
                class="form-control"
                name="city"
                id="city"
                placeholder="City" required />
        </div>
        <div class="col-sm-6">
            <label for="province" class="form-label">Province</label>
            <select id="province" class="form-select" name="province" required="" placeholder="Province">
                <option value="">Select Province</option>
                <option value="Alberta (AB)">Alberta (AB)</option>
                <option value="British Columbia (BC)">British Columbia (BC)</option>
                <option value="Manitoba (MB)">Manitoba (MB)</option>
                <option value="New Brunswick (NB)">New Brunswick (NB)</option>
                <option value="Newfoundland and Labrador (NL)">Newfoundland and Labrador (NL)</option>
                <option value="Nova Scotia (NS)">Nova Scotia (NS)</option>
                <option value="Ontario (ON)">Ontario (ON)</option>
                <option value="Prince Edward Island (PEI)">Prince Edward Island (PEI)</option>
                <option value="Quebec (QC)">Quebec (QC)</option>
                <option value="Saskatchewan (SK)">Saskatchewan (SK)</option>
                <option value="Northwest Territories (NT)">Northwest Territories (NT)</option>
                <option value="Nunavut (NU)">Nunavut (NU)</option>
                <option value="Yukon (YT)">Yukon (YT)</option>
            </select>
        </div>
        <div class="col-sm-6">
            <label for="postalCode" class="form-label">Postal Code</label>
            <input
                type="text"
                class="form-control"
                name="postalcode"
                id="postalCode"
                placeholder="Postal Code" required />
        </div>
        <h4>Business Identification</h4>
        <div class="col-sm-6">
            <label for="businessType" class="form-label">Business Type*</label>
            <select class="form-select" name="businesstype" id="businessType" required="">
                <option value="">Select Business Type</option>
                <option value="Corporation">Corporation</option>
                <option value="Sole Proprietor">Sole Proprietor</option>
                <option value="Partnership">Partnership</option>
            </select>
        </div>
        <div class="col-sm-6">
            <label for="registrationNumber" class="form-label">Business Registration Number</label>
            <input
                type="text"
                class="form-control"
                name="registrationnumber"
                id="registrationNumber"
                placeholder="Optional but Recommended" />
        </div>
    </div>
    <div class="form-check auth-policy mt-4">
        <input
            class="form-check-input"
            type="checkbox"
            value=""
            id="confirmation" required />
        <label class="form-check-label" for="confirmation">I confirm that I am a Canadian employer authorized to hire employees in Canada.</label>
    </div>
    <div class="form-check auth-policy mt-4">
        <input
            class="form-check-input"
            type="checkbox"
            value=""
            id="candidatePolicy" required />
        <label class="form-check-label" for="candidatePolicy">I agree to the
            <a href="#." class="auth-link">Terms of use</a>,
            <a href="#." class="auth-link">Privacy Policy</a> and
            <a href="#." class="auth-link">Refund Policy</a>.</label>
    </div>
    <small id="submiterrdisp" class="error"></small>
    <button type="submit" id="signupSubmit" class="signupSubmit btn btn-primary w-100 mt-4">
        Create Employer Account
    </button>
</form>