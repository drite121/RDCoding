@extends('layouts.app')
@section('content')
    <script>
        navigator.serviceWorker.register("{{ asset('js/sw.js') }}");
        Notification.requestPermission().then(function(permission) {
  if (permission === 'granted') {
    console.log('Notification permission granted.');
  } else {
    console.log('Unable to get permission to notify.');
  }
});
navigator.serviceWorker.ready.then(function(registration) {
  registration.pushManager.subscribe({userVisibleOnly: true})
  .then(function(subscription) {
    alert("test");
    console.log('Subscribed for push:', subscription.endpoint);
  })
  .catch(function(error) {
    console.log('Subscription failed:', error);
  });
});
        function send() {
 
            // Notification.requestPermission().then(function(permission) {
            // if (permission === 'granted') {
            //     var title = document.getElementById("Title").value;
            //     var body = document.getElementById("Body").value;
            //     new Notification(title, {
            //         body: body,
            //     })
            // } else {
            //     alert('Unable to get permission to notify.');
            // }
            // });
            
        };

    </script>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="bg-white border">
                    <div class="card-body">
                        <h2 class="text-center">Notification</h2>
                        <br>
                        <div class="align-items-start">
                            <div class="form-row align-items-start">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-6">
                                    <label for="Title" class="text-center">Title</label>
                                    <input type="text"  class="form-control" id="Title">
                                    <br>
                                    <label for="Body" class="text-center">Body</label>
                                    <input type="text"  class="form-control" id="Body">
                                    <br>
                                    <button type="button" class="btn btn-primary btn-block" onclick="send()">Send</button>
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