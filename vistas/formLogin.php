<html ng-app="appLogin">
    <head>
        <meta charset="UTF-8">
        <title>Pedidos Web</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
        <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
        <link href="css/login.css" rel="stylesheet">

        <script src="js/angular.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src= "js/login.js"></script>
        <script src="https://code.angularjs.org/1.3.0-rc.2/angular-messages.js"></script>
        <style>
            * { box-sizing:border-box; }

            body {
                font-family: 'PT Sans', sans-serif;
                background: #ebebeb;
                -webkit-font-smoothing: antialiased;
            }

            .logo {   text-align:center;  margin-top: 3em;  opacity: 0.7;  padding: 30px;  background: #761626;}
            .logo_sapo {   text-align:center;  margin-top: 3em;  padding: 30px;  background: white;}
            h1, h3 { font-weight: 300; }
            h1 { color: #fff; }
            form {      padding: 30px;    padding-top: 60px;    background: #fff;}
            .powered{    padding: 10px;    margin-top: -16px;    line-height: 25px;    background: #bf2b37;}
            .powered a {    color: #ddd;    text-decoration: none;}
            .powered a:hover {  font-style:italic;}
            .group {   position: relative;  margin-bottom: 45px; }

            input {  font-size: 18px;  padding: 10px 10px 10px 5px;  -webkit-appearance: none;  display: block;  background: transparent;  color: #115345;  width: 100%;  border: none;  border-radius: 0;  border-bottom: 1px solid #ddd;}

            input:focus { outline: none; }

            /* Label */
            label {  color: #999;   font-size: 18px;  font-weight: normal;  position: absolute;  pointer-events: none;  left: 5px;  top: 10px;  -webkit-transition:all 0.2s ease;  transition: all 0.2s ease;}

            /* active */

            input:focus ~ label, input.used ~ label {  top: -20px;  -webkit-transform: scale(.75);          transform: scale(.75); left: -2px;  color: #115345;}

            /* Underline */
            .bar {  position: relative;  display: block;  width: 100%;}
            .bar:before, .bar:after {  content: '';  height: 2px;   width: 0;  bottom: 1px;   position: absolute;  background: #187662;   -webkit-transition:all 0.2s ease;   transition: all 0.2s ease;}
            .bar:before { left: 50%; }
            .bar:after { right: 50%; }

            /* active */
            input:focus ~ .bar:before, input:focus ~ .bar:after { width: 50%; }

            /* Highlight */
            .highlight {  position: absolute;  height: 60%;   width: 100px;   top: 25%;   left: 0;  pointer-events: none;  opacity: 0.5;}

            /* active */
            input:focus ~ .highlight {  -webkit-animation: inputHighlighter 0.3s ease;          animation: inputHighlighter 0.3s ease;}

            /* Animations */
            @-webkit-keyframes inputHighlighter {
                from { background: #115345; }
                to  { width: 0; background: transparent; }
            }

            @keyframes inputHighlighter {
                from { background: #187662; }
                to  { width: 0; background: transparent; }
            }

            div.background{  position: fixed;    width: 100%;    z-index: -1;    height: 100%;    right: -10%;}
            div.background2 {  position: fixed;    width: 100%;    z-index: -1;    height: 100%;    left: 6%;}
            div.background:before {    content: '';    position: absolute;    top: 0;    right: 0;    width: 80%;    height: 70%;    /* opacity: 0.8; */    background-color: rgba(64, 11, 17, 0.33);   border-bottom: 30px solid rgb(64, 11, 17);  -webkit-transform-origin: 100% 100%;    -ms-transform-origin: 100% 100%;    transform-origin: 100% 100%;    -webkit-transform: skewX(30deg);    -ms-transform: skewX(30deg);    transform: skewY(30deg);    -webkit-box-sizing: border-box;    -moz-box-sizing: border-box;    box-shadow: 0px 0px 20px #89898a;}
            div.background2:before {    content: '';    position: absolute;    bottom: 0;    left: 0;    width: 50%;    height: 100%;     background-color: rgba(64, 11, 17, 0.24);   border-right: 50px solid rgb(64, 11, 17);  -webkit-transform-origin: 100% 100%;    -ms-transform-origin: 100% 100%;    transform-origin: 100% 100%;    -webkit-transform: skewX(60deg);    -ms-transform: skewX(60deg);        transform: skewX(60deg);    -webkit-box-sizing: border-box;    -moz-box-sizing: border-box;    box-shadow: 0px 0px 20px #89898a;}
            html, body{   background-size:cover;    margin:0;padding:0;    height:100%;}
            .buttonui {   position: relative;    padding: 8px 45px;    line-height: 30px;    overflow: hidden;    border-width: 0;    outline: none;    border-radius: 2px;    box-shadow: 0 1px 4px rgba(0, 0, 0, .6);    background-color: #400b11;    color: #ecf0f1;    transition: background-color .3s;}
            .buttonui:hover{cursor:pointer; background: #701b21
            }
            .buttonui:before {    content: "";    position: absolute;    top: 50%;    left: 50%;    display: block;    width: 0;    padding-top: 0;    border-radius: 100%;    background-color: rgba(236, 240, 241, .3);    -webkit-transform: translate(-50%, -50%);    -moz-transform: translate(-50%, -50%);    -ms-transform: translate(-50%, -50%);    -o-transform: translate(-50%, -50%);    transform: translate(-50%, -50%);}
            .buttonui span  {    padding: 12px 24px;    font-size:16px;}
            .loginForm {   width: 420px;    margin: 0 auto;    z-index: 99;    display: block;    margin-top: 5%;    background: transparent;    border-radius: .25em .25em .4em .4em;    text-align: center;    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);    color: #fff;}
            /* Ripples container */

            .ripples {  position: absolute;  top: 0;  left: 0;  width: 100%;  height: 100%;  overflow: hidden;  background: transparent;}
            .ripplesCircle {  position: absolute;  top: 50%;  left: 50%;  -webkit-transform: translate(-50%, -50%);          transform: translate(-50%, -50%);  opacity: 0;  width: 0;  height: 0;  border-radius: 50%;  background: rgba(255, 255, 255, 0.25);}
            .ripples.is-active .ripplesCircle {  -webkit-animation: ripples .4s ease-in;          animation: ripples .4s ease-in;}

            /* Ripples animation */

            @-webkit-keyframes ripples {
                0% { opacity: 0; }

                25% { opacity: 1; }

                100% {
                    width: 200%;
                    padding-bottom: 200%;
                    opacity: 0;
                }
            }

            @keyframes ripples {
                0% { opacity: 0; }

                25% { opacity: 1; }

                100% {
                    width: 200%;
                    padding-bottom: 200%;
                    opacity: 0;
                }
            }
            @media screen and (max-width: 860px){
                div.background{ margin-top: -10%; }
            }
            @media screen and (max-width: 560px){
                div.background{ margin-top: -50%; }
            }
            @media screen and (max-width: 460px){
                .loginForm{ width: 100%; max-width: 420px; }
                div.background{ margin-top: -60%; }
                div.background2{ margin-top: -10%; }
                div.background2:before{ width: 80%; }
                form, .powered { opacity: 0.8; }
            }
            @media screen and (max-width: 380px){
                div.background{ margin-top: -80%; }
                div.background2{ margin-top: -10%; }
                div.background2:before{ width: 100%; }
            }

            #mensjLog p{
                color:black;
                background: rgba(233, 233, 233, 0.46);
                line-height: 3;
            }
            .hide{
                display: none;
            }
        </style>
    </head>
<body ng-controller="loginController">
    <!--
<div class="background"></div>
<div class="background2"></div>
-->
<div class="loginForm">
    <div class="logo_sapo">
        <img src="img/logo_saporiti.jpg" alt="Drogueria Saporiti" width="250px" height="90px">
    </div>
    <div>
        <p ng-model="msj" style="color:black">{{msj}}</p>
    </div>
    <form id="formLogin" method="post" novalidate name="formLogin" ng-submit="submit(formLogin.$valid,formLogin)">
        <div class="group">
            <div ng-messages="Login.Usuario_Login.$error" ng-messages-include="vistas/messages.html"></div>
            <input type="text" class="used"  name="Usuario_Login" ng-model="Login.Usuario_Login" required><span class="highlight"></span><span class="bar"></span>
            <label>Usuario</label>
        </div>
        <div class="group">
            <input type="password" name="Clave" ng-model="Login.Clave" id="Clave"><span class="highlight" required></span><span class="bar"></span>
            <label>Clave</label>
            <div ng-messages="Login.Clave.$error" ng-messages-include="vistas/messages.html"></div>
        </div>
        <div class="group hide inputRepClave">
            <input type="password" name="repetirClave" id="repetirClave" ng-model="Login.Clave_Repetir" required compare-to="Login.Clave" required><span class="highlight"></span><span class="bar"></span>
            <label>Repetir Clave</label>
            <div ng-messages="Clave_Repetir.$error" ng-messages-include="vistas/messages.html"></div>
        </div>
        <button type="submit" class="buttonui"> <span> Ingresar </span>
            <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
        </button>

    </form>

    <div class="powered">
        Si ha olvidado su clave, contactese
    </div>
    <div id="mensjLog">
    </div>

</div>


<script>$(window, document, undefined).ready(function() {
        $('input').blur(function() {
            var $this = $(this);
            if ($this.val())
                $this.addClass('used');
            else
                $this.removeClass('used');
        });

        var $ripples = $('.ripples');

        $ripples.on('click.Ripples', function(e) {

            var $this = $(this);
            var $offset = $this.parent().offset();
            var $circle = $this.find('.ripplesCircle');

            var x = e.pageX - $offset.left;
            var y = e.pageY - $offset.top;

            $circle.css({
                top: y + 'px',
                left: x + 'px'
            });

            $this.addClass('is-active');

        });

        $ripples.on('animationend webkitAnimationEnd mozAnimationEnd oanimationend MSAnimationEnd', function(e) {
            $(this).removeClass('is-active');
        });


//------------------------------------------------------------------//

        $mensjLog = $("#mensjLog");
        $repetirClave = $("#repetirClave");
        $clave = $("#Clave");
        $divinputRepClave = $('.inputRepClave');

    });

</script>

</body>
</html>
