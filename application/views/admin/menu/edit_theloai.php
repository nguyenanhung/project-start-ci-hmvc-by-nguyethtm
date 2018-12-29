<div id="main-content-wp" class="add-cat-page">
	<div class="section" id="title-page">
		<div class="clearfix">
			<a href="<?php echo base_url('admin/menu/add_theloai') ?>" title="" id="add-new" class="fl-left">Thêm
				mới</a>
			<h3 id="index" class="fl-left">Chỉnh sửa thể loại</h3>
		</div>
	</div>
	<div class="wrap clearfix">
		<?php $this->load->view('admin/sidebar') ?>
		<div id="content" class="fl-right">
			<div class="section" id="detail-page">
				<div class="section-detail">
					<form method="POST">
						<label for="title">Tiêu đề</label>
						<input type="text" name="title" id="title" value="<?php echo $theloai->Ten ?>" readonly>
						<label for="title">Tên không dấu </label>
						<input type="text" name="slug" id="slug" value="<?php echo $theloai->TenKhongDau ?>" readonly>
						<label for="desc">Mô tả</label>
						<textarea name="desc" id="desc"><?php echo $theloai->Mota ?></textarea>
						<label>Trạng thái</label>
						<select name="status">
							<option value="<?php echo $theloai->Trangthai ?>"><?php $status = $theloai->Trangthai;
								if ($status == 0){echo "Ngừng hoạt động";} else echo "Hoạt động" ?></option>
							<?php if ($status == 1){ ?>  <option value="0">Không Hoạt động</option> <?php } else {
							?>	<option value="1"> Hoạt động</option>
						<?php	} ?>
						</select>
						<button type="submit" name="btn-submit" id="btn-submit">Cập nhật</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
