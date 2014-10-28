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
  }

  #cube {
    width: 100%;
    height: 100%;
    position: absolute;
    -webkit-transform-style: preserve-3d;
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
  }

  #cube,
  #cube figure {
    -webkit-transition: -webkit-transform 1s;
  }

  #cube .front  { background: hsla(   0, 100%, 50%, .5 ); }
  #cube .back   { background: hsla(  60, 100%, 50%, .5 ); }
  #cube .right  { background: hsla( 120, 100%, 50%, .5 ); }
  #cube .left   { background: hsla( 180, 100%, 50%, .5 ); }
  #cube .top    { background: hsla( 240, 100%, 50%, .5 ); }
  #cube .bottom { background: hsla( 300, 100%, 50%, .5 ); }
  
  #cube .front  {
      -webkit-transform: translateZ( 100px );
    }
  #cube .back   {
    -webkit-transform: rotateX( -180deg ) translateZ( 100px );
  }
  #cube .right {
    -webkit-transform: rotateY(   90deg ) translateZ( 100px );
  }
  #cube .left {
    -webkit-transform: rotateY(  -90deg ) translateZ( 100px );
  }
  #cube .top {
    -webkit-transform: rotateX(   90deg ) translateZ( 100px );
  }
  #cube .bottom {
    -webkit-transform: rotateX(  -90deg ) translateZ( 100px );
  }
</style>

<script>
  var init = function() {
    var box = document.querySelector('.container').children[0],
        showPanelButtons = document.querySelectorAll('#show-buttons button'),
        panelClassName = 'show-front',
		backfaceVisibility = true,
  
        onButtonClick = function( event ){
          panelTrigger = event.target.className;
          switch( panelTrigger ) {
		    case 'show-front':  box.style.webkitTransform = 'translateZ( -100px )'; break;
			case 'show-back':   box.style.webkitTransform = 'translateZ( -100px ) rotateX( -180deg )'; break;
			case 'show-right':  box.style.webkitTransform = 'translateZ( -100px ) rotateY(  -90deg )'; break;
			case 'show-left':   box.style.webkitTransform = 'translateZ( -100px ) rotateY(   90deg )'; break;
			case 'show-top':    box.style.webkitTransform = 'translateZ( -100px ) rotateX(  -90deg )'; break;
			case 'show-bottom': box.style.webkitTransform = 'translateZ( -100px ) rotateX(   90deg )'; break;
		  }
        };
  
    for (var i=0, len = showPanelButtons.length; i < len; i++) {
      showPanelButtons[i].addEventListener( 'click', onButtonClick, false);
    }
	
    
    document.querySelector('#toggle-backface-visibility').addEventListener( 'click', function(){
	  backfaceVisibility = !backfaceVisibility;
	  var nodes = document.querySelector('#cube').childNodes;
	  for ( var i=1; i < nodes.length; i++ ) {
	    if ( nodes[i].nodeName.toLowerCase() == 'figure' ) {
		  if ( backfaceVisibility == true ) {
            nodes[i].style.backfaceVisibility = 'visible';
		  } else {
			nodes[i].style.backfaceVisibility = 'hidden'; 
		  }
		}
	  }
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