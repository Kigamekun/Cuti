@extends('layouts.base')


@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('pengajuan-store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="npp" class="form-label">Mulai Cuti</label>
                        <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" placeholder="isi tgl_mulai">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Akhir Cuti</label>
                        <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir" placeholder="isi tgl_akhir">
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Ketarangan</label>
                        <textarea name="keterangan" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection
