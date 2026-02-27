<script>
    $(document).on('change', '.job-status-toggle', function() {

        var checkbox = $(this);
        var jobId = checkbox.data('job-id');
        //var statusText = checkbox.find('.activeStatus');
        //alert(jobId);

        var newStatus = checkbox.is(':checked') ? 'active' : 'paused';

        $.ajax({
            url: "<?php echo base_url('employer/Dashboard/update_job_status'); ?>",
            type: "POST",
            dataType: "json",
            data: {
                job_id: jobId,
                current_status: newStatus
            },
            success: function(res) {
                console.log(res);
                if (res.status === 'success') {
                    if (newStatus === 'active') {
                        $("#activeStatus" +jobId)
                            .text('Active')
                            .css('color', '#22c55e');
                    } else {
                         $("#activeStatus" +jobId)
                            .text('Paused')
                            .css('color', '#b45309');
                    }
                }
            },
            error: function() {
                alert('Status update failed');
                checkbox.prop('checked', !checkbox.is(':checked'));
            }
        });
    });
</script>