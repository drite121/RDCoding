<html>
<head>
<style>
    @media print {
    body {
        size: 75mm;
        /* size: portrait; */
        margin-top: 0;
    }
    }
    .kiri {
    float: left;
    }
    .kanan {
    float: right;
    }.tengah1 {
    float: left;
    padding-left: 10%;
    }
    .tengah2 {
    float: left;
    padding-left: 10%;
    }
    .tengah3 {
        text-align-last: center;
    }
    p {
    font-size: 14px;
    }
    </style>
    <script>
        function MF(number)
        {
            return new Intl.NumberFormat("id-ID", {
                minimumFractionDigits: 0,
                maximumFractionDigits: 0,
            style: "currency",
            currency: "IDR"
            }).format(number).replace("Rp", "").trim();
        }
    </script>
</head>
<body>
    <div style="text-align-last: center; border-buttomborder-style: solid;
  border-bottom-style: dashed;font-size: 14;">
    <label>{{$Nama}}</label>
    <br>
    <label>{{$Address}}</label>
    <br>
    <label>{{$Phone}}</label>
    </div>
    <br>
    <div class="kiri" id="barang">
    </div>
    <div class="tengah1" id="qty">
    
    </div>
    <div class="tengah2" id="price">
    
    </div>
    <div class="kanan" id="total">
    
    </div>
</body>
    <script>
        var barang={!! json_encode($listData->toArray(), JSON_HEX_TAG) !!};
        var Gtotal=0;
        var AP=0;
        var i=0;
        for(;i<barang.length;)
        {
            //Name
            const TheName = document.createElement("p");
            TheName.setAttribute("style", "font-size: 12;");
            TheName.innerHTML=barang[i].nama;
            document.getElementById("barang").appendChild(TheName);
            //Qty
            const TheQty = document.createElement("p");
            TheQty.setAttribute("style", "font-size: 12;");
            TheQty.innerHTML=barang[i].qty;
            document.getElementById("qty").appendChild(TheQty);
            //Price
            const ThePrice = document.createElement("p");
            ThePrice.setAttribute("style", "font-size: 12;");
            ThePrice.innerHTML=MF(barang[i].harga);
            document.getElementById("price").appendChild(ThePrice);
            //Total
            const TheTotal = document.createElement("p");
            TheTotal.setAttribute("style", "font-size: 12;");
            TheTotal.innerHTML=MF(barang[i].qty*barang[i].harga);
            document.getElementById("total").appendChild(TheTotal);

            Gtotal+=(barang[i].qty*barang[i].harga);
            AP=barang[i].pembayaran;

            i++
        }
        const br = document.createElement("br");
        document.getElementById("total").appendChild(br);
        const br2 = document.createElement("br");
        document.getElementById("barang").appendChild(br2);

        const TheText = document.createElement("p");
        TheText.setAttribute("style", "font-size: 12;");
        TheText.innerHTML="Total";
        document.getElementById("barang").appendChild(TheText);

        const TheGTotal = document.createElement("p");
        TheGTotal.setAttribute("style", "font-size: 12;");
        TheGTotal.innerHTML=MF(Gtotal);
        document.getElementById("total").appendChild(TheGTotal);

        const TheText2 = document.createElement("p");
        TheText2.setAttribute("style", "font-size: 12;");
        TheText2.innerHTML="Amount Paid";
        document.getElementById("barang").appendChild(TheText2);

        const ThePaid = document.createElement("p");
        ThePaid.setAttribute("style", "font-size: 12;");
        ThePaid.innerHTML=MF(AP);
        document.getElementById("total").appendChild(ThePaid);

        const TheText3 = document.createElement("p");
        TheText3.setAttribute("style", "font-size: 12;");
        TheText3.innerHTML="Change";
        document.getElementById("barang").appendChild(TheText3);

        const TheChange = document.createElement("p");
        TheChange.setAttribute("style", "font-size: 12;");
        TheChange.innerHTML=MF(AP-Gtotal);
        document.getElementById("total").appendChild(TheChange);

        window.print();
    </script>

</html>