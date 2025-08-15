<div class="row">
    <form class="col s12 ajax-form" method="POST" action="{{'route('+'tour-miscellaneous-update $element->id)'}}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="tour_id" value="{{ '$element->tour_id' }}">

        <div class="row">
            <div class="input-field col s12 m4 l4">
                <input id="name" name="name" type="text" class="validate"
                       value="{{ '$element->name' }}">
                <label for="name" class="active">Name</label>
            </div>
            <div class="input-field col s12 m4 l4">
                <input id="unit_price" name="unit_price" type="number" class="validate"
                       value="{{ ' $element->unit_price'  }}">
                <label for="unit_price" class="active"> Unit
                    Price {{ '\App\VehicleTransportExpense::getBaseCurrency()' }}</label>
            </div>
            <div class="input-field col s12 m4 l4">
                <input id="quantity" name="quantity" type="number" class="validate"
                       value="{{ '$element->quantity' }}">
                <label for="quantity" class="active">QTY</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <button class="btn deep-orange darken-2 waves-effect waves-light right ajax_form_submit" name="action"
                        data-submit_type='edit'>Update
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
    </form>
</div>