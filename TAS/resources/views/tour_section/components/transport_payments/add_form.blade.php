
<h5 class="breadcrumbs-title"><i class="material-icons">attach_money</i>   Add  Transports Payments</h5>
<br>
<form class="cleafix" method="POST" action="">
  {{csrf_field()}}
  <div class="row"> 
     
    
    <div class="input-field col s12 m4 l4"> 
       <select name="vehicle_type_id" id="vehicle_type_id">
          {{--<option value="" disabled @if(is_null(old('vehicle_type_id'))) selected @endif >Choose your option</option>--}}
         <option>Peradeniya Gardern - entrance fee - 10$</option>
         <option>Peradeniya Gardern - Photography fee 15$</option>
         <option>Kandy Town -Lunch fee 3$</option>
      </select>
      <label for="start_date"> Location Payment Type</label> 
    </div>  
    <div class="input-field col s12 m4 l4"> 
        <input id="no_of_packs_adult" name="no_of_packs_adult" type="number" class="validate" value="" >
      <label for="start_date"> QTY</label> 
    </div>     
    <div class="input-field col s12 m4 l4 pull-right"> 
         <button class="btn waves-effect green dark-2 pull-right" type="reset" name="action">Save</button>
    </div>
       
  </div>
</form>