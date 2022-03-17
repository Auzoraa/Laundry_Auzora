@extends('template.header')
@section('content')
        <div class="card">
            <div class="card-header">
                <h3>Input Data</h3>
            </div>
            <div class="card-body">
                <table>
                    <form id="formKaryawan">
                        <tr>
                            <td><label for="id" class="mr-4">Id Karyawan</label></td>
                            <td><input type="text" class="form" name="id" id="id" required></td>
                            <td width="30%"></td>
                            <td><label for="nama" class="mr-4">Nama Karyawan</label></td>
                            <td><input type="text" class="form" name="nama" id="nama" required></td>
                        </tr>
                        <tr>
                            <td><label for="jenis_kelamin" class="mr-4">Jenis Kelamin</label></td>
                            <td><input type="radio" class="form" name="jenis_kelamin" id="L" required value="L">
                                <label for="L">Laki-laki</label>
                                <input type="radio" class="form" name="jenis_kelamin" id="P" required value="P">
                                <label for="P">Perempuan</label></td>
                            <td width="30%"></td>
                            <td><label for="status" class="mr-4">Status menikah</label></td>
                            <td><select name="status" id="status" class="" required>
                                <option selected>-- Pilih status menikah --</option>
                                    <option value="single">Single</option>
                                    <option value="couple">Couple</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><label for="jumlah_anak" class="mr-4">Jumlah Anak</label></td>
                            <td><input type="number" name="jumlah_anak" id="jumlah_anak"></td>
                            <td width="30%"></td>
                            <td><label for="mulai_kerja" class="mr-4">Mulai Bekerja</label></td>
                            <td><input type="date" class="form" name="mulai_kerja" id="mulai_kerja" required></td>
                            <td><input type="hidden" class="form" name="gaji-awal" id="gaji-awal" value="2000000"></td>
                            <td><input type="hidden" class="form" name="tunjangan" id="tunjangan"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><button type="submit" class="btn btn-info ml-auto d-flex" id="btn-simpan">Input</button></td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
        <div class="card">
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
                <table class="table table-hover" id="tbl-karyawan">
                    <thead>
                        <tr>
                            <th>Id Karyawan</th>
                            <th>Nama</th>
                            <th>Jk</th>
                            <th>Status</th>
                            <th>Jumlah Anak</th>
                            <th>Mulai Kerja</th>
                            <th>Gaji Awal</th>
                            <th>Tunjangan</th>
                            <th>Total Gaji</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="9" align="center">Belum ada data</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6">Total</td>
                            <td><span id="tot-gaji">0</span></td>
                            <td><span id="tot-tunjangan">0</span></td>
                            <td><span id="total">0</span></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
@endsection
@push('script')
    <script>
        function insert(){
            const data = $('#formKaryawan').serializeArray()
            let dataKaryawan = JSON.parse(localStorage.getItem('dataKaryawan')) || []
            let newData = {}
            data.forEach(function(item, index){
                let name = item['name']
                let value = (name === 'id' ||
                            name === 'jumlah_anak' ? Number(item['value']):item['value'])
                newData[name] = value
            })
            console.log(newData)

            localStorage.setItem('dataKaryawan', JSON.stringify([...dataKaryawan, newData]))
            return newData
        }
        

        $(function(){
            // initialize
            let dataKaryawan = JSON.parse(localStorage.getItem('dataKaryawan')) || []
            $('#tbl-karyawan tbody').html(showData(dataKaryawan))
            //end initialize
            //events
            $('#formKaryawan').on('submit', function(e){
                e.preventDefault()
                tgl = $('#mulai_kerja').val()
                lama = _calculateAge(tgl)
                tmk = lama * 150000
                $('#tunjangan').val(tmk)
                dataKaryawan.push(insert())
                $('#tbl-karyawan tbody').html(showData(dataKaryawan))
                console.log(dataKaryawan)
            })

            $('#sorting').on('click', function(){
            dataKaryawan = insertionSort(dataKaryawan, 'id')

            $('#tbl-karyawan tbody').html(showData(dataKaryawan))
            console.log(dataKaryawan)
        })

        $('#btnSearch').on('click', function(e){
            let teksSearch = $('#search').val()
            let id = searching(dataKaryawan, 'id', teksSearch)
            let data = []
            if(id >= 0)
                data.push(dataKaryawan[id])
            console.log(id)
            console.log(data)
            $('#tbl-karyawan tbody').html(showData(data))
        })
            //end event
        })

        function showData(arr){
            let row = ''
            if (arr.length == null){
                return row = `<tr><td colspan="9">Belum ada data</td></tr>`
            }
            arr.forEach(function(item, index){
                row += `<tr>`
                row += `<td>${item['id']}</td>`
                row += `<td>${item['nama']}</td>`
                row += `<td>${item['jenis_kelamin']}</td>`
                row += `<td>${item['status']}</td>`
                row += `<td>${item['jumlah_anak']}</td>`
                row += `<td>${item['mulai_kerja']}</td>` 
                row += `<td>${item['gaji-awal']}</td>`
                row += `<td>${item['tunjangan']}</td>`
                // row += `<td></td>`;
                // row += `<td><label name="tunjangan[]" class="tunjangan">${harga}</label></td>`
                row += `<td>${item['total']}</td>`
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

        function _calculateAge(birtday) {
            birtday = new Date(birtday)
            var ageDifMs = Date.now() - birtday.getTime();
            var ageDate = new Date(ageDifMs);
            return Math.abs(ageDate.getUTCFullYear() - 1970);
        }

        function gajiAwal(mk){
            if(mk=='single'){
                let ts = 0;
            }else{
                let ts = 1500000
            })
            return ts
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
