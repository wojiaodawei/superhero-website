window.onload = function(){ 
	var images = document.getElementsByClassName("display");
	for (var i = 0; i < images.length; i++) {
		images[i].removeAttribute("href"); 
		images[i].addEventListener("click", hideAndSeek);
		images[i].addEventListener("mouseover", pointer);
	}

	var hidden_span = document.getElementsByClassName("hidden");
	for (var i = 0; i < hidden_span.length; i++) {
		hidden_span[i].addEventListener("click", hideAndSeek);
		hidden_span[i].addEventListener("mouseover", pointer);
		var fontcolor;
		if (hidden_span[i].classList.contains("marvel")){
			fontcolor = "red";
		}else if (hidden_span[i].classList.contains("dc")){
			fontcolor = "#003f5e";
		}
		hidden_span[i].getElementsByTagName('a')[0].style.textShadow = "-1.5px 0 "+fontcolor+", 0 1.5px "+fontcolor+", 1.5px 0 "+fontcolor+", 0 -1.5px "+fontcolor;
		hidden_span[i].getElementsByTagName('a')[1].style.textShadow = "-1px 0 black, 0 1px black, 1px 0 black, 0 -1px black";
		hidden_span[i].getElementsByTagName('a')[1].addEventListener("mouseover", function(){
			this.parentNode.parentNode.getElementsByClassName("nomHeros")[0].style.backgroundColor = "#F0FFFF";
			this.style.color = "#E7A854";
		});
		hidden_span[i].getElementsByTagName('a')[1].addEventListener("mouseout", function(){
			/*this.parentNode.parentNode.getElementsByClassName("nomHeros")[0].style.backgroundColor = "#C0C0C0";*/
			this.style.color = "#F0FFFF";
		});
	}

	function hideAndSeek(e){
		var otherClass;
		if(this.classList.contains("display")){
				otherClass = "hidden";
		}
		else{
				otherClass = "display";	
		}
		var el = this.parentNode.getElementsByClassName(otherClass)[0];
		el.style.display="block";
		this.style.display="none";
	}

	function pointer(e){
		this.style.cursor="pointer";
	}
}
