<div class="row">
<form class="col s12 ajax-form" method="POST" action="" >
  {{ csrf_field() }}
  <input type="hidden" name="_method" value="PUT">

  <div class="row">
    <div class="input-field col s12 m6">
      <input readonly id="name" name="name" type="text" value="" autofocus>
      <label for="name" class="active">Name</label>
    </div> 
    <div class="input-field col s12 m6">
      <input readonly id="code" name="code" type="text" value="" >
      <label for="code" class="active">Code</label>
    </div>
  </div>    
   
  <div class="row">
    <div class="input-field col s12 m6"> 
        <select disabled name="district_id" id="district_id">
        <option value="" disabled  >Choose your option</option> 
        {{--@if(count($districts))--}}
            {{--@foreach($districts as $district)--}}
              <option value="" ></option>
            {{--@endforeach --}}
        {{--@endif --}}
      </select>
      <label for="district_id" class="active">District</label> 
    </div> 
     <div class="input-field col s12 m6"> 
        <select disabled name="status" id="status"> 
        <option value="1" >Active</option>
        <option value="0"  >Inactive</option>
      </select>
      <label for="status" class="active">Status</label> 
    </div> 

  </div>  
 
</form>
</div>   