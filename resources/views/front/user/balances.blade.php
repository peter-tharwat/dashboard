@extends('layouts.user')
@section('user-content')
@php
$balances = \App\Models\Balance::where('status','DONE')->where('user_id',auth()->user()->id)->orderBy('id','DESC')->paginate(12);
@endphp
@if(is_countable($balances) && count($balances)==0)
<div class="col-12 p-4 mb-3 d-flex align-items-center justify-content-center" style="background: #fff;border-radius: 8px;min-height: 40vh;">
	<div class="col-12 text-center">
		<span class="fal fa-sack-dollar mx-2 font-12 " style="opacity:0.3"></span>
		<div class="col-12 text-center py-3">
			لا توجد معاملات مالية على حسابك
		</div>
		<div class="col-12 p-2 text-center">
			<a data-fancybox="dialog" data-src="#recharge-balance" class="btn btn-outline-warning rounded-pill font-2 px-8"><span class="fal fa-sack-dollar mx-2"></span> شحن الرصيد</a>
		</div>
	</div>
		
</div>
@else


<div class="col-12 p-2 text-center">
    <a data-fancybox="dialog" data-src="#recharge-balance"  class="btn btn-outline-warning rounded-pill font-2 px-8"><span class="fal fa-sack-dollar mx-2"></span> شحن الرصيد</a>
</div>

@foreach($balances as $balance)
<div class="col-12 col-lg-6 p-2 mb-0">
<div class="col-12 p-3  row d-flex position-relative border-dashed" style="background: #fff;border-radius: 8px;overflow: hidden;">
	@if($balance->source=="GIFT")
	<span class="text-center d-flex align-items-center justify-content-center pb-1" style="background:#ff9800!important;width:280px;color: #fff;left: -112px;transform: rotate(315deg);position: absolute;top:20px">هدية</span>
	@endif
	<div class="col-12 py-2 px-0 row">
		<div class="col-12 col-lg-6 p-0 font-1">
			<span class="fal fa-bars" style="width:18px"></span> <span class="mx-2">كود {{date('y')}}{{$balance->id}}</span>
		</div>
		<div class="col-12 col-lg-6 p-0 font-1">
			<span class="fal fa-sack-dollar" style="width:18px"></span> <span class="mx-2">المبلغ {{sprintf('%0.2f', $balance->amount)}}$</span>
		</div>
		<div class="col-12 col-lg-6 p-0 font-1">
			<span class="fal fa-sack-dollar" style="width:18px"></span> <span class="mx-2">{{$balance->type=="RECHARGE"?"شحن":"استهلاك"}}</span>
		</div>
		<div class="col-12 col-lg-6 p-0 font-1">
			<span class="fal fa-tally" style="width:18px"></span> <span class="mx-2">المصدر {{$balance->source}}</span>
		</div>
	 
		
	</div>
</div>
</div>
@endforeach

<div class="col-12 p-2">
	{{$balances->links()}}
</div>


@endif
@endsection