
<div class="row">

    <!-- Blog Post Content Column -->
    <div class="col-lg-9">

        <!-- Blog Post -->

        <!-- Title -->
        <h1>
            <?php echo $tintuc->TieuDe; ?>
        </h1>

        <!-- Author -->
        <p class="lead">
            by <a href="#">Admin</a>
        </p>

        <!-- Preview Image -->
        <img class="img-responsive" src="<?php echo public_url('image/tintuc/').$tintuc->Hinh ?>" alt="">

        <!-- Date/Time -->
        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $tintuc->created_at ?></p>
        <hr>

        <!-- Post Content -->
        <p class="lead"><?php echo $tintuc->TomTat ?></p>
        <p><?php echo $tintuc->NoiDung  ?></p>

        <hr>

        <!-- Blog Comments -->

        <!-- Comments Form -->
        <div class="well">
            <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
            <form role="form">
                <div class="form-group">
                    <textarea class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Gửi</button>
            </form>
        </div>

        <hr>

        <!-- Posted Comments -->

        <!-- Comment -->
        <?php
        foreach ($comment as $item) {
            ?>
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading"><?php $item->idUser?>
                        <small><?= $item->created_at ?></small>
                    </h4>
                    <?= $item->NoiDung ?>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-3">

        <div class="panel panel-default">
            <div class="panel-heading"><b>Tin liên quan</b></div>
            <div class="panel-body">

                <?php
                foreach ($tintuclienquan as $item) {
                    ?>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="<?php echo base_url('home/detail/').$item->TenKhongDau."/".$item->TieuDeKhongDau ?>">
                                <img class="img-responsive" src="<?php echo public_url('image/tintuc/').$item->Hinh?>" alt="">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <a href="<?php echo base_url('home/detail/').$item->TenKhongDau."/".$item->TieuDeKhongDau ?>"><b><?= $item->TieuDe ?></b></a>
                        </div>

                        <div class="break"></div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading"><b>Tin nổi bật</b></div>
            <div class="panel-body">
                <?php
                foreach ($tintucnoibat as $item) {
                    ?>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-5">
                            <a href="<?php echo base_url('home/detail/').$item->TenKhongDau."/".$item->TieuDeKhongDau ?>">
                                <img class="img-responsive" src="<?php echo public_url('image/tintuc/').$item->Hinh?>" alt="">
                            </a>
                        </div>
                        <div class="col-md-7">
                            <a href="<?php echo base_url('home/detail/').$item->TenKhongDau."/".$item->TieuDeKhongDau ?>"><b><?= $item->TieuDe ?></b></a>
                        </div>

                        <div class="break"></div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

    </div>

</div>