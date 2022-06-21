<!DOCTYPE html>
<html>

<head>
    <title>CUTI REPORT</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>

    <div style="display: flex;justify-content:space-between;flex-direction:row;">
        <div>
            <img class="mb-4" src="https://www.clipartmax.com/png/middle/247-2476688_lambang-kota-bogor-png.png"
            alt="" width="72" height="57">
        </div>
        <div>
            {{-- <h3>KECAMATAN KOTA BOGOR</h3> --}}
        </div>
        <div></div>
    </div>
    <center>
        <h5>CUTI REPORT PDF</h4>

    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>No Cuti</th>
                <th>Pemohon</th>
                <th>Approve By</th>
                <th>Tanggal Awal</th>
                <th>Tanggal Akhir</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($data as $dt)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $dt->no_cuti }}</td>
                    <td>{{ DB::table('users')->where('id', $dt->user_id)->first()->name }}</td>
                    <td>
                        @if (!is_null($dt->approved_id))
                            {{ DB::table('users')->where('id', $dt->approved_id)->first()->name }}
                        @endif
                    </td>
                    <td>{{ $dt->tgl_awal }}</td>
                    <td>{{ $dt->tgl_akhir }}</td>
                    <td>
                        @if ($dt->status == -1)
                            <span class="badge badge-danger">Ditolak</span>
                        @elseif ($dt->status == 1)
                            <span class="badge badge-info">Idle</span>
                        @else
                            <span class="badge badge-success">Diterima</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
