@extends('layouts.app')
@section('content')
    <script>
        async function fetchJoke() {
            const response = await fetch("http://icanhazdadjoke.com", {
            headers: {Accept: "application/json",},
            });
            return response.json();
        }

        async function Generate() {
            const { joke } = await fetchJoke();
            document.getElementById("joke").innerHTML = joke;
        }
    </script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="bg-white border">
                    <div class="card-body">
                        <h2 class="text-center">Dad Jokes</h2>
                        <br>
                        <div class="align-items-center">
                            <div class="form-row align-items-center">
                                <div class="col-md-3">                                
                                </div>
                                <div class="col-md-6">
                                    <p id="joke"></p>
                                    <br>
                                    <button type="button" class="btn btn-primary btn-block" onclick="Generate()">Get Joke</button>
                                    <br>
                                    <P>Source:
                                        <br>
                                        <a href="https://wesbos.com/javascript/13-ajax-and-fetching-data/76-dad-jokes">wesbos.com</a>
                                    <p>
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
