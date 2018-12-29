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
						<input type="text" name="title" id="title" value="<?php echo $slide->Ten?>" readonly>
						<label for="title">Slug ( Friendly_url )</label>
						<input type="text" name="slug" id="slug" value="<?php echo $slide->link?>" readonly>
						<label for="">Hình ảnh</label>
						<img src="<?php echo base_url('upload/').$slide->Hinh ?>" alt="">
						</select>
						<label>Trạng thái</label>
						<select name="status">
							<option value="<?php echo $slide->status ?>" selected>
								<?php
								if($slide->status==0) echo "Ngừng hoạt động"; else echo "Hoạt động";
								?>
							</option>
							<?php if($slide->status==0){ ?>
								<option value="1">Hoạt động</option> <?php }else{ ?>
								<option value="0">Ngưng hoạt động</option> <?php } ?>
						</select>
						<button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
