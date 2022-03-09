@extends('template.header')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="my-2">
                <form action="/laporan" method="GET">
                    <div class="input-group mb-3">
                        <input type="date" class="form-control" name="start_date">
                        <input type="date" class="form-control" name="end_date">
                        <button class="btn btn-primary" type="submit">GET</button>
                    </div>
                </form>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode Invoice</th>
                        <th scope="col">Id Outlet</th>
                        <th scope="col">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $data)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $data->kode_invoice }}</td>
                        <td>{{ $data->id_outlet }}</td>
                        <td>{{ $data->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
