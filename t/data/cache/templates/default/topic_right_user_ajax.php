<?php /* 2012-08-31 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); ?>
<?php if($code == 'hot_weiqun') { ?> <script type="text/javascript" src="templates/default/js/qun.js?build+20120829"></script> <?php } ?> <?php if($code == 'favorite_tag') { ?> <li id="add_ajax_favorite_tags"> <?php if(is_array($my_favorite_tags)) { foreach($my_favorite_tags as $val) { ?> <span id="favorite_<?php echo $val['tag']; ?>"> <a href="index.php?mod=tag&code=<?php echo $val['tag']; ?>" target="_blank"><?php echo $val['tag']; ?></a> </span> <?php } } ?> </li> <?php if($uid == MEMBER_ID) { ?> <span class="thread_add"> <a href="javascript:void(0);" onclick="getElementById('add_favorite_tags').style.display=(getElementById('add_favorite_tags').style.display=='none')?'':'none'">添加</a> </span> <div id="add_favorite_tags" style="display:none; width:186px; float:left; margin:3px 0;"> <p> <input type="text" name="tag_name" id="tag_name" class="sc_r_t_a" value="请添加想关注的话题" onfocus="this.value=''" onblur="this.value='请添加想关注的话题'"/> <input name="button" type="button" onclick="favoriteTag('tag_name','input_add')" value="保存" class="c_b1" /> </p> </div> <?php } ?> <?php } elseif($code == 'user_tag') { ?> <ul class="SC_biaoqian_box"> <li> <?php if($myuser_tag) { ?> <?php if(is_array($myuser_tag)) { foreach($myuser_tag as $val) { ?> <span class="sc_bq"><a href="index.php?mod=search&code=usertag&usertag=<?php echo $val['tag_name']; ?>"><?php echo $val['tag_name']; ?></a></span> <?php } } ?> </li> <?php } else { ?>  设置自己的标签，<a href="index.php?mod=user_tag" target="_blank">点此添加</a> <?php } ?> </ul><?php } elseif($code == 'to_user_tag') { ?><ul class="SC_biaoqian_box"> <li> <?php if($to_user_tag) { ?> <?php if(is_array($to_user_tag)) { foreach($to_user_tag as $val) { ?> <span class="sc_bq"><a href="index.php?mod=search&code=usertag&usertag=<?php echo $val['tag_name']; ?>"><?php echo $val['tag_name']; ?></a></span> <?php } } ?> </li> <?php } else { ?>  设置自己的标签，<a href="index.php?mod=user_tag" target="_blank">点此添加</a> <?php } ?> </ul><?php } elseif($code == 'leadmanager') { ?> <div id="interestUid"> <?php if($leadmanager_list) { ?> <ul class="followList" style="overflow:hidden"> <?php if(is_array($leadmanager_list)) { foreach($leadmanager_list as $val) { ?> <li class="pane" id="follow_user_<?php echo $val['uid']; ?>"> <div class="fBox_l"><img onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_right_user',<?php echo $val['uid']; ?>);" onmouseout="clear_user_choose();"/> </div> <div class="fBox_R "><span class="name"><a href="index.php?mod=<?php echo $val['username']; ?>" onmouseover="get_at_user_choose('<?php echo $val['nickname']; ?>',this)"><?php echo $val['nickname']; ?></a><?php echo $val['validate_html']; ?></span> <span id="follow_<?php echo $val['uid']; ?>"><?php echo $val['follow_html']; ?> </span> <span class="ff_1"><?php echo $val['here_name']; ?></span> </div> <div id="user_<?php echo $val['uid']; ?>_right_user" class="layS"></div> </li> <?php } } ?> </ul> <?php } ?> </div> <?php } elseif($code == 'department') { ?> <?php if($department_list) { ?> <div class="followList" style="overflow:hidden"> <?php echo $department_list; ?> </div> <?php } ?> <?php } elseif($code == 'refresh') { ?> <?php if(false!=($may_interest_user=Load::model('data_block')->may_interest_user())) { ?> <div id="interestUid"> <ul class="followList" style="overflow:hidden"> <?php if(is_array($may_interest_user)) { foreach($may_interest_user as $val) { ?> <li class="pane" id="follow_user_<?php echo $val['uid']; ?>"> <div class="fBox_l"><img onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_right_user',<?php echo $val['uid']; ?>);" onmouseout="clear_user_choose();"/> </div> <div class="fBox_R "> <span class="name"><a href="index.php?mod=<?php echo $val['username']; ?>" onmouseover="get_at_user_choose('<?php echo $val['nickname']; ?>',this)"><?php echo $val['nickname']; ?></a><?php echo $val['validate_html']; ?></span> <span id="follow_<?php echo $val['uid']; ?>"> <?php echo $val['follow_html']; ?> </span> <?php if($val['refresh_type'] == 'follow') { ?> <span class="ff_1">我 关注的<?php echo $val['count']; ?>人关注<?php echo $val['gender_ta']; ?></span> <?php } elseif($val['refresh_type'] == 'tag') { ?> <span class="ff_1">我和<?php echo $val['gender_ta']; ?>有<?php echo $val['count']; ?>个共同话题</span> <?php } elseif($val['refresh_type'] == 'user_tag') { ?> <span class="ff_1">我和<?php echo $val['gender_ta']; ?>有<?php echo $val['count']; ?>个共同标签</span> <?php } elseif($val['refresh_type'] == 'city') { ?> <span class="ff_1"><?php echo $val['gender_ta']; ?>和我同在一个城市</span> <?php } ?> </div> <div id="user_<?php echo $val['uid']; ?>_right_user" class="layS"></div> </li> <div id="alert_follower_menu_<?php echo $val['uid']; ?>"></div> <div id="Pmsend_to_user_area"></div> <div id="global_select_<?php echo $val['uid']; ?>" class="alertBox alertBox_2" style="display:none"></div> <div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);"></div> <?php } } ?> </ul> <p class="r_replace"><a href="javascript:viod(0);" onclick="right_show_ajax('<?php echo MEMBER_ID; ?>','refresh','refresh'); return false;">换一换</a></p> </div> <?php } ?> <?php } elseif($code == 'hot_tag') { ?> <?php if(is_array($hot_tag_recommend['list'])) { foreach($hot_tag_recommend['list'] as $val) { ?> <li> <a href="index.php?mod=tag&code=<?php echo $val['name']; ?>" target="_blank"><?php echo $val['name']; ?>(<?php echo $val['topic_count']; ?>)</a> <?php if($val['desc']) { ?> <div class="rught_tj_box"><span><?php echo $val['desc']; ?></span></div> <?php } ?> </li> <?php } } ?> <?php } elseif($code == 'to_user_info') { ?> <?php if($member['aboutme']) { ?> <li>&nbsp;<?php echo $member['aboutme']; ?></li> <?php } else { ?><li>这家伙很懒，什么也没有留下。</li> <?php } ?> <?php } elseif($code == 'to_user_event') { ?> <?php if($to_user_event) { ?> <?php if(is_array($to_user_event)) { foreach($to_user_event as $val) { ?> <li><a href="index.php?mod=event&code=detail&id=<?php echo $val['id']; ?>" title="点此查看活动详情" target="_blank"><?php echo $val['title']; ?></a></li> <?php } } ?> <?php } ?> <?php } ?> <?php if($code == 'recommend_user') { ?> <?php if(is_array($recommend_user_list)) { foreach($recommend_user_list as $val) { ?> <li> <a href="index.php?mod=<?php echo $val['username']; ?>" target="_blank"><img onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" class="manface" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user',<?php echo $val['uid']; ?>)" onmouseout="clear_user_choose()"/></a> <b><a href="index.php?mod=<?php echo $val['username']; ?>" target="_blank"><?php echo $val['nickname']; ?></a></b> <div id="user_<?php echo $val['uid']; ?>_user"></div> <div id="alert_follower_menu_<?php echo $val['uid']; ?>"></div> <div id="global_select_<?php echo $val['uid']; ?>" class="alertBox alertBox_2" style="display:none"></div> <div id="get_remark_<?php echo $val['uid']; ?>" ></div> <div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);"></div> <div id="Pmsend_to_user_area"></div> </li> <?php } } ?> <?php } ?> <?php if($new_vip_user_list) { ?> <?php if(is_array($new_vip_user_list)) { foreach($new_vip_user_list as $val) { ?> <li> <a href="index.php?mod=<?php echo $val['username']; ?>" target="_blank"> <img onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" class="manface" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user',<?php echo $val['uid']; ?>)" onmouseout="clear_user_choose()"/> </a> <b><a href="index.php?mod=<?php echo $val['username']; ?>" target="_blank"><?php echo $val['nickname']; ?></a></b> <div id="user_<?php echo $val['uid']; ?>_user"></div> <div id="alert_follower_menu_<?php echo $val['uid']; ?>"></div> <div id="global_select_<?php echo $val['uid']; ?>" class="alertBox alertBox_2" style="display:none"></div> <div id="get_remark_<?php echo $val['uid']; ?>" ></div> <div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);"></div> <div id="Pmsend_to_user_area"></div> </li> <?php } } ?> <?php } ?> <?php if($code == 'user_follow') { ?> <?php if(is_array($user_follow_list)) { foreach($user_follow_list as $val) { ?> <li> <img onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" class="manface" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_user',<?php echo $val['uid']; ?>)" onmouseout="clear_user_choose()"/> <a href="index.php?mod=<?php echo $val['username']; ?>"><b><?php echo $val['nickname']; ?></b></a> <b><?php echo $val['follow_html']; ?></b> </li> <div id="user_<?php echo $val['uid']; ?>_user"></div> <div id="alert_follower_menu_<?php echo $val['uid']; ?>"></div> <div id="global_select_<?php echo $val['uid']; ?>" class="alertBox alertBox_2" style="display:none"></div> <div id="get_remark_<?php echo $val['uid']; ?>" ></div> <div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);"></div> <div id="Pmsend_to_user_area"></div> <?php } } ?> <p class="m_m2"><a href="index.php?mod=<?php echo $member['username']; ?>&code=follow">更多&gt;&gt;</a></p> <?php } ?> <?php if($code == 'qun_category') { ?> <div id="cat_content_wp"> <?php if(is_array($top_cat_ary)) { foreach($top_cat_ary as $key => $top_cat) { ?> <div class="cat_block"> <div class="cat_block_h"> <a href="index.php?mod=qun&code=category&cat_id=<?php echo $top_cat['cat_id']; ?>"><?php echo $top_cat['cat_name']; ?></a> <span>(<?php echo $top_cat['qun_num']; ?>)</span> </div> </div> <?php } } ?> <div style="clear:both"></div> </div> <?php } ?> <?php if($code == 'my_follow_qun') { ?> <div id="interestUid"> <?php if($follow_qun_list) { ?> <ul class="followList" style="overflow:hidden"> <?php if(is_array($follow_qun_list)) { foreach($follow_qun_list as $val) { ?> <li class="pane" id="follow_user_<?php echo $val['uid']; ?>"> <div class="fBox_R "> <p><span class="name"><a href="index.php?mod=qun&qid=<?php echo $val['qid']; ?>"><?php echo $val['name']; ?></a></span> </p> <p><?php echo $val['member_num']; ?>人&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $val['thread_num']; ?>条微博</p> </div> </li> <?php } } ?> </ul> <?php } ?> </div> <?php } ?> <?php if($code == 'hot_weiqun') { ?> <div id="interestUid"> <?php if($hot_qun) { ?> <ul class="followList" style="overflow:hidden"> <?php if(is_array($hot_qun)) { foreach($hot_qun as $val) { ?> <li class="pane" id="follow_user_<?php echo $val['uid']; ?>"> <div class="fBox_l"><img onerror="javascript:faceError(this);" src="<?php echo $val['icon']; ?>"/> </div> <div class="fBox_R "> <p><span class="name"><a href="index.php?mod=qun&qid=<?php echo $val['qid']; ?>"><?php echo $val['name']; ?></a></span> </p> <p><?php echo $val['member_num']; ?>人&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $val['thread_num']; ?>条微博</p> <a class="wq_joinbtn" href="javascript:;" onclick="joinQun(<?php echo $val['qid']; ?>)"></a> </div> </li> <?php } } ?> </ul> <?php } ?> </div> <?php } ?> <?php if($code == 'city_qun') { ?> <div> <ul> <?php if(is_array($city_qun)) { foreach($city_qun as $val) { ?> <li> <p><a href="#"><?php echo $val['name']; ?></a><span title="成员">(<?php echo $val['member_num']; ?>)</span></p> </li> <?php } } ?> </ul> </div> <?php } ?> <?php if($code == 'hot_follow_tag') { ?> <div> <ul class="hot_follow"> <?php if(is_array($tag_guanzu)) { foreach($tag_guanzu as $val) { ?> <li style="width:100%;"> <a href="index.php?mod=tag&code=<?php echo $val['name']; ?>"><?php echo $val['name']; ?></a> <span><a href="javascript:viod(0);" onclick="favoriteTag('<?php echo $val['name']; ?>'); return false;" title="加关注">+</a></span> </li> <?php } } ?> </ul> </div> <?php } ?> <?php if(in_array($code,array('common_interest','at_me_user'))) { ?> <div id="interestUid"> <?php if($user_list) { ?> <ul class="followList" style="overflow:hidden"> <?php if(is_array($user_list)) { foreach($user_list as $val) { ?> <li class="pane" id="follow_user_<?php echo $val['uid']; ?>"> <div class="fBox_l"><img onerror="javascript:faceError(this);" src="<?php echo $val['face']; ?>" onmouseover="get_user_choose(<?php echo $val['uid']; ?>,'_right_user',<?php echo $val['uid']; ?>);" onmouseout="clear_user_choose();"/> </div> <div class="fBox_R "> <span class="name"><a href="index.php?mod=<?php echo $val['username']; ?>" onmouseover="get_at_user_choose('<?php echo $val['nickname']; ?>',this)"><?php echo $val['nickname']; ?></a></span> <span id="follow_<?php echo $val['uid']; ?>"> <?php echo $val['follow_html']; ?> </span> <span class="ff_1"> <?php if($val['at_count']) { ?>
@我<?php echo $val['at_count']; ?>次
<?php } elseif($val['common_count']) { ?>有<?php echo $val['common_count']; ?>个共同话题
<?php } elseif($val['c_count']) { ?>评论了<?php echo $val['c_count']; ?>次
<?php } elseif($val['mc_count']) { ?>评论了<?php echo $val['mc_count']; ?>次
<?php } elseif($val['m_count']) { ?>分享音乐<?php echo $val['m_count']; ?>次
<?php } ?> </span> </div> <div id="user_<?php echo $val['uid']; ?>_right_user" class="layS"></div> </li> <div id="alert_follower_menu_<?php echo $val['uid']; ?>"></div> <div id="Pmsend_to_user_area"></div> <div id="global_select_<?php echo $val['uid']; ?>" class="alertBox alertBox_2" style="display:none"></div> <div id="button_<?php echo $val['uid']; ?>" onclick="get_group_choose(<?php echo $val['uid']; ?>);"></div> <?php } } ?> </ul> <?php } ?> </div> <?php } ?> <?php if('photo' == $code) { ?> <div class="photo_right"> <?php if($photo_list['list']) { ?> <ul class="photo_right_ul"> <?php if(is_array($photo_list['list'])) { foreach($photo_list['list'] as $val) { ?> <li class="photo_right_li"> <a href="index.php?mod=topic&code=<?php echo $val['0']['tid']; ?>" target="_blank" title="<?php echo $val['0']['nickname']; ?>"><img src="<?php echo $val['0']['photo']; ?>"></a> </li> <?php } } ?> </ul> <?php } else { ?> <ul class="photo_right_ul"> <li>暂无相关内容</li> <li style="float:right"><a href="index.php?mod=topic&code=photo">点击查看更多</a></li> </ul> <?php } ?> </div> <?php } ?> <?php if('video_list' == $code) { ?> <?php if($video_list) { ?> <style type="text/css">
.feedUservideo {
float: left !important;
overflow: hidden;
position: relative;
width: 195px;
}
.feedUservideo .vP{margin: 32px 46px;
position: absolute;}
</style> <?php if(is_array($video_list)) { foreach($video_list as $val) { ?> <li> <div class="feedUservideo"> <a id="a<?php echo $val['id']; ?>" onClick="javascript:showFlash('<?php echo $val['video_hosts']; ?>', '<?php echo $val['video_link']; ?>', this, '<?php echo $val['id']; ?>','<?php echo $val['video_url']; ?>',1);" > <div id="play_<?php echo $val['id']; ?>" class="vP"><img src="images/feedvideoplay.gif"  /></div> <?php if($val['video_img']) { ?> <img src="<?php echo $val['video_img']; ?>" style="border:none" /> <?php } else { ?> <img src="images/feedvideoplay.gif"  /> <?php } ?> </a> </div> </li> <li style="float:left"><a href="index.php?mod=<?php echo $val['username']; ?>" target="_blank"><?php echo $val['nickname']; ?></a></li> <li style="float:right"><a href="index.php?mod=topic&code=<?php echo $val['tid']; ?>" target="_blank">查看原文</a></li> <div class="mBlog_linedot"></div> <?php } } ?> <?php } else { ?><li>暂无相关内容</li> <?php } ?> <?php } ?>