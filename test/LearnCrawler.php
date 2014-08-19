<?php
/**
 * Created by PhpStorm.
 * User: macbook
 * Date: 14-6-13
 * Time: 下午3:17
 */

    include_once('simple_html_dom.php');

    $domain = "http://epg.tvsou.com";
    $target_url = "http://epg.tvsou.com/programys/TV_1/Channel_1/W4.html";
    $html = new simple_html_dom();
    $html->load_file($target_url);

    //查找channel
    $channels = array();
    $channels['CCTV-1'] = $target_url;
    foreach ($html->find('div[class=listmenu2] a') as $post)
    {
        $channels[$post->innertext] = $domain.$post->href;

    }
    echo($channels);








