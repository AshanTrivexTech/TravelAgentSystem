<form class="cleafix" method="POST" action="" id="misc-form">
    {{csrf_field()}}
    <input type="hidden" name="tour_id" value="{{ '$tour_id' }}">

    <div class="row">

       

    <div class="input-field col s12 m4 l4"> 
       <select name="name" id="name">
        <option value="" disabled @if(is_null(old('name'))) selected @endif >Choose your option</option>
         
      </select>
      <label for="start_date"> Miscellaneous Name  </label> 
    </div>  

        <div class="input-field col s12 m4 l4">
            <input id="unit_price" name="unit_price" type="number" class="validate"
                   value="{{ '$element->unit_price' }}">
            <label for="unit_price"> Unit Price {{ \App\VehicleTransportExpense::getBaseCurrency() }}</label>
        </div>
        <div class="input-field col s12 m4 l4">
            <input id="quantity" name="quantity" type="number" class="validate"
                   value="{{ '$element->quantity' }}">
            <label for="quantity">QTY</label>
        </div>


    </div>


    <div class="row">
        <div class="input-field col s12 m12 l12 pull-right">
            <button class="btn waves-effect green dark-2 pull-right" name="action">Save</button>
            <button class="btn waves-effect red accent-2 pull-right reset-button" type="reset" name="action">Reset
            </button>
        </div>
    </div>


</form>

@section('javascript')
    @parent
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            miscGrid();

            $('#misc-form').submit(function (event) {
                event.preventDefault();
                var data = $(this).serializeArray();


                $.ajax({
                    url: "{{ route('tour-miscellaneous-store') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: data,
                    success: function (res) {
                       // console.log(res);
                        if (res.success) {
                            $.notify(res.message, "success");
                            miscGrid();
                            $('.reset-button').trigger('click');
                        } else {
                            $.notify(res.message, "error");
                        }
                    },
                    error: function (error) {
                        //console.log(error.message);
                        $.notify(error.message, "error");
                    }

                });

            });


        });

        function miscGrid() {
            $.ajax({
                url: "{{ route('tour-miscellaneous-grid',$tour_id) }}",
                type: 'GET',
                dataType: 'html',
                success: function (grid) {
                    $('#miscellaneous-grid').html(grid);
                }
            });
        }


    </script>

@endsection