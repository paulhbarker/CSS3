<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Saloon Doors</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="util.js"></script>
<style>
  .container1, .container2 {
    width: 200px;
    height: 260px;
    position: relative;
    border: 1px solid #CCC;
    margin-bottom: 40px;
    float: left;
    -webkit-perspective: 800px; 
       -moz-perspective: 800px;
         -o-perspective: 800px;
            perspective: 800px;
  }
  .container1 {
    margin-left: 160px; 
  }
  
  #left-door, #right-door {
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
  }
  
  #left-door {
    -webkit-transform-origin: left center;
       -moz-transform-origin: left center;
         -o-transform-origin: left center;
            transform-origin: left center; 
  }
  
  #right-door {
    -webkit-transform-origin: right center;
       -moz-transform-origin: right center;
         -o-transform-origin: right center;
            transform-origin: right center; 
  }

  #left-door.out {
    -webkit-transform: rotateY( 180deg );
       -moz-transform: rotateY( 180deg );
         -o-transform: rotateY( 180deg );
            transform: rotateY( 180deg );
  }
  
  #right-door.out {
    -webkit-transform: rotateY( -180deg );
       -moz-transform: rotateY( -180deg );
         -o-transform: rotateY( -180deg );
            transform: rotateY( -180deg );
  }
  
  #left-door.in {
    -webkit-transform: rotateY( -180deg );
       -moz-transform: rotateY( -180deg );
         -o-transform: rotateY( -180deg );
            transform: rotateY( -180deg );
  }
  
  #right-door.in {
    -webkit-transform: rotateY( 180deg );
       -moz-transform: rotateY( 180deg );
         -o-transform: rotateY( 180deg );
            transform: rotateY( 180deg );
  }

  #left-door figure, #right-door figure {
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

  #left-door .front, #right-door .front {
    background: red;
  }

  #left-door .back {
    background: blue;
    -webkit-transform: rotateY( 180deg );
       -moz-transform: rotateY( 180deg );
         -o-transform: rotateY( 180deg );
            transform: rotateY( 180deg );
  }
  #right-door .back {
    background: blue;
    -webkit-transform: rotateY( -180deg );
       -moz-transform: rotateY( -180deg );
         -o-transform: rotateY( -180deg );
            transform: rotateY( -180deg );
  }
</style>

<script>
  var init = function() {
    var left = document.getElementById('left-door'),
        right = document.getElementById('right-door');
    
    document.getElementById('out').addEventListener( 'click', function(){
      if (left.hasClassName('in')) {
        left.removeClassName('in');
        right.removeClassName('in');
      }
      left.toggleClassName('out');
      right.toggleClassName('out');
    }, false);
    
    document.getElementById('in').addEventListener( 'click', function(){
      if (left.hasClassName('out')) {
        left.removeClassName('out');
        right.removeClassName('out');
      }
      left.toggleClassName('in');
      right.toggleClassName('in');
    }, false);
  };
  
  window.addEventListener('DOMContentLoaded', init, false);
</script>

</head>
<body>

  <h1>Saloon Doors</h1>

  <section class="container1"> 
    <div id="left-door">
      <figure class="front">1</figure>
      <figure class="back">2</figure>
    </div>
  </section>
  
  <section class="container2"> 
    <div id="right-door">
      <figure class="front">1</figure>
      <figure class="back">2</figure>
    </div>
  </section>
  
  <section id="options">
    <p><button id="in">Coming In</button></p>
    <p><button id="out">Going Out</button></p>
  </section>

</body>
</html>