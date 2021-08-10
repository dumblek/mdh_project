<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slide Show</title>
    <link href="{{ asset('assets/aws/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        .slides {
            display: flex;
            scroll-snap-type: x mandatory;
            height: 80%;
        }

        .slides > div {
            display: flex;
            flex-shrink: 0;
            width: 100%;
            height: 100%;
            scroll-snap-align: start;
            scroll-behavior: smooth;
            background: white;
            justify-content: center;
            align-items: center;
            font-size: 12px;
        }

        #statis {
            background-color: green;
            height: 10%;
            padding: 10px;
        }

        #topslide {
            background-color: white;
            height: 10%;
        }

        .img-slide {
            max-width: 75%;
        }
        
    </style>
</head>
<body>
    <div id="fullscreen">
        <div id="topslide" class="text-center">
            <div class="logo"><a href="{{ asset('/') }}"><img src="{{ asset('assets/upload/image/'.$site_config->logo) }}" alt="{{ $site_config->namaweb }}" style="max-height: 80px; width: auto;"></a></div>
        </div>
        <div class="slides" id="slideshow">
            <?php
                foreach($updates as $update) {
            ?>
            <div class="p-3">
                <div class="col-lg-6 text-center">
                    <a href="#"><img src="{{ asset('assets/upload/image/'.$update->gambar) }}" alt="{{ $title }}" class="img img-fluid img-thumbnail img-slide"></a>
                </div>
                <div class="col-lg-6">
                    <h4>{{ $update->judul_berita }}</h4>
                    <div class="about-text text-aws">             
                    <?php echo $update->isi ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div id="statis" onclick="exitFullscreen();">
            <div class="row">
                <div class="col-md-3">
                    <h5 style="color: white;">{{ $today["gregorian"] }}</h5>
                </div>
                <div class="col-md-9">
                    <div class="d-flex">
                        <marquee class="" scrollamount="2" behavior="alternate">
                            <h5 style="color: white;">
                            <?php
                                foreach($jadwal_solat as $key => $value) {
                                echo $key." : ".$value; echo ' | ';} ?>
                            </h5>
                        </marquee>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button onclick="openFullscreen();">Fullscreen Mode</button>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $("#slideshow > div:gt(0)").hide();

        setInterval(function() {
        $('#slideshow > div:first')
            .fadeOut("slow")
            .next()
            .fadeIn("slow")
            .end()
            .appendTo('#slideshow');
        }, 6000);

        var elem = document.getElementById("fullscreen");
        function openFullscreen() {
        if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.webkitRequestFullscreen) { /* Safari */
                elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) { /* IE11 */
                elem.msRequestFullscreen();
            }
        }

        function exitFullscreen() {
            const cancellFullScreen = document.exitFullscreen || document.mozCancelFullScreen || document.webkitExitFullscreen || document.msExitFullscreen;
            cancellFullScreen.call(document);
        }
    </script>
</body>
</html>