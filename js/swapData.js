var hidden = false;
	function swapData() {
		
		var x = document.getElementsByClassName("special");

		if(hidden){

			for (i = 0; i < x.length; i++) {
	    		x[i].style.display = "block";
			}
			hidden = false;
			

		}else{

			for (i = 0; i < x.length; i++) {
	    		x[i].style.display = "none";
			}
			hidden = true;
		}


	}