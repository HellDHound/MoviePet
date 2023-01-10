<!--/main-header-->
<!--/banner-section-->
<?
/*echo "<pre>";
print_r($data['filmsByRatingImdb']);
echo "</pre>";*/

?>
<!--//header-w3l-->

</div>
</div>
<!--/banner-section-->
<!--//main-header-->
<!--/content-inner-section-->
<div class="w3_content_agilleinfo_inner">
    <div class="agile_featured_movies">
        <!--/agileinfo_tabs-->
        <div class="agileinfo_tabs">
            <!--/tab-section-->
            <div id="horizontalTab">
                <ul class="resp-tabs-list">
                    <li>Новинки</li>
                    <li>Топ Рейтинга IMDB</li>
                    <li>Топ Рейтинга КиноПоиск</li>
                </ul>
                <div class="resp-tabs-container">
                    <div class="tab1">
                        <div class="tab_movies_agileinfo">
                            <div class="w3_agile_featured_movies">
                                <div class="col-md-5">
                                    <div class="video-grid-single-page-agileits">
                                        <a href="/genres/detailpage/?filmId=<?=$data['filmsByYear'][0]['filmId']?>"><div><img src="<?=$data['filmsByYear'][0]['posterUrl']?>" alt="" class="img-responsive" width="765" height="483"/> </div></a>
                                    </div>
                                    <div class="player-text">
                                        <a href="/genres/detailpage/?filmId=<?=$data['filmsByYear'][0]['filmId']?>"><p class="fexi_header"><?=$data['filmsByYear'][0]['name']?></p></a>
                                        <p class="fexi_header_para"><span class="conjuring_w3">Описание<label>:</label></span><?=mb_strimwidth($data['filmsByYear'][0]['description'], 0, 202, "...")?></p>
                                        <p class="fexi_header_para"><span>Выпущен<label>:</label></span><?=$data['filmsByYear'][0]['year']?></p>
                                        <p class="fexi_header_para">
                                            <span>Жанры<label>:</label> </span>
                                            <?foreach ($data['filmsByYear'][0]['genres'] as $genre):?>
                                                |<a href="/genres/genrepage/?genreName=<?=$genre?>&page=1"><?=$genre?></a>|
                                            <?endforeach;?>
                                        </p>
                                        <p class="fexi_header_para fexi_header_para1"><span>Star Rating<label>:</label></span>
                                            <?$realRating = round($data['filmsByYear'][0]['ratingKp']/2);
                                            $starCounter = 0;
                                            for($starCounter; $starCounter < $realRating;$starCounter++):?>
                                                <a><i class="fa fa-star" aria-hidden="true"></i></a>
                                            <?endfor;?>
                                            <?if($starCounter<5):?>
                                                <?for($starCounter; $starCounter < 5;$starCounter++):?>
                                                    <a><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                <?endfor;?>
                                            <?endif;?>
                                        <div id="container">
                                            <div class="heart-like-button <?=$data['filmsByYear'][0]['favorite'] ? 'liked': ''?>" id=<?=$data['filmsByYear'][0]['filmId']?>></div>
                                        </div>
                                        </p>
                                    </div>

                                </div>
                                <div class="col-md-7 wthree_agile-movies_list">
                                    <?for ($i = 1; $i <= 8; $i++):?>
                                        <div class="w3l-movie-gride-agile">
                                            <a href="/genres/detailpage/?filmId=<?=$data['filmsByYear'][$i]['filmId']?>" class="hvr-sweep-to-bottom"><img src="<?=$data['filmsByYear'][$i]['previewUrl']?>" title="Movies Pro" class="img-responsive" alt=" " width="250" height="300"></a>
                                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                                <div class="w3l-movie-text">
                                                    <h6><a href="/genres/detailpage/?filmId=<?=$data['filmsByYear'][$i]['filmId']?>"><?=mb_strimwidth($data['filmsByYear'][$i]['name'], 0, 15, "...")?></a></h6>
                                                </div>
                                                <div class="mid-2 agile_mid_2_home">
                                                    <p><?=$data['filmsByYear'][$i]['year']?></p>
                                                    <div class="block-stars">
                                                        <ul class="w3l-ratings">
                                                            <?$realRating = round($data['filmsByYear'][$i]['ratingKp']/2);
                                                            $starCounter = 0;
                                                            for($starCounter; $starCounter < $realRating;$starCounter++):?>
                                                                <li><a><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                            <?endfor;?>
                                                            <?if($starCounter<5):?>
                                                                <?for($starCounter; $starCounter < 5;$starCounter++):?>
                                                                    <li><a><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                                <?endfor;?>
                                                            <?endif;?>
                                                        </ul>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div id="container">
                                                        <div class="heart-like-button <?=$data['filmsByYear'][$i]['favorite'] ? 'liked': ''?>" id=<?=$data['filmsByYear'][$i]['filmId']?>></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ribben">
                                                <p>NEW</p>
                                            </div>
                                        </div>
                                    <?endfor;?>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="cleafix"></div>
                        </div>
                    </div>
                    <div class="tab2">
                        <div class="tab_movies_agileinfo">
                            <div class="w3_agile_featured_movies">
                                <div class="col-md-5">
                                    <div class="video-grid-single-page-agileits">
                                        <div> <img src="<?=$data['filmsByRatingImdb'][0]['posterUrl']?>" alt="" class="img-responsive" width="765" height="483"/> </div>
                                    </div>

                                    <div class="player-text">
                                        <a href="/genres/detailpage/?filmId=<?=$data['filmsByRatingImdb'][0]['filmId']?>"><p class="fexi_header"><?=$data['filmsByRatingImdb'][0]['name']?></p></a>
                                        <p class="fexi_header_para"><span class="conjuring_w3">Описание<label>:</label></span><?=mb_strimwidth($data['filmsByRatingImdb'][0]['description'], 0, 202, "...")?></p>
                                        <p class="fexi_header_para"><span>Выпущен<label>:</label></span><?=$data['filmsByRatingImdb'][0]['year']?></p>
                                        <p class="fexi_header_para">
                                            <span>Жанры<label>:</label> </span>
                                            <?foreach ($data['filmsByRatingImdb'][0]['genres'] as $genre):?>
                                                |<a href="/genres/genrepage/?genreName=<?=$genre?>&page=1"><?=$genre?></a>|
                                            <?endforeach;?>
                                        </p>
                                        <p class="fexi_header_para fexi_header_para1"><span>Star Rating<label>:</label></span>
                                            <?$realRating = round($data['filmsByRatingImdb'][0]['ratingImdb']/2);
                                            $starCounter = 0;
                                            for($starCounter; $starCounter < $realRating;$starCounter++):?>
                                                <a><i class="fa fa-star" aria-hidden="true"></i></a>
                                            <?endfor;?>
                                            <?if($starCounter<5):?>
                                                <?for($starCounter; $starCounter < 5;$starCounter++):?>
                                                    <a><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                <?endfor;?>
                                            <?endif;?>
                                        </p>
                                        <div id="container">
                                            <div class="heart-like-button <?=$data['filmsByRatingImdb'][0]['favorite'] ? 'liked': ''?>" id=<?=$data['filmsByRatingImdb'][0]['filmId']?>></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-7 wthree_agile-movies_list">
                                    <?for ($i = 1; $i <= 8; $i++):?>
                                        <div class="w3l-movie-gride-agile">
                                            <a href="/genres/detailpage/?filmId=<?=$data['filmsByRatingImdb'][$i]['filmId']?>" class="hvr-sweep-to-bottom"><img src="<?=$data['filmsByRatingImdb'][$i]['previewUrl']?>" title="Movies Pro" class="img-responsive" alt=" " width="250" height="300"></a>
                                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                                <div class="w3l-movie-text">
                                                    <h6><a href="/genres/detailpage/?filmId=<?=$data['filmsByRatingImdb'][$i]['filmId']?>"><?=mb_strimwidth($data['filmsByRatingImdb'][$i]['name'], 0, 15, "...")?></a></h6>
                                                </div>
                                                <div class="mid-2 agile_mid_2_home">
                                                    <p><?=$data['filmsByRatingImdb'][$i]['year']?></p>
                                                    <div class="block-stars">
                                                        <ul class="w3l-ratings">
                                                            <?$realRating = round($data['filmsByRatingImdb'][$i]['ratingImdb']/2);
                                                            $starCounter = 0;
                                                            for($starCounter; $starCounter < $realRating;$starCounter++):?>
                                                            <li><a><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                            <?endfor;?>
                                                            <?if($starCounter<5):?>
                                                                <?for($starCounter; $starCounter < 5;$starCounter++):?>
                                                                <li><a><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                                <?endfor;?>
                                                            <?endif;?>
                                                        </ul>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div id="container">
                                                        <div class="heart-like-button <?=$data['filmsByRatingImdb'][$i]['favorite'] ? 'liked': ''?>" id=<?=$data['filmsByRatingImdb'][$i]['filmId']?>></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ribben">
                                                <p>NEW</p>
                                            </div>
                                        </div>
                                    <?endfor;?>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="cleafix"></div>
                        </div>
                    </div>
                    <div class="tab3">
                        <div class="tab_movies_agileinfo">
                            <div class="w3_agile_featured_movies">
                                <div class="col-md-5">
                                    <div class="video-grid-single-page-agileits">
                                        <a href="/genres/detailpage/?filmId=<?=$data['filmsByRatingKp'][0]['filmId']?>"><div><img src="<?=$data['filmsByRatingKp'][0]['posterUrl']?>" alt="" class="img-responsive" width="765" height="483"/></div></a>
                                    </div>
                                    <div class="player-text">
                                        <a href="/genres/detailpage/?filmId=<?=$data['filmsByRatingKp'][0]['filmId']?>"><p class="fexi_header"><?=$data['filmsByRatingKp'][0]['name']?></p></a>
                                        <p class="fexi_header_para"><span class="conjuring_w3">Описание<label>:</label></span><?=mb_strimwidth($data['filmsByRatingKp'][0]['description'], 0, 202, "...")?></p>
                                        <p class="fexi_header_para"><span>Выпущен<label>:</label></span><?=$data['filmsByRatingKp'][0]['year']?></p>
                                        <p class="fexi_header_para">
                                            <span>Жанры<label>:</label> </span>
                                            <?foreach ($data['filmsByRatingKp'][0]['genres'] as $genre):?>
                                                |<a href="/genres/genrepage/?genreName=<?=$genre?>&page=1"><?=$genre?></a>|
                                            <?endforeach;?>
                                        </p>
                                        <p class="fexi_header_para fexi_header_para1"><span>Star Rating<label>:</label></span>
                                            <?$realRating = round($data['filmsByRatingKp'][0]['ratingKp']/2);
                                            $starCounter = 0;
                                            for($starCounter; $starCounter < $realRating;$starCounter++):?>
                                                <a><i class="fa fa-star" aria-hidden="true"></i></a>
                                            <?endfor;?>
                                            <?if($starCounter<5):?>
                                                <?for($starCounter; $starCounter < 5;$starCounter++):?>
                                                    <a><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                <?endfor;?>
                                            <?endif;?>
                                        </p>
                                        <div id="container">
                                            <div class="heart-like-button <?=$data['filmsByRatingKp'][0]['favorite'] ? 'liked': ''?>" id=<?=$data['filmsByRatingKp'][0]['filmId']?>></div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-7 wthree_agile-movies_list">
                                    <?for ($i = 1; $i <= 8; $i++):?>
                                        <div class="w3l-movie-gride-agile">
                                            <a href="/genres/detailpage/?filmId=<?=$data['filmsByRatingKp'][$i]['filmId']?>" class="hvr-sweep-to-bottom"><img src="<?=$data['filmsByRatingKp'][$i]['previewUrl']?>" title="Movies Pro" class="img-responsive" alt=" " width="250" height="300"></a>
                                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                                <div class="w3l-movie-text">
                                                    <h6><a href="/genres/detailpage/?filmId=<?=$data['filmsByRatingKp'][$i]['filmId']?>"><?=mb_strimwidth($data['filmsByRatingKp'][$i]['name'], 0, 15, "...")?></a></h6>
                                                </div>
                                                <div class="mid-2 agile_mid_2_home">
                                                    <p><?=$data['filmsByRatingKp'][$i]['year']?></p>
                                                    <div class="block-stars">
                                                        <ul class="w3l-ratings">
                                                            <?$realRating = round($data['filmsByRatingKp'][$i]['ratingKp']/2);
                                                            $starCounter = 0;
                                                            for($starCounter; $starCounter < $realRating;$starCounter++):?>
                                                                <li><a><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                            <?endfor;?>
                                                            <?if($starCounter<5):?>
                                                                <?for($starCounter; $starCounter < 5;$starCounter++):?>
                                                                    <li><a><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                                <?endfor;?>
                                                            <?endif;?>
                                                        </ul>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div id="container">
                                                        <div class="heart-like-button <?=$data['filmsByRatingKp'][$i]['favorite'] ? 'liked': ''?>" id=<?=$data['filmsByRatingKp'][$i]['filmId']?>></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ribben">
                                                <p>NEW</p>
                                            </div>
                                        </div>
                                    <?endfor;?>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="cleafix"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--//tab-section-->
        <h3 class="agile_w3_title"> Новинки</span></h3>
        <!--/movies-->
        <div class="w3_agile_latest_movies">

            <div id="owl-demo" class="owl-carousel owl-theme">
                <?foreach($data['filmsByYear'] as $film):?>
                    <div class="item">
                        <div class="w3l-movie-gride-agile w3l-movie-gride-slider ">
                            <a href="/genres/detailpage/?filmId=<?=$film['filmId']?>" class="hvr-sweep-to-bottom"><img src="<?=$film['previewUrl']?>" title="Movies Pro" class="img-responsive" alt=" " width="310" height="440"/></a>
                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                <div class="w3l-movie-text">
                                    <h6><a href="/genres/detailpage/?filmId=<?=$film['filmId']?>"><?=mb_strimwidth($film['name'], 0, 20, "...")?>	</a></h6>
                                </div>
                                <div class="mid-2 agile_mid_2_home">
                                    <p><?=$film['year']?></p>
                                    <div class="block-stars">
                                        <ul class="w3l-ratings">
                                            <?$realRating = round($film['ratingKp']/2);
                                            $starCounter = 0;
                                            for($starCounter; $starCounter < $realRating;$starCounter++):?>
                                                <li><a><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                            <?endfor;?>
                                            <?if($starCounter<5):?>
                                                <?for($starCounter; $starCounter < 5;$starCounter++):?>
                                                    <li><a><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                <?endfor;?>
                                            <?endif;?>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div id="container">
                                        <div class="heart-like-button <?=$film['favorite'] ? 'liked': ''?>" id=<?=$film['filmId']?>></div>
                                    </div>
                                </div>
                            </div>
                            <div class="ribben one">
                                <p>NEW</p>
                            </div>
                        </div>
                    </div>
                <?endforeach;?>
            </div>
        </div>
        <!--//movies-->
        <h3 class="agile_w3_title">Топ рейтингка КиноПоиск</span> </h3>
        <!--/requested-movies-->
        <div class="wthree_agile-requested-movies">
            <?for ($i = 0; $i < 10; $i++):?>
                <div class="col-md-2 w3l-movie-gride-agile requested-movies">
                    <a href="/genres/detailpage/?filmId=<?=$data['filmsByRatingKp'][$i]['filmId']?>" class="hvr-sweep-to-bottom"><img src="<?=$data['filmsByRatingKp'][$i]['previewUrl']?>" title="Movies Pro" class="img-responsive" alt=" " width="310" height="440"></a>
                    <div class="mid-1 agileits_w3layouts_mid_1_home">
                        <div class="w3l-movie-text">
                            <h6><a href="/genres/detailpage/?filmId=<?=$data['filmsByRatingKp'][$i]['filmId']?>"><?=mb_strimwidth($data['filmsByRatingKp'][$i]['name'], 0, 20, "...")?></a></h6>
                        </div>
                        <div class="mid-2 agile_mid_2_home">
                            <p><?=$data['filmsByRatingKp'][$i]['year']?></p>
                            <div class="block-stars">
                                <ul class="w3l-ratings">
                                    <?$realRating = round($data['filmsByRatingKp'][$i]['ratingKp']/2);
                                    $starCounter = 0;
                                    for($starCounter; $starCounter < $realRating;$starCounter++):?>
                                        <li><a><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                    <?endfor;?>
                                    <?if($starCounter<5):?>
                                        <?for($starCounter; $starCounter < 5;$starCounter++):?>
                                            <li><a><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                        <?endfor;?>
                                    <?endif;?>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                            <div id="container">
                                <div class="heart-like-button <?=$data['filmsByRatingKp'][$i]['favorite'] ? 'liked': ''?>" id=<?=$data['filmsByRatingKp'][$i]['filmId']?>></div>
                            </div>
                        </div>
                    </div>
                    <div class="ribben one">
                        <p>NEW</p>
                    </div>
                </div>
            <?endfor;?>
            <div class="clearfix"></div>
        </div>
        <!--//requested-movies-->
        <!--/top-movies-->
        <h3 class="agile_w3_title">Топ рейтинга IMDB</span> </h3>
        <div class="top_movies">
            <div class="tab_movies_agileinfo">
                <div class="w3_agile_featured_movies two">
                    <div class="col-md-7 wthree_agile-movies_list second-top">
                        <?for ($i = 1; $i <= 8; $i++):?>
                            <div class="w3l-movie-gride-agile">
                                <a href="/genres/detailpage/?filmId=<?=$data['filmsByRatingImdb'][$i]['filmId']?>" class="hvr-sweep-to-bottom"><img src="<?=$data['filmsByRatingImdb'][$i]['previewUrl']?>" title="Movies Pro" class="img-responsive" alt=" " width="250" height="300"></a>
                                <div class="mid-1 agileits_w3layouts_mid_1_home">
                                    <div class="w3l-movie-text">
                                        <h6><a href="/genres/detailpage/?filmId=<?=$data['filmsByRatingImdb'][$i]['filmId']?>"><?=mb_strimwidth($data['filmsByRatingImdb'][$i]['name'], 0, 15, "...")?></a></h6>
                                    </div>
                                    <div class="mid-2 agile_mid_2_home">
                                        <p><?=$data['filmsByRatingImdb'][$i]['year']?></p>
                                        <div class="block-stars">
                                            <ul class="w3l-ratings">
                                                <?$realRating = round($data['filmsByRatingImdb'][$i]['ratingImdb']/2);
                                                $starCounter = 0;
                                                for($starCounter; $starCounter < $realRating;$starCounter++):?>
                                                    <li><a><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                                <?endfor;?>
                                                <?if($starCounter<5):?>
                                                    <?for($starCounter; $starCounter < 5;$starCounter++):?>
                                                        <li><a><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
                                                    <?endfor;?>
                                                <?endif;?>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div id="container">
                                            <div class="heart-like-button <?=$data['filmsByRatingImdb'][$i]['favorite'] ? 'liked': ''?>" id=<?=$data['filmsByRatingImdb'][$i]['filmId']?>></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ribben">
                                    <p>NEW</p>
                                </div>
                            </div>
                        <?endfor;?>
                    </div>
                    <div class="col-md-5 second-top">
                        <div class="video-grid-single-page-agileits">
                            <a href="/genres/detailpage/?filmId=<?=$data['filmsByRatingImdb'][0]['filmId']?>"><div> <img src="<?=$data['filmsByRatingImdb'][0]['posterUrl']?>" alt="" class="img-responsive" width="765" height="483"/> </div></a>
                        </div>

                        <div class="player-text two">
                            <a href="/genres/detailpage/?filmId=<?=$data['filmsByRatingImdb'][0]['filmId']?>"><p class="fexi_header"><?=$data['filmsByRatingImdb'][0]['name']?> </p></a>
                            <p class="fexi_header_para"><span class="conjuring_w3">Описание<label>:</label></span><?=mb_strimwidth($data['filmsByRatingImdb'][0]['description'], 0, 202, "...")?></p>

                            <p class="fexi_header_para">
                                <span>Жанры<label>:</label> </span>
                                <?foreach ($data['filmsByRatingImdb'][0]['genres'] as $genre):?>
                                    |<a href="/genres/genrepage/?genreName=<?=$genre?>&page=1"><?=$genre?></a>|
                                <?endforeach;?>
                            </p>
                            <p class="fexi_header_para fexi_header_para1"><span>Star Rating<label>:</label></span>
                                <?$realRating = round($data['filmsByRatingImdb'][0]['ratingImdb']/2);
                                $starCounter = 0;
                                for($starCounter; $starCounter < $realRating;$starCounter++):?>
                                    <a><i class="fa fa-star" aria-hidden="true"></i></a>
                                <?endfor;?>
                                <?if($starCounter<5):?>
                                    <?for($starCounter; $starCounter < 5;$starCounter++):?>
                                        <a><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                    <?endfor;?>
                                <?endif;?>
                            </p>
                            <div id="container">
                                <div class="heart-like-button <?=$data['filmsByRatingImdb'][0]['favorite'] ? 'liked': ''?>" id=<?=$data['filmsByRatingImdb'][0]['filmId']?>></div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="cleafix"></div>
            </div>
        </div>

        <!--//top-movies-->
    </div>
</div>
<!--//content-inner-section-->
