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
        <div id="topslide" class="text-center">
            <div class="row text-center" style="color: black; background-color: white">
                    <div style="width: 11%; background-color: white;">
                        <div class="logo m-3 mr-auto">
                            <img src="{{ asset('assets/upload/image/thumbs/logo-mdh.png') }}" alt="{{ $site_config->namaweb }}" style="max-height: 80px; width: auto;"></a>
                        </div>
                    </div>
                    <div style="width: 63%; background-color: white;">
                        <div class="m-3 mr-auto text-left">
                            <h1>Masjid Darul Husna Warungboto</h1>
                            <h5>Jl. Veteran No.144, Umbulharjo, Yogyakarta</h5>
                        </div>
                    </div>
                    <div style="width: 26%; background-color: #feca57;">
                        <div class="mt-3 mr-auto">
                            <h1 style="font-size:40px">12:52:34</h1>
                            <h5>Senin, 04 Oktober 2021</h5>
                        </div>
                    </div>
            </div>
            
        </div>
        <div class="slides" id="slideshow">
            <?php
                foreach($program as $program) {
            ?>
                    <div>
                        <img style="object-fit: cover" height="100%;" src="{{ asset('assets/upload/image/'.$program->gambar) }}">
                        <div class="" style="position: absolute; top: 65%; left: 3%;font-size: 18px;">
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
            <!-- <div class="row">
                <div class="col-md-3">
                    <h5 id="time" style="color: white; text-align:center"></h5>
                </div>
                <div class="col-md-3">
                    <h5 style="color: white; text-align:left">Saldo Akhir : <?php echo $saldo_keuangan; ?></h5>
                    <h5 style="color: white; text-align:left">Saldo Beras : <?php echo $saldo_beras; ?> Kg</h5>
                </div>
                <div class="col-md-6">
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
            </div> -->
            <div class="row text-left" style="color: white">
                <div class="col-6" style="background-color: #576574">
                    <div class="m-2 mr-auto">
                        <h4>Saldo Infak: Rp 25.876.500,00 | Saldo Beras: 35 Kg</h4>
                    </div>
                </div>
                <div class="col-6" style="background-color: #222f3e">
                    <div class="m-2 mr-auto">
                        <!-- <img width="25px" style="float:left;" src="{{ asset('assets/upload/image/instagram.png') }}"><h4 style="display:inline;">&nbsp;masjiddarulhusna</h4>
                        <img width="25px" style="float:left;" src="{{ asset('assets/upload/image/facebook.png') }}"><h4 style="display:inline;">&nbsp;Masjid Darul Husna</h4> -->
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
                        <h1>04:20</h1>
                    </div>
                </div>
                <div class="col" style="background-color: #2e86de">
                    <div class="m-2 mr-auto">
                        <h2>Subuh</h2>
                        <h1>04:20</h1>
                    </div>
                </div>
                <div class="col" style="background-color: #341f97">
                    <div class="m-2 mr-auto">
                        <h2>Dzuhur</h2>
                        <h1>12:00</h1>
                    </div>
                </div>
                <div class="col" style="background-color: #01a3a4">
                    <div class="m-2 mr-auto">
                        <h2>Ashar</h2>
                        <h1>15:00</h1>
                    </div>
                </div>
                <div class="col" style="background-color: #2e86de">
                    <div class="m-2 mr-auto">
                        <h2>Maghrib</h2>
                        <h1>18:00</h1>
                    </div>
                </div>
                <div class="col" style="background-color: #341f97">
                    <div class="m-2 mr-auto">
                        <h2>Isya</h2>
                        <h1>19:00</h1>
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
            formatedDate=format_date(MyDate);
            $('#time').html(formatedDate);
            timestamp++;
        }
        $(function(){
            setInterval(updateTime, 1000);
        });

        function format_date(d) {
            tday=new Array("Ahad","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
            tmonth=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
            
            var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate(),nyear=d.getFullYear(),nhour=d.getHours(),nmin=d.getMinutes(),nsec=d.getSeconds();
            if(nmin<=9) nmin="0"+nmin;
            if(nsec<=9) nsec="0"+nsec;
            
            return ""+tday[nday]+", "+ndate+" "+tmonth[nmonth]+" "+nyear+"</br>"+nhour+":"+nmin+":"+nsec+" WIB"+""
        }
    </script>
</body>
</html>