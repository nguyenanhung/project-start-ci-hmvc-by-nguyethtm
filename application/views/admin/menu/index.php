
<div id="main-content-wp" class="list-post-page">
	<div class="section" id="title-page">
		<div class="clearfix">
			<a href="<?php echo base_url('admin/menu/add_theloai')?>" title="" id="add-new" class="fl-left">Thêm mới</a>
			<h3 id="index" class="fl-left">Danh sách thể loại</h3>
		</div>
	</div>
	<div class="wrap clearfix">
		<?php $this->load->view('admin/sidebar') ?>
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
								<td><span class="thead-text">Tên không dấu</span></td>
								<td><span class="thead-text">Mô tả</span></td>
								<td><span class="thead-text">Trạng thái</span></td>
								<td><span class="thead-text">Người tạo</span></td>
								<td><span class="thead-text">Ngày tạo</span></td>
								<td><span class="thead-text">Ngày cập nhật</span></td>
							</tr>
							</thead>
							<tbody>
							<?php
								$i = 1;
								foreach ($theloais as $item) { ?>
							<tr>

								<td><input type="checkbox" name="checkItem" class="checkItem"></td>
								<td><span class="tbody-text"><?php echo $i++;?></h3></span>
								<td class="clearfix">
									<div class="tb-title fl-left">
										<a href="" title=""><?php echo $item->Ten ?></a>
									</div>
									<ul class="list-operation fl-right">
										<li><a href="<?php echo base_url('admin/menu/edit_theloai') . "/". $item->TenKhongDau ?>"
											   title="Sửa" class="edit"><i class="fa fa-pencil"
																		   aria-hidden="true"></i></a></li>
										<li><a href="<?php echo base_url('admin/menu/delete_theloai') . "/" . $item->TenKhongDau ?>"
											   title="Xóa" class="delete"><i class="fa fa-trash"
																			 aria-hidden="true"></i></a></li>
									</ul>
								</td>
								<td><span class="tbody-text"><?php echo $item->TenKhongDau ?></span></td>
								<td><span class="tbody-text"><?php echo $item->Mota?></span></td>
								<td><span class="tbody-text"><?php $status =  $item->Trangthai;
										if ($status == 0) echo "Ngừng hoạt động"; else echo "Hoạt động" ?></span>
								</td>
								<td><span class="tbody-text">Admin</span></td>
								<td><span class="tbody-text"><?php echo $item->created_at ?></span></td>
								<td><span class="tbody-text"><?php echo $item->updated_at ?></span></td>


							</tr>
							<?php } ?>

							</tbody>
							<thead>
							<tr>
								<td><input type="checkbox" name="checkAll" id="checkAll"></td>
								<td><span class="thead-text">STT</span></td>
								<td><span class="thead-text">Tiêu đề</span></td>
								<td><span class="thead-text">Tên không dấu</span></td>
								<td><span class="thead-text">Mô tả</span></td>
								<td><span class="thead-text">Trạng thái</span></td>
								<td><span class="thead-text">Người tạo</span></td>
								<td><span class="thead-text">Ngày tạo</span></td>
								<td><span class="thead-text">Ngày cập nhật</span></td>
							</tr>
							</thead>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
