<div id="main-content-wp" class="add-cat-page">
	<div class="section" id="title-page">
		<div class="clearfix">
			<a href="?page=add_post" title="" id="add-new" class="fl-left">Thêm mới</a>
			<h3 id="index" class="fl-left">Thêm thể loại</h3>
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
						<span><?php echo form_error('title')?></span>
						<label for="title">Tên không dấu </label>
						<input type="text" name="slug" id="slug" readonly>
						<span><?php echo form_error('title')?></span>
						<label for="desc">Mô tả</label>
						<textarea name="desc" id="desc"></textarea>
						<label>Trạng thái</label>
						<select name="status">
							<option value="">-- Chọn trạng thái --</option>
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
