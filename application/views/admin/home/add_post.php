<div id="main-content-wp" class="add-cat-page">
	<div class="section" id="title-page">
		<div class="clearfix">
			<a href="?page=add_post" title="" id="add-new" class="fl-left">Thêm mới</a>
			<h3 id="index" class="fl-left">Thêm mới bài viết</h3>
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
						<label for="">Môt tả ngắn</label>
						<input type="text" name="desc" id="desc">
						<label for="desc">Nội dung</label>
						<textarea name="content" id="content"></textarea>
						<label>Hình ảnh</label>
						<div id="uploadFile">
							<?php $this->load->view('admin/Upload_file')?>
						</div>
						<div class="status alert alert-success"></div>
						<label>Loại tin</label>
						<select name="parent-Cat">
							<?php
								foreach ($theloais as $theloai)
								{ ?>
									<option value="<?php echo $theloai->id?>"><?php echo $theloai->Ten?></option>
								<?php  }
							?>
						</select>
						<label for="">Nổi bật</label>
						<select name="famous" id="famous">
							<option value="0">Bình thường</option>
							<option value="1">Nổi bật</option>
						</select>
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

