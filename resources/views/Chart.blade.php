@extends('layouts.app')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    var label = [];
    var data = [];
    var tipe = "";
    var myChart;
    </script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="bg-white border">
                    <div class="card-body">
                        <h2 class="text-center">Chart</h2>
                        <br>
                        <div class="align-items-start">
                            <div class="form-row align-items-start">
                                <div class="col-md-6">
                                    <label for="tipe" class="text-center">Tipe</label>
                                    <select id="tipe" class="form-control">
                                        <option value="bar">Bar</option>
                                        <option value="line">Line</option>
                                        <option value="pie">Pie</option>
                                    </select>
                                    <br>
                                    <label for="Label" class="text-center">Label</label>
                                    <input type="text"  class="form-control" id="Label" maxlength="9">
                                    <br>
                                    <label for="Data" class="text-center">Data</label>
                                    <input type="number" class="form-control" id="Data" maxlength="9">
                                    <br>
                                    <button type="button" class="btn btn-primary btn-block" id="Add" onclick="Add()">Add</button>  
                                    <button type="button" class="btn btn-primary btn-block" id="reset" onclick="reset()">Reset</button>                               
                                </div>
                                <div class="col-md-6">
                                <br>
                                <p class="border border-secondary align-items-start rounded" id="txtdata" row='9'>List Data: <br>
                                    
                                </p>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="align-items-center">
                            <div class="form-row align-items-center">
                                <canvas id="barChart" class="border border-secondary rounded" style="height:40vh; width:85vw"></canvas>
                            </div>
                        <div>
                            
                        </div>
                        <br>
                        <P>Source:
                            <br>
                            <a href="https://www.chartjs.org/docs/latest/charts/doughnut.html">Chartjs Documentation</a>
                        <p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

    function reset() 
    {
        myChart.destroy();
        label = [];
        data = [];
        tipe = "";
        document.getElementById("txtdata").innerHTML ="List Data: <br>"
        document.getElementById("tipe").disabled = false;
    }

    function Add() {
        if(data.length<10)
        {
            tipe=document.getElementById("tipe").value;
            label.push(document.getElementById("Label").value)
            data.push(document.getElementById("Data").value)
            document.getElementById("txtdata").innerHTML += document.getElementById("Label").value+" : "+document.getElementById("Data").value+"<br>";
            document.getElementById("tipe").disabled = true;
        }
        else
        {
            alert("Max Data Hanya 10 Saja");
        }
        if(data.length==1)
        {
            color=["#0074D9"];
            if(tipe=="pie")
            {
                color=["#0074D9", "#FF4136", "#2ECC40", "#FF851B", "#7FDBFF", "#B10DC9", "#FFDC00", "#001f3f", "#39CCCC", "#01FF70", "#85144b", "#F012BE", "#3D9970", "#111111", "#AAAAAA"]
            }
            else
            {
                color=["#0074D9"]
            }
            var ctx = document.getElementById('barChart').getContext('2d');
            myChart = new Chart(ctx, {
                type: tipe,
                data: {
                    labels: label,
                    datasets: [{
                        label: 'Data',
                        data: data,
                        backgroundColor: color,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
        else
        {
            myChart.type=tipe;
            myChart.update();
        }
        
    };

        
        
    </script>
@endsection