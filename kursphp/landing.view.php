<!DOCTYPE html>
<html lang="en">
<head>

	<title>System do skracania linków</title>
	<!--

    Template 2106 Soft Landing

	http://www.tooplate.com/view/2106-soft-landing

    -->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="team" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/tooplate-style.css">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-125895089-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-125895089-1');
</script>


</head>
<body>


     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>


     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="." class="navbar-brand">Skracamy.com</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                         <li><a href="#home" class="smoothScroll">Start</a></li>
                         <li><a href="#feature" class="smoothScroll">Funkcje</a></li>
                         <li><a href="#contact" class="smoothScroll">Kontakt</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                         <li><a href="https://<?=ROOT_APP_URL;?>/kursphp/loginForm">Zaloguj</a></li>
                         <li><a href="https://<?=ROOT_APP_URL;?>/kursphp/registerForm">Załóż nowe konto</a></li>
                    </ul>
               </div>

          </div>
     </section>


     <!-- FEATURE -->
     <section id="home" data-stellar-background-ratio="0.5">
          <div class="overlay"></div>
          <div class="container">
               <div class="row">

                    <div class="col-md-offset-3 col-md-6 col-sm-12">
                         <div class="home-info">
                              <h3>system skracania linków</h3>
                              <h1>Skrócisz Twoje linki w mgnieniu oka!</h1>
                              <form action="https://<?=ROOT_APP_URL;?>/registerForm" method="post" class="online-form">
                                   <button type="submit" class="form-control">Zacznij za darmo</button>
                              </form>
                         </div>
                    </div>

               </div>
          </div>
     </section>


     <!-- FEATURE -->
     <section id="feature" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title">
                              <h1>Co dostaniesz?</h1>
                         </div>
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <ul class="nav nav-tabs" role="tablist">
                              <li class="active"><a href="#tab01" aria-controls="tab01" role="tab" data-toggle="tab">Skracanie linków</a></li>

                              <li><a href="#tab02" aria-controls="tab02" role="tab" data-toggle="tab">Krótka domena .PL</a></li>

                              <li><a href="#tab03" aria-controls="tab03" role="tab" data-toggle="tab">Certyfikat SSL</a></li>
                         </ul>

                         <div class="tab-content">
                              <div class="tab-pane active" id="tab01" role="tabpanel">
                                   <div class="tab-pane-item">
                                        <h2>Oszczędzaj znaki</h2>
                                        <p>Możesz dzielić się łatwiej swoimi linkami z innymi, skracając je do kilkuznakowych odpowiedników.</p>
                                   </div>
                                   <div class="tab-pane-item">
                                        <h2>Zmieść się z wiadomością</h2>
                                        <p>Twitter posiada napięty limit znaków. Skracanie linków to podstawa, by móc wyrazić resztę swoich myśli.</p>
                                   </div>
                              </div>


                              <div class="tab-pane" id="tab02" role="tabpanel">
                                   <div class="tab-pane-item">
                                        <h2>Domena RIY.PL</h2>
                                        <p>Skracane linki otrzymasz w trzyznakowej domenie .pl. Dzięki temu będą bardzo krótkie.</p>
                                   </div>
                              </div>

                              <div class="tab-pane" id="tab03" role="tabpanel">
                                   <div class="tab-pane-item">
                                        <h2>Certyfikat SSL</h2>
                                        <p>Cały ruch jest kierowany przez bezpieczne połączenie HTTPS. Protokół HTTPS jest wymuszany przy każdym requeście.</p>
                                   </div>
                              </div>
                         </div>

                    </div>

                    <div class="col-md-6 col-sm-6">
                         <div class="feature-image">
                              <img src="images/feature-mockup.png" class="img-responsive" alt="Thin Laptop">                             
                         </div>
                    </div>

               </div>
          </div>
     </section>

     <!-- CONTACT -->
     <section id="contact" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-offset-1 col-md-10 col-sm-12">
                         <form id="contact-form" role="form" action="email.php" method="post">
                              <div class="section-title">
                                   <h1>Pytania? Skontaktuj się z nami!</h1>
                              </div>

                              <div class="col-md-4 col-sm-4">
                                   <input type="text" class="form-control" placeholder="Imię" name="name" required="">
                              </div>
                              <div class="col-md-4 col-sm-4">
                                   <input type="email" class="form-control" placeholder="Email" name="email" required="">
                              </div>
                              <div class="col-md-4 col-sm-4">
                                   <input type="submit" class="form-control" name="send" value="Wyślij wiadomość">
                              </div>
                              <div class="col-md-12 col-sm-12">
                                   <textarea class="form-control" rows="8" placeholder="Wiadomość" name="message" required=""></textarea>
                              </div>
                         </form>
                    </div>

               </div>
          </div>
     </section>       


     <!-- FOOTER -->
     <footer id="footer" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="copyright-text col-md-12 col-sm-12">
                         <div class="col-md-6 col-sm-6">
                              <p>Copyright &copy; 2018 Skracamy.com- Design:
                				<a rel="nofollow" href="http://tooplate.com">Tooplate</a></p>
                         </div>
                    </div>

               </div>
          </div>
     </footer>


     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/custom.js"></script>

</body>
</html>