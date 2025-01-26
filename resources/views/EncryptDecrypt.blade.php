@extends('layouts.app')
@section('content')
    <script>
        var Task="Encrypt";
        function Change()
        {
            if(document.getElementById("Encrypt").checked)
            {
                Task="Encrypt";
            }
            else if(document.getElementById("Decrypt").checked)
            {
                Task="Decrypt";
            }
        }

        function generateIV()
        {
            let iv="";  
            const Length = "16";
            const UpperCase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            const LowerCase = "abcdefghijklmnopqrstuvwxyz";
            const Number = "0123456789";
            const Symbol = "@#$%^&*()_+={}[]<>?/~";

            var AllChars = UpperCase + LowerCase + Number + Symbol;

            while(Length > iv.length)
            {
                iv += AllChars[Math.floor(Math.random()*AllChars.length)];
            }
            document.getElementById("IVItem").value = iv;
        }

        function Generate()
        {
            $.ajax({
                type: "GET",
                url: '{{url("EncryptDecryptTask")}}',
                data: { 
                    "task": Task,
                    "text": $('#TextItem').val(),
                    "key": $('#KeyItem').val(),
                    "iv": $('#IVItem').val(),
                },
                success: function(result) {
                    $("#result").html(result);
                    
                },
                error: function(result) {
                    alert('Maaf Proses Generate Tanggu, Harap Hub Dev');
                }
            });
        }
        window.onload =function() {generateIV()};
    </script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="border">
                    <div class="card-body">
                        <h2 class="text-center">Encrypt And Decrypt</h2>
                        <br>
                        <div class="align-items-center">
                        <label class="text-center">Task: </label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Task" id="Encrypt" value="Encrypt" onchange="Change()" checked>
                                        <label class="form-check-label" for="Encrypt">Encrypt</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="Task" id="Decrypt" value="Decrypt" onchange="Change()">
                                        <label class="form-check-label" for="Decrypt">Decrypt</label>
                                    </div>
                                    <br><br>
                                    <label for="TextItem" class="text-center">Text</label>
                                    <input type="text" class="form-control" id="TextItem" require>
                                    <br>
                                    <label for="KeyItem" class="text-center">Key</label>
                                    <input type="text" class="form-control" id="KeyItem" require>
                                    <br>
                                    <label for="IVItem" class="text-center">IV</label>
                                    <div class="input-group input-group-lg">
                            
                                        <input type="text" class="form-control" id="IVItem" readonly>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" onclick="generateIV()" title="Generate" style="cursor:pointer;"><i class="bi bi-arrow-repeat"></i></span>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="button" class="btn btn-primary btn-block" onclick="Generate()">Generate</button>
                                    <br>
                                    <p id="result"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
