@extends('layouts.app')
@section('content')
@include('modalDel')
<script>
        var barang={!! json_encode($listData->toArray(), JSON_HEX_TAG) !!};
        var item=[];
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

        
    </script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="bg-white border">
                    <div class="card-body">
                        <h2 class="text-center">Simple Cashier System</h2>
                        <br>
                        <div class="align-items-center">
                            <label for="TextItem" class="text-center">Item</label>
                            <input type="text" class="form-control" id="TextItem"  onkeyup="filterFunction('TextItem','DropdownTable')" placeholder="Code/Name" require>
                            <div id="DropdownTable" class="position-sticky sticky-top">
                            <!-- <p style="border:1px solid black;margin-bottom: 0px;display: none" class="form-control" onclick="ChangeValue('TextItem','DropdownUser','Lion - Singa')">Lion - Singa</p> -->
                            </div>
                            <label><i>click to add the item</i></label>
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
                                <p>Order</p>
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
                        <div class="form-row align-items-center border-bottom">
                        <button type="button" class="btn btn-primary btn-block" onclick="Clear()">Clear Item</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        //show data
        function onload(){
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
        onload();
        //change value when clicked
        
        function AddItems(code){
            var i=0;

            for(;i<barang.length;)
            {
                if(item.includes(code))
                {
                    x=parseInt(document.getElementById("Order"+code+"").value);
                    document.getElementById("Order"+code).value=x+1;
                    break;
                }
                else
                {
                    if(barang[i].code==code)
                    {
                        item.push(barang[i].code);
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
                        //Order
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
                        ThePrice.setAttribute("id", "Price"+barang[i].code);
                        ThePrice.innerHTML=barang[i].harga;
                        NewPrice.appendChild(ThePrice);
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
                document.getElementById("Total"+item[i]).innerHTML=total;
                
                Gtotal +=total;
                document.getElementById("GrandTotal").innerHTML=Gtotal;
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
            for(;i<item.length;)
            {
                if(barang[i].code==code)
                {
                    document.getElementById("TheText").innerHTML ="Are you sure to delete "+barang[i].nama;
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

        function Clear()
        {
            var i=0;
            for(;i<item.length;)
            {
                
                const Delete = document.getElementById("Div"+item[i]);
                Delete.parentNode.removeChild(Delete);
                
                i++
            }

            item.splice(0, item.length);
            if(item.length==0)
            {
                document.getElementById("GrandTotal").innerHTML=0;
            }
        }
    </script>
@endsection
