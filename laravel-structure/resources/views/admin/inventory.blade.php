@extends('admin.master')
@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Inventory</h4>
                <button class="btn btn-success float-right" data-toggle="modal" data-target="#tambahInventory">Tambah</button>
              </div>
              <div class="card-body">
                  <table class="table" id="tabel-inventory">
                    <thead class=" text-primary">
                      <th>
                        Nama
                      </th>
                      <th>
                        Label
                      </th>
                      <th>
                        Tahun
                      </th>
                      <th>
                        Jumlah
                      </th>
                      <th>
                        Kondisi
                      </th>
                      <th>
                        Sumber Dana
                      </th>
                      <th>
                        Gambar
                      </th>
                      <th>
                        Keterangan
                      </th>
                    </thead>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- tambah Modal -->
    <div class="modal fade" id="tambahInventory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Inventory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{url('inventory')}}" id="form-tambah-inventory">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Barang</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Nama Kelas" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Label</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Nama Kelas" name="label" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tahun</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Nama Kelas" name="tahun" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Nama Kelas" name="jumlah" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Kondisi</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Nama Kelas" name="kondisi" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Sumber Dana</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Nama Kelas" name="sumber_dana" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Nama Kelas" name="keterangan" required>
                </div>
                <div class="form-file">
                    <label for="exampleInputEmail1">Gambar</label>
                    <input type="file" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Nama Kelas" name="gambar" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
            </div>
            </div>
        </div>
    </div>
@endsection
@section('ajax')
<script>
    $(document).ready( function () {
        loadTable();
        function loadTable() {
            $('#tabel-inventory').DataTable({
                processing: true,
                serverSide: true,
                ajax: 'http://127.0.0.1:8000/inventory/data',
                columns: [
                    {data: 'nama_barang', name: 'nama_barang'},
                    {data: 'label', name: 'label'},
                    {data: 'tahun', name: 'tahun'},
                    {data: 'jumlah', name: 'jumlah'},
                    {data: 'kondisi', name: 'kondidi'},
                    {data: 'sumber_dana', name: 'sumber_dana'},
                    {data: 'gambar', name: 'gambar'},
                    {data: 'keterangan', name: 'keteragan'},
                ]
            });
        }

        //store
        $('body').on('click', '', function(e) {
            e.preventDefault();
        });
    });
     
</script>
@endsection