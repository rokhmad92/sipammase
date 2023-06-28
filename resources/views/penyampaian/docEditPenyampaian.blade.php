{{-- Edit --}}
<h5 class="ml-md-2 mt-4" data-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample1">Edit/Upload Dokumen Harmonisasi <i class="fas fa-caret-down"></i></h5>

<div class="collapse" id="collapseExample2">
    <div class="form-group col mt-3">
        <label>Dokumen LPA/AK</label>
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
        <label>Dokumen Kegiatan</label>
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
        <label>Dokumen Penyampaian</label>
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
</div>

{{-- lihat --}}
<h5 class="ml-md-2 mt-4" data-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample">Lihat Dokumen <i class="fas fa-caret-down"></i></h5>

<div class="collapse" id="collapseExample3">
    @if ($getHarmonisasi->doc_penyampaian->docx1 == null && $getHarmonisasi->doc_rapat->docx1 == null && $getHarmonisasi->doc_administrasi->docx1 == null)
        <div class="form-group col mt-4">
            <label class="badge badge-danger">Belum Ada Dokumen</label>
        </div>
    @endif

    @if ($getHarmonisasi->doc_administrasi->docx1)
        <div class="form-group col mt-3">
            <label for="docx1">Dokumen LPA/AK</label>
            <br>
            <a target="_blank" class="badge badge-info mr-3" href="{{ asset('storage') }}/{{ $getHarmonisasi->doc_administrasi->docx1 }}" style="cursor: pointer;"><i class="fas fa-download"></i> Lihat Dokumen</a>
        </div>
    @endif

    @if ($getHarmonisasi->doc_rapat->docx1)
        <div class="form-group col mt-3">
            <label for="docx1">Dokumen Kegiatan</label>
            <br>
            <a target="_blank" class="badge badge-info mr-3" href="{{ asset('storage') }}/{{ $getHarmonisasi->doc_rapat->docx1 }}" style="cursor: pointer;"><i class="fas fa-download"></i> Lihat Dokumen</a>
        </div>
    @endif

    @if ($getHarmonisasi->doc_penyampaian->docx1)
        <div class="form-group col mt-3">
            <label for="docx1">Dokumen Penyampaian</label>
            <br>
            <a target="_blank" class="badge badge-info mr-3" href="{{ asset('storage') }}/{{ $getHarmonisasi->doc_penyampaian->docx1 }}" style="cursor: pointer;"><i class="fas fa-download"></i> Lihat Dokumen</a>
        </div>
    @endif
</div>