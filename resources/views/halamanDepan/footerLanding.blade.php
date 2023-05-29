{{-- template script --}}
<script src="{{ asset('template') }}/plugins/jquery/jquery.min.js"></script>
<script src="{{ asset('template') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('template') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('template') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="{{ asset('template') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="{{ asset('template') }}/dist/js/adminlte.js"></script>
{{-- swipe --}}
<script src="{{ asset('template') }}/swipeJS/swiper-bundle.min.js"></script>
{{-- datatables --}}
<script src="{{ asset('template') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('template') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('template') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('template') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('template') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('template') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
{{-- chart --}}
<script src="{{ asset('template') }}/plugins/chart.js/Chart.min.js"></script>
{{-- calender --}}
<script type="text/javascript" src="{{ asset('template') }}/source/jsCalendar.js"></script>
{{-- my script --}}
<script>
    $(function () {
        $(".dataTable").DataTable();

        // back to top
        $(window).scroll(function() {
            if ($(this).scrollTop() > 20) {
            $('#toTopBtn').fadeIn();
            } else {
            $('#toTopBtn').fadeOut();
            }
        });

        $('#toTopBtn').click(function() {
            $("html, body").animate({
            scrollTop: 0
            }, 1000);
            return false;
        });
    });

    const swiper = new Swiper('.swiper', {
        loop: true,
        autoplay: {
            delay: 8000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
    });

    // chart
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
            data : {
                datasets: [{
                    data: [{{ $totalPengajuan }}, {{ $totalAdministrasi }}, {{ $totalRapat }}, {{ $totalPenyampaian }}],
                    backgroundColor: [
                        'rgb(23,162,184)',
                        'rgb(108,117,125)',
                        'rgb(220,53,69)',
                        'rgb(40,167,69)'
                    ],
                }],

                labels: [
                    'Pengajuan',
                    'Administrasi',
                    'Rapat',
                    'Penyampaian'
                ]
            },
        options: {}
    });
</script>
</body>
</html>