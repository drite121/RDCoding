@extends('layouts.app')
@section('content')
@include('modalDel')
@include('modalHistoryN')
@include('modalDetailN')
@include('modalAddItem')
<script>
    var barang={!! json_encode($listData->toArray(), JSON_HEX_TAG) !!};
        var item=[];
        var qty=[];
        var alldata=[];
        function filterFunction(input,dropdown) {
            var input, filter, ul, li, a, i;
            input = document.getElementById(input);
            filter = input.value.toUpperCase();
            div = document.getElementById(dropdown);
            a = div.getElementsByTagName("p");
            if(filter.length>0)
            {
                for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                    div.style.display = "";
                }
                else {
                    a[i].style.display = "none";
                }
                }
            }
            else
            {
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                    a[i].style.display = "none";
                    div.style.display = "none";
                }
            }
        }
        function MF(number)
        {
            return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR"
            }).format(number);
        }

        $(function () {
            $('.AddItem').on('click', function (e) {
                e.preventDefault();
                $('#AddItem').modal({ backdrop: 'static', keyboard: false })
                    .on('click', function(){
                    var $url=$('.form').attr('action');
                        window.open($url, '_self');
                    });
            });
        });

        $(function () {
            $('.ShowHistoryN').on('click', function (e) {
                e.preventDefault();
                $('#modalHistoryN').modal({ backdrop: 'static', keyboard: false })
                    .on('click', function(){
                    var $url=$('.form').attr('action');
                        window.open($url, '_self');
                    });
                
                    $.ajax({
                        type: "GET",
                        url: '{{url("ListNota")}}',
                        success: function(result) {
                            // console.log(result[1].tanggal);
                            const list = document.getElementById("ListHistoryN");
                            while (list.hasChildNodes()) {
                                list.removeChild(list.firstChild);
                            }
                            if(!result.length)
                            {
                                const NewHN = document.createElement("div");
                                NewHN.setAttribute("class", "border d-flex justify-content-center");
                                const TheNota = document.createElement("Label");
                                TheNota.innerHTML="No data input today";
                                NewHN.appendChild(TheNota);
                                list.appendChild(NewHN); 
                            }
                            var i=0
                            for(;i<result.length;)
                            {
                                const NewHN = document.createElement("div");
                                NewHN.setAttribute("class", "border");
                                NewHN.setAttribute("onclick", "ShowDetailN('"+result[i].nonota+"')");
                                const TheNota = document.createElement("Label");
                                TheNota.setAttribute("style", "color:blue;cursor: pointer;");
                                TheNota.setAttribute("class", "mb-0 py-2 pl-2");
                                
                                TheNota.innerHTML=result[i].tanggal+"/"+result[i].nonota;
                                NewHN.appendChild(TheNota);
                                list.appendChild(NewHN); 
                                i++
                            }
                        },
                        error: function(result) {
                            alert('Maaf Proses Generate ERROR, Harap Hub Dev');
                        }
                    });
                    $.ajax({
                        type: "GET",
                        url: '{{url("DetailNota")}}',
                        success: function(result) {
                            // console.log(result);
                            alldata=result;
                        },
                        error: function(result) {
                            alert('Maaf Proses Generate ERROR, Harap Hub Dev');
                        }
                    });
            });
        });

        function ShowDetailN(Nota)
        {
            $('#modalDetailN').modal({ backdrop: 'static', keyboard: false })
            .on('click', function(){
                var $url=$('.form').attr('action');
                window.open($url, '_self');
            });
                $('#modalHistoryN').modal('hide');

            const list = document.getElementById("ListBarangN");
            while (list.hasChildNodes()) {
                list.removeChild(list.firstChild);
            }
            var MGT=0;
            var i=0;
            for(;i<alldata.length;)
            {
                if(i==0)
                {   
                    const NewHead = document.createElement("div");
                    NewHead.setAttribute("class", "form-row align-items-center border-bottom");
                    //Name
                    const HeadName = document.createElement("div");
                    HeadName.setAttribute("class", "col-md-4");
                    const TheName = document.createElement("p");
                    TheName.innerHTML="Nama";
                    HeadName.appendChild(TheName);
                    //Qty
                    const HeadOrder = document.createElement("div");
                    HeadOrder.setAttribute("class", "col-md-2");
                    const TheOrder = document.createElement("p");
                    TheOrder.innerHTML="Qty";
                    HeadOrder.appendChild(TheOrder);
                    //Price
                    const HeadPrice = document.createElement("div");
                    HeadPrice.setAttribute("class", "col-md-3");
                    const ThePrice = document.createElement("p");
                    ThePrice.innerHTML="Price";
                    HeadPrice.appendChild(ThePrice);
                    //Total
                    const HeadTotal = document.createElement("div");
                    HeadTotal.setAttribute("class", "col-md-3");
                    const TheTotal = document.createElement("p");
                    TheTotal.innerHTML="Total";
                    HeadTotal.appendChild(TheTotal);

                    NewHead.appendChild(HeadName);
                    NewHead.appendChild(HeadOrder);
                    NewHead.appendChild(HeadPrice);
                    NewHead.appendChild(HeadTotal);

                    list.appendChild(NewHead);
                }
                if(alldata[i].nonota==Nota)
                {
                    const HistoryItem = document.createElement("div");
                    HistoryItem.setAttribute("class", "form-row align-items-center border-bottom");
                    

                    //Name
                    const HistoryName = document.createElement("div");
                    HistoryName.setAttribute("class", "col-md-4");
                    const TheName = document.createElement("p");
                    TheName.innerHTML=alldata[i].nama;
                    HistoryName.appendChild(TheName);
                    //Qty
                    const HistoryOrder = document.createElement("div");
                    HistoryOrder.setAttribute("class", "col-md-2");
                    const TheOrder = document.createElement("p");
                    TheOrder.innerHTML=(alldata[i].qty);
                    HistoryOrder.appendChild(TheOrder);
                    //Price
                    const HistoryPrice = document.createElement("div");
                    HistoryPrice.setAttribute("class", "col-md-3");
                    const ThePrice = document.createElement("p");
                    ThePrice.innerHTML=MF(alldata[i].harga);
                    HistoryPrice.appendChild(ThePrice);
                    //Total
                    const HistoryTotal = document.createElement("div");
                    HistoryTotal.setAttribute("class", "col-md-3");
                    const TheTotal = document.createElement("p");
                    TheTotal.setAttribute("id", "Total"+alldata[i].code);
                    TheTotal.innerHTML=MF(alldata[i].harga*alldata[i].qty);
                    HistoryTotal.appendChild(TheTotal);

                    HistoryItem.appendChild(HistoryName);
                    HistoryItem.appendChild(HistoryOrder);
                    HistoryItem.appendChild(HistoryPrice);
                    HistoryItem.appendChild(HistoryTotal);
                    MGT+=alldata[i].harga*alldata[i].qty;

                    list.appendChild(HistoryItem);
                    document.getElementById('tanggal').innerHTML=alldata[i].tanggal;
                }
                i++
            }
            document.getElementById("MGT").innerHTML=MF(MGT);

            // document.getElementById('printn').src = '{{url("PrintNota")}}'+'/'+Nota;
            
            document.getElementById('nomor').innerHTML=Nota;
        }

    $('.tutup').click(function() {
        $('#modalHistoryN').modal('show');
    });
        
    </script>
    <div class="container-fluid">
        <div class="row justify-content-center">
        <div class="col-sm-8">
                <div class="bg-white border">
                <h2 class="text-center mt-2">Simple Cashier System</h2>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="bg-white border">
                    <div class="card-body">
                        
                        <div class="align-items-center">
                        <button type="button" class="btn btn-primary btn-sm float-right AddItem">New Item</button>
                            <label for="TextItem" class="text-center">Item</label>
                            <input type="text" class="form-control" id="TextItem"  onkeyup="filterFunction('TextItem','DropdownTable')" placeholder="Code/Name" require>
                            <div id="DropdownTable" class="position-sticky sticky-top">
                            <!-- <p style="border:1px solid black;margin-bottom: 0px;display: none" class="form-control" onclick="ChangeValue('TextItem','DropdownUser','Lion - Singa')">Lion - Singa</p> -->
                            </div>
                            <label><i>click the item to add</i></label>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="bg-white border">
                    <div class="card-body"id="listItem">
                        <div class="form-row align-items-center border-bottom">
                            <div class="col-md-3">     
                                <p>Items</p>
                            </div>
                            <div class="col-md-3">
                                <p>Qty</p>
                            </div>
                            <div class="col-md-3">
                                <p>@price</p>
                            </div>
                            <div class="col-md-2">
                                <p>Total</p>
                            </div>
                            <div class="col-md-1">
                            </div>
                        </div>

                        <div class="form-row align-items-center" id="DivGTotal">
                            <div class="col-md-3">     
                                
                            </div>
                            <div class="col-md-3">
                            </div>
                            <div class="col-md-3">
                                <p>Grand Total</p>
                            </div>
                            <div class="col-md-2">
                                <p id="GrandTotal">0</p>
                            </div>
                            <div class="col-md-1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="bg-white border">
                    <div class="card-body"id="listItem">
                        <iframe src="" id="printn" name="printn" class="d-none"></iframe>
                        <div class="form-row align-items-center border-bottom">
                            <button type="button" class="btn btn-primary btn-block" onclick="Finish()">Finish</button>
                            <button type="button" class="btn btn-primary btn-block ShowHistoryN">History Nota</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        //show data
        function onloadBarang(){
            let i = 0;
            for (;barang[i];) {
                var data = document.createElement("p");
                data.style.border="1px solid black";
                data.style.marginBottom="0px";
                data.style.display="none";
                data.classList.add("form-control");
                data.setAttribute("onclick", 'AddItems('+'"'+barang[i].code+'"'+')');
                data.innerHTML=barang[i].code+"/"+barang[i].nama;
                document.getElementById("DropdownTable").appendChild(data);
                i++;                
            }
        }
        onloadBarang();
        
        function AddItems(code){
            var i=0;

            for(;i<barang.length;)
            {
                if(item.includes(code))
                {
                    x=parseInt(document.getElementById("Order"+code+"").value);
                    document.getElementById("Order"+code).value=x+1;
                    let getindex = item.indexOf(code);
                    qty[getindex]= x+1;
                    break;
                }
                else
                {
                    if(barang[i].code==code)
                    {
                        item.push(barang[i].code);
                        qty.push(1);
                        //HEAD
                        const NewItem = document.createElement("div");
                        NewItem.setAttribute("class", "form-row align-items-center border-bottom");
                        NewItem.setAttribute("id", "Div"+code);
                        //Name
                        const NewName = document.createElement("div");
                        NewName.setAttribute("class", "col-md-3");
                        const TheName = document.createElement("p");
                        TheName.innerHTML=barang[i].nama;
                        NewName.appendChild(TheName);
                        //Qty
                        const NewOrder = document.createElement("div");
                        NewOrder.setAttribute("class", "col-md-3");
                        const TheOrder = document.createElement("input");
                        TheOrder.setAttribute("type", "number");
                        TheOrder.setAttribute("class", "form-control mx-0");
                        TheOrder.setAttribute("id", "Order"+barang[i].code);
                        TheOrder.setAttribute("onchange", "Total()");
                        TheOrder.value=1;
                        NewOrder.appendChild(TheOrder);
                        //Price
                        const NewPrice = document.createElement("div");
                        NewPrice.setAttribute("class", "col-md-3");
                        const ThePrice = document.createElement("p");
                        ThePrice.setAttribute("id", "SPrice"+barang[i].code);
                        ThePrice.innerHTML=MF(barang[i].harga);
                        //HidPrice
                        const TheHidPrice = document.createElement("p");
                        TheHidPrice.setAttribute("id", "Price"+barang[i].code);
                        TheHidPrice.setAttribute("class", "d-none");
                        TheHidPrice.innerHTML=barang[i].harga;
                        NewPrice.appendChild(ThePrice);
                        NewPrice.appendChild(TheHidPrice);
                        //Total
                        const NewTotal = document.createElement("div");
                        NewTotal.setAttribute("class", "col-md-2");
                        const TheTotal = document.createElement("p");
                        TheTotal.setAttribute("id", "Total"+barang[i].code);
                        TheTotal.innerHTML=barang[i].harga;
                        NewTotal.appendChild(TheTotal);

                        //Trash
                        const NewTrash = document.createElement("div");
                        NewTrash.setAttribute("class", "col-md-1");
                        const TheButtonTrash = document.createElement("button");
                        TheButtonTrash.setAttribute("type", "button");
                        TheButtonTrash.setAttribute("class", "btn btn-danger btn-block");
                        TheButtonTrash.innerHTML="<i class='bi bi-trash'></i>";
                        TheButtonTrash.setAttribute("onclick", "ShowModal('"+barang[i].code+"')");
                        // const TheTrash = document.createElement("i");
                        // TheTrash.setAttribute("class", "bi bi-trash");
                        NewTrash.appendChild(TheButtonTrash);

                        //fusion
                        NewItem.appendChild(NewName);
                        NewItem.appendChild(NewOrder);
                        NewItem.appendChild(NewPrice);
                        NewItem.appendChild(NewTotal);
                        NewItem.appendChild(NewTrash);
                        const DivGTotal=document.getElementById("DivGTotal");
                        document.getElementById("listItem").insertBefore(NewItem,DivGTotal);
                        break;
                    }
                }
                i++
            }
            
            document.getElementById("TextItem").value="";
            //hidden the suggestion
            div = document.getElementById("DropdownTable");
            div.style.display = "none";
            a = div.getElementsByTagName("p");
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                    a[i].style.display = "none";
            }

            Total();
        }

        function Total()
        {
            var Gtotal = 0;
            var i=0;
            for(;i<item.length;)
            {
                var order=parseInt(document.getElementById("Order"+item[i]).value);
                var price=parseInt(document.getElementById("Price"+item[i]).innerHTML);
                var total = order*price;
                qty[i]=order;
                document.getElementById("Total"+item[i]).innerHTML=MF(total);
                
                Gtotal +=total;
                document.getElementById("GrandTotal").innerHTML=MF(Gtotal);
                i++
            }
        }

        function ShowModal(code)
        {
            $('#modalDel').modal({ backdrop: 'static', keyboard: false })
            .on('click', function(){
                var $url=$('.form').attr('action');
                window.open($url, '_self');
            });
            var i=0;
            for(;i<barang.length;)
            {                
                if(barang[i].code==code)
                {
                    document.getElementById("TheText").innerHTML =barang[i].nama;
                }
                i++
            }
            document.getElementById("DelAgree").setAttribute("onclick", "Delete('"+code+"')");
        }

        function Checkitem(value) {
            return value != code;
        }

        function Delete(code)
        {
            const Delete = document.getElementById("Div"+code);
            Delete.parentNode.removeChild(Delete);
            let index = item.indexOf(code,0)
            item.splice(index, 1);
            if(item.length==0)
            {
                document.getElementById("GrandTotal").innerHTML=0;
            }
            Total();
        }

        function Finish()
        {
            //submit data ke DB
            $.ajax({
                type: "GET",
                url: '{{url("FinishNota")}}',
                data: { 
                    "Code": item,
                    "Qty": qty,
                    },
                    success: function(result) {
                        // console.log(result)
                        Clear();
                        // document.getElementById('printn').src = '{{url("PrintNota")}}'
                        document.getElementById('printn').src = '{{url("PrintNota")}}'+'/'+result;
                    },
                    error: function(result) {
                        alert('Maaf Proses Generate ERROR, Harap Hub Dev');
                    }
            });
            
        }
        // clear item di chart
        function Clear()
        {
            var j=0;
            for(;j<item.length;)
            {
                const Delete = document.getElementById("Div"+item[j]);
                Delete.parentNode.removeChild(Delete);
                j++
            }

            item.splice(0, item.length);
            if(item.length==0)
            {
                document.getElementById("GrandTotal").innerHTML=0;
            }
        }

        function AddBarang()
    {
        const code = document.getElementById('Code').value
        const name = document.getElementById('Nama').value
        const price = document.getElementById('Price').value
        $.ajax({
            type: "GET",
            url: '{{url("AddBarang")}}',
            data: { 
                "Code": code,
                "Name": name,
                "Price": price,
            },
            success: function(result) {
                alert(result);
            },
            error: function(result) {
                alert('Maaf Proses Generate ERROR, Harap Hub Dev');
            }
        });

        $.ajax({
                type: "GET",
                url: '{{url("ListBarang")}}',
                success: function(result) {
                    barang=result;
                    const listB = document.getElementById("DropdownTable");
                    while (listB.hasChildNodes()) {
                        listB.removeChild(listB.firstChild);
                    }
                    onloadBarang();
                },
                error: function(result) {
                    alert('Maaf Proses Generate ERROR, Harap Hub Dev');
                }
            });
        document.getElementById('Code').value = "";
        document.getElementById('Nama').value = "";
        document.getElementById('Price').value = 0;
        document.getElementById('format').innerHTML = 'Rp 0,00';
    }
    </script>
@endsection
