@extends('layouts.app')
@section('content')

    <script>
    var converter = "";
    var myChart;
    var tempUnitsDari="USD";
    var tempUnitsKe="IDR";
    </script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="bg-white border">
                    <div class="card-body">
                        <h2 class="text-center">Currency</h2>
                        <br>
                        <div class="align-items-start">
                            <div class="form-row align-items-start">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="txtDari" onchange="convert('Dari')" placeholder="Dari" aria-label="Dari" aria-describedby="basic-addon2" value="1">
                                        <div class="input-group-append">
                                            <select id="Dari" class="form-control" onchange="Units()">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="txtKe"  onchange="convert('Ke')" placeholder="Ke" aria-label="Ke" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <select id="Ke" class="form-control" onchange="Units()">
                                            </select>
                                        </div>
                                    </div>
                                    <p class="border border-secondary align-items-start text-center rounded" id="txtdata" row='9'><label id="lblDari"></label> <label id="lblDariS"></label> Sama Dengan <label id="lblKe">tes </label> <label id="lblKeS"></label></p>
                                </div>

                                <div class="col-md-3">
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <P>Source:
                            <br>
                            <a href="https://freecurrencyapi.com/docs">Freecurrencyapi</a>
                        <p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

    function convert(x) {
        var dari = document.getElementById("txtDari").value;
        var ke = document.getElementById("txtKe").value;
        console.log(x);
        if(x=="Dari")
        {
            var hasil = dari * converter;
            document.getElementById("txtKe").value=hasil;
            document.getElementById("lblDari").innerHTML = dari;
            document.getElementById("lblKe").innerHTML = hasil;
        }
        else if(x=="Ke")
        { console.log(x);
            var hasil = ke / converter;
            document.getElementById("txtDari").value=hasil;
            document.getElementById("lblDari").innerHTML = hasil;
            document.getElementById("lblKe").innerHTML = ke;
        }
    };

    function Units() {
        var dariUnits = document.getElementById("Dari").value;
        var keUnits = document.getElementById("Ke").value;
        $.ajax({
            type: "GET",
            url: 'https://api.freecurrencyapi.com/v1/latest',
            data: { 
                "apikey": 'fca_live_4adI34gnQi0garHKjliWUz6DrtQTiPUC3hmTXyAO',
                "currencies": keUnits,
                "base_currency": dariUnits,
            },
            success: function(result) {
                var str=result.data;
                var test=Object.values(str);
                $('#txtDari').val("1");
                $('#txtKe').val(Object.values(str));
                converter=Object.values(str);
                document.getElementById("lblKe").innerHTML = test;
            },
            error: function(result) {
                alert('Maaf Proses Generate Error, Harap Hub Dev');
            }
        });
        var TDari="1";
        var TKe=document.getElementById("txtKe").value;
        document.getElementById("lblDari").innerHTML = TDari;
        document.getElementById("lblDariS").innerHTML = dariUnits;
        document.getElementById("lblKeS").innerHTML = keUnits;

        $("#Dari").find("option").filter(function () {
            if ($(this).html() == tempUnitsKe)
                $(this).attr("disabled", false);
        })
        $("#Ke").find("option").filter(function () {
            if ($(this).html() == tempUnitsDari)
                $(this).attr("disabled", false);
        })

        $("#Dari").find("option").filter(function () {
            if ($(this).html() == keUnits)
                $(this).attr("disabled", true);
        })
        $("#Ke").find("option").filter(function () {
            if ($(this).html() == dariUnits)
                $(this).attr("disabled", true);
        })

        tempUnitsKe=keUnits;
        tempUnitsDari=dariUnits;
    };

    function X() {
        $.ajax({
            type: "GET",
            url: 'https://api.freecurrencyapi.com/v1/currencies',
            data: { 
                "apikey": 'fca_live_4adI34gnQi0garHKjliWUz6DrtQTiPUC3hmTXyAO',
                "currencies": ''
            },
            success: function(result) {
                // $("#result").html(result);
                var str=result.data;
                // var matches = str.match(/(\d+)/);
                var data=Object.getOwnPropertyNames(str);

                let i = 0;
                for (;data[i];) {
                    $('#Dari').append($('<option>', {
                        value: data[i],
                        text: data[i]
                    }));
                    i++;
                }
                let j = 0;
                for (;data[j];) {
                    $('#Ke').append($('<option>', {
                        value: data[j],
                        text: data[j],
                    }));
                    j++;
                }
                $('#Dari').val("USD");
                $('#Ke').val("IDR");

                $("#Dari").find("option").filter(function () {
                    if ($(this).html() == "IDR")
                            $(this).attr("disabled", true);
                })
                $("#Ke").find("option").filter(function () {
                    if ($(this).html() == "USD")
                            $(this).attr("disabled", true);
                })
            },
            error: function(result) {
                alert('Maaf Proses Generate Error, Harap Hub Dev');
            }
        });

        $.ajax({
            type: "GET",
            url: 'https://api.freecurrencyapi.com/v1/latest',
            data: { 
                "apikey": 'fca_live_4adI34gnQi0garHKjliWUz6DrtQTiPUC3hmTXyAO',
                "currencies": "IDR",
                "base_currency": "USD",
            },
            success: function(result) {
                var str=result.data;
                var test=Object.values(str);
                $('#txtKe').val(Object.values(str));
                converter=Object.values(str);
                document.getElementById("lblKe").innerHTML = test;
            },
            error: function(result) {
                alert('Maaf Proses Generate Error, Harap Hub Dev');
            }
        });
        var TDari=document.getElementById("txtDari").value;
        var TKe=document.getElementById("txtKe").value;
        document.getElementById("lblDari").innerHTML = TDari + "&nbsp ";
        document.getElementById("lblDariS").innerHTML = "USD";
        document.getElementById("lblKeS").innerHTML = "IDR";
    };

    

    window.onload =function() {X()};

        
        
    </script>
@endsection