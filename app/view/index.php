<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title><?php echo $title ?></title>
  <style>
@import url("https://fonts.googleapis.com/css?family=Open+Sans:300,400");
.text-js {
  opacity: 0;
}

.cursor {
  display: block;
  position: absolute;
  height: 100%;
  top: 0;
  right: -5px;
  width: 2px;
  /* Change colour of Cursor Here */
  background-color: white;
  z-index: 1;
  -webkit-animation: flash 0.5s none infinite alternate;
          animation: flash 0.5s none infinite alternate;
}

@-webkit-keyframes flash {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}

@keyframes flash {
  0% {
    opacity: 1;
  }
  100% {
    opacity: 0;
  }
}
* {
  margin: 0;
  padding: 0;
  boz-sizing: border-box;
  font-family: "Open Sans", sans-serif;
}

body {
  background: -webkit-linear-gradient(315deg, #00C4FF, #9D1BB2);
  background: linear-gradient(135deg, #00C4FF, #9D1BB2);
  height: 100vh;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-align: center;
  -webkit-align-items: center;
      -ms-flex-align: center;
          align-items: center;
  -webkit-box-pack: center;
  -webkit-justify-content: center;
      -ms-flex-pack: center;
          justify-content: center;
}

.headline {
  margin: 20px;
  color: white;
  font-size: 32px;
  text-align: center;
}
.headline h1 {
  letter-spacing: 1.6px;
  font-weight: 300;
}

.twitterLink {
  position: absolute;
  bottom: 0;
  right: 0;
  margin: 10px 15px;
  z-index: 3;
}
.twitterLink svg {
  width: 25px;
}
  </style>
</head>
<body>
<div class="type-js headline">
  <h1 class="text-js"><?php echo $main ?></h1>
</div>
<script src="https://cdn.bootcss.com/jquery/1.11.3/jquery.js"></script>
<script>
function autoType(elementClass, typingSpeed){
  var thhis = $(elementClass);
  thhis.css({
    "position": "relative",
    "display": "inline-block"
  });
  thhis.prepend('<div class="cursor" style="right: initial; left:0;"></div>');
  thhis = thhis.find(".text-js");
  var text = thhis.text().trim().split('');
  var amntOfChars = text.length;
  var newString = "";
  thhis.text("|");
  setTimeout(function(){
    thhis.css("opacity",1);
    thhis.prev().removeAttr("style");
    thhis.text("");
    for(var i = 0; i < amntOfChars; i++){
      (function(i,char){
        setTimeout(function() {        
          newString += char;
          thhis.text(newString);
        },i*typingSpeed);
      })(i+1,text[i]);
    }
  },1500);
}

$(document).ready(function(){
  // Now to start autoTyping just call the autoType function with the 
  // class of outer div
  // The second paramter is the speed between each letter is typed.   
  autoType(".type-js",200);
});
</script>
</body>
</html>
