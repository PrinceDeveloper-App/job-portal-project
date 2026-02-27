<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .invoice {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #e6e6e6;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .company {
            text-align: right;
        }

        h1 {
            margin: 0;
            font-size: 20px;
        }

        .meta,
        .items,
        .totals {
            width: 100%;
            margin-top: 18px;
            border-collapse: collapse;
        }

        .meta td {
            vertical-align: top;
            padding: 6px;
        }

        .items th,
        .items td {
            border: 1px solid #eaeaea;
            padding: 8px;
            text-align: left;
        }

        .items th {
            background: #f8f8f8;
        }

        .totals td {
            padding: 8px;
        }

        .right {
            text-align: right;
        }

        .small {
            font-size: 12px;
            color: #666;
        }

        .image-logo {
            width: 120px;
            height: 36px;
            object-fit: contain;
            image-rendering: -webkit-optimize-contrast;
        }
    </style>
</head>

<body>
    <div class="invoice">
        <div class="header">
            <div class="logo">
                <img class="img-responsive image-logo" src="<?php echo base_url(); ?>resources/images/franco-logo.png">
                <!-- Replace with <img> if you have a logo -->
                <!-- <h1>Your Company Name</h1>
                <div class="small">Street Address · City · Country</div>
                <div class="small">Phone: (000) 000-0000 · Email: info@company.com</div> -->
            </div>

            <div class="company">
                <strong>INVOICE</strong><br>
                <span class="small">Invoice #: <?php echo $invoice_no ?></span><br>
                <span class="small">Date: <?php echo $date ?></span>
            </div>
        </div>

        <table class="meta" cellpadding="0" cellspacing="0">
            <tr>
                <td style="width:50%;">
                    <strong>Bill From:</strong><br>
                    Francobridge<br>
                    10060 Jasper Ave, Tower 1, Suite 2020<br>
                    Edmonton, AB T5J 3R8<br>
                    Canada<br>
                    admin@francobridge.ca<br>
                </td>
                <td style="width:50%;">
                    <strong>Bill To:</strong><br>
                    <?php echo $businessname ?><br>
                    <?php echo $address ?><br>
                    <?php echo $email ?>
                </td>
            </tr>
        </table>

        <table class="items" cellpadding="0" cellspacing="0">
            <thead>
                <tr>
                    <th style="width:60%;">Description</th>
                    <th style="width:15%;">Qty</th>
                    <th style="width:15%;">Price</th>
                    <th style="width:10%;">Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo $jobstopost ?> Jobs to post.</td>
                    <td>1</td>
                    <td>$<?php echo $amount ?> CAD </td>
                    <td>$<?php echo $amount ?> CAD </td>
                </tr>
            </tbody>
        </table>

        <table class="totals" cellpadding="0" cellspacing="0">
            <tr>
                <td style="width:70%"></td>
                <td style="width:30%">
                    <table width="100%">
                        <tr>
                            <td>Subtotal</td>
                            <td class="right">$<?php echo $amount ?> CAD </td>
                        </tr>
                        <!-- <tr>
                            <td>TAX (5%)</td>
                            <td class="right">$4.00 CAD </td>
                        </tr>
                        <tr>
                            <td>Transaction Fee</td>
                            <td class="right">$2.62 CAD</td>
                        </tr> -->
                        <tr>
                            <td><strong>Total</strong></td>
                            <td class="right"><strong>$<?php echo $amount ?> CAD</strong></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>