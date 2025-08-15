<div class="row">
<form class="col s12 ajax-form" method="POST" action="{{route('branch-update', $element->id)}}" >
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
        <select disabled name="company_id" id="company_id">
        <option value="" disabled  >Choose your option</option> 
        @if(count($companies))
            @foreach($companies as $company)
              <option value="{{$company->id}}" @if($element->company_id == $company->id) selected @endif >{{$company->code}} - {{$company->name}}</option>
            @endforeach 
        @endif 
      </select>
      <label for="company_id" class="active">Company</label> 
    </div>
      <div class="input-field col s12 m6"> 
        <select disabled name="country_id" id="country_id">
        <option value="" disabled  >Choose your option</option> 
        @if(count($countries))
            @foreach($countries as $country)
              <option value="{{$country->id}}" @if($element->country_id == $country->id) selected @endif >{{$country->alpha_2}} - {{$country->name}}</option>
            @endforeach 
        @endif 
      </select>
      <label for="country_id" class="active">Country</label> 
    </div>
  </div>
  <div class="row">
    <div class="input-field col s12 m6"> 
        <select disabled name="city_id" id="city_id">
        <option value="" disabled  >Choose your option</option> 
        @if(count($cities))
            @foreach($cities as $city)
              <option value="{{$city->id}}" @if($element->city_id == $city->id) selected @endif >{{$city->code}} - {{$city->name}}</option>
            @endforeach 
        @endif 
      </select>
      <label for="city_id" class="active">City</label> 
    </div> 
     <div class="input-field col s12 m6"> 
        <select disabled name="status" id="status"> 
        <option value="1" @if($element->status) selected @endif >Active</option>
        <option value="0" @if(!$element->status) selected @endif >Inactive</option> 
      </select>
      <label for="status" class="active">Status</label> 
    </div> 

  </div>  
  
  <div class="row">
    <div class="input-field col s12 m6">  
        <textarea readonly name="contact_details" id="contact_details" placeholder="contact_details" class="materialize-textarea">{{ $element->contact_details }}</textarea> 
        <label for="address" class="active">Contact Details</label> 
    </div>
    <div class="input-field col s12 m6">  
        <textarea readonly name="description" id="description" placeholder="description" class="materialize-textarea">{{$element->description }}</textarea>
        <label for="description" class="active">Description</label>   
    </div>
  </div>



</form>
</div>   