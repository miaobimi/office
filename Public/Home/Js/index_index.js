Index = {

	init : function(){

		this.initAccountInfo();
		this.initTcList();
	},

	initAccountInfo : function(){
		ajaxReturn(getAccountInfoUrl,{},null,function(res){
			if(res.status){
				var params = res.info;
				$('#balance').empty().html('$'+params.balance);
				$('#equity').empty().html('$'+params.equity);
				$('#margin').empty().html('$'+params.margin);
				$('#margin_free').empty().html('$'+params.margin_free);
			}else{
				layer.alert(res.info,{icon:2})
			}
		})
	},

	initTcList : function(){
		jsonpReturn('http://api.webems.cn/forex/store.jsp',{cmd:'tc',limit:7},function(data){
			if(data.plant.length){
				var ul='';
				$.each(data.plant,function(i,record){
					ul+='<li>';
						ul+='<a onclick="Index.showTcDetail($(this),'+record.id+')" data-title="'+record.creatdate
+'：'+record.title+'">'+record.title+'</a> ';
						ul+='<span class="date">'+record.creatdate+'</span>';
					ul+='</li>';
				});
				$('#tcHomeList').empty().html(ul);
			}
		});
	},

	showTcDetail : function($o,id){
		jsonpReturn('http://api.webems.cn/forex/store.jsp',{cmd:'tc',id:id},function(data){
			if(data.plant.length){
				var r=data.plant[0]
				console.log(r)
				layer.open({
				    type: 1,
				    title : r.creatdate+'：'+r.title,
				    skin: 'layui-layer-demo', //样式类名
				    closeBtn: 0, //不显示关闭按钮
				    shift: 4,
				    area: ['1200px', '500px'],
				    shadeClose: true, //开启遮罩关闭
				    content: '<div style="padding:10px"><div style="float:left">'+r.content+'</div><img style="float:right" src="'+r.image+'"></div>'
				});

			}
		});
	}
}

