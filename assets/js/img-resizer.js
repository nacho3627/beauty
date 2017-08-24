var inputFile = document.getElementById("archivo");
var imgContenedor = document.getElementById('img');
var thumb = new Image();
var dataurl;

//Funcion de carga de imagen
var upload = function(){
	thumb.src = '';
	var filesToUpload = inputFile.files;
	//Crear imagen
	thumb.src = window.URL.createObjectURL(filesToUpload[0]);
	//Tomamos sus medidas
	thumb.onload = function(){
    	var height = thumb.height;
    	var width = thumb.width;
		// Oculto placeholder de imagen y añado img adaptada
		document.getElementById('cam-icon').className += " hidden";
		thumb.id = "thumb";
		imgContenedor.appendChild(thumb);

		// Resize image
		var MAX_WIDTH = 800;
		var MAX_HEIGHT = 600;
 
		if (width > height) {
    		if (width > MAX_WIDTH) {
    			height *= MAX_WIDTH / width;
    			width = MAX_WIDTH;
    	  		}
    		} else {
  				if (height > MAX_HEIGHT) {
    			width *= MAX_HEIGHT / height;
    			height = MAX_HEIGHT;
  					}
				}		
		thumb.height = height;
    	thumb.width = width;

		//Crear canvas
		var canvas = document.createElement("canvas");
		canvas.width = width;
		canvas.height = height;
		var ctx = canvas.getContext("2d");
		ctx.drawImage(thumb, 0, 0, width, height);
    	console.log(canvas);
    	console.log(ctx);


		//Transformo el canvas en dataurl
		dataurl = canvas.toDataURL("image/jpeg");

    };
};

//Añado escuchas
inputFile.addEventListener("change", upload, false);
