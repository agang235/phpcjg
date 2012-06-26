<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->db = $this->load->database('test', TRUE);
		$this->load->library('php_excel');
	}
	
	function index()
	{

	}

    function t()
    {
        $html = <<<EOF
<div style="font-size:14px; padding-bottom:7px;" class="Al_120"></div><div class="ad_in_content"></div>
<P>&nbsp;&nbsp;&nbsp; 全球第一款双核<font style="color:#333">手机</font><font style="color:#333">LG</font> <font style="color:#333">Optimus 2X</font>发布才一年不到的时间，全球的双核手机在这不到一年的时间里突飞猛进，不仅数量上达到了数十款之多，而且所涉及的双核方案从最初的<font style="color:#333">NVIDIA</font> Tegra 2一直到现在的四家方案齐头并进。双核手机作为<font style="color:#333">智能手机</font>不断进化的一个闪耀标志，也代表着现在智能手机在性能上的最高水平，牢牢的占据着智能手机的金字塔顶端。虽然双核手机普遍定位较高，不过市场上的售价不仅探至5000元级别，更有下潜到2000元以内的双核手机，也充分说明了双核手机内部的激烈竞争。到了2012年的1月，我们正好对2011年的双核智能手机进行全面的横向评测，下面给大家带来的就是2011年15款双核手机横向评测。</P>
<P align=center><br clear="all"  style="font-size:0;line-height:0"/><img src="http://www.seyoyo.com/attachment/platts/2012/06/25/seyoyo_android_MOTOone44059.jpg><BR>15款双核手机横评</P>
<P>&nbsp;&nbsp;&nbsp; 2011年，双核<font style="color:#333">产品</font>在平板上更加普及，双核智能手机才是重点，而且成为厂商主打和网友热捧。在这一年里，虽然有<font style="color:#333">苹果iPhone 4</font>S这样的i OS系统双核手机，不过不算主流，<font style="color:#333">Android</font>系统才是王道，占有绝对的比例。因此，选择2011年推出的15款双核手机，一方面出于统一测试口径，另一方面紧跟市场的实际表现，我们选取了15款Android系统双核手机，这15款Android系统双核手机也是从20来款入选的双核手机之中选取的票数最高的前15款，是网友所广泛认可的优质产品。这15款双核手机不仅有<font style="color:#333">三星</font>、<font style="color:#333">摩托罗拉</font>、戴尔这样的国际大牌，更是有国内呼声极高的<font style="color:#333">酷派</font>、<font style="color:#333">魅族</font>和<font style="color:#333">小米</font>，涉及到高通、德仪、NVIDIA和三星四大双核平台，这15款Android系统双核智能手机分别是（按得票多少排序）：</P>
<P align=center><img src="http://www.seyoyo.com/attachment/platts/2012/06/25/seyoyo_android_MOTOone44061.jpg><BR>入选本次横评的15款双核手机</P>
<P>魅族<font style="color:#333">MX</font><BR><font style="color:#333">小米手机</font><BR>三星GALAXY SⅡI9100<BR>三星<font style="color:#333">GALAXY Note</font> <font style="color:#333">I9220</font><BR>摩托罗拉RAZR XT910<BR><font style="color:#333">HTC</font>灵感XE<BR>HTC灵感<BR>三星GALAXY Nexus<BR>摩托罗拉Atrix ME860<BR>HTC夺目3D<BR>摩托罗拉Atrix2 ME865<BR>摩托罗拉里程碑3 <font style="color:#333">XT883</font><BR>酷派大观9900<BR><font style="color:#333">天语阿里云</font><BR>戴尔Streak Pro D43</P>
<P>&nbsp;&nbsp;&nbsp; 本次入选的15款Android系统双核手机代表着目前移动通信行业最强的工业制造能力和市场竞争力，双核手机某种程度上已经成为智能手机高端与中端的分水岭，也代表着未来智能手机的发展方向。如果大家想要对2011年的双核智能手机有一个清晰的盘点与回顾，或者对2012年双核手机发展有所希冀，可以移步《四家芯片巨头带路 2011双核手机现状分析 》和《多核多方决杀 2012年双核手机市场展望 》两篇文章。</P>
<P></P></div>


  

<div style="font-size:14px; padding-bottom:7px;" class="Al_120"></div><div class="ad_in_content"></div>
<P></P>
<P>双核<font style="color:#333">手机</font>评测规范</P>
<P>&nbsp;&nbsp;&nbsp; <font style="color:#333">中关村在线</font>手机频道每年的年末都会推出当年的手机横评，分门别类的横评覆盖单系统<font style="color:#333">智能手机</font>横评、多媒体手机横评、跨界手机横评等诸多领域，不过双核手机由于是2011年才诞生，因此是历史第一次。而双核手机最突出的则是性能方面，因此我们的评测规范里，性能的表现占据较大的分值，以下是我们的评测规范：</P>
<P align=center><br clear="all"  style="font-size:0;line-height:0"/><img src="http://www.seyoyo.com/attachment/platts/2012/06/25/seyoyo_android_MOTOone44063.jpg><BR>双核手机更多的还是需要强调性能</P>
<P>1：外观和工业设计</P>
<P>2：屏幕表现素质</P>
<P>3：UI界面设计</P>
<P>4：多媒体素质</P>
<P>5：续航能力</P>
<P>6：性能测试</P>
<P>7：个性功能</P>
<P>8：编辑整体打分</P>
<P>除性能测试环节占有最关键的30分以外，其它各项均为10分。</P></div>


  

<div style="font-size:14px; padding-bottom:7px;" class="Al_120"></div><div class="ad_in_content"></div>
</P>
<P>外观和设计对比</P>
<P>&nbsp;&nbsp;&nbsp; 外观和工业设计方面，历来是主观而且感性的评比环节，然而我们毕竟还是有相对靠谱的评测规范，超薄设计、金属或复合材质、康宁玻璃、三防设计和多种颜色可选都是为<font style="color:#333">手机</font>的工业设计和外观受欢迎度加分的地方。在打分过程之中，笔者将这5项重要的选项作为外观和工业设计的核心参考标准，每项最高可获得2分，结果如下：</P>
<P>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
<br clear="all"  style="font-size:0;line-height:0"/><TABLE style="WIDTH: 433.1pt; BORDER-COLLAPSE: collapse; MARGIN-LEFT: 4.65pt" border=0 cellSpacing=0 cellPadding=0 width=577>
<TBODY>
<TR style="HEIGHT: 17.25pt">
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: windowtext 1pt solid; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 114.15pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #f79646; HEIGHT: 17.25pt; BORDER-TOP: windowtext 1pt solid; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=152 noWrap>
<P align=left><SPAN style="COLOR: black; FONT-SIZE: 9pt">手机型号</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.65pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #f79646; HEIGHT: 17.25pt; BORDER-TOP: windowtext 1pt solid; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=left><SPAN style="COLOR: black; FONT-SIZE: 9pt">超薄外形</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 70.85pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #f79646; HEIGHT: 17.25pt; BORDER-TOP: windowtext 1pt solid; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=94 noWrap>
<P align=left><SPAN style="COLOR: black; FONT-SIZE: 9pt">金属复合材质</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.6pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #f79646; HEIGHT: 17.25pt; BORDER-TOP: windowtext 1pt solid; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=left><SPAN style="COLOR: black; FONT-SIZE: 9pt">康宁玻璃</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.65pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #f79646; HEIGHT: 17.25pt; BORDER-TOP: windowtext 1pt solid; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=left><SPAN style="COLOR: black; FONT-SIZE: 9pt">三防设计</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.6pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #f79646; HEIGHT: 17.25pt; BORDER-TOP: windowtext 1pt solid; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=left><SPAN style="COLOR: black; FONT-SIZE: 9pt">多色可选</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.6pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #f79646; HEIGHT: 17.25pt; BORDER-TOP: windowtext 1pt solid; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=left><SPAN style="COLOR: black; FONT-SIZE: 9pt">总得分</SPAN></P></TD></TR>
<TR style="HEIGHT: 17.25pt">
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: windowtext 1pt solid; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 114.15pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=152 noWrap>
<P align=left><SPAN style="COLOR: black; FONT-SIZE: 9pt"><font style="color:#333">魅族</font><font style="color:#333">MX</font></SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.65pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">1</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 70.85pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=94 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">1</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.6pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">0</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.65pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">0</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.6pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">0</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.6pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">2</SPAN></P></TD></TR>
<TR style="HEIGHT: 17.25pt">
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: windowtext 1pt solid; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 114.15pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=152 noWrap>
<P align=left><SPAN style="COLOR: black; FONT-SIZE: 9pt"><font style="color:#333">小米手机</font></SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.65pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">0.5</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 70.85pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=94 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">1</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.6pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">0</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.65pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">0</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.6pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">1</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.6pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">2.5</SPAN></P></TD></TR>
<TR style="HEIGHT: 17.25pt">
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: windowtext 1pt solid; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 114.15pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=152 noWrap>
<P align=left><SPAN style="COLOR: black; FONT-SIZE: 9pt"><font style="color:#333">三星</font>GALAXY SⅡ I9100</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.65pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">1.5</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 70.85pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=94 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">1.5</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.6pt; PADDING-RIGHT: 5.4pt; BACKGROUND: red; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">2</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.65pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">0</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.6pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">1</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.6pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">6</SPAN></P></TD></TR>
<TR style="HEIGHT: 17.25pt">
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: windowtext 1pt solid; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 114.15pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=152 noWrap>
<P align=left><SPAN style="COLOR: black; FONT-SIZE: 9pt">三星<font style="color:#333">GALAXY Note</font> <font style="color:#333">I9220</font></SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.65pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">1.5</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 70.85pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=94 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">1.5</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.6pt; PADDING-RIGHT: 5.4pt; BACKGROUND: red; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">2</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.65pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">0</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.6pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">1</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.6pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">6</SPAN></P></TD></TR>
<TR style="HEIGHT: 17.25pt">
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: windowtext 1pt solid; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 114.15pt; PADDING-RIGHT: 5.4pt; BACKGROUND: red; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=152 noWrap>
<P align=left><SPAN style="COLOR: black; FONT-SIZE: 9pt"><font style="color:#333">摩托罗拉</font>RAZR XT910</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.65pt; PADDING-RIGHT: 5.4pt; BACKGROUND: red; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">2</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 70.85pt; PADDING-RIGHT: 5.4pt; BACKGROUND: red; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=94 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">2</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.6pt; PADDING-RIGHT: 5.4pt; BACKGROUND: red; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">2</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.65pt; PADDING-RIGHT: 5.4pt; BACKGROUND: red; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">1</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.6pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">1</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.6pt; PADDING-RIGHT: 5.4pt; BACKGROUND: red; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">8</SPAN></P></TD></TR>
<TR style="HEIGHT: 17.25pt">
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: windowtext 1pt solid; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 114.15pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=152 noWrap>
<P align=left><SPAN style="COLOR: black; FONT-SIZE: 9pt"><font style="color:#333">HTC</font></SPAN><SPAN style="COLOR: black; FONT-SIZE: 9pt">灵感XE</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.65pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">1</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 70.85pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=94 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">1.5</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.6pt; PADDING-RIGHT: 5.4pt; BACKGROUND: red; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">2</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.65pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">0</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.6pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">1</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.6pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">5.5</SPAN></P></TD></TR>
<TR style="HEIGHT: 17.25pt">
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: windowtext 1pt solid; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 114.15pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=152 noWrap>
<P align=left><SPAN style="COLOR: black; FONT-SIZE: 9pt">HTC</SPAN><SPAN style="COLOR: black; FONT-SIZE: 9pt">灵感</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.65pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">1</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 70.85pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=94 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">1.5</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.6pt; PADDING-RIGHT: 5.4pt; BACKGROUND: red; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">2</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.65pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">0</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.6pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">1</SPAN></P></TD>
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.6pt; PADDING-RIGHT: 5.4pt; BACKGROUND: #92cddc; HEIGHT: 17.25pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign=bottom width=66 noWrap>
<P align=right><SPAN style="COLOR: black; FONT-SIZE: 9pt">5.5</SPAN></P></TD></TR>
<TR style="HEIGHT: 17.25pt">
<TD style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: windowtext 1pt solid; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 114.15pt; PADDING-dd
EOF;
        header("Content-type: text/html; charset=utf-8");  
        $html = tidy_html($html); //tidy html
        $search = array(
            '/(<[^\>].*?)(style\s*=\s*([\'"]).*?\\3)(.*?>)/is',  //行内样式
            '/(<[^\>].*?)(class\s*=\s*([\'"]).*?\\3)(.*?>)/is',  //样式类名
            '/<style[^>]*>.*?<\/style>/is',                      //插入样式
            '/<script[^>]*>.*?<\/script>/is',                     //script
            '/<a[^>]*>(.*?)<\/a>/is',                              //A标签
        );
        $replace = array(
            "$1$4",
            "$1$4",
            "",
            "",
            "$1", //a标签的内容
        );
        $html = preg_replace($search, $replace, $html);
        echo $html;
        exit();
    }
}
