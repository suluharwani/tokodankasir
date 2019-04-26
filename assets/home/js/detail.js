function backPage() {
  window.history.back();
}

window.onclick = function(event) {
	if (event.target == document.getElementById("sideContainer")) {
		document.getElementById("sideContainer").style.width = "0%";
		document.getElementById("checkoutSide").style.width = "0";
	}
}

function openCheckout() {
	document.getElementById("checkoutSide").style.width = "300px";
	document.getElementById("sideContainer").style.width = "100%";
}

function closeCheckout() {
	document.getElementById("checkoutSide").style.width = "0";
	document.getElementById("sideContainer").style.width = "0%";
}

var slideIndexsame = 1;
showSlidessame(slideIndexsame);

function plusSlidessame(n) {
	showSlidessame(slideIndexsame += n);
}

function currentSlidesame(n) {
	showSlidessame(slideIndexsame = n);
}

function showSlidessame(n) {
	var ss;
	var slidessame = document.getElementsByClassName("slide-items-same");
	var dotssame = document.getElementsByClassName("dot-items-same");
	if (n > slidessame.length) {
		slideIndexsame = 1
	}    
	if (n < 1) {
		slideIndexsame = slidessame.length
	}
	for (ss = 0; ss < slidessame.length; ss++) {
		slidessame[ss].style.display = "none";  
	}
	for (ss = 0; ss < dotssame.length; ss++) {
		dotssame[ss].className = dotssame[ss].className.replace(" active-items-same", "");
	}
	slidessame[slideIndexsame-1].style.display = "block";  
	dotssame[slideIndexsame-1].className += " active-items-same";
}