<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CSS3 Cube</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="util.js"></script>
<style>
  .container {
    width: 200px;
    height: 200px;
    position: relative;
    margin: 0 auto 40px;
    border: 1px solid #CCC;
    -webkit-perspective: 1000px;
       -moz-perspective: 1000px;
         -o-perspective: 1000px;
            perspective: 1000px;
  }

  #cube {
    width: 100%;
    height: 100%;
    position: absolute;
    -webkit-transform-style: preserve-3d;
       -moz-transform-style: preserve-3d;
         -o-transform-style: preserve-3d;
            transform-style: preserve-3d;
  }

  #cube figure {
    display: block;
    position: absolute;
    width: 196px;
    height: 196px;
    border: 2px solid black;
    line-height: 196px;
    font-size: 120px;
    font-weight: bold;
    color: white;
    text-align: center;
  }
  
  #cube { 
    -webkit-transform: translateZ( -100px ); 
       -moz-transform: translateZ( -100px ); 
         -o-transform: translateZ( -100px ); 
            transform: translateZ( -100px ); 
  }

  #cube,
  #cube figure {
    -webkit-transition: -webkit-transform 1s;
       -moz-transition: -moz-transform 1s;
         -o-transition: -o-transform 1s;
            transition: transform 1s;
  }

  #cube .front  { background: hsla(   0, 100%, 50%, .5 ); }
  #cube .back   { background: hsla(  60, 100%, 50%, .5 ); }
  #cube .right  { background: hsla( 120, 100%, 50%, .5 ); }
  #cube .left   { background: hsla( 180, 100%, 50%, .5 ); }
  #cube .top    { background: hsla( 240, 100%, 50%, .5 ); }
  #cube .bottom { background: hsla( 300, 100%, 50%, .5 ); }
  
  #cube .front  {
      -webkit-transform: translateZ( 100px );
         -moz-transform: translateZ( 100px );
           -o-transform: translateZ( 100px );
              transform: translateZ( 100px );
    }
  #cube .back   {
    -webkit-transform: rotateX( -180deg ) translateZ( 100px );
       -moz-transform: rotateX( -180deg ) translateZ( 100px );
         -o-transform: rotateX( -180deg ) translateZ( 100px );
            transform: rotateX( -180deg ) translateZ( 100px );
  }
  #cube .right {
    -webkit-transform: rotateY(   90deg ) translateZ( 100px );
       -moz-transform: rotateY(   90deg ) translateZ( 100px );
         -o-transform: rotateY(   90deg ) translateZ( 100px );
            transform: rotateY(   90deg ) translateZ( 100px );
  }
  #cube .left {
    -webkit-transform: rotateY(  -90deg ) translateZ( 100px );
       -moz-transform: rotateY(  -90deg ) translateZ( 100px );
         -o-transform: rotateY(  -90deg ) translateZ( 100px );
            transform: rotateY(  -90deg ) translateZ( 100px );
  }
  #cube .top {
    -webkit-transform: rotateX(   90deg ) translateZ( 100px );
       -moz-transform: rotateX(   90deg ) translateZ( 100px );
         -o-transform: rotateX(   90deg ) translateZ( 100px );
            transform: rotateX(   90deg ) translateZ( 100px );
  }
  #cube .bottom {
    -webkit-transform: rotateX(  -90deg ) translateZ( 100px );
       -moz-transform: rotateX(  -90deg ) translateZ( 100px );
         -o-transform: rotateX(  -90deg ) translateZ( 100px );
            transform: rotateX(  -90deg ) translateZ( 100px );
  }
  
  /* =========================== TOGGLE ANIMATIONS =========================== */

  #cube.show-front {
    -webkit-transform: translateZ( -100px );
       -moz-transform: translateZ( -100px );
         -o-transform: translateZ( -100px );
            transform: translateZ( -100px );
  }
  #cube.show-back {
    -webkit-transform: translateZ( -100px ) rotateX( -180deg );
       -moz-transform: translateZ( -100px ) rotateX( -180deg );
         -o-transform: translateZ( -100px ) rotateX( -180deg );
            transform: translateZ( -100px ) rotateX( -180deg );
  }
  #cube.show-right {
    -webkit-transform: translateZ( -100px ) rotateY(  -90deg );
       -moz-transform: translateZ( -100px ) rotateY(  -90deg );
         -o-transform: translateZ( -100px ) rotateY(  -90deg );
            transform: translateZ( -100px ) rotateY(  -90deg );
  }
  #cube.show-left {
    -webkit-transform: translateZ( -100px ) rotateY(   90deg );
       -moz-transform: translateZ( -100px ) rotateY(   90deg );
         -o-transform: translateZ( -100px ) rotateY(   90deg );
            transform: translateZ( -100px ) rotateY(   90deg );
  }
  #cube.show-top {
    -webkit-transform: translateZ( -100px ) rotateX(  -90deg );
       -moz-transform: translateZ( -100px ) rotateX(  -90deg );
         -o-transform: translateZ( -100px ) rotateX(  -90deg );
            transform: translateZ( -100px ) rotateX(  -90deg );
  }
  #cube.show-bottom {
    -webkit-transform: translateZ( -100px ) rotateX(   90deg );
       -moz-transform: translateZ( -100px ) rotateX(   90deg );
         -o-transform: translateZ( -100px ) rotateX(   90deg );
            transform: translateZ( -100px ) rotateX(   90deg );
  }
  
  #cube.panels-backface-invisible figure {
      -webkit-backface-visibility: hidden;
         -moz-backface-visibility: hidden;
           -o-backface-visibility: hidden;
              backface-visibility: hidden;
    }

</style>

<script>
  var init = function() {
    var box = document.querySelector('.container').children[0],
        showPanelButtons = document.querySelectorAll('#show-buttons button'),
        panelClassName = 'show-front',
  
        onButtonClick = function( event ){
          box.removeClassName( panelClassName );
          panelClassName = event.target.className;
          box.addClassName( panelClassName );
        };
  
    for (var i=0, len = showPanelButtons.length; i < len; i++) {
      showPanelButtons[i].addEventListener( 'click', onButtonClick, false);
    }
    
    document.getElementById('toggle-backface-visibility').addEventListener( 'click', function(){
      box.toggleClassName('panels-backface-invisible');
    }, false);
    
  };
    
  window.addEventListener( 'DOMContentLoaded', init, false);
</script>

</head>
<body>

  <h1>Cube 1</h1>

  <section class="container">
    <div id="cube">
      <figure class="front">1</figure>
      <figure class="back">2</figure>
      <figure class="right">3</figure>
      <figure class="left">4</figure>
      <figure class="top">5</figure>
      <figure class="bottom">6</figure>
    </div>
  </section>
  
  <section id="options">

    <p id="show-buttons">
      <button class="show-front">Show 1</button>
      <button class="show-back">Show 2</button>
      <button class="show-right">Show 3</button>
      <button class="show-left">Show 4</button>
      <button class="show-top">Show 5</button>
      <button class="show-bottom">Show 6</button>
    </p>

    <p>
      <button id="toggle-backface-visibility">Toggle Backface Visibility</button>
    </p>


  </section>

</body>
</html>