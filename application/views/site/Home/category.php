<?php $this->load->view('site/menu');
// echo "page = ".$total_row;
  //show_array($lst_category);
?>
<div class="col-md-9 ">
    <div class="panel panel-default">
        <div class="panel-heading" style="background-color:#337AB7; color:white;">
            <h4><b><?= $title;?></b></h4>
        </div>

        <div class="row-item row">
            <?php foreach ($lst_category as $item) {
                ?>
                <div class="col-md-3">

                    <a href="">
                        <br>
                        <img width="200px" height="200px" class="img-responsive" src="<?php echo public_url("image/tintuc/").$item->Hinh?>"
                             alt="hình ảnh">
                    </a>
                </div>

                <div class="col-md-9">
                    <h3><?= $item->TieuDe?></h3>
                    <p><?= $item->TomTat ?></p> 
                    <a class="btn btn-primary" href="<?php echo base_url('home/detail/').$item->TenKhongDau."/".$item->TieuDeKhongDau ?>">Xem thêm <span
                            class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
                <div class="break"></div>
                <?php
            }
            ?>
        </div>
        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <?php echo $html_pagging; ?>
            </div>
        </div>
        <!-- /.row -->

    </div>
</div> 