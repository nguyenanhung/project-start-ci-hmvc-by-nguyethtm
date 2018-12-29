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
						<input type="text" name="title" id="title" value="<?php echo $loaitin->Ten?>" readonly>
						<label for="title">Slug ( Friendly_url )</label>
						<input type="text" name="slug" id="slug" value="<?php echo $loaitin->TenKhongDau?>" readonly>
						<label>Danh mục cha</label>
						<select name="parent-Cat">
							<?php
							foreach ($theloai as $item) {
								$seleted = "";
								if ($loaitin->idTheLoai == $item->id) {
									$seleted = "selected=\"selected\"";
								}
								?>
								<option <?= $seleted?> value="<?php echo $loaitin->idTheLoai; ?>"><?php echo $item->Ten; ?></option>
								<?php
							}
							?>
						</select>
						<label>Trạng thái</label>
						<select name="status">
							<option value="<?php echo $loaitin->Trangthai ?>" selected>
								<?php
									if($loaitin->Trangthai==0) echo "Ngừng hoạt động"; else echo "Hoạt động";
								?>
							</option>
							<?php if($loaitin->Trangthai==0){ ?>
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
