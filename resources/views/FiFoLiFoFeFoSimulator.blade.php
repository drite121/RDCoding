@extends('layouts.app')
@section('content')
    
    <script>
        var data;
        var count = 10;
        var DataIn;
        var DataOut;
    </script>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="bg-white border">
                    <div class="card-body">
                        <h2 class="text-center">Suggestion</h2>
                        <br>
                        <div class="form-group row">
                            <label for="SpeedIn" class="col-sm-2 col-form-label text-center">Speed In</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" aria-describedby="basic-addon2" id="SpeedIn" min="1" max="5" value="1">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">Second</span>
                                    </div>
                                </div>
                            </div>
                            <label for="SpeedOut" class="col-sm-2 col-form-label text-center">Speed Out</label>
                            <div class="col-sm-10">
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" aria-describedby="basic-addon2" id="SpeedOut" min="1" max="5" value="3">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">Second</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <label for="Type" class="col-sm-2 col-form-label text-center">Type</label>
                        <div class="form-check form-check-inline">
                            <input class=" form-check-input" type="radio" id="FiFo" name="Type" onchange='DisSpeed()' checked>
                            <label class="form-check-label" for="FiFo">FiFo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="LiFo" name="Type" onchange='DisSpeed()'>
                            <label class="form-check-label" for="LiFo">LiFo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="FeFo" name="Type" onchange='DisSpeed()'>
                            <label class="form-check-label" for="FeFo">FeFo</label>
                        </div>
                        <br><br>
                        <button type="button" class="btn btn-primary" onclick="Start()">Start</button>
                        <button type="button" class="btn btn-primary" onclick="Reset()">Reset</button>
                        <br><br>
                        <p class="border border-dark text-center" id="result">The simulation will appear here</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function SetupData()
        {
            if(document.getElementById("FiFo").checked || document.getElementById("LiFo").checked)
            {
                data = ['1','2','3','4','5','6','7','8','9','10'];
            }
            else if(document.getElementById("FeFo").checked)
            {
                data = [{N:"1",E:"3"},{N:"2",E:"5"},{N:"3",E:"1"},{N:"4",E:"6"},{N:"5",E:"9"},
                    {N:"6",E:"5"},{N:"7",E:"2"},{N:"8",E:"2"},{N:"9",E:"10"},{N:"10",E:"3"}];
            }
        }
       function onload(){
            if(document.getElementById("FiFo").checked || document.getElementById("LiFo").checked)
            {
                let i = 0;
                var text = "";
                for (;data[i];) {
                    text += data[i] + ", ";
                    i++;                
                }
            }
            else if(document.getElementById("FeFo").checked)
            {
                let i = 0;
                var text = "";
                for (;data[i];) {
                    text += "N: "+data[i].N + " Exp: "+ data[i].E +"<br>";
                    i++;                
                }
            }
            
            document.getElementById("result").innerHTML=text;
        }
        function ExpiredFilter() {
            let i = 0;
                for (;data[i];) {
                    console.log(data[i].E);
                    data[i].E -= 1;     
                    i++;          
                }
        }

        function Reset(){
            data = ['1','2','3','4','5','6','7','8','9','10'];
            count = 10;
            document.getElementById("result").innerHTML="The simulation will appear here";
            clearInterval(DataIn);
            clearInterval(DataOut);
        }
        
        function Start()
        {
            SetupData();
            var SpeedIn = document.getElementById("SpeedIn").value;
            var SpeedOut = document.getElementById("SpeedOut").value;

            if(document.getElementById("FiFo").checked || document.getElementById("LiFo").checked)
            {
                DataIn = setInterval(function(){
                data.push(count+=1);
                onload();
                }, SpeedIn*1000);
            }
            else if(document.getElementById("FeFo").checked)
            {
                DataIn = setInterval(function(){
                    
                let newData ={N: count+=1 , E: Math.floor(Math.random()*10)+10};
                data.push(newData);ExpiredFilter
                onload();
                }, 1000);
            }

            if(document.getElementById("FiFo").checked)
            {
                DataOut = setInterval(function(){
                    data.shift();
                    onload();
                    if(data.length==0)
                    {
                        document.getElementById("result").innerHTML="";
                        alert("Your Data is Empty, The Data Will Be Reset Again");
                        clearInterval(DataIn);
                        clearInterval(DataOut);
                        Reset();
                    }
                }, SpeedOut*1000);
            }
            
            else if(document.getElementById("LiFo").checked)
            {
                DataOut = setInterval(function(){
                    data.pop();
                    onload();
                    if(data.length==0)
                    {
                        document.getElementById("result").innerHTML="";
                        alert("Your Data is Empty, The Data Will Be Reset Again");
                        clearInterval(DataIn);
                        clearInterval(DataOut);
                        Reset();
                    }
                }, SpeedOut*1000);
            }

            else if(document.getElementById("FeFo").checked)
            {
                
                DataOut = setInterval(function(){
                let i = 0;
                for (;data[i];) {
                    data[i].E -= 1;
                    if(data[i].E<=0)
                    {
                        let spliced = data.splice(i, 1);
                    }
                    i++             
                }
                onload();
                }, 1000);
            }
        }
        function DisSpeed()
        {
            if(document.getElementById("FeFo").checked)
            {
                document.getElementById("SpeedIn").disabled = true;
                document.getElementById("SpeedOut").disabled = true;
            }
            else
            {
                document.getElementById("SpeedIn").disabled = false;
                document.getElementById("SpeedOut").disabled = false;
            }
        }
    </script>
@endsection
