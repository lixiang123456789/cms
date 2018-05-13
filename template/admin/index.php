<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo get('sitename');?> - 后台管理中心</title>
    <link href="{$skin_path}/css/bootstrap.min.css" rel="stylesheet">
	<link href="{$skin_path}/css/admin.css" rel="stylesheet" type="text/css" />
	<script src="{$skin_path}/js/jquery-1.11.2.min.js"></script>
	<script src="{$base_url}/js/jquery-browser.js"></script>
  </head>
<body>
    
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
	  <div class="row">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar" aria-expanded="false" aria-controls="sidebar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="logo col-sm-3 col-md-2" href="{$base_url}/index.php?admin_dir={get('admin_dir')}&site=default"><img src="{$skin_path}/images/logo.png" alt="logo" /></a>
		  <div id="sideNav" href=""><i class="glyphicon glyphicon-th-list"></i></div>
        </div>
        <div id="navbar" class="navbar-collapse collapse col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 pull-right">
           <ul class="nav navbar-top-links navbar-right"> 
			<li><a href="{$base_url}/"  target="_blank">预览</a></li>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">静态
				<span class="caret"></span></a>
				<ul class="dropdown-menu tasks">
					<li><a href="{$base_url}/index.php?case=cache&act=make_show&admin_dir={get('admin_dir')}&site=default">电脑版静态</a></li>
					<li><a href="{$base_url}/index.php?case=wapcache&act=make_show&admin_dir={get('admin_dir')}&site=default">手机版静态</a></li>
				</ul>
			</li>

			<li><a href="{$base_url}/index.php?case=table&act=add&table=archive&admin_dir={get('admin_dir')}">添加</a>
			<li><a href="{url::create('config/remove')}" class="on">缓存</a></li>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-bell"></i>
				<span class="caret"></span></a>
				<ul id="information" class="dropdown-menu envelope">    
				</ul>
			</li>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-tasks"></i>
				<span class="caret"></span></a>
				<ul class="dropdown-menu tasks">
					<li><a href="http://www.cmseasy.cn/" target="_blank">软件官网</a></li>
					<li><a href="http://www.cmseasy.cn/service/" target="_blank">购买授权</a></li>
					<li><a href="http://www.cmseasy.org/" target="_blank">问题交流</a></li>
					<li><a href="http://www.cmseasy.cn/chm/quick/" target="_blank">快速入门</a></li>
					<li><a href="http://www.cmseasy.cn/chm/" target="_blank">在线教程？</a></li>
				</ul>
			</li>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-globe"></i>
				<span class="caret"></span></a>
				<ul class="dropdown-menu tasks">
				{loop getwebsite() $d}
					<li><a href="{$d[addr]}">{$d[name]}</a></li>
				{/loop}
				</ul>
			</li>
			<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> {$user.username}<span class="caret"></span></a>
				<ul class="dropdown-menu user">
					<li><a href="{$base_url}/index.php?case=table&act=list&table=user&admin_dir={config::get('admin_dir')}&site=default"><i class="fa fa-user fa-fw"></i> 编辑资料</a></li>
					<li><a href="{$base_url}/index.php?case=index&act=logout&admin_dir={config::get('admin_dir')}"><i class="fa fa-sign-out fa-fw"></i> 退出</a></li>
				</ul>
			</li>
		</ul>
      </div>
    </div>
	</div>
  </nav>

    <div class="container-fluid">
      <div class="row">
  <!-- 左侧 -->
    <div id="sidebar" class="sidebar navbar-side">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<ul class="nav" id="main-menu">
				<li>
					<a class="active-menu waves-effect waves-dark" href="#">
						<span class="glyphicon glyphicon-cog"></span> 
				    网站设置 
					</a>
	                <ul class="nav nav_0 nav-second-level">
						<li>
							<a href="{$base_url}/index.php?case=config&act=system&set=site&admin_dir=admin&site=default">
							网站配置
							</a>
						</li>
		                <li>
			                <a href="{$base_url}/index.php?case=config&act=system&set=image&admin_dir=admin&site=default">水印设置
			                </a>
		                </li>
		                <li>
			                <a href="{$base_url}/index.php?case=config&act=system&set=upload&admin_dir=admin&site=default">
			                附件设置
			                </a>
		                </li>
		                <li>
		                <a href="{$base_url}/index.php?case=config&act=system&set=ditu&admin_dir=admin&site=default">
		                地图设置
		                </a>
		                </li>

		               	<li>
			               	<a href="{$base_url}/index.php?case=config&act=system&set=security&admin_dir=admin&site=default">
			               	字符过滤
			               	</a>
		               	</li>
		                <li>
		                <a href="{$base_url}/index.php?case=config&act=system&set=mail&admin_dir=admin&site=default">
		                邮件发送
		                </a>
		                </li>
		                <li>
		                <a href="{$base_url}/index.php?case=config&act=hottag&admin_dir=admin&site=default">热门标签
		                </a>
		                </li>
		                <li>
		                <a href="{$base_url}/index.php?case=language&act=edit&admin_dir=admin&site=default">语言包编辑
		                </a>
		                </li>
		                <li>
		                <a href="{$base_url}/index.php?case=config&act=system&set=sms&admin_dir=admin&site=default">
		                短信设置
		                </a>
		                </li>
		                
		                <li>
		                <a href="{$base_url}/index.php?case=website&act=listwebsite&admin_dir=admin&site=default">站点列表
		                </a>
		                </li>
		            </ul>
	            </li>
	            <li>
					<a class="active-menu waves-effect waves-dark" href="#">
						<span class="glyphicon glyphicon-cog"></span> 
					用户管理 
					</a>
	                <ul class="nav nav_11 nav-second-level">
						<li>
		                    <a href="{$base_url}/index.php?case=table&act=list&table=user&admin_dir=admin&site=default">
		                    用户管理
		                    </a>
		                </li>
		                <li>
		                    <a href="{$base_url}/index.php?case=table&act=list&table=usergroup&admin_dir=admin&site=default">
		                    用户组管理
		                    </a>
		                </li>
		                <li>
		                    <a href="{$base_url}/index.php?case=ologin&act=list&table=ologin&admin_dir=admin&site=default">
		                    登录扩展
		                    </a>
		                </li>
		                <li>
		                    <a href="{$base_url}/index.php?case=invite&act=list&admin_dir=admin&site=default">邀请码
		                    </a>
		                </li>
		            </ul>
	            </li>
	            <li>
					<a class="active-menu waves-effect waves-dark" href="#">
						<span class="glyphicon glyphicon-th-list"></span> 
					网站首页 
					</a>
	                <ul class="nav nav_11 nav-second-level">
						<li>
				        	<a href="{$base_url}/index.php?case=config&act=system&set=slide&admin_dir=admin&site=default">幻灯片
				        	</a>
				        </li>
				        <li>
				            <a href="{$base_url}/index.php?case=table&act=list&table=announcement&admin_dir=admin&site=default">
				            公告发布
				            </a>
			            </li>
		            </ul>
	            </li>
				<li>
					<a class="active-menu waves-effect waves-dark" href="#">
						<span class="glyphicon glyphicon-th-list"></span> 
 					关于我们
 					</a>
                    <ul class="nav nav_1 nav-second-level">
                        <li>
				           <a href="{$base_url}/index.php?case=table&act=list&table=archive&admin_dir=admin&site=default">
	                        内容管理
	                        </a>
			            </li>
                    </ul>
                </li>
				<li>
					<a class="active-menu waves-effect waves-dark" href="#">
						<span class="glyphicon glyphicon-th-list"></span> 
					企业新闻
					</a>
		            <ul class="nav nav_2 nav-second-level">
		                <li>
				           <a href="{$base_url}/index.php?case=table&act=list&table=archive&admin_dir=admin&site=default">
	                        内容管理
	                        </a>
			            </li>
		            </ul>
	            </li>
				<li>
					<a class="active-menu waves-effect waves-dark" href="#">
						<span class="glyphicon glyphicon-th-list"></span> 
					产品中心
					</a>
		            <ul class="nav nav_3 nav-second-level">
		                <li>
				           <a href="{$base_url}/index.php?case=table&act=list&table=archive&admin_dir=admin&site=default">
	                        内容管理
	                        </a>
			            </li>
		            </ul>
		       	</li>
			    <li>
					<a class="active-menu waves-effect waves-dark" href="#">
						<span class="glyphicon glyphicon-th-list"></span> 
					联系我们
					</a>
			        <ul class="nav nav_8 nav-second-level">
			            <li>
				           <a href="{$base_url}/index.php?case=table&act=list&table=archive&admin_dir=admin&site=default">
	                        内容管理
	                        </a>
			            </li>
			        </ul>
		    	</li>
		    	<li>
					<a class="active-menu waves-effect waves-dark" href="#">
						<span class="glyphicon glyphicon-th-list"></span> 
					案例展示
					</a>
			        <ul class="nav nav_9 nav-second-level">
			            <li>
				            <a href="{$base_url}/index.php?case=table&act=list&table=archive&admin_dir=admin&site=default">
	                        内容管理
	                        </a>
			            </li>
			        </ul>
		    	</li>

		    	<li>
					<a class="active-menu waves-effect waves-dark" href="#">
						<span class="glyphicon glyphicon-cog"></span> 
					其他
					</a>
			        <ul class="nav nav_10 nav-second-level">
			            <li>
			                <a href="{$base_url}/index.php?case=table&act=list&table=orders&admin_dir=admin&site=default">
			                订单列表
			                </a>
		                </li>
		                <li>
			                <a href="{$base_url}/index.php?case=pay&act=list&table=pay&admin_dir=admin&site=default">支付配置
			                </a>
		                </li>
		                <li>
			                <a href="{$base_url}/index.php?case=logistics&act=list&table=logistics&admin_dir=admin&site=default">
			                配货配置
			                </a>
		                </li>
                        <li>
				            <a href="{$base_url}/index.php?case=weixin&act=list&admin_dir=admin&site=default">公众号管理
				            </a>
			            </li>
			            <li>
				            <a href="{$base_url}/index.php?case=stats&act=list&table=stats&admin_dir=admin&site=default">
				            蜘蛛统计
				            </a>
			            </li>
			            <li>
				            <a href="{$base_url}/index.php?case=table&act=list&table=linkword&admin_dir=admin&site=default">
				            内链管理
				            </a>
			            </li>
			            <li>
				            <a href="{$base_url}/index.php?case=table&act=list&table=friendlink&admin_dir=admin&site=default">
				            友链管理
				            </a>
			            </li>
			            <li>
				            <a href="{$base_url}/index.php?case=table&act=send&table=user&admin_dir=admin&site=default">发送邮件
				            </a>
			            </li>
			            <li>
					        <a href="{$base_url}/index.php?case=config&act=system&set=template&admin_dir=admin&site=default">选择模板
					        </a>
				        </li>
				        <li>
					        <a href="{$base_url}/index.php?case=template&act=note&admin_dir=admin&site=default">模板结构标注
					        </a>
				        </li>
				        <li>
					        <a href="{$base_url}/index.php?case=template&act=edit&admin_dir=admin&site=default">查看模板源码
					        </a>
				        </li>
				        <li>
					        <a href="{$base_url}/index.php?case=template&act=downlist&admin_dir=admin&site=default">更多模板
					        </a>
				        </li>
				       
				        <li>
					        <a href="{$base_url}/index.php?case=table&act=list&table=templatetag&tagfrom=content&admin_dir=admin&site=default">
					        内容标签
					        </a>
				        </li>
				        <li>
					        <a href="{$base_url}/index.php?case=table&act=list&table=templatetag&tagfrom=category&admin_dir=admin&site=default">
					        栏目标签
					        </a>
				        </li>
				        <li>
					        <a href="{$base_url}/index.php?case=table&act=list&table=templatetag&tagfrom=define&admin_dir=admin&site=default">
					        自定义标签
					        </a>
				        </li>
				        <li>
					        <a href="{$base_url}/index.php?case=table&act=list&table=templatetagwap&tagfrom=content&admin_dir=admin&site=default">
					        手机内容标签
					        </a>
				        </li>
				        <li>
					        <a href="{$base_url}/index.php?case=table&act=list&table=templatetagwap&tagfrom=category&admin_dir=admin&site=default">
					        手机栏目标签
					        </a>
				        </li>
				        <li>
					        <a href="{$base_url}/index.php?case=table&act=list&table=templatetagwap&tagfrom=define&admin_dir=admin&site=default">
					        手机自定义标签
					        </a>
				        </li>
				        
			            <li>
				            <a href="{$base_url}/index.php?case=table&act=list&table=guestbook&admin_dir=admin&site=default">
				            留言管理
				            </a>
			            </li>
			            <li>
				            <a href="{$base_url}/index.php?case=table&act=list&table=comment&admin_dir=admin&site=default">评论管理
				            </a>
			            </li>
			            <li>
				            <a href="{$base_url}/index.php?case=table&act=list&table=ballot&admin_dir=admin&site=default">投票管理
				            </a>
			            </li>
			            <li>
				            <a href="{$base_url}/index.php?case=database&act=baker&admin_dir=admin&site=default">数据管理
				            </a>
			            </li>
			            <li>
				            <a href="{$base_url}/index.php?case=filecheck&act=filecheck&action=file_check&admin_dir=admin&site=default">
				            安全防护
				            </a>
			            </li>
			            <li>
					        <a href="{$base_url}/index.php?case=field&act=list&table=archive&admin_dir=admin&site=default">内容字段
					        </a>
				        </li>
				        <li>
					        <a href="{$base_url}/index.php?case=field&act=list&table=user&admin_dir=admin&site=default">用户字段
					        </a>
				        </li>
				        <li>
					        <a href="{$base_url}/index.php?case=form&act=listform&admin_dir=admin&site=default">管理表单
					        </a>
				        </li>
				        <li>
					        <a class="active-menu waves-effect waves-dark" href="#">
								<span class="glyphicon glyphicon-edit"></span> 
							联系我们
							</a>
						</li>
						 <li>
	                        <a href="{$base_url}/index.php?case=table&act=list&table=category&admin_dir=admin&site=default">
	                        栏目管理
	                        </a>
                        </li>
                        <li>
	                        <a href="{$base_url}/index.php?case=table&act=list&table=type&admin_dir=admin&site=default">
	                        分类管理
	                        </a>
                        </li>
                        <li>
	                        <a href="{$base_url}/index.php?case=table&act=list&table=special&admin_dir=admin&site=default">
	                        专题管理
	                        </a>
                        </li>
                        <li>
	                        <a href="{$base_url}/index.php?case=table&act=list&table=archive&admin_dir=admin&site=default">
	                        内容管理
	                        </a>
                        </li>
                        <li>
	                        <a href="{$base_url}/index.php?case=table&act=htmlrule&table=category&admin_dir=admin&site=default">
	                        URL规则
	                        </a>
                        </li>
                        <li>
	                        <a href="{$base_url}/index.php?case=table&act=setting&table=archive&admin_dir=admin&site=default">
	                        推荐位
	                        </a>
                        </li>
                        <li>
	                        <a href="{$base_url}/index.php?case=index&act=hotsearch&admin_dir=admin&site=default">
	                        热搜关键词
	                        </a>
                        </li>
                        <li>
	                        <a href="{$base_url}/index.php?case=image&act=listdir&admin_dir=admin&site=default">
	                        图片库
	                        </a>
                        </li>
                        <li>
	                        <a href="{$base_url}/index.php?case=table&act=list&table=tag&admin_dir=admin&site=default">
	                        标签管理
	                        </a>
                        </li>
			        </ul>
		    	</li>
            </ul>
		</div>
	</div>

