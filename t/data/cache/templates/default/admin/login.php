<?php /* 2012-08-31 in jishigou invalid request template */ if(!defined("IN_JISHIGOU")) exit("invalid request"); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <html xmlns="http://www.w3.org/1999/xhtml"> <head> <?php $conf_charset=$this->Config['charset']; ?> <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $conf_charset; ?>" /> <title>登录系统</title> <style type="text/css"> 
body{padding:0;margin:0px;font-size:12px;color:#333;font-family:Verdana; background:#fbfbfb;}
select{margin-left:1.5em;vertical-align:middle;border:1px solid #b4cceb;height:22px;font-size:12px;}
#main{width:600px;margin:auto;}
*{padding:0;margin:0}
input{font-size:12px;font-family:Verdana;}
#wrap{height:100px;}
#wrapc{height:315px; border:#ededed 10px solid; background:#f0f0f0;}
#logo{background:url(./templates/default/admin/images/logo.gif) center top no-repeat;height:64px;width:210px;}
.logo{padding:40px 0 0 175px;}
.login{margin:0 0 0 30px;padding-top:10px;}
.login th{height:33px;line-height:33px;list-style:none;text-align:right;font-weight:normal;width:200px;font-size:14px;}
.login td{text-align:left;font-size:12px;}
.input{font-size:12px;vertical-align:middle;height:17px;margin-top:2px;border:1px solid #fff;color:#666;}
.logo-icon{border: 1px solid; border-color:#CECECF;float:left;margin:5px 10px;background:#fff;padding:5px;}
.logo-icon div{background:#fff url(./templates/default/admin/images/login/login-icon.gif);width:18px;float:left;margin-top:3px;margin-left:.5em;}
.logo-icon .pw{background-position:1px 1px;width:18px;height:20px;}
.logo-icon .pwpd{background-position:0 -49px;width:18px;height:20px;}
.logo-icon .yan{background-position:0 -99px;width:18px;height:20px;}
.logo-icon .daan{background-position:1px -148px;width:18px;height:20px;}
.logo-icon .pw2{width:9em;}
.logo-icon .pwpd2{width:9em;}
.logo-icon .yan2{width:6em;}
.getpwd{ line-height:55px; padding-left:5px;}
.getpwd a{ color:#666;}
.bottom{
padding:0 20px;
color: #fff;
background:#779E00;
height:35px;
line-height:35px;
cursor:pointer;
margin:10px 8px 0 10px;
border-radius:5px;
border:none;
font-size:14px;
font-weight:600;
}
.button:hover{background:#9ec000;}
</style> </head> <body> <div id="main"> <div id="wrap">&nbsp;</div> <div id="wrapc"> <div class="logo"> <div id="logo"></div> </div> <div class="login"> <form method="post"  name="login" action="<?php echo $action; ?>"> <input type="hidden" name="FORMHASH" value='<?php echo FORMHASH; ?>'/> <table cellpadding="0" cellspacing="0" width="100%"> <tr> <th>管理员昵称</th> <td><div class="logo-icon"> <div class="pw"></div> <?php if(MEMBER_ID > 0) { ?> <input type="hidden" name="uid" value="<?php echo MEMBER_ID; ?>" /> <input class="input pw2" id="username" name="username" value="<?php echo MEMBER_NICKNAME; ?>" type="text" /> <?php } else { ?> <input class="input pw2" id="username" name="username" value="" type="text" /> <?php } ?> </div></td> </tr> <tr> <th>管理员密码</th> <td><div class="logo-icon"> <div class="pwpd"></div> <input class="input pwpd2" type="password" name="password" /> </div> </td> </tr> <tr> <th>&nbsp;</th> <td><input name="submit" class="bottom" value="登录" type="submit" /><span class="getpwd"><a onclick="if(document.getElementById('username').value.length > 0) {window.location.href='index.php?mod=get_password';} else {alert('请输入昵称');}" href="#">忘记密码？</a></span> </td> </tr> </table> </form> </div> </div> </div> </body> </html>