<script>
    function loadJobs(page = 0) {
        //console.log(page);
        $.ajax({
            url: "<?php echo base_url('employer/JobManagement/getjobs/'); ?>" + page,
            type: "POST",
            data: {
                job_title: $('#job_title').val(),
                category: $('#category').val()
            },
            success: function(res) {
                let data = JSON.parse(res);
                $('#jobList').html(data.jobs);
                $('#pagination').html(data.pagination);
                // ✅ Scroll ONLY after pagination click
                if (scrollToJobs) {
                    $('html, body').animate({
                        scrollTop: $('#jobList').offset().top - 20
                    }, 500);

                    scrollToJobs = false; // reset
                }
            }
        });
    }
    let scrollToJobs = false;
    // Initial load
    loadJobs();

    // Filter click
    $('#filterBtn').on('click', function(e) {
        e.preventDefault();
        loadJobs();
    });

    // Pagination click (AJAX ONLY)
    $(document).on('click', '#pagination a', function(e) {
        e.preventDefault();
        scrollToJobs = true; // 🔥 only here
        let href = $(this).attr('href');
        let page = href.split('/').pop();

        loadJobs(page);
    });
</script>