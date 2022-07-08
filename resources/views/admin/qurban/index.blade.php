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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/progress-bar/css/jquery.rprogessbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/progress-bar/css/style.css') }}">
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

        .marquee {
            /* position: relative; */
            /* width: 100vw; */
            max-width: 100%;
            overflow-x: hidden;
        }

        .track {
            position: absolute;
            white-space: nowrap;
            will-change: transform;
            animation: marquee 32s linear infinite;
        }

        @keyframes marquee {
            from { transform: translateX(0); }
            to { transform: translateX(-50%); }
        }

        .area {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
        @media (min-width: 768px) {
            .area {
                width: 750px;
            }
        }
        @media (min-width: 992px) {
            .area {
                width: 970px;
            }
        }
        @media (min-width: 1400px) {
            .area {
                width: 1700px;
            }
        }
        
        .slides {
            display: flex;
            scroll-snap-type: x mandatory;
            height: 66%;
            background-color: #254d24;
        }

        .body {
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
            /* height: 15%; */
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
            width: 50%;
        }

        .container2 {
            float:left;
            position: relative;
            width: 50%;
        }

        .image{
            float:left;
        }

        /* .title {
            font-size: 20px;
            position: absolute;
            left: 30px;
        } */
        
        .progressbar{width: 100%; margin-top: 5px; margin-bottom: 25px; position: relative; background-color: #f4f4f4;}.proggress{height: 8px; width: 10px; background-color: #ff0;}.percentCount{float: right; margin-top: -42px; clear: both; font-weight: 700; font-size: 13px; color: #777777;}

        /*
        Default Style
        */

        @import url('https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap');
        :root {
            --body-font: 'Poppins', sans-serif;
        }

        * {
            font-family: var(--body-font);
        }

        .single-progressbar .title {
            font-size: 18px;
            line-height: 28px;
            font-weight: 600;
        }

        .single-progressbar {
            margin-bottom: 30px;
        }

        .card {
            margin-bottom: 30px;
        }

        .card .card-header .title {
            font-size: 18px;
            font-weight: 600;
            padding: 0;
        }

        .card .card-body code {
            background-color: #efecec;
            padding: 10px;
            border-radius: 3px;
        }

        .header .title {
            font-size: 50px;
            font-weight: 600;
        }

        .header {
            text-align: center;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .header .title::first-letter {
            color: #fc4444;
        }

        .margin-top-60 {
            margin-top: 60px;
        }

        ul.menu {
            margin: 0;
            padding: 0;
            list-style: none;
            margin-top: 40px;
        }

        ul.menu li {
            display: inline-block;
        }

        ul.menu li a {
            color: #333;
            font-size: 14px;
            font-weight: 600;
            transition: all 500ms;
            text-decoration: none;
        }

        ul.menu li a:hover {
            color: #fc4444;
        }

        ul.menu li+li {
            margin-left: 25px;
        }
    </style>
</head>
<body class="body">
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
                            <h1><b> Idul Adha 1443 H - Masjid Darul Husna Warungboto</b></h1>
                            <h5>Jl. Veteran No. 148, Warungboto, Umbulharjo, Yogyakarta</h5>
                        </div>
                    </div>
                    <!-- <div style="width: 26%; background-color: #254d24;"> -->
                    <div class="col-3" style="background-color: white;">
                        <div class="mt-3 mr-auto" style="color: black;">
                            <h1><b style="font-size:40px" id="time"></b></h1>
                            <h4 id="date"></h4>
                        </div>
                    </div>
            </div>
        </div>
        <section class="demo-area" style="background-color: white; height: 82%">
            <div class="area">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header">
                            <h2>Qurban Sapi</h2>
                        </div>
                        <div class="single-progressbar">
                            <h4 class="title">Penyembelihan (<b id="prosesSembelihSapi"></b>/<b id="totalSembelihSapi"></b>)</h4>
                            <div class="sembelihSapi"></div>
                        </div>
                        <div class="single-progressbar">
                            <h4 class="title">Pengeletan (<b id="prosesKeletSapi"></b>/<b id="totalKeletSapi"></b>)</h4>
                            <div class="keletSapi"></div>
                        </div>
                        <div class="single-progressbar">
                            <h4 class="title">Penimbangan (<b id="prosesTimbangSapi"></b>/<b id="totalTimbangSapi"></b>)</h4>
                            <div class="timbangSapi"></div>
                        </div>
                        <div class="single-progressbar">
                            <h4 class="title">Pembungkusan Sohibul (<b id="prosesBungkusSapi"></b>/<b id="totalBungkusSapi"></b>)</h4>
                            <div class="bungkusSapi"></div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="header">
                            <h2>Qurban Kambing</h2>
                        </div>
                        <div class="single-progressbar">
                            <h4 class="title">Penyembelihan (<b id="prosesSembelihKambing"></b>/<b id="totalSembelihKambing"></b>)</h4>
                            <div class="sembelihKambing"></div>
                        </div>
                        <div class="single-progressbar">
                            <h4 class="title">Pengeletan (<b id="prosesKeletKambing"></b>/<b id="totalKeletKambing"></b>)</h4>
                            <div class="keletKambing"></div>
                        </div>
                        <div class="single-progressbar">
                            <h4 class="title">Penimbangan (<b id="prosesTimbangKambing"></b>/<b id="totalTimbangKambing"></b>)</h4>
                            <div class="timbangKambing"></div>
                        </div>
                        <div class="single-progressbar">
                            <h4 class="title">Pembungkusan (<b id="prosesBungkusKambing"></b>/<b id="totalBungkusKambing"></b>)</h4>
                            <div class="bungkusKambing"></div>
                        </div>
                    </div>

                    <!-- <div class="col-lg-6">
                        <div class="header">
                            <h2>Live Streaming</h2>
                        </div>
                        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/Yun2MbnSKxw" title="Ustadz Ahmad MZ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div> -->
                    
                    <div class="col-lg-12">
                        <div class="header">
                            <h2>Distribusi Daging Qurban</h2>
                        </div>
                        <div class="single-progressbar">
                            <h4 class="title">Pembungkusan (<b id="prosesBungkusDistribusi"></b>/<b id="totalBungkusDistribusi"></b>)</h4>
                            <div class="bungkusDistribusi"></div>
                        </div>
                        <div class="single-progressbar">
                            <h4 class="title">Terdistribusi Warga (<b id="prosesWargaDistribusi"></b>/<b id="totalWargaDistribusi"></b>)</h4>
                            <div class="wargaDistribusi"></div>
                        </div>
                        <div class="single-progressbar">
                            <h4 class="title">Terdistribusi Luar (<b id="prosesLuarDistribusi"></b>/<b id="totalLuarDistribusi"></b>)</h4>
                            <div class="luarDistribusi"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div id="statis" class="" onclick="exitFullscreen();">
            <div class="row text-left" style="color: white">
                <div class="col-7" style="background-color: #222f3e">
                    <div class="m-2 mr-auto">
                        <!-- <marquee loop="-1" behavior="slide">Saksikan siaran langsung penyembelihan hewan qurban di Facebook dan Youtube Masjid Darul Husna</marquee> -->
                        <div class="marquee">
                            <div class="track">
                                <div class="content">&nbsp;Saksikan siaran langsung penyembelihan hewan qurban Idul Adha 1443 H Masjid Darul Husna di Facebook dan Youtube Masjid Darul Husna</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-5" style="background-color: #222f3e">
                    <div class="m-2 mr-auto">
                        <div class = "container1">
                            <div class = "image">
                                <img width="25px" src="{{ asset('assets/upload/image/youtube.png') }}"> 
                            </div>
                            <div class = "title">
                                <p>&nbsp;Masjid Darul Husna Warungboto</p>
                            </div>
                        </div>
                        <div class = "container2">
                            <div class = "image">
                                <img width="25px" src="{{ asset('assets/upload/image/facebook.png') }}"> 
                            </div>
                            <div class = "title">
                                <p>&nbsp;Masjid Darul Husna Warungboto</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    
    <button onclick="openFullscreen();">Fullscreen Mode</button>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.1.0/jquery-migrate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
    <script src="assets/js/jQuery.rProgressbar.min.js"></script>
    <script src="assets/js/active.js"></script>
    <script>
        /** * jQuery Line Progressbar * Author: Sharifur Rahman * Author URI : https:devrobin.com * Version: 1.0.0 */ ;
        (function($) {
            'use strict';
            $.fn.rProgressbar = function(options) {
                options = $.extend({ percentage: null, ShowProgressCount: true, duration: 1000, fillBackgroundColor: '#ed1c24', backgroundColor: '#EEEEEE', borderRadius: '0px', height: '10px', width: '100%' }, options);
                $.options = options;
                return this.each(function(index, el) {
                    $(el).html('<div class="progressbar"><div class="proggress"></div><div class="percentCount"></div></div>');
                    var lineProgressBarInit = function() {
                        var progressFill = $(el).find('.proggress');
                        var progressBar = $(el).find('.progressbar');
                        progressFill.css({ backgroundColor: options.fillBackgroundColor, height: options.height, borderRadius: options.borderRadius });
                        progressBar.css({ width: options.width, backgroundColor: options.backgroundColor, borderRadius: options.borderRadius });
                        progressFill.animate({ width: options.percentage + "%" }, { step: function(x) { if (options.ShowProgressCount) { $(el).find(".percentCount").text(Math.round(x) + "%"); } }, duration: 0 });
                    }
                    $(this).waypoint(lineProgressBarInit, { offset: '100%', triggerOnce: true });
                });
            }
        })(jQuery);

        (function($) {
            'use strict';

            $('.html').rProgressbar({
                percentage: 80,
                fillBackgroundColor: '#1abc9c'
            });
            $('.css').rProgressbar({
                percentage: 90,
                fillBackgroundColor: '#2ecc71'
            });



            $('.php').rProgressbar({
                percentage: 75,
                fillBackgroundColor: '#9b59b6'
            });



            $('.javascript').rProgressbar({
                percentage: 65,
                fillBackgroundColor: '#34495e'
            });



            $('.jquery').rProgressbar({
                percentage: 95,
                fillBackgroundColor: '#f1c40f',
                backgroundColor: '#e67e22'
            });

        })(jQuery);

        function updateData(){
            $.ajax({
            url: "data_qurban",
            })
            .done(function( data ) {
                let result= $.parseJSON(data);
                $('#totalSembelihSapi').html(result.penyembelihan[0].total);
                $('#prosesSembelihSapi').html(result.penyembelihan[0].proses);
                $('#totalKeletSapi').html(result.pengeletan[0].total);
                $('#prosesKeletSapi').html(result.pengeletan[0].proses);
                $('#totalTimbangSapi').html(result.penimbangan[0].total);
                $('#prosesTimbangSapi').html(result.penimbangan[0].proses);
                $('#totalBungkusSapi').html(result.pembungkusan[0].total);
                $('#prosesBungkusSapi').html(result.pembungkusan[0].proses);

                $('#totalSembelihKambing').html(result.penyembelihan[1].total);
                $('#prosesSembelihKambing').html(result.penyembelihan[1].proses);
                $('#totalKeletKambing').html(result.pengeletan[1].total);
                $('#prosesKeletKambing').html(result.pengeletan[1].proses);
                $('#totalTimbangKambing').html(result.penimbangan[1].total);
                $('#prosesTimbangKambing').html(result.penimbangan[1].proses);
                $('#totalBungkusKambing').html(result.pembungkusan[1].total);
                $('#prosesBungkusKambing').html(result.pembungkusan[1].proses);

                $('#totalBungkusDistribusi').html(result.pembungkusan_umum.total);
                $('#prosesBungkusDistribusi').html(result.pembungkusan_umum.proses);
                $('#totalWargaDistribusi').html(result.distribusi_warga.total);
                $('#prosesWargaDistribusi').html(result.distribusi_warga.proses);
                $('#totalLuarDistribusi').html(result.distribusi_luar.total);
                $('#prosesLuarDistribusi').html(result.distribusi_luar.proses);

                $('.sembelihSapi').rProgressbar({
                    percentage: result.penyembelihan[0].proses / result.penyembelihan[0].total * 100,
                    fillBackgroundColor: '#eb2f06',
                });
                $('.keletSapi').rProgressbar({
                    percentage: result.pengeletan[0].proses / result.pengeletan[0].total * 100,
                    fillBackgroundColor: '#fa983a',
                });
                $('.timbangSapi').rProgressbar({
                    percentage: result.penimbangan[0].proses / result.penimbangan[0].total * 100,
                    fillBackgroundColor: '#1e3799',
                });
                $('.bungkusSapi').rProgressbar({
                    percentage: result.pembungkusan[0].proses / result.pembungkusan[0].total * 100,
                    fillBackgroundColor: '#38ada9',
                });

                $('.sembelihKambing').rProgressbar({
                    percentage: result.penyembelihan[1].proses / result.penyembelihan[1].total * 100,
                    fillBackgroundColor: '#eb2f06',
                });
                $('.keletKambing').rProgressbar({
                    percentage: result.pengeletan[1].proses / result.pengeletan[1].total * 100,
                    fillBackgroundColor: '#fa983a',
                });
                $('.timbangKambing').rProgressbar({
                    percentage: result.penimbangan[1].proses / result.penimbangan[1].total * 100,
                    fillBackgroundColor: '#1e3799',
                });
                $('.bungkusKambing').rProgressbar({
                    percentage: result.pembungkusan[1].proses / result.pembungkusan[1].total * 100,
                    fillBackgroundColor: '#38ada9',
                });

                $('.bungkusDistribusi').rProgressbar({
                    percentage: result.penyembelihan[0].proses / result.penyembelihan[0].total * 100,
                    fillBackgroundColor: '#34495e',
                });
                $('.wargaDistribusi').rProgressbar({
                    percentage: result.pengeletan[0].proses / result.pengeletan[0].total * 100,
                    fillBackgroundColor: '#4a69bd',
                });
                $('.luarDistribusi').rProgressbar({
                    percentage: result.penimbangan[0].proses / result.penimbangan[0].total * 100,
                    fillBackgroundColor: '#f1c40f',
                });
            });
        }
        $(function(){
            setInterval(updateData, 1000);
        });

        function persenSembelihSapi() {
            let persen = 20
            $.ajax({
                url: "data_qurban",
            })
            .done(function( data ) {
                let result= $.parseJSON(data);
                console.log('iki perseeen');
                console.log(result.pengeletan[1].total);
                console.log(persen)
                return result.pengeletan[1].total
                // console.log(persen)
            });
            // return persen;
            // setInterval(function() {
            // }, 1000);
            // return persen;
        }
    </script>
</body>
</html>