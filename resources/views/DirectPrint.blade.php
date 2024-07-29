@extends('layouts.app')
@section('content')
    
    <script>
        function print() {
            var text = document.getElementById('text').value
            document.getElementById('printf').src = '{{url("TestPrint")}}'+'/'+text;
        };
    </script>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="bg-white border">
                    <div class="card-body">
                        <h2 class="text-center">Direct Print</h2>
                        <br>
                        <div class="align-items-center">
                        <label for="TextItem" class="text-center">Type Text</label>
                        <textarea class="form-control" id="text" rows="3"></textarea>
                        <br>
                        <iframe src="" id="printf" name="printf" class="d-none"></iframe>
                        <button type="button" class="btn btn-primary btn-block" onclick=print()>Print</button>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
