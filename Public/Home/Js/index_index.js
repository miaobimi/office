var interval,
	myChart,
	option;
Index = {
	$target : 'main',
	xdata : [],
	ydata : [],
	init : function(){
		this.initAccountInfo();
		this.historyTrading();
		this.initTcList();
	},

	initChart : function(){
		require.config({
            paths: {
                echarts: echartUrl
            }
        });
        this.require();
	},

	initWindow : function(){
		
    	$(window).resize(function(){
    		myChart.resize();
    	})
	},

	require : function(){
		var self = this;
		// 使用
        require(
            [
                'echarts',
                'echarts/chart/line'// 使用柱状图就加载bar模块，按需加载
            ],
            function (ec) {
                // 基于准备好的dom，初始化echarts图表
                myChart = ec.init(document.getElementById(self.$target)); 
                
                option = {
				    xAxis : [
				        {
				            type : 'category',
				            boundaryGap : false,
				            data :  self.xdata
				        }
				    ],
				    
				    yAxis : [
				        {
				            type : 'value'
				        }
				    ],
				    series : [
				        {
				            type:'line',
				            data:self.ydata
				        }
				    ]
				};
                    
				myChart.setOption(option);
            }
        );
	},

	historyTrading : function(){
		var self = this;
		ajaxReturn(getTradeInfoUrl,{},null,function(res){
			if(res.status){
				if(Number(res.info.length)>0){
					var html = '';
					var info = res.info;
					var volume = 0;
					var nowProfit = 0;
					$.each(info,function(k,v){
						html += '<p><span>'+v.symbol+'.stp</span><strong style="color: #ff5d5b !important;">$'+v.profit+'</strong><em>'+v.closeprice+'</em></p>';
						volume += Number(v.volume);
						nowProfit += Number(v.profit);
					});
					var nowtime = formatDateTime();
					$('#nowOrder').empty().html(html);
					$('.nowCount').empty().html(info.length);
					$('.nowHand').empty().html(volume);
					$('.nowProfit').empty().html('$'+nowProfit);
					$('#updateTime').empty().html(nowtime);

					Index.pushDataToChart(nowtime,nowProfit);
					clearInterval(interval);
					interval = setInterval(Index.historyTrading,10000)
				}else{
					// clearInterval(interval);
					// interval = setInterval(Index.historyTrading,60000*5)
				}
				
			}else{
				layer.alert(res.info,{icon:2})
			}
		})
	},

	pushDataToChart : function(nowtime,nowProfit){
		if(this.xdata.length>0){
			option.xAxis[0].data.push(nowtime);
			option.series[0].data.push(nowProfit);
			myChart.setOption(option);
		}else{
			this.xdata.push(nowtime);
			this.ydata.push(nowProfit);
			this.initChart();
			this.initWindow();
		}
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
		jsonpReturn('http://api.webems.cn/forex/store.jsp',{cmd:'tc',limit:13},function(data){
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


