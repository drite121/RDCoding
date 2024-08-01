<head>
<style>
    .kiri {
    float: left;
    width: 20%;
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
    </style>
    <script>
        function MF(number)
        {
            return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR"
            }).format(number);
        }
    </script>
</head>
<html>
    <div style="text-align-last: center; border-buttomborder-style: solid;
  border-bottom-style: dashed;">
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

    <script>
        var barang={!! json_encode($listData->toArray(), JSON_HEX_TAG) !!};
        var Gtotal=0;
        var AP=0;
        var i=0;
        for(;i<barang.length;)
        {
            //Name
            const TheName = document.createElement("p");
            TheName.innerHTML=barang[i].nama;
            document.getElementById("barang").appendChild(TheName);
            //Qty
            const TheQty = document.createElement("p");
            TheQty.innerHTML=barang[i].qty;
            document.getElementById("qty").appendChild(TheQty);
            //Price
            const ThePrice = document.createElement("p");
            ThePrice.innerHTML=MF(barang[i].harga);
            document.getElementById("price").appendChild(ThePrice);
            //Total
            const TheTotal = document.createElement("p");
            TheTotal.innerHTML=MF(barang[i].qty*barang[i].harga);
            document.getElementById("total").appendChild(TheTotal);

            Gtotal+=(barang[i].qty*barang[i].harga);
            AP=barang[i].pembayaran;

            i++
        }
        const br = document.createElement("br");
        document.getElementById("price").appendChild(br);
        const br2 = document.createElement("br");
        document.getElementById("total").appendChild(br2);

        const TheText = document.createElement("p");
        TheText.innerHTML="Total";
        document.getElementById("price").appendChild(TheText);

        const TheGTotal = document.createElement("p");
        TheGTotal.innerHTML=MF(Gtotal);
        document.getElementById("total").appendChild(TheGTotal);

        const TheText2 = document.createElement("p");
        TheText2.innerHTML="Amount Paid";
        document.getElementById("price").appendChild(TheText2);

        const ThePaid = document.createElement("p");
        ThePaid.innerHTML=MF(AP);
        document.getElementById("total").appendChild(ThePaid);

        const TheText3 = document.createElement("p");
        TheText3.innerHTML="Change";
        document.getElementById("price").appendChild(TheText3);

        const TheChange = document.createElement("p");
        TheChange.innerHTML=MF(AP-Gtotal);
        document.getElementById("total").appendChild(TheChange);

        window.print();
    </script>

</html>