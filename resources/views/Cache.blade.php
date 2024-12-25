@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="bg-white border">
                    <div class="card-body">
                        <h2 class="text-center">Cache</h2>
                        <!-- <p>I tried to make a trial of click date saving</p> -->
                         <br>
                        <div class="text-center">
                        <button class="btn border border-dark text-center" id="clickButton"> Click Here </button>
                        <br><br>
                        <p>Jumlah Klik: <span id="clickCount">0</span></p>
                            <textarea id="clickList" rows="4" cols="50"> </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const clickButton = document.getElementById("clickButton");
        const clickCountDisplay = document.getElementById("clickCount");
        const clickList = document.getElementById("clickList");

        // Fungsi untuk mengambil jumlah klik dari LocalStorage atau set ke 0 jika belum ada
        function getClickCount() {
            return parseInt(localStorage.getItem("clickCount")) || 0;
        }

        // Fungsi untuk menyimpan jumlah klik ke LocalStorage
        function saveClickCount(count) {
            localStorage.setItem("clickCount", count);
        }

        // Fungsi untuk mengambil daftar klik dari LocalStorage
        function getClickList() {
            const clickListData = JSON.parse(localStorage.getItem("clickList")) || [];
            return clickListData;
        }

        // Fungsi untuk menyimpan daftar klik ke LocalStorage
        function saveClickList(clickListData) {
            localStorage.setItem("clickList", JSON.stringify(clickListData));
        }
    
        // Menampilkan jumlah klik dan daftar klik yang sudah disimpan
        function updateClickDisplay() {
            clickCountDisplay.textContent = getClickCount();;
            const clickListData = getClickList();
            clickList.value = '';
            clickListData.slice().reverse().forEach(item => {
                // const listItem = document.createElement('li');
                clickList.value += item+"\n";
                // clickList.appendChild(listItem);
            });
        }

        // Menampilkan data awal
        updateClickDisplay();

        // Tambahkan event listener untuk menangani klik tombol
        clickButton.addEventListener("click", function() {
            let currentCount = getClickCount();
            currentCount++;
            saveClickCount(currentCount);

            var m = new Date();
            var dateString =
                m.getFullYear() + "-" +
                ("0" + (m.getMonth()+1)).slice(-2) + "-" +
                ("0" + m.getDate()).slice(-2) + " " +
                ("0" + m.getHours()).slice(-2) + ":" +
                ("0" + m.getMinutes()).slice(-2) + ":" +
                ("0" + m.getSeconds()).slice(-2);


            const currentDateTime = dateString; // Menyimpan tanggal dan jam klik
            const clickListData = getClickList();
            clickListData.push(`Klik ke-${currentCount}: ${currentDateTime}`);
            saveClickList(clickListData);

            updateClickDisplay();
        });
    </script>
@endsection
