<form class="auth-form">
    <div class="mb-3">
        <label for="loginEmail" class="form-label">Email address</label>
        <input
            type="email"
            class="form-control"
            id="loginEmail"
            placeholder="Email" />
            <?php if(isset($plan_id)){ ?>
            <input type="hidden" class="form-control" id="planid" value="<?= $plan_id; ?>" />
            <?php } ?>
    </div>
    <div class="mb-3">
        <div
            class="d-flex justify-content-between align-items-center">
            <label for="loginPassword" class="form-label">Password</label>
            <a href="#." class="auth-link">Forgot password?</a>
        </div>
        <input
            type="password"
            class="form-control"
            id="loginPassword"
            placeholder="********" />
    </div>
    <div class="form-check mb-4">
        <small id="logn_err" class="error"></small>
    </div>

    <button type="submit" id="signinSubmit" class="btn btn-primary w-100">
        Sign In
    </button>
</form>