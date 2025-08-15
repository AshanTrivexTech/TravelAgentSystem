<div class="row">
<form class="col s12 ajax-form" method="POST" action="{{route('hotel_package-update', $element->id)}}" >
  {{ csrf_field() }}
  <input type="hidden" name="_method" value="PUT">

  <div class="row">
    <div class="input-field col s12 m6">
      <input readonly id="name" name="name" type="text" value="{{$element->package_name}}" autofocus>
      <label for="name" class="active">Title</label>
    </div> 
    <div class="input-field col s12 m6">
      <input readonly id="code" name="code" type="text" value="{{$element->code}}" >
      <label for="code" class="active">Code</label>
    </div>
  </div>    
   
  <div class="row">
    <div class="input-field col s12 m6"> 
        <select disabled name="meal_type_id" id="meal_type_id">
        <option value="" disabled  >Choose your option</option> 
        @if(count($meal_types))
            @foreach($meal_types as $mtype)
              <option value="{{$mtype->id}}" @if($element->meal_type_id == $mtype->id) selected @endif >{{$mtype->code}} - {{$mtype->name}}</option>
            @endforeach 
        @endif 
      </select>
      <label for="meal_type_id" class="active">Meal type</label> 
    </div> 
    <div class="input-field col s12 m6"> 
        <select disabled name="room_type_id" id="room_type_id">
        <option value="" disabled  >Choose your option</option> 
        @if(count($room_types))
            @foreach($room_types as $rtype)
              <option value="{{$rtype->id}}" @if($element->room_type_id == $rtype->id) selected @endif >{{$rtype->code}} - {{$rtype->room_name}}</option>
            @endforeach 
        @endif 
      </select>
      <label for="room_type_id" class="active">Room type</label> 
    </div>  
  </div>  
  
  <div class="row"> 
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