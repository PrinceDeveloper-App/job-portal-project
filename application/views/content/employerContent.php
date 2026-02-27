<!-- Company Hero -->
<style>
    .company-hero-cover {
        position: relative;
        width: 100%;
        min-height: auto;
        background: linear-gradient(180deg,
                #4AA3CF 0%,
                #8ED1F0 100%);
        display: flex;
        align-items: center;
        padding: 0 8%;
        overflow: hidden;
        justify-content: center;
        text-align: center;
    }

    /* Dark / gradient overlay for text readability */
    /* .hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(
        90deg,
        rgba(0, 0, 0, 0.55) 0%,
        rgba(0, 0, 0, 0.15) 60%,
        rgba(0, 0, 0, 0.05) 100%
    );
    z-index: 1;
} */

    .hero-content {
        position: absolute;
        top: 40px;
        z-index: 2;
        max-width: 640px;
        color: #ffffff;
    }

    .hero-content h1 {
        font-size: 44px;
        font-weight: 700;
        margin-bottom: 12px;
        line-height: 1.2;
    }

    .hero-content p {
        font-size: 18px;
        line-height: 1.6;
        opacity: 0.95;
    }

    @media (max-width: 767px) {
        .company-hero-cover {
            min-height: auto;
            /* 🔑 prevents overlap */
            padding-bottom: 32px;
        }

        .hero-content {
            padding: 0px 20px 0;
            max-width: 100%;
        }

        .hero-content h1 {
            font-size: 28px;
            line-height: 1.3;
            word-break: break-word;
        }

        .hero-content p {
            font-size: 16px;
        }
    }

    @media (max-width: 767px) {
        .company-hero .container {
            margin-top: -60px;
        }
    }

    p {
        text-align: justify;
        text-justify: inter-word;
        text-align-last: left;
        word-spacing: 0.08em;
        text-rendering: optimizeLegibility;
        hyphens: auto;
        color: #000;
    }

    ul.orderlist li {
        display: flex;
        align-items: flex-start;
        margin-bottom: 15px;
        gap: 5px;
        line-height: 20px;
    }

    ul.orderlistcross li::before {
        content: '\f00d';
        /* fa-times (cross) */
        font-family: 'FontAwesome';
        display: inline-block;
        margin-right: 10px;
        color: #dc2626;
        /* red */
    }

    ul.orderlistcross {
        list-style: none;
        margin-top: 30px;
    }

    ul.orderlistcross li {
        display: flex;
        align-items: flex-start;
        margin-bottom: 15px;
        gap: 5px;
        line-height: 20px;
    }

    ul.orderlistcross li {
        float: left;
        width: 48%;
        margin-bottom: 12px;
        color: #333;
        font-size: 16px;
    }

    @media (max-width: 991px) {
        .company-hero {
            padding-bottom: 0px;
        }
    }

    ul.orderlist {
        list-style: none;
        margin-top: 15px;
    }

    .textrow {
        padding-top: 50px;
    }
</style>
<section class="company-hero">
    <div
        class="company-hero-cover"
        style="">
        <div class="hero-overlay"></div>

        <div class="hero-content">
            <h1>Built for Canadian Employers Hiring Francophone Talent.</h1>
            <!-- <p>
                FrancoBridge is a Canadian-owned platform designed exclusively for Canadian
                employers and regulated immigration professionals acting on their behalf who
                are seeking a direct, transparent, and ethical way to connect with Francophone
                talent overseas.
            </p> -->
        </div>
    </div>
    <div class="container">

        <div class="company-hero-wrapper wraper-01">
            <div class="company-hero-meta">

                <div>
                    <p style="font-size: 18px;font-weight: 500; text-align:center;text-align-last: unset;">FrancoBridge is a Canadian-owned platform designed exclusively for
                        Canadian employers and regulated immigration professionals acting on
                        their behalf who are seeking a direct, transparent, and ethical way to
                        connect with Francophone talent overseas. Our platform removes unnecessary intermediaries and gives employers
                        full control of the hiring process from job posting to direct engagement
                        with candidates.</p>
                </div>
            </div>

        </div>

    </div>
</section>

<section class="company-profile">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <section class="company-detail-section" style="overflow: hidden;margin-bottom: 20px;">
                    <h2>Who Can Use FrancoBridge</h2>
                    <p style="font-weight: 600;">
                        FrancoBridge is available to eligible Canadian entities, including:

                    </p>
                    <ul class="orderlist" style="">
                        <li>Canadian corporations</li>
                        <li>Small and medium-sized businesses</li>
                        <li>Franchise owners</li>
                        <li>Sole proprietors and partnerships</li>
                        <li>Non-profit organizations</li>
                        <li>Regulated Canadian Immigration Consultants (RCICs) acting on behalf of Canadian employers</li>

                    </ul>
                    <p>Immigration consultants are a key part of the FrancoBridge ecosystem and may use the platform to publish job opportunities and manage postings on behalf of their employer clients, with proper authorization.</p>
                    <p style="font-weight: 600;">FrancoBridge is not intended for:</p>
                    <ul class="orderlistcross">
                        <li>Job seekers or candidates</li>
                        <li>Unregulated third parties acting without employer authorization</li>
                    </ul>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                </section>
            </div>
            <div class="col-md-6">
                <section class="company-detail-section">
                    <h2>Business Verification</h2>
                    <p>
                        To maintain platform integrity and support ethical hiring practices, FrancoBridge may request additional information to verify business legitimacy.

                    </p>
                    <p style="font-weight: 600;">Verification may include:</p>

                    <ul class="orderlist">
                        <li>Business registration or incorporation documents</li>
                        <li>Proof of Canadian business address</li>
                        <li>Basic business identification details</li>



                    </ul>
                    <p style="clear: both; font-weight: 600;">
                        Verification is conducted only when necessary and is intended to:
                    </p>
                    <ul class="orderlist">
                        <li>Protect employers and candidates</li>
                        <li>Prevent misuse of the platform</li>
                        <li>Support fair, transparent, and compliant hiring</li>



                    </ul>
                    <p style="clear: both;">FrancoBridge does not conduct audits or background investigations but may take reasonable steps to confirm business authenticity.</p>
                </section>
            </div>
        </div>
    </div>

    <!-- Text -->
    <div class="textrow">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <section class="company-detail-section">
                        <h2>Employer Eligibility</h2>
                        <p>
                            To use FrancoBridge, employers must meet the following eligibility requirements:

                        </p>

                        <ul class="orderlist" style="">
                            <li>Be legally registered and actively operating in Canada</li>
                            <li>Maintain a valid Canadian business address</li>
                            <li>Be authorized to hire employees in Canada</li>
                            <li>Post genuine, lawful employment opportunities</li>
                            <li>Comply with applicable Canadian employment standards and regulations</li>



                        </ul>
                        <p style="clear: both;">
                            FrancoBridge reserves the right to restrict, suspend, or terminate access if eligibility requirements are not met.
                        </p>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <!-- Text -->
    <div class="textrow">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <section class="company-detail-section" style="overflow: hidden;margin-bottom: 20px;">
                        <h2>Direct Hiring Benefits</h2>
                        <p>FrancoBridge is built around a direct hiring model that benefits employers, immigration professionals, and workers alike.</p>
                        <p style="font-weight: 600;">
                            By using FrancoBridge, employers benefit from:

                        </p>
                        <ul class="orderlist" style="">
                            <li>Direct communication with candidates</li>
                            <li>No recruitment or placement fees</li>
                            <li>Equal visibility across all supported Francophone countries</li>
                            <li>Reduced cost, risk, and reliance on intermediaries</li>
                            <li>A transparent and ethical approach to overseas hiring</li>


                        </ul>
                        <p style="clear: both;">Every job posting is treated equally — no priority placement, no preferential ranking.</p>
                        <p style="font-weight: 600;">One job. Five countries. No recruiters in between.</p>

                    </section>
                </div>
                <div class="col-md-6">
                    <section class="company-detail-section" style="padding-bottom: 65px;">
                        <h2>Employer Responsibilities</h2>

                        <p style="font-weight: 600;">Employers using FrancoBridge are responsible for:</p>

                        <ul class="orderlist">
                            <li>Posting accurate, complete, and truthful job information</li>
                            <li>Communicating directly and professionally with candidates</li>
                            <li>Conducting interviews and assessments independently</li>
                            <li>Making all hiring decisions without platform involvement</li>
                            <li>Complying with Canadian employment laws and standards</li>
                            <li>Respecting applicable international hiring practices</li>
                        </ul>
                        <p>
                            FrancoBridge does not participate in hiring decisions and does not create, manage, or influence employment relationships. </p>

                        <p>All employment agreements and outcomes are solely between the employer and the candidate.</p>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <div class="textrow">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="dashboard-page-header">
                        <div>
                            <h1>Ready to Hire Francophone Talent Directly?</h1>
                            <p>
                                Create an employer account and start publishing job opportunities<br> across five Francophone markets with a single submission.
                            </p>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <a href="<?php echo base_url() ?>sign-in" class="btn btn-outline-primary">
                                Create Employer Account</a>
                            <a href="<?php echo base_url() ?>pricing-plans" class="btn btn-primary">
                                View Pricing</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>