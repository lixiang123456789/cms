
<style type="text/css">
	select#catid,select#typeid {width:100%;}
	input#title {width:80%;margin:0px;}
	span.hotspot {float:right; padding-left:10px;}
</style>

<script type="text/javascript">
    function checkform() {
        if(document.form1.catid.value=="0") {
            alert('请选择栏目');
            document.form1.catid.focus();
            return false;
        }
        if(!document.form1.title.value) {
            alert('请填写标题');
            document.form1.title.focus();
            return false;
        }
        {loop $field $f}
<?php
if (!preg_match('/^my_/', $f['name']) || !$f['notnull']) {
    //unset($field[$f['name']]);
    continue;
}

?>
        if(!document.form1.{$f['name']}.value){
            alert("请填写<?php echo setting::$var['archive'][$f['name']]['cname']; ?>");
            setTab('one',6,6);
            document.form1.{$f['name']}.focus();
            return false;
        }
        {/loop}
        return true;
    }
</script>
<form method="post" name="form1" action="<?php if (front::$act == 'edit')
    $id="/id/".$data[$primary_key]; else
    $id='';
echo modify("/act/".front::$act."/table/".$table.$id."/deletestate/".front::get('deletestate')); ?>" enctype="multipart/form-data" onsubmit="return checkform();">
    <input type="hidden" name="onlymodify" value=""/>
    <script type="text/javascript" src="{$base_url}/common/js/ajaxfileupload.js"></script>
    <script type="text/javascript" src="{$base_url}/common/js/jquery.imgareaselect.min.js"></script>
    <script type="text/javascript" src="{$base_url}/common/js/ThumbAjaxFileUpload.js"></script>
	<link rel="stylesheet" href="{$base_url}/common/js/jquery/ui/ui.datepicker.css" type="text/css" />
    <script language="javascript" src="{$base_url}/common/js/jquery/ui/ui.datepicker.js"></script>
    <script type="text/javascript" src="{$base_url}/js/jquery.colorpicker.js"></script>

<?php $root = config::get('base_url').'/ueditor';?>
    <script type="text/javascript" charset="utf-8" src="{$root}/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="{$root}/ueditor.all.js"> </script>
    <script type="text/javascript" charset="utf-8" src="{$root}/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript" charset="utf-8" src="{$root}/addCustomizeButton.js"></script>
    
    <script>
        $(function(){
            $("#catid").change( function(){
				get_field($("#catid").val());
            });
			$("#tag_option").change( function(){
				if($("#tag_option").find('option:selected').val() != '0'){
					if($("#tag").val() != ''){
						var sp = ',';	
					}else{
						sp = '';	
					}
					$("#tag").val($("#tag").val()+sp+$("#tag_option").find('option:selected').text());
					//$("#tagids").val($("#tagids").val()+sp+$("#tagid").find('option:selected').val());
				}
            });
			$("#color_btn").colorpicker({
				fillcolor:true,
				success:function(o,color){
					$("#title").css("color",color);
					$("#color").val(color);
				},
				reset:function(o,color){
					$("#title").css("color","");
					$("#color").val("");
				}
			});
			$("#title").css("color","{$data['color']}");
        });
        function attachment_delect(id) {
            $.ajax({
url: '{url('tool/deleteattachment/site/'.front::get('site'),false)}&id='+id,
type: 'GET',
dataType: 'text',
timeout: 10000,
error: function(){
    //	alert('Error loading XML document');
},
success: function(data){
    document.form1.attachment_id.value=0;
    get('attachment_path').value='';
	get('attachment_intro').value='';
	get('attachment_path_i').innerHTML='';
    get('file_info').innerHTML='';
}
            });
        }

        function get_field(catid) {
            $.ajax({
url: '<?php echo url('table/getfield/table/archive/aid/'.$data['aid'],true);?>&catid='+catid,
type: 'GET',
dataType: 'text',
timeout: 10000,
error: function(){
    //alert('Error loading XML document');
},
success: function(data){
    $("#con_one_6").html(data);
}
            });
        }
    </script>
    <link rel="stylesheet" href="{$base_url}/common/js/jquery/ui/ui.datepicker.css" type="text/css" media="screen" title="core css file" charset="utf-8" />
<script language="javascript" src="{$base_url}/common/js/jquery/ui/ui.datepicker.js"></script>
    <script type="text/javascript" src="{$base_url}/js/upimg/dialog.js"></script>
    <link href="{$base_url}/images/admin/dialog.css" rel="stylesheet" type="text/css" />
<div class="tab-content">

