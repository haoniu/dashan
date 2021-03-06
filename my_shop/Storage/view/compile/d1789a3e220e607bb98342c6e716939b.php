<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
		<meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
	    <!-- Loading Bootstrap -->
	    <link href="<?php echo __PUBLIC__?>/Admin/Flat/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
	    <!-- Loading Flat UI -->
	    <link href="<?php echo __PUBLIC__?>/Admin/Flat/dist/css/flat-ui.css" rel="stylesheet">
	    <link href="<?php echo __PUBLIC__?>/Admin/Flat/docs/assets/css/demo.css" rel="stylesheet">
	    <link rel="shortcut icon" href="<?php echo __PUBLIC__?>/Admin/Flat/img/favicon.ico">
	    
	    <script src="<?php echo __PUBLIC__?>/jquery-1.8.2.min.js" type="text/javascript" charset="utf-8"></script>
	    <script src="<?php echo __PUBLIC__?>/uppic/jquery.uploadify.min.js" type="text/javascript" charset="utf-8"></script>
	    <link rel="stylesheet" type="text/css" href="<?php echo __PUBLIC__?>/uppic/uploadify.css"/>
	    <script type="text/javascript">
	    	$(function(){
	    		//获得被选中的cid
	    		$('select[name=cid]').change(function(){
	    			//获得被选中的tid
					var tid = $(':selected',this).attr('tid');
					//改变隐藏域的属性
					$('input[name=tid]').val(tid);
	    			//顶级没类型不发异步
	    			if(tid == 0) return;
	    			
	    			//通过异步发送tid，获得类型属性，然后组合字符串插入到页面
	    			$.ajax({
					//请求地址
						url : '<?php echo U('ajaxGetAttr')?>',
						//发送的数据
						data: {tid : tid},
						//请求类型
						type:'post',
						//返回的数据类型
						dataType:'json',
						//成功返回
						success:function(phpData){
							//属性
							var attr = '';
							//规格
							var spec = '';
								$.each(phpData,function(k, v) {
									//如果是属性时
									if(v.class == 0){
										attr += '<tr><td>'+v.taname+'</td><td>';
										attr += '<select name="attr['+v.taid+']" id="" class="form-control"><option value="">请选择</option>';
											$.each(v.tavalue,function(kk, vv) {
												attr += '<option value="'+vv+'">'+vv+'</option>';
											});
										attr += '</select></td></tr>'; 
		
									}else{//否则就是规格
										spec += '<tr><td>'+v.taname+'</td><td>';
										spec += '<select name="spec['+v.taid+'][value][]" id="" ><option value="">请选择</option>';
											$.each(v.tavalue,function(kk, vv) {
												spec += '<option value="'+vv+'">'+vv+'</option>';
											});
										spec += '</select></td>';
										spec += '<td>附加价格：<input type="text" name="spec['+v.taid+'][price][]" value="0" /></td>'
										spec += '<td><span class="add-spec btn btn-success"><i class="icon-plus icon-white"></i>添加规格</span></td>';
										spec += '</tr>'; 
									}
								});
							$('#attr').html(attr);
							$('#spec').html(spec);
						}
					})
	    		})	
	    		//点击增加规格
				$('.add-spec').live('click',function(){
					//找到父级的tr
					var tr = $(this).parents('tr');
					//克隆它
					var trObj = tr.clone();
					$('.add-spec',trObj).removeClass('btn-success add-spec').addClass('btn-danger del-spec').html('<i class="icon-minus icon-white"></i>删除规格');
					//在它的下一行插入
					tr.after(trObj);
	
				})
				//删除规格
				$('.del-spec').live('click',function(){
					$(this).parents('tr').remove();
				})
	    		
				
	    	})
	    </script>
	    <script type="text/javascript">
        $(function() {
            $('#file').uploadify({
                'formData'     : {//POST数据
                    '<?php echo session_name();?>' : '<?php echo session_id();?>',
                },
                'fileTypeDesc' : '上传文件',//上传描述
                'fileTypeExts' : '*.jpg;*.png',
                'swf'      : '<?php echo __PUBLIC__?>/uppic/uploadify.swf',
                'uploader' : '<?php echo U('upload')?>',
                'buttonText':'选择文件',
                'fileSizeLimit' : '2000KB',
                'uploadLimit' : 10,//上传文件数
                'width':65,
                'height':25,
                'successTimeout':10,//等待服务器响应时间
                'removeTimeout' : 0.2,//成功显示时间
                'onUploadSuccess' : function(file, data, response) {
					//转为json
                    data=$.parseJSON(data);
                    //获得图片地址
                    var imageUrl = data.url;
                    var li="<li path='"+data.path+"' url='"+data.url+"' id='up-pic'><img src='"+imageUrl+"'style='width:120px;height:80px;'/><input type='hidden' name='pic' value='"+data.path+"'/><a href='javascript:;' class='btn btn-danger btn-xs pic_del'>删除图片</a></li>";
                    $("#uploadList ul").prepend(li);
                }
            });
            $('.pic_del').live('click',function(){
            	$(this).parents('li').remove();
            })
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('#files').uploadify({
                'formData'     : {//POST数据
                    '<?php echo session_name();?>' : '<?php echo session_id();?>',
                },
                'fileTypeDesc' : '上传文件',//上传描述
                'fileTypeExts' : '*.jpg;*.png',
                'swf'      : '<?php echo __PUBLIC__?>/uppic/uploadify.swf',
                'uploader' : '<?php echo U('upload')?>',
                'buttonText':'选择文件',
                'fileSizeLimit' : '2000KB',
                'uploadLimit' : 10,//上传文件数
                'width':65,
                'height':25,
                'successTimeout':10,//等待服务器响应时间
                'removeTimeout' : 0.2,//成功显示时间
                'onUploadSuccess' : function(file, data, response) {
					//转为json
                    data=$.parseJSON(data);
                    //获得图片地址
                    var imageUrl = data.url;
                    var li="<li path='"+data.path+"' url='"+data.url+"' id='up-pic'><img src='"+imageUrl+"'style='width:120px;height:80px;'/><input type='hidden' name='photo[]' value='"+data.path+"'/><a href='javascript:;' class='btn btn-danger btn-xs pic_del'>删除图片</a></li>";
                    $("#uploadList_photos ul").prepend(li);
                }
            });
            
            $('.pic_del').live('click',function(){
            	$(this).parents('li').remove();
            })
        });
    </script>
    <style type="text/css">
    	#up-pic{
    		list-style: none;
    		display: inline-block;
    		float: left;
    	}
    </style>
	</head>
	<body>
		<form action="" method="post" enctype="multipart/form-data">
		<div class="alert alert-success">添加商品</div>
		<div class="form-group">
			<button type="button" class="btn btn-primary btn-sm">基本信息</button>
			<table class="table table-hover">
				<tr>
					<td>所属分类</td>
					<td>
						<select name="cid" class="form-control">
							<option value="">-请选择-</option>
							<?php foreach ($cateData as $v){?>
							<option value="<?php echo $v['cid']?>" tid="<?php echo $v['type_tid']?>" <?php if($oldData['cid']==$v['cid']){?>
                selected
               <?php }?>><?php echo $v['_name']?></option>
							<?php }?>
						</select>
					</td>
				</tr>
				<tr>
					<td>所属品牌</td>
					<td>
						<select name="bid" class="form-control">
							<option value="">-请选择-</option>
							<?php foreach ($brands as $v){?>
							<option value="<?php echo $v['bid']?>" <?php if($oldData['bid']==$v['bid']){?>
                 selected 
               <?php }?>><?php echo $v['bname']?></option>
							<?php }?>
						</select>
					</td>
				</tr>
				<tr>
					<td>商品名称</td>
					<td><input id="exampleInputEmail1" class="form-control" type="text" placeholder="" name="gname" value="<?php echo $oldData['gname']?>"></td>
				</tr>
				<tr>
					<td>单位</td>
					<td><input id="exampleInputEmail1" class="form-control" type="text" placeholder="" required="" name="unit" value="<?php echo $oldData['unit']?>"></td>
				</tr>
				<tr>
					<td>市场价</td>
					<td><input id="exampleInputEmail1" class="form-control" type="text" placeholder="" name="marketprice" value="<?php echo $oldData['marketprice']?>"></td>
				</tr>
				<tr>
					<td>商城价</td>
					<td><input id="exampleInputEmail1" class="form-control" type="text" placeholder="" name="shopprice" value="<?php echo $oldData['shopprice']?>"></td>
				</tr>
				<tr>
					<td>点击次数</td>
					<td><input id="exampleInputEmail1" class="form-control" type="text" placeholder="" name="click" value="<?php echo $oldData['click']?>"></td>
				</tr>
			</table>
			
		</div>
		<div class="form-group">
			<button type="button" class="btn btn-primary btn-sm">列表图</button><br />
			
			<div lab="uploadFile">
			    <input id="file" type="file" multiple="true">
			    <span>类型: *.jpg,*.png 大小: 2000KB 数量: 10</span>
			    
			    <div id="uploadList">
			        <ul>
						<li path='' url='' id='up-pic'>
							<img src='<?php echo __ROOT__?>/<?php echo $oldData['pic']?>'style='width:120px;height:80px;'/>
							<input type='hidden' name='pic' value='<?php echo $oldData['pic']?>'/>
							<a href='javascript:;' class='btn btn-danger btn-xs pic_del'>删除图片</a>
						</li>
			        </ul>
			    </div>
			</div>
			
			
		</div>
		<div class="clearfix"></div>
		<div class="form-group">
			<button type="button" class="btn btn-primary btn-sm">商品图册</button><br />
			
			<div lab="uploadFile">
			    <input id="files" type="file" multiple="true">
			    <span>类型: *.jpg,*.png 大小: 2000KB 数量: 10</span>
			    
			    <div id="uploadList_photos">
			        <ul>
			        	<?php foreach ($oldDetail['photos'] as $v){?>
						<li path='' url='' id='up-pic'>
							<img src='<?php echo __ROOT__?>/<?php echo $v?>'style='width:120px;height:80px;'/>
							<input type='hidden' name='photo[]' value='<?php echo $v?>'/>
							<a href='javascript:;' class='btn btn-danger btn-xs pic_del'>删除图片</a>
						</li>
						<?php }?>
			        </ul>
			    </div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="form-group">
			<button type="button" class="btn btn-primary btn-sm">商品属性</button>
			<table class="table .table-hover" id="attr">
				<?php foreach ($oldAttr as $v){?>
				<tr>
					<td><?php echo $v['taname']?></td>
					<td>
						<select name="attr[<?php echo $v['taid']?>]" id="" class="form-control">
							<option value="">-请选择-</option>
							<?php foreach ($v['tavalue'] as $vv){?>							
								<option value="<?php echo $vv?>" <?php if($v['gtvalue']==$vv){?>
                 selected 
               <?php }?>><?php echo $vv?></option>
							<?php }?>
						</select>
					</td>
				</tr>
				<?php }?>

			</table>
		</div>
		
		<div class="form-group">
			<button type="button" class="btn btn-primary btn-sm">商品规格</button>
			<table class="table .table-hover" id="spec">
				<?php foreach ($oldSpec as $v){?>
				<tr>
					<td><?php echo $v['taname']?></td>
					<td>
						<select name="spec[<?php echo $v['taid']?>][value][]" id="" >
							<option value="">请选择</option>
							<?php foreach ($v['tavalue'] as $vv){?>
							<option value="<?php echo $vv?>" <?php if($v['gtvalue']==$vv){?>
                selected
               <?php }?>><?php echo $vv?></option>				
							<?php }?>		
						</select>
					</td>
					<td>附加价格：<input type="text" name="spec[<?php echo $v['taid']?>][price][]" value="<?php echo $v['added']?>" /></td>
					<td><span class="add-spec btn btn-success"><i class="icon-plus icon-white"></i>添加规格</span></td>
				</tr>
				<?php }?>
			</table>
		</div>
		
		<script type="text/javascript" charset="utf-8" src="<?php echo __PUBLIC__?>/ueditor1_4_3/ueditor.config.js"></script>
		<script type="text/javascript" charset="utf-8" src="<?php echo __PUBLIC__?>/ueditor1_4_3/ueditor.all.min.js"></script>
		<script type="text/javascript" charset="utf-8" src="<?php echo __PUBLIC__?>/ueditor1_4_3/lang/zh-cn/zh-cn.js"></script>
		<div class="form-group">
			<button type="button" class="btn btn-primary btn-sm">商品详细</button>
			<script id="editor" type="text/plain" style="width:100%;height:300px;" name="intro"><?php echo $oldDetail['intro']?></script>
			<script>
		    		var ue = UE.getEditor('editor');
			</script>
		</div>
		
		
		<div class="form-group">
			<button type="button" class="btn btn-primary btn-sm">售后服务</button>
			<script id="editor1" type="text/plain" style="width:100%;height:300px;" name="service"><?php echo $oldDetail['service']?></script>
			<script>
		    		var ue = UE.getEditor('editor1');
			</script>
		</div>
		<input type="hidden" name='tid' value='0'/>
		<button class="btn btn-primary btn-block" type="submit"> 确定 </button>
		</form>
	</body>
</html>
