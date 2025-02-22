@extends('layouts.app')
@section('content')
    <script>
       $(document).ready(function() {
            $('.Barang').select2( {
            theme: 'bootstrap-5',
        } );
        });
    </script>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="border">
                    <div class="card-body">
                        <h2 class="text-center">Searchable Selectbox</h2>
                        <br>
                        <div class="align-items-center">
                        <label for="TextItem" class="text-center">Choose Something</label>
                        <select class="Barang form-control" name="barang" id="barang" data-bs-theme="dark">
                        @foreach($listData as $item)
                        <option value="{{$item['nama']}}">{{$item['nama']}}</option>
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
        document.getElementById("result").innerHTML="The item you choose: "+document.getElementById("barang").value;
       }
    </script>
@endsection
