@extends('admin.master')
@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Kelas</h4>
                <button class="btn btn-success float-right" data-toggle="modal" data-target="#tambahKelas">Tambah</button>
              </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="tabel-kelas">
                            <thead class=" text-primary">
                            <th>
                                Nama Kelas
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
    <div class="modal fade" id="tambahKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Kelas</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Masukkan Nama Kelas" id="nama" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Submit" id="tambah-kelas">
                </div>
            </form>
            </div>
            </div>
        </div>
    </div>

    <!-- edit modal -->
    <div class="modal fade" id="editKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{url('kelas')}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Kelas</label>
                    <input type="text" class="form-control" id="nama-edit" aria-describedby="emailHelp" placeholder="Masukkan Nama Kelas" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Submit" id="submit">
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
        loadTable();
        function loadTable() {
            $('#tabel-kelas').DataTable({
                processing: true,
                serverSide: true,
                ajax: 'http://127.0.0.1:8000/kelas/data',
                columns: [
                    {data: 'room_name', name: 'room_name'},
                    {data: 'aksi', name: 'aksi'},
                ]
            });
        }

        //tambah firebase data sensor
        $('body').on('click', '#tambah-kelas', function(e) {
            e.preventDefault();
            var formData = new FormData()
            var nama = $("#nama").val();
            // console.log(nama);
            formData.append('nama', nama);
                $.ajax({
                    type: 'GET',
                    url: '/kelas/tambah',
                    data: {nama:nama}, 
                    success: function(data) {
                        if(data.success == "true") {
                            Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Berhasil tambah kelas!',
                            showConfirmButton: false,
                            timer: 1200
                        })
                        $.ajax({
                            type: 'GET',
                            url: '/kelas/id',
                            success: function(data) {
                                addSensor(data.data)
                            }
                        });
                        setTimeout(reload, 3000);
                        }
                    }
                });
        });

        function reload() {
            location.reload();
        }
        //fungi firebase
        function addSensor(id)
        {
            var sensorRef = firebase.database();
            var sensor = sensorRef.ref("kelas/" + id);
            sensor.set({
            id : parseInt(id),
            lampu : 'off'
            });
        }

        function deleteSensor(id)
        {
            var sensorRef = firebase.database();
            var sensor = sensorRef.ref("kelas/" + id);
            sensor.remove();

        }

        $('body').on('click', '.btn-delete-kelas', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            // console.log(id)
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
                        url: 'delete/' + id,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            if(data.delete == 'success') {
                                Swal.fire('Deleted!', '', 'success')
                                deleteSensor(id)
                                setTimeout(reload, 3000);
                            }
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire('kelas tidak dihapus', '', 'info')
                }
            })
        });

        //edit kelas
        $('body').on('click', '.btn-edit-kelas', function(e) {
            e.preventDefault();
            $('#editKelas').modal('show');
            var id = $(this).data('id');
            $("#id").val(id);
            console.log(id);
            $.ajax({
                type: 'GET',
                url: '/kelas/edit/' + id,
                contentType: false,
                processData: false,
                success: function(data) {
                    if(data.success == true) {
                        $('#editKelas').modal('show');
                        console.log(data.data[0].room_name)
                        $("#nama-edit").val(data.data[0].room_name);
                    }
                }
            });
        });

        //update 
        $('body').on('click', '#submit', function(e) {
            e.preventDefault();
            var id = $("#id").val();
            var nama = $("#nama-edit").val();
            $.ajax({
                type: 'GET',
                url: '/kelas/update/' + id,
                data: {nama:nama},
                success: function(data) {
                    if(data.update == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: 'Berhasil update kelas!',
                            showConfirmButton: false,
                            timer: 1200
                        })
                        location.reload();
                    }
                }
            });
        });

    });
     
</script>
@endsection
