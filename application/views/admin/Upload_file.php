<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<input type="file" id="image-file" placeholder="Input field" name="userfile" >
<br>
<button type="button" class="btn btn-primary" id="upload-image" data-uri="<?php echo base_url('admin/upload_file/index'); ?>">Upload</button>
<input type="hidden" name="get-data-image" value="" id="get_data_image">
<div class="row">
	<div class="col-xs-12">
		<img src="" class="img-thumbnail" id="thumb-image" style="max-width: 100px">
	</div>
</div>
<span id="status"></span>
<!--<form action="" ></form>-->
<script>
	$(document).ready(function(){
		$("#upload-image").click(function(){
			var url_Up       = $(this).attr("data-uri");
			var host_name  = window.location.host;
			var inputFile = $("#image-file");
			var fileData  = inputFile[0].files[0];
			var formData  = new FormData();
			formData.append('file', fileData);
			console.log(url_Up);
			$.ajax({
				url: url_Up,
				type: 'post',
				data: formData,
				dataType: 'json',
				processData: false,
				contentType: false,

				success: function(result){
					console.log(result);
					if (result.error) {
						$("#status").html(result.error);
					}else{
						var url_image = '/upload/'+result.upload_data['file_name'];
						$("#thumb-image").attr('src',url_image);
						$("#get_data_image").attr('value',url_image);
						$("#status").html(result.status);
					}
				}
			});
		});
	})
</script>
