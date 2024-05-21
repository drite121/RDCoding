@extends('layouts.app')
@section('content')
    <script>
       fetch('https://www.google.com/finance/quote/UNVR:IDX',{
            header:{
                'Accept': 'application/json'
            }
       }).then(function(response){
            return response.json();
       }).then(function(data){
            console.log(data)
       });
       
    </script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="bg-white border">
                    <div class="card-body">
                        <h2 class="text-center">I am Thinking of a number Between 1 - 100</h2>
                        <h2 class="text-center">Can You Guess it</h2>
                        <br>
                        <div class="align-items-center">
                            <div class="form-row align-items-center">
                                <div class="col-md-3">                                
                                </div>
                                <div class="col-md-6">
                                    <input type="number"  class="form-control" id="Number" min=1 max=100>
                                    <br>
                                    <button type="button" class="btn btn-primary btn-block" onclick="Guess()">Guess</button>
                                    <br>
                                    <p>Guess Number <label id="Low">1</label> - <label id="High">100</label></p>
                                </div>
                                <div class="col-md-3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
