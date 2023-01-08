<!DOCTYPE html>
<html>
<head>
    <title>Movies Pro an Entertainment Category Flat Bootstrap Responsive Website Template </title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Movies Pro Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <!-- pop-up -->
    <link href="/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //pop-up -->
    <link href="/css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" type="text/css" href="/css/zoomslider.css" />
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <link href="/css/font-awesome.css" rel="stylesheet">
    <script type="text/javascript" src="/js/modernizr-2.6.2.min.js"></script>
    <!--/web-fonts-->
    <link href='//fonts.googleapis.com/css?family=Tangerine:400,700' rel='stylesheet' type='text/css'>
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!--//web-fonts-->
</head>
    <body>
    <div id="demo-1" data-zs-src='["<?=$data['filmsByYear'][0]['posterUrl'] ? $data['filmsByYear'][0]['posterUrl'] : $data['filmsByGenre'][0]['posterUrl']?>", "<?=$data['filmsByYear'][1]['posterUrl'] ? $data['filmsByYear'][1]['posterUrl'] : $data['filmsByGenre'][1]['posterUrl']?>", "<?=$data['filmsByYear'][2]['posterUrl'] ? $data['filmsByYear'][2]['posterUrl'] : $data['filmsByGenre'][2]['posterUrl']?>","<?=$data['filmsByYear'][3]['posterUrl'] ? $data['filmsByYear'][3]['posterUrl'] : $data['filmsByGenre'][3]['posterUrl']?>"]' data-zs-overlay="dots">
        <div class="demo-inner-content">
            <!--/header-w3l-->
            <div class="header-w3-agileits" id="home">
                <div class="inner-header-agile">
                    <nav class="navbar navbar-default">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <h1><a  href="/"><span>M</span>ovies <span>P</span>ro</a></h1>
                        </div>
                        <!-- navbar-header -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="/">Home</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Genre <b class="caret"></b></a>
                                    <ul class="dropdown-menu multi-column columns-3">
                                        <li>
                                            <?
                                            foreach ($data['genres'] as $id=>$genre):?>
                                                <div class="col-sm-4">
                                                    <ul class="multi-column-dropdown">
                                                        <li><a href="/genres/genrepage/?genreName=<?=$genre?>&page=1"><?=$genre?></a></li>
                                                    </ul>
                                                </div>
                                            <?endforeach;?>
                                            <div class="clearfix"></div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                        <div class="clearfix"> </div>
                    </nav>
                    <div class="w3ls_search">
                        <div class="cd-main-header">
                            <ul class="cd-header-buttons">
                                <li><a class="cd-search-trigger" href="#cd-search"> <span></span></a></li>
                            </ul> <!-- cd-header-buttons -->
                        </div>
                        <div id="cd-search" class="cd-search">
                            <form action="#" method="post">
                                <input name="Search" type="search" placeholder="Search...">
                            </form>
                        </div>
                    </div>

                </div>

            </div>
            <!--/banner-info-->
            <div class="baner-info">
                <h3>Latest <span>On</span>Line <span>Mo</span>vies</h3>
                <h4>In space no one can hear you scream.</h4>
                <!--<a class="w3_play_icon1" href="#small-dialog1">
                    Watch Trailer
                </a>-->
            </div>
            <!--/banner-ingo-->
        </div>
    </div>
    <!--/banner-section-->
    <!--//main-header-->
    <!--/banner-bottom-->
    <div class="w3_agilits_banner_bootm">
        <div class="w3_agilits_inner_bottom">
            <div class="col-md-6 wthree_agile_login">
                <ul>
                    <li><i class="fa fa-phone" aria-hidden="true"></i> (+000) 009 455 4088</li>
                    <?if(!empty($_SESSION['USER'])):?>
                        <li><a href="/registration/account" class="login" >Аккаунт</a></li>
                        <li><a href="/registration/deauthorize" class="login" >Выйти из аккаунта</a></li>
                        <li><a href="/user/favorites/?page=1" class="login" >Избранное</a></li>
                    <?else:?>
                        <li><a href="#" class="login"  data-toggle="modal" data-target="#myModal4">Войти в аккаунт</a></li>
                        <li><a href="#" class="login reg" data-toggle="modal" data-target="#myModal5">Зарегестрироваться</a></li>
                    <?endif;?>
                </ul>
            </div>
        </div>
    </div>
    <!--//banner-bottom-->
    <!-- Modal1 -->
    <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" >

        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4>Login</h4>
                    <div class="login-form">
                        <form action="/registration/authorize" id="formLogin" method="post">
                            <input type="email" name="authorize[email]" placeholder="E-mail" required="">
                            <input type="password" name="authorize[password]" placeholder="Password" required="">
                            <div class="tp">
                                <input type="submit" value="LOGIN NOW">
                            </div>
                            <div class="forgot-grid">
                                <!--<div class="log-check">
                                    <label class="checkbox"><input type="checkbox" name="authorize[checkbox remember me]">Remember me</label>
                                </div>-->
                                <div class="forgot">
                                    <a href="#" data-toggle="modal" data-target="#myModal2">Forgot Password?</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="g-recaptcha" id="recaptchaLogin" data-sitekey="6LfN95sjAAAAAPvrwP1yvDLtCP0AumUPheUKJ8Fa"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //Modal1 -->
    <!-- Modal1 -->
    <div class="modal fade" id="myModal5" tabindex="-1" role="dialog" >

        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4>Register</h4>
                    <div class="login-form">
                        <form id="formRegister" action="/registration/register" method="post">
                            <input type="text" name="register[name]" placeholder="Name" required="">
                            <input type="email" name="register[email]" placeholder="E-mail" required="">
                            <input type="password" name="register[password]" id="password" placeholder="Password" required="">
                            <input type="password" name="register[confirm password]" id="confirmPassword" placeholder="Confirm Password" required="" >
                            <div class="signin-rit">
														<span class="agree-checkbox">
														<label class="checkbox"><input type="checkbox" name="register[checkbox_agreement]" required="">I agree to your <a class="w3layouts-t" href="#" target="_blank">Terms of Use</a> and <a class="w3layouts-t" href="#" target="_blank">Privacy Policy</a></label>
													</span>
                            </div>
                            <div class="tp">
                                <input type="submit" id="submit" value="REGISTER NOW">
                            </div>
                            <div class="g-recaptcha" id="recaptchaRegister" data-sitekey="6LfN95sjAAAAAPvrwP1yvDLtCP0AumUPheUKJ8Fa"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
    <?if($_SERVER['REQUEST_URI'] != '/'):?>
    <div class="w3_breadcrumb">
        <div class="breadcrumb-inner">
            <ul>
                <li><a href="/">Home</a><i>//</i></li>
                <?$crumbs = explode("/",$_SERVER["REQUEST_URI"]);?>
                <li><?=$crumbs[1]?></li>
          </ul>
        </div>
    </div>
    <?endif;?>
    <!-- //breadcrumb -->
    <?php include 'application/views/'.$content_view; ?>

