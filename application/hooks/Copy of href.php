<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * hook类  
 * 前端与源代码的交互处理
 * 只用于本地测试，请勿在应用服务器中使用
 * DO NOT USE THIS FILE ON YOUR SERVER UNLESS YOU REALLY KNOW WHAT ARE YOU DOING!
 * 
 */
class Href{
    var $CI = null; 
    var $ref = null;
    var $cls = null;
    var $method = null;
    var $id = 'code_box';//代码容器id(html)
    var $pop_params = 'outputcode';//代码容器id(html)
    var $app_path = null;
    var $fcpath = null;

    function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->helper(array('text', 'url', 'form', 'html'));
        $this->app_path = str_replace('\\', '/', FCPATH.APPPATH);
        $this->ref = new Reflectionobject($this->CI);
        $this->cls = $this->_get_class();
        $this->method = $this->_get_method();
        $this->fcpath = str_replace('\\', '/', FCPATH);
    }


    /**
     * 查看源代码 
     * 
     * @access public
     * @return void
     */
    function source_code()
    {
        if($this->CI->input->get($this->pop_params) != 1)
        {
            return true;
        }
        $spec_file = $this->CI->input->get('file');
        if($spec_file)
        {
            $filepath = $this->app_path.$this->CI->input->get('type').'/'.$spec_file;
            if(!preg_match('/\.php$/', $filepath))
            {
                $filepath .= EXT;
            }
        }
        else
        {
            $ref =& $this->ref;
            $filepath = $ref->getFileName();

            $mv = $this->get_model_view($filepath);
            $ul = $this->html_ul($mv);
        }

        $file = str_replace($this->fcpath, '', str_replace('\\', '/', $filepath));
        $ul = $ul ? $ul : '<span style="color:#FFF">No list! You can try search</span>'; 
        $code = "";
        if(is_file($file))
        {
            $code = $this->highlight_file($filepath);
        }
        else
        {
            $code = '<span style="color:#FFF">Dose not get source code file!</span>'; 
        }

        //search form
        $attributes = array('method' => 'get', 'id' => 'code_search_form');
        $hidden = array('outputcode' => 1);
        $searchform = form_open(site_url(), $attributes, $hidden);

        $options = array(
                  'models'   => 'models',
                  'views' => 'views'
                );

        $searchform .= form_dropdown('type', $options, 'models');
        
        $data = array(
              'name'        => 'file',
              'value'       =>  $spec_file,
              'style'       => 'width:400px;height:25px;',
              'maxlength'   => '100'
            );
        $searchform .= form_input($data);
        $searchform .= form_submit('mysubmit', 'Open');
        //search form end
		
        echo <<<EOF
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>{$file}</title> 
    </head>
    <body>
    <div 
            style="display:;font-size:14px;
                        id="{$this->id}">
        <p style="background-color:#ccc;"><input type="text" value="{$file}" style="margin-left:3px;width:85%;"/>
        <span><a href="javascript:;" id="toggle_mv" title="显示/隐藏 模型、视图列表">MV</a></span>
        <span><a href="javascript:;" id="toggle_search" title="显示/隐藏 搜索">Search</a></span>
        </p>
        <div id="code_search_box" style="display:none;"> 
        {$searchform}
        </form>
        </div>
        <div id="code_mv_box" style="display:none;"> {$ul} </div>
        {$code}
    </div>
    <script>
        function s(id){return !id ? null : document.getElementById(id);}
        function d(id){s(id).style.display = s(id).style.display == '' ? 'none' : '';} 
        s('toggle_mv').onclick = function(){d('code_mv_box')};
        s('toggle_search').onclick = function(){d('code_search_box')};
    </script>
    </body>
</html>
EOF;
        exit();
    }


    /**
     * 生成ul
     * 
     * @param mixed $arr 
     * @access public
     * @return void
     */
    function html_ul($arr, $is_pop = false)
    {
        $ul = '';
        foreach($arr as $k => $v)
        {
            $tmp = array();
            if(!$v)
            {
                continue;
            }
            foreach($v as $vk => $vv)
            {
                $pop_url = base_url().'?'.$this->pop_params.'=1&type='.$k.'&file='.$vv;
                if($is_pop)
                {
                    $pop_atts = array(
                          'id'         => 'popup_'.$this->id, 
                          'width'      => '800',
                          'height'     => '600',
                          'scrollbars' => 'yes',
                          'status'     => 'yes',
                          'resizable'  => 'yes',
                          'screenx'    => '0',
                          'screeny'    => '0'
                        );
                    $tmp[] = anchor_popup($pop_url, $vk, $pop_atts);

                }
                else
                {
                    $tmp[] = anchor($pop_url, $vk);
                }
            }
            $ul .= ul($tmp, array(
                'id' => 'ul_'.$k
            ));
        }
        return $ul;
    }

    /**
     * 解析一个控制器中的模型，与视图情况
     * 变量产生的视图名称忽略；比如$this->load->view($a); 
     * 
     * @param mixed $controller_file_name 
     * @access public
     * @return void
     */
    function get_model_view($controller_file_name)
    {
        $file = file_get_contents($controller_file_name);
        $models = array();
        $views = array();
        $mds = $this->CI->load->get_ci_models();
        foreach($mds as $m)
        {
            $models[$m] = $this->CI->$m->_parent_name;
        }

        $this->get_views($file, $views);
        return array(
            'models' => $models,
            'views' => $views
        );
    }

    /**
     * 解析视图调用 
     * 
     * @param mixed $str 
     * @param mixed $views 
     * @access public
     * @return void
     */
    function get_views($str, &$views)
    {
        preg_match_all('/\s*\$this\s*->\s*load\s*->\s*(view)\s*\(\s*(.*)\)/', $str, $res);
        //var_dump($res);
        foreach( $res[1] as $k => $v)
        {
            if($v == 'view')
            {
                $vs = explode(',', $res[2][$k]);
                $v  = trim($vs[0],"'\" \t\n\r\0");

                //special
                preg_match_all('/->\s*load\s*->\s*view\((.*)/', $vs[1], $res2);
                foreach($res2[1] as $v2)
                {
                     $v2 = trim($v2,"'\" \t\n\r\0");
                     $views[$v2] = $v2;
                }
                //special end

                if($v && strpos($v, '$') === false)
                {
                    $views[$v] = $v;
                } 
            }
        }   
    }

    /**
     * 当前调用方法的源代码 
     * 
     * @param mixed $params 
     * @access public
     * @return void
     */
    function reflect($params)
    {
        $ref =& $this->ref;
        $meds = $this->get_methods();
        $medcs = $this->highlight_code("\n   ".$meds[$this->method]['comment']."\n".$meds[$this->method]['method_text']);

        $pop_atts = array(
                      'id'         => 'popup_'.$this->id, 
                      'width'      => '800',
                      'height'     => '600',
                      'scrollbars' => 'yes',
                      'status'     => 'yes',
                      'resizable'  => 'yes',
                      'screenx'    => '0',
                      'screeny'    => '0'
                    );
        $curl = current_url(); 
        $pop_url = $curl.(strpos($curl, '?') > 0 ? '&':'?').$this->pop_params.'=1';
        $pop_anchor = anchor_popup($pop_url, 'popup', $pop_atts);

        $this->get_views($meds[$this->method]['method_text'], $views);
        $ul = $this->html_ul(array('views' => $views), true);

        $medcodes = $this->hot_key_js().'<div 
            style="display:;font-size:14px;
                    max-height: 500px;
                    overflow:scroll;
                    border:dashed 3px blue;z-index:99999;position:absolute;" 
                        id="'.$this->id.'">
                        <p style="float:right;">
                        <span style="float:left;margin-right:5px;">'.$pop_anchor.'</span>
                        <span style="float:left;margin-right:5px;"><!--<a href="javascript:;" id="close_'.$this->id.'" style="color:red;text-decoration:underline;">close</a>--></span>
                        </p>
                        <p>
                        '.$ul.'
                        </p>
                        '.$medcs.'
                        <p style="background-color:#ccc;"><input type="text" value="'.str_replace($this->fcpath, '', str_replace('\\', '/', $meds[$this->method]['file'])).'" style="margin-left:3px;width:95%;"/></p>
                        </div>'.$this->float_js();
		$this->CI->output->set_output(str_replace('</body>', $medcodes.'</body>', $this->CI->output->get_output() ));

    }

    function get_methods($only_self = true)
    {
        $ref = $this->ref;
        $method_list = $ref->getMethods();
        $methods = array();
        $file = null;
        $file_name = null;
        if(is_array($method_list))
        {
            foreach($method_list as $method)
            {
                $note = $only_self ? $this->is_running_class($method->class) : true;
                if($note)
                {
                    $mename = $method->getName();
                    $methods[$mename]['comment'] =  $method->getDocComment();
                    $methods[$mename]['file'] =  $method->getFileName();
                    $methods[$mename]['start_line'] =  $method->getStartLine();
                    $methods[$mename]['end_line'] =  $method->getEndLine();
                    if(($file_name !== $methods[$mename]['file']) && is_file($methods[$mename]['file']))
                    {
                        $file = file($methods[$mename]['file']);
                    }
                    if($file)
                    {
                        $methods[$mename]['method_text'] =  $this->get_method_text($methods[$mename]['start_line'],$methods[$mename]['end_line'],$file);
                    }
                }
            }
        }
        return $methods;
    }

    /**
     * 获取方法的代码 
     * 
     * @param mixed $method 
     * @param mixed $file 
     * @access public
     * @return void
     */
    function get_method_text($start_line, $end_line, &$file)
    {
        $mtext = '';
        for($i = $start_line-1; $i < $end_line; $i++)
        {
            $mtext .= $file[$i];
        }
        return $mtext;
    }

    function is_running_class($class_name)
    {
        return strcasecmp($this->cls, $class_name) == 0;
    }

    /**
     * 获取控制器
     * 
     * @access public
     * @return void
     */
    function _get_class()
    {
        return $this->CI->router->fetch_class();
    }

    /**
     * 获取调用的方法 
     * 
     * @access public
     * @return void
     */
    function _get_method()
    {
        return $this->CI->router->fetch_method();
    }

    /**
     * 取得继承关系 
     * 
     * @param Reflectionclass $refc 
     * @access public
     * @return void
     */
	function get_parents(Reflectionclass &$refc)
	{
        $rels = array($refc->getName());
        $tmp_cls = $refc->getParentClass();

        if(false === $tmp_cls)
        {
            return $rels;
        }
        else
        {
            while($tmp_cls && $tmp_cls instanceof Reflectionclass)
            {
                $rels[] = $tmp_cls->getName();
                $tmp_cls = $tmp_cls->getParentClass();
            }
            // reverse array
            $rels = array_reverse($rels);
        }
        return $rels;    
	}

    function hot_key_js()
    {
        return <<<EOF
<script>
/**********************************Source Code Support****************************************/
function LoadScript(url){document.write('<script type="text/javascript" src="'+url+'"><\/script>')}var jQueryIsLoaded=typeof jQuery!="undefined";if(!jQueryIsLoaded){LoadScript("http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js")}
//jquery 按键操作
$(document).bind('keyup',function(e){
    //console.log(e.keyCode)
    if(e.keyCode == 118) //F7
    {
        if(typeof a.Show == 'function') 
        {
        	hl();
            a.GetObject().IsShow ? a.Close() : a.Show();
            return;
        }
        $('#{$this->id}').toggle(); 
    }
    if(e.keyCode == 119) //F8
    {
        $('#popup_{$this->id}').click(); 
        return;
    }
    $('#close_{$this->id}').click(function(){
        $('#{$this->id}').hide(); 
    });
});

</script>
EOF;
    }

    function float_js()
    {
        return <<<AOE
<script>
var fi = {}; 
$(function(){
        var fi = n = window.fi;
        fi.floatUI = {
            MousePosition: function(n) {
                n = n || window.event;
                var i = n.pageX || n.clientX + document.body.scrollLeft,
                t = n.pageY || n.clientY + document.body.scrollTop;
                return {
                    positionX: i,
                    positionY: t
                }
            },
            ModeWindow: function() {
            function i() {
                function h(n) {
                    var t = n.ID,
                    i;
                    return t ? $("#" + t).length > 0 ? $("#" + t) : (i = n.Parent == null || $(n.Parent).length == 0 ? $("body") : $(n.Parent), i.append($("<div>").attr("id", n.ID).css(n.CSS)), $("#" + t)) : null
                }
                function f(n, t, i) {
                    return i = typeof i == "boolean" ? i: !1,
                    n.isSet = n.obj.html() == "" ? !1 : !0,
                    n && n.isSet && !i ? n: (i && (n.obj.html(""), n.obj.css(t.CSS)), n.obj.append($("<div>").attr("id", "w_uuid_" + t.ID).css(t.TitleCSS).html(t.Title)), n.obj.append($("<div>").attr("id", "content_uuid_" + t.ID).css(t.ContentCSS).html(t.Content)), n.obj.append($("<div>").css(t.StatusbarCSS).html(t.Statusbar)), n.isSet = !0, n.ID = t.ID, n.UUID = "w_uuid_" + t.ID, n.Option = t, n.Backover = c(n), n.Frameover = l(n), n.CloseIcon = r(n), n.Drag = s(n), n.IsShow = !1, n)
                }
                function r(n) {
                    var t, r, i;
                    if (n.Option.CloseIcon == null) return;
                    return t = n.Option.CloseIcon,
                    t.ImageSrc == null ? void 0 : (r = t.ImageSrc == "default" ? "static/images/main/close.gif": t.ImageSrc, i = "5px", $("#" + n.UUID).append($("<div>").attr("id", n.UUID + "_closeicon").css({
                        width: t.Width + "px",
                        height: t.Height + "px",
                        position: "absolute",
                        right: i,
                        top: i,
                        cursor: "pointer",
                        background: "url(" + r + ") no-repeat 0 0"
                    }).hover(function() {
                        $(this).css({
                            "background-position": "0 -42"
                        })
                    },
                    function() {
                        $(this).css({
                            "background-position": "0 0"
                        })
                    }).bind("click",
                    function() {
                        u(n, undefined, t.func)
                    })), $("#" + n.UUID + "_closeicon"))
                }
                function c(n) {
                    if (n.Option.Backover == !1) return null;
                    if ($("#MW_BACKOVER").length == 0) {
                        $("body").append($("<div>").attr("id", "MW_BACKOVER").css({
                            "background-color": "#ddd",
                            position: "fixed",
                            top: "0",
                            left: "0",
                            width: "100%",
                            height: "100%",
                            display: "none",
                            opacity: .3
                        }));
                        var i = !!indow.ActiveXObject,
                        t = i && !window.XMLHttpRequest;
                        t && $("#MW_BACKOVER").css({
                            position: "absolute"
                        })
                    }
                    return {
                        obj: $("#MW_BACKOVER"),
                        Show: function() {
                            var i = parseInt( + new Date / 1e3),
                            t = $(window).width() > $(document).width() ? $(window).width() : $(document).width(),
                            n = $(window).height() > $(document).height() ? $(window).height() : $(document).height();
                            $("#MW_BACKOVER").css({
                                width: t + "px",
                                height: n + "px",
                                "z-index": i,
                                display: "block"
                            })
                        },
                        Hide: function() {
                            $("#MW_BACKOVER").hide()
                        }
                    }
                }
                function l(n) {
                    return n.Option.Frameover == !1 ? null: ($("#MW_FRAMEOVER").length == 0 && $("body").append($("<div>").attr("id", "MW_FRAMEOVER").css({
                        "background-color": "#fff",
                        position: "absolute",
                        display: "none",
                        top: "0",
                        left: "0",
                        overflow: "hidden"
                    }).html('<iframe border="0" style="border:0;margin:0;"></iframe>')), {
                        obj: $("#MW_FRAMEOVER"),
                        Show: function() {
                            var f = 1,
                            t = n.obj,
                            e = t.outerWidth(),
                            u = t.outerHeight(),
                            i = t.offset().top,
                            r = t.offset().left;
                            $("#MW_FRAMEOVER").css({
                                width: e + "px",
                                height: u + "px",
                                "z-index": f,
                                top: i + "px",
                                left: r + "px",
                                display: "block"
                            })
                        },
                        Hide: function() {
                            $("#MW_FRAMEOVER").hide()
                        }
                    })
                }
                function e(n, t, i, r) {
                    var u = $.extend({},
                    o, t),
                    f,
                    l;
                    n.Backover != null && n.Backover.obj.css("display") == "none" && n.Backover.Show();
                    var s = "auto",
                    e = "auto",
                    c = "auto",
                    h = "auto";
                    if (u.reshow) return u.showType == "fade" ? n.obj.fadeIn("slow") : n.obj.show(),
                    n;
                    f = n.obj;
                    switch (u.position) {
                    case "center":
                        s = $(window).height() / 2 - f.height() / 2 + $(document).scrollTop() + u.relativeTop,
                        e = $(document).width() / 2 - f.width() / 2 + $(document).scrollLeft() + u.relativeLeft;
                        break;
                    case "abscenter":
                        s = $(document).height() / 2 - f.height() / 2 + $(document).scrollTop() + u.relativeTop,
                        e = $(document).width() / 2 - f.width() / 2 + $(document).scrollLeft() + u.relativeLeft;
                        break;
                    case "left-top-corner":
                        s = 0,
                        e = 0;
                        break;
                    case "left-bottom-corner":
                        e = 0,
                        h = 0;
                        break;
                    case "right-top-corner":
                        c = 0,
                        s = 0;
                        break;
                    case "right-bottom-corner":
                        c = 0,
                        h = 0;
                        break;
                    case "bindto":
                        u.bindObject.length != 0 ? (s = u.bindObject.offset().top + u.relativeTop, e = u.bindObject.offset().left + u.relativeLeft) : (s = $(window).height() / 2 - f.height() / 2 + $(document).scrollTop() + u.relativeTop, e = $(document).width() / 2 - f.width() / 2 + $(document).scrollLeft() + u.relativeLeft);
                        break;
                    default:
                        s = $(window).height() / 2 - f.height() / 2 + $(document).scrollTop() + u.relativeTop,
                        e = $(document).width() / 2 - f.width() / 2 + $(document).scrollLeft() + u.relativeLeft
                    }
                    return l = parseInt( + new Date / 1e3 + 1),
                    f.css({
                        top: s == "auto" ? s: s + "px",
                        left: e == "auto" ? e: e + "px",
                        right: c == "auto" ? c: c + "px",
                        bottom: h == "auto" ? h: h + "px",
                        "z-index": l
                    }),
                    u.showType == "fade" ? f.fadeIn("slow", r) : f.show(r),
                    n.Frameover != null && n.Frameover.obj.css("display") == "none" && n.Frameover.Show(),
                    n.IsShow = !0,
                    n
                }
                function u(n, t, r) {
                    n.obj.hide(0, r),
                    n.Frameover != null && n.Frameover.Hide(),
                    n.IsShow = !1;
                    if (i.length > 0) {
                        for (var u = 0; u < i.length; u++) if (n != i[u] && i[u].IsShow && i[u].Backover != null) return n; (typeof t == "undefined" || t && typeof t == "boolean" && t == !1) && n.Backover != null && n.Backover.Hide()
                    }
                    return n
                }
                function s(t) {
                    if (!t.Option.Drag) return ! 1;
                    var u = $("#" + t.UUID),
                    r = window._IS_WINDOW_MOVING || !1,
                    i = t.Option.Parent == null || $(t.Option.Parent).length == 0 ? $("body") : $(t.Option.Parent);

                    return t.obj.bind("mousedown", function() {
                        var i = parseInt( + new Date / 1e3) + 1,
                        t = $(this).position().left + "px",
                        n = $(this).position().top + "px";
                        $(this).css({
                            "z-index": i,
                            left: t,
                            top: n,
                            right: "auto",
                            bottom: "auto"
                        })
                    }),
                    u.bind("mousedown", function(u) {
                        if (r) return ! 1;
                        r = !0;
                        var o = n.floatUI.MousePosition(u),
                        s = o.positionX,
                        h = o.positionY,
                        f = t.obj.position().top,
                        e = t.obj.position().left,
                        c = parseInt( + new Date / 1e3);
                        t.obj.css({
                            opacity: .5
                        }),
                        $(document).mousemove(function(u) {
                            var l, a;
                            if (!r) return ! 1;
                            window.getSelection ? window.getSelection().removeAllRanges() : document.selection.empty();
                            var y = n.floatUI.MousePosition(u),
                            w = y.positionX,
                            b = y.positionY,
                            v = w - s,
                            p = b - h,
                            o = f + p <= i.offset().top && !t.Option.ContainOut ? i.offset().top: f + p,
                            c = e + v <= i.offset().left && !t.Option.ContainOut ? i.offset().left: e + v;
                            return t.Option.ContainOut || (t.Option.Parent == null || $(t.Option.Parent).length == 0 ? (l = $(window).width() < $(document).width() ? $(window).width() : $(document).width(), a = $(window).height() < $(document).height() ? $(window).height() : $(document).height()) : (l = i.outerWidth(), a = i.outerHeight()), o = o >= a - t.obj.outerHeight() + i.offset().top ? a - t.obj.outerHeight() + i.offset().top: o, c = c >= l - t.obj.outerWidth() + i.offset().left ? l - t.obj.outerWidth() + i.offset().left: c),
                            t.obj.css({
                                left: c + "px",
                                top: o + "px"
                        }),

                            !1
                        }),
                        $(document).mouseup(function() {
                            return r = !1,
                            t.obj.css({
                                opacity: 1
                            }),
                            $(this).unbind("mousemove").unbind("mouseup"),
                            !1
                        })
                    }),
                    t
                }
                var t = {
                    ID: null,
                    Title: "ModeWindow - MacroX",
                    Content: "Text in content",
                    Statusbar: null,
                    Parent: null,
                    CloseIcon: {
                        ImageSrc: "default",
                        Width: 16,
                        Height: 16,
                        func: null
                    },
                    Backover: !0,
                    Frameover: !1,
                    Drag: !1,
                    ContainOut: !1,
                    CSS: {
                        border: "1px solid #ddd",
                        display: "none",
                        padding: "1px",
                        position: "absolute",
                        "background-color": "#fff"
                    },
                    TitleCSS: {
                        "text-indent": "20px",
                        "font-size": "14px",
                        color: "#fff",
                        "background-color": "#aaa",
                        "line-height": "22px",
                        height: "22px",
                        position: "relative"
                    },
                    ContentCSS: {
                        padding: "16px 20px",
                        "line-height": "18px"
                    },
                    StatusbarCSS: {}
                },
                o = {
                    reshow: !1,
                    showType: "fade",
                    position: "center",
                    relativeTop: 0,
                    relativeLeft: 0,
                    bindObject: null
                },
                i = [];
                return function(n) {
                    var o = null,
                    s = $.extend({},
                    t, n),
                    c;
                    s.CSS = $.extend({},
                    t.CSS, n.CSS),
                    s.TitleCSS = $.extend({},
                    t.TitleCSS, n.TitleCSS),
                    s.ContentCSS = $.extend({},
                    t.ContentCSS, n.ContentCSS),
                    s.CloseIcon = $.extend({},
                    t.CloseIcon, n.CloseIcon),
                    c = null,
                    o = h(s);
                    if (!o) {
                        throw new Error("Error : [fi.floatUI.ModeWindow] Option.ID is undefined");
                        return ! 1
                    }
                    o = {
                        obj: o,
                        isSet: !1
                    },
                    o = f(o, s, !1);
                    if (!o.isSet) {
                        throw new Error("Error : [fi.floatUI.ModeWindow] Window Object is unconstructed");
                        return ! 1
                    }
                    return i.push(o),
                    {
                        GetObject: function() {
                            return o
                        },
                        Show: function(n, t) {
                            typeof t != "function" && (t = null),
                            o = e(o, n, c, t),
                            c == null && (c = n)
                        },
                        Close: function(n, t) {
                            typeof t != "function" && (t = null),
                            o = u(o, n, t)
                        },
                        Reload: function(n, i) {
                            var r = $.extend({},
                            t, n);
                            r.CSS = $.extend({},
                            t.CSS, n.CSS),
                            r.TitleCSS = $.extend({},
                            t.TitleCSS, n.TitleCSS),
                            r.ContentCSS = $.extend({},
                            t.ContentCSS, n.ContentCSS),
                            o = f(o, r, !0),
                            o = this.Show(i)
                        },
                        SetContent: function(n) {
                            var t = "content_uuid_" + o.ID;
                            $("#" + t).length == 1 && $("#" + t).html(n)
                        },
                        SetTitle: function(n) {
                            var t = "w_uuid_" + o.ID;
                            $("#" + t).length == 1 && ($("#" + t).html(n), r(o))
                        }
                    }
                }
            }
            var t = null;
            return function(n) {
                return t == null && (t = i()),
                t(n);
            }
        } ()
    }
});
$(function(){
 
a=fi.floatUI.ModeWindow({
						ID: "ifloat",
						Title: "Source Code",
						Content: "",
						Backover: false,
						Frameover: false,
						Drag: true,
						ContainOut: false,
						CSS: {
							"width": "545px",
                            "height": "400px",
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
							"background-color": "#FFF",
							"padding": "15px",
                            "height" : "339px",
                            "overflow-y": "scroll",
							"line-height": "18px",
                            "text-align": "left"
						}
                    });
                    //a.Show();
                    a.SetContent($('#{$this->id}').html());
});
</script>
AOE;
    }
	
	function highlight_file($filepath)
	{
		$code = @file_get_contents($filepath);
		if($code)
		{
			$code = $this->highlight_code($code);
		}
		return $code;
	}
	
	function highlight_code($code, $type = 'php')
	{
		return <<<EOF
		<pre class="brush:{$type};toolbar:true;">
		{$code}
		</pre>
EOF;
	}

}



/* End of file href.php */
/* Location: ./blog/hooks/href.php */
