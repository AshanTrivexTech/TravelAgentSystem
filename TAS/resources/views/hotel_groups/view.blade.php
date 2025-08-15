<div class="row">
<form class="col s12 ajax-form" method="POST" action="{{route('hotel_group-update', $element->id)}}" >
  {{ csrf_field() }}
  <input type="hidden" name="_method" value="PUT">

  <div class="row">
    <div class="input-field col s12 m12">
      <input readonly id="name" name="name" type="text" value="{{$element->name}}" autofocus>
      <label for="name" class="active">Name</label>
    </div> 
    <div class="input-field col s12 m12">
      <input readonly id="code" name="code" type="text" value="{{$element->code}}" >
      <label for="code" class="active">Code</label>
    </div>
  </div>    
  <div class="input-field col s12 m12"> 
        <select disabled name="status" id="status"> 
        <option value="1" @if($element->status) selected @endif >Active</option>
        <option value="0" @if(!$element->status) selected @endif >Inactive</option> 
      </select>
      <label for="status" class="active">Status</label> 
    </div> 
  </div>

</form>
</div>   