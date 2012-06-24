/**
 * 登录js
 */
	var cfg = {
							ID: "ifloat",
							Title: "登录",
							Content: "",
							Backover: false,
							Frameover: false,
							Drag: true,
							ContainOut: false,
							CSS: {
								"width": "450px",
	                            "height": "200px",
								"padding": "0",
								"border": "2px solid #44BCF4",
								"background-color": "#fff",
	                            "overflow": "hidden"
							},
							TitleCSS: {
								"background-color": "#f0faff",
								"line-height": "32px",
								"height": "32px",
								"color": "#000",
								"font-size": "14px",
								"font-weight": "700"
							},
							ContentCSS: {
								"padding": "15px",
								"line-height": "18px",
	                            "text-align": "center"
							}
						};
	$('.all a').click(function(){
		$.ajax({
		   type: "get",
		   dataType: "html",
		   url: this.href+'?ajax=1',
		   data: "",
		   success: function(data){
				var w = fi.floatUI.ModeWindow(cfg);
				w.SetContent(data);
				w.Show();
		   },
		   error: function(){
		   		alert("出错了！请稍候重试。 ");
		   }
   		});
		
		return false;
	});
	
