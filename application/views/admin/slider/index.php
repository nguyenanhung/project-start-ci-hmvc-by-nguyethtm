<div id="main-content-wp" class="list-cat-page">
	<div class="section" id="title-page">
		<div class="clearfix">
			<a href="<?php echo base_url('admin/sliders/add_slide')?>" title="" id="add-new" class="fl-left">Thêm mới</a>
			<h3 id="index" class="fl-left">Danh sách slide</h3>
		</div>
	</div>
	<div class="wrap clearfix">
		<div id="content" class="fl-right">
			<div class="section" id="detail-page">
				<div class="section-detail">
					<div class="table-responsive">
						<table class="table list-table-wp">
							<thead>
							<tr>
								<td><input type="checkbox" name="checkAll" id="checkAll"></td>
								<td><span class="thead-text">STT</span></td>
								<td><span class="thead-text">Tên</span></td>
								<td><span class="thead-text">Hình</span></td>
								<td><span class="thead-text">link</span></td>
								<td><span class="thead-text">Ngày tạo</span></td>
								<td><span class="thead-text">Ngày cập nhật</span></td>
								<td><span class="thead-text">Trạng thái</span></td>
							</tr>
							</thead>
							<tbody>
							<?php
							$i=1;
							foreach ($lst_slide as $item)
							{
								?>
								<tr>
									<td><input type="checkbox" name="checkItem" class="checkItem"></td>
									<td><span class="tbody-text"><?php echo $i++;?></h3></span>
									<td class="clearfix">
										<div class="tb-title fl-left">
											<a href="#" title=""><?php echo $item->Ten?></a>
										</div>
										<ul class="list-operation fl-right">
											<li><a href="<?php echo base_url('admin/sliders/edit_slide/').$item->id?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a></li>
											<li><a href="<?php echo base_url('admin/sliders/delete_slide/').$item->id?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
										</ul>
									</td>
									<td><span class="tbody-text"><img src="<?php echo base_url('upload/').$item->Hinh?>" alt="" width="100px" height="100px"></span></td>
									<td><span class="tbody-text"><?php echo $item->link?></span></td>
									<td><span class="tbody-text"><?php echo $item->created_at?></span></td>
									<td><span class="tbody-text"><?php echo $item->updated_at?></span></td>
									<td><span class="thead-text"><?php $status = $item->status; if ($status==0) echo "Ngưng hoạt động"; else echo"Hoạt động"?></span></td>
								</tr>
							<?php }
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="section" id="paging-wp">
				<div class="section-detail clearfix">
					<p id="desc" class="fl-left">Chọn vào checkbox để lựa chọn tất cả</p>
					<?php echo $html_pagging;?>
				</div>
			</div>
		</div>
	</div>
</div>
