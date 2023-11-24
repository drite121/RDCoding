@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-body">
                        <p class=h5>
                            Random adalah fitur yang terdapat di berbagai bahasa pemrograman,
                            fitur ini berfungsi untuk mendapatkan nilai acak berupa angka, dari fitur random ini kita bisa membuat beberapa aplikasi,
                            contoh nya kita dapat membuat soal perhitungan yang dapat berganti setiap kali refresh halaman atau kita bisa generate angka untuk pin,
                            atau kita bisa membuat permainana tebak angka dan permainan hitung cepat.
                        </p><br>
                        <p class=h5>
                            Pada bahasa pemrograman PHP kita dapat menggunakan
                            <code class=border>mt_rand()</code> atau <code class=border>rand()</code>
                            dan pada Javascript kita dapat menggunakan
                            <code class=border>Math.random()</code>
                            , namun angka yang keluar akan berupa bliangan desimal, untuk menjadikan bilangan bulat kita perlu mengkalikan 10 dan menghilangkan angka yang dibelakang koma sehingga kita menggunakan
                            <code class=border>Math.floor(Math.random()*10)</code>.
                        </p><br>
                        <p class=h5>
                            Dalam penggunaannya fungsi random di php hanya dapat digunakan saat halaman direfresh, hal ini dikarenakan php dijalankan di sisi server sehingga angka random akan muncul jika halaman yang berisikan fungsi random dipanggil dari server.
                            Berikut adalah contoh dari fungsi random di php.
                        </p>
                        <div class="border p-2">
                            <p class=ml-3>
                            &lt;p>
                                    Berikut adalah angka yang digenerate menggunakan rand(),

                                &lt;?php
                                echo(rand());
                                ?>
                                &lt;/p>
                                <br>
                            &lt;p>
                                    dan berikut adalah angka yang digenerate menggunakan mt_rand()

                                &lt;?php
                                echo(mt_rand());
                                ?>
                                &lt;/p>
                            </p>
                        </div>
                        <br>
                        <p class=h5>
                            Hasil yang dimunculkan:
                        </p>
                        <div class="border p-2">
                            <p class=ml-3>
                                Berikut adalah angka yang digenerate menggunakan rand()
                            <?php
                            echo(rand());
                            ?>
                            <br>
                                dan berikut adalah angka yang digenerate menggunakan mt_rand()
                            <?php
                            echo(mt_rand());
                            ?>
                            </p>
                        </div>
                        <br>
                        <p class=h5>
                            Untuk penggunaannya fungsi random di Javascript bisa dibuat lebih fleksibel karena Javascript berjalan di sisi user,
                            sehingga kita bisa membuat button untuk merubah angka setiap kali button tersebut diklik.
                            Berikut adalah penggunaan dari fungsi random di Javascript.
                        </p>
                        <div class="border p-2">
                            &lt;script><br>
                            function generate() {
                                        document.getElementById("random").innerHTML = Math.floor(Math.random()*10**10);
                                    }<br>
                                    &lt;/script><br>
                                &lt;div class="col-sm-3"><br>
                                &lt;p id="random"> Angka random akan muncul disini&lt;/p><br>
                                &lt;button class="btn btn-primary" onclick="generate()">Generate&lt;/button><br>
                                &lt;/div>
                        </div>
                        <br>
                        <p class=h5>
                            Hasil yang dimunculkan:
                        </p>
                        <div class="border p-3">
                            <script>
                                function generate() {
                                    document.getElementById("random").innerHTML = Math.floor(Math.random()*10**10);
                                }
                            </script>
                            <div class="col-sm-3">
                                <p id="random"> Angka random akan muncul disini</p>
                                <button class="btn btn-primary" onclick="generate()">Generate</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
