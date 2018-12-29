
<div id="main-content-wp" class="list-post-page">
	<div class="section" id="title-page">
		<div class="clearfix">
			<a href="?page=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
			<h3 id="index" class="fl-left">Danh sách bài viết</h3>
		</div>
	</div>
	<div class="wrap clearfix">
		<?php $this->load->view('admin/sidebar')?>
		<div id="content" class="fl-right">
			<div class="section" id="detail-page">
				<div class="section-detail">
					<div class="filter-wp clearfix">
						<ul class="post-status fl-left">
							<li class="all"><a href="">Tất cả <span class="count">(10)</span></a> |</li>
							<li class="publish"><a href="">Đã đăng <span class="count">(5)</span></a> |</li>
							<li class="pending"><a href="">Chờ xét duyệt <span class="count">(5)</span></a></li>
							<li class="trash"><a href="">Thùng rác <span class="count">(0)</span></a></li>
						</ul>
						<form method="GET" class="form-s fl-right">
							<input type="text" name="s" id="s">
							<input type="submit" name="sm_s" value="Tìm kiếm">
						</form>
					</div>
					<div class="actions">
						<form method="GET" action="" class="form-actions">
							<select name="actions">
								<option value="0">Tác vụ</option>
								<option value="1">Chỉnh sửa</option>
								<option value="2">Bỏ vào thủng rác</option>
							</select>
							<input type="submit" name="sm_action" value="Áp dụng">
						</form>
					</div>
					<div class="table-responsive">
						<table class="table list-table-wp">
							<thead>
							<tr>
								<td><input type="checkbox" name="checkAll" id="checkAll"></td>
								<td><span class="thead-text">STT</span></td>
								<td><span class="thead-text">Tiêu đề</span></td>
								<td><span class="thead-text">Tiêu đề không dấu</span></td>
								<td><span class="thead-text">Mô tả</span></td>
								<td><span class="thead-text">Nội dung</span></td>
								<td><span class="thead-text">Loại tin</span></td>
								<td><span class="thead-text">Tin tức nổi bật</span></td>
								<td><span class="thead-text">Người tạo</span></td>
								<td><span class="thead-text">Ngày tạo</span></td>
								<td><span class="thead-text">Ngày cập nhật</span></td>
								<td><span class="thead-text">Trạng thái</span></td>
							</tr>
							</thead>
							<tbody>
							<?php
							$i=1;
							foreach ($tintucs as $item){ ?>
								<tr>
									<td><input type="checkbox" name="checkItem" class="checkItem"></td>
									<td><span class="tbody-text"><?php echo $i++;?></h3></span>
									<td class="clearfix">
										<div class="tb-title fl-left">
											<a href="" title=""><?php echo $item->TieuDe?></a>
										</div>
										<ul class="list-operation fl-right">
											<li><a href="<?php echo base_url('admin/home/edit_post/').$item->TieuDeKhongDau?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
											<li><a href="<?php echo base_url('admin/home/delete_post/').$item->TieuDeKhongDau?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
										</ul>
									</td>
									<td><span class="tbody-text"><?php echo $item->TieuDeKhongDau?></span></td>
									<td><span class="tbody-text"><?php echo $item->TomTat?></span></td>
									<td><span class="tbody-text"><?php echo $item->NoiDung?></span></td>
									<td><span class="tbody-text"><?php foreach ($loaitins as $value) {
										if ($value->id == $item->idLoaiTin)echo $value->Ten;
											}?></span></td>
									<td><span class="tbody-text"><?php echo $item->NoiBat == 0 ? "Bình thường" : "Nổi bật";?></span></td>
									<td><span class="tbody-text">admin</span></td>
									<td><span class="tbody-text"><?php echo $item->created_at?></span></td>
									<td><span class="tbody-text"><?php echo $item->updated_at?></span></td>
									<td><span class="thead-text"><?php $status = $item->Trangthai; if ($status==0) echo "Ngưng hoạt động"; else echo"Hoạt động"?></span></td>
								</tr>
							<?php } ?>
							</tbody>
							<thead>
							<tr>
								<td><input type="checkbox" name="checkAll" id="checkAll"></td>
								<td><span class="thead-text">STT</span></td>
								<td><span class="thead-text">Tiêu đề</span></td>
								<td><span class="thead-text">Tiêu đề không dấu</span></td>
								<td><span class="thead-text">Mô tả</span></td>
								<td><span class="thead-text">Nội dung</span></td>
								<td><span class="thead-text">Loại tin</span></td>
								<td><span class="thead-text">Người tạo</span></td>
								<td><span class="thead-text">Ngày tạo</span></td>
								<td><span class="thead-text">Ngày cập nhật</span></td>
								<td><span class="thead-text">Trạng thái</span></td>
							</tr>
							</thead>
						</table>
					</div>

				</div>
			</div>
			<div class="section" id="paging-wp">
				<div class="section-detail clearfix">
					<?php echo $html_pagging;?>
				</div>
			</div>
		</div>
	</div>
</div>
