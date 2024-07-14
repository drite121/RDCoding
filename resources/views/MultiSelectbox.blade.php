@extends('layouts.app')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
       $(document).ready(function() {
            $('.Barang').select2();
        });
    </script>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="bg-white border">
                    <div class="card-body">
                        <h2 class="text-center">Multi Selectbox</h2>
                        <br>
                        <div class="align-items-center">
                        <label for="TextItem" class="text-center">Choose Something</label>
                        <select class="Barang form-control" name="barang" id="barang" multiple="multiple">
                        @foreach($listData as $key=>$item)
                        @if($key==0)
                        <option value="{{$item['nama']}}" selected>{{$item['nama']}}</option>
                        @else
                        <option value="{{$item['nama']}}">{{$item['nama']}}</option>
                        @endif
                        @endforeach  
                        </select>
                        <br>
                        <br>
                        <button type="button" class="btn btn-primary btn-block" onclick="Tampilkan()">Submit</button>
                        <br>
                        <p id="result"></p>
                        <br>
                        <P>Source & Tutorial:
                            <br>
                            <a href="https://select2.org/">Select2</a><br>
                        <p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
       function Tampilkan()
       {
        document.getElementById("result").innerHTML="The item you choose: "+$(".Barang").val();
       }
    </script>
@endsection
