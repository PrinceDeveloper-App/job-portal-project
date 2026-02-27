<script>
$(document).on('click', '.delete-job-btn', function () {

    var btn   = $(this);
    var jobId = btn.data('job-id');
    var row   = $('#jobRow_' + jobId);

    if (!confirm(
        'You lost all the job data and applications if you delete this.\n\nPlease confirm before you proceed.'
    )) {
        return;
    }

    $.ajax({
        url: "<?php echo base_url('employer/Dashboard/delete_job'); ?>",
        type: "POST",
        dataType: "json",
        data: { job_id: jobId },
        success: function (res) {
            if (res.status === 'success') {
                row.fadeOut(400, function () {
                    $(this).remove();
                });
            } else {
                alert('Unable to delete job.');
            }
        },
        error: function () {
            alert('Something went wrong. Please try again.');
        }
    });
});
</script>
