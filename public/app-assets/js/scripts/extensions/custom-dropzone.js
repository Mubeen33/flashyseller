/*=========================================================================================
    File Name: custom-dropzone.js
    Description: This dropzone file is applied to Upload Products Images file addproduct.blade.php
==========================================================================================*/
// Dropzone 1
dropzon_file_1 =false;
Dropzone.options.dpzSingleFileP1 = {
    paramName: "fileDropzone", // The name that will be used to transfer the file
    maxFiles: 1,
    //autoProcessQueue: false,
    addRemoveLinks: false,
    thumbnailWidth: "250",
    thumbnailHeight: "250",
    headers: {
        'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
    },
    previewTemplate: `<div class="dz-preview dz-complete dz-image-preview">
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
    init: function() {
        this.on("maxfilesexceeded", function(file) {
            this.removeAllFiles();
            this.addFile(file);
            dropzon_file_1=false;
        });
    },
    success: function(file, response) {
        dropzon_file_1=true;
        $('.emptymsgs').text('');
        obj = JSON.parse(response);
        $(file.previewTemplate).append("<span class='filenameofdropzone'>" + obj.filename + "</span>");
    },
    removedfile: function(file) {
        dropzon_file_1=false;
        var server_file = $(file.previewTemplate).children('.filenameofdropzone').text();
        var name = server_file;
        //console.log(file);

        $.ajax({
            type: 'POST',
            url: '/vendor/delete-product-image',
            data: {
                "token": "{{ csrf_token() }}",
                name: name
            },
            success: function(data) {

                toastr.success('', 'Image removed successfully!');

            },
            error: function(error) {
                toastr.error('', 'Image not removed successfully!');
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
    thumbnailWidth: "250",
    thumbnailHeight: "250",
    headers: {
        'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
    },
    previewTemplate: `<div class="dz-preview dz-complete dz-image-preview">
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
    init: function() {
        this.on("maxfilesexceeded", function(file) {
            this.removeAllFiles();
            this.addFile(file);
        });
    },
    success: function(file, response) {
        obj = JSON.parse(response);
        $(file.previewTemplate).append("<span class='filenameofdropzone'>" + obj.filename + "</span>");
    },
    removedfile: function(file) {
        var server_file = $(file.previewTemplate).children('.filenameofdropzone').text();
        var name = server_file;
        //console.log(file);

        $.ajax({
            type: 'POST',
            url: '/vendor/delete-product-image',
            data: {
                "token": "{{ csrf_token() }}",
                name: name
            },
            success: function(data) {

                toastr.success('', 'Image removed successfully!');

            },
            error: function(error) {
                toastr.error('', 'Image not removed successfully!');
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
    thumbnailWidth: "250",
    thumbnailHeight: "250",
    addRemoveLinks: false,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
    },
    previewTemplate: `<div class="dz-preview dz-complete dz-image-preview">
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
    init: function() {
        this.on("maxfilesexceeded", function(file) {
            this.removeAllFiles();
            this.addFile(file);
        });
    },
    success: function(file, response) {
        obj = JSON.parse(response);
        $(file.previewTemplate).append("<span class='filenameofdropzone'>" + obj.filename + "</span>");
    },
    removedfile: function(file) {
        var server_file = $(file.previewTemplate).children('.filenameofdropzone').text();
        var name = server_file;
        //console.log(file);

        $.ajax({
            type: 'POST',
            url: '/vendor/delete-product-image',
            data: {
                "token": "{{ csrf_token() }}",
                name: name
            },
            success: function(data) {

                toastr.success('', 'Image removed successfully!');

            },
            error: function(error) {
                toastr.error('', 'Image not removed successfully!');
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
    thumbnailWidth: "250",
    thumbnailHeight: "250",
    addRemoveLinks: false,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
    },
    previewTemplate: `<div class="dz-preview dz-complete dz-image-preview">
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
    init: function() {
        this.on("maxfilesexceeded", function(file) {
            this.removeAllFiles();
            this.addFile(file);
        });
    },
    success: function(file, response) {
        obj = JSON.parse(response);
        $(file.previewTemplate).append("<span class='filenameofdropzone'>" + obj.filename + "</span>");
    },
    removedfile: function(file) {
        var server_file = $(file.previewTemplate).children('.filenameofdropzone').text();
        var name = server_file;
        //console.log(file);

        $.ajax({
            type: 'POST',
            url: '/vendor/delete-product-image',
            data: {
                "token": "{{ csrf_token() }}",
                name: name
            },
            success: function(data) {

                toastr.success('', 'Image removed successfully!');

            },
            error: function(error) {
                toastr.error('', 'Image not removed successfully!');
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
    thumbnailWidth: "250",
    thumbnailHeight: "250",
    addRemoveLinks: false,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
    },
    previewTemplate: `<div class="dz-preview dz-complete dz-image-preview">
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
    init: function() {
        this.on("maxfilesexceeded", function(file) {
            this.removeAllFiles();
            this.addFile(file);
        });
    },
    success: function(file, response) {
        obj = JSON.parse(response);
        $(file.previewTemplate).append("<span class='filenameofdropzone'>" + obj.filename + "</span>");
    },
    removedfile: function(file) {
        var server_file = $(file.previewTemplate).children('.filenameofdropzone').text();
        var name = server_file;
        //console.log(file);

        $.ajax({
            type: 'POST',
            url: '/vendor/delete-product-image',
            data: {
                "token": "{{ csrf_token() }}",
                name: name
            },
            success: function(data) {

                toastr.success('', 'Image removed successfully!');

            },
            error: function(error) {
                toastr.error('', 'Image not removed successfully!');
            }
        });
        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
    }
};

// Dropzone 6
Dropzone.options.dpzSingleFileP6 = {
    paramName: "fileDropzone", // The name that will be used to transfer the file
    maxFiles: 1,
    thumbnailWidth: "250",
    thumbnailHeight: "250",
    addRemoveLinks: false,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
    },
    previewTemplate: `<div class="dz-preview dz-complete dz-image-preview">
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
    init: function() {
        this.on("maxfilesexceeded", function(file) {
            this.removeAllFiles();
            this.addFile(file);
        });
    },
    success: function(file, response) {
        obj = JSON.parse(response);
        $(file.previewTemplate).append("<span class='filenameofdropzone'>" + obj.filename + "</span>");
    },
    removedfile: function(file) {
        var server_file = $(file.previewTemplate).children('.filenameofdropzone').text();
        var name = server_file;
        //console.log(file);

        $.ajax({
            type: 'POST',
            url: '/vendor/delete-product-image',
            data: {
                "token": "{{ csrf_token() }}",
                name: name
            },
            success: function(data) {

                toastr.success('', 'Image removed successfully!');

            },
            error: function(error) {
                toastr.error('', 'Image not removed successfully!');
            }
        });
        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
    }
};