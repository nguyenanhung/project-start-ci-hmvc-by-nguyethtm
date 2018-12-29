<div id="main-content-wp" class="add-cat-page">
	<div class="section" id="title-page">
		<div class="clearfix">
			<a href="?page=add_post" title="" id="add-new" class="fl-left">Thêm mới</a>
			<h3 id="index" class="fl-left">Thêm mới loại tin</h3>
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
						<label for="title">Tên không dấu </label>
						<input type="text" name="slug" id="slug" readonly>
						<label for="desc">Mô tả</label>
						<textarea name="desc" id="desc"></textarea>
						<label>Thể loại</label>
						<select name="parent-Cat">
							<?php foreach ($theloai as $item){
								?>
								<option value="<?php echo $item->id?>"><?php echo $item->Ten?></option>
						<?php	} ?>
						</select>
						<label>Trạng thái</label>
						<select name="status">
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
