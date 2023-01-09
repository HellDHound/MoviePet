<!--//header-w3l-->

<!--/content-inner-section-->
<?if($data['18Marker']):?>
    <div class="tenor-gif-embed" data-postid="22113367" data-share-method="host" data-aspect-ratio="1" data-width="100%"><a href="https://tenor.com/view/rock-one-eyebrow-raised-rock-staring-the-rock-gif-22113367">Rock One Eyebrow Raised Rock Staring GIF</a>from <a href="https://tenor.com/search/rock+one+eyebrow+raised-gifs">Rock One Eyebrow Raised GIFs</a></div> <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
<?else:?>
    <div class="w3_content_agilleinfo_inner">
        <div class="agile_featured_movies">
            <!--/comedy-movies-->
            <h3 class="agile_w3_title hor-t"><?=mb_strtoupper($_GET['genreName'])?> </h3>
            <div class="wthree_agile-requested-movies tv-movies">
                <?foreach($data['filmsByGenre'] as $film):?>
                    <div class="col-md-2 w3l-movie-gride-agile requested-movies">
                        <a href="/genres/detailpage/?filmId=<?=$film['filmId']?>" class="hvr-sweep-to-bottom"><img src="<?=$film['previewUrl']?>" title="Movies Pro" class="img-responsive" alt=" " width="250" height="300">
                            <div class="w3l-action-icon"><i class="fa fa-play-circle-o" aria-hidden="true"></i></div>
                        </a>
                        <div class="mid-1 agileits_w3layouts_mid_1_home">
                            <div class="w3l-movie-text">
                                <h6><a href="/genres/detailpage/?filmId=<?=$film['filmId']?>"><?=mb_strimwidth($film['name'], 0, 20, "...")?></a></h6>
                            </div>
                            <div class="mid-2 agile_mid_2_home">
                                <p><?=$film['year']?></p>

                                <div class="block-stars">

                                    <ul class="w3l-ratings">
                                        <?$realRating = round($film['ratingKp']/2 != 0 ? $film['ratingKp']/2 : $film['ratingImdb']/2);
                                        $starCounter = 0;
                                        for($starCounter; $starCounter < $realRating;$starCounter++):?>
                                            <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
                                        <?endfor;?>
                                        <?if($starCounter<5):?>
                                            <?for($starCounter; $starCounter < 5;$starCounter++):?>
                                                <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
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
                <?endforeach;?>
                <div class="clearfix"></div>
            </div>
            <div class="blog-pagenat-wthree">
                <ul><?
                    $urlData = $_GET;
                    $urlData['page'] = $_GET['page'] -1;
                    if ($urlData['page']>0){
                       $prevPageUrl =  $_SERVER['REDIRECT_URL'] .'?'. http_build_query($urlData);
                    }
                    ?>
                    <?if ($prevPageUrl):?>
                        <li><a class="frist" href="<?=$prevPageUrl?>">Prev</a></li>
                    <?endif;?>
                    <?if ($data['pagesCount'] <= 10):?>
                        <?for ($pageNum = 1; $pageNum <= $data['pagesCount']; $pageNum++):?>
                            <?
                                $urlData = $_GET;
                                $urlData['page'] = $pageNum;
                            ?>
                            <li><a href="<?=$_SERVER['REDIRECT_URL'] .'?'. http_build_query($urlData)?>" id="<?= $_GET['page'] == $pageNum ? 'selected': ''?>"><?=$pageNum?></a></li>
                        <?endfor;?>
                        <?$urlData = $_GET;
                        $urlData['page'] = $_GET['page']+1;
                        if ($urlData['page']<=$data['pagesCount']){
                            $nextPageUrl =  $_SERVER['REDIRECT_URL'] .'?'. http_build_query($urlData);
                        }?>
                    <?else:?>
                        <?if ($_GET['page'] <= 7 && $_GET['page'] >= 1):?>
                            <?for ($pageNum = 1; $pageNum <= ($_GET['page'] < 5 ? 5 : $_GET['page']+1); $pageNum++):?>
                                <?
                                $urlData = $_GET;
                                $urlData['page'] = $pageNum;
                                ?>
                                <li><a href="<?=$_SERVER['REDIRECT_URL'] .'?'. http_build_query($urlData)?>" id="<?= $_GET['page'] == $pageNum ? 'selected': ''?>"><?=$pageNum?></a></li>
                            <?endfor;?>
                            <li><a>.   .   .</a></li>
                            <?for ($pageNum = $data['pagesCount']-5; $pageNum <= $data['pagesCount']; $pageNum++):?>
                                <?
                                $urlData = $_GET;
                                $urlData['page'] = $pageNum;
                                ?>
                                <li><a href="<?=$_SERVER['REDIRECT_URL'] .'?'. http_build_query($urlData)?>" id="<?= $_GET['page'] == $pageNum ? 'selected': ''?>"><?=$pageNum?></a></li>
                            <?endfor;?>
                        <?elseif($_GET['page'] <= $data['pagesCount'] && $_GET['page'] < $data['pagesCount']-6):?>
                            <?for ($pageNum = 1; $pageNum <= 3; $pageNum++):?>
                                <?
                                $urlData = $_GET;
                                $urlData['page'] = $pageNum;
                                ?>
                                <li><a href="<?=$_SERVER['REDIRECT_URL'] .'?'. http_build_query($urlData)?>" id="<?= $_GET['page'] == $pageNum ? 'selected': ''?>"><?=$pageNum?></a></li>
                            <?endfor;?>
                            <li><a>.   .   .</a></li>
                            <?for ($pageNum = $_GET['page']-1; $pageNum <= $_GET['page']+1; $pageNum++):?>
                                <?
                                $urlData = $_GET;
                                $urlData['page'] = $pageNum;
                                ?>
                                <li><a href="<?=$_SERVER['REDIRECT_URL'] .'?'. http_build_query($urlData)?>" id="<?= $_GET['page'] == $pageNum ? 'selected': ''?>"><?=$pageNum?></a></li>
                            <?endfor;?>
                            <li><a>.   .   .</a></li>
                            <?for ($pageNum = $data['pagesCount']-3; $pageNum < $data['pagesCount']; $pageNum++):?>
                                <?
                                $urlData = $_GET;
                                $urlData['page'] = $pageNum;
                                ?>
                                <li><a href="<?=$_SERVER['REDIRECT_URL'] .'?'. http_build_query($urlData)?>" id="<?= $_GET['page'] == $pageNum ? 'selected': ''?>"><?=$pageNum?></a></li>
                            <?endfor;?>
                        <?else:?>
                            <?for ($pageNum = 1; $pageNum <= 3; $pageNum++):?>
                                <?
                                $urlData = $_GET;
                                $urlData['page'] = $pageNum;
                                ?>
                                <li><a href="<?=$_SERVER['REDIRECT_URL'] .'?'. http_build_query($urlData)?>" id="<?= $_GET['page'] == $pageNum ? 'selected': ''?>"><?=$pageNum?></a></li>
                            <?endfor;?>
                            <li><a>.   .   .</a></li>
                            <?for ($pageNum = $_GET['page']-1; $pageNum <= $data['pagesCount']; $pageNum++):?>
                                <?
                                $urlData = $_GET;
                                $urlData['page'] = $pageNum;
                                ?>
                                <li><a href="<?=$_SERVER['REDIRECT_URL'] .'?'. http_build_query($urlData)?>" id="<?= $_GET['page'] == $pageNum ? 'selected': ''?>"><?=$pageNum?></a></li>
                            <?endfor;?>
                        <?endif;?>
                    <?endif;?>
                    <?$urlData = $_GET;
                    $urlData['page'] = $_GET['page']+1;
                    if ($urlData['page']<=$data['pagesCount']){
                        $nextPageUrl =  $_SERVER['REDIRECT_URL'] .'?'. http_build_query($urlData);
                    }?>
                    <?if ($nextPageUrl):?>
                        <li><a class="last" href="<?=$nextPageUrl?>">Next</a></li>
                    <?endif;?>
                </ul>
            </div>
        </div>
    </div>
<?endif;?>
<!--//content-inner-section-->
