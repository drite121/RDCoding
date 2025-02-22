<div class="modal" id="modalAddTransaction">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="TheTittle">Add Transaction<h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="panel-body">
                <div class="modal-body">
                    <label for="Code" class="text-center">Id</label>
                    <input type="text" class="form-control" id="IdTransaction" disabled>
                    <br>
                    <label for="CustomerList" class="text-center">Customer</label>
                    <select class="form-control CustomerList" id="CustomerList">
                    </select>
                    <br>
                    <label for="ServiceList" class="text-center">Service</label>
                    <select class="form-control ServiceList" id="ServiceList" onchange="ChangeService(this.value)">
                        <option value="1">Container Only</option>
                        <option value="2">Truck Only</option>
                        <option value="3">Truck+Container</option>
                    </select>
                    <br>

                    <div id="ContainerService">
                        <label for="ContainerList" class="text-center">Container</label>
                        <select class="form-control ContainerList" id="ContainerList" onchange="Gtotal()";>
                        </select>
                        <br>
                        <label for="Days" class="text-center">Days</label>
                        <input type="number" class="form-control" id="Days" min="1" oninput="Gtotal()">
                        <br>
                    </div>
                    
                    <div id="TruckService" class="d-none">
                        <label for="TruckList" class="text-center">Truck</label>
                        <select class="form-control TruckList" id="TruckList" onchange="Gtotal()">
                        </select>
                        <br>
                        <label for="Distance" class="text-center">Distance</label>
                        <input type="number" class="form-control" id="Distance" min="1" oninput="Gtotal()">
                        <br>
                    </div>
                    <label for="TotalTrans" class="text-center">Total</label>
                    <input type="text" class="form-control" id="TotalTrans" disabled>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" onclick="PushTransaction()">Add</button>
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modalDetTransaction">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="TheTittle">Detail<h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="panel-body">
                <div class="modal-body">
                    <label>No. Txn: </label> <label id="NoTxn">No. Txn</label><br>
                    <label>Customer: </label> <label id="Customer">Customer</label><br>
                    <label>Status: </label> <label id="Status">Status</label><br>
                    <table class="w-100">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Service</th>
                                <th>Price</th>
                                <th>Quantiry</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="d-none" id="RowContainer">
                                <td><label id="NoContainer"></td>
                                <td><label id="CContainer"></td>
                                <td><label id="PContainer"></td>
                                <td><label id="QContainer"></td>
                                <td><label id="TContainer"></td>
                            </tr>
                            <tr class="d-none" id="RowTruck">
                                <td><label id="NoTruck"></td>
                                <td><label id="CTruck"></td>
                                <td><label id="PTruck"></td>
                                <td><label id="QTruck"></td>
                                <td><label id="TTruck"></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>G.Total</td>
                                <td><label id="Gtotal"></label></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-block btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modalAddCustomer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="TheTittle">Add Customer<h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="panel-body">
                <div class="modal-body">
                    <label for="Code" class="text-center">Id</label>
                    <input type="text" class="form-control" id="IdCustomer" disabled>
                    <br>
                    <label for="Nama" class="text-center">Nama</label>
                    <input type="text" class="form-control" id="NamaCustomer">
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" onclick="PushCustomer()">Add</button>
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modalUpCustomer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="TheTittle">Update Customer<h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="panel-body">
                <div class="modal-body">
                    <label for="Code" class="text-center">Id</label>
                    <input type="text" class="form-control" id="IdUpCustomer" disabled>
                    <br>
                    <label for="Nama" class="text-center">Nama</label>
                    <input type="text" class="form-control" id="UpNamaCustomer">
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-warning" onclick="UpdateCustomer()">Update</button>
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modalAddContainer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="TheTittle">Add Container<h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="panel-body">
                <div class="modal-body">
                    <label for="Code" class="text-center">Code</label>
                    <input type="text" class="form-control" id="Code">
                    <br>
                    <label for="Size" class="text-center">Size</label>
                    <input type="text" class="form-control" id="SizeContainer">
                    <br>
                    <label for="PricePerDay" class="text-center">Price Per Day</label>
                    <input type="number" class="form-control" id="PricePerDay">
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" onclick="PushContainer()">Add</button>
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modalUpContainer">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="TheTittle">Update Container<h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="panel-body">
                <div class="modal-body">
                    <input type="text" class="d-none" id="IdUpContainer">
                    <label for="Code" class="text-center">Code</label>
                    <input type="text" class="form-control" id="UpCode">
                    <br>
                    <label for="Size" class="text-center">Size</label>
                    <input type="text" class="form-control" id="UPSizeContainer">
                    <br>
                    <label for="PricePerDay" class="text-center">Price Per Day</label>
                    <input type="number" class="form-control" id="UpPricePerDay">
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-warning" onclick="UpdateContainer()">Update</button>
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modalAddTruck">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="TheTittle">Add Truck<h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="panel-body">
                <div class="modal-body">
                    <label for="Plate" class="text-center">Plate</label>
                    <input type="text" class="form-control" id="Plate">
                    <br>
                    <label for="Driver" class="text-center">Driver</label>
                    <input type="text" class="form-control" id="Driver">
                    <br>
                    <label for="costPerKM" class="text-center">Cost Per KM</label>
                    <input type="number" class="form-control" id="costPerKM">
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" onclick="PushTruck()">Add</button>
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="modalUpTruck">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="TheTittle">Add Truck<h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="panel-body">
                <div class="modal-body">
                    <input type="text" class="d-none" id="IdUpTruck">
                    <label for="Plate" class="text-center">Plate</label>
                    <input type="text" class="form-control" id="UpPlate">
                    <br>
                    <label for="Driver" class="text-center">Driver</label>
                    <input type="text" class="form-control" id="UpDriver">
                    <br>
                    <label for="costPerKM" class="text-center">Cost Per KM</label>
                    <input type="number" class="form-control" id="UpcostPerKM">
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-warning" onclick="UpdateTruck()">Update</button>
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // $("#CustomerList").select2();
    function ChangeService(service)
    {
        const ContainerService= document.getElementById("ContainerService");
        const TruckService= document.getElementById("TruckService");
        if(service == 1)
        {
            ContainerService.classList.remove("d-none");
            TruckService.classList.add("d-none");
            Gtotal();
        }
        else if(service == 2)
        {
            TruckService.classList.remove("d-none");
            ContainerService.classList.add("d-none");
            Gtotal();
        }
        else if(service == 3)
        {
            ContainerService.classList.remove("d-none");
            TruckService.classList.remove("d-none");
            Gtotal();
        }
    }

    function Gtotal()
    {
        const Service= document.getElementById("ServiceList").value;
        const Container= document.getElementById("ContainerList").value;
        const Days= document.getElementById("Days").value;
        const Truck= document.getElementById("TruckList").value;
        const Distance= document.getElementById("Distance").value;
        var Total= document.getElementById("TotalTrans");

        if(Service == 1)
        {
            Total.value= containers[Container-1].pricePerDay * Days;
        }
        else if(Service == 2)
        {
            Total.value= truks[Truck-1].costPerKM * Distance;
        }
        else if(Service == 3)
        {
            Total.value= containers[Container-1].pricePerDay * Days + truks[Truck-1].costPerKM * Distance;
        }
    }

    function PushTransaction() {
        const Customer = document.getElementById("CustomerList").value;
        let Service= document.getElementById("ServiceList").value;
        const Container= document.getElementById("ContainerList").value;
        let Days= document.getElementById("Days").value;
        const Truck= document.getElementById("TruckList").value;
        let Distance= document.getElementById("Distance").value;
        let Total= document.getElementById("TotalTrans").value;

        if(Service == 1)
        {
            transactions.push({
                id: transactions.length+1,
                customerId: Number(Customer),
                containerId: Number(Container),
                truckId: Number(0),
                rentalDays: Number(Days),
                distanceKM: Number(0),
                totalPrice: Number(Total),
                status: "Ongoing"
            });
            containers[(transactions[transactions.length-1].containerId)-1].status="OnDuty";
        }
        else if(Service == 2)
        {
            transactions.push({
                id: transactions.length+1,
                customerId: Number(Customer),
                containerId: Number(0),
                truckId: Number(Truck),
                rentalDays: Number(0),
                distanceKM: Number(Distance),
                totalPrice: Number(Total),
                status: "Ongoing"
            });
            truks[(transactions[transactions.length-1].truckId)-1].status="OnDuty";
        }
        else if(Service == 3)
        {
            transactions.push({
                id: transactions.length+1,
                customerId: Number(Customer),
                containerId: Number(Container),
                truckId: Number(Truck),
                rentalDays: Number(Days),
                distanceKM: Number(Distance),
                totalPrice: Number(Total),
                status: "Ongoing"
            });
            truks[(transactions[transactions.length-1].truckId)-1].status="OnDuty";
            containers[(transactions[transactions.length-1].containerId)-1].status="OnDuty";
        }


        document.getElementById("ServiceList").value=1;
        document.getElementById("Days").value="";
        document.getElementById("Distance").value="";
        document.getElementById("TotalTrans").value="";
        
        LoadDataTransaction(); // Update tampilan tabel
        $('#modalAddTransaction').modal('hide');
    }

    function PushCustomer() {
        const nama = document.getElementById("NamaCustomer").value;
        customers.push({ id: customers.length+1, name: nama, status: "Aktif" });
        LoadDataCustomer(); // Update tampilan tabel
        $('#modalAddCustomer').modal('hide');
    }

    function PushContainer() {
        const code = document.getElementById("Code").value;
        const size = document.getElementById("SizeContainer").value;
        const pricePerDay = document.getElementById("PricePerDay").value;
        containers.push({ id: containers.length+1, code: code, size: size, pricePerDay: pricePerDay, status: "Ready" });
        LoadDataContainer(); // Update tampilan tabel
        $('#modalAddContainer').modal('hide');
    }

    function PushTruck() {
        const plate = document.getElementById("Plate").value;
        const driver = document.getElementById("Driver").value;
        const costPerKM = document.getElementById("costPerKM").value;
        truks.push({ id: truks.length+1, plate: plate, driver: driver, costPerKM: costPerKM, status: "Ready" });
        LoadDataTruck(); // Update tampilan tabel
        $('#modalAddTruck').modal('hide');
    }

    function UpdateCustomer() {
        const id = document.getElementById("IdUpCustomer").value;
        const nama = document.getElementById("UpNamaCustomer").value;
        customers[id-1].name = nama;

        LoadDataCustomer(); // Update tampilan tabel
        $('#modalUpCustomer').modal('hide');
    }

    function UpdateContainer() {
        const id = document.getElementById("IdUpContainer").value;
        const code = document.getElementById("UpCode").value;
        const size = document.getElementById("UPSizeContainer").value;
        const price = document.getElementById("UpPricePerDay").value;

        containers[id-1].code = code;
        containers[id-1].size = size;
        containers[id-1].pricePerDay = price;

        LoadDataContainer(); // Update tampilan tabel
        $('#modalUpContainer').modal('hide');
    }

    function UpdateTruck() {
        const id = document.getElementById("IdUpTruck").value;
        const plate = document.getElementById("UpPlate").value;
        const driver = document.getElementById("UpDriver").value;
        const cost = document.getElementById("UpcostPerKM").value;

        truks[id-1].plate = plate;
        truks[id-1].driver = driver;
        truks[id-1].costPerKM = cost;

        LoadDataTruck(); // Update tampilan tabel
        $('#modalUpTruck').modal('hide');
    }
</script>