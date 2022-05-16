    <script>
        $(document).ready(function() {
            get_data_status();
        });
        $(document).on('change', '#sd_status', function(e) {
            get_data_status();
        });

        $(document).on('blur', '#sd_daterangepicker', function(e) {
            get_data_status();
        });

        function get_data_status() {
            var sd_status = $('#sd_status').val();
            var sd_daterangepicker = $('#sd_daterangepicker').text();
            $.post(frompage, {
                    sd_status: sd_status,
                    filter_date: sd_daterangepicker
                },
                function(data, status) {
                    $("#getstatus").html(data);
                });
        };

        function chanage_sd_status(sd_id, c_id, r_id) {
            var r_id = r_id;
            var c_id = c_id;
            var sd_id = sd_id;
            $.post(frompage, {
                    sd_id: sd_id,
                    c_id: c_id,
                    r_id: r_id,
                },
                function(data, status) {
                    // console.log(data);
                    window.location.reload();
                });
        }
    </script>