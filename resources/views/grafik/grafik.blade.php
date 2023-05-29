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
                                @foreach ($pemrakarsa as $item)
                                    <option value="{{ $item->nama }}">{{ $item->nama }}</option>
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