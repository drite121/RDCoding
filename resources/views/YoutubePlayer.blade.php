@extends('layouts.app')
@section('content')
   
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="border">
                    <div class="card-body">
                        <h2 class="text-center">Youtube Player</h2>
                        <br>
                        <div class="align-items-center">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe id="player" src="https://www.youtube.com/embed/videoseries?si=Z5WyVOBmpC6X_rCZ&autoplay=1&amp;list=PLcY9e6roQLvA9cAFWWP1TKZFR_csnD6gJ&rel=0&modestbranding=1&autohide=1&mute=1&showinfo=0&controls=0&autoplay=1"></iframe>
                            </div>
                            <br>
                            <label for="TextItem" class="text-center">Embeded Youtube Source</label>
                            <input type="text"  class="form-control" id="TextItem" placeholder="https://www.youtube.com/embed/Uz6J2q5UroA?si=qdnvNs2pT0rDBxKE">
                            <br>
                            <button type="button" class="btn btn-primary btn-block" onclick="Play()">Play</button>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const source= [
            "https://www.youtube.com/embed/videoseries?si=Z5WyVOBmpC6X_rCZ&autoplay=1&amp;list=PLcY9e6roQLvA9cAFWWP1TKZFR_csnD6gJ",
            "https://www.youtube.com/embed/videoseries?si=I1AbKGFgsm1nG04R&autoplay=1&amp;list=PLcY9e6roQLvDZ1qSpSTjP8z3wiU_5LvVB",
            "https://www.youtube.com/embed/videoseries?si=AWn-dwgi8R-4v-D_&autoplay=1&amp;list=PLcY9e6roQLvC1HbAATeFyhQVwbNIKGNWz",
            "https://www.youtube.com/embed/videoseries?si=ighaqqq8qM-Ivm28&autoplay=1&amp;list=PLcY9e6roQLvBzdK_txRl-qYl67YrLd9Ma",
            "https://www.youtube.com/embed/videoseries?si=TThrPlJbnvVCCxv6&autoplay=1&amp;list=PLcY9e6roQLvA44a5t1Bhod2O9KdZILsSs",
            "https://www.youtube.com/embed/videoseries?si=AbeLT3EN9pbrxlsa&autoplay=1&amp;list=PLcY9e6roQLvDtDqQ94dr0go0r2Qg_1r3T",
            "https://www.youtube.com/embed/videoseries?si=Nxk-BQeRXGeCUeBU&autoplay=1&amp;list=PLcY9e6roQLvBI1I-x3cTvl_t054f2oZKB",
            "https://www.youtube.com/embed/videoseries?si=R9J_XdrQR9GbR1xC&autoplay=1&amp;list=PLcY9e6roQLvBOyZItoP9uaU9QIPMkq7Ft",

        ]

        RNG=Math.floor(Math.random()* 4);
        let play=source[RNG]+"&rel=0&modestbranding=1&autohide=1&mute=1&showinfo=0&controls=0&autoplay=1";
        document.getElementById('player').src = play;

        function Play()
        {
            let data = document.getElementById('TextItem').value;
            let play= data+"&rel=0&modestbranding=1&autohide=1&mute=1&showinfo=0&controls=0&autoplay=1";
            document.getElementById('player').src = play;
        }
    </script>
@endsection
