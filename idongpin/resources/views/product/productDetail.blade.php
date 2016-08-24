@extends('layouts.product_header')

@section('title')
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="{{url('css/product/productDetail.css')}}">
@endsection
@section('content')
	<div class="container">
		<div class="goods">
			<div class="goodsTtl">{{isset($prodetail['pro_info']['proinfo_desc']["property_value"])?$prodetail['pro_info']['proinfo_desc']["property_value"]:""}}</div>
			<div class="goodsDetail">
				<div class="bigImg">
					@if(count($images['pro_img'])!="")
						<img src="{{url($images['pro_img'][0])}}">
					@endif
				</div>
				<div class="goodsInfo">
					<div class="topInfoBar">
						<div class="price">
							<div class="topic">指导价格：</div>
							{{--@foreach($inventory as $key=>$value)--}}
								@if(isset($prodetail['pro_detail_info']['pro_unitPrice']['property_value'])&& $prodetail['pro_detail_info']['pro_unitPrice']['property_value']!= 0)
									<div class="content"><span class="rmb">￥</span><span class="cost">{{$prodetail['pro_detail_info']['pro_unitPrice']['property_value']}}</span></div>
								@else
									<div class="content"><span class="rmb"></span><span class="cost">电询</span></div>
								@endif
						</div>
						{{--<div class="buyLimit">--}}
							{{--<div class="topic">起批量：</div>--}}
							{{--@foreach($inventory as $key=>$value)--}}
								{{--<div class="content">≥{{$value->wholesale_amount.$value->wholesale_unit}}起批</div>--}}
							{{--@endforeach--}}
						{{--</div>--}}
					</div>
					<div class="stock">
						<div class="topic">{{isset($prodetail['pro_info']['proinfo_inventory']['property_text'])?$prodetail['pro_info']['proinfo_inventory']['property_text']:""}}：</div>
						<div class="content">{{isset($prodetail['pro_info']['proinfo_inventory']['property_value'])?$prodetail['pro_info']['proinfo_inventory']['property_value']:""}}</div>
					</div>
					<div class="package">
						<div class="topic">{{isset($prodetail['pro_info']['proinfo_packing']['property_text'])?$prodetail['pro_info']['proinfo_packing']['property_text']:""}}：</div>
						<div class="content">{{isset($prodetail['pro_info']['proinfo_packing']['property_value'])?$prodetail['pro_info']['proinfo_packing']['property_value']:""}}</div>
					</div>
					<div class="contact">
						<div class="topic">联系方式</div>
						<div class="content">
							@if(!Auth::guest())
								{{isset($company['attributes']['company_mobile'])?$company['attributes']['company_mobile']:""}}
							@endif
							{{--<span>{{isset($company['attributes']['company_phone'])?$company['attributes']['company_phone']:""}}</span>--}}
						</div>
					</div>
					@if(Auth::guest())
						<div class="getContactWay" onclick="window.location.href='{{url('/login')}}'">登陆后获取联系方式</div>
					@endif
					{{--@else--}}
						{{--<div class="ContactWay">{{isset($company['attributes']['company_mobile'])?$company['attributes']['company_mobile']:""}}</div>--}}
					{{--@endif--}}
				</div>
				<div class="clear"></div>
			</div>
			<div class="moreImg">
				@if(count($images['pro_img'])!="")
					@foreach($images['pro_img'] as $key => $value)
						<div class="smallPic"><img src="{{$value}}"></div>
					@endforeach
				@endif
			</div>
		</div>

		<div class="aboutGoods">
			<div class="detail activeInfo" data-flag="detail">详细信息</div>
			@if(isset($prodetail['pro_detail_info']['pro_whether_import']['property_value']))
				@if($prodetail['pro_detail_info']['pro_whether_import']['property_value'] =="是")
					<div class="credentials" data-flag="credentials">进口单证</div>
				@endif
			@endif

		</div>
		<div class="detailInfo">
			@if(isset($prodetail['pro_detail_info']['pro_whether_import']['property_value']))
				@if($prodetail['pro_detail_info']['pro_whether_import']['property_value'] =="是")
					<div class="importInfo">进口信息</div>
					<ul class="info">
						@foreach($prodetail['pro_import_info'] as $key => $value)
							<li>
								<div class="title">{{$value['property_text']}}</div>
								<div class="value">{{$value['property_value']}}</div>
							</li>
						@endforeach
					</ul>
				@endif
			@endif
			<div class="clear"></div>
		</div>
		<div class="block introduceMode" data-flag="detail">
			<div class="notes">
				<ul class="detail">
					@if(isset($prodetail['pro_detail_info']))
						@foreach($prodetail['pro_detail_info'] as $key => $value)
							@if($key != 'pro_name' && $key != 'pro_count' && $key != 'pro_mode' &&$key!='pro_unitPrice'&&$key!='pro_regularPrice')
								<li>
									<div class="title">{{$value['property_text']}}</div>
									<div class="value">{{$value['property_value']}}</div>
								</li>
							@endif
						@endforeach
					@endif
				</ul>
			</div>
			{{--<div class="noteItem">--}}
			{{--<div class="firstNote">--}}
			{{--<div class="noteTtlBar">建议零售价</div>--}}
			{{--<div class="noteContent">￥<span>100g</span></div>--}}
			{{--</div>--}}
			{{--</div>--}}
			<div class="introduce">
				@if(isset($images['prodetail_img']))
					@if(count($images['prodetail_img'])!="")
						<img src="{{url($images['prodetail_img'][0])}}">
					@endif
				@endif
			</div>
		</div>
		<div class="block certificateMode" data-flag="credentials">
			<div class="certificateTtl">进口单证</div>
			<div class="certificateImg">
				@if(isset($images['import_img']))
					@if(count($images['import_img'])!="")
						<img src="{{url($images['import_img'][0])}}">
					@endif
				@endif
			</div>
		</div>
	</div>
@endsection

@section('javascript')
	<script type="text/javascript" src="{{url('js/PublicDomain.js')}}"></script>
	<script type="text/javascript" src="{{url('js/product/productDetail.js')}}"></script>
@endsection