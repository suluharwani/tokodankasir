function openSideMenu() {
	document.getElementById("menuSide").style.width = "250px";
	document.getElementById("sideContainer").style.width = "100%";
}

function closeSideMenu() {
	document.getElementById("menuSide").style.width = "0";
	document.getElementById("sideContainer").style.width = "0%";
}

window.onclick = function(event) {
	if (event.target == document.getElementById("sideContainer")) {
		document.getElementById("sideContainer").style.width = "0%";
		document.getElementById("menuSide").style.width = "0";
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

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
	showSlides(slideIndex += n);
}

function currentSlide(n) {
	showSlides(slideIndex = n);
}

function showSlides(n) {
	var i;
	var slides = document.getElementsByClassName("slide-items-like");
	var dots = document.getElementsByClassName("dot-items-like");
	if (n > slides.length) {
		slideIndex = 1
	}    
	if (n < 1) {
		slideIndex = slides.length
	}
	for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";  
	}
	for (i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(" active-items-like", "");
	}
	slides[slideIndex-1].style.display = "block";  
	dots[slideIndex-1].className += " active-items-like";
}


var slideIndexpromo = 1;
showSlidespromo(slideIndexpromo);

function plusSlidespromo(n) {
	showSlidespromo(slideIndexpromo += n);
}

function currentSlidepromo(n) {
	showSlidespromo(slideIndexpromo = n);
}

function showSlidespromo(n) {
	var j;
	var slidespromo = document.getElementsByClassName("slide-items-promo");
	var dotspromo = document.getElementsByClassName("dot-items-promo");
	if (n > slidespromo.length) {
		slideIndexpromo = 1
	}    
	if (n < 1) {
		slideIndexpromo = slidespromo.length
	}
	for (j = 0; j < slidespromo.length; j++) {
		slidespromo[j].style.display = "none";  
	}
	for (j = 0; j < dotspromo.length; j++) {
		dotspromo[j].className = dotspromo[j].className.replace(" active-items-promo", "");
	}
	slidespromo[slideIndexpromo-1].style.display = "block";  
	dotspromo[slideIndexpromo-1].className += " active-items-promo";
}

var slideIndexnewest = 1;
showSlidesnewest(slideIndexnewest);

function plusSlidesnewest(n) {
	showSlidesnewest(slideIndexnewest += n);
}

function currentSlidenewest(n) {
	showSlidesnewest(slideIndexnewest = n);
}

function showSlidesnewest(n) {
	var k;
	var slidesnewest = document.getElementsByClassName("slide-items-newest");
	var dotsnewest = document.getElementsByClassName("dot-items-newest");
	if (n > slidesnewest.length) {
		slideIndexnewest = 1
	}    
	if (n < 1) {
		slideIndexnewest = slidesnewest.length
	}
	for (k = 0; k < slidesnewest.length; k++) {
		slidesnewest[k].style.display = "none";  
	}
	for (k = 0; k < dotsnewest.length; k++) {
		dotsnewest[k].className = dotsnewest[k].className.replace(" active-items-newest", "");
	}
	slidesnewest[slideIndexnewest-1].style.display = "block";  
	dotsnewest[slideIndexnewest-1].className += " active-items-newest";
}

var slideIndexbest = 1;
showSlidesbest(slideIndexbest);

function plusSlidesbest(n) {
	showSlidesbest(slideIndexbest += n);
}

function currentSlidebest(n) {
	showSlidesbest(slideIndexbest = n);
}

function showSlidesbest(n) {
	var l;
	var slidesbest = document.getElementsByClassName("slide-items-best");
	var dotsbest = document.getElementsByClassName("dot-items-best");
	if (n > slidesbest.length) {
		slideIndexbest = 1
	}    
	if (n < 1) {
		slideIndexbest = slidesbest.length
	}
	for (l = 0; l < slidesbest.length; l++) {
		slidesbest[l].style.display = "none";  
	}
	for (l = 0; l < dotsbest.length; l++) {
		dotsbest[l].className = dotsbest[l].className.replace(" active-items-best", "");
	}
	slidesbest[slideIndexbest-1].style.display = "block";  
	dotsbest[slideIndexbest-1].className += " active-items-best";
}

var slideIndexvege = 1;
showSlidesvege(slideIndexvege);

function plusSlidesvege(n) {
	showSlidesvege(slideIndexvege += n);
}

function currentSlidevege(n) {
	showSlidesvege(slideIndexvege = n);
}

function showSlidesvege(n) {
	var ll;
	var slidesvege = document.getElementsByClassName("slide-items-vege");
	var dotsvege = document.getElementsByClassName("dot-items-vege");
	if (n > slidesvege.length) {
		slideIndexvege = 1
	}    
	if (n < 1) {
		slideIndexvege = slidesvege.length
	}
	for (ll = 0; ll < slidesvege.length; ll++) {
		slidesvege[ll].style.display = "none";  
	}
	for (ll = 0; ll < dotsvege.length; ll++) {
		dotsvege[ll].className = dotsvege[ll].className.replace(" active-items-vege", "");
	}
	slidesvege[slideIndexvege-1].style.display = "block";  
	dotsvege[slideIndexvege-1].className += " active-items-vege";
}

var slideIndexfruit = 1;
showSlidesfruit(slideIndexfruit);

function plusSlidesfruit(n) {
	showSlidesfruit(slideIndexfruit += n);
}

function currentSlidefruit(n) {
	showSlidesfruit(slideIndexfruit = n);
}

function showSlidesfruit(n) {
	var mm;
	var slidesfruit = document.getElementsByClassName("slide-items-fruit");
	var dotsfruit = document.getElementsByClassName("dot-items-fruit");
	if (n > slidesfruit.length) {
		slideIndexfruit = 1
	}    
	if (n < 1) {
		slideIndexfruit = slidesfruit.length
	}
	for (mm = 0; mm < slidesfruit.length; mm++) {
		slidesfruit[mm].style.display = "none";  
	}
	for (mm = 0; mm < dotsfruit.length; mm++) {
		dotsfruit[mm].className = dotsfruit[mm].className.replace(" active-items-fruit", "");
	}
	slidesfruit[slideIndexfruit-1].style.display = "block";  
	dotsfruit[slideIndexfruit-1].className += " active-items-fruit";
}

var slideIndexall = 1;
showSlidesall(slideIndexall);

function plusSlidesall(n) {
	showSlidesall(slideIndexall += n);
}

function currentSlideall(n) {
	showSlidesall(slideIndexall = n);
}

function showSlidesall(n) {
	var nn;
	var slidesall = document.getElementsByClassName("slide-items-all");
	var dotsall = document.getElementsByClassName("dot-items-all");
	if (n > slidesall.length) {
		slideIndexall = 1
	}    
	if (n < 1) {
		slideIndexall = slidesall.length
	}
	for (nn = 0; nn < slidesall.length; nn++) {
		slidesall[nn].style.display = "none";  
	}
	for (nn = 0; nn < dotsall.length; nn++) {
		dotsall[nn].className = dotsall[nn].className.replace(" active-items-all", "");
	}
	slidesall[slideIndexall-1].style.display = "block";  
	dotsall[slideIndexall-1].className += " active-items-all";
}

function showPass() {
	var x = document.getElementById("pass");
	if (x.type === "password") {
		x.type = "text";
	} else {
		x.type = "password";
	}
}