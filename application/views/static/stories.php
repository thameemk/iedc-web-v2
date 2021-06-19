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

                    <?php foreach(array_reverse($getStories) as $row) { ?>
                    <div class="grid-item">
                        <a class="image-hover-zoom" href="<?=base_url()?>assets/uploads/images/stories/<?=$row['img']?>"
                            data-lightbox="gallery-image"><img
                                src="<?=base_url()?>assets/uploads/images/stories/<?=$row['img']?>"
                                alt="<?=$row['img']?>"></a>
                        <h4 align="center"><strong><?=$row['title']?></strong></h4>
                    </div>
                    <?php } ?>
                </div>
                <!-- end gallery -->
            </div>
            <!-- end stories -->
            <!-- Sidebar-->
            <div class="sidebar col-lg-3">
                <!-- Twitter widget -->
                <div class="widget widget-tweeter" data-username="iedctkmce" data-limit="3">
                    <h4 class="widget-title">Recent Tweets</h4>
                </div>
                <!-- end: Twitter widget-->
                <!-- Instagram widget -->
                <div class="widget widget-instagram" data-token="EAAOI7UqodgwBAPrN8ZCokByd42BE3DBTACUZBsVFeKNYRnkDSdcqCCFtK4p6TJO8X78OFudWuSO7PcIeIGaa0CEt2FjgHdUdZAuemuACZCOxZB3e7Ob5PjsFD8xn5kmvZB4uykve86kfzl17tnuBnvIYT7xz8yujUTCo3BhyCxFaAQ06zk6b9sLcqpleGWgc8EXWXcR6snOrf2ziE7L2jm"
                    data-limit="12" data-col="3">
                    <h4 class="widget-title">Instagram Feeds</h4>
                </div>
                <!-- end: Instagram widget-->
            </div>


        </div>
    </div>
</section>