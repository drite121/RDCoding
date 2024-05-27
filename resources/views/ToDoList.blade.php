@extends('layouts.app')
@section('content')
    <script src="{{ asset('js/dataTables.responsive.js') }}"></script>
    <script src="{{ asset('js/responsive.dataTables.js') }}"></script>
    <link href="{{ asset('css/responsive.dataTables.css') }}" rel="stylesheet">
    <style>
        table, th, td {
        border: 1px solid black !important;
        border-collapse: collapse !important;
        text-align: center;
        align-items: center !important;
        }
    </style>
    <script>
        $(document).ready(function() {
            var table = $('#DataList').DataTable({
            rowReorder: true,
            paging: false,
            "dom": 'rtip',
            "bInfo" : false,
            responsive: {
            details: {
                type: 'column',
                target: 2
            }
        },bAutoWidth: false,
            columnDefs: [{
                targets: 0,
                visible: false,
            },{ width: '10%', targets: 1 },{ width: '80%', targets: 2 },{ width: '10%', targets: 3 },
            { targets: 1, className: 'text-center' }],
            });
            
            btnAdd = document.getElementById("add");
            btndelete = document.getElementById("delete");
            var count = 1;
            btnAdd.addEventListener("click", function() {
                var Tit = document.getElementById("Tittle").value;
                var Des = document.getElementById("Description").value;
                table.row.add([count,'<i class="bi bi-list h2"></i>',Tit,Des,'<button type="button" class="btn btn-danger btn-block" onclick="Delete('+(count-1)+')"><i class="bi bi-trash h4"></i></button>']).draw();
                count += 1;
                if(table.column(0).data().length>=1)
                {
                    document.getElementById("DataList").style.visibility = "visible";
                }
                document.getElementById("Tittle").value = "";
                document.getElementById("Description").value = "";
            });
        });

        function Delete(id)
        {
            var table = $('#DataList').DataTable();
            var row = table.row(id).remove().draw();
            if(table.column(0).data().length==0)
            {
                document.getElementById("DataList").style.visibility = "hidden";
            }
        }
    </script>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="bg-white border">
                    <div class="card-body">
                        <h2 class="text-center">ToDo List</h2>
                        <br>
                        <div class="align-items-center">
                        <label for="Tittle" class="text-center">Tittle</label>
                        <input type="text" class="form-control" id="Tittle">
                        <br>
                        <label for="Description" class="text-center">Description</label>
                        <textarea class="form-control" id="Description" rows="3"></textarea>
                        <br>
                        <button type="button" class="btn btn-primary btn-block" id="add">Add</button>
                        <br>
                        <table class="table text-center table-bordered table-striped dataTable dtr-inline display responsive" id="DataList"  style="visibility:hidden;">
                        <thead style="display:none">
                            <tr>
                            <th>Idx.</th>
                            <th class="all">MoveAble</th>
                            <th class="all">To Do</th>
                            <th class="none">Description: </th>
                            <th class="all">Action</th>
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
