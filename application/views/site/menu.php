 <div class="row main-left">
 	<div class="col-md-3 ">
 		<ul class="list-group" id="menu">
 			<li href="#" class="list-group-item menu1 active">
 				Thể Loại
 			</li>
			 <?php
            foreach ($menu as $item) {
                ?>
                <li href="#" class="list-group-item menu1">
                    <?php echo $item->Ten; ?>
                </li>
                <ul>
                    <?php
                    $loaitin = explode(',', $item->Loaitin);
                    foreach ($loaitin as $loai) {
                        list($id, $ten, $tenkhongdau) = explode(':', $loai); ?>
                        <li class="list-group-item">
                            <a href="<?php echo base_url("home/category/").$item->TenKhongDau."/".$tenkhongdau?>"><?php echo $ten; ?></a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
                <?php
            }
            ?>
 			
 		</ul>
 	</div>