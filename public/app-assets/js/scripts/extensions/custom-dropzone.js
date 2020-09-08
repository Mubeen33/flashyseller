/*=========================================================================================
    File Name: custom-dropzone.js
    Description: This dropzone file is applied to Upload Products Images file addproduct.blade.php
==========================================================================================*/
// Dropzone 1
Dropzone.options.dpzSingleFileP1 = {
  paramName: "fileDropzone", // The name that will be used to transfer the file
  maxFiles: 1,
  addRemoveLinks: false,
  headers: {
	'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
  },
  previewTemplate: 
	`<div class="dz-preview dz-complete dz-image-preview">
		<div class="dz-image">
			<img
			data-dz-thumbnail
			style="height: 188px;width: 178px;"
			>
		</div>
		<div class="dz-details">
			<div class="dz-size" data-dz-size></div>
			<div class="dz-filename">
			<span data-dz-name></span>
			</div>
		</div>
		<div class="dz-progress">
			<span class="dz-upload" data-dz-uploadprogress></span>
		</div>
		<div class="dz-error-message">
			<span data-dz-errormessage></span>
		</div>
		<a class="dz-set-default bg-danger" href="javascript:undefined;" data-dz-remove>
			<i class="fa fa-times"></i>
		</a>
	</div>`,
	init: function () {
		this.on("maxfilesexceeded", function (file) {
			this.removeAllFiles();
			this.addFile(file);
		});
	},
	success: function( file, response ) {
		obj = JSON.parse(response);
		$(file.previewTemplate).append("<span class='filenameofdropzone'>" + obj.filename + "</span>");
	},	
	removedfile: function(file) {
		var server_file = $(file.previewTemplate).children('.filenameofdropzone').text();
		var name = server_file; 
		//console.log(file);
		
		$.ajax({
			type: 'POST',
			url: 'vendor/delete-product-image',
			data: { 
				"token": "{{ csrf_token() }}",
				name: name 
			},
			success: function(data){
				console.log('success: ' + data);
			}, error: function(error) {
				console.log('Error: ', error.data);
			}
		});
		var _ref;
		return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
	}
};



// Dropzone 2
Dropzone.options.dpzSingleFileP2 = {
	paramName: "fileDropzone", // The name that will be used to transfer the file
	maxFiles: 1,
	addRemoveLinks: false,
	headers: {
	  'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
	},
	previewTemplate: 
	  `<div class="dz-preview dz-complete dz-image-preview">
		  <div class="dz-image">
			  <img
			  data-dz-thumbnail
			  style="height: 188px;width: 178px;"
			  >
		  </div>
		  <div class="dz-details">
			  <div class="dz-size" data-dz-size></div>
			  <div class="dz-filename">
			  <span data-dz-name></span>
			  </div>
		  </div>
		  <div class="dz-progress">
			  <span class="dz-upload" data-dz-uploadprogress></span>
		  </div>
		  <div class="dz-error-message">
			  <span data-dz-errormessage></span>
		  </div>
		  <a class="dz-set-default bg-danger" href="javascript:undefined;" data-dz-remove>
			  <i class="fa fa-times"></i>
		  </a>
	  </div>`,
	  init: function () {
		  this.on("maxfilesexceeded", function (file) {
			  this.removeAllFiles();
			  this.addFile(file);
		  });
	  },
	  success: function( file, response ) {
		  obj = JSON.parse(response);
		  $(file.previewTemplate).append("<span class='filenameofdropzone'>" + obj.filename + "</span>");
	  },	
	  removedfile: function(file) {
		  var server_file = $(file.previewTemplate).children('.filenameofdropzone').text();
		  var name = server_file; 
		  //console.log(file);
		  
		  $.ajax({
			  type: 'POST',
			  url: 'vendor/delete-product-image',
			  data: { 
				  "token": "{{ csrf_token() }}",
				  name: name 
			  },
			  success: function(data){
				  console.log('success: ' + data);
			  }, error: function(error) {
				  console.log('Error: ', error.data);
			  }
		  });
		  var _ref;
		  return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
	  }
  };



