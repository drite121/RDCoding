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
                        </p>
                        <p class=h5>
                            Pada bahasa pemrograman PHP kita dapat menggunakan
                            <code class=border>mt_rand()</code> atau <code class=border>rand()</code>
                            dan pada Javascript kita dapat menggunakan
                            <code class=border>Math.random()</code>
                            , namun angka yang keluar akan berupa bliangan desimal, untuk menjadikan bilangan bulat kita perlu mengkalikan 10 dan menghilangkan angka yang dibelakang koma sehingga kita menggunakan
                            <code class=border>Math.floor(Math.random()*10)</code>.
                        </p>
                        <p class=h5>
                            berikut adalah penggunaan dari random

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
