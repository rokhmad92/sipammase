<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    {{-- template style --}}
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    {{-- datatables --}}
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    {{-- alert Notif --}}
    <link rel="stylesheet" href="{{ asset('template') }}/plugins/toastr/toastr.min.css">
    {{-- my style --}}
    <link rel="icon" href="{{ asset('images') }}/logo.png" type="image/gif" sizes="30x30">
</head>
<body class="hold-transition sidebar-mini layout-fixed" style="background-color: #F4F6F9;">

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6 mt-3">
                <h1 class="m-0">{{ $title }}</h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {{-- form --}}
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group col-md-4">
                                            <label for="tahun">Tahun</label>
                                            <input type="text" class="form-control" id="tahun" value="{{ $harmonisasi->tahun->no }}" readonly>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="pemrakarsa">PEMRAKARSA</label>
                                            <input type="text" class="form-control" value="{{ $harmonisasi->pemrakarsa->nama }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group col-5">
                                            <label for="judul">Judul Rancangan</label>
                                            <input type="text" class="form-control" value="{{ $harmonisasi->judul }}" readonly>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="rancangan">Rancangan Harmonisasi</label>
                                            <input type="text" class="form-control" id="rancangan" value="{{ $harmonisasi->rancangan->nama }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group col-md-5">
                                            <label for="permohonan">Tanggal Permohonan</label>
                                            <input type="date" class="form-control" id="permohonan" value="{{ $harmonisasi->tanggal }}" readonly>
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="status">Status Pengajuan Harmonisasi</label>
                                            <input type="text" class="form-control" value="{{ $harmonisasi->kpengajuan->nama }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group col-md-5">
                                            <label>Posisi Harmonisasi</label>
                                            <input type="text" class="form-control" value="{{ $harmonisasi->padministrasi->nama }}" readonly>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Masukan Masyarakat</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input @error('masukan_masyarakat') is-invalid @enderror" id="customFile1" name="masukan_masyarakat">
                                                    <label class="custom-file-label" for="customFile1">Choose file</label>
                                                </div>
                                            </div>
                                            <small class="ml-2 form-text text-muted">File Type : pdf, doc, docx, xlsx, xls, csv | Max: 5 Mb</small>
                                            @error('masukan_masyarakat')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3 ml-1">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea class="form-control" rows="3" name="keterangan_masyarakat"></textarea>
                                    </div>
                                </div>
                            </div>

                            {{-- @include('pengajuan.docEditPengajuan') --}}

                            <div class="mt-4">
                                <button type="submit" class="btn btn-success inline">Simpan Data</button>
                                <a href="/" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>


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
{{-- alert Notification --}}
<script src="{{ asset('template') }}/plugins/toastr/toastr.min.js"></script>

{{-- my script --}}
<script>
    $(function () {
        bsCustomFileInput.init();
        $('#inputGroupFile02').on('change',function(){
            var fileName = $(this).val();
            $(this).next('.custom-file-label').html(fileName);
        })

        toastr.options.timeOut = 10000;
            @if (Session::has('failed'))
                toastr.error('{{ Session::get('failed') }}');
            @elseif(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @elseif($errors->any())
                toastr.error('Gagal Melakukan Aksi');
            @endif
    });
</script>
</body>
</html>