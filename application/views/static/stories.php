<section id="page-title" class="dark" style="background:url(<?=base_url()?>assets/front/images/banner/pattern10.png)">
    <div class="container">
        <div class="page-title">
            <h1>STORIES</h1>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="#">Home</a>
                </li>
                <li><a href="#">Pages</a>
                </li>
                <li class="active"><a href="#">Stories</a>
                </li>
            </ul>
        </div>
    </div>
</section>

<section id="page-content" class="sidebar-right">
    <div class="container">
        <div class="row">
            <!-- stories -->
            <div class="content col-lg-9">
                <!-- Gallery -->
                <div class="grid-layout grid-3-columns" data-margin="20" data-item="grid-item" data-lightbox="gallery">

                    <?php foreach($getStories as $row) { ?>
                    <div class="grid-item">
                        <a class="image-hover-zoom" href="<?=base_url()?>assets/uploads/images/stories/<?=$row['img']?>"
                            data-lightbox="gallery-image"><img
                                src="<?=base_url()?>assets/uploads/images/stories/<?=$row['img']?>"
                                alt="<?=$row['img']?>"></a>
                    </div>
                    <?php } ?>
                </div>
                <!-- end gallery -->
            </div>
            <!-- end stories -->


        </div>
    </div>
</section>