<div class="row">
<form class="col s12 ajax-form" method="POST" action="{{route('currency-update', $element->id)}}" >
  {{ csrf_field() }}
  <input type="hidden" name="_method" value="PUT">
  <div class="row">
    <div class="input-field col s12 m6">
      <input readonly id="name" name="name" type="text" value="{{$element->name}}" autofocus>
      <label for="name" class="active">Currency</label>
    </div>
  

    <div class="input-field col s12 m6">
      <input readonly id="code" name="code" type="text" value="{{$element->code}}" >
      <label for="code" class="active">Code</label>
    </div>
 

    <div class="input-field col s12 m6">
      <input readonly id="dollar_rate" name="dollar_rate" type="text" value="{{$element->dollar_rate}} USD">
      <label for="dollar_rate" class="active">Unit Rate (from $ rate)</label>
    </div>
 

	  <div class="input-field col s12 m6"> 
	      <select disabled name="status" id="status"> 
		    <option value="1" @if($element->status) selected @endif >Active</option>
		    <option value="0" @if(!$element->status) selected @endif >Inactive</option> 
		  </select>
		  <label for="status" class="active">Status</label> 
	  </div>
     
  </div>
</form>
</div>  