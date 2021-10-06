<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slide Show</title>
    <link href="{{ asset('assets/aws/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
    <style>
        /*********************************
        Fonts Start
        *********************************/
        @import url('https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700');
        @import url('https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,700i,800');
        @import url('https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i');
        @import url('https://fonts.googleapis.com/css?family=Roboto+Condensed:300i,400,400i,700');
        @import url('https://fonts.googleapis.com/css?family=Lato:300,400,700,900');
        @font-face {
            font-family: 'droidSans';
            src: url('../webfonts/DroidSans-webfont.eot');
            src: url('../webfonts/DroidSans-webfontd41d.eot?#iefix') format('embedded-opentype'), url('../webfonts/droidsans-webfont.woff2') format('woff2'), url('../webfonts/DroidSans-webfont.woff') format('woff'), url('../webfonts/DroidSans-webfont.ttf') format('truetype'), url('../webfonts/DroidSans-webfont.svg#droid_sansregular') format('svg');
            font-weight: 400;
            font-style: normal;
        }
        @font-face {
            font-family: 'droidSans';
            src: url('../webfonts/DroidSans-Bold-webfont.eot');
            src: url('../webfonts/DroidSans-Bold-webfontd41d.eot?#iefix') format('embedded-opentype'), url('../webfonts/droidsans-bold-webfont.woff2') format('woff2'), url('../webfonts/DroidSans-Bold-webfont.html') format('woff'), url('../webfonts/DroidSans-Bold-webfont-2.html') format('truetype'), url('../webfonts/DroidSans-Bold-webfont.svg#droid_sansbold') format('svg');
            font-weight: 700;
            font-style: normal;
        }
        /*********************************
        Fonts End
        *********************************/
        .slides {
            display: flex;
            scroll-snap-type: x mandatory;
            height: 66%;
            background-color: white;
        }

        .font {
            font-family: 'Poppins', sans-serif;
            /* font-family: 'Roboto Slab'; */
            /* font-family: 'droidSans'; */
            /* font-family: 'Roboto', sans-serif; */
            /* font-family: 'Roboto Condensed', sans-serif; */
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
            background-color: white;
            height: 15%;
            /*padding: 10px; */
        }

        #topslide {
            background-color: white;
            height: 14%;
        }

        /* .img-slide {
            max-width: 75%;
        } */

        .container1 {
            float:left;
            position: relative;
            width: 35%;
        }

        .container2 {
            float:left;
            position: relative;
            width: 65%;
        }

        .image{
            float:left;
        }

        .title {
            font-size: 20px;
            position: absolute;
            left: 30px;
        }
        
    </style>
