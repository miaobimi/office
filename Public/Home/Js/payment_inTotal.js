var myChart,
	option;
var MyEcharts = {

	$target : 'main',
	xvalue : [],
	yvalue : [],

	init : function(){
		require.config({
            paths: {
                echarts: echartUrl
            }
        });
		if(typeof text == 'undefined'){
			text = '月份入金分析';
		}
		this.buildData();
        this.require();
        this.initWindow();
	},

	buildData : function(){
		var self = this;
		$('tbody tr').each(function(k,v){
			var name = $(v).children().eq(0).text();
			var value = $(v).children().eq(1).find('.m').text().substr(1);
			self.xvalue.push(name);
			self.yvalue.push({value:value, name:name});
		});
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
                'echarts/chart/pie' 
            ],
            function (ec) {
                // 基于准备好的dom，初始化echarts图表
                myChart = ec.init(document.getElementById(self.$target)); 
                
                option = {
				    title : {
				        text: text,
				        // subtext: '纯属虚构',
				        x:'center'
				    },
				    tooltip : {
				    	show : false,
				        trigger: 'item',
				        formatter: "{a} <br/>{b} : {c} ({d}%)"
				    },
				    legend: {
				        orient : 'vertical',
				        x : 'left',
				        data:self.xvalue
				    },
				    toolbox: {
				        show : false,
				        feature : {
				            mark : {show: true},
				            dataView : {show: true, readOnly: false},
				            magicType : {
				                show: true, 
				                type: ['pie', 'funnel'],
				                option: {
				                    funnel: {
				                        x: '25%',
				                        width: '50%',
				                        funnelAlign: 'left',
				                        max: 1548
				                    }
				                }
				            },
				            restore : {show: true},
				            saveAsImage : {show: true}
				        }
				    },
				    calculable : true,
				    series : [
				        {
				            name:'月份入金',
				            type:'pie',
				            radius : '55%',
				            center: ['50%', '60%'],
				            data:self.yvalue
				        }
				    ]
				};
                    
				myChart.setOption(option);
            }
        );
	},
}