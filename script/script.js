window.requestAnimFrame = (function(){
	return window.requestAnimationFrame       || // La forme standardisÃ©e
	window.webkitRequestAnimationFrame || // Pour Chrome et Safari
	window.mozRequestAnimationFrame    || // Pour Firefox
	window.oRequestAnimationFrame      || // Pour Opera
	window.msRequestAnimationFrame     || // Pour Internet Explorer
	function(callback){                   // Pour les mauvais
		window.setTimeout(callback, 1000 / 60);
	};
})();

window.addEventListener("load",function(){

	// ********************** HAMBURGER ***********************
	(function(){
		let hamburgerElt = document.querySelector(".hamburger");
		let menuElt = document.querySelector(".menuHeader ul");
		hamburgerElt.addEventListener("mouseover",function(e){
			menuElt.classList.add("menuHamburger");
			hamburgerElt.classList.add("over");
		});
		hamburgerElt.addEventListener("mouseout",function(){
			if(!menuElt.classList.contains("menuHamburgerClick")){
				menuElt.classList.remove("menuHamburger");
			}
			hamburgerElt.classList.remove("over");
		});
		hamburgerElt.addEventListener("click",function(){
			menuElt.classList.toggle("menuHamburgerClick");
			hamburgerElt.classList.toggle("fermer");
		});
		window.addEventListener("mouseout", function(){
			hamburgerElt.classList.remove("over");
		});
	})();

});

