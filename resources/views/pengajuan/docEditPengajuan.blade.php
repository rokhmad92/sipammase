{{-- upload --}}
<h5 class="ml-md-2 mt-4" data-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">Edit Dokumen <i class="fas fa-caret-down"></i></h5>

<div class="collapse" id="collapseExample1">
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
</div>

{{-- lihat --}}
<h5 class="ml-md-2 mt-4" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Lihat Dokumen <i class="fas fa-caret-down"></i></h5>

<div class="collapse" id="collapseExample">
    @if ($getHarmonisasi->surat_pemda_id == null && $getHarmonisasi->surat_dprd_id == null && $getHarmonisasi->surat_rperkada_id == null)
        <div class="form-group col mt-4">
            <label class="badge badge-danger">Belum Ada Dokumen</label>
        </div>
    @endif

    {{-- pemda --}}
    @if ($getHarmonisasi->surat_pemda_id !== null)
        <div class="form-group col mt-3">
            <label>Surat Permohonan</label>
            <br>
            <a target="_blank" class="badge badge-info mr-3" href="{{ asset('storage') }}/{{ $getHarmonisasi->surat_pemda->docx1 }}" style="cursor: pointer;"><i class="fas fa-download"></i> Lihat Dokumen</a>
        </div>

        <div class="form-group col mt-4">
            <label>Na</label>
            <br>
            <a target="_blank" class="badge badge-info mr-3" href="{{ asset('storage') }}/{{ $getHarmonisasi->surat_pemda->docx2 }}" style="cursor: pointer;"><i class="fas fa-download"></i> Lihat Dokumen</a>
        </div>

        <div class="form-group col mt-4">
            <label>SK Tim</label>
            <br>
            <a target="_blank" class="badge badge-info mr-3" href="{{ asset('storage') }}/{{ $getHarmonisasi->surat_pemda->docx3 }}" style="cursor: pointer;"><i class="fas fa-download"></i> Lihat Dokumen</a>
        </div>

        <div class="form-group col mt-4">
            <label>DRAFT RANPERDA (PDF)</label>
            <br>
            <a target="_blank" class="badge badge-info mr-3" href="{{ asset('storage') }}/{{ $getHarmonisasi->surat_pemda->docx4 }}" style="cursor: pointer;"><i class="fas fa-download"></i> Lihat Dokumen</a>
        </div>

        <div class="form-group col mt-4">
            <label>DRAFT RANPERDA (DOC)</label>
            <br>
            <a target="_blank" class="badge badge-info mr-3" href="{{ asset('storage') }}/{{ $getHarmonisasi->surat_pemda->docx5 }}" style="cursor: pointer;"><i class="fas fa-download"></i> Lihat Dokumen</a>
        </div>

        <div class="form-group col mt-4">
            <label>SK Propemperda/SK Bersama jika di Luar Propemperda.</label>
            <br>
            <a target="_blank" class="badge badge-info mr-3" href="{{ asset('storage') }}/{{ $getHarmonisasi->surat_pemda->docx6 }}" style="cursor: pointer;"><i class="fas fa-download"></i> Lihat Dokumen</a>
        </div>
    @elseif ($getHarmonisasi->surat_dprd_id !== null)
        <div class="form-group col mt-3">
            <label>Surat Permohonan</label>
            <br>
            <a target="_blank" class="badge badge-info mr-3" href="{{ asset('storage') }}/{{ $getHarmonisasi->surat_dprd->docx1 }}" style="cursor: pointer;"><i class="fas fa-download"></i> Lihat Dokumen</a>
        </div>

        <div class="form-group col mt-4">
            <label>Na</label>
            <br>
            <a target="_blank" class="badge badge-info mr-3" href="{{ asset('storage') }}/{{ $getHarmonisasi->surat_dprd->docx2 }}" style="cursor: pointer;"><i class="fas fa-download"></i> Lihat Dokumen</a>
        </div>

        <div class="form-group col mt-4">
            <label>DRAFT RANPERDA</label>
            <br>
            <a target="_blank" class="badge badge-info mr-3" href="{{ asset('storage') }}/{{ $getHarmonisasi->surat_dprd->docx3 }}" style="cursor: pointer;"><i class="fas fa-download"></i> Lihat Dokumen</a>
        </div>

        <div class="form-group col mt-4">
            <label>SK Propemperda</label>
            <br>
            <a target="_blank" class="badge badge-info mr-3" href="{{ asset('storage') }}/{{ $getHarmonisasi->surat_dprd->docx4 }}" style="cursor: pointer;"><i class="fas fa-download"></i> Lihat Dokumen</a>
        </div>
    @elseif ($getHarmonisasi->surat_rperkada_id !== null)
        <div class="form-group col mt-3">
            <label>Surat Permohonan</label>
            <br>
            <a target="_blank" class="badge badge-info mr-3" href="{{ asset('storage') }}/{{ $getHarmonisasi->surat_rperkada->docx1 }}" style="cursor: pointer;"><i class="fas fa-download"></i> Lihat Dokumen</a>
        </div>

        <div class="form-group col mt-4">
            <label>Penjelasan/Keterangan</label>
            <br>
            <a target="_blank" class="badge badge-info mr-3" href="{{ asset('storage') }}/{{ $getHarmonisasi->surat_rperkada->docx2 }}" style="cursor: pointer;"><i class="fas fa-download"></i> Lihat Dokumen</a>
        </div>

        <div class="form-group col mt-4">
            <label>DRAFT RANPERKADA</label>
            <br>
            <a target="_blank" class="badge badge-info mr-3" href="{{ asset('storage') }}/{{ $getHarmonisasi->surat_rperkada->docx3 }}" style="cursor: pointer;"><i class="fas fa-download"></i> Lihat Dokumen</a>
        </div>
    @endif
</div>