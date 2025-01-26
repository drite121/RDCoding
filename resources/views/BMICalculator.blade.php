@extends('layouts.app')
@section('content')
    <script>
        
        function syncRtoNW()
        {
            const value = document.querySelector("#WeightNumber");
            const input = document.querySelector("#WeigthRange");
            value.value = input.value;
            input.addEventListener("input", (event) => {
            value.value = event.target.value;
            Length=input.value;
            Generate();
            });
        }

        function syncRtoNH()
        {
            const value = document.querySelector("#HeightNumber");
            const input = document.querySelector("#HeighthRange");
            value.value = input.value;
            input.addEventListener("input", (event) => {
            value.value = event.target.value;
            Length=input.value;
            Generate();
            });
        }

        function syncNtoRW()
        {
            document.getElementById("WeigthRange").value=document.getElementById("WeightNumber").value;
            Length=document.getElementById("WeightNumber").value;
            Generate();
        }

        function syncNtoRH()
        {
            document.getElementById("HeighthRange").value=document.getElementById("HeightNumber").value;
            Length=document.getElementById("HeightNumber").value;
            Generate();
        }

        function Calculate()
        {
            // berat badan (kg) : (tinggi badan(m))kuadrat]
            var BB = document.getElementById("WeightNumber").value;
            var TB = document.getElementById("HeightNumber").value;

            var BMI = BB/((TB/100)*(TB/100));
            var BMI = Math.round(BMI*10)/10;

            var conclution;
            if(BMI<18.5)
            {
                conclution =  "Your Result: " + BMI + "<br />" + "You are Underweight, Eat More";
            }
            else if(18.5<=BMI && BMI<25)
            {
                conclution =  "Your Result: " + BMI + "<br />" + "Your Weight is Ideal, Good Job";
            }
            else if(25<=BMI && BMI<30)
            {
                conclution=  "Your Result: " + BMI + "<br />" + "You are Overweight, Go Workout";
            }
            else if(30<=BMI)
            {
                conclution = "Your Result: " + BMI + "<br />" + "You are Obesity, Go Diet and Workout";
            }
            document.getElementById("result").innerHTML = conclution
        }

        window.onload =function() {syncRtoNW(),syncRtoNH()};
    </script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="border">
                    <div class="card-body">
                        <h2 class="text-center">Calculate your BMI</h2>
                        <br>
                        <div class="align-items-center">
                            <div class="form-row align-items-center">
                                <div class="col-md-3">                                
                                </div>

                                <div class="col-md-6">
                                     <input type="range" class="form-control mb-1" min="30" max="200" value="70" id="WeigthRange">
                                        <div class="form-group row">
                                            <label for="WeightNumber" class="col-sm-2 col-form-label text-center">Weigth(kg)</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="WeightNumber" min="30" max="200" value="70" onchange="syncNtoRW()">
                                            </div>
                                        </div>
                                </div>

                                <div class="col-md-3">
                                </div>
                            </div>
                        </div>

                        <div class="align-items-center">
                            <div class="form-row align-items-center">
                                <div class="col-md-3">                                
                                </div>

                                <div class="col-md-6">
                                     <input type="range" class="form-control mb-1" min="100" max="300" value="150" id="HeighthRange">
                                        <div class="form-group row">
                                            <label for="HeightNumber" class="col-sm-2 col-form-label text-center">Height(cm)</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="HeightNumber" min="100" max="300" value="150" onchange="syncNtoRH()">
                                            </div>
                                        </div>
                                </div>

                                <div class="col-md-3">
                                </div>
                            </div>
                        </div>

                        <div class="align-items-center">
                            <div class="form-row align-items-center">
                                <div class="col-md-3">                                
                                </div>

                                <div class="col-md-6">
                                <button type="button" class="btn btn-primary btn-block" onclick="Calculate()">Calculate</button>
                                </div>

                                <div class="col-md-3">
                                </div>
                            </div>
                        </div>

                        <div class="align-items-center">
                            <div class="form-row align-items-center">
                                <div class="col-md-3">                                
                                </div>

                                <div class="col-md-6">
                                <p id="result">Your Result:</p>
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
