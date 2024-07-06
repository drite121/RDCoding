@extends('layouts.app')
@section('content')
    <script>
        
    </script>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card">
                    <div id="Home">

                    </div>
                    <br>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center" id="Pagination">
                            <li class="page-item disabled"  onclick="ChangePage('Previous')" id="Previous">
                            <a class="page-link" href="#">Previous</a>
                            </li>
                            
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
        // Buat Halaman
        var Pages = {!! json_encode($listData->toArray(), JSON_HEX_TAG) !!};
        var NumberPage= Math.floor(Pages.length/10);
        if(NumberPage<Pages.length)
        {
            NumberPage+=1;
        }
        var i=1

        for(;i<=NumberPage;)
        {
            const newPagination = document.createElement("li");
            if(i==1)
            {
                newPagination.setAttribute("class", "page-item active");
            }
            else
            {
                newPagination.setAttribute("class", "page-item");
            }
            newPagination.setAttribute("onclick", "ChangePage("+i+")");
            newPagination.setAttribute("id", i);

            const ThePages = document.createElement("a");
            ThePages.setAttribute("class", "page-link");
            ThePages.setAttribute("href", "#");
            ThePages.innerHTML=i;
            
            newPagination.appendChild(ThePages);
            const Next=document.getElementById("Next");
            document.getElementById("Pagination").insertBefore(newPagination,Next);

        // Isi Halaman
            const newPage = document.createElement("div");
            newPage.setAttribute("id", "Page"+i);
            console.log("ini i"+i);
            var j=0
            for(;j<Pages.length&&j<10;)
            {
                const TheItem1 = document.createElement("a");
                TheItem1.setAttribute("href", Pages[j].website);

                const TheItem2 = document.createElement("div");
                TheItem2.setAttribute("class", "card-body border");

                const TheItem3 = document.createElement("span");
                TheItem3.setAttribute("class", "h5");
                TheItem3.innerHTML=Pages[j].tittle;

                const TheItem4 = document.createElement("span");
                TheItem4.setAttribute("class", "float-right mb-0");
                TheItem4.innerHTML=Pages[j].tanggal;

                TheItem2.appendChild(TheItem4);
                TheItem2.appendChild(TheItem3);
                TheItem1.appendChild(TheItem2);

                newPage.appendChild(TheItem1);
                console.log(newPage);
                j++
            }
            const Home=document.getElementById("Home");
            Home.appendChild(newPage);
            Pages.splice(0, 10);
            
            console.log(Pages);
            i++
        }        

        // Buat Pindah Halaman
        var Cpages=1;
        var Mpages=NumberPage;
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
                    document.getElementById("Next").classList.remove("disabled");
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
                document.getElementById("Next").classList.remove("disabled");
            }
        }
    </script>
@endsection
