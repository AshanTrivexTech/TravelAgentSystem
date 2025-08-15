<div class="row">
<form class="col s12 ajax-form" method="POST" action="{{route('direction-update', $element->id)}}" >
  {{ csrf_field() }}
  <input type="hidden" name="_method" value="PUT">

  <div class="row">
     <div class="input-field col s12 m6"> 
        <select disabled name="from_location_id" id="from_location_id">
        <option value="" disabled  >Choose your option</option> 
        @if(count($locations))
            @foreach($locations as $location)
              <option value="{{$location->id}}" @if($element->from_location_id == $location->id) selected @endif >{{$location->code}} - {{$location->name}}</option>
            @endforeach 
        @endif 
      </select>
      <label for="from_location_id" class="active">From</label> 
    </div> 
    <div class="input-field col s12 m6"> 
        <select disabled name="to_location_id" id="to_location_id">
        <option value="" disabled  >Choose your option</option> 
        @if(count($locations))
            @foreach($locations as $location)
              <option value="{{$location->id}}" @if($element->to_location_id == $location->id) selected @endif >{{$location->code}} - {{$location->name}}</option>
            @endforeach 
        @endif 
      </select>
      <label for="to_location_id" class="active">To</label> 
    </div> 

  </div>    
   
  <div class="row">
   
    <div class="input-field col s12 m6">
      <input readonly id="distance" name="distance" type="text" value="{{$element->distance}}" autofocus>
      <label for="distance" class="active">Distance (KM)</label>
    </div> 
   
    <div class="input-field col s12 m6">
      <input readonly id="via_path" name="via_path" type="text" value="{{$element->via_path}}" autofocus>
      <label for="via_path" class="active">Via path</label>
    </div> 

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