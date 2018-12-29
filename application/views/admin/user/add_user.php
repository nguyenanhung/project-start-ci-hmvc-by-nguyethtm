<div id="main-content-wp" class="add-cat-page">
	<div class="section" id="title-page">
		<div class="clearfix">
			<h3 id="index" class="fl-left">Thêm thành viên</h3>
		</div>
	</div>
	<div class="wrap clearfix">
		<div id="content" class="fl-right">
			<div class="section" id="detail-page">
				<div class="section-detail">
					<form method="POST" action="">
						<label for="title">Tên </label>
						<input type="text" name="title" id="title" value="<?php echo set_value('title') ?>">
						<span><?php echo form_error('title') ?></span>
						<label for="email">Email</label>
						<input type="email" name="email" id="email" value="<?php echo set_value('email') ?>">
                        <span><?php echo form_error('email') ?></span>
                        <label for="desc">Mật khẩu</label>
						<input type="password" name="password" id="title" value="<?php echo set_value('password') ?>">
						<span><?php echo form_error('password') ?></span>
						<label for="desc">Nhập lại mật khẩu</label>
						<input type="password" name="passwordAgain" id="title">
						<label>Quyền</label>
						<select name="role">
							<option value="1">Quản trị viên</option>
							<option value="2">Biên tập viên</option>
							<option value="3">Thành viên</option>

						</select>
						<label>Trạng thái</label>
						<select name="status">
							<option value="1">Hoạt động</option>
							<option value="0">Ngưng hoạt động</option>
						</select>
						<button type="submit" name="btn-submit" id="btn-submit">Thêm mới</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
