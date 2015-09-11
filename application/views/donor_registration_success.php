<!DOCTYPE html>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Colour A Dream | IMCD</title>

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Add jQuery Style direct - used for jQGrid plugin -->
    <link href="/assets/css/jquery-ui.css" rel="stylesheet" type="text/css">


    <link href="/assets/js/slimScroll.js" rel="stylesheet" type="text/css">

    <!-- Primary Inspinia style -->
    <link href="/assets/css/css.css" rel="stylesheet">

    <link href="/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">


    <style type="text/css"></style>
</head>
<body id="page-top" class="landing-page  pace-done">
<div class="pace  pace-inactive">
    <div class="pace-progress" data-progress-text="100%" data-progress="99"
         style="transform: translate3d(100%, 0px, 0px);">
        <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div>
</div>
<div class="navbar-wrapper">
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#page-top">Colour A Dream</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a class="page-scroll"
                                          href="<?= base_url('/index.php/home') ?>#page-top">Home</a></li>
                    <li class=""><a class="page-scroll" href="<?= base_url('/index.php/home') ?>#features">How</a></li>
                    <li class=""><a class="page-scroll" href="<?= base_url('/index.php/home') ?>#team">Team</a></li>
                    <li class=""><a class="page-scroll" href="<?= base_url('/index.php/home') ?>#timeline">Timeline</a>
                    </li>
                    <li class=""><a class="page-scroll" href="<?= base_url('/index.php/home') ?>#from_us">What our
                            hearts say</a></li>
                    <li class=""><a class="page-scroll" href="<?= base_url('/index.php/home') ?>#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div id="inSlider" class="carousel carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#inSlider" data-slide-to="0" class=""></li>
        <li data-target="#inSlider" data-slide-to="1" class="active"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="item">
            <div class="container">
                <div class="carousel-caption">
                    <h1>
                        The measure of life is not its duration,<br/> but its donation.
                    </h1>

                    <p>Peter Marshall</p>
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back one"></div>
        </div>
        <div class="item active">
            <div class="container">
                <div class="carousel-caption blank">
                    <h1>Join with us!</h1>

                    <p>Inspire the community</p>
                </div>
            </div>
            <!-- Set background for slide in css -->
            <div class="header-back two"></div>
        </div>
    </div>
    <a class="left carousel-control" href="#inSlider" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#inSlider" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<section id="features" class="container services">
    <div class="row">
        <div class="col-lg-12">
            <h1>Become a part of the worthy course</h1>

            <div class="col-md-8">

                <h2>Thank You</h2>

                <h3>Your information reached us. We will be finding you a benificiary student soon and get back to you
                    within short time.</h3>
            </div>
        </div>
    </div>
</section>

<div class="row">
    <div class="col-lg-8 col-lg-offset-2 text-center m-t-lg m-b-lg">
        <p><strong>© 2015 International Movement for Community Development</strong></p>
    </div>
</div>

<!-- Section for main scripts render -->
<script src="/assets/js/jquery-2.1.1.js"></script>

<script src="/assets/js/bootstrap.min.js"></script>

<script src="/assets/js/slimScroll.js"></script>

<script src="/assets/js/landing.js"></script>

<script src="/assets/js/plugins/validate/jquery.validate.min.js"></script>


<script>

    $(document).ready(function () {

        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 80
        });

        // Page scrolling feature
        $('a.page-scroll').bind('click', function (event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
        });
    });

    var cbpAnimatedHeader = (function () {
        var docElem = document.documentElement,
            header = document.querySelector('.navbar-default'),
            didScroll = false,
            changeHeaderOn = 200;

        function init() {
            window.addEventListener('scroll', function (event) {
                if (!didScroll) {
                    didScroll = true;
                    setTimeout(scrollPage, 250);
                }
            }, false);
        }

        function scrollPage() {
            var sy = scrollY();
            if (sy >= changeHeaderOn) {
                $(header).addClass('navbar-scroll')
            }
            else {
                $(header).removeClass('navbar-scroll')
            }
            didScroll = false;
        }

        function scrollY() {
            return window.pageYOffset || docElem.scrollTop;
        }

        init();

    })();

</script>


<iframe frameborder="0" scrolling="no" style="border: 0px; display: none; background-color: transparent;"></iframe>
<div id="GOOGLE_INPUT_CHEXT_FLAG" input=""
     input_stat="{&quot;tlang&quot;:true,&quot;tsbc&quot;:true,&quot;pun&quot;:false,&quot;mk&quot;:false,&quot;ss&quot;:true}"
     style="display: none;"></div>
</body>
</html>