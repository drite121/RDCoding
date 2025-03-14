@extends('layouts.app')
@section('content')
    
    <script>
        var animal=["Lion - Singa"
        ,"Elephant - Gajah"
        ,"Tiger - Harimau"
        ,"Giraffe - Jerapah"
        ,"Monkey - Monyet"
        ,"Dolphin - Lumba-lumba"
        ,"Penguin - Pinguin"
        ,"Kangaroo - Kanguru"
        ,"Zebra - Zebra"
        ,"Panda - Panda"
        ];

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
                <div class="border">
                    <div class="card-body">
                        <h2 class="text-center">Suggestion</h2>
                        <br>
                        <div class="align-items-center">
                        <label for="TextItem" class="text-center">Type Animal</label>
                        <input type="text" class="form-control" id="TextItem"  onkeyup="filterFunction('TextItem','DropdownTable')">
                        <div id="DropdownTable">
                        <!-- <p style="border:1px solid black;margin-bottom: 0px;display: none" class="form-control" onclick="ChangeValue('TextItem','DropdownUser','Lion - Singa')">Lion - Singa</p> -->
                        </div>
                        <br>
                        <button type="button" class="btn btn-primary btn-block" onclick="AddData()">Add</button>
                        <p><i>Click Button to Add new Suggestion</i></p>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        //show data
        function onload(){
            let i = 0;
            for (;animal[i];) {
                var data = document.createElement("p");
                data.style.border="1px solid black";
                data.style.marginBottom="0px";
                data.style.display="none";
                data.classList.add("form-control");
                data.setAttribute("onclick", 'ChangeValue("TextItem","DropdownTable",'+'"'+animal[i]+'"'+')');
                data.innerHTML=animal[i];
                document.getElementById("DropdownTable").appendChild(data);
                i++;                
            }
        }
        onload();
        //change value when clicked
        function ChangeValue(input,dropdown,value){
            input = document.getElementById(input);
            input.value=value;
            div = document.getElementById(dropdown);
            div.style.display = "none";
            a = div.getElementsByTagName("p");
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                    a[i].style.display = "none";
            }
        }
        //add new animal
        function AddData(){
            let newData = document.getElementById("TextItem").value;
            let i = 0;
            for (;animal[i];) {
                if(animal[i]!=newData)
                {
                    if(i==animal.length-1)
                    {
                        
                        var data = document.createElement("p");
                        data.style.border="1px solid black";
                        data.style.marginBottom="0px";
                        data.style.display="none";
                        data.classList.add("form-control");
                        data.setAttribute("onclick", 'ChangeValue("TextItem","DropdownTable",'+'"'+newData+'"'+')');
                        data.innerHTML=newData;
                        document.getElementById("DropdownTable").appendChild(data);
                        animal.push(newData);
                        document.getElementById("TextItem").value="";
                        break;
                    }
                    else;
                    {
                        i++
                    }
                }
                else
                {
                    alert("The Data Already Exists");
                    break;
                }    
            }
            
            
        }

    </script>
@endsection
