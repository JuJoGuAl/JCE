<?php
session_start();
require_once './translations.php';

if (isset($_GET['lang']) && array_key_exists($_GET['lang'], $translations)) {
    $_SESSION['lang'] = $_GET['lang'];
    $lang = $_GET['lang'];
}
if (!isset($_GET['lang'])) {
    $_SESSION['lang'] = 'es';
    $lang = 'es';
}
$lang = $_SESSION['lang'] ?? 'es';
$traduccion = $translations[$lang];
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
    <head>
        <?php include ('./header.php'); ?>
    </head>
    <body class="lqd-preloader-style-fade lqd-sticky-footer-shadow-2 lqd-search-style-slide-top" data-localscroll-offset="72" data-mobile-nav-breakpoint="1199" data-mobile-nav-style="classic" data-mobile-nav-scheme="light" data-mobile-nav-trigger-alignment="right" data-mobile-header-scheme="gray" data-mobile-logo-alignment="default" data-overlay-onmobile="true">
        <div class="bg-white" id="wrap">
            <div class="lqd-sticky-placeholder hidden"></div>
            <header id="site-header" class="main-header main-header-overlay" data-sticky-header="false">
                <section class="lqd-section lqd-hide-onstuck w-full flex flex-wrap items-center justify-between border-bottom border-white-10 transition-all px-2percent ">		
                    <div class="w-50percent flex items-center justify-start py-10 ">
                        <a class="navbar-brand flex relative py-15" href="./" rel="home">
                            <span class="navbar-brand-inner post-rel">
                                <img class="logoparacomputador" width="400" height="auto" src="/images/logo-2.png" alt="">
                            </span>
                        </a>
                        <div class="w-85percent flex items-stretch justify-end"></div>
                    </div>
                    <div class="w-50percent flex items-center justify-end py-10 link-white link-font-normal link-14">
                        <div class="dropdown">
                            <button class="btn btn-naked leading-16 dropdown-toggle" id="dropdownMenuButton">
                                <div class="ld-fancy-heading relative mr-10 py-5 px-15 mb-0 border-2 border-black rounded-100 animation-element" style="background-color: rgba(255, 255, 255, 0.685); font-size: 12px; font-weight: 400; border: none; letter-spacing: normal;">
                                    <h5 class="ld-fh-element inline-block relative text-14 uppercase tracking-1 m-0" style="font-size: 12px; font-weight: 400; letter-spacing: normal; border: none;"><?php echo $traduccion['menuAcceso'] ?></h5>
                                </div>
                            </button>
                            <div class="dropdown-content" id="dropdown-content" style=" border-radius: 21px; background-color: #ffffffe0;">
                                <a style="padding: 5px 15px;" href="http://www.rjce.cl/repre/repre"><?php echo $traduccion['menuAccesoOrdenCompra'] ?></a>
                                <a style="padding: 5px 15px;" href="https://jce.appingcsa.com/"><?php echo $traduccion['menuAccesoPlataforma'] ?></a>
                            </div>
                        </div>
                        <div class="ld-dropdown-menu link-black flex relative pl-20 ml-20 border-left border-white-10" role="menubar">
                            <a href="<?php echo $traduccion['menuLangChangeURL'] ?>" curosor="pointer">
                                <span ><img style="width: 25px;" src=".\images\cambio-idioma.png"><span class="text-white">&nbsp;<?php echo $traduccion['menuLangChange'] ?></span></span>
                            </a>
                        </div>
                        <!--Formulario de contacto-->
                        <div class="pl-20 ml-20 border-left border-white-10 ld-module-search lqd-module-search-slide-top items-center" data-module-style="lqd-search-style-slide-top">
                            <span class="ld-module-trigger collapsed lqd-module-trigger-txt-left lqd-module-show-icon lqd-module-icon-plain text-14" role="button" data-ld-toggle="true" data-bs-toggle="collapse" data-bs-target="#search-header-top" aria-controls="search-header-top" aria-expanded="false">
                                <span class="ld-module-trigger-txt"></span>
                                <span class="ld-module-trigger-icon text-white"><?php echo $traduccion['menuAccesoContacto'] ?></span>
                            </span>
                            <div class="ld-module-dropdown flex w-full flex-col fixed overflow-hidden backface-hidden" id="search-header-top" role="searchbox">
                                <div class="ld-search-form-container flex flex-col justify-center h-full mx-auto backface-hidden">
                                    <section class="lqd-section contact" id="contact">
                                        <div class="container">
                                            <div id="contact-form" class="relative w-full module-form">
                                                <form role="search" method="get" action="#" class="ld-search-form w-full">
                                                    <span style="z-index: 999999; margin: 0px; top: 0px; right: 0px;" class="input-icon inline-flex items-center justify-center absolute collapsed bt-0" data-ld-toggle="true" data-bs-toggle="collapse" data-bs-target="#search-header-top" aria-controls="search-header-top" aria-expanded="false" role="search">
                                                        <i class="lqd-icn-ess icon-ld-search"></i>
                                                    </span>
                                                </form>
                                                <div class="relative rounded-6 bg-white shadow-md pt-30 pl-50 pb-50 pr-50 transition-all" data-custom-animations="true" data-ca-options='{"animationTarget": ".animation-element", "duration" : 1800 , "delay" : 180 , "ease": "power4.out", "initValues": {"y": "35px", "opacity" : 0} , "animations": {"y": "0px", "opacity" : 1}}'>
                                                    <div><h3><?php echo $traduccion['ContactoFormlbl'] ?></h3></div>
                                                    <div class="mb-0 lqd-contact-form lqd-contact-form-inputs-filled lqd-contact-form-button-block lqd-contact-form-button-lg lqd-contact-form-button-round lqd-contact-form-inputs-lg animation-element">
                                                        <div role="form" id="mini-form-help" lang="es-CL">
                                                            <div class="screen-reader-response">
                                                                <p role="status" aria-live="polite" aria-atomic="true"></p>
                                                            </div>
                                                            <form action="https://docs.google.com/forms/d/e/1FAIpQLSeEiMIRzmMQdj3KSJyNrIqgBWtyylnVR1umf4cYIQ6TZP_o8A/formResponse" method="POST" target="_blank" >
                                                                <div class="row">
                                                                    <div class="col col-12 py-0">
                                                                        <span class="mb-0 lqd-form-control-wrap relative">
                                                                            <input class="text-black px-2em text-14 font-normal bg-yellow-100" type="text" name="entry.1712204619" value="" size="40" aria-required="true" aria-invalid="false" placeholder="<?php echo $traduccion['ContactoFormNombre'] ?>">
                                                                            <i class="lqd-icn-ess icon-lqd-user"></i>
                                                                        </span>
                                                                    </div>
                                                                    <div style="width:100%;"></div>
                                                                    <div class="col col-12 py-0">
                                                                        <span class="mb-0 lqd-form-control-wrap relative">
                                                                            <input class="text-black px-2em text-14 font-normal bg-yellow-100" type="email" name="entry.1852992241" value="" size="40" aria-required="true" aria-invalid="false" placeholder="<?php echo $traduccion['ContactoFormEmail'] ?>">
                                                                            <i class="lqd-icn-ess icon-lqd-envelope"></i>
                                                                        </span>
                                                                    </div>
                                                                    <div style="width:100%;"></div>
                                                                    <div class="col col-12 py-0">
                                                                        <span class="mb-0 lqd-form-control-wrap relative">
                                                                            <input class="text-black px-2em text-14 font-normal bg-yellow-100" type="phone" name="entry.389312874" value="" size="40" aria-required="true" aria-invalid="false" placeholder="<?php echo $traduccion['ContactoFormTelefono'] ?>">
                                                                            <i class="lqd-icn-ess icon-lqd-phone"></i>
                                                                            <div class="iconbox-icon-wrap mr-25">
                                                                                <div class="iconbox-icon-container w-20 text-20">
                                                                                    <svg class="w-1em h-1em" xmlns="http://www.w3.org/2000/svg" width="19.063" height="19.057" viewBox="0 0 19.063 19.057">
                                                                                        <path fill="var(--lqd-body-text-color);" d="M1.969-18.375v1.313a7.172,7.172,0,0,1,3.65.984A7.31,7.31,0,0,1,8.2-13.494a7.172,7.172,0,0,1,.984,3.65H10.5A8.353,8.353,0,0,0,9.331-14.15a8.4,8.4,0,0,0-3.056-3.056A8.353,8.353,0,0,0,1.969-18.375Zm-6.788,1.969a1.442,1.442,0,0,0-.964.349L-7.9-13.9l.062-.041A1.966,1.966,0,0,0-8.5-12.879a2.041,2.041,0,0,0,.072,1.23A20.666,20.666,0,0,0-6.891-8.367,20.038,20.038,0,0,0-3.671-4.2,21.246,21.246,0,0,0,3.773.554h.021a2.245,2.245,0,0,0,1.2.082A2.32,2.32,0,0,0,6.07.1L8.142-1.969a1.379,1.379,0,0,0,.41-1.015A1.379,1.379,0,0,0,8.142-4L5.455-6.706a1.391,1.391,0,0,0-1.025-.41,1.391,1.391,0,0,0-1.025.41L2.112-5.394A10.206,10.206,0,0,1-.595-7.229,8.015,8.015,0,0,1-2.42-9.905l1.313-1.312a1.505,1.505,0,0,0,.431-1.077,1.234,1.234,0,0,0-.492-1.015l.062.062-2.748-2.81A1.442,1.442,0,0,0-4.819-16.406Zm6.788.656v1.313a4.5,4.5,0,0,1,2.307.615,4.558,4.558,0,0,1,1.671,1.671,4.5,4.5,0,0,1,.615,2.307H7.875a5.809,5.809,0,0,0-.8-2.974A6.127,6.127,0,0,0,4.942-14.95,5.809,5.809,0,0,0,1.969-15.75Zm-6.788.656a.253.253,0,0,1,.144.062l2.687,2.748a.142.142,0,0,1-.041.144l-1.948,1.928.144.41.267.574A11.008,11.008,0,0,0-2.81-7.875,7.98,7.98,0,0,0-1.5-6.3,11.479,11.479,0,0,0,.82-4.573,8.9,8.9,0,0,0,1.969-4l.41.185L4.368-5.8q.041-.041.062-.041t.062.041L7.26-3.035q.041.041.041.051t-.041.051L5.209-.9A.945.945,0,0,1,4.225-.7a19.676,19.676,0,0,1-6.973-4.43A19.5,19.5,0,0,1-5.763-9.044,17.408,17.408,0,0,1-7.2-12.1v-.021a.679.679,0,0,1-.021-.441.745.745,0,0,1,.226-.4l2.03-2.071A.2.2,0,0,1-4.819-15.094Zm6.788,1.969v1.313a1.9,1.9,0,0,1,1.395.574,1.9,1.9,0,0,1,.574,1.395H5.25a3.21,3.21,0,0,0-.441-1.641,3.258,3.258,0,0,0-1.2-1.2A3.21,3.21,0,0,0,1.969-13.125Z" transform="translate(8.563 18.375)" fill="#fad55b"></path>
                                                                                    </svg>
                                                                                </div>
                                                                            </div>
                                                                        </span>
                                                                    </div>
                                                                    <div style="width:100%;"></div>
                                                                    <div class="col col-12 py-0">
                                                                        <span class="mb-0 lqd-form-control-wrap relative">
                                                                            <input class="text-black px-2em text-14 font-normal bg-yellow-100" type="text" name="entry.216002328" value="" size="40" aria-required="true" aria-invalid="false" placeholder="<?php echo $traduccion['ContactoFormMensaje'] ?>">
                                                                        </span>
                                                                    </div>
                                                                    <div style="width:100%;"></div>
                                                                    <div class="col col-12 py-0">
                                                                        <input type="submit" value="<?php echo $traduccion['ContactoFormbtn'] ?>" class="mb-0 font-bold text-secondary has-spinner text-16" style="color: white; background-color: #181818e0;">
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <div class="lqd-cf-response-output"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </header>
            <main class="content bg-white bg-repeat" id="lqd-site-content" style="background-image: url();">
                <div id="lqd-contents-wrap">
                    <!-- Start Banner -->
                    <section class="lqd-section banner relative bg-center bg-cover transition-all" id="banner" style="background-image: url('');">
                        <!--agregado -->
                        <div class="module-video w-full h-full absolute top-0 left-0 overflow-hidden z-0 transotion-opacity pointer-events-none bg-before xs:hidden">
                            <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0); z-index: 1;"></div>
                            <video class="background-video-hosted max-w-full w-full h-full absolute-center object-cover" src="/videos/videojceempresa.mp4" autoplay muted playsinline loop></video>
                        </div>
                        <div class="container">
                            <div class="row min-h-100vh items-center">
                                <div class="w-55percent flex flex-col lg:w-full">
                                    <div class="ld-fancy-heading relative mask-text" data-custom-animations="true" data-ca-options='{"animationTarget": ".lqd-split-chars .lqd-chars .split-inner", "duration" : 1000 , "delay" : 40 , "ease": "power4.out", "direction": "random", "initValues": {"opacity" : 0} , "animations": {"opacity" : 1}}'>
                                        <div class="logoparacelu" style="text-align:center;"><img class="logo-sticky" width="200" height="auto" src="/images/logojce.png" alt=""></div>
                                        <h1 style="line-height: 1.1; font-size: 50px;" class="ld-fh-element mb-0/15em inline-block relative lqd-highlight-custom lqd-highlight-custom-1 lqd-split-chars text-70 text-white leading-0/9em" data-inview="true" data-transition-delay="true" data-delay-options='{"elements": ".lqd-highlight-inner", "delayType": "transition"}' data-split-text="true" >
                                            <mark class="lqd-highlight">
                                                <span class="lqd-highlight-txt textoprincipal"><?php echo $traduccion['BannerTextPrin1'] ?></span>
                                                <span class="lqd-highlight-inner bottom-0 left-0">
                                                    <svg class="lqd-highlight-brush-svg lqd-highlight-brush-svg-1" xmlns="http://www.w3.org/2000/svg" width="235.509" height="13.504" viewBox="0 0 235.509 13.504" aria-hidden="true" preserveAspectRatio="none" fill="#FFCD28">
                                                        <path d="M163,.383a13.044,13.044,0,0,1,1.517-.072,3.528,3.528,0,0,1,1.237-.134q.618.044,1.237.044a.249.249,0,0,1-.1.178.337.337,0,0,0-.1.266q3.092.088,6.184-.044T178.953.4l-.206-.088a12,12,0,0,0,4.123,0,13.467,13.467,0,0,1,5.772,0q1.443-.178,2.68-.266A5.978,5.978,0,0,1,193.8.4,16.707,16.707,0,0,1,198.01.045q2.164.088,4.844.088-.618.088-.824.134L201.412.4a3.893,3.893,0,0,0,2.061,0,5.413,5.413,0,0,1,1.649-.356q.618.088,1.134.178a9.762,9.762,0,0,0,1.544.09,17,17,0,0,1,3.092-.266q1.649,0,3.5.178,2.886.088,5.875.044t5.875-.222q0,.088.206.088h.412a21.975,21.975,0,0,0,2.577.889A12.458,12.458,0,0,1,232.12,2.18a3.962,3.962,0,0,1,1.031.622A3.349,3.349,0,0,1,234.8,3.825a5.079,5.079,0,0,1,.618,1.111q.412.534-1.031.98-1.031.444-.618.98a2.09,2.09,0,0,1,.206.889q0,.444.825.889.618.8-.206,1.245l-1.237.534q-1.443-.088-2.68-.134a17.255,17.255,0,0,1-2.267-.222,3.128,3.128,0,0,0-.928-.044,3.129,3.129,0,0,1-.928-.044q-2.267-.178-4.432-.266T217.7,9.476q-1.649-.088-2.886-.088a17.343,17.343,0,0,1-2.474-.178q-3.916,0-7.73-.088t-7.73-.266l-12.471-.178q-6.287-.088-12.883-.088h-1.958q-.928,0-1.958.088h-2.061q-1.031,0-2.061-.088-2.68-.088-5.256-.134t-5.256.044h-5.462q-2.577,0-5.462.088-4.535.088-8.76.178t-8.554.088q-2.886.088-5.875.088t-5.875.088q-1.443.088-2.886.134t-3.092.044q-4.741.178-9.791.312t-9.791.312q-2.267.088-4.329.088T78.77,10.1q-4.329.266-8.863.49t-9.276.49q-1.237.088-2.68.134a24.356,24.356,0,0,0-2.683.224q-2.68.178-5.462.312t-5.668.4q-2.474.266-4.741.312t-4.741.044q-1.031-.088-1.958-.134a9.684,9.684,0,0,1-1.958-.312,12.5,12.5,0,0,0-1.443-.312q-.825-.134-1.856-.31-2.886.356-6.39.666t-6.8.845a26.709,26.709,0,0,1-2.886.356,20.758,20.758,0,0,1-9.482-.889Q.232,11.962.026,11.25T1.263,9.917q0-.266.825-.266a13.039,13.039,0,0,0,2.886-.444A17.187,17.187,0,0,1,7.86,8.672q3.092-.266,6.184-.8,1.649-.178,3.3-.312t3.5-.312q4.123-.354,8.039-.712t8.039-.622q9.478-.8,18.758-1.338,2.68-.178,5.153-.356t4.741-.356q2.474-.178,5.05-.356T75.88,3.24h1.34a4.829,4.829,0,0,0,1.34-.178q2.267-.178,4.329-.222t4.329-.134a7.256,7.256,0,0,1,2.267,0,3.459,3.459,0,0,0,1.031-.088,6.009,6.009,0,0,1,2.37-.266,14.745,14.745,0,0,0,2.783-.088q1.649,0,2.474.088a1.308,1.308,0,0,1,.185.011,1.226,1.226,0,0,1,.33-.1,3.656,3.656,0,0,0,.515-.088,4.433,4.433,0,0,1,2.886.266q.412-.088,1.031-.178l1.237-.178q.412,0,1.031.044a5.761,5.761,0,0,0,1.237-.044q2.886-.088,5.772-.044a53.829,53.829,0,0,0,5.772-.222,9.505,9.505,0,0,1,1.34-.088h1.34a4.428,4.428,0,0,1,.821-.258l.825-.178a15.178,15.178,0,0,1,1.855.444,3.028,3.028,0,0,1,1.031-.534,4.039,4.039,0,0,1,1.443-.178,6.158,6.158,0,0,1,1.649.178,5.05,5.05,0,0,0,2.267.268q1.855-.088,3.813-.134T138.13,1.2q1.031,0,2.164-.044t2.37-.044q-.206-.088.412-.534h3.092q.412,0,.309.266t.928,0a5.845,5.845,0,0,1,1.443,0,31.833,31.833,0,0,0,5.359.088,21.471,21.471,0,0,1,6.8.178,5.236,5.236,0,0,0,1.031-.4q.412-.222.825-.4a.694.694,0,0,1,.137.07Z" transform="translate(0 0.002)"></path>
                                                    </svg>
                                                </span>
                                            </mark>
                                            <span class="textoprincipal"><?php echo $traduccion['BannerTextPrin2'] ?><nav></nav></span>
                                            <span class="textoprincipal2"><?php echo $traduccion['BannerTextPrin3'] ?></span>
                                        </h1>
                                    </div>
                                    <div data-custom-animations="true" data-ca-options='{"animationTarget": ".animation-element", "ease": "power4.out"}'>
                                        <div class="mobile-centrado animation-element" data-custom-animations="true" data-ca-options='{"animationTarget": ".animation-element", "startDelay" : 800 , "ease": "power4.out", "initValues": {"y": "50px", "opacity" : 0} , "animations": {"y": "0px", "opacity" : 1}}'>
                                            <!-- <div class="ld-fancy-heading pr-10percent relative animation-element">
                                                <p class="ld-fh-element inline-block relative text-22 font-normal leading-1/6em mb-1/5em text-white-70">Distribución a nivel nacional + de 30 años de experiencia. Ventas con mas de 30 millones de dólares. </p>
                                            </div> -->
                                            <a  href="/#inicio" style="margin-top: 10px; color: white !important;	background-color: #181818e0 !important;" class="btn btn-solid btn-md font-bold btn-icon-right btn-hover-reveal whitespace-nowrap text-16 rounded-4 text-secondary  py-15 px-55 hover:text-white animation-element" data-localscroll="true">
                                                <span class="btn-txt" data-text="<?php echo $traduccion['Bannerbtn'] ?>" ><?php echo $traduccion['Bannerbtn'] ?></span>
                                                <span class="btn-icon text-1/25em tracking-0">
                                                    <i aria-hidden="true" class="lqd-icn-ess icon-md-arrow-round-forward"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- End Banner -->
                    <!-- Start Thin Fixed BG -->
                    <section class="lqd-section py-100 thin-fixed-bg bg-center bg-cover relative transition-all" style="background-image: url('/images/jce-empresa-fisica.jpg')">
                        <div class="background-overlay transition-all bg-secondary opacity-90"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col col-lg-12" data-custom-animations="true" data-ca-options='{"animationTarget": ".animation-element", "duration" : 800 , "delay" : 100 , "ease": "power4.out", "initValues": {"opacity" : 0} , "animations": {"opacity" : 1}}'>
                                    <div class="ld-fancy-heading relative text-center">
                                        <h2 class="ld-fh-element text-50 mb-0/5em inline-block relative animation-element" style="font-size: 30px; width: 80%;">
                                            <span class="text-primary"><?php echo $traduccion['StickText1']; ?></span>
                                            <span class="text-white"><?php echo $traduccion['StickText2']; ?></span>
                                            <span class="text-primary"><?php echo $traduccion['StickText3']; ?></span>
                                            <span class="text-white"><?php echo $traduccion['StickText4']; ?></span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- End Thin Fixed BG -->
                    <div style="height: 60px;" ></div>
                    <!-- Start Services -->
                    <section class="lqd-section services bg-white rounded-10 mb-90">
                        <div class="container" id="inicio">
                            <div class="row">
                                <div class="col col-12 pt-55 pb-70 px-10 module-col" data-custom-animations="true" data-ca-options='{"animationTarget": ".animation-element", "ease": "back.out", "direction": "backward", "initValues": {"y": "100px", "opacity" : 0} , "animations": {"y": "0px", "opacity" : 1}}'>
                                    <div class="accordion accordion-title-underlined accordion-sm animation-element" id="accordion-services" role="tablist" aria-multiselectable="true">
                                        <div class="accordion-item panel active">
                                            <div class="accordion-heading" role="tab" id="heading-item-one">
                                                <h4 style="font-size: 25px; color: rgb(43, 43, 43);" class="accordion-title font-normal">
                                                    <a class="collapsed" role="button" data-bs-toggle="collapse" href="#collapse-item-one" aria-expanded="true" aria-controls="collapse-item-one">
                                                        <span class="accordion-title-txt">Posicionando <b>a las marcas en el top local.</b></span>
                                                        <span class="accordion-expander text-24 w-60 h-60 flex items-center justify-center p-0 border-2 rounded-full  border-lightgray flex-shrink-0">
                                                            <i class="lqd-icn-ess icon-ion-ios-add" style="font-size: 19px;"></i>
                                                            <i class="lqd-icn-ess icon-ion-ios-remove" style="font-size: 19px;"></i>
                                                        </span>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse-item-one" class="accordion-collapse collapse show" data-bs-parent="#accordion-services" role="tabpanel" aria-labelledby="heading-item-one">
                                                <div class="accordion-content py-1em">
                                                    <div class="flex flex-wrap items-end">
                                                        <div class="w-60percent flex flex-wrap align-content-end items-end gap-0 pr-50 sm:w-full module-content">
                                                            <div class="lqd-counter relative lqd-counter-default mb-10 text-black w-auto">
                                                                <div class="lqd-counter-element relative font-medium" data-enable-counter="true" data-counter-options='{"targetNumber": "30"}'>
                                                                    <span class="block">30</span>
                                                                </div>
                                                            </div>
                                                            <div class="ld-fancy-heading relative">
                                                                <span class="ld-fh-element inline-block relative text-16 leading-20 mb-2em italic text-gray-500 xl:m-0">Años de<br>experiencia</span>
                                                            </div>
                                                            <div class="ld-fancy-heading relative mt-10">
                                                                <p class="ld-fh-element mb-0/5em inline-block relative">Más de 30 años posicionándonos en el mercado como líderes en artículos y maquinarias para jardín, forestal y agrícola.</p>
                                                                <div style="margin-top: 10px">
                                                                    <h4>Qué ofrecemos al mercado: </h4>
                                                                    <p><strong>∙Excelencia en Calidad del Producto:</strong> Asegurándonos de mantener altos estándares de calidad en productos y marcas distribuidas. </p>
                                                                    <p><strong>∙Innovación Continua:</strong> Permanecer a la vanguardia de la innovación en la industria. Introduciendo nuevas características, tecnologías o diseños que nos diferencian de la competencia. </p>
                                                                    <p><strong>∙Marketing Localizado:</strong> Personalizando las estrategias de marketing para adaptarse a las necesidades y preferencias específicas del mercado local.  </p>
                                                                    <p>Hoy hemos acumulado un conocimiento profundo del sector, otorgándonos una comprensión sólida de las necesidades y tendencias del mercado, así como una red de contactos establecida en la industria.
                                                                        También podemos incluir habilidades en la gestión de inventario, la negociación con proveedores y clientes, el desarrollo de estrategias de marketing y ventas específicas para los productos y marcas representadas, además la capacidad para identificar oportunidades de negocio.
                                                                        Esta experiencia es invaluable para establecer relaciones sólidas con los fabricantes, distribuidores y minoristas en la industria, así como para adaptarte a los cambios en el mercado y anticipar nuevas oportunidades de negocio.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="w-40percent sm:w-full " style="text-align: top; align-self: baseline;">
                                                            <div class="lqd-imggrp-single block relative">
                                                                <div class="lqd-imggrp-img-container inline-flex relative items-center justify-center mb-30">
                                                                    <figure class="w-full relative" >
                                                                        <img style="border-radius: 12px;" width="500px" height="auto" src="\images\servicios\servicios1.jpg" alt="services">
                                                                    </figure>
                                                                </div>
                                                                <!-- <p><strong>∙Monitoreo de la Competencia:</strong> Siempre al tanto de las actividades de la competencia para brindar una oportunidad de diferenciarse. </p> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item panel">
                                            <div class="accordion-heading" role="tab" id="heading-item-two">
                                                <h4 style="font-size: 25px; color: rgb(43, 43, 43);" class="accordion-title font-normal">
                                                    <a class="collapsed" role="button" data-bs-toggle="collapse" href="#collapse-item-two" aria-expanded="false" aria-controls="collapse-item-two">
                                                        <span class="accordion-title-txt"> Canales de Distribución relevantes <b>a nivel nacional.</b></span>
                                                        <span class="accordion-expander text-24 w-60 h-60 flex items-center justify-center p-0 border-2 rounded-full  border-lightgray flex-shrink-0">
                                                            <i class="lqd-icn-ess icon-ion-ios-add" style="font-size: 19px;"></i>
                                                            <i class="lqd-icn-ess icon-ion-ios-remove" style="font-size: 19px;"></i>
                                                        </span>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse-item-two" class="accordion-collapse collapse" data-bs-parent="#accordion-services" role="tabpanel" aria-labelledby="heading-item-two">
                                                <div class="accordion-content py-1em">
                                                    <div class="flex flex-wrap items-end">
                                                        <div class="w-60percent flex flex-wrap align-content-end items-end gap-0 pr-50 sm:w-full module-content">
                                                            <div class="lqd-counter relative lqd-counter-default -mb-1 text-black w-auto">
                                                                <div class="lqd-counter-element relative font-medium mb-0" data-enable-counter="true" data-counter-options='{"targetNumber": "600"}'>
                                                                    <span class="block">600</span>
                                                                </div>
                                                            </div>
                                                            <div class="ld-fancy-heading relative">
                                                                <span class="ld-fh-element inline-block relative text-16 leading-20 mb-2em italic text-gray-500 xl:m-0">Puntos en<br> el mercado</span>
                                                            </div>
                                                            <div class="ld-fancy-heading relative mt-10">
                                                                <p class="ld-fh-element mb-0/5em inline-block relative">Es crucial contar con canales de distribución eficientes para llegar a los clientes de manera efectiva por ello, contamos con más de 600 puntos de venta y más de 10 canales de distribución relevantes en el mercado chileno,  llevando a las marcas representadas a un posicionamiento top dentro del mercado.</p>
                                                                <div style="margin-top: 10px">
                                                                    <h4>Entre ellos podemos destacar:</h4>
                                                                    <p><strong>∙Red de servicios técnicos:</strong> relaciones sólidas con servicios exclusivos en diversos estados, dedicados completamente a promover y vender nuestros productos, garantizando un enfoque especializado y una presencia local fuerte.  </p>
                                                                    <p><strong>∙Venta Directa en Puntos de Venta Propios:</strong> contamos con puntos de venta propios en ubicaciones estratégicas, brindando un mayor control sobre la presentación de los productos y creando una conexión directa con los consumidores. </p>
                                                                    <p><strong>∙Comercio Electrónico:</strong> Potenciar la presencia en línea mediante plataformas de comercio electrónico retail , Marketplace, ecommerce y casas comerciales. Contamos con un sitio web bien estructurado y una estrategia de marketing digital que amplifican significativamente el alcance, permitiendo a los clientes conocer marcas y productos.  </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="w-40percent sm:w-full " style="text-align: top; align-self: baseline;">
                                                            <div class="lqd-imggrp-single block relative">
                                                                <div class="lqd-imggrp-img-container inline-flex relative items-center justify-center mb-30">
                                                                    <figure class="w-full relative">
                                                                        <img  style="border-radius: 12px;" width="500px" height="auto" src="\images\servicios\servicios2.jpg" alt="services">
                                                                    </figure>
                                                                </div>
                                                                <p><strong>∙Venta a Empresas y Profesionales del Sector:</strong> Apoyamos a nuestra red de distribución con la venta directa a empresas y profesionales del sector, como paisajistas, empresas de mantenimiento de jardines y agricultores.</p>
                                                                <p><strong>∙Monitoreo del Desempeño de los Canales:</strong> constantemente nuestros ejecutivos mantienen lineamientos de desempeño de canales de distribución, analizando las métricas clave, como las ventas, la satisfacción del cliente y la cobertura geográfica, para realizar ajustes y mejoras continuas. </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item panel">
                                            <div class="accordion-heading" role="tab" id="heading-item-three">
                                                <h4 style="font-size: 25px; color: rgb(43, 43, 43);" class="accordion-title font-normal">
                                                    <a class="collapsed" role="button" data-bs-toggle="collapse" href="#collapse-item-three" aria-expanded="false" aria-controls="collapse-item-three">
                                                        <span class="accordion-title-txt">Un <b>equipo multidisciplinario</b> que representa</span>
                                                        <span class="accordion-expander text-24 w-60 h-60 flex items-center justify-center p-0 border-2 rounded-full  border-lightgray flex-shrink-0">
                                                            <i class="lqd-icn-ess icon-ion-ios-add" style="font-size: 19px;"></i>
                                                            <i class="lqd-icn-ess icon-ion-ios-remove" style="font-size: 19px;"></i>
                                                        </span>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse-item-three" class="accordion-collapse collapse" data-bs-parent="#accordion-services" role="tabpanel" aria-labelledby="heading-item-three">
                                                <div class="accordion-content py-1em">
                                                    <div class="flex flex-wrap items-end">
                                                        <div class="w-60percent flex flex-wrap align-content-end items-end gap-0 pr-50 sm:w-full module-content">
                                                            <div class="lqd-counter relative lqd-counter-default -mb-20 text-black w-auto">
                                                                <div class="lqd-counter-element relative font-medium mb-0" data-enable-counter="true" data-counter-options='{"targetNumber": "60+"}'>
                                                                    <span class="block">10+</span>
                                                                </div>
                                                            </div>
                                                            <div class="ld-fancy-heading relative">
                                                                <span class="ld-fh-element inline-block relative text-16 leading-20 mb-2em italic text-gray-500 xl:m-0">Colaboradores<br> comprometidos</span>
                                                            </div>
                                                            <div class="ld-fancy-heading relative mt-30">
                                                                <p class="ld-fh-element mb-0/5em inline-block relative">En un escenario empresarial dinámico y desafiante como el chileno, la presencia de un equipo multidisciplinario sólido y comprometido se convierte en el pilar fundamental sobre el cual se construyen los cimientos del éxito.</p>
                                                                <p class="ld-fh-element mb-0/5em inline-block relative">En un escenario empresarial dinámico y desafiante como el chileno, la presencia de un equipo 
                                                                    multidisciplinario sólido y comprometido se convierte en el pilar fundamental sobre el cual se construyen 
                                                                    los cimientos del éxito. Representaciones JCE, con su colectivo de más de 60 individuos apasionados y 
                                                                    expertos, emerge como un faro de innovación y excelencia en el panorama de las marcas chilenas. </p>
                                                                    <p class="ld-fh-element mb-0/5em inline-block relative">Cada miembro de este equipo aporta su propia chispa de creatividad y conocimiento, entrelazando tecnología de vanguardia con una rica trayectoria de experiencia, permitiendo abordar problemas complejos desde diversas perspectivas y encontrar soluciones más completas y efectivas. Es esta fusión de talentos permite no solo competir, sino destacarse en un mercado saturado y exigente. </p>
                                                                    <p class="ld-fh-element mb-0/5em inline-block relative">En resumen, Representaciones JCE personifica el poder del trabajo en equipo y la dedicación inquebrantable hacia la excelencia. Su compromiso con la calidad establecen un estándar elevado para el resto del mercado, inspirando a todos aquellos que tienen el privilegio de colaborar con ellos.</p>
                                                            </div>
                                                        </div>
                                                        <div class="w-40percent sm:w-full " style="text-align: top; align-self: baseline;">
                                                            <div class="lqd-imggrp-single block relative mb-30">
                                                                <div class="lqd-imggrp-img-container inline-flex relative items-center justify-center">
                                                                    <figure class="w-full relative">
                                                                        <img style="border-radius: 12px;" width="500px" height="auto" src="\images\servicios\servicios3.jpg" alt="services">
                                                                    </figure>
                                                                </div>
                                                            </div>
                                                            <p class="ld-fh-element mb-0/5em inline-block relative"> ¡Qué hermoso es ver florecer un jardín donde la diversidad de talentos se entrelaza para crear un paisaje de éxitos compartidos y metas alcanzadas!</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item panel">
                                            <div class="accordion-heading" role="tab" id="heading-item-four">
                                                <h4 style="font-size: 25px; color: rgb(43, 43, 43);" class="accordion-title font-normal">
                                                    <a class="collapsed" role="button" data-bs-toggle="collapse" href="#collapse-item-four" aria-expanded="false" aria-controls="collapse-item-four">
                                                        <span class="accordion-title-txt">Influyente Servicio<b>Post-Venta Premiun</b></span>
                                                        <span class="accordion-expander text-24 w-60 h-60 flex items-center justify-center p-0 border-2 rounded-full  border-lightgray flex-shrink-0">
                                                            <i class="lqd-icn-ess icon-ion-ios-add" style="font-size: 19px;"></i>
                                                            <i class="lqd-icn-ess icon-ion-ios-remove" style="font-size: 19px;"></i>
                                                        </span>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse-item-four" class="accordion-collapse collapse" data-bs-parent="#accordion-services" role="tabpanel" aria-labelledby="heading-item-four">
                                                <div class="accordion-content py-1em">
                                                    <div class="flex flex-wrap items-end">
                                                        <div class="w-60percent flex flex-wrap align-content-end items-end gap-0 pr-50 sm:w-full module-content">
                                                            <div class="lqd-counter relative lqd-counter-default -mb-20 text-black w-auto">
                                                                <div class="lqd-counter-element relative font-medium mb-0" data-enable-counter="true" data-counter-options='{"targetNumber": "60+"}'>
                                                                    <span class="block">60+</span>
                                                                </div>
                                                            </div>
                                                            <div class="ld-fancy-heading relative">
                                                                <span class="ld-fh-element inline-block relative text-16 leading-20 mb-2em italic text-gray-500 xl:m-0">Servicios con<br> atención al cliente</span>
                                                            </div>
                                                            <div class="ld-fancy-heading relative mt-10">
                                                                <p class="ld-fh-element mb-0/5em inline-block relative">El servicio postventa es fundamental para mantener la satisfacción del cliente y la reputación de una empresa y marca en el mercado.</p>
                                                                <div style="margin-top: 10px">
                                                                    <h4>Contamos con un criterio basado en:</h4>
                                                                    <p><strong>∙Centros de Atención al Cliente: </strong>  Dedicados a manejar consultas, problemas y solicitudes de los clientes. Asegurándonos de contar con personal capacitado y accesible para brindar asistencia rápida y eficiente. </p>
                                                                    <p><strong>∙Garantías Claras y Transparentes: </strong> Nos aseguramos de que los clientes comprendan los términos y condiciones de la garantía, lo que ayuda a construir confianza en la calidad de los productos. </p>
                                                                    <p><strong>∙Manuales de Usuario Detallados:</strong> Todas nuestras maquinas, equipos y herramientas cuentan con manuales de usuario detallados, ayudando a comprender completamente el funcionamiento de la maquinaria y reduciendo la posibilidad de mal uso. </p>
                                                                    <p><strong>∙Capacitación del Cliente:</strong> Con la puesta en marcha de los equipos, ofrecemos sesiones de capacitación para los clientes sobre el uso adecuado y el mantenimiento de la maquinaria. </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="w-40percent sm:w-full " style="text-align: top; align-self: baseline;">
                                                            <div class="lqd-imggrp-single block relative">
                                                                <div class="lqd-imggrp-img-container inline-flex relative items-center justify-center mb-30">
                                                                    <figure class="w-full relative">
                                                                        <img style="border-radius: 12px;" width="500px" height="auto" src="\images\servicios\servicios2.jpg" alt="services">
                                                                    </figure>
                                                                </div>
                                                                <p><strong>∙Red de Centros de Servicios Autorizados:</strong> contamos con una red de centros de servicio autorizados en áreas estratégicas. Estos proporcionan servicios de reparación y mantenimiento con personal capacitado y certificado.  </p>
                                                                <p><strong>∙Recambios y Piezas de Repuesto:</strong> Mantenemos un inventario adecuado de piezas de repuesto y componentes.</p>
                                                                <p><strong>∙Automatización y Tecnología: </strong> Contamos con un sistemas de seguimiento y automatización para 
                                                                    gestionar eficientemente los casos de servicio postventa, agilizando los procesos y mejorar la comunicación con los clientes. </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- End Services -->
                    <div style="height: 20px;" ></div>
                    <!-- Start Testimonials -->
                    <section class="lqd-section testimonials pt-60 pb-50">
                        <div class="container">
                            <div class="row">
                                <div class="col col-12 col-xl-6">
                                    <div class="w-full flex flex-col items-start text-start lg:items-center lg:text-center" data-custom-animations="true" data-ca-options='{"animationTarget": ".animation-element", "delay" : 100, "ease": "power4.out", "initValues": {"y": "35px", "opacity" : 0} , "animations": {"y": "0px", "opacity" : 1}}'>
                                        <div class="mb-0/75em ld-fancy-heading relative">
                                            <h2 class="mb-0/75em ld-fh-element relative">Nuestro compromiso</h2>
                                        </div>
                                        <div class="w-full carousel-container relative carousel-nav-left carousel-nav-lg carousel-nav-left carousel-dots-mobile-outside carousel-dots-mobile-center yes">
                                            <div class="-mr-15 -ml-15 carousel-items relative" data-lqd-flickity='{"prevNextButtons": true, "groupCells": true, "navArrow": "6", "addSlideNumbersToArrows": true, "cellAlign": "left", "buttonsAppendTo": "self", "pageDots": false}' tabindex="0">
                                                <div class="carousel-item flex flex-col justify-center w-full px-15">
                                                    <div class="carousel-item-inner relative w-full">
                                                        <div class="text-24 leading-1/6em carousel-item-content relative w-full">
                                                            <p class="mb-1/5em">
                                                                Somos Representaciones JCE S.A.  una empresa que ha construido su reputación en base a la calidad de los productos que comercializamos, así como en un servicio de atención al cliente excepcional.</p>
                                                            <p class="mb-1/5em">Nuestro principal foco es liderar en todos los mercados y segmentos donde operamos, entregando a distribuidores y clientes una experiencia única y satisfacción garantizada con una postventa de primer nivel, proporcionándoles las herramientas necesarias para maximizar su productividad, eficiencia y la rentabilidad en sus operaciones. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="carousel-item flex flex-col justify-center w-full px-15" aria-hidden="true">
                                                    <div class="carousel-item-inner relative w-full">
                                                        <div class="text-24 leading-1/6em carousel-item-content relative w-full">
                                                            <p class="mb-1/5em">Estamos comprometidos con la innovación y la búsqueda constante de soluciones avanzadas que impulsen el progreso y la sostenibilidad en estas industrias.</p>
                                                            <p class="mb-1/5em">Nos preocupamos por el medio ambiente y promovemos prácticas responsables en el uso y mantenimiento de nuestra maquinaria, así como en el desarrollo de relaciones éticas y duraderas con nuestros clientes, proveedores y comunidades.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="carousel-item flex flex-col justify-center w-full px-15" aria-hidden="true">
                                                    <div class="carousel-item-inner relative w-full">
                                                        <div class="text-24 leading-1/6em carousel-item-content relative w-full">
                                                            <p class="mb-1/5em">Con un equipo multidisciplinario, capacitado y motivado, que abarca todas las necesidades del mercado: ámbitos comerciales, financieros, operativos, de postventa y gerenciales, que son el motor para garantizar una cobertura integral y eficiente de las necesidades de los proveedores y clientes. </p>
                                                            <p class="mb-1/5em">En conclusión nuestro compromiso es ser el socio de confianza de nuestros proveedores,  clientes y distribuidores, proporcionando soluciones integrales que satisfagan las necesidades presentes y futuras en el ámbito agrícola,  jardín y forestal.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-12 col-xl-6 lg:order-first module-last">
                                    <div class="flex align-content-center items-center relative w-full h-full">
                                        <div class="module-shape-1 absolute top-65 left-20" data-parallax="true" data-parallax-options='{"ease": "linear", "start": "top bottom", "end": "bottom+=0px top"}' data-parallax-from='{"x": "80px", "y": "80px"}' data-parallax-to='{"x": "0px", "y": "-110px"}'>
                                            <div class="lqd-imggrp-single block relative">
                                                <div class="lqd-imggrp-img-container inline-flex relative items-center justify-center">
                                                    <figure class="w-full relative">
                                                        <img src="https://hubhtml.liquid-themes.com/assets/images/demo/modern-agency/shape-quote.svg" alt="quote">
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                        <div data-parallax="true" class="z-2 w-auto -mr-15percent">
                                            <div class="lqd-imggrp-single block relative">
                                                <div class="lqd-imggrp-img-container inline-flex relative items-center justify-center">
                                                    <figure class="w-full relative">
                                                        <img style="border-radius: 12px;" width="1650" height="972" src='\images\slides\slide5.jpg' alt="testimonials">
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="module-shape-2 absolute bottom-10percent" data-parallax="true" data-parallax-options='{"ease": "linear", "start": "top bottom", "end": "bottom+=0px top"}' data-parallax-from='{"y": "60px"}' data-parallax-to='{"y": "0px"}'>
                                            <div class="lqd-imggrp-single block relative">
                                                <div class="lqd-imggrp-img-container inline-flex relative items-center justify-center">
                                                    <figure class="w-full relative">
                                                        <img src="https://hubhtml.liquid-themes.com/assets/images/demo/modern-agency/shape-dots.svg" alt="shape">
                                                    </figure>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- End Testimonials -->
                    <div style="height: 60px;" ></div>
                    <!-- Start Consultation -->
                    <section class="lqd-section consultation pt-80" id="consultation">
                        <div class="container">
                            <div class="row">
                                <div class="col col-12 flex flex-row flex-wrap justify-center" data-custom-animations="true" data-ca-options='{"animationTarget": ".animation-element", "duration" : 1800 , "delay" : 180 , "ease": "power4.out", "initValues": {"y": "35px", "opacity" : 0} , "animations": {"y": "0px", "opacity" : 1}}'>
                                    <div class="w-45percent flex flex-col justify-center text-center mb-55 md:w-full">
                                        <div class="ld-fancy-heading relative animation-element">
                                            <h2 class="ld-fh-element mb-0/5em inline-block relative">Principales Marcas</h2>
                                        </div>
                                    </div>
                                    <div class="w-full"></div>
                                    <div class="flex w-33percent flex p-15 lg:w-full animation-element" >
                                        <div class="ld-flipbox w-full h-full relative perspective rounded-4">
                                            <div class="ld-flipbox-wrap w-full h-full relative transform-style-3d">
                                                <div class="ld-flipbox-face ld-flipbox-front flex flex-col w-full h-full backface-hidden transform-style-3d" style="border-radius: 12px; background-image: url('/images/marcas/logos/husq.jpg')">
                                                    <span class="ld-flipbox-overlay lqd-overlay flex bg-transparent" style="border-radius: 12px; background-image: linear-gradient(180deg, rgba(24, 27, 49, 0) 0%, rgba(24, 27, 49, 0.65) 100%);"></span>
                                                    <div class="ld-flipbox-inner w-full flex-grow-1 items-center justify-center backface-hidden">
                                                        <div class="w-full flex flex-col flex-wrap items-start">
                                                            <img class="img-fix" height="auto" src="/images/marcas/husqvarWhite1.png" alt="Logo">
                                                            <!-- <div class="ld-fancy-heading relative w-auto mb-2em rounded-4 bg-white"></div>
                                                            <div class="ld-fancy-heading relative">
                                                                <h5 class="ld-fh-element mb-0/5em inline-block relative text-30 text-white leading-1em">Husqvarna</h5>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="border-radius: 12px;" class="ld-flipbox-face ld-flipbox-back flex flex-col lqd-overlay flex h-full backface-hidden transform-style-3d">
                                                    <span class="ld-flipbox-overlay lqd-overlay flex"></span>
                                                    <div style="padding: 20px;" class="ld-flipbox-inner flex flex-col flex-grow-1 items-center justify-center w-full backface-hidden py-50 px-60">
                                                        <div class="ld py-1/15em px-2/1em-fancy-heading rounded-4 relative hover:text-white text-center">
                                                            <p class="ld-fh-element text-white-60 inline-block relative"> Desde 1689, innova en productos para silvicultura y jardinería, combinando rendimiento, seguridad y sostenibilidad. Destaca en soluciones a batería y robots.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex w-33percent flex p-15 lg:w-full animation-element"  >
                                        <div class="ld-flipbox w-full h-full relative perspective rounded-4">
                                            <div class="ld-flipbox-wrap w-full h-full relative transform-style-3d">
                                                <div class="ld-flipbox-face ld-flipbox-front flex flex-col w-full h-full backface-hidden transform-style-3d" style="border-radius: 12px; background-image: url('/images/marcas/logos/gar.jpg')">
                                                    <span class="ld-flipbox-overlay lqd-overlay flex bg-transparent" style="border-radius: 12px; background-image: linear-gradient(180deg, rgba(24, 27, 49, 0) 0%, rgba(24, 27, 49, 0.65) 100%);"></span>
                                                    <div class="ld-flipbox-inner w-full flex-grow-1 items-center justify-center backface-hidden">
                                                        <div class="w-full flex flex-col flex-wrap items-start">
                                                            <img class="img-fix" height="auto" src="/images/marcas/gardenaWhite1.png" alt="Logo">
                                                            <!-- <div class="ld-fancy-heading relative w-auto mb-2em rounded-4 bg-white"></div>
                                                            <div class="ld-fancy-heading relative">
                                                                <h5 class="ld-fh-element mb-0/5em inline-block relative text-30 text-white leading-1em">Gardena</h5>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="border-radius: 12px;" class="ld-flipbox-face ld-flipbox-back flex flex-col lqd-overlay flex h-full backface-hidden transform-style-3d">
                                                    <span class="ld-flipbox-overlay lqd-overlay flex"></span>
                                                    <div style="padding: 20px;" class="ld-flipbox-inner flex flex-col flex-grow-1 items-center justify-center w-full backface-hidden py-50 px-60">
                                                        <div class="ld py-1/15em px-2/1em-fancy-heading rounded-4 relative hover:text-white text-center">
                                                            <p class="ld-fh-element text-white-60 inline-block relative">Marca global para cuidado de jardines, ofrece sistemas de riego, herramientas de cultivo y más, siendo la elección preferida para mantener jardines óptimos. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex w-33percent flex p-15 lg:w-full animation-element" >
                                        <div class="ld-flipbox w-full h-full relative perspective rounded-4">
                                            <div class="ld-flipbox-wrap w-full h-full relative transform-style-3d">
                                                <div class="ld-flipbox-face ld-flipbox-front flex flex-col w-full h-full backface-hidden transform-style-3d" style="border-radius: 12px; background-image: url('/images/marcas/logos/ggr1.jpg')">
                                                    <span class="ld-flipbox-overlay lqd-overlay flex bg-transparent" style="border-radius: 12px; background-image: linear-gradient(180deg, rgba(24, 27, 49, 0) 0%, rgba(24, 27, 49, 0.65) 100%);"></span>
                                                    <div class="ld-flipbox-inner w-full flex-grow-1 items-center justify-center backface-hidden">
                                                        <div class="w-full flex flex-col flex-wrap items-start">
                                                            <img class="img-fix" height="auto" src="/images/marcas/greenWhite1.png" alt="Logo">
                                                            <!-- <div class="ld-fancy-heading relative w-auto mb-2em rounded-4 bg-white"></div>
                                                            <div class="ld-fancy-heading relative">
                                                                <h5 class="ld-fh-element mb-0/5em inline-block relative text-30 text-white leading-1em">Greenworks</h5>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="border-radius: 12px;" class="ld-flipbox-face ld-flipbox-back flex flex-col lqd-overlay flex h-full backface-hidden transform-style-3d">
                                                    <span class="ld-flipbox-overlay lqd-overlay flex"></span>
                                                    <div style="padding: 20px;" class="ld-flipbox-inner flex flex-col flex-grow-1 items-center justify-center w-full backface-hidden py-50 px-60">
                                                        <div class="ld py-1/15em px-2/1em-fancy-heading rounded-4 relative hover:text-white text-center">
                                                            <p class="ld-fh-element text-white-60 inline-block relative">Empresa líder mundial en herramientas eléctricas para exteriores, reconocida por su compromiso con la sostenibilidad y la tecnología avanzada.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex w-33percent flex p-15 lg:w-full animation-element" >
                                        <div class="ld-flipbox w-full h-full relative perspective rounded-4">
                                            <div class="ld-flipbox-wrap w-full h-full relative transform-style-3d">
                                                <div class="ld-flipbox-face ld-flipbox-front flex flex-col w-full h-full backface-hidden transform-style-3d" style="border-radius: 12px; background-image: url('/images/marcas/logos/duraline1.jpg')">
                                                    <span class="ld-flipbox-overlay lqd-overlay flex bg-transparent" style="border-radius: 12px; background-image: linear-gradient(180deg, rgba(24, 27, 49, 0) 0%, rgba(24, 27, 49, 0.65) 100%);"></span>
                                                    <div class="ld-flipbox-inner w-full flex-grow-1 items-center justify-center backface-hidden">
                                                        <div class="w-full flex flex-col flex-wrap items-start">
                                                            <img class="img-fix" height="auto" src="/images/marcas/DURALINEWHITE1.png" alt="Logo">
                                                            <!-- <div class="ld-fancy-heading relative w-auto mb-2em rounded-4 bg-white"></div>
                                                            <div class="ld-fancy-heading relative">
                                                                <h5 class="ld-fh-element mb-0/5em inline-block relative text-30 text-white leading-1em">Duraline</h5>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="border-radius: 12px;" class="ld-flipbox-face ld-flipbox-back flex flex-col lqd-overlay flex h-full backface-hidden transform-style-3d">
                                                    <span class="ld-flipbox-overlay lqd-overlay flex"></span>
                                                    <div style="padding: 20px;" class="ld-flipbox-inner flex flex-col flex-grow-1 items-center justify-center w-full backface-hidden py-50 px-60">
                                                        <div class="ld py-1/15em px-2/1em-fancy-heading rounded-4 relative hover:text-white text-center">
                                                            <p class="ld-fh-element text-white-60 inline-block relative">Especializada en accesorios para agricultura, Duraline resalta por productos duraderos y de calidad, incluyendo desbrozadoras, partidores de leña y pulverizadores. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex w-33percent flex p-15 lg:w-full animation-element" >
                                        <div class="ld-flipbox w-full h-full relative perspective rounded-4">
                                            <div class="ld-flipbox-wrap w-full h-full relative transform-style-3d">
                                                <div class="ld-flipbox-face ld-flipbox-front flex flex-col w-full h-full backface-hidden transform-style-3d" style="border-radius: 12px; background-image: url('/images/marcas/logos/char.jpg')">
                                                    <span class="ld-flipbox-overlay lqd-overlay flex bg-transparent" style="border-radius: 12px; background-image: linear-gradient(180deg, rgba(24, 27, 49, 0) 0%, rgba(24, 27, 49, 0.65) 100%);"></span>
                                                    <div class="ld-flipbox-inner w-full flex-grow-1 items-center justify-center backface-hidden">
                                                        <div class="w-full flex flex-col flex-wrap items-start">
                                                            <img class="img-fix" height="auto" src="/images/marcas/CHARWHITE1.png" alt="Logo">
                                                            <!-- <div class="ld-fancy-heading relative w-auto mb-2em rounded-4 bg-white"></div>
                                                            <div class="ld-fancy-heading relative">
                                                                <h5 class="ld-fh-element mb-0/5em inline-block relative text-30 text-white leading-1em">Char-Broil</h5>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="border-radius: 12px;" class="ld-flipbox-face ld-flipbox-back flex flex-col lqd-overlay flex h-full backface-hidden transform-style-3d">
                                                    <span class="ld-flipbox-overlay lqd-overlay flex"></span>
                                                    <div style="padding: 20px;" class="ld-flipbox-inner flex flex-col flex-grow-1 items-center justify-center w-full backface-hidden py-50 px-60">
                                                        <div class="ld py-1/15em px-2/1em-fancy-heading rounded-4 relative hover:text-white text-center">
                                                            <p class="ld-fh-element text-white-60 inline-block relative">Reconocida desde 1948, Char-Broil lidera en parrillas a gas, carbón y eléctricas, además de ahumadores y accesorios. Es la marca de parrillas más elegida por estadounidenses. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex w-33percent flex p-15 lg:w-full animation-element" >
                                        <div class="ld-flipbox w-full h-full relative perspective rounded-4">
                                            <div class="ld-flipbox-wrap w-full h-full relative transform-style-3d">
                                                <div class="ld-flipbox-face ld-flipbox-front flex flex-col w-full h-full backface-hidden transform-style-3d" style="border-radius: 12px; background-image: url('/images/marcas/logos/tramontina1.jpg')">
                                                    <span class="ld-flipbox-overlay lqd-overlay flex bg-transparent" style="border-radius: 12px; background-image: linear-gradient(180deg, rgba(24, 27, 49, 0) 0%, rgba(24, 27, 49, 0.65) 100%);"></span>
                                                    <div class="ld-flipbox-inner w-full flex-grow-1 items-center justify-center backface-hidden">
                                                        <div class="w-full flex flex-col flex-wrap items-start">
                                                            <img class="img-fix" height="auto" src="/images/marcas/TRAMONTINAWHITE1.png" alt="Logo">
                                                            <!-- <div class="ld-fancy-heading relative w-auto mb-2em rounded-4 bg-white"></div>
                                                            <div class="ld-fancy-heading relative">
                                                                <h5 class="ld-fh-element mb-0/5em inline-block relative text-30 text-white leading-1em">Tramontina</h5>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="border-radius: 12px;" class="ld-flipbox-face ld-flipbox-back flex flex-col lqd-overlay flex h-full backface-hidden transform-style-3d">
                                                    <span class="ld-flipbox-overlay lqd-overlay flex"></span>
                                                    <div style="padding: 20px;" class="ld-flipbox-inner flex flex-col flex-grow-1 items-center justify-center w-full backface-hidden py-50 px-60">
                                                        <div class="ld py-1/15em px-2/1em-fancy-heading rounded-4 relative hover:text-white text-center">
                                                            <p class="ld-fh-element text-white-60 inline-block relative">Presente en la vida diaria con una variedad de productos desde utensilios de cocina hasta herramientas para jardinería, muebles y más, Tramontina es sinónimo de calidad y versatilidad.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex w-33percent flex p-15 lg:w-full animation-element">
                                        <div class="ld-flipbox w-full h-full relative perspective rounded-4">
                                            <div class="ld-flipbox-wrap w-full h-full relative transform-style-3d">
                                                <div class="ld-flipbox-face ld-flipbox-front flex flex-col w-full h-full backface-hidden transform-style-3d" style="border-radius: 12px; background-image: url('/images/marcas/logos/poulan1.jpg')">
                                                    <span class="ld-flipbox-overlay lqd-overlay flex bg-transparent" style="border-radius: 12px; background-image: linear-gradient(180deg, rgba(24, 27, 49, 0) 0%, rgba(24, 27, 49, 0.65) 100%);"></span>
                                                    <div class="ld-flipbox-inner w-full flex-grow-1 items-center justify-center backface-hidden">
                                                        <div class="w-full flex flex-col flex-wrap items-start">
                                                            <img class="img-fix" height="auto" src="/images/marcas/POULANWHITE1.png" alt="Logo">
                                                            <!-- <div class="ld-fancy-heading relative w-auto mb-2em rounded-4 bg-white"></div>
                                                            <div class="ld-fancy-heading relative">
                                                                <h5 class="ld-fh-element mb-0/5em inline-block relative text-30 text-white leading-1em">Poulan Pro</h5>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="border-radius: 12px;" class="ld-flipbox-face ld-flipbox-back flex flex-col lqd-overlay flex h-full backface-hidden transform-style-3d">
                                                    <span class="ld-flipbox-overlay lqd-overlay flex"></span>
                                                    <div style="padding: 20px;" class="ld-flipbox-inner flex flex-col flex-grow-1 items-center justify-center w-full backface-hidden py-50 px-60">
                                                        <div class="ld py-1/15em px-2/1em-fancy-heading rounded-4 relative hover:text-white text-center">
                                                            <p class="ld-fh-element text-white-60 inline-block relative">Marca líder en EE.UU. con 70 años de historia, ofrece herramientas forestales y de jardinería, destacando por sierras, podadoras, desmalezadoras y cortadoras de césped de alta calidad.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex w-33percent flex p-15 lg:w-full animation-element" >
                                        <div class="ld-flipbox w-full h-full relative perspective rounded-4">
                                            <div class="ld-flipbox-wrap w-full h-full relative transform-style-3d">
                                                <div class="ld-flipbox-face ld-flipbox-front flex flex-col w-full h-full backface-hidden transform-style-3d" style="border-radius: 12px; background-image: url('/images/marcas/logos/cifa.jpg')">
                                                    <span class="ld-flipbox-overlay lqd-overlay flex bg-transparent" style="border-radius: 12px; background-image: linear-gradient(180deg, rgba(24, 27, 49, 0) 0%, rgba(24, 27, 49, 0.65) 100%);"></span>
                                                    <div class="ld-flipbox-inner w-full flex-grow-1 items-center justify-center backface-hidden">
                                                        <div class="w-full flex flex-col flex-wrap items-start">
                                                            <img class="img-fix" height="auto" src="/images/marcas/CIFARELLIEWHITE1.png" alt="Logo">
                                                            <!-- <div class="ld-fancy-heading relative w-auto mb-2em rounded-4 bg-white"></div>
                                                            <div class="ld-fancy-heading relative">
                                                                <h5 class="ld-fh-element mb-0/5em inline-block relative text-30 text-white leading-1em">CIFARELLI</h5>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="border-radius: 12px;" class="ld-flipbox-face ld-flipbox-back flex flex-col lqd-overlay flex h-full backface-hidden transform-style-3d">
                                                    <span class="ld-flipbox-overlay lqd-overlay flex"></span>
                                                    <div style="padding: 20px;" class="ld-flipbox-inner flex flex-col flex-grow-1 items-center justify-center w-full backface-hidden py-50 px-60">
                                                        <div class="ld py-1/15em px-2/1em-fancy-heading rounded-4 relative hover:text-white text-center">
                                                            <p class="ld-fh-element text-white-60 inline-block relative">Empresa italiana reconocida por fabricar máquinas profesionales para la agricultura y la jardinerí, destacada por su compromiso con la innovación y mejora continua de sus productos, adaptados a las necesidades cambiantes de los clientes y a los estándares de calidad y seguridad más exigentes.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- End Consultation -->
                    <!-- Start Clients -->
                    <section class="lqd-section clients pt-40 pb-55 bg-gray-100">
                        <div class="container">
                            <div class="row">
                                <div class="col col-lg-12">
                                    <div class="w-full block pt-50">
                                        <div class="carousel-container relative carousel-nav-shaped">
                                            <div class="carousel-items relative lqd-fade-sides" data-lqd-flickity='{"marquee": true, "equalHeightCells": true, "middleAlignContent": true, "pauseAutoPlayOnHover": true}'>
                                                <div class="flickity-viewport relative w-full overflow-hidden">
                                                    <div class="flickity-slider text-center flex w-full h-full relative">
                                                        <div class="col col-4 col-md-3 w-25percent carousel-item flex flex-col justify-center items-center">
                                                            <img src="/images/marcas/CharBroil.png" alt="CharBroil" width="200" height="auto" style="margin-top: -10px;">
                                                        </div>
                                                        <div class="col col-4 col-md-3 w-25percent carousel-item flex flex-col justify-center items-center">
                                                            <img src="/images/marcas/duraline.png" alt="duraline" width="200" height="auto">
                                                        </div>
                                                        <div class="col col-4 col-md-3 w-25percent carousel-item flex flex-col justify-center items-center">
                                                            <img src="/images/marcas/Gardena.png" alt="Gardena" width="200" height="auto">
                                                        </div>
                                                        <div class="col col-4 col-md-3 w-25percent carousel-item flex flex-col justify-center items-center">
                                                            <img src="/images/marcas/Husqvarna.png" alt="Husqvarna" width="200" height="auto">
                                                        </div>
                                                        <div class="col col-4 col-md-3 w-25percent carousel-item flex flex-col justify-center items-center">
                                                            <img src="/images/marcas/PoulanPRO.png" alt="PoulanPRO" width="200" height="auto">
                                                        </div>
                                                        <div class="col col-4 col-md-3 w-25percent carousel-item flex flex-col justify-center items-center">
                                                            <img src="/images/marcas/cifarelli.png" alt="cifarelli" width="200" height="auto">
                                                        </div>
                                                        <div class="col col-4 col-md-3 w-25percent carousel-item flex flex-col justify-center items-center">
                                                            <img src="/images/marcas/greenworks.png" alt="greenworks" width="200" height="auto">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- End Clients -->
                    <div style="height: 50px;" ></div>
                    <!-- Start Select Projects -->
                    <section class="lqd-section select-projects pb-30" data-custom-animations="true" data-ca-options='{"animationTarget": ".animation-element" ,  "duration" : 500, "startDelay" : 500, "ease": "expo.inOut" ,  "initValues": {"scaleX" : 0.75, "scaleY" : 0.75, "opacity" : 0} , "animations": {"scaleX" : 1, "scaleY" : 1, "opacity" : 1}}'>
                        <div class="container">
                            <div class="w-full flex flex-row sm:flex-col">
                                <div class="w-45percent min-h-400 relative flex flex-col overflow-hidden items-center justify-end pt-320 pb-20 px-20 rounded-12 shadow-md mr-20 sm:w-full sm:mr-0 module-img module-first-col animation-element" data-custom-animations="true" data-ca-options='{"animationTarget": "img, .btn" ,  "duration" : 1000, "startDelay" : 1000, "ease": "expo.out" ,  "initValues": {"y": "100px"} , "animations": {"y": "0px"}}'>
                                    <div class="absolute top-0 z-0 ltr-left-0" data-parallax="true" data-parallax-options='{"ease": "linear", "start": "top bottom" ,  "end": "bottom+=0px top"}' data-parallax-from='{"y": "-50px" ,  "scaleX" : 1.2, "scaleY" : 1.2}' data-parallax-to='{"y": "50px" ,  "scaleX" : 1.1, "scaleY" : 1.1}'>
                                        <div class="lqd-imggrp-single block relative">
                                            <div class="lqd-imggrp-img-container inline-flex relative items-center justify-center">
                                                <figure class="w-full relative">
                                                    <img style="height: 100%; object-fit: cover; width: 100%" class="h-400 object-cover" src="/images/projects/sus4.jpg" alt="business solutions">
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-55percent relative flex flex-wrap flex-col items-start justify-start bg-white rounded-12 shadow-md transition-all bg-white ml-20 py-40 px-50 sm:w-full sm:m-0 module-content-col animation-element" data-custom-animations="true" data-ca-options='{"animationTarget": ".ld-fancy-heading, .btn" ,  "duration" : 650, "startDelay" : 1500, "delay" : 100, "ease": "expo.out" ,  "initValues": {"y": "70px" ,  "opacity" : 0} , "animations": {"y": "0px" ,  "opacity" : 1}}'>
                                    <div class="ld-fancy-heading relative py-5 px-15 bg-transparent rounded-100" style="background-image: linear-gradient(90deg, var(--lqd-color-purple-500) 0%, var(--lqd-color-green-500) 100%);">
                                        <h6 style="color: #2b2b2b" class="ld-fh-element inline-block relative m-0 text-white text-12 tracking-1 uppercase">SUSTENTABILIDAD</h6>
                                    </div>
                                    <div class="spacer w-full">
                                        <div class="w-full h-20"></div>
                                    </div>
                                    <div class="ld-fancy-heading relative">
                                        <h2 style="color: #2b2b2b" class="mb-0/35em ld-fh-element inline-block relative h1">Grandes cambios,<br>Grandes iniciativas</h2>
                                    </div>
                                    <div class="mb-80 ld-fancy-heading relative">
                                        <p class="ld-fh-element mb-0/5em inline-block relative">Como empresa nos hemos proyectado a formar parte de este gran proyecto y trabajar y representar marcas que nos avalen. Estamos orgullosos de formar parte de la iniciativa de Sostenibilidad del Grupo Husqvarna.</p>
                                    </div>
                                    <a id="abrirModal" href="javascript:void(0);" class="text-black btn text-15 font-medium whitespace-nowrap btn-naked btn-icon-right btn-hover-swp btn-has-label" data-localscroll="true" >
                                        <span style="white-space: normal;" class="btn-txt" data-text="Start Your Shop">Ingresa aquí para conocer más de nuestra sostenibilidad</span>
                                        <span class="btn-icon"><i aria-hidden="true" class="lqd-icn-ess icon-ion-ios-arrow-forward"></i></span>
                                        <span class="btn-icon"><i aria-hidden="true" class="lqd-icn-ess icon-ion-ios-arrow-forward"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- End Select Projects -->
                    <!-- Start Case Studies -->
                    <section class="lqd-section case-studies py-30" id="case-studies"  data-custom-animations="true" data-ca-options='{"animationTarget": ".animation-element" ,  "duration" : 500, "startDelay" : 500, "ease": "expo.inOut" ,  "initValues": {"scaleX" : 0.75, "scaleY" : 0.75, "opacity" : 0} , "animations": {"scaleX" : 1, "scaleY" : 1, "opacity" : 1}}'>
                        <div class="container">
                            <div class="w-full flex flex-row sm:flex-col">
                                <div class="w-55percent relative flex flex-wrap flex-col items-start justify-start bg-white rounded-12 shadow-md transition-all mr-20 pt-40 pb-70 px-45 sm:w-full module-content-col module-first-col animation-element" data-custom-animations="true" data-ca-options='{"animationTarget": ".ld-fancy-heading, .lqd-progressbar" ,  "duration" : 650, "startDelay" : 1000, "delay" : 100, "ease": "expo.out" ,  "initValues": {"y": "70px" ,  "opacity" : 0} , "animations": {"y": "0px" ,  "opacity" : 1}}'>
                                    <div class="ld-fancy-heading relative py-5 px-15 bg-slate-100 rounded-100">
                                        <h6 style="color: #2b2b2b" class="ld-fh-element inline-block relative m-0 text-12 tracking-1 uppercase text-slate-400">Compromiso</h6>
                                    </div>
                                    <div class="spacer w-full">
                                        <div class="w-full h-20"></div>
                                    </div>
                                    <div class="ld-fancy-heading relative">
                                        <h2 style="color: #2b2b2b" class="mb-0/35em ld-fh-element inline-block relative h1">Objetivos de Sostenibilidad Claros</h2>
                                    </div>
                                    <div class="mb-30 ld-fancy-heading relative">
                                        <p class="text-18 leading-1/5em text-text ld-fh-element mb-0/5em inline-block relative">A través de esta iniciativa, hemos establecido objetivos de sostenibilidad claros.</p>
                                    </div>
                                    <div class="iconbox flex-grow-1 relative flex-wrap iconbox-circle iconbox-icon-ripple items-center content-start text-left pr-100 pb-20 border-bottom border-black-10 md:pr-0">
                                        <div class="iconbox-icon-wrap mr-25">
                                            <div class="iconbox-icon-container inline-flex relative z-1 rounded-full w-20 h-20 text-12 bg-slate-700 text-white">
                                                <i aria-hidden="true" class="lqd-icn-ess icon-num-1"></i>
                                            </div>
                                        </div>
                                        <h3 style="font-size: 20px;"class="lqd-iconbox-heading m-0 text-16 font-medium">Gestión de residuos </h3>
                                        <div class="contents mt-10">
                                            <p style="font-size: 16px;"class="text-13 leading-18 text-black-60">Con metas claras y precisas para reducir la generación de residuos y aumentar el reciclaje y la reutilización de materiales.  </p>
                                        </div>
                                    </div>
                                    <div class="spacer w-full">
                                        <div class="w-full h-20"></div>
                                    </div>
                                    <div class="iconbox flex-grow-1 relative flex-wrap  iconbox-circle iconbox-icon-ripple items-center content-start text-left pr-100 pb-20 border-bottom border-black-10 md:pr-0">
                                        <div class="iconbox-icon-wrap mr-25">
                                            <div class="iconbox-icon-container inline-flex relative z-1 rounded-full w-20 h-20 text-12 bg-slate-700 text-white">
                                                <i aria-hidden="true" class="lqd-icn-ess icon-num-2"></i>
                                            </div>
                                        </div>
                                        <h3 style="font-size: 20px;" class="lqd-iconbox-heading m-0 text-16 font-medium">Personas </h3>
                                        <div class="contents mt-10">
                                            <p style="font-size: 16px;"class="text-13 leading-18 text-black-60">Inspirar a 5 millones de clientes y compañeros para que adopten decisiones sostenibles.</p>
                                        </div>
                                    </div>
                                    <div class="spacer w-full">
                                        <div class="w-full h-20"></div>
                                    </div>
                                </div>
                                <div class="w-45percent min-h-450 relative flex flex-col overflow-hidden items-center justify-end pt-350 pb-20 px-20 rounded-12 shadow-md ml-20 sm:w-full sm:m-0 animation-element" data-custom-animations="true" data-ca-options='{"animationTarget": ".ld-fancy-heading, .btn" ,  "duration" : 1000, "ease": "expo.out" ,  "initValues": {"y": "100px"} , "animations": {"y": "0px"}}'>
                                    <div class="absolute top-0 z-0 min-w-0 ltr-left-0" data-parallax="true" data-ca-options='{"ease": "linear", "start": "top bottom" ,  "end": "bottom+=0px top"}' data-parallax-from='{"y": "-50px" ,  "scaleX" : 1.2, "scaleY" : 1.2}' data-parallax-to='{"y": "50px" ,  "scaleX" : 1.1, "scaleY" : 1.1}'>
                                        <div class="lqd-imggrp-single block relative">
                                            <div class="lqd-imggrp-img-container inline-flex relative items-center justify-center">
                                                <figure class="w-full relative">
                                                    <img class="object-cover h-500" style="height: 100%; object-fit: cover; width: 100%" src="/images/projects/sus5.jpg" alt="case study">
                                                </figure>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- End Case Studies -->
                    <div style="height: 150px;" ></div>
                </div>
                <!-- End lqd-contents-wrap -->
            </main>
            <!-- Start Back To Top Button -->
            <div class="lqd-back-to-top fixed" data-back-to-top="true">
                <a href="#wrap" class="inline-flex items-center justify-center rounded-full relative overflow-hidden" data-localscroll="true">
                    <svg class="inline-block" xmlns="http://www.w3.org/2000/svg" width="21" height="32" viewbox="0 0 21 32" style="width: 1em; height: 1em;">
                        <path fill="white" d="M10.5 13.625l-7.938 7.938c-.562.562-1.562.562-2.124 0C.124 21.25 0 20.875 0 20.5s.125-.75.438-1.063L9.5 10.376c.563-.563 1.5-.5 2.063.063l9 9c.562.562.562 1.562 0 2.125s-1.563.562-2.125 0z"></path>
                    </svg>
                </a>
            </div>
            <!-- End Back To Top Button -->
            <footer id="site-footer" class="main-footer link-white-50 link-14 bg-center bg-inherit bg-green-700 bg-no-repeat" style="background-image: url('/images/footer-bg.png');" data-sticky-footer="true" data-sticky-footer-options='{"shadow": "2"}'>
                <!-- Start Footer Module Top -->
                <section class="lqd-section module-top pt-60">
                    <div class="container">
                        <div class="row">
                            <div class="col col-12 col-xl-4">
                                <div class="mr-50 mb-30 flex flex-col">
                                    <div class="mb-10">
                                        <a href="/"><img src="/images/logo-2.png" alt="jce"></a>
                                    </div>
                                    <div class="ld-fancy-heading relative">
                                        <p class="mb-3em text-white opacity-50 inline-block relative text-14">Líderes en todos los mercados y segmentos en los que participamos al ofrecer a nuestros distribuidores y clientes una experiencia de compra inolvidable y un nivel de post venta superior.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-12 col-md-6 col-xl-4">
                                <div class="ml-60 mb-30 flex flex-col items-start sm:ml-0 module-contact">
                                    <div class="ld-fancy-heading relative">
                                        <h3 class="ld-fh-element mb-2em text-white text-14 inline-block relative">Contacto</h3>
                                    </div>
                                    <div class="mb-30 pb-10 iconbox relative items-center">
                                        <div class="iconbox-icon-wrap mr-25">
                                            <div class="iconbox-icon-container inline-flex w-20 text-20">
                                                <svg class="w-1em h-1em" xmlns="http://www.w3.org/2000/svg" width="15.438" height="15.438" viewBox="0 0 15.438 15.438">
                                                    <path d="M0-14.844l-.315.2-7.4,4.824V.594H7.719V-9.815L.315-14.64Zm0,1.41L6.049-9.5,0-5.585-6.049-9.5ZM-6.531-8.405-.315-4.379l.315.2,6.531-4.23V-.594H-6.531Z" transform="translate(7.719 14.844)" fill="#fad55b"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="contents flex flex-col">
                                            <h3 class="lqd-iconbox-heading opacity-50 text-white text-13 font-normal leading-1em mb-0">Colaboremos </h3>
                                            <a href="mailto:contacto@representacionesjce.cl">
                                                <p><span class="text-16 text-white">contacto@representacionesjce.cl</span></p>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="mb-30 pb-10 iconbox relative items-center">
                                        <div class="iconbox-icon-wrap mr-25">
                                            <div class="iconbox-icon-container inline-flex w-20 text-20">
                                                <svg class="w-1em h-1em" xmlns="http://www.w3.org/2000/svg" width="15.75" height="16.099" viewBox="0 0 15.75 16.099">
                                                    <path d="M3.938-16.406a3.8,3.8,0,0,0-1.969.533A4.013,4.013,0,0,0,.533-14.437,3.8,3.8,0,0,0,0-12.469a3.366,3.366,0,0,0,.164.984,8.121,8.121,0,0,0,.41,1.066q.472,1.046,1.148,2.235Q2.563-6.747,3.4-5.537l.533.779L5-6.316Q5.64-7.28,6.152-8.183A20.572,20.572,0,0,0,7.3-10.418a8.121,8.121,0,0,0,.41-1.066,3.366,3.366,0,0,0,.164-.984,3.8,3.8,0,0,0-.533-1.969,4.013,4.013,0,0,0-1.436-1.436A3.8,3.8,0,0,0,3.938-16.406Zm-6.583,1.271L-7.875-12.9V-.308L-2.6-2.584,2.646-.615,7.875-2.851V-8.572q-.513.984-1.312,2.256v2.6L3.281-2.317V-3.384L1.969-5.291v3.035L-1.969-3.732v-9.762l.718.267A5.446,5.446,0,0,1-.9-14.5Zm6.583.041a2.6,2.6,0,0,1,1.323.349,2.554,2.554,0,0,1,.954.954,2.6,2.6,0,0,1,.349,1.323,2.49,2.49,0,0,1-.123.625,7.614,7.614,0,0,1-.328.892Q5.742-10.131,5-8.839q-.472.82-.964,1.538l-.1.164-.1-.164q-.492-.718-.964-1.538a22.116,22.116,0,0,1-1.107-2.112,7.614,7.614,0,0,1-.328-.892,2.49,2.49,0,0,1-.123-.625,2.6,2.6,0,0,1,.349-1.323,2.554,2.554,0,0,1,.954-.954A2.6,2.6,0,0,1,3.938-15.094Zm-7.219,1.641v9.741L-6.562-2.317v-9.721Z" transform="translate(7.875 16.406)" fill="#fad55b"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="contents flex flex-col">
                                            <h3 class="lqd-iconbox-heading opacity-50 text-white text-13 font-normal leading-1em mb-0">Visita nuestras oficinas </h3>
                                            <a href="https://maps.app.goo.gl/XBJXZnuVQ9XkxJs97">
                                            <p><span class="text-16 text-white">Av. del Valle Nte. 857, Piso 4, Huechuraba, Santiago de Chile</span></p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-12 col-md-6 col-xl-4 p-0">
                                <div class="module-list">
                                    <div class="container-fluid">
                                        <div class="row items-start">
                                            <div class="col col-6  mb-100">
                                                <div class="ld-fancy-heading relative">
                                                    <h3 class="ld-fh-element mb-2em text-white text-14 inline-block relative" >Links de Interés</h3>
                                                </div>
                                                <div class="lqd-fancy-menu lqd-custom-menu relative lqd-menu-td-none">
                                                    <ul class="reset-ul">
                                                        <li class="mb-10"><a href="https://www.linkedin.com/company/representacionesjce/jobs/">Trabaja con nosotros</a></li>
                                                        <li class="mb-10"><a href="#">Línea de denuncias</a></li>
                                                        <li class="mb-10"><a href="#">Código de ética</a></li>
                                                        <li class="mb-10">
                                                            <a href="#">
                                                                <span class="ld-module-trigger collapsed lqd-module-trigger-txt-left lqd-module-show-icon lqd-module-icon-plain text-14" role="button" data-ld-toggle="true" data-bs-toggle="collapse" data-bs-target="#search-header-top" aria-controls="search-header-top" aria-expanded="false">
                                                                    <span class="ld-module-trigger-txt"></span>
                                                                    <span style="color:rgba(255,255,255,.5)" class="ld-module-trigger-icon">Contacto</span>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li class="mb-10">
                                                            <button id="abrirModal2" style="font-family: var(--lqd-body-font-family); color: rgba(255, 255, 255, .5); font-size: 14px; background:none;border:none;padding:0;cursor:pointer;">Sostenibilidad</button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col col-6  mb-30">
                                                <div class="ld-fancy-heading relative">
                                                    <h3 class="ld-fh-element text-white text-14 mb-2em inline-block relative">Acceso Distribuidores</h3>
                                                </div>
                                                <div class="lqd-fancy-menu lqd-custom-menu relative lqd-menu-td-none">
                                                    <ul class="reset-ul">
                                                        <li class="mb-10"><a href="http://www.rjce.cl/repre/repre">Orden de Compra</a></li>
                                                        <li class="mb-10"><a href="https://jce.appingcsa.com/">Plataforma Post-Venta</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Footer Module Top -->
                <!-- Start Footer Module bottom -->
                <section class="lqd-section module-bottom py-30 border-top text-white-10 transition-all">
                    <div class="container">
                        <div class="row justify-between">
                            <div class="col col-12 col-md-4">
                                <div class="ld-fancy-heading relative">
                                    <p class="ld-fh-element text-13 text-white-50 inline-block relative mb-0/5em">2024 Representaciones JCE© Todos los derechos reservados.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Footer Module bottom -->
            </footer>
        </div>
        <!-- Modal -->
        <div id="miModal" class="modal" >
            <div class="modal-contenido" style="border-radius: 30px;">
                <span class="cerrar" style="padding: 20px; font-size: 43px;">&times;</span>
                <div class="sostenibilidad-container">
                    <div class="sostenibilidad-header mt-50 mb-30">
                        <h2 class="sostenibilidad-title">La visión sobre la sostenibilidad</h2>
                        <p>Centrarnos en marcas que promueven la sostenibilidad es una decisión estratégica que refleja una creciente conciencia ambiental y social. Al optar por distribuir  marcas sostenibles, nuestra empresa puede destacarse por su compromiso con prácticas comerciales responsables.</p>
                    </div>
                    <h4 class="criteria-title mt-50" style="text-align: center;">¿Qué buscamos a la hora de distribuir una marca?</h4>
                    <div class="actions-grid">
                        <div class="actions-box actions-item">
                            <img class="rounded-12 mb-10" src="\images\sostenibilidad\sos-3.jpg">
                            <h5>1. Producción Responsable</h5>
                            <p>Las marcas comprometidas con la sustentabilidad se esfuerzan por reducir su impacto ambiental en todas las etapas de producción. Esto incluye el uso eficiente de recursos, la minimización de residuos y la adopción de energías renovables.</p>
                        </div>
                        <div class="actions-box actions-item">
                            <img class="rounded-12 mb-10" src="\images\sostenibilidad\sos-4.jpg">
                            <h5>2. Materiales Sostenibles</h5>
                            <p>Selección de materias primas y materiales que sean ecológicos y renovables es una característica común de las marcas sustentables. Esto puede incluir el uso de materiales reciclados, orgánicos o certificados por estándares de sostenibilidad. </p>
                        </div>
                    </div>
                    <div class="criteria-grid">
                        <div class="criteria-box criteria-item">
                            <img class="rounded-12 mb-10" src="\images\sostenibilidad\sos-5.jpg">
                            <h5>3. Enfoque Circular:</h5>
                            <p>Diseño de productos de manera que puedan ser reciclados, reutilizados o descompuestos de manera segura al final de su vida útil.</p>
                        </div>
                        <div class="criteria-box criteria-item">
                            <img class="rounded-12 mb-10" src="\images\sostenibilidad\sos-6.jpg">
                            <h5>4. Compromiso Social</h5>
                            <p>Participación en iniciativas sociales y comunitarias, contribuyendo positivamente al	bienestar de las comunidades locales.</p>
                        </div>
                        <div class="criteria-box criteria-item">
                            <img class="rounded-12 mb-10" src="\images\sostenibilidad\sos-7.jpg">
                            <h5>5. Transparencia y Comunicación</h5>
                            <p>Proporcionar información clara sobre sus procesos, impacto ambiental y esfuerzos de responsabilidad social ayuda a construir la confianza del consumidor.</p>
                        </div>
                    </div>
                    <h4 class="ods-title mt-50 mb-30 ml-1em mr-1em" style="text-align: center;">Empresas como Agentes de Cambio: Nuestro Compromiso con los Objetivos de Desarrollo Sostenible</h4>
                    <div class="ods-flex-container mb-50">
                        <div class="ods-text">
                            <p>A través de nuestro compromiso, estamos apoyando una amplia gama de Objetivos de Desarrollo Sostenible (ODS) de las Naciones Unidas, que demuestran un plan de 17 puntos para poner fin a la pobreza extrema, luchar contra la desigualdad y la injusticia y proteger el planeta hasta 2030. El logro de estos objetivos globales requiere un esfuerzo significativo en todos los niveles de la sociedad, sobre todo en las empresas, que tienen un papel fundamental que desempeñar como agente de cambio.</p>
                        </div>
                        <div class="ods-images">
                            <img class="rounded-12" src="\images\sostenibilidad\sos-2.jpg">
                        </div>
                    </div>
                    <h2 class="actions-title mb-40 f" style="text-align: center; font-size:30px;">Nuestro aporte como Representaciones JCE</h2>
                    <div class="actions-grid">
                        <div class="actions-box actions-item">
                            <img class="rounded-12" src="\images\sostenibilidad\sos-8.jpg">
                            <h5 class="mt-10 mb-0">Reducción de Huella Ambiental</h5>
                            <p>Hemos reducido la huella ambiental en las operaciones y procesos de negocio, trabajando de manera constante la eficiencia energética, la gestión de residuos y el uso responsable de los recursos.</p>
                        </div>
                        <div class="actions-box actions-item">
                            <img class="rounded-12" src="\images\sostenibilidad\sos-9.jpg">
                            <h5 class="mt-10 mb-0">Iniciativas de Reciclaje</h5>
                            <p>Implementación de programas de reciclaje y incentivar con sesiones de capacitación para concientizar a los empleados sobre la importancia del reciclaje y cómo deben clasificar correctamente los materiales, Proporcionando información regular a través de carteles, correos electrónicos y reuniones.</p>
                        </div>
                        <div class="actions-box actions-item">
                            <img class="rounded-12" src="\images\sostenibilidad\sos-11.jpg">
                            <h5 class="mt-10 mb-0">Compromiso Comunitario</h5>
                            <p>Participación activa en iniciativas comunitarias que promueven la sustentabilidad, como programas de educación ambiental o proyectos de conservación local.</p>
                        </div>
                        <div class="actions-box actions-item">
                            <img class="rounded-12" src="\images\sostenibilidad\sos-10.jpg">
                            <h5 class="mt-10 mb-0">Concientización del Consumidor</h5>
                            <p>Educar a los clientes sobre la importancia de elegir productos sustentables y cómo las marcas que representamos contribuyen a la protección del medio ambiente.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Wrap -->
        <?php include ('./asset.php'); ?>
    </body>
</html>
