@extends('layouts.app')
@section('content')
    <script>
    var data = [];
    function AddNSort() {
        

        data.push(document.getElementById("TextData").value);
        document.getElementById("TextData").value="";
        data.sort()

        // document.getElementById("result").innerHTML(data);

        let i = 0;
        let text = "";
        for (;data[i];) {
            text += data[i] + "<br>";
            i++;
        }
        document.getElementById("result").innerHTML = text;
        document.getElementById("Clear").style.display = "block";
        // console.log(data);
    };

    function Clear() {
    
        var data = [];
        document.getElementById("result").innerHTML = "";
        document.getElementById("Clear").style.display = "none";
        // console.log(data);
    };

    </script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="bg-white border">
                    <div class="card-body">
                        <h2 class="text-center">Sort Data JS</h2>
                        <br>
                        <div class="align-items-center">
                            <div class="form-row align-items-center">
                                <div class="col-md-3">                                
                                </div>
                                <div class="col-md-6">
                                    <label for="TextData" class="text-center">Text Data</label>
                                    <input type="text" class="form-control" id="TextData" onchange="AddNSort()">
                                    <label>*untuk memasukkan data tinggal tulis & enter
                                    <br>
                                    <button type="button" class="btn btn-sm btn-primary" id="Clear" onclick="Clear()" style="display:none">Clear</button>
                                    <p id="result"></p>
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
