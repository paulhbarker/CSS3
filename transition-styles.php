<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Transition Styles</title>
<link rel="stylesheet" type="text/css" href="style.css">
<style>

  .container {
    width: 100%;
    height: 110px;
    position: relative;        
    margin: 0 auto 40px;
    border: 1px solid #CCC;
  }
  
  #rectangle1, #rectangle2 {
    background-color: red;
    width: 0%;
    height: 100%;
	  -webkit-transition: width 2s;
  }
  
  #rectangle2 {
    background-color: blue; 
  }

</style>
<script>
  var init = function() {
    var rect1 = document.querySelector('#rectangle1'),
        rect2 = document.querySelector('#rectangle2'),
        styleButtons = document.querySelectorAll('#style-buttons button'),

        onButtonClick = function( event ){
          styleTrigger = event.target.className;
          switch( styleTrigger ) {
            case 'linear':       rect1.style.transitionTimingFunction = 'linear'; break;
            case 'ease-in':      rect1.style.transitionTimingFunction = 'ease-in'; break;
            case 'ease-out':     rect1.style.transitionTimingFunction = 'ease-out'; break;
            case 'ease-in-out':  rect1.style.transitionTimingFunction = 'ease-in-out'; break;
            case 'cubic-bezier': rect1.style.transitionTimingFunction = 'cubic-bezier(.18,.81,.81,.18)'; break;
          }
          rect1.style.width = '100%';
          rect2.style.width = '100%';
          setTimeout(function(){
            rect1.style.width = '0%';
            rect2.style.width = '0%';
          }, 2500);
        };
        
        for (var i=0, len = styleButtons.length; i < len; i++) {
          styleButtons[i].addEventListener( 'click', onButtonClick, false);
        }
  };
  
  window.addEventListener( 'DOMContentLoaded', init, false);
</script>

</head>

<body>
  
  <h1>Transition Timing Function</h1>
  
  <p>
    The red bar is variant, while the blue bar remains the default animation timing function for comparison.
  </p>
  
  <section class='container'>
    <div id='rectangle1'></div>
  </section>
  
  <section class='container'>
    <div id='rectangle2'></div>
  </section>
  
  <section id="options">

    <p id="style-buttons">
      <button class="linear">Linear</button>
      <button class="ease-in">Ease-In</button>
      <button class="ease-out">Ease-Out</button>
      <button class="ease-in-out">Ease-In-Out</button>
      <button class="cubic-bezier">Cubic-Bezier</button>
    </p>

  </section>

</body>
</html>