<div id="main-content-wp" class="add-cat-page">
	<div class="section" id="title-page">
		<div class="clearfix">
			<h3 id="index" class="fl-left">Thêm mới slider</h3>
		</div>
	</div>
	<div class="wrap clearfix">
		<?php $this->load->view('admin/sidebar') ?>
		<div id="content" class="fl-right">
			<div class="section" id="detail-page">
				<div class="section-detail">
					<form method="POST">
						<label for="title">Tiêu đề</label>
						<input type="text" name="title" onkeyup="ChangeToSlug();" id="title">
						<span><?php echo form_error('title');?></span>
						<label for="title">Tên không dấu </label>
						<input type="text" name="slug" id="slug" readonly>
						<label>Hình ảnh</label>
						<div id="uploadFile">
							<?php $this->load->view('admin/Upload_file')?>
						</div>
						<div class="status alert alert-success"></div>
						<label for="">Trạng thái</label>
						<select name="status" id="status">
							<option value="0">Ngưng hoạt động</option>
							<option value="1">Hoạt động</option>
						</select>
						<button type="submit" name="btn-submit" id="btn-submit">Thêm mới</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

