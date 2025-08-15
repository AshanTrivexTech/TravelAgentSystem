<div class="row">
<form class="col s12 ajax-form" method="POST" action="{{route('vehicle-type-update', $element->id)}}" >
  {{ csrf_field() }}
  <input type="hidden" name="_method" value="PUT">

    <div class="input-field col s12 m6">
      <input readonly id="name" name="name" type="text" value="{{$element->name}}" autofocus>
      <label for="name" class="active">Title</label>
    </div>
 

    <div class="input-field col s12 m6">
      <input  readonly id="code" name="code" type="text" value="{{$element->code}}" >
      <label for="code" class="active">Code</label>
    </div>
 
@php
                    $currency=App\CurrencyRate::where('code','LKR')->first();
                @endphp
    <div class="input-field col s12 m6">
      <input readonly id="rate_per_km" name="rate_per_km" type="text" value="{{round($element->rate_per_km)}}">
      <label for="rate_per_km" class="active">Rate per 1 KM</label>
    </div>
 
 
	  <div class="input-field col s12 m6"> 
	      <select disabled name="status" id="status"> 
		    <option value="1" @if($element->status) selected @endif >Active</option>
		    <option value="0" @if(!$element->status) selected @endif >Inactive</option> 
		  </select>
		  <label for="status" class="active">Status</label> 
	
     
  </div>
</form>
</div>  