</head>
<body>
    <div id="fullscreen" class="font">
        <div id="topslide" class="text-center" style="z-index: 1; position: relative;">
            <div class="row text-center" style="color: black; background-color: white">
                    <!-- <div style="width: 11%; background-color: white;"> -->
                    <div class="col-2" style="background-color: white; text-align: right;">
                        <div class="mt-3 mb-3">
                            <img src="{{ asset('assets/upload/image/logo.png') }}" alt="{{ $site_config->namaweb }}" style="max-height: 80px; width: auto;">
                        </div>
                    </div>
                    <!-- <div style="width: 63%; background-color: white;"> -->
                    <div class="col-7" style="background-color: white;">
                        <div class="mt-3 mb-3 mr-auto text-left">
                            <h1><b>Masjid Darul Husna Warungboto</b></h1>
                            <h5>Jl. Veteran No. 148, Warungboto, Umbulharjo, Yogyakarta</h5>
                        </div>
                    </div>
                    <!-- <div style="width: 26%; background-color: #feca57;"> -->
                    <div class="col-3" style="background-color: #10ac84;">
                        <div class="mt-3 mr-auto" style="color: white;">
                            <h1><b style="font-size:40px" id="time"></b></h1>
                            <h4 id="date"></h4>
                        </div>
                    </div>
            </div>
            
        </div>
        <div class="slides" id="slideshow">
            <?php
                foreach($program as $program) {
            ?>
                    <div>
                        <img style="object-fit: cover;" width="100%;" src="{{ asset('assets/upload/image/'.$program->gambar) }}">
                        <div class="" style="position: absolute; top: 65%; left: 4%;font-size: 20px;">
                            <h1 style="color: white; text-shadow: 2px 2px 5px black;">{{ $program->judul_berita }}</h1>
                            <p style="color: white; text-align: left; text-shadow: 2px 2px 5px black;">{{ strip_tags($program->keywords) }}</p>
                        </div>
                    </div>
            <?php } ?>
            
        <!-- <video style="object-fit: cover" height="190%" autoplay muted>
                <source src="{{ asset('assets/upload/video/mov_bbb.mp4') }}" type="video/mp4">
            </video>             -->
        </div>
        <div id="statis" class="" onclick="exitFullscreen();">
            <div class="row text-left" style="color: white">
                <div class="col-6" style="background-color: #576574;">
                    <div class="mt-2 mb-2 mr-auto" style="text-align: center;">
                        <h4>Saldo Infak: <b style="color: #feca57;">{{ $saldo_keuangan }}</b> | Saldo Beras: <b style="color: #feca57;">{{ $saldo_beras }} Kg</b></h4>
                    </div>
                </div>
                <div class="col-6" style="background-color: #222f3e">
                    <div class="m-2 mr-auto">
                        <div class = "container1">
                            <div class = "image">
                                <img width="25px" src="{{ asset('assets/upload/image/instagram.png') }}"> 
                            </div>
                            <div class = "title">
                                <p>masjiddarulhusna</p>
                            </div>
                        </div>
                        <div class = "container2">
                            <div class = "image">
                                <img width="25px" src="{{ asset('assets/upload/image/facebook.png') }}"> 
                            </div>
                            <div class = "title">
                                <p>Masjid Darul Husna Warungboto</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center" style="color: white">
                <div class="col" style="background-color: #01a3a4">
                    <div class="m-2 mr-auto">
                        <h2>Imsyak</h2>
                        <h1><b>{{ $jadwal_solat["Imsak"] }}</b></h1>
                    </div>
                </div>
                <div class="col" style="background-color: #2e86de">
                    <div class="m-2 mr-auto">
                        <h2>Subuh</h2>
                        <h1><b>{{ $jadwal_solat["Fajr"] }}</b></h1>
                    </div>
                </div>
                <div class="col" style="background-color: #341f97">
                    <div class="m-2 mr-auto">
                        <h2>Dzuhur</h2>
                        <h1><b>{{ $jadwal_solat["Dhuhr"] }}</b></h1>
                    </div>
                </div>
                <div class="col" style="background-color: #01a3a4">
                    <div class="m-2 mr-auto">
                        <h2>Ashar</h2>
                        <h1><b>{{ $jadwal_solat["Asr"] }}</b></h1>
                    </div>
                </div>
                <div class="col" style="background-color: #2e86de">
                    <div class="m-2 mr-auto">
                        <h2>Maghrib</h2>
                        <h1><b>{{ $jadwal_solat["Maghrib"] }}</b></h1>
                    </div>
                </div>
                <div class="col" style="background-color: #341f97">
                    <div class="m-2 mr-auto">
                        <h2>Isya</h2>
                        <h1><b>{{ $jadwal_solat["Isha"] }}</b></h1>
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

        var timestamp = '<?=time();?>';
        
        function updateTime(){
            MyDate = new Date(Date(timestamp));
            formatedTime=format_time(MyDate);
            $('#time').html(formatedTime);
            formatedDate=format_date(MyDate);
            $('#date').html(formatedDate);
            timestamp++;
        }
        $(function(){
            setInterval(updateTime, 1000);
        });

        function format_time(d) {
            nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds();
            if(nmin<=9) nmin="0"+nmin;
            if(nsec<=9) nsec="0"+nsec;

            return ""+nhour+":"+nmin+":"+nsec+""
        }

        function format_date(d) {
            tday=new Array("Ahad","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
            tmonth=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
            
            var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getFullYear();
            
            return ""+tday[nday]+", "+ndate+" "+tmonth[nmonth]+" "+nyear+""
        }
    </script>
</body>
</html>