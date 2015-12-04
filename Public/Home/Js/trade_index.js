Trade = {
	mybalance:0,
	interval: 0 ,
	init: function(){
		this.loadChart();
	},

	loadChart :function(){
		Highcharts.setOptions({                                                     
            global: {                                                               
                useUTC: false                                                       
            }                                                                       
        });                                                                         
        var self = this;                                                                            
        var chart;                                                                  
        $('#container').highcharts({                                                
            chart: {                                                                
                type: 'spline',                                                     
                animation: Highcharts.svg, // don't animate in old IE               
                marginRight: 10,                                                    
                events: {                                                           
                    load: function() { 
                        // set up the updating of the chart each second             
                        var series = this.series[0]; 
                        series.addPoint(self.getTotalAccountInfo(), true, true);                               
                        setInterval(function() {                                    
                                                          
                            series.addPoint(self.getTotalAccountInfo(), true, true);                    
                        }, 5000);                                                   
                    }                                                               
                }                                                                   
            },                                                                      
            title: {                                                                
                text: '余额走势'                                            
            }, 
            subtitle: {
		        text: 'The Last Month Balance Changes'
		    },                                                                     
            xAxis: {                                                                
                type: 'datetime',                                                   
                tickPixelInterval: 150                                              
            },                                                                      
            yAxis: {                                                                
                title: {                                                            
                    text: '余额'                                                   
                },                                                                  
                plotLines: [{                                                       
                    value: 0,                                                       
                    width: 1,                                                       
                    color: '#808080'                                                
                }]                                                                  
            },                                                                      
            tooltip: {                                                              
                formatter: function() {                                             
                        return '<b>'+ this.series.name +'</b><br/>'+                
                        Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) +'<br/>'+
                        Highcharts.numberFormat(this.y, 2);                         
                }                                                                   
            },                                                                      
            legend: {                                                               
                enabled: false                                                      
            },                                                                      
            exporting: {                                                            
                enabled: false                                                      
            },                                                                      
            series: [{                                                              
                name: '余额',                                                
                data: (function() {                                                 
                    // generate an array of random data                             
                    var data = [],                                                  
                        time = (new Date()).getTime(),                              
                        i;                                                          
                                                                                    
                    for (i = -19; i <= 0; i++) {                                    
                        data.push({                                                 
                            x: time + i * 1000,                                     
                            y: Trade.mybalance                                        
                        });                                                         
                    }                                                               
                    return data;                                                    
                })()                                                                
            }]                                                                      
        });                                                                         
	},

	getTotalInfo: function(){
		ajaxReturn(getTotalInfoUrl,{},null,function(res){
			if(res.status){
				var params = res.info;
				var v_total=0;
				var p_total=0;
				var html = '';
				if(params.length>0){
						for (var i = 0; i < params.length; i++) {
						v_total +=Number(params[i].volume);
						p_total +=Number(params[i].profit);
						params[i].opendate = params[i].opentime.split(" ")[0];
						params[i].opentime = params[i].opentime.split(" ")[1];
						html += '<tr>'+
								  		'<td id="order">'+params[i].order+'</td>'+
								  		'<td>'+
								  			'<span class="label label-primary" id="cmd">'+params[i].cmd+'</span>'+
								  		'</td>'+
								  		'<td><span class="x-box-label" id="symbol">'+params[i].symbol+'</span></td>'+
								  		'<td class="x-text-right x-text-bold x-font-14" id="volume">'+params[i].volume+' 手</td>'+
								  		'<td>'+
								  			'<strong id="opendate">'+params[i].opendate+'</strong><br><span class="x-text-ccc" id="opentime">'+params[i].opentime+'</span>'+
								  			'<span class="x-box-label" style="float:right;margin-top:-20px;" id="openprice">'+params[i].openprice+'</span>'+
								  		'</td>'+
								  		'<td>'+
								  			'<span class="x-box-label" style="float:right;">待定</span>'+
								  		'</td>'+
								  		'<td class="x-text-right">'+
								  			'<span class="x-text-ccc" id="sl">'+params[i].sl+'</span><span class="y"></span><span id="tp">'+params[i].tp+'</span>'+
								  		'</td>'+
								  		'<td class="x-text-right">'+
								  			'<span class="x-box-label x-text-bold x-text-red x-font-16" id="profit">$'+params[i].profit+'</span>'+
								  		'</td>'+
								  	'</tr>';
					};
					var nowtime = new Date().getTime();
					nowtime = nowtime+8*3600*1000;
					v_total = v_total.toFixed(2);
					p_total = p_total.toFixed(2);
					kp_total = p_total/1000;
					var vdata = [nowtime,Number(kp_total.toFixed(5))];
					html_p = '交易中 <strong>'+params.length+'</strong> 笔 <strong>'+v_total+'</strong> 手　交易盈亏<strong class="x-text-red">$'+p_total+'</strong>';
					$("#tradetitle").empty().html(html_p);
					$("#orderlist").empty().html(html);		

					clearInterval(Trade.interval);
					Trade.interval = setInterval(Trade.getTotalInfo,10000);
					
					//var vdata = pushDataToHgchart(nowtime,p_total);
				}else{
					$("#tradetitle").empty();
					$("#orderlist").empty();
				}
			}else{
				layer.alert(res.info,{icon:2})
			}
		})
	},
	getOrderInfo: function(){
		ajaxReturn(getOrderInfoUrl,{},null,function(res){
			if(res.status){
				var params = res.info;
				var v_total=0;
				var html = '';
				if(params.length>0){
						for (var i = 0; i < params.length; i++) {
						v_total +=Number(params[i].volume);
						params[i].opendate = params[i].opentime.split(" ")[0];
						params[i].opentime = params[i].opentime.split(" ")[1];
						html += '<tr>'+
								  		'<td id="order">'+params[i].order+'</td>'+
								  		'<td>';
								  		if(params[i].cmd=='buy'){
								  			html += '<span class="label label-primary" id="cmd">'+params[i].cmd+'</span>';
								  		}else{
								  			html += '<span class="label label-warning" id="cmd">'+params[i].cmd+'</span>';
								  		}
								  			
								  html+='</td>'+
								  		'<td><span class="x-box-label" id="symbol">'+params[i].symbol+'</span></td>'+
								  		'<td class="x-text-right x-text-bold x-font-14" id="volume">'+params[i].volume+' 手</td>'+
								  		'<td>'+
								  			'<strong id="opendate">'+params[i].opendate+'</strong><br><span class="x-text-ccc" id="opentime">'+params[i].opentime+'</span>'+
								  			'<span class="x-box-label" style="float:right;margin-top:-20px;" id="openprice">'+params[i].openprice+'</span>'+
								  		'</td>'+
								  		'<td>'+
								  			'<span class="x-box-label" style="float:right;">待定</span>'+
								  		'</td>'+
								  		'<td class="x-text-right">'+
								  			'<span class="x-text-ccc" id="sl">'+params[i].sl+'</span><span class="y"></span><span id="tp">'+params[i].tp+'</span>'+
								  		'</td>'+
								  		'<td class="x-text-right">';
								  		if(Number(params[i].profit)<0){
								  			html+='<span class="x-box-label x-text-bold x-text-red x-font-16" id="profit">$'+params[i].profit+'</span>';
								  		}else{
								  			html+='<span class="x-box-label x-text-bold x-text-green x-font-16" id="profit">$'+params[i].profit+'</span>';
								  		}		
								  	html+='</td>'+
								  	'</tr>';
					};
					v_total = v_total.toFixed(2);
					$("#orderlist").empty().html(html);
				}else{
					$("#orderlist").empty();
				}
			}else{
				layer.alert(res.info,{icon:2})
			}
		})
	},
	getPendingInfo: function(){
		ajaxReturn(getPendingInfoUrl,{},null,function(res){
			if(res.status){
				var params = res.info;
				var v_total=0;
				var html = '';
				if(params.length>0){
						for (var i = 0; i < params.length; i++) {
						v_total +=Number(params[i].volume);
						params[i].opendate = params[i].opentime.split(" ")[0];
						params[i].opentime = params[i].opentime.split(" ")[1];
						
						html += '<tr>'+
							  		'<td>'+params[i].order+'</td>'+
							  		'<td>'+
							  			'<span class="label label-primary">'+params[i].cmd+'</span>'+
							  		'</td>'+
							  		'<td><span class="x-box-label">'+params[i].symbol+'</span></td>'+
							  		'<td class="x-text-right x-text-bold x-font-14">'+params[i].volume+' 手</td>'+
							  		'<td>'+
							  			'<span class="x-box-label">'+params[i].openprice+'</span>'+
							  		'</td>'+
							  		'<td>'+
							  			'<span class="x-box-label" style="float:right;">'+'closeprice'+'</span>'+
							  		'</td>'+
							  		'<td class="x-text-right">'+
							  			'<span class="x-text-ccc">'+params[i].sl+'</span><span class="y"></span><span>'+params[i].tp+'</span>'+
							  		'</td>'+
							  		'<td class="x-text-center">'+
							  			'<strong>'+params[i].opendate+'</strong>&nbsp;&nbsp;<span class="x-text-ccc">'+params[i].opentime+'</span>'+
							  		'</td>'+
							  	'</tr>';
					};
					v_total = v_total.toFixed(2);
					$("#orderlist").empty().html(html);
				}else{
					$("#orderlist").empty();
				}
			}else{
				layer.alert(res.info,{icon:2})
			}
		})
	},
	historyOrderInfo: function(){
		ajaxReturn(historyOrderInfoUrl,{},null,function(res){
			if(res.status){
				var params = res.info;
				var v_total=0;
				var p_total=0;
				var html = '';
				if(params.length>0){
						for (var i = 0; i < params.length; i++) {
						v_total +=Number(params[i].volume);
						p_total +=Number(params[i].profit);
						params[i].opendate = params[i].opentime.split(" ")[0];
						params[i].opentime = params[i].opentime.split(" ")[1];
						params[i].closedate = params[i].closetime.split(" ")[0];
						params[i].closetime = params[i].closetime.split(" ")[1];
						html += '<tr>'+
							  		'<td>'+params[i].order+'</td>'+
							  		'<td>';
							  		if(params[i].cmd=='buy'){
							  			html+='<span class="label label-primary">'+params[i].cmd+'</span>'
							  		}else{
							  			html+='<span class="label label-warning">'+params[i].cmd+'</span>'
							  		}
							  		html+='<span class="x-box-label" style="float:right">'+params[i].symbol+'</span>'+
							  		'</td>'+
							  		'<td class="x-text-right x-text-bold x-font-14">'+params[i].volume+' 手</td>'+
							  		'<td>'+
							  			'<strong>'+params[i].opendate+'</strong><br><span class="x-text-ccc">'+params[i].opentime+'</span><span class="x-box-label" style="float:right;margin-top:-20px;">'+params[i].openprice+'</span>'+
							  		'</td>'+
							  		'<td>'+
							  			'<strong>'+params[i].closedate+'</strong><br><span class="x-text-ccc">'+params[i].closetime+'</span><span class="x-box-label" style="float:right;margin-top:-20px;">'+params[i].closeprice+'</span>'+
							  		'</td>'+
							  		'<td class="x-text-right">'+
							  			'<span class="x-text-ccc">'+params[i].sl+'</span><span class="y"></span><span>'+params[i].tp+'</span>'+
							  		'</td>'+
							  		'<td class="x-text-right">'
							  		if(Number(params[i].profit)<0){
							  			html+='<span class="x-box-label x-text-bold x-text-red x-font-16">$'+params[i].profit+'</span>'
							  		}else{
							  			html+='<span class="x-box-label x-text-bold x-text-green x-font-16">$'+params[i].profit+'</span>'
							  		}
							  	html+='</td>'+
							  	'</tr>';
					};				
					v_total = v_total.toFixed(2);
					p_total = p_total.toFixed(2);
					var p_html='<tr class="warning">'+
							  		'<td style="border-width:0"></td>'+
							  		'<td style="border-width:0"></td>'+
							  		'<td style="border-width:0" class="x-text-right x-text-bold x-font-14">'+v_total+'</td>'+
							  		'<td style="border-width:0"></td>'+
							  		'<td style="border-width:0"></td>'+
							  		'<td style="border-width:0"></td>'+
							  		'<td class="x-text-right" style="border-width:0">'+
							  			'<span class="x-text-bold x-font-14">$'+p_total+'</span>'+
							  		'</td>'+
							  	'</tr>';
					$("#orderlist").empty().html(html);
					$("#totalCount").empty().html(p_html);
				}else{
					$("#orderlist").empty();
					$("#totalCount").empty();
				}
			}else{
				layer.alert(res.info,{icon:2})
			}
		})
	},
	getTotalAccountInfo: function(){
	
		var arr = [];
		ajaxReturn(getTotalAccountInfoUrl,{},null,function(res){
			if(res.status){
				var params = res.info;
				//console.log(params);
				
				var html = '';
				if(typeof(params) != "undefined"){
					$('#memberBalance').empty().html('$'+params.balance);
					$('#memberEquity').empty().html('$'+params.equity);
					$('#memberMargin').empty().html('$'+params.margin);
					$('#memberMarginfree').empty().html('$'+params.margin_free);	
					Trade.mybalance	= Number(params.balance);
					 var x = (new Date()).getTime(), // current time         
                        y = Trade.mybalance; 
					arr = [x,y];
					//var vdata = pushDataToHgchart(nowtime,p_total);
				}else{
					//
				}
			}else{
				layer.alert(res.info,{icon:2})
			}
		},null,false);
		return arr;
	},
}