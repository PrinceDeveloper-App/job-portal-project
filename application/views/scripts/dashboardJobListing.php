<script>
    function loadJobs(page = 0) {
        var register_id = $('#jobBox').data('register-id');
        //console.log(page);
        $.ajax({
            url: "<?php echo base_url('employer/Dashboard/getjobs/'); ?>" + page,
            type: "POST",
            data: {
                register_id: register_id
            },
            success: function(res) {
                let data = JSON.parse(res);
                $('#jobList').html(data.jobs);
                $('#pagination').html(data.pagination);
                // ✅ Scroll ONLY after pagination click
                if (scrollToJobs) {
                    $('html, body').animate({
                        scrollTop: $('#listCard').offset().top - 20
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