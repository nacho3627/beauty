var inputFile = document.getElementById("archivo");

//Funcion de carga de imagen
var upload = function(){

	var filesToUpload = inputFile.files;
	var thumb = document.createElement('img');
	thumb.src = window.URL.createObjectURL(filesToUpload[0]);
	thumb.height = 100;
	var imgContenedor = document.getElementById('img');
	document.getElementById('cam-icon').className += " hidden";
	imgContenedor.appendChild(thumb);

};

//Añado escucha
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