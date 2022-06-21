@extends('layouts.base')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.laporan.index') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="tgl_mulai" class="form-label">Mulai Cuti</label>
                            <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai"
                                placeholder="isi tgl_mulai">
                        </div>
                        <div class="mb-3 col-6">
                            <label for="tgl_akhir" class="form-label">Akhir Cuti</label>
                            <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir"
                                placeholder="isi tgl_akhir">
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>






    @if ($method == 'POST')
        <div class="container-fluid py-4">

            {{-- @if (Session::has('message'))
            <br>
            <div class="alert alert-{{ session('status') }} text-white">
                {{ session('message') }}
            </div>
        @endif --}}
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Cuti table</h6>
                        </div>
                        <div class="d-flex justify-content-end me-5">
                            <a href="{{ route('admin.laporan.cetak-pdf', ['tgl_mulai' => $tgl_mulai, 'tgl_akhir' => $tgl_akhir]) }}"
                                target="_blank" class="btn btn-danger">Cetak</a>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                NO CUTI</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                NAMA PEMOHON</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                TGL PENGAJUAN</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                TGL AWAL</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                TGL AKHIR</th>
                                            <th class="text-secondary opacity-7">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td class="align-middle ">
                                                    <span class="text-secondary text-xs ms-3 font-weight-bold">
                                                        <button type="button" class="btn btn-primary"
                                                            data-bs-toggle="modal" data-bs-target="#datakaryawan"
                                                            data-id="{{ $item->id }}">
                                                            {{ $item->no_cuti }}
                                                        </button>
                                                    </span>
                                                </td>
                                                <td class="align-middle ">
                                                    <span
                                                        class="text-secondary text-xs ms-3 font-weight-bold">{{ DB::table('users')->where('id', $item->user_id)->first()->name }}</span>
                                                </td>
                                                <td class="align-middle">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $item->tgl_pengajuan }}</span>
                                                </td>
                                                <td class="align-middle">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $item->tgl_awal }}</span>
                                                </td>
                                                <td class="align-middle">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{ $item->tgl_akhir }}</span>
                                                </td>
                                                <td style="width: 20%">

                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#detailData" data-id="{{ $item->id }}"
                                                        data-no_cuti="{{ $item->no_cuti }}"
                                                        data-npp="{{ DB::table('users')->where('id', $item->user_id)->first()->npp }}"
                                                        data-nama_pemohon="{{ DB::table('users')->where('id', $item->user_id)->first()->name }}"
                                                        data-tgl_pengajuan="{{ $item->tgl_pengajuan }}"
                                                        data-tgl_awal="{{ $item->tgl_awal }}"
                                                        data-tgl_akhir="{{ $item->tgl_akhir }}">
                                                        Detail
                                                    </button>

                                                    @if ($item->status == 0)
                                                        <a href="{{ route('admin.cuti.approve', ['id' => $item->id]) }}"
                                                            class="btn btn-success">Approve</a>
                                                        <button data-bs-toggle="modal" data-bs-target="#rejectModal"
                                                            data-url="{{ route('admin.cuti.decline', ['id' => $item->id]) }}"
                                                            class="btn btn-danger">Decline</button>
                                                    @endif
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
        </div>



        <!-- Modal -->
        <div class="modal fade" id="detailData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="detailDataLabel" aria-hidden="true">
            <div class="modal-dialog" id="updateDialog">
                <div id="modal-content" class="modal-content">
                    <div class="modal-body">
                        Loading..
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection


@section('js')
    <script>
        $('#detailData').on('shown.bs.modal', function(e) {
            var html = `
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Data Karyawaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <td>NO CUTI</td>
                        <td>${$(e.relatedTarget).data('no_cuti')}</td>
                    </tr>
                    <tr>
                        <td>NPP</td>
                        <td>${$(e.relatedTarget).data('npp')}</td>
                    </tr>
                    <tr>
                        <td>NAMA PEMOHON</td>
                        <td>${$(e.relatedTarget).data('nama_pemohon')}</td>
                    </tr>
                    <tr>
                        <td>TANGGAL PENGAJUAN</td>
                        <td>${$(e.relatedTarget).data('tgl_pengajuan')}</td>
                    </tr>
                    <tr>
                        <td>TANGGAL MULAI</td>
                        <td>${$(e.relatedTarget).data('tgl_awal')}</td>
                    </tr>
                    <tr>
                        <td>TANGGAL AKHIR</td>
                        <td>${$(e.relatedTarget).data('tgl_akhir')}</td>
                    </tr>
                </table>
            </div>
            `;

            $('#modal-content').html(html);
            $('.dropify').dropify();

        });
    </script>

    <script>
        $('#rejectModal').on('shown.bs.modal', function(e) {
            var html = `
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Data Karyawaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="${$(e.relatedTarget).data('url')}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="phone" class="form-label">Keterangan</label>
                        <textarea name="keterangan_reject" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            `;

            $('#modal-reject').html(html);

        });
    </script>
@endsection
