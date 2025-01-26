@extends('layouts.app')
@section('content')
<script type="text/javascript" src="/js/jsqrscanner.nocache.js"></script>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="border">
                    <div class="card-body">
                        <h2 class="text-center">QR Scanner</h2>
                        <br>
                        <div class="align-items-center">
                            <div class="form-row align-items-center">
                                    
                                <div class="col-md-3">                                
                                </div>
                                <div class="col-md-6">
                                    <div class="qrscanner" id="scanner">
                                        <video class="qrPreviewVideo" autoplay="" src="" style="width: 1px !important;"></video>
                                    </div>
                                    <br>
                                    <label for="scannedTextMemo" class="text-center">Hasil Scan</label>
                                    <input type="text" class="form-control" id="scannedTextMemo" disabled>
                                    <br>
                                    <p id="scannedTextMemoHist" class="border border-dark">List History Scan:</p>

                                    Source:<br>
                                    <a href="https://github.com/jbialobr/JsQRScanner">QR Scanner Documentation</a>
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
    <script type="text/javascript">
    var data = [];
    function onQRCodeScanned(scannedText)
    {
    	var scannedTextMemo = document.getElementById("scannedTextMemo");
    	if(scannedTextMemo)
    	{
    		scannedTextMemo.value = scannedText;
    	}

        if(data == '')
        {
            data.push(scannedText);
            document.getElementById("scannedTextMemoHist").innerHTML = "List History Scan: <br>"+scannedText;
            console.log(data);
        }
        else if(data != '')
        {
            //console.log('test');
            for (let i = 0;i < data.length; i++) {
                // console.log(data.length);
                // console.log(data[i-1]);
                // console.log(scannedText);
                if(data[i]!=scannedText)
                {
                    if(i+1==data.length)
                    {
                        data.push(scannedText)
                        let x = 0;
                        let text = "List History Scan: <br>";
                        for (;data[x];) {
                            text += data[x] + "<br>";
                            x++;
                        }
                        document.getElementById("scannedTextMemoHist").innerHTML = text;
                    }
                }
                else
                {
                    break;
                }
            }
        }
        
    }
  
    //this function will be called when JsQRScanner is ready to use
    function JsQRScannerReady()
    {
        //create a new scanner passing to it a callback function that will be invoked when
        //the scanner succesfully scan a QR code
        var jbScanner = new JsQRScanner(onQRCodeScanned);
        //reduce the size of analyzed images to increase performance on mobile devices
        jbScanner.setSnapImageMaxSize(300);
    	var scannerParentElement = document.getElementById("scanner");
    	if(scannerParentElement)
    	{
    	    //append the jbScanner to an existing DOM element
    		jbScanner.appendTo(scannerParentElement);
    	}        
    }
  </script> 
@endsection
