var inputFile = document.getElementById("archivo");
var imgContenedor = document.getElementById('img');
var dataurl;

//Funcion de carga de imagen
var upload = function(){
	$('#img img').remove();
	$('#cam-icon').removeClass('hidden');
	var thumb = new Image();
	thumb.src = '';
	var filesToUpload = inputFile.files;
	//Crear imagen
	thumb.src = window.URL.createObjectURL(filesToUpload[0]);
	//Tomamos sus medidas
	thumb.onload = function(){
    	var height = thumb.height;
    	var width = thumb.width;

		// Oculto placeholder de imagen y añado img adaptada
		$('#cam-icon').addClass('hidden');
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
		//thumb.setAttribute('height', height);
    	//thumb.setAttribute('width', width);

		//Crear canvas
		var canvas = document.createElement("canvas");
		canvas.setAttribute('height', height);
		canvas.setAttribute('width', width);
		var ctx = canvas.getContext("2d");
		ctx.drawImage(thumb, 0, 0, width, height);

		//Transformo el canvas en dataurl
		dataurl = canvas.toDataURL("image/jpeg");
    };
};

//Añado escuchas
if(inputFile){
inputFile.addEventListener("change", upload, false);
};