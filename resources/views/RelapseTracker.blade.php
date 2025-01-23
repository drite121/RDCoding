@extends('layouts.app')
@section('content')
    <script>
        

    </script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="bg-white border">
                    <div class="card-body">
                        <h2 class="text-center">Relapse Tracker</h2>
                        <!-- <p>I tried to make a trial of click date saving</p> -->
                         <br>
                         <ul class="nav nav-pills nav-fill">
                        <li id="Bcounter" class="nav-item pointer w-50 border border-secondary bg-primary bg-gradient" >
                            <a class="nav-link" onclick="ShowTab('Counter')">Counter</a>
                        </li>
                        <li id="Blog" class="nav-item pointer w-50 border border-secondary bg-light bg-gradient">
                            <a class="nav-link" onclick="ShowTab('Log')">Log</a>
                        </li>
                        </ul>
                        <br>
                        <br>
                        <div id="Dcounter" class="text-center">
                            <h1 id="days" class="display-2">-</h1>
                            <h5 class="display-5">Days</h5>
                            <h5 class="display-5" id="times">-</h5>
                            <br>
                            
                            <button class="btn btn-primary border border-dark text-center" id="Relapse"> Relapse </button>
                            <br><br>
                            
                        </div>
                        <div id="Dlog" class="d-none">
                            <h5 class="display-5">Total Relapse: <span id="clickCount">0</span></h5>
                            <h5 class="display-5">Total Days: <span id="dayCount">0</span></h5>
                            <h5 class="display-5">Avg Days between relapse: <span id="Avgday">0</span></h5>
                            <h5>Longest streak: <span id="LongStreak">0</span></h5>
                            <h5>Most susceptible time of relapse: <span id="susceptible">0</span></h5>
                            <br>
                            <table class="table text-center table-bordered table-striped dataTable dtr-inline" id="DataList">
                            <thead>
                                <tr>
                                <th>Date</th>
                                <th>Note</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="TbodyData">
                            </tbody>
                            </table>
                            
                            <p><i>*Data is stored in the local system (cache)*<br>*To delete please delete the cache in your browser*</i></p>
                        </div>

                        <br>
                                                
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modalNote">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="TheTittle">Note<h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="panel-body">
                        <div class="modal-body">
                            <label>Note</label>
                            <input type="text" class="form-control" id="note" maxlength="50">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary border border-dark text-center" id="clickButton"> Reset Streak </button>
                            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const clickButton = document.getElementById("clickButton");
        const clickCountDisplay = document.getElementById("clickCount");
        const dayCountDisplay = document.getElementById("dayCount");
        const AvgdayDisplay = document.getElementById("Avgday");
        const LongStreakDisplay = document.getElementById("LongStreak");
        const SusceptibleDisplay = document.getElementById("susceptible");
        var CountTime;
        let table;
        
        // Fungsi untuk kalau data 0
        function ifZero(){
            let currentCount = getClickCount();
            
            if(currentCount === 0 || currentCount === null || isNaN(currentCount))
            {
                currentCount=1;
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
                clickListData.push({
                    date: currentDateTime,
                    note: 'Start'
                });
                saveClickList(clickListData);
            }
            
        }
        ifZero();
        CounterTime();

        // Fungsi untuk mengambil jumlah klik dari LocalStorage
        function getClickCount() {
            return parseInt(localStorage.getItem("clickCountRelapse"));
        }
        

        // Fungsi untuk menyimpan jumlah klik ke LocalStorage
        function saveClickCount(count) {
            localStorage.setItem("clickCountRelapse", count);
        }

        // Fungsi untuk mengambil daftar klik dari LocalStorage
        function getClickList() {
            const clickListData = JSON.parse(localStorage.getItem("clickListRelapse")) || [];
            return clickListData;
        }

        // Fungsi untuk menyimpan daftar klik ke LocalStorage
        function saveClickList(clickListData) {
            localStorage.setItem("clickListRelapse", JSON.stringify(clickListData));
        }
    
        // Menampilkan jumlah klik dan daftar klik yang sudah disimpan
        function updateClickDisplay() {
            clickCountDisplay.textContent = getClickCount()-1;
            const clickListData = getClickList().slice(1);
            const clickListData2 = getClickList();
            //hitung Total Days
            const FirstDate = clickListData2.length > 0 ? clickListData2[0] : null;
            const formattedFirstDate = FirstDate.date.replace(" ", "T");

            const storedDate = new Date(formattedFirstDate);
            const currentDate = new Date();

            const diffInMs = currentDate - storedDate;
            const diffInDays = Math.floor(diffInMs / (1000 * 60 * 60 * 24));
            dayCountDisplay.textContent = diffInDays +" Days";

            //hitung Avg relapse dan Longest streak
            const formattedDates = clickListData.map(date => new Date(date.date.replace(" ", "T")));
            console.log(formattedDates.length)
            if (formattedDates.length <= 1)
            {
                console.log("msk")
                LongStreakDisplay.textContent = 0+" Days";
                SusceptibleDisplay.textContent = "-";
            }
            else
            {
                //Avg relapse
                if(formattedDates.length < 2)
                {
                    AvgdayDisplay.textContent = 0+" Days";
                }
                else
                {
                    let totalDays = 0;

                    for (let i = 1; i < formattedDates.length; i++) {
                        const diffInMs = formattedDates[i] - formattedDates[i - 1];
                        const diffInDays = diffInMs / (1000 * 60 * 60 * 24);
                        totalDays += diffInDays;
                    }
                    const averageDays = totalDays / (formattedDates.length - 1);
                    AvgdayDisplay.textContent = averageDays.toFixed(1)+" Days";
                }
                
                //Longest streak
                let longestStreak = 0;
                for (let i = 1; i < formattedDates.length; i++) {
                    const diffInMs = formattedDates[i] - formattedDates[i - 1];
                    const diffInDays = diffInMs / (1000 * 60 * 60 * 24);
                    longestStreak = Math.max(longestStreak, diffInDays);
                }
                const lastRelapse = formattedDates[formattedDates.length - 1];
                const now = new Date();
                const currentStreak = (now - lastRelapse) / (1000 * 60 * 60 * 24);
                longestStreak = Math.max(longestStreak, currentStreak);

                LongStreakDisplay.textContent = Math.floor(longestStreak)+" Days";

                //susceptible 
                const hourFrequency = {};

                clickListData.forEach(dateStr => {
                    // Ubah format ke ISO agar dikenali oleh Date()
                    const formattedDateStr = dateStr.date.replace(" ", "T");
                    const relapseDate = new Date(formattedDateStr);

                    // Ambil jam dalam format 12 jam (AM/PM)
                    let hour = relapseDate.getHours();
                    const period = hour >= 12 ? 'PM' : 'AM';
                    hour = hour % 12 || 12; // Konversi 0 menjadi 12 untuk format AM/PM

                    let nextHour = relapseDate.getHours();
                    const nextPeriod = nextHour+1 >= 12 ? 'PM' : 'AM';
                    nextHour = (nextHour % 12) + 1;

                    const formattedHour = `${hour} ${period} to ${nextHour} ${nextPeriod}`;

                    // Hitung frekuensi jam
                    hourFrequency[formattedHour] = (hourFrequency[formattedHour] || 0) + 1;
                });

                // Mencari jam dengan frekuensi tertinggi
                let mostSusceptibleHour = null;
                let maxCount = 0;

                for (const hour in hourFrequency) {
                    if (hourFrequency[hour] > maxCount) {
                    maxCount = hourFrequency[hour];
                    mostSusceptibleHour = hour;
                    }
                }
                SusceptibleDisplay.textContent =`${mostSusceptibleHour}`
            }
        }

        // Menampilkan data awal
        updateClickDisplay();

        // Tambahkan event listener untuk menangani klik tombol
        clickButton.addEventListener("click", function() {
            let currentCount = getClickCount();
            currentCount++;
            saveClickCount(currentCount);
            const note = document.getElementById("note").value;
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
            clickListData.push({
                date: currentDateTime,
                note: note
            });
            saveClickList(clickListData);

            updateClickDisplay();
            clearInterval(CountTime);
            CounterTime();
            $('#modalNote').modal('hide');

        });

        function CounterTime()
        {
            const clickListData = getClickList();
            const datesOnly = clickListData.map(item => item.date);
            var countDownDate = new Date(datesOnly.at(-1)).getTime();
            
            CountTime = setInterval(function() {

            // Get today's date and time
            var now = new Date().getTime();
            
            // Find the distance between now and the count down date
            var distance = now - countDownDate;
            
            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            document.getElementById("days").innerHTML = days
            document.getElementById("times").innerHTML = hours + "h "+ minutes + "m " + seconds + "s ";
            }, 500);
        }

        function ShowTab(Show)
        {
            const ButtonCounter= document.getElementById("Bcounter");
            const DisplayCounter= document.getElementById("Dcounter");
            const ButtonLog= document.getElementById("Blog");
            const DisplayLog= document.getElementById("Dlog");

            if(Show=="Counter")
            {
                ButtonCounter.classList.add("bg-primary");
                ButtonCounter.classList.remove("bg-light");

                ButtonLog.classList.add("bg-light");
                ButtonLog.classList.remove("g-primary");

                DisplayCounter.classList.remove("d-none");
                DisplayLog.classList.add("d-none");
            }
            else if(Show=="Log")
            {
                $(document).ready(function() {
                    table = $('#DataList').DataTable().destroy();
                });
                
                const clickListData = getClickList().slice(1);
                $(document).ready(function() {
                    table = $('#DataList').DataTable({
                        columns: [
                            { title: "Date" },
                            { title: "Note" },
                            { title: "Action" }
                        ]
                    });
                    // let formattedDates = clickListData.map(date => [date]);
                    const formattedDates = clickListData.map((item, index) => [
                        item.date, 
                        item.note, 
                        `<button class="btn btn-danger btn-sm" onclick="deleteItem(${index+1})">Delete</button>`
                    ]);
                    table.clear().draw();
                    table.rows.add(formattedDates).order([0, 'desc']).draw();
                });

                ButtonCounter.classList.add("bg-light");
                ButtonCounter.classList.remove("bg-primary");

                ButtonLog.classList.add("bg-primary");
                ButtonLog.classList.remove("bg-light");
                
                DisplayCounter.classList.add("d-none");
                DisplayLog.classList.remove("d-none");

                ButtonLog.classList.add("disabled");
                ButtonCounter.classList.remove("disabled");
            }
        }
        
        $(function () {
            $('#Relapse').on('click', function (e) {
                e.preventDefault();
                $('#modalNote').modal({ backdrop: 'static', keyboard: false })
                    .on('click', function(){
                    var $url=$('.form').attr('action');
                        window.open($url, '_self');
                    });
            });
        });

        function deleteItem(index) {
            let currentCount = getClickCount();
            currentCount--;
            saveClickCount(currentCount);

            let clickListData = getClickList();
            clickListData.splice(index, 1);
            saveClickList(clickListData)

            updateClickDisplay();
            clearInterval(CountTime);
            CounterTime();

            clickListData = getClickList().slice(1);

            const formattedDates = clickListData.map((item, index) => [
                item.date, 
                item.note, 
                `<button class="btn btn-danger btn-sm" onclick="deleteItem(${index+1})">Delete</button>`
            ]);
            
            table.clear().draw();
            table.rows.add(formattedDates).order([0, 'desc']).draw();
        }
    </script>
@endsection
