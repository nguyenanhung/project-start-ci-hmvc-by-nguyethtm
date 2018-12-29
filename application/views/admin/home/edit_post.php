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
						<input type="text" name="title" id="title" value="<?php echo $tintuc->TieuDe?>" readonly>
						<label for="title">Slug ( Friendly_url )</label>
						<input type="text" name="slug" id="slug" value="<?php echo $tintuc->TieuDeKhongDau?>" readonly>
						<label>Loại tin</label>
						<select name="parent-Cat">
							<?php
							foreach ($loaitin as $item) {
								$seleted = "";
								if ($tintuc->idLoaitin == $item->id) {
									$seleted = "selected=\"selected\"";
								}
								?>
								<option <?= $seleted?> value="<?php echo $tintuc->idLoaiTin; ?>"><?php echo $item->Ten; ?></option>
								<?php
							}
							?>
						</select>
						<label>Nổi bật</label>
						<select name="famous">
							<option value="<?php echo $tintuc->NoiBat ?>" selected>
								<?php
								echo $tintuc->NoiBat == 0 ? "Bình thường" : "Nổi bật"
								?>
							</option>
							<?php if($tintuc->NoiBat == 0){ ?>
								<option value="1">Nổi bật</option> <?php }else{ ?>
								<option value="0">Bình thường</option> <?php } ?>
						</select>
						<label>Trạng thái</label>
						<select name="status">
							<option value="<?php echo $tintuc->Trangthai ?>" selected>
								<?php
								if($tintuc->Trangthai==0) echo "Ngừng hoạt động"; else echo "Hoạt động";
								?>
							</option>
							<?php if($tintuc->Trangthai==0){ ?>
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
