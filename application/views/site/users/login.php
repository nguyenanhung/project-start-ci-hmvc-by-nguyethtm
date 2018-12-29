
<div class="row carousel-holder">
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">Đăng nhập</div>
			<div class="panel-body">
				<form method="POST">
					<div>
						<label>Email</label>
						<input type="email" class="form-control" placeholder="Email" name="email" 
						value="<?php echo set_value('email') ?>">
						<span><?php echo form_error('email') ?></span>
					</div>
					<br>	
					<div>
						<label>Mật khẩu</label>
						<input type="password" class="form-control" name="password">
						<span><?php echo form_error('email') ?></span>
					</div>
					<br>
					<input type="submit" class="btn btn-success " name="login" value="Đăng nhập">
					<!-- <button type="button" class="btn btn-success">Đăng nhập
					</button> -->
					<span><?php echo form_error('login') ?></span>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-4"></div>
</div>