<!--/footer-bottom-->
<div class="contact-w3ls" id="contact">
    <div class="footer-w3lagile-inner">
        <!--<h2>Sign up for our <span>Newsletter</span></h2>
        <p class="para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vitae eros eget tellus
            tristique bibendum. Donec rutrum sed sem quis venenatis.</p>
        <div class="footer-contact">
            <form action="#" method="post">
                <input type="email" name="Email" placeholder="Enter your email...." required=" ">
                <input type="submit" value="Subscribe">
            </form>
        </div>
        <div class="footer-grids w3-agileits">
            <div class="col-md-2 footer-grid">
                <h4>Release</h4>
                <ul>
                    <li><a href="#" title="Release 2016">2016</a></li>
                    <li><a href="#" title="Release 2015">2015</a></li>
                    <li><a href="#" title="Release 2014">2014</a></li>
                    <li><a href="#" title="Release 2013">2013</a></li>
                    <li><a href="#" title="Release 2012">2012</a></li>
                    <li><a href="#" title="Release 2011">2011</a></li>
                </ul>
            </div>
            <div class="col-md-2 footer-grid">
                <h4>Movies</h4>
                <ul>

                    <li><a href="genre.html">ADVENTURE</a></li>
                    <li><a href="comedy.html">COMEDY</a></li>
                    <li><a href="series.html">FANTASY</a></li>
                    <li><a href="series.html">ACTION  </a></li>
                    <li><a href="genre.html">MOVIES  </a></li>
                    <li><a href="horror.html">HORROR  </a></li>

                </ul>
            </div>


            <div class="col-md-2 footer-grid">
                <h4>Review Movies</h4>
                <ul class="w3-tag2">
                    <li><a href="comedy.html">Comedy</a></li>
                    <li><a href="horror.html">Horror</a></li>
                    <li><a href="series.html">Historical</a></li>
                    <li><a href="series.html">Romantic</a></li>
                    <li><a href="series.html">Love</a></li>
                    <li><a href="genre.html">Action</a></li>
                    <li><a href="single.html">Reviews</a></li>
                    <li><a href="comedy.html">Comedy</a></li>
                    <li><a href="horror.html">Horror</a></li>
                    <li><a href="series.html">Historical</a></li>
                    <li><a href="series.html">Romantic</a></li>
                    <li><a href="genre.html">Love</a></li>
                    <li><a href="comedy.html">Comedy</a></li>
                    <li><a href="horror.html">Horror</a></li>
                    <li><a href="genre.html">Historical</a></li>

                </ul>


            </div>
            <div class="col-md-2 footer-grid">
                <h4>Latest Movies</h4>
                <div class="footer-grid1">
                    <div class="footer-grid1-left">
                        <a href="single.html"><img src="images/1.jpg" alt=" " class="img-responsive"></a>
                    </div>
                    <div class="footer-grid1-right">
                        <a href="single.html">eveniet ut molesti</a>

                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="footer-grid1">
                    <div class="footer-grid1-left">
                        <a href="single.html"><img src="images/2.jpg" alt=" " class="img-responsive"></a>
                    </div>
                    <div class="footer-grid1-right">
                        <a href="single.html">earum rerum tenet</a>

                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="footer-grid1">

                    <div class="footer-grid1-left">
                        <a href="single.html"><img src="images/4.jpg" alt=" " class="img-responsive"></a>
                    </div>
                    <div class="footer-grid1-right">
                        <a href="single.html">eveniet ut molesti</a>

                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="footer-grid1">
                    <div class="footer-grid1-left">
                        <a href="single.html"><img src="images/3.jpg" alt=" " class="img-responsive"></a>
                    </div>
                    <div class="footer-grid1-right">
                        <a href="single.html">earum rerum tenet</a>

                    </div>
                    <div class="clearfix"> </div>
                </div>


            </div>
            <div class="col-md-2 footer-grid">
                <h4 class="b-log"><a href="index.html"><span>M</span>ovies <span>P</span>ro</a></h4>
                <div class="footer-grid-instagram">
                    <a href="single.html"><img src="images/m1.jpg" alt=" " class="img-responsive"></a>
                </div>
                <div class="footer-grid-instagram">
                    <a href="single.html"><img src="images/m2.jpg" alt=" " class="img-responsive"></a>
                </div>
                <div class="footer-grid-instagram">
                    <a href="single.html"><img src="images/m3.jpg" alt=" " class="img-responsive"></a>
                </div>
                <div class="footer-grid-instagram">
                    <a href="single.html"><img src="images/m4.jpg" alt=" " class="img-responsive"></a>
                </div>
                <div class="footer-grid-instagram">
                    <a href="single.html"><img src="images/m5.jpg" alt=" " class="img-responsive"></a>
                </div>
                <div class="footer-grid-instagram">
                    <a href="single.html"><img src="images/m6.jpg" alt=" " class="img-responsive"></a>
                </div>

                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
            <ul class="bottom-links-agile">
                <li><a href="icons.html" title="Font Icons">Icons</a></li>
                <li><a href="short-codes.html" title="Short Codes">Short Codes</a></li>
                <li><a href="contact.html" title="contact">Contact</a></li>

            </ul>
        </div>-->
        <h3 class="text-center follow">Connect <span>Us</span></h3>
        <ul class="social-icons1 agileinfo">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
        </ul>

    </div>

</div>
<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

<script src="/js/jquery-1.11.1.min.js"></script>
<!-- Dropdown-Menu-JavaScript -->
<script>
    $(document).ready(function(){
        $(".dropdown").hover(
            function() {
                $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
                $(this).toggleClass('open');
            },
            function() {
                $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
                $(this).toggleClass('open');
            }
        );
    });
</script>
<!-- //Dropdown-Menu-JavaScript -->


<script type="text/javascript" src="/js/jquery.zoomslider.min.js"></script>
<!-- search-jQuery -->
<script src="/js/main.js"></script>
<script src="/js/simplePlayer.js"></script>
<script>
    $("document").ready(function() {
        $("#video").simplePlayer();
    });
</script>
<script>
    $("document").ready(function() {
        $("#video1").simplePlayer();
    });
</script>
<script>
    $("document").ready(function() {
        $("#video2").simplePlayer();
    });
</script>
<script>
    $("document").ready(function() {
        $("#video3").simplePlayer();
    });
</script>

<!-- pop-up-box -->
<script src="/js/jquery.magnific-popup.js" type="text/javascript"></script>
<!--//pop-up-box -->

<div id="small-dialog1" class="mfp-hide">
    <iframe src="https://player.vimeo.com/video/165197924?color=ffffff&title=0&byline=0&portrait=0"></iframe>
</div>
<div id="small-dialog2" class="mfp-hide">
    <iframe src="https://player.vimeo.com/video/165197924?color=ffffff&title=0&byline=0&portrait=0"></iframe>
</div>
<script>
    $(document).ready(function() {
        $('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
            type: 'inline',
            fixedContentPos: false,
            fixedBgPos: true,
            overflowY: 'auto',
            closeBtnInside: true,
            preloader: false,
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });

    });
</script>
<script src="/js/easy-responsive-tabs.js"></script>
<script>
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true,   // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
        $('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
    });
</script>
<link href="/css/owl.carousel.css" rel="stylesheet" type="text/css" media="all">
<script src="/js/owl.carousel.js"></script>
<script>
    $(document).ready(function() {
        $("#owl-demo").owlCarousel({

            autoPlay: 3000, //Set AutoPlay to 3 seconds
            autoPlay : true,
            navigation :true,

            items : 5,
            itemsDesktop : [640,4],
            itemsDesktopSmall : [414,3]

        });

    });
</script>

<!--/script-->
<script type="text/javascript" src="/js/move-top.js"></script>
<script type="text/javascript" src="/js/easing.js"></script>

<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},900);
        });
    });
</script>
<!--<script type="text/javascript">
    $(document).ready(function() {
        /*
        var defaults = {
              containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
         };
        */

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>-->
<!--end-smooth-scrolling-->
    <!--<script>
        grecaptcha.enterprise.ready(function() {
            grecaptcha.enterprise.execute('6LesmJojAAAAAEUDwP8ivAXgsoyrctYYwkwCh-o4', {action: '/registration/authorize'}).then(function(token) {
            ...
            });
        });
    </script>-->
    <script>
        function onSubmit(){

        }
    </script>
    <script>
        var inputConfirm = document.getElementById('confirmPassword');
        var inputMainPassword = document.getElementById('password');

        inputConfirm.addEventListener('input', function()
        {
            if (inputConfirm.value != inputMainPassword.value){
                inputConfirm.style.outline = "thick solid #ff0000";
                document.getElementById('submit').disabled = true;
            }else{
                inputConfirm.style.outline = "none";
                document.getElementById('submit').disabled = false;
            }
        });
    </script>
<script src="/js/bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $( "#formLogin" ).submit(function(event) {
                event.preventDefault();
                $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,

                    success: function(data) {
                        const obj = JSON.parse(data);
                        var marker = 0;
                        $.each(obj.errors, function(index, element) {
                            if (index == 'captchaError' && element == 'true')
                            {
                                alert('Проверьте капчу');
                                var c = $('.g-recaptcha').length;
                                for (var i = 0; i < c; i++)
                                    grecaptcha.reset(i);
                                marker = 1;
                            } else if(index == 'logPassError' && element == 'true'){
                                alert('Неверный логин или пароль');
                                var c = $('.g-recaptcha').length;
                                for (var i = 0; i < c; i++)
                                    grecaptcha.reset(i);
                                marker = 1;
                            }
                        });
                        if (marker == 0){
                            location.reload();
                        }
                    },
                });
            });
            $( "#formRegister" ).submit(function(event) {
                event.preventDefault();
                $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,

                    success: function(data) {
                        const obj = JSON.parse(data);
                        var marker = 0;
                        $.each(obj.errors, function(index, element) {
                            if (index == 'captchaError' && element == 'true')
                            {
                                alert('Проверьте капчу');
                                var c = $('.g-recaptcha').length;
                                for (var i = 0; i < c; i++)
                                    grecaptcha.reset(i);
                                marker = 1;
                            } else if(index == 'logPassError' && element == 'true'){
                                alert('Неверный логин или пароль');
                                var c = $('.g-recaptcha').length;
                                for (var i = 0; i < c; i++)
                                    grecaptcha.reset(i);
                                marker = 1;
                            }else if(index == 'emailError' && element == 'true'){
                                alert('Пользователь с таким Email уже зарегестрирован');
                                var c = $('.g-recaptcha').length;
                                for (var i = 0; i < c; i++)
                                    grecaptcha.reset(i);
                                marker = 1;
                            }
                        });
                        if (marker == 0){
                            location.reload();
                        }
                    },
                });
            });
        });
    </script>
    <script>
        var selects  = document.querySelectorAll('.heart-like-button')
        selects.forEach(function(select) {
            select.addEventListener("click", () => {
                if (select.classList.contains("liked")) {
                    select.classList.remove("liked");
                    console.log(select.id);
                    $.ajax({
                        type: 'post',
                        url: '/user/removeFromFavorites',
                        data: {filmId: select.id},
                        success: function(data) {
                        },
                    });
                } else {
                    select.classList.add("liked");
                    //var msg = { filmId: select.id};
                    var jsontosend =  JSON.stringify({ filmId: select.id});
                    console.log(JSON.stringify({filmId: select.id}));
                    $.ajax({
                        type: 'POST',
                        url: '/user/addToFavorites',
                        data: {filmId: select.id},
                        success: function(data) {
                            const obj = JSON.parse(data);
                            var marker = 0;
                            $.each(obj.errors, function(index, element) {
                                if (index == 'notUser' && element == 'true')
                                {
                                    select.classList.remove("liked");
                                    alert('Чтобы добавить фильм в избранное войдите в аккаунт или зарегистрируйтесь');
                                }
                            });
                        },
                    });
                }
            });
        });
    </script>
</body>

</html>