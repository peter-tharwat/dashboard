@extends('layouts.admin')
@section('content')
<style type="text/css">
	.ticket-resolved{
		background: #effff0!important;
	}
</style>
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">
	 
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-contacts"></span> الاتصالات
				</div>
				<div class="col-12 col-lg-4 p-0">
				</div>
			</div>
			<div class="col-12 divider" style="min-height: 2px;"></div>
		</div>

		<div class="col-12 py-2 px-2 row">
			<div class="col-12 col-lg-4 p-2">
				<form method="GET">
					<input type="text" name="q" class="form-control" placeholder="بحث ... " value="{{request()->get('q')}}">
				</form>
			</div>
		</div>
		<div class="col-12 p-3" style="overflow:auto">
			<div class="col-12 p-0" style="min-width:1100px;">
				
			
			<table class="table table-bordered  table-hover">
				<thead>
					<tr>
						<th>#</th>
						@can('contacts-update')
						<th scope="col" style="width:40px;">تم</th>
						@endcan
						<th>المستخدم</th>
						<th>محتوى التذكرة</th>
						<th>تحكم</th>
					</tr>
				</thead>  
				<tbody>
					@foreach($contacts as $contact)
					<tr 
					id="ticket_{{$contact->id}}"
					class="@if($contact->status=="DONE") ticket-resolved @endif" 
					 >
						<td>{{$contact->id}}</td>
						@can('contacts-update')
						<td scope="col" style="width:30px;">
		      
					      	<div class="form-switch">
							  <input class="form-check-input toggle-contact-resolving" type="checkbox" id="flexSwitchCheckDefault" style="width:40px;height: 21px;" {{$contact->status=="DONE"?"checked":""}} data-id="{{$contact->id}}">
							</div>
						 
					      </td>
					     @endcan
						<td>

							@if($contact->user_id!=null)

	                        	<a href="{{route('admin.users.show',$contact->user)}}" class="d-inline-block text-center">
	                                <img src="{{$contact->user->getUserAvatar()}}" style="width: 45px;height: 45px;display: inline-block;border-radius: 50%!important;padding: 3px;" class="mx-auto" alt="صورة المستخدم">
	                                <span style="display: inline-block;position: relative;top: 6px; " class="px-2 pt-0  text-start kufi">{{$contact->user->name}}</span>
	                            </a> 
	                            @else
	                            
	                                <img src="https://manager.almadarisp.com/user/img/user.png" style="width: 45px;height: 45px;display: inline-block;border-radius: 50%!important;padding: 3px;" class="mx-auto" alt="صورة المستخدم">
	                                <span style="display: inline-block;position: relative;top: 6px; " class="px-2 pt-0  text-start kufi">{{$contact->name}}<br>{{$contact->email}}<br>{{$contact->phone}}</span>

	                   
	                            @endif
						</td>
						<td>{{mb_strimwidth($contact->message,0,80,'...')}}
							<br>
							آخر رد من :
							@php
							$last_reply= $contact->replies()->orderBy('id','DESC')->first();
							@endphp
							@if($last_reply!=null)
								{{
									$last_reply->is_support_reply==1?"الدعم الفني":$contact->name
								}}
								<br>
								{{
									mb_strimwidth($last_reply->content,0,80,'...') 
								}}
							@else
							{{$contact->name}}
							@endif
							  
						</td>
					 
						<td style="width: 180px;">
							@can('contacts-read',$contact)
							<a href="{{route('admin.contacts.show',$contact)}}">
							<span class="btn  btn-success btn-sm font-1 mx-1">
								<span class="fal fa-paper-plane"></span> مراسلة
							</span>
							</a>
							@endcan
							@can('contacts-delete',$contact)
							<form method="POST" action="{{route('admin.contacts.destroy',$contact)}}" class="d-inline-block">@csrf @method("DELETE")
								<button class="btn  btn-outline-danger btn-sm font-1 mx-1" onclick="var result = confirm('هل أنت متأكد من عملية الحذف ؟');if(result){}else{event.preventDefault()}">
									<span class="fas fa-trash "></span> حذف
								</button>
							</form>
							@endcan
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
		</div>
		<div class="col-12 p-3">
			{{$contacts->appends(request()->query())->render()}}
		</div>
	</div>
</div>
@endsection
@section('scripts')
@can('contacts-update')
<script type="module">
	$('.toggle-contact-resolving').on('change',function(){
		var id =$(this).attr('data-id');
		$.ajax({
		  method: "POST",
		  url: "{{route('admin.contacts.resolve')}}",
		  data: { _token: "{{csrf_token()}}", id: id }
		}).done(function(res){
			if(res.status=="DONE"){ 
				$('#ticket_'+id).addClass('ticket-resolved');
			}
			else{
				$('#ticket_'+id).removeClass('ticket-resolved');
			}
		});
	});
</script>
@endcan
@endsection