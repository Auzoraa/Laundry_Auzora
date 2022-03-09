@extends('template.header')
@section('content')
    <div class="d-flex">
        <div class="card mr-2" style="width: 30%">
            <div class="card-header">
                <h3>Input Data</h3>
            </div>
            <div class="card-body">
                <form id="formDasar">
                    <div class="mb-2">
                        <label for="id">Id Buku</label>
                        <input type="text" class="form-control" name="id" id="id" required>
                    </div>
                    <div class="mb-2">
                        <label for="judul">Judul Buku</label>
                        <input type="text" class="form-control" name="judul" id="judul" required>
                    </div>
                    <div class="mb-2">
                        <label for="pengarang">Pengarang Buku</label>
                        <input type="text" class="form-control" name="pengarang" id="pengarang" required>
                    </div>
                    <div class="mb-2">
                        <label for="thn_terbit">Tahun Terbit</label>
                        <select name="thn_terbit" id="" class="custom-select" required>
                            <option selected>-- Pilih tahun terbit --</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label for="harga">Harga Buku</label>
                        <input type="text" class="form-control" name="harga" id="harga" required>
                    </div>
                    <div class="mb-2">
                        <label for="qty">Jumlah Buku</label>
                        <input type="text" class="form-control" name="qty" id="qty" required>
                    </div>
                    <div class="mb-2 d-flex">
                        <button type="submit" class="btn btn-secondary ml-auto d-flex" id="btn-reset">Reset</button>
                        <button type="submit" class="btn btn-info ml-auto d-flex" id="btn-simpan">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card" style="width: 70%">
            <div class="card-header">
                <h3>Hasil Data</h3>
            </div>
            <div class="card-body">
                <div class="d-flex">
                    <button type="submit" id="sorting" class="btn btn-info mr-2">Sorting</button>
                    <div class="input-group">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search" name="search" id="search">
                        <div class="input-group-append">
                            <button class="btn btn-info" type="button" id="btnSearch">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    {{-- <input type="search" name="search" id="search" class="form-control " style="width: 70%">
                            <button class="btn btn-info" type="button" id="btnSearch">Cari</button> --}}
                </div>
                <table class="table table-hover" id="tbl-dasar">
                    <thead>
                        <tr>
                            <th>Id Buku</th>
                            <th>Judul Buku</th>
                            <th>Pengarang</th>
                            <th>Tahun terbit</th>
                            <th>Harga</th>
                            <th>Qty</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="6" align="center">Belum ada data</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        function insert(){
            const data = $('#formDasar').serializeArray()
            let dataBuku = JSON.parse(localStorage.getItem('dataBuku')) || []
            let newData = {}
            data.forEach(function(item, index){
                let name = item['name']
                let value = (name === 'id' ||
                            name === 'qty' ||
                            name === 'harga' ? Number(item['value']):item['value'])
                newData[name] = value
            })
            console.log(newData)

            localStorage.setItem('dataBuku', JSON.stringify([...dataBuku, newData]))
            return newData
        }

        $(function(){
            // initialize
            let dataDasar = JSON.parse(localStorage.getItem('dataDasar')) || []
            $('#tbl-dasar tbody').html(showData(dataDasar))
            //end initialize
            //events
            $('#formDasar').on('submit', function(e){
                e.preventDefault()
                dataDasar.push(insert())
                $('#tbl-dasar tbody').html(showData(dataDasar))
                console.log(dataDasar)
            })

            $('#sorting').on('click', function(){
            dataDasar = insertionSort(dataDasar, 'id')

            $('#tbl-dasar tbody').html(showData(dataDasar))
            console.log(dataDasar)
        })

        $('#btnSearch').on('click', function(e){
            let teksSearch = $('#search').val()
            let id = searching(dataDasar, 'id', teksSearch)
            let data = []
            if(id >= 0)
                data.push(dataDasar[id])
            console.log(id)
            console.log(data)
            $('#tbl-dasar tbody').html(showData(data))
        })
            //end event
        })

        function showData(arr){
            let row = ''
            if (arr.length == null){
                return row = `<tr><td colspan="3">Belum ada data</td></tr>`
            }
            arr.forEach(function(item, index){
                row += `<tr>`
                row += `<td>${item['id']}</td>`
                row += `<td>${item['judul']}</td>`
                row += `<td>${item['pengarang']}</td>`
                row += `<td>${item['thn_terbit']}</td>`
                row += `<td>${item['harga']}</td>`
                row += `<td>${item['qty']}</td>`
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
                while (j >= 0 && arr[j][key] > id){
                    arr[j + 1] = arr[j];
                    j = j - 1;
                }
                arr[j + 1] = value;
            }
            return arr
        }

        

        // function cari
        function searching(arr, key, teks)
        {
            for(let i = 0; 1<arr.length; i++){
                if(arr[i][key] == teks)
                return i
            }
            return -1
        }
    </script>
@endpush
