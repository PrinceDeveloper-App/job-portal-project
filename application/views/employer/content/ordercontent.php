<?php if (isset($registerdata)) {
    foreach ($registerdata as $data);
} ?>
<section class="dashboard-section">
    <div class="container">
        <div class="dashboard-layout">
            <?php include_once(VIEWPATH . "common/employerLeftMenu.php"); ?>
            <div class="dashboard-main">
                <div class="dashboard-page-header">
                    <div>
                        <h1>Payment History</h1>
                        <p>
                            All transaction details monitor here...
                        </p>
                    </div>
                    <div class="d-flex flex-wrap gap-2">
                        <a href="<?php echo base_url() ?>employer/dashboard" class="btn btn-outline-primary"><i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
                            Back To Dashboard</a>
                        <a href="<?php echo base_url() ?>employer/post-a-job" class="btn btn-primary"><i class="fa-solid fa-plus" aria-hidden="true"></i>
                            Post A Job</a>
                    </div>
                </div>
                <div class="list-card">
                    <h3>Recent Transactions</h3>
                    <div class="table-responsive">
                        <table class="table-modern">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Plan Name</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Invoice</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($orderdata) && count($orderdata) > 0) {
                                    foreach ($orderdata as $orders) {
                                        $newDate = DateTime::createFromFormat('d-m-Y', $orders['payment_date'])->format('M d, Y');
                                ?>
                                        <tr>
                                            <td><?= $newDate ?></td>
                                            <td><?= $orders['plan_name'] ?></td>
                                            <td>$<?= $orders['total_paid_amount'] ?></td>
                                            <td><span class="pill">Paid</span></td>
                                            <td>
                                                <a
                                                    href="<?= base_url('uploads/' . $orders['invoice_pdf']); ?>"
                                                    class="btn btn-outline-primary btn-sm rounded-3"
                                                    target="_blank"
                                                    rel="noopener noreferrer"
                                                    download>
                                                    <i class="fa-solid fa-download" aria-hidden="true"></i>&nbsp;<?= $orders['invoice_number'] ?></a>
                                            </td>
                                        </tr>
                                    <?php }
                                } else { ?>
                                    <tr>
                                        <td>No Orders Yet</td>
                                    </tr>
                                <?php } ?>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>