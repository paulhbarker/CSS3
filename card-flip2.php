<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Card Flip</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="util.js"></script>
<style>
  .container {
    width: 200px;
    height: 260px;
    position: relative;         
    margin: 0 auto 40px;
    border: 1px solid #CCC;
    
    -webkit-perspective: 800px; 
       -moz-perspective: 800px;
         -o-perspective: 800px;
            perspective: 800px;
  }

  #card {
    width: 100%;
    height: 100%;
    position: absolute;
    -webkit-transition: -webkit-transform 1s;
       -moz-transition: -moz-transform 1s;
         -o-transition: -o-transform 1s;
            transition: transform 1s;
    -webkit-transform-style: preserve-3d;
       -moz-transform-style: preserve-3d;
         -o-transform-style: preserve-3d;
            transform-style: preserve-3d;
    -webkit-transform-origin: right center;
       -moz-transform-origin: right center;
         -o-transform-origin: right center;
            transform-origin: right center;
  }

  #card.flipped {
    -webkit-transform: translateX( -100% ) rotateY( -180deg );
       -moz-transform: translateX( -100% ) rotateY( -180deg );
         -o-transform: translateX( -100% ) rotateY( -180deg );
            transform: translateX( -100% ) rotateY( -180deg );
  }

  #card figure {
    display: block;
    height: 100%;
    width: 100%;
    line-height: 260px;
    color: white;
    text-align: center;
    font-weight: bold;
    font-size: 140px;
    position: absolute;
    -webkit-backface-visibility: hidden;
       -moz-backface-visibility: hidden;
         -o-backface-visibility: hidden;
            backface-visibility: hidden;
  }

  #card .front {
    background: red;
  }

  #card .back {
    background: blue;
    -webkit-transform: rotateY( 180deg );
       -moz-transform: rotateY( 180deg );
         -o-transform: rotateY( 180deg );
            transform: rotateY( 180deg );
  }
</style>

<script>
  var init = function() {
    var card = document.getElementById('card');
    
    document.getElementById('flip').addEventListener( 'click', function(){
      card.toggleClassName('flipped');
    }, false);
  };
  
  window.addEventListener('DOMContentLoaded', init, false);
</script>

</head>
<body>

  <h1>Card Flip 2</h1>

  <section class="container"> 
    <div id="card">
      <figure class="front">1</figure>
      <figure class="back">2</figure>
    </div>
  </section>
  
  <section id="options">
    <p><button id="flip">Flip Card</button></p>
  </section>

</body>
</html>