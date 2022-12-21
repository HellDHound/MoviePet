<!--/content-inner-section-->
<div class="w3_content_agilleinfo_inner">
    <div class="agile_featured_movies">
        <div class="inner-agile-w3l-part-head">
            <h1 class="w3l-inner-h-title"><?=$data['filmData']['name']?> | <?=$data['filmData']['year']?></h1>
        </div>
        <div class="latest-news-agile-info">
            <div class="col-md-8 latest-news-agile-left-content" >
                <div class="single video_agile_player">
                    <div class="video-grid-single-page-agileits">
                        <div > <img src="<?=$data['filmData']['posterUrl']?> " alt="" class="img-responsive" /> </div>
                    </div>
                </div>
                <div class="admin-text">
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="col-md-4 latest-news-agile-right-content">
                <h4 class="side-t-w3l-agile">Описание</h4>
                <div class="side-bar-form">
                    <p><?=$data['filmData']['description']?></p>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

    </div>
</div>
<!--//content-inner-section-->