<!-- 基本信息 -->
<div role="tabpanel" class="tab-pane active" id="tag1">
<div class="row">
<div class="col-xs-4 col-sm-4 col-md-3 col-lg-2 text-right">网页标题</div>
<div class="col-xs-8 col-sm-7 col-md-7 col-lg-5 text-left">
{form::getform('mtitle',$form,$field,$data)}
<span class="tips" data-toggle="tooltip" data-html="ture" data-placement="left" title="可填写不同于内容名称的关键词，有利于搜索优化！"></span>
</div>
</div>
<div class="clearfix blank20"></div>

<div class="row">
<div class="col-xs-4 col-sm-4 col-md-3 col-lg-2 text-right">网页关键词</div>
<div class="col-xs-8 col-sm-7 col-md-7 col-lg-5 text-left">
{form::getform('keyword',$form,$field,$data)}
<span class="tips" data-toggle="tooltip" data-html="ture" data-placement="left" title="网页META信息中的keywords信息，可填写与内容相关的关键词，以英文逗号相隔，有利于搜索优化！"></span>
</div>
</div>
<div class="clearfix blank20"></div>

<div class="row">
{if $_GET['id']==1}
<div class="col-xs-4 col-sm-4 col-md-3 col-lg-2 text-right">公司简介</div>
{/if}
{if $_GET['id']==2}
<div class="col-xs-4 col-sm-4 col-md-3 col-lg-2 text-right">内容详情</div>
{/if}
<div class="col-xs-8 col-sm-8 col-md-9 col-lg-10 text-left">
{form::getform('content',$form,$field,$data)}

<div class="fieldset flash" id="fsUploadProgress">
<span class="legend"></span>
</div>
<div id="divStatus"></div>
</div>

</div>
<div class="clearfix blank20"></div>


<div class="row">
<div class="col-xs-4 col-sm-4 col-md-3 col-lg-2 text-right"></div>
<div class="col-xs-8 col-sm-7 col-md-7 col-lg-5 text-left">
<input name="savehttppic" type="checkbox" value="1" id="pic1" />&nbsp;保存远程图片&nbsp;&nbsp;<input name="autothumb" type="checkbox" value="1" id="pic2" />&nbsp;第一张图片自动保存为缩略图
</div>
</div>
<div class="clearfix blank20"></div>
<script type="text/javascript">
<!--
	$('#pic2').on('change',function(){
    if ($(this).is(':checked')) {
        $('#pic1').prop('checked','checked');
    }else{
        $('#pic1').removeProp('checked');
    }
})
//-->
</script>

<div class="row">
<div class="col-xs-4 col-sm-4 col-md-3 col-lg-2 text-right">页面描述</div>
<div class="col-xs-8 col-sm-7 col-md-7 col-lg-5 text-left">
{form::getform('description',$form,$field,$data)}
<span class="tips" data-toggle="tooltip" data-html="ture" data-placement="left" title="网页META信息中的description信息，可填写与内容相关的简介，有利于搜索优化！"></span>
</div>
</div>
<div class="clearfix blank20"></div>
</div>



<!-- SEO信息 -->
<div role="tabpanel" class="tab-pane" id="tag2">

<div class="row">
<div class="col-xs-4 col-sm-4 col-md-3 col-lg-2 text-right">网页标题</div>
<div class="col-xs-8 col-sm-7 col-md-7 col-lg-5 text-left">
{form::getform('mtitle',$form,$field,$data)}
<span class="tips" data-toggle="tooltip" data-html="ture" data-placement="left" title="可填写不同于内容名称的关键词，有利于搜索优化！"></span>
</div>
</div>
<div class="clearfix blank20"></div>
<!-- 自定义字段 -->

<div role="tabpanel" class="tab-pane" id="tag6">



<div id="con_one_6">

{loop $field $f}
<?php
$name=$f['name'];
if (!preg_match('/^my_/', $name)) {
    unset($field[$name]);
    continue;
}
$category = category::getInstance();
$sonids = $category->sons(setting::$var['archive'][$name]['catid']);
if(setting::$var['archive'][$name]['catid'] != $data['catid'] && !in_array($data['catid'],$sonids) && (setting::$var['archive'][$name]['catid'])){
	unset($field[$name]);
    continue;
}
if (!isset($data[$name]))
    $data[$name]='';
?>
<div class="row">
<div class="col-xs-4 col-sm-4 col-md-3 col-lg-2 text-right"><?php echo setting::$var['archive'][$name]['cname']; ?></div>
<div class="col-xs-8 col-sm-7 col-md-7 col-lg-5 text-left" id="con_one_6"><?php echo form::getform($name,$form, $field, $data); ?></div>
</div>
<div class="clearfix blank20"></div>
{/loop}



</div>
</div>


{if front::get('catid')}<script type="text/javascript">get_field({front::get('catid')});</script>{/if}</div>
<input type="submit" name="submit" value=" 提交 " class="btn btn-primary" />

</form>