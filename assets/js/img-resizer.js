var inputFileAval = document.getElementById("fichero-aval");
var avalContenedor = document.getElementById("img-aval");
var dataurl_aval;

var inputFileCedula = document.getElementById("fichero-cedula");
var cedulaContenedor = document.getElementById("img-cedula");
var dataurl_cedula;

var inputFileCedulaMod = document.getElementById("fichero-cedula-mod-datos");
var cedulaContenedorMod = document.getElementById("img-cedula-mod-datos");
var dataurl_cedula_mod;


//Funcion de carga de imagen aval
var uploadAval = function(){
	$('#img-aval img').remove();
	$('#aval-icon').removeClass('hidden');
	let thumb = new Image();
	thumb.src = '';
	let filesToUpload = inputFileAval.files;
	//Crear imagen
	thumb.src = window.URL.createObjectURL(filesToUpload[0]);
	//Tomamos sus medidas
	thumb.onload = function(){
    	let height = thumb.height;
    	let width = thumb.width;

		// Oculto placeholder de imagen y añado img adaptada
		$('#aval-icon').addClass('hidden');
		thumb.id = "thumb-aval";
		avalContenedor.appendChild(thumb);

		// Resize image
		let MAX_WIDTH = 800;
		let MAX_HEIGHT = 600;
 
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

		//Crear canvas
		let canvas = document.createElement("canvas");
		canvas.setAttribute('height', height);
		canvas.setAttribute('width', width);
		let ctx = canvas.getContext("2d");
		ctx.drawImage(thumb, 0, 0, width, height);

		//Transformo el canvas en dataurl
		dataurl_cedula = canvas.toDataURL("image/jpeg");
    };
};

//Funcion de carga de imagen cedula
var uploadCedula = function(){
	$('#img-cedula img').remove();
	$('#cedula-icon').removeClass('hidden');
	let thumb = new Image();
	thumb.src = '';
	let filesToUpload = inputFileCedula.files;
	//Crear imagen
	thumb.src = window.URL.createObjectURL(filesToUpload[0]);
	//Tomamos sus medidas
	thumb.onload = function(){
    	let height = thumb.height;
    	let width = thumb.width;

		// Oculto placeholder de imagen y añado img adaptada
		$('#cedula-icon').addClass('hidden');
		thumb.id = "thumb-cedula";
		cedulaContenedor.appendChild(thumb);

		// Resize image
		let MAX_WIDTH = 800;
		let MAX_HEIGHT = 600;
 
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

		//Crear canvas
		let canvas = document.createElement("canvas");
		canvas.setAttribute('height', height);
		canvas.setAttribute('width', width);
		let ctx = canvas.getContext("2d");
		ctx.drawImage(thumb, 0, 0, width, height);

		//Transformo el canvas en dataurl
		dataurl_aval = canvas.toDataURL("image/jpeg");
    };
};

//Funcion de carga de imagen cedula modificacion de datos
var uploadCedulaMod = function(){
	$('#img-cedula-mod-datos img').remove();
	$('#cedula-icon-mod-datos').removeClass('hidden');
	let thumb = new Image();
	thumb.src = '';
	let filesToUpload = inputFileCedulaMod.files;
	//Crear imagen
	thumb.src = window.URL.createObjectURL(filesToUpload[0]);
	//Tomamos sus medidas
	thumb.onload = function(){
    	let height = thumb.height;
    	let width = thumb.width;

		// Oculto placeholder de imagen y añado img adaptada
		$('#cedula-icon-mod-datos').addClass('hidden');
		thumb.id = "thumb-cedula-mod-datos";
		cedulaContenedorMod.appendChild(thumb);

		// Resize image
		let MAX_WIDTH = 800;
		let MAX_HEIGHT = 600;
 
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

		//Crear canvas
		let canvas = document.createElement("canvas");
		canvas.setAttribute('height', height);
		canvas.setAttribute('width', width);
		let ctx = canvas.getContext("2d");
		ctx.drawImage(thumb, 0, 0, width, height);

		//Transformo el canvas en dataurl
		dataurl_cedula_mod = canvas.toDataURL("image/jpeg");
    };
};

//Añado escuchas
if(inputFileAval){
inputFileAval.addEventListener("change", uploadAval, false);
};

if(inputFileCedula){
inputFileCedula.addEventListener("change", uploadCedula, false);
};

if(inputFileCedulaMod){
inputFileCedulaMod.addEventListener("change", uploadCedulaMod, false);
};