<div class="row">
<form class="col s12 ajax-form" method="POST" action="{{route('hotel_feature-update', $element->id)}}" >
  {{ csrf_field() }}
  <input type="hidden" name="_method" value="PUT">

  <div class="row">
    <div class="input-field col s12 m6">
      <input readonly id="name" name="name" type="text" value="{{$element->name}}" autofocus>
      <label for="name" class="active">Name</label>
    </div> 
    <div class="input-field col s12 m6">
      <input readonly id="code" name="code" type="text" value="{{$element->code}}" >
      <label for="code" class="active">Code</label>
    </div>
  </div>    
   
  <div class="row">
    <div class="input-field col s12 m6"> 
      <select disabled name="type" id="type"> 
        <option value="COMMON" @if($element->type == 'COMMON') selected @endif >Common Type</option>
        <option value="ROOM" @if(!$element->type == 'ROOM') selected @endif >Room Type</option> 
      </select>
      <label for="type" class="active">Feature Type</label>  
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