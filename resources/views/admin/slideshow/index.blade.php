<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="{{ asset('assets/aws/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        .slides {
            display: flex;
            scroll-snap-type: x mandatory;
            height: 90%;
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
        }
        
    </style>
</head>
<body>
    <div id="fullscreen">
        <div class="slides" id="slideshow">
            <?php
                foreach($updates as $update) {
            ?>
            <div class="">
                <div class="col-lg-6">
                    <a href="#"><img src="{{ asset('assets/upload/image/'.$update->gambar) }}" alt="{{ $title }}" class="img img-fluid img-thumbnail"></a>
                </div>
                <div class="col-lg-6">
                    <div class="about-text text-aws">
                    <style type="text/css" media="screen">
                                    .text-aws img {
                                        width: auto;
                                        max-width: 100%;
                                        height: auto;
                                    }
                                </style>               
                    <?php echo $update->isi ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        <div id="statis" onclick="exitFullscreen();">
            <h2 style="color: white;">Ini statis</h2>
        </div>
    </div>
    <button onclick="openFullscreen();">Fullscreen Mode</button>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $("#slideshow > div:gt(0)").hide();

        setInterval(function() {
        $('#slideshow > div:first')
            .fadeOut(2000)
            .next()
            .fadeIn(2000)
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
            console.log('kok ragelem');
            const cancellFullScreen = document.exitFullscreen || document.mozCancelFullScreen || document.webkitExitFullscreen || document.msExitFullscreen;
            cancellFullScreen.call(document);
        }
    </script>
</body>
</html>