@extends('halamanDepan.mainLanding')

@section('landing')
<div class="col-12">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3>Daftar Perancang</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive-sm">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col" class="col-md-1">No</th>
                                <th scope="col">Nama / NIP</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col" class="col-md-2">Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($perancang as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $item->nama }}<br>
                                        NIP : {{ $item->nip }}
                                    </td>
                                    <td>{{ $item->jabatan }}</td>
                                    <td class="text-center">
                                        <img src="{{ asset('storage') }}/{{ $item->foto }}" alt="Foto" width="130">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection