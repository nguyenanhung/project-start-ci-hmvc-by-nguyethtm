<!DOCTYPE html>
<html>
<head>
	<title>AdminV1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="<?php echo public_url('admin')?>/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo public_url('admin')?>/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo public_url('admin')?>/reset.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo public_url('admin')?>/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo public_url('admin')?>/style.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo public_url('admin')?>/responsive.css" rel="stylesheet" type="text/css"/>

	<script src="<?php echo public_url('admin')?>/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<!--	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>-->
<!--	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>-->
	<script src="<?php echo public_url('admin')?>/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo public_url('admin')?>/js/main.js" type="text/javascript"></script>

	<script language="javascript">
		function ChangeToSlug()
		{
			var title, slug;

			//Lấy text từ thẻ input title
			title = document.getElementById("title").value;

			//Đổi chữ hoa thành chữ thường
			slug = title.toLowerCase();

			//Đổi ký tự có dấu thành không dấu
			slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
			slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
			slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
			slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
			slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
			slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
			slug = slug.replace(/đ/gi, 'd');
			//Xóa các ký tự đặt biệt
			slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
			//Đổi khoảng trắng thành ký tự gạch ngang
			slug = slug.replace(/ /gi, "-");
			//Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
			//Phòng trường hợp người nhập vào quá nhiều ký tự trắng
			slug = slug.replace(/\-\-\-\-\-/gi, '-');
			slug = slug.replace(/\-\-\-\-/gi, '-');
			slug = slug.replace(/\-\-\-/gi, '-');
			slug = slug.replace(/\-\-/gi, '-');
			//Xóa các ký tự gạch ngang ở đầu và cuối
			slug = '@' + slug + '@';
			slug = slug.replace(/\@\-|\-\@|\@/gi, '');
			//In slug ra textbox có id “slug”
			document.getElementById('slug').value = slug;
		}
	</script>
</head>
<body>
<div id="site">
	<div id="container">
		<div id="header-wp">
			<div class="wp-inner clearfix">
				<a href="?page=list_post" title="" id="logo" class="fl-left">TIN TỨC ONLINE</a>
				<ul id="main-menu" class="fl-left">
					<li>
						<a href="<?php echo base_url("admin/home/index")?>" title="">Bài viết</a>
						<ul class="sub-menu">
							<li>
								<a href="<?php echo base_url("admin/home/add_post")?>" title="">Thêm mới</a>
							</li>
							<li>
								<a href="<?php echo base_url("admin/home/category")?>" title="">Danh mục bài viết</a>
							</li>
							<li>
								<a href="<?php echo base_url("admin/home/index")?>" title="">Danh sách bài viết</a>
							</li>
						</ul>
					</li>

					<li>
						<a href="<?php echo base_url('admin/menu/index')?>" title="">Menu</a>
					</li>
					<li>
						<a href="<?php echo base_url('admin/users/index')?>" title="">Thành viên</a>
					</li>
					<li>
						<a href="<?php echo base_url('admin/sliders/index')?>" title="">slider</a>
					</li>
				</ul>

			</div>
		</div>
