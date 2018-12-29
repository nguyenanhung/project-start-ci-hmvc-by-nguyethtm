<div class="row carousel-holder">
    <div class="col-md-2">
    </div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">Đăng ký tài khoản</div>
            <div class="panel-body">
                <form name="frm_register" id="frm_register" method="post">
                    <div>
                        <label>Họ và tên</label>
                        <input type="text" class="form-control" placeholder="Hồ Nguyệt" name="username" id="username"
                               aria-describedby="basic-addon1" value="<?php echo set_value('username')?>"
                        >
                        <span><?php echo form_error('username') ?></span>
                    </div>
                    <br>
                    <div>
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="email" id="email"
                               aria-describedby="basic-addon1" value="<?php echo set_value('email')?>"
                        >
                        <span><?php echo form_error('email') ?></span>
                    </div>
                    <br>
                    <div>
                        <label>Nhập mật khẩu</label>
                        <input type="password" class="form-control" name="password" id="password"
                               aria-describedby="basic-addon1"
                        >
                        <span><?php echo form_error('password') ?></span>
                    </div>
                    <br>
                    <div>
                        <label>Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" name="passwordAgain" id="passwordAgain"
                               aria-describedby="basic-addon1">

                    </div>
                    <br>
                    <input type="submit" class="btn btn-success" name="rigister" value="Đăng kí">
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-2">
    </div>
</div>
