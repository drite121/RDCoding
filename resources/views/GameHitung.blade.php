@extends('layouts.app')
@section('content')
    <script>
        function Timer()
        {
            var timeleft = 60;
            var downloadTimer = setInterval(function(){
            if(timeleft <= 0){
                clearInterval(downloadTimer);
            }
            document.getElementById("time").innerHTML = 0 + timeleft;
            timeleft -= 1;
            console.log(timeleft);
            if(timeleft==0)
            {
                document.getElementById("game").style.display = "none";
                document.getElementById("home").style.display = "block";
                if(document.getElementById("Bscore").innerHTML<document.getElementById("score").innerHTML)
                {
                    document.getElementById("Bscore").innerHTML=document.getElementById("score").innerHTML;
                }
                document.getElementById("BestScore").style.display = "block";
            }
            }, 1000);
            
            
        }
        function Random()
        {
            document.getElementById("angka1").innerHTML = Math.floor(Math.random()*10);
            document.getElementById("angka2").innerHTML = Math.floor(Math.random()*10);
            const kabataku = [];
            kabataku[0]= "*";
            kabataku[1]= "+";
            kabataku[2]= "-";
            document.getElementById("kabataku").innerHTML = kabataku[Math.floor(Math.random() * (2 - 0 + 1) + 0)]
        }
        function Start()
        {
            document.getElementById("score").innerHTML=0;
            document.getElementById("jawaban").value="";
            
            document.getElementById("home").style.display = "none";
            document.getElementById("BestScore").style.display = "none";

            document.getElementById("game").style.display = "block";
            Random();
            Timer();

            document.getElementById("jawaban").focus();
        }
        function Cek()
        {
            var jawaban= document.getElementById("jawaban").value;
            let angka1=document.getElementById("angka1").innerHTML;
            let angka2= document.getElementById("angka2").innerHTML;
            let kabataku= document.getElementById("kabataku").innerHTML;
            let y;
            if(kabataku=="*")
            {
                y= angka1*angka2;
                Hasil(jawaban,y);
                console.log("*");
            }
            else if(kabataku=="-")
            {
                y= angka1-angka2;
                Hasil(jawaban,y);
                console.log("-")
            }
            else if(kabataku=="+")
            {
                y= parseInt(angka1)+parseInt(angka2);
                Hasil(jawaban,y);
            }
            document.getElementById("jawaban").value="";
            Random();          
        }
        function Hasil(jawaban, soal)
        {
            console.log(soal);
            if(jawaban==soal)
            {
                var score=document.getElementById("score").innerHTML;
                score++;
                document.getElementById("score").innerHTML=score;
                console.log("benar");
            }
            else
            {
                console.log("salah");
            }
        }
    </script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="bg-white border">
                    <div class="card-body">
                        <div class="text-center" id="home">
                            <button type="button" class="btn btn-primary" id="start" onclick="Start()">Start</button>
                        </div>
                        <div id="game" style="display:none">
                        <div class="text-left">
                                TIME:
                                <span id="time"></span>
                            </div>
                            QUESTION:
                            <card class="d-flex justify-content-center">
                                <p id="angka1" class="mr-3">test</p> <p id="kabataku">test2</p> <p id="angka2" class="ml-3">test3</p>
                            </card>
                            ANSWER: <input type="number" id="jawaban" class="form-control" onchange="Cek()" autofocus=false>
                            <br>
                            <div class="text-center">
                                SCORE:
                                <p id="score">0</p>
                            </div>
                        </div>
                        <br>
                        <div class="text-center" id="BestScore">
                            BEST SCORE:
                                <p id="Bscore">0</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
