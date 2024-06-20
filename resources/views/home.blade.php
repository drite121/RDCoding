@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card">
                    <!-- <a href="Notification">
                        <div class="card-body border" >
                            <span class="h5">Notification</span>
                            <span class="float-right" style=margin-buttom:0px>tgl 17-Mar-2024</span>
                        </div>
                    </a> -->
                    <!-- page 1 -->
                    <div id="Page1">
                        <a href="EncryptDecrypt">
                            <div class="card-body border" >
                                <span class="h5">EncryptDecrypt</span>
                                <span class="float-right" style=margin-buttom:0px>tgl 02-Jun-2024</span>
                            </div>
                        </a>
                        <a href="GetIP">
                            <div class="card-body border" >
                                <span class="h5">Get IP</span>
                                <span class="float-right" style=margin-buttom:0px>tgl 26-Mei-2024</span>
                            </div>
                        </a>
                        <a href="FiFoLiFoFeFoSimulator">
                            <div class="card-body border" >
                                <span class="h5">FiFo LiFo FeFo Simulation</span>
                                <span class="float-right" style=margin-buttom:0px>tgl 19-Mei-2024</span>
                            </div>
                        </a>
                        <a href="SignaturePad">
                            <div class="card-body border" >
                                <span class="h5">Signature Pad</span>
                                <span class="float-right" style=margin-buttom:0px>tgl 12-Mei-2024</span>
                            </div>
                        </a>
                        <a href="Suggestion">
                            <div class="card-body border" >
                                <span class="h5">Suggestion</span>
                                <span class="float-right" style=margin-buttom:0px>tgl 05-Mei-2024</span>
                            </div>
                        </a>
                        <a href="ToDoList">
                            <div class="card-body border" >
                                <span class="h5">ToDo List</span>
                                <span class="float-right" style=margin-buttom:0px>tgl 28-Apr-2024</span>
                            </div>
                        </a>
                        <a href="DataTabel">
                            <div class="card-body border" >
                                <span class="h5">Data Tabel</span>
                                <span class="float-right" style=margin-buttom:0px>tgl 21-Apr-2024</span>
                            </div>
                        </a>
                        <a href="EyeDroper">
                            <div class="card-body border" >
                                <span class="h5">Eye Droper</span>
                                <span class="float-right" style=margin-buttom:0px>tgl 14-Apr-2024</span>
                            </div>
                        </a>
                        <a href="YoutubePlayer">
                            <div class="card-body border" >
                                <span class="h5">Youtube Player</span>
                                <span class="float-right" style=margin-buttom:0px>tgl 07-Apr-2024</span>
                            </div>
                        </a>
                        <a href="ColorPalette">
                            <div class="card-body border" >
                                <span class="h5">Color Palette</span>
                                <span class="float-right" style=margin-buttom:0px>tgl 31-Mar-2024</span>
                            </div>
                        </a>
                    </div>
                    <!-- page 2 -->
                    <div style="display:none" id="Page2">
                        <a href="DadJokes">
                            <div class="card-body border" >
                                <span class="h5">Dad Jokes</span>
                                <span class="float-right" style=margin-buttom:0px>tgl 24-Mar-2024</span>
                            </div>
                        </a>
                        <a href="GuessNumber">
                            <div class="card-body border" >
                                <span class="h5">Guess The Number</span>
                                <span class="float-right" style=margin-buttom:0px>tgl 17-Mar-2024</span>
                            </div>
                        </a>
                        <a href="Currency">
                            <div class="card-body border" >
                                <span class="h5">Currency</span>
                                <span class="float-right" style=margin-buttom:0px>tgl 10-Mar-2024</span>
                            </div>
                        </a>
                        <a href="Chart">
                            <div class="card-body border" >
                                <span class="h5">Chart</span>
                                <span class="float-right" style=margin-buttom:0px>tgl 03-Mar-2024</span>
                            </div>
                        </a>
                        <a href="BarcodeGenerator">
                            <div class="card-body border" >
                                <span class="h5">Barcode Generator</span>
                                <span class="float-right" style=margin-buttom:0px>tgl 25-Feb-2024</span>
                            </div>
                        </a>
                        <a href="QRScanner">
                            <div class="card-body border" >
                                <span class="h5">QR Scanner</span>
                                <span class="float-right" style=margin-buttom:0px>tgl 18-Feb-2024</span>
                            </div>
                        </a>
                        <a href="SortDataJS">
                            <div class="card-body border" >
                                <span class="h5">Sort Data JS</span>
                                <span class="float-right" style=margin-buttom:0px>tgl 11-Feb-2024</span>
                            </div>
                        </a>
                        <a href="QRGenerator">
                            <div class="card-body border" >
                                <span class="h5">QR Generator</span>
                                <span class="float-right" style=margin-buttom:0px>tgl 04-Feb-2024</span>
                            </div>
                        </a>
                        <a href="BMICalculator">
                            <div class="card-body border" >
                                <span class="h5">BMI Calculator</span>
                                <span class="float-right" style=margin-buttom:0px>tgl 28-Jan-2024</span>
                            </div>
                        </a>
                        <a href="PasswordGenerator">
                            <div class="card-body border" >
                                <span class="h5">Password Generator</span>
                                <span class="float-right" style=margin-buttom:0px>tgl 21-Jan-2024</span>
                            </div>
                        </a>
                    </div>
                    <!-- page 3 -->
                    <div style="display:none" id="Page3">
                        <a href="GameHitung">
                            <div class="card-body border" >
                                <span class="h5">Game Hitung</span>
                                <span class="float-right" style=margin-buttom:0px>tgl 14-Jan-2024</span>
                            </div>
                        </a>
                        <a href="Random">
                            <div class="card-body border" >
                                <span class="h5">Random</span>
                                <span class="float-right" style=margin-buttom:0px>tgl 07-Jan-2024</span>
                            </div>
                        </a>
                    </div>
                    <br>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled"  onclick="ChangePage('Previous')" id="Previous">
                            <a class="page-link" href="#">Previous</a>
                            </li>
                            <li class="page-item active" onclick="ChangePage(1)" id="1"><a class="page-link" href="#">1</a></li>
                            <li class="page-item" onclick="ChangePage(2)" id="2"><a class="page-link" href="#">2</a></li>
                            <li class="page-item" onclick="ChangePage(3)" id="3"><a class="page-link" href="#">3</a></li>
                            <li class="page-item" onclick="ChangePage('Next')" id="Next">
                            <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <script>
        var Cpages=1;
        const Mpages=3;
        function ChangePage(x)
        {
            
            if(x=="Previous")
            {
                if(Cpages>1)
                {
                    document.getElementById(Cpages).classList.remove("active");
                    document.getElementById("Page"+Cpages).style.display="none";
                    Cpages-=1;
                    document.getElementById(Cpages).classList.add("active");
                    document.getElementById("Page"+Cpages).style.display="block";
                }
            }
            else if(x=="Next")
            {
                if(Cpages<Mpages)
                {
                    document.getElementById(Cpages).classList.remove("active");
                    document.getElementById("Page"+Cpages).style.display="none";
                    Cpages+=1;
                    document.getElementById(Cpages).classList.add("active");
                    document.getElementById("Page"+Cpages).style.display="block";
                }
            }
            else
            {
                document.getElementById(Cpages).classList.remove("active");
                document.getElementById("Page"+Cpages).style.display="none";
                document.getElementById(x).classList.add("active");
                document.getElementById("Page"+x).style.display="block";
                Cpages=x;
            }

            if(Cpages!=1)
            {
                document.getElementById("Previous").classList.remove("disabled");
            }
            if(Cpages==Mpages)
            {
                document.getElementById("Next").classList.add("disabled");
            }
            if(Cpages==1)
            {
                document.getElementById("Previous").classList.add("disabled");
            }
            
        }
    </script>
@endsection
