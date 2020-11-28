@extends('admin.master')
@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Inventory</h4>
                <button class="btn btn-success float-right">Tambah</button>
              </div>
              <div class="card-body">
                  <table class="table" id="tabel-kelas">
                    <thead class=" text-primary">
                      <th>
                        Name
                      </th>
                      <th>
                        Country
                      </th>
                      <th>
                        City
                      </th>
                      <th class="text-right">
                        Salary
                      </th>
                    </thead>
                  </table>
              </div>
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
                ajax: 'http://127.0.0.1:8000/inventory/data',
                columns: [
                    {data: 'tes', name: 'tes'},
                    {data: 'tes', name: 'tes'},
                    {data: 'tes', name: 'tes'},
                    {data: 'tes', name: 'tes'},
                ]
            });
        }
    });
     
</script>
@endsection