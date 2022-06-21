@extends('layouts.base')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
        integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <style>
        .dropify-wrapper .dropify-message p {
            font-size: 14px;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid py-4">

        <div class="row">
            <div class="d-flex justify-content-end">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#createData">
                    Create Data Karyawan
                </button>
            </div>
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Data Karyawan table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            NPP</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            NAMA</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            TELEPON</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            DIVISI</th>
                                        <th class="text-secondary opacity-7">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td class="align-middle ">
                                                <span class="text-secondary text-xs ms-3 font-weight-bold">
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#datakaryawan" data-id="{{ $item->id }}">
                                                        {{ $item->npp }}
                                                    </button>
                                                </span>
                                            </td>
                                            <td class="align-middle ">
                                                <span
                                                    class="text-secondary text-xs ms-3 font-weight-bold">{{ $item->name }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item->phone }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item->divisi }}</span>
                                            </td>
                                            <td style="width: 20%">

                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#updateData" data-id="{{ $item->id }}"
                                                    data-name="{{ $item->name }}"
                                                    data-jenis_kelamin="{{ $item->jenis_kelamin }}"
                                                    data-phone="{{ $item->phone }}" data-divisi="{{ $item->divisi }}"
                                                    data-email="{{ $item->email }}" data-alamat="{{ $item->alamat }}"
                                                    data-thumb="{{ $item->thumb }}"
                                                    data-password="{{ $item->password }}"
                                                    data-url="{{ route('admin.datakaryawan.update', ['id' => $item->id]) }}">
                                                    Update
                                                </button>
                                                <a class="btn btn-danger"
                                                    href="{{ route('admin.datakaryawan.delete', ['id' => $item->id]) }}">Hapus</a>
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
    <div class="modal fade" id="updateData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="updateDataLabel" aria-hidden="true">
        <div class="modal-dialog" id="updateDialog">
            <div id="modal-content" class="modal-content">
                <div class="modal-body">
                    Loading..
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="syarat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="syaratLabel" aria-hidden="true">
        <div class="modal-dialog" id="updateDialog">
            <div id="modal-content-syarat" class="modal-content">
                <div class="modal-body">
                    Loading..
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="createData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="createDataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div id="modal-content" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Create Data Karyawaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.datakaryawan.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="npp" class="form-label">npp</label>
                            <input type="text" class="form-control" id="npp" name="npp"
                                placeholder="isi npp">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="isi name">
                        </div>
                        <div class="mb-3">
                            <label for="Jenis Kelamin" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="" class="form-control">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki Laki">Laki Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">phone</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                placeholder="isi phone">
                        </div>

                        <div class="mb-3">
                            <label for="divisi" class="form-label">divisi</label>
                            <input type="text" class="form-control" id="divisi" name="divisi"
                                placeholder="isi divisi">
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Alamat</label>
                            <textarea name="alamat" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="Thumb" class="form-label">Thumb</label>
                            <input type="file" class="form-control" id="thumb" name="thumb"
                                placeholder="isi thumb">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="isi email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="isi password">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.dropify').dropify();
    </script>




    <script>
        $('#updateData').on('shown.bs.modal', function(e) {
            var html = `

                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Data Karyawaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="${$(e.relatedTarget).data('url')}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="name" class="form-label">name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="isi name" value="${$(e.relatedTarget).data('name')}">
                        </div>
                        <div class="mb-3">
                            <label for="Jenis Kelamin" class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="" class="form-control">
                                <option value="${$(e.relatedTarget).data('jenis_kelamin')}" selected>${$(e.relatedTarget).data('jenis_kelamin')}</option>
                                <option value="Laki Laki">Laki Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="isi phone" value="${$(e.relatedTarget).data('phone')}">
                        </div>

                        <div class="mb-3">
                            <label for="divisi" class="form-label">divisi</label>
                            <input type="text" class="form-control" id="divisi" name="divisi" placeholder="isi divisi" value="${$(e.relatedTarget).data('divisi')}">
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Alamat</label>
                            <textarea name="alamat" id="" cols="30" rows="10" class="form-control">${$(e.relatedTarget).data('alamat')}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="Thumb" class="form-label">Thumb</label>
                            <input type="file" class="form-control" id="thumb" name="thumb" placeholder="isi thumb">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="isi email" value="${$(e.relatedTarget).data('email')}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="isi password" value="${$(e.relatedTarget).data('password')}">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
                `;

            $('#modal-content').html(html);
            $('.dropify').dropify();

        });
    </script>
@endsection
