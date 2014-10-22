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
    position: relative;         /* absolute/relative positioning so the 3D object is removed from the flow of the document */
    margin: 0 auto 40px;
    border: 1px solid #CCC;
    
    -webkit-perspective: 800px; /* Activation of 3D space using 'perspective' property */
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

            
            /* The .container’s 'perspective' only applies to direct descendant children, 
            in this case #card. In order for subsequent children to inherit a parent’s perspective, 
            and live in the same 3D space, the parent can pass along its perspective with 
            transform-style: preserve-3d. Without 3D transform-style, the faces of the card would be 
            flattened with its parents and the back face’s rotation would be nullified.*/
  }

  #card.flipped {
    -webkit-transform: rotateY( 180deg );
       -moz-transform: rotateY( 180deg );
         -o-transform: rotateY( 180deg );
            transform: rotateY( 180deg );
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
    -webkit-backface-visibility: hidden;  /* hide the back-side of the faces when they are faced away from the viewer */
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

  <h1>Card Flip 1</h1>

  <section class="container">           <!-- Houses the 3D space -->
    <div id="card">                     <!-- Wrapper for the 3D object -->
      <figure class="front">1</figure>
      <figure class="back">2</figure>
    </div>
  </section>
  
  <section id="options">
    <p><button id="flip">Flip Card</button></p>
  </section>

</body>
</html>