// Dropzone 3
Dropzone.options.dpzSingleFileP3 = {
	paramName: "fileDropzone", // The name that will be used to transfer the file
	maxFiles: 1,
	addRemoveLinks: false,
	headers: {
	  'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
	},
	previewTemplate: 
	  `<div class="dz-preview dz-complete dz-image-preview">
		  <div class="dz-image">
			  <img
			  data-dz-thumbnail
			  style="height: 188px;width: 178px;"
			  >
		  </div>
		  <div class="dz-details">
			  <div class="dz-size" data-dz-size></div>
			  <div class="dz-filename">
			  <span data-dz-name></span>
			  </div>
		  </div>
		  <div class="dz-progress">
			  <span class="dz-upload" data-dz-uploadprogress></span>
		  </div>
		  <div class="dz-error-message">
			  <span data-dz-errormessage></span>
		  </div>
		  <a class="dz-set-default bg-danger" href="javascript:undefined;" data-dz-remove>
			  <i class="fa fa-times"></i>
		  </a>
	  </div>`,
	  init: function () {
		  this.on("maxfilesexceeded", function (file) {
			  this.removeAllFiles();
			  this.addFile(file);
		  });
	  },
	  success: function( file, response ) {
		  obj = JSON.parse(response);
		  $(file.previewTemplate).append("<span class='filenameofdropzone'>" + obj.filename + "</span>");
	  },	
	  removedfile: function(file) {
		  var server_file = $(file.previewTemplate).children('.filenameofdropzone').text();
		  var name = server_file; 
		  //console.log(file);
		  
		  $.ajax({
			  type: 'POST',
			  url: 'vendor/delete-product-image',
			  data: { 
				  "token": "{{ csrf_token() }}",
				  name: name 
			  },
			  success: function(data){
				  console.log('success: ' + data);
			  }, error: function(error) {
				  console.log('Error: ', error.data);
			  }
		  });
		  var _ref;
		  return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
	  }
  };



  // Dropzone 4
Dropzone.options.dpzSingleFileP4 = {
	paramName: "fileDropzone", // The name that will be used to transfer the file
	maxFiles: 1,
	addRemoveLinks: false,
	headers: {
	  'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
	},
	previewTemplate: 
	  `<div class="dz-preview dz-complete dz-image-preview">
		  <div class="dz-image">
			  <img
			  data-dz-thumbnail
			  style="height: 188px;width: 178px;"
			  >
		  </div>
		  <div class="dz-details">
			  <div class="dz-size" data-dz-size></div>
			  <div class="dz-filename">
			  <span data-dz-name></span>
			  </div>
		  </div>
		  <div class="dz-progress">
			  <span class="dz-upload" data-dz-uploadprogress></span>
		  </div>
		  <div class="dz-error-message">
			  <span data-dz-errormessage></span>
		  </div>
		  <a class="dz-set-default bg-danger" href="javascript:undefined;" data-dz-remove>
			  <i class="fa fa-times"></i>
		  </a>
	  </div>`,
	  init: function () {
		  this.on("maxfilesexceeded", function (file) {
			  this.removeAllFiles();
			  this.addFile(file);
		  });
	  },
	  success: function( file, response ) {
		  obj = JSON.parse(response);
		  $(file.previewTemplate).append("<span class='filenameofdropzone'>" + obj.filename + "</span>");
	  },	
	  removedfile: function(file) {
		  var server_file = $(file.previewTemplate).children('.filenameofdropzone').text();
		  var name = server_file; 
		  //console.log(file);
		  
		  $.ajax({
			  type: 'POST',
			  url: 'vendor/delete-product-image',
			  data: { 
				  "token": "{{ csrf_token() }}",
				  name: name 
			  },
			  success: function(data){
				  console.log('success: ' + data);
			  }, error: function(error) {
				  console.log('Error: ', error.data);
			  }
		  });
		  var _ref;
		  return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
	  }
  };



// Dropzone 5
Dropzone.options.dpzSingleFileP5 = {
	paramName: "fileDropzone", // The name that will be used to transfer the file
	maxFiles: 1,
	addRemoveLinks: false,
	headers: {
	  'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
	},
	previewTemplate: 
	  `<div class="dz-preview dz-complete dz-image-preview">
		  <div class="dz-image">
			  <img
			  data-dz-thumbnail
			  style="height: 188px;width: 178px;"
			  >
		  </div>
		  <div class="dz-details">
			  <div class="dz-size" data-dz-size></div>
			  <div class="dz-filename">
			  <span data-dz-name></span>
			  </div>
		  </div>
		  <div class="dz-progress">
			  <span class="dz-upload" data-dz-uploadprogress></span>
		  </div>
		  <div class="dz-error-message">
			  <span data-dz-errormessage></span>
		  </div>
		  <a class="dz-set-default bg-danger" href="javascript:undefined;" data-dz-remove>
			  <i class="fa fa-times"></i>
		  </a>
	  </div>`,
	  init: function () {
		  this.on("maxfilesexceeded", function (file) {
			  this.removeAllFiles();
			  this.addFile(file);
		  });
	  },
	  success: function( file, response ) {
		  obj = JSON.parse(response);
		  $(file.previewTemplate).append("<span class='filenameofdropzone'>" + obj.filename + "</span>");
	  },	
	  removedfile: function(file) {
		  var server_file = $(file.previewTemplate).children('.filenameofdropzone').text();
		  var name = server_file; 
		  //console.log(file);
		  
		  $.ajax({
			  type: 'POST',
			  url: 'vendor/delete-product-image',
			  data: { 
				  "token": "{{ csrf_token() }}",
				  name: name 
			  },
			  success: function(data){
				  console.log('success: ' + data);
			  }, error: function(error) {
				  console.log('Error: ', error.data);
			  }
		  });
		  var _ref;
		  return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
	  }
  };