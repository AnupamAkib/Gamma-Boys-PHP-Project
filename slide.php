<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<center>
<div id="slideshow">
   <div>
     <img src="images/college-pic/1.jpg" width="100%">
   </div>
   <div>
     <img src="images/college-pic/2.jpg" width="100%">
   </div>
   <div>
     <img src="images/college-pic/3.jpg" width="100%">
   </div>
   <div>
     <img src="images/college-pic/4.jpg" width="100%">
   </div>
   <div>
     <img src="images/college-pic/5.jpg" width="100%">
   </div>
</div>




</center>

<script>
	$("#slideshow > div:gt(0)").hide();

setInterval(function() {
  $('#slideshow > div:first')
    .fadeOut(0)
    .next()
    .fadeIn(0)
    .end()
    .appendTo('#slideshow');
}, 3500);
</script>

<style>
#slideshow {
  position:relative;
  margin-bottom:15px;
  max-width:600px;
  width: 90%;
  padding: 10px;
  box-shadow: 0 0 6px rgba(0, 0, 0, 0.5);
}

#slideshow > div {
  top: 10px;
  left: 10px;
  right: 10px;
  bottom: 10px;
}
.utsorgo{
	background:black;
	Color:#fff;
	padding: 0px 0px 4px 0px;
	box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
}
</style>



