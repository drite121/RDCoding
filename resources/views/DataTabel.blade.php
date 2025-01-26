@extends('layouts.app')
@section('content')
    <script>
        $(document).ready(function() {
            var table = $('#DataList').DataTable({
            rowReorder: true,
            columnDefs: [{
                targets: 0,
                visible: false
            }]
            });
            
            btnAdd = document.getElementById("add");
            var count = 1;
            btnAdd.addEventListener("click", function() {
                var item = document.getElementById("TextItem").value;
                
                table.row.add([count, count,item,'<button type="button" class="btn btn-danger btn-block" onclick="Delete('+(count-1)+')"><i class="bi bi-trash"></i></button>']).draw();
                count += 1;
                document.getElementById("TextItem").value = "";
            });
        });

        function Delete(id)
        {
            
            var table = $('#DataList').DataTable();
            var row = table.row(id).remove().draw();
        }
    </script>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="border">
                    <div class="card-body">
                        <h2 class="text-center">Data Tabel</h2>
                        <br>
                        <div class="align-items-center">
                        <label for="TextItem" class="text-center">Add Data</label>
                        <input type="text" class="form-control" id="TextItem">
                        <br>
                        <button type="button" class="btn btn-primary btn-block" id="add">Add</button>
                        <br>
                        <table class="table text-center table-bordered table-striped dataTable dtr-inline" id="DataList">
                        <thead>
                            <tr>
                            <th>Idx.</th>
                            <th>No.</th>
                            <th>Data</th>
                            <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="TbodyData">
                        </tbody>
                        </table>
                        <br>
                        <P>Source & Tutorial:
                            <br>
                            <a href="https://datatables.net/manual/installation">Datatables</a><br>
                        <p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
