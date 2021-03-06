@extends('wx.layouts.master')
@section('title')
  @include('wx.layouts._title_category')
@stop
@section('headcss')

@stop
@section('content')
<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left lbd-all-kinds-nav"></a>
    <h1 class="mui-title">领淘宝优惠券</h1>
</header>
@include('wx.layouts._footer_tab')

<div class="mui-content">
		<div id="slider" class="mui-slider lbd-coupon-take-box">
			<div id="sliderSegmentedControl" class="mui-slider-indicator mui-segmented-control mui-segmented-control-inverted">
				<a class="mui-control-item mui-active" href="#item1mobile">淘口令方式</a>
        @if($showClient)
				<a class="mui-control-item" href="#item2mobile">链接方式</a>
        @endif
			</div>
      @if($showClient)
			<div id="sliderProgressBar" class="mui-slider-progress-bar mui-col-xs-6" style="background-color: #ED2A7A;"></div>
      @else
      <div id="sliderProgressBar" class="mui-slider-progress-bar mui-col-xs-12" style="background-color: #ED2A7A;"></div>
      @endif
			<div class="mui-slider-group">
				<div id="item1mobile" class="mui-slider-item mui-control-content mui-active" style="min-height: 400px; background-color: #fff;">
					<div id="scroll1" class="mui-scroll-wrapper-bak">
						<div class="mui-scroll-bak">
							<ul class="mui-table-view">
								<li class="mui-table-view-cell">
									<textarea rows="3" id="lbd-tpwd" style="margin-bottom: 0px;">淘口令：{{ $tpwd }}</textarea>
								    <div class="mui-button-row">
								        <button type="button" id="lbd-tpwd-copy" data-clipboard-action="copy" data-clipboard-target="#lbd-tpwd" class="mui-btn mui-btn-yellow lbdTpwdCopy" >复制淘口令</button>
								    </div>
								    <p id="lbd-tips" style="margin-top: 10px; color: red; display: none;">复制失败，请手动复制淘口令</p>
								</li>
								<li class="mui-table-view-cell">
									<h5>淘口令使用说明：</h5>
									<p>
										1.如果手机有淘宝APP，则可以使用此方式。否则，建议使用链接方式领取优惠券。<br />
										2.领券步骤：<br>
										&nbsp;&nbsp;&nbsp;&nbsp;a.点击【复制淘口令】按钮<br />
										&nbsp;&nbsp;&nbsp;&nbsp;b.打开手机淘宝APP<br />
										&nbsp;&nbsp;&nbsp;&nbsp;c.在淘宝APP内领券下单<br />
										3.优惠券有使用期限，过期作废，请尽快下单。
									</p>
								</li>
							</ul>
						</div>
					</div>
				</div>
        @if($showClient)
				<div id="item2mobile" class="mui-slider-item mui-control-content" style="min-height: 400px; background-color: #fff;">
					<div id="scroll2" class="mui-scroll-wrapper-bak">
						<div class="mui-scroll-bak">
							<ul class="mui-table-view">
								<li class="mui-table-view-cell">
								    <div class="mui-button-row" id="lbd-coupon-take-link">
								        <button  class="mui-btn mui-btn-yellow mui-btn-block">立即领券</button>
								    </div>
								</li>
								<li class="mui-table-view-cell">
									<h5>链接方式领券使用说明：</h5>
									<p>
										1.如果手机没有淘宝APP，则可以使用此方式。否则，建议使用淘口令方式领取优惠券。<br />
										2.领券步骤：<br>
										&nbsp;&nbsp;&nbsp;&nbsp;a.点击【立即领券】按钮<br />
										&nbsp;&nbsp;&nbsp;&nbsp;b.在出现的淘宝领券页面领取优惠券<br />
										&nbsp;&nbsp;&nbsp;&nbsp;c.登录淘宝下单即可享受优惠<br />
										3.优惠券有使用期限，过期作废，请尽快下单。
									</p>
								</li>
							</ul>
						</div>
					</div>

				</div>
        @endif
			</div>
		</div>

	</div>
@stop
@section('footJs')
<script src="/wxstyle/js/clipboard.min.js"></script>
<script type="text/javascript" charset="utf-8">
  mui.init();
  @if($showClient)
  var a = '{{ $linkPara[0] }}';
  var b = '{{ $linkPara[1] }}';
  var c = '{{ $linkPara[2] }}';
  var d = '{{ $linkPara[3] }}';
  mui('#lbd-coupon-take-link').on('tap', 'button', function() {
    document.location.href = a+b+c+d
  });
  @endif
  // 复制淘口令的操作
      var clipboard = new ClipboardJS('.lbdTpwdCopy');

      clipboard.on('success', function(e) {
        document.getElementById('lbd-tpwd-copy').innerHTML = '复制成功！'
        document.getElementById('lbd-tpwd-copy').style.backgroundColor = 'green'
          console.log(e);
      });

      clipboard.on('error', function(e) {
        document.getElementById('lbd-tpwd-copy').innerHTML = '复制失败！'
        document.getElementById('lbd-tpwd-copy').style.backgroundColor = 'red'
        document.getElementById('lbd-tips').style.display = ''
          console.log(e);
      });
</script>
@stop
