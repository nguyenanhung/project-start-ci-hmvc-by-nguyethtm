
<div id="main-content-wp" class="add-cat-page">
	<div class="section" id="title-page">
		<div class="clearfix">
			<a href="?page=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
			<h3 id="index" class="fl-left">Cập nhật thông tin thành viên</h3>
		</div>
	</div>
	<div class="wrap clearfix">
		<div id="sidebar" class="fl-left">
			<ul id="list-cat">
				<li>
					<a href="?page=list_post" title="">Danh sách quản trị viên</a>
				</li>
				<li>
					<a href="?page=list_cat" title="">Danh mục biên tập viên</a>
				</li>
			</ul>
		</div>
		<div id="content" class="fl-right">
			<div class="section" id="detail-page">
				<div class="section-detail">
					<form method="POST">
						<label for="title">Tên </label>
						<input type="text" name="title" id="title" value="<?php echo $user->name?>">
						<span><?php echo form_error('title') ?></span>
						<label for="email">Email</label>
						<input type="email" name="email" id="title" value="<?php echo $user->email?>" readonly>
						<label for="desc">Mật khẩu</label>
						<input type="password" name="password" id="title" value="<?php echo $user->password?>">
						<span><?php echo form_error('password') ?></span>
						<label for="desc">Nhập lại mật khẩu</label>
						<input type="password" name="passwordAgain" id="title">
						<label>Quyền</label>
						<select name="parent-Cat">
							<?php
								for ($i=1;$i<4;$i++)
								{
									echo $user->role;
									if ($i == $user->role)
									{
										$seleted = "selected=\"selected\"";?>
										<option <?php echo $seleted;?>value="<?php echo $i ?>"><?php if ($i ==1) echo "Quản trị viên";else if ($i == 2) echo "Biên tập viên"; else{ echo "thành viên";} ?></option>
								<?php	} else {
										?>
										<option value="<?php echo $i ?>"><?php if ($i ==1) echo "Quản trị viên";else if ($i == 2) echo "Biên tập viên"; else{ echo "thành viên";} ?></option>
									<?php }
									}
							?>
						</select>
						<label>Trạng thái</label>
						<select name="status">
							<option value="<?php echo $user->status ?>" selected>
								<?php
								if($user->status == 0) echo "Ngừng hoạt động"; else echo "Hoạt động";
								?>
							</option>
							<?php if($user->status == 0){ ?>
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
