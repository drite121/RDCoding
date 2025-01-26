@extends('layouts.app')
@section('content')
    <script>
        var Length = "12";
        
        const UpperCase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        const UpperCaseER = "ABCDEFGHJKMNPQRSTUVWXYZ";
        const LowerCase = "abcdefghijklmnopqrstuvwxyz";
        const LowerCaseER = "abcdefghijkmnpqrstuvwxyz";
        const Number = "0123456789";
        const NumberER = "23456789";
        const Symbol = "@#$%^&*()_+={}[]<>?/~";

        var AllChars = UpperCase + LowerCase + Number + Symbol;

        function Generate()
        {
            let password="";    
            if(document.getElementById('Uppercase').checked==false && document.getElementById('Lowercase').checked==false
            && document.getElementById('Symbols').checked == false && document.getElementById('Numbers').checked == false)
            {
                document.getElementById("GPBox").value = "";
                return;
            }
            while(Length > password.length)
            {
                password += AllChars[Math.floor(Math.random()*AllChars.length)];
            }
            // console.log(password);
            document.getElementById("GPBox").value = password;
        }
        
        function syncRtoN()
        {
            const value = document.querySelector("#LengthNumber");
            const input = document.querySelector("#LengthRange");
            value.value = input.value;
            input.addEventListener("input", (event) => {
            value.value = event.target.value;
            Length=input.value;
            Generate();
            });
        }

        function syncNtoR()
        {
            document.getElementById("LengthRange").value=document.getElementById("LengthNumber").value;
            Length=document.getElementById("LengthNumber").value;
            Generate();
        }

        function TypePassword(Tipe)
        {
            if(Tipe=="EasytoSay")
            {
                AllChars = UpperCase + LowerCase;

                document.getElementById('Uppercase').checked = true;
                document.getElementById('Lowercase').checked = true;
                document.getElementById('Symbols').checked = false;
                document.getElementById('Numbers').checked = false;

                document.getElementById('Uppercase').disabled = true;
                document.getElementById('Lowercase').disabled = true;
                document.getElementById('Symbols').disabled = true;
                document.getElementById('Numbers').disabled = true;
            }
            else if(Tipe=="EasytoRead")
            {
                AllChars = UpperCaseER + LowerCaseER + NumberER + Symbol;

                document.getElementById('Uppercase').checked = true;
                document.getElementById('Lowercase').checked = true;
                document.getElementById('Symbols').checked = true;
                document.getElementById('Numbers').checked = true;

                document.getElementById('Uppercase').disabled = true;
                document.getElementById('Lowercase').disabled = true;
                document.getElementById('Symbols').disabled = true;
                document.getElementById('Numbers').disabled = true;
            }
            else if(Tipe=="NumberOnly")
            {
                AllChars = Number + Number + Number + Number;

                document.getElementById('Uppercase').checked = false;
                document.getElementById('Lowercase').checked = false;
                document.getElementById('Symbols').checked = false;
                document.getElementById('Numbers').checked = true;

                document.getElementById('Uppercase').disabled = true;
                document.getElementById('Lowercase').disabled = true;
                document.getElementById('Symbols').disabled = true;
                document.getElementById('Numbers').disabled = true;
                
            }
            else if(Tipe=="AllCharacters")
            {
                AllChars = UpperCase + LowerCase + Number + Symbol;

                document.getElementById('Uppercase').checked = true;
                document.getElementById('Lowercase').checked = true;
                document.getElementById('Symbols').checked = true;
                document.getElementById('Numbers').checked = true;

                document.getElementById('Uppercase').disabled = true;
                document.getElementById('Lowercase').disabled = true;
                document.getElementById('Symbols').disabled = true;
                document.getElementById('Numbers').disabled = true;
            }
            else
            {
                AllChars = UpperCase + LowerCase + Number + Symbol;

                document.getElementById('Uppercase').checked = true;
                document.getElementById('Lowercase').checked = true;
                document.getElementById('Symbols').checked = true;
                document.getElementById('Numbers').checked = true;

                document.getElementById('Uppercase').disabled = false;
                document.getElementById('Lowercase').disabled = false;
                document.getElementById('Symbols').disabled = false;
                document.getElementById('Numbers').disabled = false;
            }
            Generate();
        }
        function Custom()
        {
            AllChars = "";

            if(document.getElementById('Uppercase').checked==true)
            {
                AllChars += UpperCase;
                console.log(AllChars);
            }

            if(document.getElementById('Lowercase').checked==true)
            {
                AllChars += LowerCase;
            }

            if(document.getElementById('Symbols').checked==true)
            {
                AllChars += Symbol;
            }

            if(document.getElementById('Numbers').checked==true)
            {
                AllChars += Number;
            }

            Generate();
        }

        function CopyText() {
            // Get the text field
            var copyText = document.getElementById("GPBox");

            // Select the text field
            copyText.select();
            copyText.setSelectionRange(0, 99999); // For mobile devices

            // Copy the text inside the text field
            navigator.clipboard.writeText(copyText.value);
            
            // Alert the copied text
            alert("Copied the text: " + copyText.value);
        }

        window.onload =function() {Generate(),syncRtoN()};
    </script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="border">
                    <div class="card-body">
                        <div class="input-group input-group-lg">
                            
                            <input type="text" class="form-control" id="GPBox">
                            <div class="input-group-prepend">
                                <span class="input-group-text" title="Copy" style="cursor:pointer;" onclick="CopyText()"><i class="bi bi-copy"></i></span>
                            </div>
                            <div class="input-group-prepend">
                                <span class="input-group-text" onclick="Generate()" title="Generate" style="cursor:pointer;"><i class="bi bi-arrow-repeat"></i></span>
                            </div>
                        </div>
                        <br>
                        <div class="border border-dark p-3">
                            <h2>Customize Password</h2>
                            <div class="form-row align-items-center">
                                <div class="col-md-4">
                                    <h5>Password Length</h5>
                                    <input type="range" class="form-range mt-2 col-sm-12" min="4" max="24" value="12" id="LengthRange"> 
                                    <input type="number" class="form-control" min="4" max="24" value="12" id="LengthNumber" onchange="syncNtoR()">
                                     
                                                                    
                                </div>

                                <div class="col-md-4">
                                    <div class="form-check m-3">
                                        <input class="form-check-input" type="radio" name="TypePassword" id="EasytoSay" onchange="TypePassword('EasytoSay')">
                                        <label class="form-check-label" for="EasytoSay" style="cursor:pointer;">
                                            <h5>Easy to Say <i class="bi bi-info-circle-fill" title="Password Hanya Berisi Tulisan" style="cursor:pointer;"></i></h5>
                                        </label>
                                    </div>
                                    <div class="form-check m-3">
                                        <input class="form-check-input" type="radio" name="TypePassword" id="EasytoRead" onchange="TypePassword('EasytoRead')">
                                        <label class="form-check-label" for="EasytoRead" style="cursor:pointer;">
                                            <h5>Easy to Read <i class="bi bi-info-circle-fill" title="Menghindari Menggunakan Huruf atau Angka yang Ambigu" style="cursor:pointer;"></i></h5>
                                        </label>
                                    </div>
                                    <div class="form-check m-3">
                                        <input class="form-check-input" type="radio" name="TypePassword" id="NumberOnly" onchange="TypePassword('NumberOnly')">
                                        <label class="form-check-label" for="NumberOnly" style="cursor:pointer;">
                                            <h5>Number Only <i class="bi bi-info-circle-fill" title="Password Hanya Berisi Angka" style="cursor:pointer;"></i></h5>
                                        </label>
                                    </div>
                                    <div class="form-check m-3">
                                        <input class="form-check-input" type="radio" name="TypePassword" id="AllCharacters" onchange="TypePassword('AllCharacters')" checked>
                                        <label class="form-check-label" for="AllCharacters" style="cursor:pointer;">
                                            <h5>All Characters <i class="bi bi-info-circle-fill" title="Mengkombinasikan Semua Karakter" style="cursor:pointer;"></i></h5>
                                        </label>
                                    </div>
                                    <div class="form-check m-3">
                                        <input class="form-check-input" type="radio" name="TypePassword" id="Custom" onchange="TypePassword('Custom')">
                                        <label class="form-check-label" for="Custom" style="cursor:pointer;">
                                            <h5>Custom <i class="bi bi-info-circle-fill" title="Kustom Password Berdasarkan yang Dicentang" style="cursor:pointer;"></i></h5>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-check  m-3">
                                        <input class="form-check-input" type="checkbox" value="" id="Uppercase" disabled checked onchange="Custom()">
                                        <label class="form-check-label" for="Uppercase" style="cursor:pointer;">
                                            <h4>Uppercase</h4>
                                        </label>
                                    </div>
                                    <div class="form-check m-3">
                                        <input class="form-check-input" type="checkbox" value="" id="Lowercase" disabled checked onchange="Custom()">
                                        <label class="form-check-label" for="Lowercase" style="cursor:pointer;">
                                            <h4>Lowercase</h4>
                                        </label>
                                    </div>
                                    <div class="form-check m-3">
                                        <input class="form-check-input" type="checkbox" value="" id="Numbers" disabled checked onchange="Custom()">
                                        <label class="form-check-label" for="Numbers" style="cursor:pointer;">
                                            <h4>Numbers</h4>
                                        </label>
                                    </div>
                                    <div class="form-check m-3">
                                        <input class="form-check-input" type="checkbox" value="" id="Symbols" disabled checked onchange="Custom()">
                                        <label class="form-check-label" for="Symbols" style="cursor:pointer;">
                                            <h4>Symbols</h4>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
