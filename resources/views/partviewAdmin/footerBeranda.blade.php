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
{{-- swipe --}}
<script src="{{ asset('template') }}/swipeJS/swiper-bundle.min.js"></script>
{{-- datatables --}}
<script src="{{ asset('template') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('template') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('template') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('template') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('template') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('template') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('template') }}/dist/js/demo.js"></script>

{{-- my script --}}
<script>
    $(function () {
        $(".dataTable").DataTable();
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
</script>
</body>
</html>