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

                        Pada bahasa pemrograman PHP kita dapat menggunakan
                        <code class=border>mt_rand()</code> atau <code class=border>rand()</code>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
