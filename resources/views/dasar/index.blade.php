@extends('template.header')
@section('content')
    <center class="mb-2">
        <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#inputData" aria-expanded="false"
            aria-controls="inputData">Input</button>
        <button class="btn btn-info" type="button" data-toggle="collapse" data-target="#hasilData" aria-expanded="false"
            aria-controls="hasilData">Hasil</button>
        <button class="btn btn-info" type="button" data-toggle="collapse" data-target=".multi-collapse"
            aria-expanded="false" aria-controls="inputData hasilData">Tampilkan Keduanya</button>
    </center>
        <section class="d-flex">
            <div class="collapse multi-collapse" id="inputData" style="width: 48%">
                <div class="card mr-4">
                    <div class="card-header">
                        <h3>Input Data</h3>
                    </div>
                    <div class="card-body">
                        <form id="formDasar">
                            <div class="mb-2">
                                <label for="id">Id</label>
                                <input type="text" class="form-control" name="id" required>
                            </div>
                            <div class="mb-2">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                            <div class="mb-2">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" id="" class="custom-select" required>
                                    <option selected>-- Pilih jenis kelamin --</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb2 d-flex">
                                <button type="submit" class="btn btn-secondary ml-auto d-flex" id="btn-reset">Reset</button>
                                <button type="submit" class="btn btn-info ml-auto d-flex" id="btn-simpan">Tambahkan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="collapse multi-collapse ml-auto" id="hasilData" style="width: 52%">
                <div class="card">
                    <div class="card-header">
                        <h3>Hasil Data</h3>
                    </div>
                    <div class="card-body">
                        <div class="">
                            <button type="submit" id="sorting">Sorting</button>
                        </div>
                        <table class="table table-hover" id="tbl-dasar">
                            <thead>
                                <tr>
                                    <th>No. </th>
                                    <th>Nama </th>
                                    <th>Jenis Kelamin </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="3" align="center">Belum ada data</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
@endsection
@push('script')
    <script>
        function insert(){
            const data = $('#formDasar').serializeArray()
            let newData = {}
            data.forEach(function(item, index){
                let name = item['name']
                let value = item['value']
            })
            return newData
        }

        $(function() {
            let dataDasar = []
            $('#formDasar').on('submit', function(e) {
                e.preventDefault()
                dataDasar.push(insert())
                $('#tbl-dasar tbody').html(showData(dataDasar))
                console.log(dataDasar)
            })
        })

        function showData(arr){
            let row = ''
            if(arr.length == null){
                return row = `<tr><td colspan="3">Belum ada data</td></tr>`
            }
            arr.forEach(function(item, index){
                row += `<tr>`
                row += `<td>${item['id']}</td>`
                row += `<td>${item['nama']}</td>`
                row += `<td>${item['jenis_kelamin']}</td>`
                row += `</tr>`
            })
            return row
        }

        function insertionSort(arr, key){
            let i, j, id, value;
            for (i = 1; i < arr.length; i++){
                value = arr[i];
                id = arr[i][key]
                j = i - 1;
                while (j >= 0 && arr[j][key] > id)
                {
                    arr[j + 1] = arr[j];
                    j = j - 1;
                }
                arr[j + 1] = value;
            }
            return arr
        }
        $('#sorting').on('click', function(){
            dataDasar = insertionSort(dataDasar, 'id')

            $('#tbl-dasar tbody').html(showData(dataDasar))
            console.log(dataDasar)
        })
    </script>
@endpush