<script>$(function(){
    $('.nav_<?php echo $curr_i;?>').addClass('in');
    });</script>
<!-- 右侧 -->
<div id="page-wrapper" class="main">
	<div class="container-fluid">

		<div class="row">

		<ol class="breadcrumb">
  <li><a href="{$base_url}/index.php?admin_dir={get('admin_dir')}&site=default" title="后台首页">首页</a></li>
            {if $curr_ns}
            <li><?php echo $curr_ns;?></li>
            {/if}
            {if $curr_n}
            <li class="active"><a href="<?php echo $menu[$curr_ns][$curr_n];?>"><?php echo $curr_n;?></a></li>
            {/if}
  <?php if(front::get('deletestate')) echo ' ><li class="active">回收站</li>'; if(front::get('needcheck')) echo ' ><li class="active">待审核内容</li>'; ?>
</ol>

			<?php
			$this->render();
			?>
		</div>

		<div class="blank30"></div>
		<div class="copy">{getCopyRight()}</div>
		<div class="clearfix"></div>
	</div>
</div>

</div>
<div class="blank30"></div>
</div>


<script type="text/javascript">
<!--

//标签页
$('#myTabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})

//去掉虚线框
function bluring(){
if(event.srcElement.tagName=="A"||event.srcElement.tagName=="IMG") document.body.focus();
}
document.onfocusin=bluring;

//点击关闭提示信息层
function turnoff(obj){
document.getElementById(obj).style.display="none";
}

//信息提示框
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

//-->
</script>

<?php if(hasflash()) { ?>
<div id='message'>
<div class="alert alert-danger alert-dismissible fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
      <span class="glyphicon glyphicon-warning-sign"></span>	  <?php echo showflash(); ?>
    </div>
</div>
<script type="text/javascript">
<!--
function lick(){
$("#message").hide();
}
window.setTimeout("lick()",3000);
//-->
</script>
<?php } ?>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{$skin_path}/js/bootstrap.min.js"></script>
	<!-- Metis Menu Js -->
    <script src="{$skin_path}/js/jquery.metisMenu.js"></script>
    <!-- Custom Js -->
    <script src="{$skin_path}/js/custom-scripts.js"></script> 
	<script language="javascript" type="text/javascript" src="{$skin_path}/js/admin.js"></script>
	<script src="{$skin_path}/js/jquery.nicescroll.min.js"></script> 

<script type="text/javascript">
<!--
$('.sidebar').niceScroll({
    cursorcolor: "#152944",//#CC0071 光标颜色
    cursoropacitymax: 0, //改变不透明度非常光标处于活动状态（scrollabar“可见”状态），范围从1到0
    touchbehavior: false, //使光标拖动滚动像在台式电脑触摸设备
    cursorwidth: "0px", //像素光标的宽度
    cursorborder: "0", // 游标边框css定义
    cursorborderradius: "0px",//以像素为光标边界半径
    autohidemode: true //是否隐藏滚动条
});
//-->
</script>
<script>
	   $(document).ready(function(){
	      $.get('./lib/tool/getinf.php?type=officialinf',function(data){
	          $("#information").append(data);
	      });
	   });
</script>
<!--[if lt IE 9]><!-->
<script src="{$skin_path}/js/ie/html5shiv.min.js"></script>
<script src="{$skin_path}/js/ie/respond.min.js"></script>
<![endif]-->

</body>
</html>