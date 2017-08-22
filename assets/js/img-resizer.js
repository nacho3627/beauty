var inputFile = document.getElementById("archivo");
var button = document.getElementById("btn-enviar");
var imgContenedor = document.getElementById('img');

//Funcion de carga de imagen
var upload = function(){
	var cedula = document.getElementById('cedula').value;
	var filesToUpload = inputFile.files;
	//Crear imagen
	var thumb = new Image();
	thumb.id = "thumb";
	thumb.src = window.URL.createObjectURL(filesToUpload[0]);
	//Tomamos sus medidas
	thumb.onload = function(){
    	var height = thumb.height;
    	var width = thumb.width;

		// Oculto placeholder de imagen y añado img adaptada
		document.getElementById('cam-icon').className += " hidden";
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
		/*var canvas = document.createElement("canvas");
		canvas.width = width;
		canvas.height = height;
		var ctx = canvas.getContext("2d");
		ctx.drawImage(thumb, 0, 0, width, height);
		console.log(canvas);

		//Transformo el canvas en dataurl
		var dataurl = canvas.toDataURL("image/jpeg");

		// Envio al servidor
		  $.ajax({
    	    url:"graba-imagen.php",
    	    // Enviar un parámetro post con el nombre base64 y con la imagen en el
    	    data:{
    	        base64: dataurl,
    	        cedula: cedula
    	    },
    	    // Método POST
    	    type:"post",
    	    complete:function(){
    	        console.log("Img sent");
    	    }
    	});	*/
    

    };
};


//Añado escuchas
inputFile.addEventListener("change", upload, false);


/*
if (!file.type.match(/image.*\/)) {
  // this file is not an image.
  alert('No es imagen');
} else {
	var img = document.createElement("img");
	img.src = window.URL.createObjectURL(file);

};
*/