@extends('admin.master')
@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Inventory</h4>
                <button class="btn btn-success float-right" id="tambah">Tambah</button>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
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
                        <th>
                          Aksi
                        </th>
                      </thead>
                    </table>
                  </div>
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
            <form id="form-tambah-inventory">
                <div class="form-group">
                    <label for="exampleInputEmail1">Kelas</label>
                    <select class="custom-select" id="kelas" name="kelas">
                    </select>
                </div>
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
                    <select class="custom-select" name="kondisi">
                      <option selected>Kondisi</option>
                      <option value="baik">Baik</option>
                      <option value="sedang">Sedang</option>
                      <option value="rusak">Rusak</option>
                    </select>
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
                    <input type="file" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Nama Kelas" id="gambar" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Submit" id="submit">
                </div>
            </form>
            </div>
            </div>
        </div>
    </div>

    <!-- edit modal -->
    <div class="modal fade" id="editInventory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Inventory</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form id="form-edit-inventory">
                <div class="form-group">
                    <label for="exampleInputEmail1">Kelas</label>
                    <select class="custom-select" id="kelas-edit" name="kelas-edit">
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Barang</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Nama Kelas" name="nama-edit" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Label</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Nama Kelas" name="label-edit" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tahun</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Nama Kelas" name="tahun-edit" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Nama Kelas" name="jumlah-edit" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Kondisi</label>
                    <select class="custom-select" name="kondisi-edit" id="kondisi-edit">
                      <option selected>Kondisi</option>
                      <option value="baik">Baik</option>
                      <option value="sedang">Sedang</option>
                      <option value="rusak">Rusak</option>
                    </select>
                </div>
          
                <div class="form-group">
                    <label for="exampleInputEmail1">Sumber Dana</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Nama Kelas" name="sumber_dana-edit" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Nama Kelas" name="keterangan-edit" required>
                </div>
                <div class="form-file">
                    <label for="exampleInputEmail1">Gambar</label>
                    <input type="file" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Nama Kelas" id="gambar-edit">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">View Gambar</label>
                    <br>
                    <img src="" id="view-gambar">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Submit" id="update">
                    <input type="hidden" id="id">
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

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
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
                    {data: 'aksi', name: 'aksi'},
                ]
            });
        }
        //tambah modal
        $('body').on('click', '#tambah', function(e) {
            e.preventDefault();
            $("#kelas").empty();
            $.ajax({
                type: 'GET',
                url: 'inventory/kelas',
                contentType: false,
                processData: false,
                success: function(data) {
                  if(data.success == true) {
                    $("#kelas").append('<option selected>Pilih Kelas</option>');
                    for (let index = 0; index < data.data.length; index++) {
                      $("#kelas").append('<option value="'+data.data[index].id+'">'+data.data[index].room_name+'</option>');        
                    }
                    $("#tambahInventory").modal("show");
                  }
                }
            });
        });

        //store
        $('body').on('submit', '#form-tambah-inventory', function(e) {
            e.preventDefault();
            var formData = new FormData();
            var nama = $('input[name=nama]').val();
            var label = $('input[name=label]').val();
            var tahun = $('input[name=tahun]').val();
            var jumlah = $('input[name=jumlah]').val();
            var sumberDana = $('input[name=sumber_dana]').val();
            var keterangan = $('input[name=keterangan]').val();
            var gambar = $('#gambar')[0].files[0];
            var kondisi = $('select[name=kondisi] option').filter(':selected').val()
            var idRoom = $('select[name=kelas] option').filter(':selected').val()
            formData.append('nama', nama);
            formData.append('label', label);
            formData.append('tahun', tahun);
            formData.append('jumlah', jumlah);
            formData.append('kondisi', kondisi);
            formData.append('sumber_dana', sumberDana);
            formData.append('keterangan', keterangan);
            formData.append('id_room', idRoom);
            formData.append('gambar', gambar);
            console.log(idRoom);
            $.ajax({
                type: 'POST',
                url: 'inventory',
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                  if(data.success == true) {
                    Swal.fire({
                      icon: 'success',
                      title: 'Success',
                      text: 'Berhasil tambah data!',
                      showConfirmButton: false,
                      timer: 1200
                    })
                    $("#tambahInventory").modal("hide");
                    $("#form-tambah-inventory").trigger("reset");
                    location.reload();
                  }
                }
            });
        });

        //edit
        $('body').on('click', '.btn-edit-inventory', function(e) {
            e.preventDefault();
            var id = $(this).data("id");
            $("#kelas-edit").empty();
            $.ajax({
                type: 'GET',
                url: 'inventory/kelas',
                contentType: false,
                processData: false,
                success: function(data) {
                  if(data.success == true) {
                    $("#kelas-edit").append('<option selected>Pilih Kelas</option>');
                    for (let index = 0; index < data.data.length; index++) {
                      $("#kelas-edit").append('<option value="'+data.data[index].id+'">'+data.data[index].room_name+'</option>');        
                    }
                    $.ajax({
                        type: 'GET',
                        url: 'inventory/edit/' + id,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                          if(data.success == true) {
                            console.log(data.data);
                            $('#kelas-edit option[value='+data.data[0].room_id+']').attr('selected','selected');
                            $('#kondisi-edit option[value='+data.data[0].kondisi+']').attr('selected','selected');
                            $('input[name=nama-edit]').val(data.data[0].nama_barang);
                            $('input[name=label-edit]').val(data.data[0].label);
                            $('input[name=tahun-edit]').val(data.data[0].tahun);
                            $('input[name=jumlah-edit]').val(data.data[0].jumlah);
                            $('input[name=sumber_dana-edit]').val(data.data[0].sumber_dana);
                            $('input[name=keterangan-edit]').val(data.data[0].keterangan);
                            $('#view-gambar').attr('src', data.data[0].gambar);
                            $("#editInventory").modal("show");
                            $("#id").val(data.data[0].id);
                          }
                        }
                    });
                    
                  }
                }
            });
            
        });

        // update
        $('body').on('submit', '#form-edit-inventory', function(e) {
            e.preventDefault();
            var formData = new FormData();
            var id = $("#id").val();
            var nama = $('input[name=nama-edit]').val();
            var label = $('input[name=label-edit]').val();
            var tahun = $('input[name=tahun-edit]').val();
            var jumlah = $('input[name=jumlah-edit]').val();
            var sumberDana = $('input[name=sumber_dana-edit]').val();
            var keterangan = $('input[name=keterangan-edit]').val();
            var gambar = $('#gambar-edit')[0].files[0];
            var kondisi = $('select[name=kondisi-edit] option').filter(':selected').val()
            var idRoom = $('select[name=kelas-edit] option').filter(':selected').val()
            formData.append('nama', nama);
            formData.append('label', label);
            formData.append('tahun', tahun);
            formData.append('jumlah', jumlah);
            formData.append('kondisi', kondisi);
            formData.append('sumber_dana', sumberDana);
            formData.append('keterangan', keterangan);
            formData.append('id_room', idRoom);
            formData.append('gambar', gambar);
            $.ajax({
                type: 'POST',
                url: 'inventory/update/' + id,
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                  if(data.success == true) {
                    Swal.fire({
                      icon: 'success',
                      title: 'Success',
                      text: 'Berhasil edit data!',
                      showConfirmButton: false,
                      timer: 1200
                    })
                    $("#editInventory").modal("hide");
                    $("#form-edit-inventory").trigger("reset");
                    location.reload();
                  }
                }
            });
        });

        // delete
        $('body').on('click', '.btn-delete-inventory', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            Swal.fire({
                title: 'Anda yakin ingin menghapus kelas?'+
                'Anda tidak dapat membatalkan aksi ini!',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: `No`,
                denyButtonText: `Delete`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (!result.isConfirmed) {
                  $.ajax({
                    type: 'GET',
                    url: 'inventory/delete/' + id,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                      if(data.success == true) {
                        Swal.fire({
                          icon: 'success',
                          title: 'Success',
                          text: 'Berhasil delete data!',
                          showConfirmButton: false,
                          timer: 1200
                        })
                        location.reload();
                      }
                    }
                });
                } else if (result.isDenied) {
                    Swal.fire('Inventory tidak dihapus', '', 'info')
                }
            })
            
        });

    });
     
</script>
@endsection