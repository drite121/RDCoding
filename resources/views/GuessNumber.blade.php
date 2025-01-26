@extends('layouts.app')
@section('content')
    <script>
        
        // console.log(TN);
        var LG=1;
        var HG=100;
        var TN=Math.floor(Math.random()* (HG - LG) + LG);
        console.log("tn"+TN);
        function Guess()
        {
            var Number = parseInt(document.getElementById("Number").value)
            if(Number != TN)
            {
                if(LG<Number && Number<HG)
                {
                    if(Number < TN)
                    {
                        LG = Number;
                        document.getElementById("Low").innerHTML = LG;
                        TN=Math.floor(Math.random()* (HG - LG) + LG);
                    }
                    else if(Number > TN)
                    {
                        HG = Number;
                        document.getElementById("High").innerHTML = HG;
                        TN=Math.floor(Math.random()* (HG - LG) + LG);
                    }
                    console.log("tn"+TN);
                    if(TN==LG)
                    {
                        TN=TN+1;
                        console.log("tn"+TN);
                    }
                    if(TN==HG)
                    {
                        TN=TN-1;
                        console.log("tn"+TN);
                    }
                }
                else
                {
                    alert("Oops, You Can't Guess Using This Number");
                }
            }
            else
            {
                alert("You are Right, The Number is "+TN);
                LG=1;
                HG=100;
                TN=Math.floor(Math.random()* (HG - LG) + LG);
                document.getElementById("Low").innerHTML = LG;
                document.getElementById("High").innerHTML = HG;
                console.log("tn"+TN);
            }
        }
    </script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="border">
                    <div class="card-body">
                        <h2 class="text-center">I am Thinking of a number Between 1 - 100</h2>
                        <h2 class="text-center">Can You Guess it</h2>
                        <br>
                        <div class="align-items-center">
                            <div class="form-row align-items-center">
                                <div class="col-md-3">                                
                                </div>
                                <div class="col-md-6">
                                    <input type="number"  class="form-control" id="Number" min=1 max=100>
                                    <br>
                                    <button type="button" class="btn btn-primary btn-block" onclick="Guess()">Guess</button>
                                    <br>
                                    <p>Guess Number <label id="Low">1</label> - <label id="High">100</label></p>
                                </div>
                                <div class="col-md-3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
