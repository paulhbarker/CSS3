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
  }

  #card {
    width: 100%;
    height: 100%;
    position: absolute;
	-webkit-transition: -webkit-transform 1s;
    -webkit-transform-style: preserve-3d;
    -webkit-transform-origin: right center;
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
  }

  #card .front {
    background: red;
  }

  #card .back {
    background: blue;
    -webkit-transform: rotateY( 180deg );
  }
</style>

<script>
  var init = function() {
    var card = document.querySelector('#card');
    
    document.querySelector('#show-back').addEventListener( 'click', function(){
      card.style.webkitTransform = 'translateX( -100% ) rotateY( -180deg )';
    }, false);
	
	document.querySelector('#show-front').addEventListener( 'click', function(){
      card.style.webkitTransform = 'translateX( 0% ) rotateY( 0deg )';
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
    <p><button id="show-front">Show 1</button></p>
    <p><button id="show-back">Show 2</button></p>
  </section>

</body>
</html>