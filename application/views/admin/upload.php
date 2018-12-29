<input type="file" id="image-file" placeholder="Input field" name="userfile" >
<br>
<button type="button" class="btn btn-primary" id="upload-image" data-uri="<?php echo base_url('admin/upload/index'); ?>">Upload</button>
<input type="hidden" name="get-data-image" value="" id="get_data_image">
<div class="row">
	<div class="col-xs-12">
		<img src="" class="img-thumbnail" id="thumb-image" style="max-width: 100px">
	</div>
</div>
<span id="status"></span>
<script>
	$(document).ready(function(){
		$("#upload-image").click(function(){
			var url_Up       = $(this).attr("data-uri"); //lấy thuộc tính của thẻ button
			var host_name  = window.location.host;
			var inputFile = $("#image-file");
			var fileData  = inputFile[0].files[0];//lấy ra các thuộc tính của file được upload lên
			//console.log(inputFile);

			//var fileData = inputFile;
			var formData  = new FormData();
			formData.append('file', fileData);
			console.log(url_Up);
			$.ajax({
				url: url_Up,
				type: 'post',
				data: formData,
				dataType: 'json',
				processData: false
				contentType: false,
				success: function(result){
					console.log(result);// in thông báo kết quả lên console
					if(result.error)
					{
						$("#status").html(result.error);
					}else{
						var url_image = '/upload/'+result.upload_data;
						$("#thumb-image").attr('src',url_image);
						$("#get_data_image").attr('value',url_image);
					}
				}
			});
		});
	})
</script>
