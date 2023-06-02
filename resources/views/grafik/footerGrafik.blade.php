{{-- template script --}}
<script src="{{ asset('template') }}/plugins/jquery/jquery.min.js"></script>
<script src="{{ asset('template') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('template') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('template') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="{{ asset('template') }}/dist/js/adminlte.js"></script>
<script src="{{ asset('template') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
{{-- chart --}}
<script src="{{ asset('template') }}/plugins/chart.js/Chart.min.js"></script>
{{-- alert Notification --}}
<script src="{{ asset('template') }}/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('template') }}/dist/js/demo.js"></script>

<script>
    // chart
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'bar',
            data : {
                datasets: [{
                    label: '{{ $pemrakarsaGet }}',
                    data: [{{ $Pengajuan }}, {{ $Administrasi }}, {{ $Rapat }}, {{ $Penyampaian }}],
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