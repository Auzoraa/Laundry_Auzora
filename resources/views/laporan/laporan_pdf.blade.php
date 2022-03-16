<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pendapatan</title>

    <link rel="stylesheet" href="{{ asset('/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
</head>
<body>
    <h3 class="text-center">Laporan Pendapatan</h3>

    <table class="table table-striped">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Tanggal</th>
                <th>Nama Member</th>
                <th>Total</th>
            </tr>
        </thead>
        <?php
        $no = 1;
        ?>
        <tbody>
            @foreach ($laporan as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->tgl }}</td>
                    <td>{{ $row->nama }}</td>
                    <td>{{ $row->total }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>