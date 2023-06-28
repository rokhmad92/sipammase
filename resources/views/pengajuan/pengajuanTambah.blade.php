@extends('partviewAdmin.main')

@section('content')
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
        {{-- Tambah Pengajuan Harmonisasi --}}
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
                                            <input type="text" class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun" value="{{ auth()->user()->tahun->no }}" readonly>
                                            @error('tahun')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="pemrakarsa">PEMRAKARSA</label>
                                            <select class="form-control @error('pemrakarsa') is-invalid @enderror" id="pemrakarsa" name="pemrakarsa">
                                                @foreach ($pemrakarsa as $item)
                                                    <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('pemrakarsa')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group col-5">
                                            <label for="judul">Judul Rancangan</label>
                                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" placeholder="Judul" name="judul" autocomplete="off" value="{{ old('judul') }}">
                                            @error('judul')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="rancangan">Rancangan Harmonisasi</label>
                                            <input type="text" class="form-control" id="rancangan" name="rancangan" value="{{ $rancangan }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group col-md-5">
                                            <label for="permohonan">Tanggal Permohonan</label>
                                            <input type="date" class="form-control @error('permohonan') is-invalid @enderror" id="permohonan" name="permohonan" value="{{ old('permohonan') }}">
                                            @error('permohonan')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="status">Status Pengajuan Harmonisasi</label>
                                            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                                                @foreach ($kpengajuan as $item)
                                                    <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('status')
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
                                        <textarea class="form-control @error('keterangan') is-invalid @enderror" rows="3" placeholder="Enter ..." name="keterangan">{{ old('keterangan') }}</textarea>
                                        @error('keterangan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <h5 class="ml-md-2 mt-4">Upload Dokumen</h5>
                            {{-- dprd --}}
                            @if ($rancangan == 'RPERDA DPRD')
                                <div class="form-group col mt-3">
                                    <label>Surat Permohonan</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('docx1') is-invalid @enderror" id="customFile1" name="docx1">
                                            <label class="custom-file-label" for="customFile1">Choose file</label>
                                        </div>
                                    </div>
                                    <small class="ml-2 form-text text-muted">File Type : pdf, doc, docx, xlsx, xls, csv | Max: 5 Mb</small>
                                    @error('docx1')
                                        <div class="text-sm text-danger ml-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col mt-3">
                                    <label>Na</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('docx2') is-invalid @enderror" id="customFile2" name="docx2">
                                            <label class="custom-file-label" for="customFile2">Choose file</label>
                                        </div>
                                    </div>
                                    <small class="ml-2 form-text text-muted">File Type : pdf, doc, docx, xlsx, xls, csv | Max: 5 Mb</small>
                                    @error('docx2')
                                        <div class="text-sm text-danger ml-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col mt-3">
                                    <label>DRAFT RANPERDA</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('docx3') is-invalid @enderror" id="customFile3" name="docx3">
                                            <label class="custom-file-label" for="customFile3">Choose file</label>
                                        </div>
                                    </div>
                                    <small class="ml-2 form-text text-muted">File Type : pdf, doc, docx, xlsx, xls, csv | Max: 5 Mb</small>
                                    @error('docx3')
                                        <div class="text-sm text-danger ml-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col mt-3">
                                    <label>SK Propemperda</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('docx4') is-invalid @enderror" id="customFile4" name="docx4">
                                            <label class="custom-file-label" for="customFile4">Choose file</label>
                                        </div>
                                    </div>
                                    <small class="ml-2 form-text text-muted">File Type : pdf, doc, docx, xlsx, xls, csv | Max: 5 Mb</small>
                                    @error('docx4')
                                        <div class="text-sm text-danger ml-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            {{-- pemda --}}
                            @elseif($rancangan == 'RPERDA PEMDA')
                                <div class="form-group col mt-3">
                                    <label>Surat Permohonan</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('docx1') is-invalid @enderror" id="customFile1" name="docx1">
                                            <label class="custom-file-label" for="customFile1">Choose file</label>
                                        </div>
                                    </div>
                                    <small class="ml-2 form-text text-muted">File Type : pdf, doc, docx, xlsx, xls, csv | Max: 5 Mb</small>
                                    @error('docx1')
                                        <div class="text-sm text-danger ml-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col mt-3">
                                    <label>Na</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('docx2') is-invalid @enderror" id="customFile2" name="docx2">
                                            <label class="custom-file-label" for="customFile2">Choose file</label>
                                        </div>
                                    </div>
                                    <small class="ml-2 form-text text-muted">File Type : pdf, doc, docx, xlsx, xls, csv | Max: 5 Mb</small>
                                    @error('docx2')
                                        <div class="text-sm text-danger ml-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col mt-3">
                                    <label>SK Tim</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('docx3') is-invalid @enderror" id="customFile3" name="docx3">
                                            <label class="custom-file-label" for="customFile3">Choose file</label>
                                        </div>
                                    </div>
                                    <small class="ml-2 form-text text-muted">File Type : pdf, doc, docx, xlsx, xls, csv | Max: 5 Mb</small>
                                    @error('docx3')
                                        <div class="text-sm text-danger ml-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col mt-3">
                                    <label>DRAFT RANPERDA PDF</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('docx4') is-invalid @enderror" id="customFile4" name="docx4">
                                            <label class="custom-file-label" for="customFile4">Choose file</label>
                                        </div>
                                    </div>
                                    <small class="ml-2 form-text text-muted">File Type : pdf | Max: 5 Mb</small>
                                    @error('docx4')
                                        <div class="text-sm text-danger ml-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col mt-3">
                                    <label>DRAFT RANPERDA DOC</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('docx5') is-invalid @enderror" id="customFile5" name="docx5">
                                            <label class="custom-file-label" for="customFile5">Choose file</label>
                                        </div>
                                    </div>
                                    <small class="ml-2 form-text text-muted">File Type : doc, docx | Max: 5 Mb</small>
                                    @error('docx5')
                                        <div class="text-sm text-danger ml-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col mt-3">
                                    <label>SK Propemperda/SK Bersama jika di Luar Propemperda</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('docx6') is-invalid @enderror" id="customFile6" name="docx6">
                                            <label class="custom-file-label" for="customFile6">Choose file</label>
                                        </div>
                                    </div>
                                    <small class="ml-2 form-text text-muted">
                                        catatan: antara SK Propemperda dan SK Bersama menjadi alternatif saling menggantikan.<br>File Type : pdf, doc, docx, xlsx, xls, csv | Max: 5 Mb
                                    </small>
                                    @error('docx6')
                                        <div class="text-sm text-danger ml-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            {{-- RPERKADA --}}
                            @elseif($rancangan == 'RPERKADA')
                                <div class="form-group col mt-3">
                                    <label>Surat Permohonan</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('docx1') is-invalid @enderror" id="customFile1" name="docx1">
                                            <label class="custom-file-label" for="customFile1">Choose file</label>
                                        </div>
                                    </div>
                                    <small class="ml-2 form-text text-muted">File Type : pdf, doc, docx, xlsx, xls, csv | Max: 5 Mb</small>
                                    @error('docx1')
                                        <div class="text-sm text-danger ml-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col mt-3">
                                    <label>Penjelasan/Keterangan</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('docx2') is-invalid @enderror" id="customFile2" name="docx2">
                                            <label class="custom-file-label" for="customFile2">Choose file</label>
                                        </div>
                                    </div>
                                    <small class="ml-2 form-text text-muted">File Type : pdf, doc, docx, xlsx, xls, csv | Max: 5 Mb</small>
                                    @error('docx2')
                                        <div class="text-sm text-danger ml-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group col mt-3">
                                    <label>DRAFT RANPERKADA</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('docx3') is-invalid @enderror" id="customFile3" name="docx3">
                                            <label class="custom-file-label" for="customFile3">Choose file</label>
                                        </div>
                                    </div>
                                    <small class="ml-2 form-text text-muted">File Type : pdf, doc, docx, xlsx, xls, csv | Max: 5 Mb</small>
                                    @error('docx3')
                                        <div class="text-sm text-danger ml-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            @endif

                            <button type="submit" class="btn btn-success inline">Simpan Data</button>
                            <a href="/pengajuan" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection