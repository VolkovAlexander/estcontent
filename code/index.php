<!DOCTYPE html>
<!--
	App by FreeHTML5.co
	Twitter: http://twitter.com/fh5co
	URL: http://freehtml5.co
-->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>#Dasha_EstContent</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>


<div id="page-wrap">


	<!-- ==========================================================================================================
													   HERO
		 ========================================================================================================== -->

	<div id="fh5co-hero-wrapper">
		<nav class="container navbar navbar-expand-lg main-navbar-nav navbar-light">
			<a class="navbar-brand" href="">#dasha_estcontent</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">

				<div class="social-icons-header" style="display:none;">
					<a href="https://www.facebook.com/fh5co"><i class="fab fa-facebook-f"></i></a>
					<a href="https://freehtml5.co"><i class="fab fa-instagram"></i></a>
					<a href="https://www.twitter.com/fh5co"><i class="fab fa-twitter"></i></a>
				</div>
			</div>
		</nav>

		<div class="container fh5co-hero-inner">
			<h1 class="animated animated fadeIn wow" data-wow-delay="0.4s">Розыгрыш призов среди участников марафона<br/>"Я есть личный бренд"</h1>
            <div id="firstPart" class="wow fadeIn animated" data-wow-delay="0.8s">
                <textarea id="candidatesInput" class="form-control" rows="10" style="width: 60%; margin-top: 50px; padding: 20px; margin-bottom: 10px;" placeholder="Вставьте список участников розыгрыша"></textarea>
                <button class="btn btn-md download-btn-first" onclick="parseUsers()" style="margin-top: 40px;">Загрузить список участников</button>
                <img class="fh5co-hero-smartphone" src="img/phone-image.png" alt="Smartphone">
            </div>
            <div id="secondPart" class="wow fadeIn animated" style="display: none; margin-top: 50px; color: white;">
                <div class="row">
                    <div class="col-md-4" style="text-align: center">
                        <h2>Участников: <span id="totalCount">228</span></h2>
                    </div>
                    <div class="col-md-4" style="text-align: center">
                        <button id="searchButton" style="padding: 5px 15px;" class="btn btn-md download-btn-first animated" data-wow-delay="0.85s" onclick="findRandomUser()">Случайно определить победителя</button>
                    </div>
                    <div class="col-md-4" style="text-align: center">
                        <h2>Победителей: 8</h2>
                    </div>

                </div>
                <input type="hidden" id="list">
                <input type="hidden" id="winners">

                <div id="waiterBlock" style="margin-top: 30px; display: none">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4" style="text-align: center">
                            <img src="img/loading.gif" style="width: 73%; height: auto; border-radius: 50%"/>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 30px; display: none" id="bigWinnerBlock">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                            <img id="winnerBigImage" src="img/user-question.png" style="width: 100%; border-radius: 50%"/>
                        </div>
                        <div class="col-md-7">
                            <h3 style="margin-top: 50px;">Победитель определен!</h3>
                            <h4 id="winnerBigName" style="margin-top: 30px;"></h4>
                            <h4><a id="winnerBigLink" href="https://instagram.com/volandkb" style="color: white;" target="_blank"></a></h4>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 60px;">
                    <div class="col-md-2"></div>
                    <?php for($i = 0; $i < 8; $i++): ?>
                    <div class="col-md-1" style="text-align: center">
                        <a href="#" target="_blank" id="winnerSmallLink_<?= $i ?>" style="color: white; text-align: center;">
                            <img src="img/user-question.png" id="winnerSmallImage_<?= $i ?>" style="width: 100%; border-radius: 50%;"/>
                        </a>
                        <hr style="border-color: white;"/>
                        <b>#<?= $i+1 ?></b>
                    </div>
                    <?php endfor; ?>
                </div>
            </div>
		</div>
	</div>
</div> <!-- main page wrapper -->
	
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/wow.min.js"></script>
	<script src="js/main.js"></script>
    <script src="js/instagram.js"></script>
</body>
</html>