<div class="row">
<form class="col s12 ajax-form" method="POST" action="{{route('hotel-update', $element->id)}}" >
  {{ csrf_field() }}
  <input type="hidden" name="_method" value="PUT">
  <div class="row">  
    <div class="input-field col s12 m6">
      <input readonly id="name" name="name" type="text" value="{{$element->name}}" autofocus>
      <label for="name" class="active">Title</label>
    </div> 
    <div class="input-field col s12 m6">
      <input readonly id="code" name="code" type="text" value="{{$element->code}}" >
      <label for="code" class="active">Code</label>
    </div>
    <div class="input-field col s12 m6"> 
        <input readonly placeholder="" id="postal_code" name="postal_code" type="text" class="validate" maxlength="191" value="{{$element->postal_code }}" >
        <label for="postal_code" class="active">Postal code</label>   
    </div> 
    <div class="input-field col s12 m6"> 
      <select disabled name="star_rate" name="star_rate">
        <option value="" disabled  >Choose your option</option>
        <option value="1" @if($element->star_rate == 1) selected @endif >1 star</option>
        <option value="2" @if($element->star_rate == 2) selected @endif >2 stars</option>
        <option value="3" @if($element->star_rate == 3) selected @endif >3 stars</option>
        <option value="4" @if($element->star_rate == 4) selected @endif >4 stars</option>
        <option value="5" @if($element->star_rate == 5) selected @endif >5 stars</option>
      </select>
      <label for="star_rate" class="active">Star Rate</label> 
    </div>    

      <div class="input-field col s12 m6"> 
          <select disabled name="hotel_type_id" id="hotel_type_id">
          <option readonly value="" disabled selected>Choose your option</option>
          @if(count($hotel_types))
              @foreach($hotel_types as $htype)
                <option readonly value="{{$htype->id}}" @if($element->hotel_type_id == $htype->id) selected @endif >{{$htype->code}} - {{$htype->name}}</option>
              @endforeach 
          @endif
        </select>
        <label for="hotel_type_id" class="active">Hotel type</label> 
      </div>

    <div class="input-field col s12 m6"> 
        <select disabled name="hotel_group_id" id="hotel_group_id">
        <option readonly value="" disabled selected>Choose your option</option>
        @if(count($hotel_groups))
            @foreach($hotel_groups as $hgroup)
              <option readonly value="{{$hgroup->id}}" @if($element->hotel_group_id == $hgroup->id) selected @endif >{{$hgroup->code}} - {{$hgroup->name}}</option>
            @endforeach 
        @endif
      </select>
      <label for="hotel_group_id" class="active">Hotel Group</label> 
    </div>
  
    <div class="input-field col s12 m6"> 
          <select disabled readonly name="city_id" id="city_id">
          <option value="" disabled  >Choose your option</option> 
          @if(count($cities))
              @foreach($cities as $city)
                <option readonly value="{{$city->id}}" @if($element->city_id == $city->id) selected @endif >{{$city->code}} - {{$city->name}}</option>
              @endforeach 
          @endif 
        </select>
        <label for="city_id" class="active">Near City</label> 
      </div>

      <div class="input-field col s12 m6"> 
        <select disabled readonly name="features[]" id="features" multiple="true"> 
          <option readonly value="" disabled >Choose your option</option>
          @if(count($features))
              @foreach($features as $feature)
                <option  readonly value="{{$feature->id}}" @if(is_array($added_features) && in_array($feature->id, $added_features)) selected @endif >{{$feature->code}} - {{$feature->name}}</option>
              @endforeach 
          @endif 
        </select>
        <label for="features" class="active">Available Features</label>  
      </div>   


    
    <div class="input-field col s12 m6"> 
        <input readonly placeholder="" id="website_url" name="website_url" type="text" class="validate" maxlength="191" value="{{ $element->website_url}}">
        <label for="website_url" class="active">Website URL</label>  
    </div>  
                     
    <div class="input-field col s12 m6"> 
        <input readonly placeholder="011-XXX-XXXX" id="Telephone" name="Telephone" type="tel" class="validate" maxlength="12" value="{{ $element->website_url}}">
        <label for="website_url" class="active">Telephone</label>  
    </div>  
    <div class="input-field col s12 m6"> 
        <input readonly placeholder="ex:hotelname@domin.com" id="email" name="email" type="email" class="validate" maxlength="191" value="{{ $element->website_url}}">
        <label for="website_url" class="active">Email Address</label>  
    </div> 
    <div class="input-field col s12 m6"> 
        <select disabled readonly name="status" id="status"> 
        <option value="1" @if($element->status) selected @endif >Active</option>
        <option value="0" @if(!$element->status) selected @endif >Inactive</option> 
      </select>
      <label for="status" class="active">Status</label> 
    </div> 
    <div class="input-field col s12 m6">  
        <textarea readonly name="address" id="address" placeholder="" class="materialize-textarea">{{ $element->address }}</textarea> 
        <label for="address" class="active">Address</label> 
    </div>
    <div class="input-field col s12 m6">  
        <textarea readonly name="description" id="description" placeholder="" class="materialize-textarea">{{$element->description }}</textarea>
        <label for="description" class="active">Description</label>   
    </div> 
   
  </div>

</form>
</div>   