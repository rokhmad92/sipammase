@extends('grafik.mainGrafik')

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

    {{-- Grafik --}}
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="form-group" style="margin-bottom: 20px;">
                        <form action="/grafikAdmin" method="POST">
                        @csrf
                            <label for="pemrakarsa">Pilih Pemrakarsa</label>
                            <select class="form-control" id="pemrakarsa" name="grafikPemrakarsa">
                                <option value="{{ $pemrakarsaGet }}" selected>{{ $pemrakarsaGet }}</option>
                                @foreach ($pemrakarsa as $item)
                                    @if ($item->nama == $pemrakarsaGet)
                                        <option value="" class="d-none"></option>
                                    @else
                                        <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <br>
                            <label for="grafikTahun">Pilih Tahun</label>
                            <select class="form-control col-4" id="grafikTahun" name="grafikTahun">
                                <option value="{{ $tahunGet }}" selected>{{ $tahunGet }}</option>
                                @foreach ($tahun as $item)
                                    @if ($item->no == $tahunGet)
                                        <option value="" class="d-none"></option>
                                    @else
                                        <option value="{{ $item->no }}">{{ $item->no }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-success mt-3">Lihat Grafik</button>
                        </form>
                    </div>
                    <br>
                    <hr>
                    <div class="card-body">
                        <h4>Garfik {{ $pemrakarsaGet }}</h4>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection