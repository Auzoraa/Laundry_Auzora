@extends('template.header')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="my-2">
                <form action="/laporan" method="GET">
                    <div class="input-group mb-3">
                        <input type="date" class="form-control mr-3" name="start_date">
                        <input type="date" class="form-control" name="end_date">
                        <button class="btn btn-info" type="submit">GET</button>
                    </div>
                </form>
                <a href="/laporan/pdf" target="_blank" class="btn btn-sm btn-flat btn-danger ml-auto">Export PDF</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Kode Invoice</th>
                        <th scope="col">Nama Member</th>
                        <th scope="col">Status Pembayaran</th>
                        <th scope="col">Pemasukan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    ?>
                    @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $item->tgl }}</td>
                        <td>
                            {{ $item->kode_invoice }}
                        </td>
                        <td>
                            {{ $item->nama }}
                        </td>
                        <td>
                            {{ $item->dibayar }}
                        </td>
                        <td class="format-number">Rp. {{ number_format($item->total, 0, ',', '.') }}</td>
                    </tr>
                    @endforeach
                    <tr style="background-color: black;color:aliceblue;font-weight:bold">
                        <td colspan="5" style="text-align: center">Total</td>
                        <td class="format-number">Rp. {{ number_format($total, 0, ',', '.') }}</td>                        
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection