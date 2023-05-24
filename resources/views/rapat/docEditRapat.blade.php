{{-- upload --}}
<h5 class="ml-md-2 mt-4" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">Upload Dokumen Kegiatan <i class="fas fa-caret-down"></i></h5>

<div class="collapse" id="collapseExample1">
    <div class="form-group col mt-3">
        <label>Dokumen 1</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input @error('docx1') is-invalid @enderror" id="customFile1" name="docx1">
                <label class="custom-file-label" for="customFile1">Choose file</label>
            </div>
        </div>
        <small class="ml-2 form-text text-muted">File Type : pdf, doc, docx, xlsx, xls, csv | Max: 5 Mb</small>
        @error('docx1')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group col mt-3">
        <label>Dokumen 2</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input @error('docx2') is-invalid @enderror" id="customFile2" name="docx2">
                <label class="custom-file-label" for="customFile2">Choose file</label>
            </div>
        </div>
        <small class="ml-2 form-text text-muted">File Type : pdf, doc, docx, xlsx, xls, csv | Max: 5 Mb</small>
        @error('docx2')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group col mt-3">
        <label>Dokumen 3</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input @error('docx3') is-invalid @enderror" id="customFile3" name="docx3">
                <label class="custom-file-label" for="customFile3">Choose file</label>
            </div>
        </div>
        <small class="ml-2 form-text text-muted">File Type : pdf, doc, docx, xlsx, xls, csv | Max: 5 Mb</small>
        @error('docx3')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group col mt-3">
        <labe>Dokumen 4</labe>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input @error('docx4') is-invalid @enderror" id="customFile4" name="docx4">
                <label class="custom-file-label" for="customFile4">Choose file</label>
            </div>
        </div>
        <small class="ml-2 form-text text-muted">File Type : pdf, doc, docx, xlsx, xls, csv | Max: 5 Mb</small>
        @error('docx4')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="form-group col mt-3">
        <label>Dokumen 5</label>
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input @error('docx5') is-invalid @enderror" id="customFile5" name="docx5">
                <label class="custom-file-label" for="customFile5">Choose file</label>
            </div>
        </div>
        <small class="ml-2 form-text text-muted">File Type : pdf, doc, docx, xlsx, xls, csv | Max: 5 Mb</small>
        @error('docx5')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

{{-- lihat atau hapus --}}
<h5 class="ml-md-2 mt-4" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Lihat Atau Hapus Dokumen <i class="fas fa-caret-down"></i></h5>

<div class="collapse" id="collapseExample">
    @if ($getHarmonisasi->doc_rapat->docx1 == null && $getHarmonisasi->doc_rapat->docx2 == null && $getHarmonisasi->doc_rapat->docx3 == null && $getHarmonisasi->doc_rapat->docx4 == null && $getHarmonisasi->doc_rapat->docx5 == null)
        <div class="form-group col mt-4">
            <label class="badge badge-danger">Belum Ada Dokumen</label>
        </div>
    @endif

    @if ($getHarmonisasi->doc_rapat->docx1)
        <div class="form-group col mt-3">
            <label for="docx1">Surat Permohonan dan Urgensi dan Pokok Pikiran</label>
            <br>
            <a target="_blank" class="badge badge-info mr-3" href="{{ asset('storage') }}/{{ $getHarmonisasi->doc_rapat->docx1 }}" style="cursor: pointer;"><i class="fas fa-download"></i> Lihat Dokumen</a>
            <a class="badge badge-danger mt-2" href="/1/rapat/{{ $getHarmonisasi->judul }}" style="cursor: pointer;"><i class="fas fa-trash"></i> Hapus Dokumen</a>
        </div>
    @endif

    @if ($getHarmonisasi->doc_rapat->docx2)
        <div class="form-group col mt-4">
            <label>Na</label>
            <br>
            <a target="_blank" class="badge badge-info mr-3" href="{{ asset('storage') }}/{{ $getHarmonisasi->doc_rapat->docx2 }}" style="cursor: pointer;"><i class="fas fa-download"></i> Lihat Dokumen</a>
            <a class="badge badge-danger mt-2" href="/2/rapat/{{ $getHarmonisasi->judul }}" style="cursor: pointer;"><i class="fas fa-trash"></i> Hapus Dokumen</a>
        </div>
    @endif


    @if ($getHarmonisasi->doc_rapat->docx3)
        <div class="form-group col mt-4">
            <label>SK</label>
            <br>
            <a target="_blank" class="badge badge-info mr-3" href="{{ asset('storage') }}/{{ $getHarmonisasi->doc_rapat->docx3 }}" style="cursor: pointer;"><i class="fas fa-download"></i> Lihat Dokumen</a>
            <a class="badge badge-danger mt-2" href="/3/rapat/{{ $getHarmonisasi->judul }}" style="cursor: pointer;"><i class="fas fa-trash"></i> Hapus Dokumen</a>
        </div>
    @endif

    @if ($getHarmonisasi->doc_rapat->docx4)
        <div class="form-group col mt-4">
            <label>Draft RPERDA PEMDA</label>
            <br>
            <a target="_blank" class="badge badge-info mr-3" href="{{ asset('storage') }}/{{ $getHarmonisasi->doc_rapat->docx4 }}" style="cursor: pointer;"><i class="fas fa-download"></i> Lihat Dokumen</a>
            <a class="badge badge-danger mt-2" href="/4/rapat/{{ $getHarmonisasi->judul }}" style="cursor: pointer;"><i class="fas fa-trash"></i> Hapus Dokumen</a>
        </div>
    @endif

    @if ($getHarmonisasi->doc_rapat->docx5)
        <div class="form-group col mt-4">
            <label>Dokumen Lain Yang Di Persyarakatkan</label>
            <br>
            <a target="_blank" class="badge badge-info mr-3" href="{{ asset('storage') }}/{{ $getHarmonisasi->doc_rapat->docx5 }}" style="cursor: pointer;"><i class="fas fa-download"></i> Lihat Dokumen</a>
            <a class="badge badge-danger mt-2" href="/5/rapat/{{ $getHarmonisasi->judul }}" style="cursor: pointer;"><i class="fas fa-trash"></i> Hapus Dokumen</a>
        </div>
    @endif
</div>