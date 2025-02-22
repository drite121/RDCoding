@extends('layouts.app')
@section('content')
@include('modalLogisticsSystem')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="border">
                    <div class="card-body">
                        <h2 class="text-center">Simple Logistics System</h2>
                        <!-- <p>I tried to make a trial of click date saving</p> -->
                         <br>
                         <ul class="nav nav-pills nav-fill">
                        <li id="BTransaction" class="nav-item pointer w-25 border border-secondary bg-primary bg-gradient" name="TabButton">
                            <a class="nav-link" onclick="ShowTab('Transaction')">Transaction</a>
                        </li>
                        <li id="BCustomer" class="nav-item pointer w-25 border border-secondary bg-gradient" name="TabButton">
                            <a class="nav-link" onclick="ShowTab('Customer')">Customer</a>
                        </li>
                        <li id="BContainer" class="nav-item pointer w-25 border border-secondary bg-gradient" name="TabButton">
                            <a class="nav-link" onclick="ShowTab('Container')">Container</a>
                        </li>
                        <li id="BTruck" class="nav-item pointer w-25 border border-secondary bg-gradient" name="TabButton">
                            <a class="nav-link" onclick="ShowTab('Truck')">Truck</a>
                        </li>
                        </ul>
                        <br>
                        <!-- Transaction -->
                        <div id="DTransaction" class="text-center" name="TabPage">
                            <button type="button" class="btn btn-primary btn-block float-right" id="AddTransaction">Add Transaction</button>
                            <div class="table-responsive">
                                <table class="table text-center table-bordered table-striped dataTable dtr-inline" id="DataListTransaction">
                                    <thead>
                                        <tr>
                                        <th>No.Transaction</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="TbodyTransaction">
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- Customer -->
                        <div id="DCustomer" class="text-center d-none" name="TabPage">
                            <button type="button" class="btn btn-primary btn-block float-right" id="AddCustomer">Add Customer</button>
                            <div class="table-responsive">
                                <table class="table text-center table-bordered table-striped dataTable dtr-inline" id="DataListCustomer">
                                    <thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="TbodyCustomer">
                                    </tbody>
                                </table>
                            </div>
                        </div>       
                        
                        <!-- Container -->
                        <div id="DContainer" class="text-center d-none" name="TabPage">
                            <button type="button" class="btn btn-primary btn-block float-right" id="AddContainer">Add Container</button>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped dataTable dtr-inline" id="DataListContainer">
                                    <thead>
                                        <tr>
                                        <th>Code</th>
                                        <th>Size</th>
                                        <th>PricePerDay</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="TbodyContainer">
                                    </tbody>
                                </table>
                            </div>
                        </div>   

                        <!-- Truck -->
                        <div id="DTruck" class="text-center d-none" name="TabPage">
                            <button type="button" class="btn btn-primary btn-block float-right" id="AddTruck">Add Truck</button>
                            <div class="table-responsive">
                                <table class="table text-center table-bordered table-striped dataTable dtr-inline" id="DataListTruck">
                                    <thead>
                                        <tr>
                                        <th>Plate</th>
                                        <th>Driver</th>
                                        <th>CostPerKM</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="TbodyTruck">
                                    </tbody>
                                </table>
                            </div>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let transactions = [
            { id: 1, customerId: 1, containerId: 3, truckId: 2, rentalDays: 5, distanceKM: 100, totalPrice: 1200000, status: "Canceled" },
            { id: 2, customerId: 2, containerId: 1, truckId: 3, rentalDays: 3, distanceKM: 200, totalPrice: 2300000, status: "Completed" },
            { id: 3, customerId: 3, containerId: 2, truckId: 1, rentalDays: 7, distanceKM: 150, totalPrice: 1800000, status: "Completed" },
            { id: 4, customerId: 4, containerId: 4, truckId: 5, rentalDays: 2, distanceKM: 50, totalPrice: 1050000, status: "Ongoing" },
            { id: 5, customerId: 5, containerId: 5, truckId: 4, rentalDays: 4, distanceKM: 300, totalPrice: 4000000, status: "Ongoing" }
        ];

        let customers = [
            { id: 1, name: "PT. ABC", status: "Aktif" },
            { id: 2, name: "CV. Maju Jaya", status: "Aktif" },
            { id: 3, name: "PT. Sejahtera", status: "Aktif" },
            { id: 4, name: "UD. Sentosa", status: "Aktif" },
            { id: 5, name: "PT. Karya Mandiri", status: "Aktif" }
        ];

        //status ready, OnDuty, maintenance, deleted
        let containers = [
            { id: 1, code: "20201", size: "20ft", pricePerDay: 100000, status: "Ready" },
            { id: 2, code: "40401", size: "40ft", pricePerDay: 150000, status: "Ready" },
            { id: 3, code: "20202", size: "20ft", pricePerDay: 100000, status: "Ready" },
            { id: 4, code: "40402", size: "40ft", pricePerDay: 150000, status: "OnDuty" },
            { id: 5, code: "20203", size: "20ft", pricePerDay: 100000, status: "OnDuty" }
        ];

        let truks = [
            { id: 1, plate: "B 1234 ABC", driver: "Slamet", costPerKM: 5000, status: "Ready" },
            { id: 2, plate: "B 5678 XYZ", driver: "Joko", costPerKM: 7000, status: "Ready" },
            { id: 3, plate: "D 9101 DEF", driver: "Budi", costPerKM: 10000, status: "Ready" },
            { id: 4, plate: "L 3141 GHI", driver: "Agus", costPerKM: 12000, status: "OnDuty" },
            { id: 5, plate: "F 7890 JKL", driver: "Edi", costPerKM: 15000, status: "OnDuty" }
        ];

        $(document).ready(function() {
            table = $('#DataListTransaction').DataTable().destroy();
        });
                
        $(document).ready(function() {
            table = $('#DataListTransaction').DataTable({
                columns: [
                    { title: "No.Txn" },
                    { title: "Customer" },
                    { title: "Total" },
                    { title: "Status" },
                    { title: "Action" }
                ]
            });
            LoadDataTransaction();
        });

        function ShowTab(Show)
        {
            const ButtonTransaction= document.getElementById("BTransaction");
            const DisplayTransaction= document.getElementById("DTransaction");

            const ButtonCustomer= document.getElementById("BCustomer");
            const DisplayCustomer= document.getElementById("DCustomer");

            const ButtonContainer= document.getElementById("BContainer");
            const DisplayContainer= document.getElementById("DContainer");

            const ButtonTruck= document.getElementById("BTruck");
            const DisplayTruck= document.getElementById("DTruck");

            let buttons = document.getElementsByName("TabButton");
            for (let i = 0; i < buttons.length; i++) {
                buttons[i].classList.remove("bg-primary");
            }

            let pages = document.getElementsByName("TabPage");
            for (let i = 0; i < buttons.length; i++) {
                pages[i].classList.add("d-none");
            }

            if(Show=="Transaction")
            {
                $(document).ready(function() {
                    table = $('#DataListTransaction').DataTable().destroy();
                });
                
                $(document).ready(function() {
                    table = $('#DataListTransaction').DataTable({
                        columns: [
                            { title: "No.Txn" },
                            { title: "Customer" },
                            { title: "Total" },
                            { title: "Status" },
                            { title: "Action" }
                        ]
                    });
                    LoadDataTransaction();
                });

                ButtonTransaction.classList.add("bg-primary");
                DisplayTransaction.classList.remove("d-none");
            }
            else if(Show=="Customer")
            {
                $(document).ready(function() {
                    table = $('#DataListCustomer').DataTable().destroy();
                });
                
                $(document).ready(function() {
                    table = $('#DataListCustomer').DataTable({
                        columns: [
                            { title: "No" },
                            { title: "Nama" },
                            { title: "Action" }
                        ]
                    });
                    LoadDataCustomer();
                });

                ButtonCustomer.classList.add("bg-primary");
                DisplayCustomer.classList.remove("d-none");
            }
            else if(Show=="Container")
            {
                $(document).ready(function() {
                    table = $('#DataListContainer').DataTable().destroy();
                });
                
                $(document).ready(function() {
                    table = $('#DataListContainer').DataTable({
                        columns: [
                            { title: "Code" },
                            { title: "Size" },
                            { title: "pricePerDay" },
                            { title: "Status" },
                            { title: "Action" }
                        ]
                    });
                    LoadDataContainer();
                });

                ButtonContainer.classList.add("bg-primary");
                DisplayContainer.classList.remove("d-none");
            }
            else if(Show=="Truck")
            {
                $(document).ready(function() {
                    table = $('#DataListTruck').DataTable().destroy();
                });
                
                $(document).ready(function() {
                    table = $('#DataListTruck').DataTable({
                        columns: [
                            { title: "Plate" },
                            { title: "Driver" },
                            { title: "CostPerKM" },
                            { title: "Status" },
                            { title: "Action" }
                        ]
                    });
                    LoadDataTruck();
                });

                ButtonTruck.classList.add("bg-primary");
                DisplayTruck.classList.remove("d-none");
            }
        }

        function getTransactionDetails(transaction) {
            let customer = customers.find(c => c.id === transaction.customerId);
            let container = containers.find(c => c.id === transaction.containerId);
            let truck = truks.find(t => t.id === transaction.truckId);

            return {
                id: transaction.id,
                customerName: customer ? customer.name : "Unknown",
                containerCode: container ? container.code : "Unknown",
                containerSize: container ? container.size : "Unknown",
                truckPlate: truck ? truck.plate : "Unknown",
                truckDriver: truck ? truck.driver : "Unknown",
                rentalDays: transaction.rentalDays,
                distanceKM: transaction.distanceKM,
                totalPrice: transaction.totalPrice,
                status: transaction.status,
            };
        }

        function LoadDataTransaction() {
            let detailedTransactions = transactions.map(getTransactionDetails);
            const ShowData = detailedTransactions.map((item, index) => [
                item.id, 
                item.customerName, 
                item.totalPrice,
                item.status,
                (item.status === "Ongoing" 
                ? `<button class="btn btn-primary btn-sm" data-target="${item.id}" id="DetailTransaction"><i class="bi bi-journal-bookmark"></i></i></button>
                <button class="btn btn-success btn-sm" onclick="UpdateTransaction(${item.id})"><i class="bi bi-check-lg"></i></button>
                <button class="btn btn-danger btn-sm" onclick="deleteTransaction(${item.id})"><i class="bi bi-x-lg"></i></button>`
                : `<button class="btn btn-primary btn-sm" data-target="${item.id}" id="DetailTransaction"><i class="bi bi-journal-bookmark"></i></i></button>
                <button class="btn btn-success btn-sm d-none" onclick="UpdateTransaction(${item.id})"><i class="bi bi-check-lg"></i></button>
                <button class="btn btn-danger btn-sm d-none" onclick="deleteTransaction(${item.id})"><i class="bi bi-x-lg"></i></button>`)
                
            ]);
            table.clear().draw();
            table.rows.add(ShowData).order([0, 'desc']).draw();
        }

        function LoadDataCustomer() {
            const ShowData = customers.filter(item => item.status !== "deleted").map((item, index) => [
                item.id, 
                item.name, 
                `<button class="btn btn-warning btn-sm" data-target="${item.id}" id="UpdateCustomer"><i class="bi bi-pencil"></i></button>
                <button class="btn btn-danger btn-sm" onclick="deleteCustomer(${item.id})"><i class="bi bi-trash3"></i></button>`
            ]);
            table.clear().draw();
            table.rows.add(ShowData).draw();
        }

        function LoadDataContainer() {
            const ShowData = containers.filter(item => item.status !== "deleted").map((item, index) => [
                item.code, 
                item.size,
                item.pricePerDay, 
                item.status,
                `<button class="btn btn-warning btn-sm" data-target="${item.id}" id="UpdateContainer"><i class="bi bi-pencil"></i></button>
                <button class="btn btn-danger btn-sm" onclick="deleteContainer(${item.id})"><i class="bi bi-trash3"></i></button>`
            ]);
            table.clear().draw();
            table.rows.add(ShowData).draw();
        }

        function LoadDataTruck() {
            const ShowData = truks.filter(item => item.status !== "deleted").map((item, index) => [
                item.plate, 
                item.driver, 
                item.costPerKM,
                item.status,
                `<button class="btn btn-warning btn-sm" data-target="${item.id}" id="UpdateTruck")"><i class="bi bi-pencil"></i></button>
                <button class="btn btn-danger btn-sm" onclick="deleteTruck(${item.id})"><i class="bi bi-trash3"></i></button>`
            ]);
            table.clear().draw();
            table.rows.add(ShowData).draw();
        }

        function deleteCustomer(id) {
            let customer = customers.find(c => c.id === id);
            if (customer) {
                customer.status = "deleted"; // Ubah status, bukan hapus data
            }
            LoadDataCustomer();
        }

        function deleteContainer(id) {
            let container = containers.find(c => c.id === id);
            if (container) {
                container.status = "deleted"; // Ubah status, bukan hapus data
            }
            LoadDataContainer();
        }

        function deleteTruck(id) {
            let truk = truks.find(c => c.id === id);
            if (truk) {
                truk.status = "deleted"; // Ubah status, bukan hapus data
            }
            LoadDataTruck();
        }

        //modal add, funtion tambah ad di file modal
        $(function () {
            $('#AddTransaction').on('click', function (e) {
                e.preventDefault();
                $('#modalAddTransaction').modal({ backdrop: 'static', keyboard: false })
                    .on('click', function(){
                    var $url=$('.form').attr('action');
                        window.open($url, '_self');
                    });
                    document.getElementById("IdTransaction").value=transactions.length+1;

                    $(document).ready(function() {
                        $('.CustomerList').select2( {
                        theme: 'bootstrap-5',
                    } );
                    });

                    $(document).ready(function() {
                        $('.ContainerList').select2( {
                        theme: 'bootstrap-5',
                    } );
                    });

                    $(document).ready(function() {
                        $('.TruckList').select2( {
                        theme: 'bootstrap-5',
                    } );
                    });

                    let selectCustomer = document.getElementById("CustomerList");
                    selectCustomer.innerHTML = "";

                    customers.forEach((customer) => {
                        let option = document.createElement("option");
                        option.value = customer.id;
                        option.text = customer.name;
                        selectCustomer.appendChild(option);
                    });

                    let selectContainer = document.getElementById("ContainerList");
                    let usedContainers = transactions.filter(t => t.status === "Ongoing").map(t => t.containerId);
                    selectContainer.innerHTML = "";

                    containers.forEach((container) => {
                        if (!usedContainers.includes(container.id)) {
                            let option = document.createElement("option");
                            option.value = container.id;
                            option.text = container.code +" - "+container.size;
                            selectContainer.appendChild(option);
                        }
                    });

                    let selectTruck = document.getElementById("TruckList");
                    let usedTruck = transactions.filter(t => t.status === "Ongoing").map(t => t.truckId);
                    selectTruck.innerHTML = "";

                    truks.forEach((truk) => {
                        if (!usedTruck.includes(truk.id)) {
                            let option = document.createElement("option");
                            option.value = truk.id;
                            option.text = truk.plate +" - "+truk.driver;
                            selectTruck.appendChild(option);
                        }
                    });
            });
        });

        $(function () {
            $('#AddCustomer').on('click', function (e) {
                e.preventDefault();
                $('#modalAddCustomer').modal({ backdrop: 'static', keyboard: false })
                    .on('click', function(){
                    var $url=$('.form').attr('action');
                        window.open($url, '_self');
                    });
                    document.getElementById("IdCustomer").value=customers.length+1;
                    document.getElementById("NamaCustomer").value="";
            });
        });

        $(function () {
            $('#AddContainer').on('click', function (e) {
                e.preventDefault();
                $('#modalAddContainer').modal({ backdrop: 'static', keyboard: false })
                    .on('click', function(){
                    var $url=$('.form').attr('action');
                        window.open($url, '_self');
                    });
                    document.getElementById("Code").value="";
                    document.getElementById("SizeContainer").value="";
            });
        });

        $(function () {
            $('#AddTruck').on('click', function (e) {
                e.preventDefault();
                $('#modalAddTruck').modal({ backdrop: 'static', keyboard: false })
                    .on('click', function(){
                    var $url=$('.form').attr('action');
                        window.open($url, '_self');
                    });
                    $("#Plate").val("");
                    $("#Driver").val("");
                    $("#costPerKM").val("");
            });
        }); 

        //modal update, function update ad di file modal
        $(function () {
            $(document).on('click', '#UpdateCustomer', function (e) {
                e.preventDefault();
                $('#modalUpCustomer').modal({ backdrop: 'static', keyboard: false })
                    .on('click', function(){
                    var $url=$('.form').attr('action');
                        window.open($url, '_self');
                    });
                    let Id = $(this).data('target');
                    $("#IdUpCustomer").val(Id);
                    $("#UpNamaCustomer").val(customers[Id-1].name);
            });
        });

        $(function () {
            $(document).on('click', '#UpdateContainer', function (e) {
                e.preventDefault();
                $('#modalUpContainer').modal({ backdrop: 'static', keyboard: false })
                    .on('click', function(){
                    var $url=$('.form').attr('action');
                        window.open($url, '_self');
                    });
                    let Id = $(this).data('target');
                    $("#IdUpContainer").val(Id);
                    $("#UpCode").val(containers[Id-1].code);
                    $("#UPSizeContainer").val(containers[Id-1].size);
                    $("#UpPricePerDay").val(containers[Id-1].pricePerDay);
            });
        });

        $(function () {
            $(document).on('click', '#UpdateTruck', function (e) {
                e.preventDefault();
                $('#modalUpTruck').modal({ backdrop: 'static', keyboard: false })
                    .on('click', function(){
                    var $url=$('.form').attr('action');
                        window.open($url, '_self');
                    });
                    let Id = $(this).data('target');
                    $("#IdUpTruck").val(Id);
                    $("#UpPlate").val(truks[Id-1].plate);
                    $("#UpDriver").val(truks[Id-1].driver);
                    $("#UpcostPerKM").val(truks[Id-1].costPerKM);
            });
        });

        //Update Status Transaksi
        function UpdateTransaction(id) {
            let Transaction = transactions.find(c => c.id === id);
            if (Transaction) {
                Transaction.status = "Completed";
            }

            if(transactions[id-1].truckId!=0)
            {
                truks[(transactions[id-1].truckId)-1].status="Ready";
            }
            if(transactions[id-1].containerId!=0)
            {
                containers[(transactions[id-1].containerId)-1].status="Ready";
            }
            

            LoadDataTransaction();
        }

        function deleteTransaction(id) {
            let Transaction = transactions.find(c => c.id === id);
            if (Transaction) {
                Transaction.status = "Canceled";
            }
            
            if(transactions[id-1].truckId!=0)
            {
                truks[(transactions[id-1].truckId)-1].status="Ready";
            }
            if(transactions[id-1].containerId!=0)
            {
                containers[(transactions[id-1].containerId)-1].status="Ready";
            }

            LoadDataTransaction();
        }
        
        // Show detail Nota
        $(function () {
            $(document).on('click', '#DetailTransaction', function (e) {
                e.preventDefault();
                $('#modalDetTransaction').modal({ backdrop: 'static', keyboard: false })
                    .on('click', function(){
                    var $url=$('.form').attr('action');
                        window.open($url, '_self');
                    });
                    let Id = $(this).data('target');
                    $("#NoTxn").html(Id);
                    $("#Customer").html(customers[(transactions[Id-1].customerId)-1].name);
                    $("#Status").html(transactions[Id-1].status);
                    $("#Gtotal").html(transactions[Id-1].totalPrice);

                    const RowContainer= document.getElementById("RowContainer");
                    const RowTruck= document.getElementById("RowTruck");

                    if(transactions[Id-1].containerId!=0 && transactions[Id-1].truckId==0)
                    {
                        $("#NoContainer").html("1");
                        $("#CContainer").html(containers[(transactions[Id-1].containerId)-1].code +" - "+ containers[(transactions[Id-1].containerId)-1].size);
                        $("#PContainer").html(containers[(transactions[Id-1].containerId)-1].pricePerDay);
                        $("#QContainer").html(transactions[Id-1].rentalDays);
                        $("#TContainer").html(containers[(transactions[Id-1].containerId)-1].pricePerDay*transactions[Id-1].rentalDays);

                        RowContainer.classList.remove("d-none");
                        RowTruck.classList.add("d-none");
                    }
                    else if(transactions[Id-1].containerId==0 && transactions[Id-1].truckId!=0)
                    {
                        $("#NoTruck").html("1");
                        $("#CTruck").html(truks[(transactions[Id-1].truckId)-1].plate +" - "+ truks[(transactions[Id-1].truckId)-1].driver);
                        $("#PTruck").html(truks[(transactions[Id-1].truckId)-1].costPerKM);
                        $("#QTruck").html(transactions[Id-1].distanceKM);
                        $("#TTruck").html(truks[(transactions[Id-1].truckId)-1].costPerKM*transactions[Id-1].distanceKM);

                        RowContainer.classList.add("d-none");
                        RowTruck.classList.remove("d-none");
                    }
                    else if(transactions[Id-1].containerId!=0 && transactions[Id-1].truckId!=0)
                    {
                        $("#NoContainer").html("1");
                        $("#CContainer").html(containers[(transactions[Id-1].containerId)-1].code +" - "+ containers[(transactions[Id-1].containerId)-1].size);
                        $("#PContainer").html(containers[(transactions[Id-1].containerId)-1].pricePerDay);
                        $("#QContainer").html(transactions[Id-1].rentalDays);
                        $("#TContainer").html(containers[(transactions[Id-1].containerId)-1].pricePerDay*transactions[Id-1].rentalDays);
                        
                        $("#NoTruck").html("2");
                        $("#CTruck").html(truks[(transactions[Id-1].truckId)-1].plate +" - "+ truks[(transactions[Id-1].truckId)-1].driver);
                        $("#PTruck").html(truks[(transactions[Id-1].truckId)-1].costPerKM);
                        $("#QTruck").html(transactions[Id-1].distanceKM);
                        $("#TTruck").html(truks[(transactions[Id-1].truckId)-1].costPerKM*transactions[Id-1].distanceKM);

                        RowContainer.classList.remove("d-none");
                        RowTruck.classList.remove("d-none");
                    }
            });
        });

    </script>
@endsection
