<head>
<style>
    .kiri {
    float: left;
    }
    .kanan {
    float: right;
    }.tengah1 {
    float: left;
    padding-left: 40%;
    }
    .tengah2 {
    float: left;
    padding-left: 10%;
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

            i++
        }
        const TheText = document.createElement("p");
        TheText.innerHTML="Total";
        document.getElementById("price").appendChild(TheText);

        const TheGTotal = document.createElement("p");
        TheGTotal.innerHTML=MF(Gtotal);
        document.getElementById("total").appendChild(TheGTotal);

        window.print();
    </script>

</html>