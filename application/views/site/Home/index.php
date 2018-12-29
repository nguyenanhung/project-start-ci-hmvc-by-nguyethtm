<?php
$this->load->view('site/slider');
$this->load->view('site/menu');
//show_array($menu);
?>
<div class="col-md-9">
    <div class="panel panel-default">
        <div class="panel-heading" style="background-color:#337AB7; color:white;" >
            <h2 style="margin-top:0px; margin-bottom:0px;"> Tin Tức</h2>
        </div>

        <div class="panel-body">
            <!-- item -->
            <?php
                foreach ($menu as $item) {
                    ?>
                    <!-- item -->
                    <div class="row-item row">
                        <h3>
                            <a href="#"><?= $item->Ten?></a> |
                            <?php
                            $loaitin = explode(',', $item->Loaitin);
                            foreach ($loaitin as $loai) {
                                list($id, $ten, $tenkhongdau) = explode(':', $loai); ?>
                                <small><a href="<?php echo base_url("home/category/").$item->TenKhongDau."/".$tenkhongdau?>"><?php echo $ten; ?></i></a>/</small>
                                <?php
                            }
                            ?>
                        </h3>
                        <div class="col-md-12 border-right">
                            <div class="col-md-3">
                                <a href="<?php echo base_url('home/detail/').$item->TenKhongDau."/".$item->tieudekhongdau ?>">
                                    <img class="img-responsive" src="<?= public_url('image/tintuc/').$item->hinhanh; ?>" alt="">
                                </a>
                            </div>
                            <div class="col-md-9">
                                <h3><?= $item->tieude ?></h3>
                                <p><?= $item->noidungtomtat ?></p>
                                <a class="btn btn-primary" href="<?php echo base_url('home/detail/').$item->TenKhongDau."/".$item->tieudekhongdau ?>">Xem tiếp <span
                                            class="glyphicon glyphicon-chevron-right"></span></a>
                            </div>
                        </div>
                        <div class="break"></div>
                    </div>
                    <!-- end item -->
                <?php }; ?>
        </div>
    </div>
</div>
</div>
<!-- /.row -->
</div>