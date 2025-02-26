@extends('layouts.app')
@section('content')
@include('modalLogisticsSystem')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="border">
                    <div class="card-body">
                        <h2 class="text-center">Export Excel</h2>

                        <!-- Transaction -->
                        <div id="DTransaction" class="text-center" name="TabPage">
                            <button type="button" class="btn btn-primary btn-block" id="AddTransaction">Add Transaction</button>
                            <button type="button" class="btn btn-primary btn-block" onclick="exportToExcel()">Export to Excel</button>
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
                        <br>
                        <P>Source:
                            <br>
                            <a href="https://docs.sheetjs.com/">SheetJS</a>
                        </p>
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

        function getTransactionDetails(transaction) {
            let customer = customers.find(c => c.id === transaction.customerId);
            let container = containers.find(c => c.id === transaction.containerId);
            let truck = truks.find(t => t.id === transaction.truckId);

            return {
                id: transaction.id,
                customerName: customer ? customer.name : "Unknown",
                containerCode: container ? container.code : "-",
                containerSize: container ? container.size : "-",
                truckPlate: truck ? truck.plate : "-",
                truckDriver: truck ? truck.driver : "-",
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
        console.log(getTransactionDetails)
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

                    document.getElementById("TruckService").classList.add("d-none");
                    document.getElementById("ContainerService").classList.remove("d-none");
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

        function exportToExcel()
        {
            let transactionDetails = transactions.map(getTransactionDetails);

            // Buat data dengan header
            let data = [
                ["ID", "Customer Name", "Container Code", "Container Size", "Truck Plate", "Truck Driver", "Rental Days", "Distance (KM)", "Total Price", "Status"],
                ...transactionDetails.map(t => [t.id, t.customerName, t.containerCode, t.containerSize, t.truckPlate, t.truckDriver, t.rentalDays, t.distanceKM, t.totalPrice, t.status])
            ];

            let ws = XLSX.utils.aoa_to_sheet(data);
            let wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "Containers");

            XLSX.writeFile(wb, "transactions.xlsx");
        }

    </script>
@endsection
