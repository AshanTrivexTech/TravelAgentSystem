<div class="row">
    <form enctype="multipart/form-data" class="col s12 ajax-form" method="POST" action="" >
        {{--{{ csrf_field() }}--}}
        <input type="hidden" name="_method" value="PUT">

        <div class="row">
            <div class="input-field col s12 m6">
                <input id="code" name="code" type="text" value="" >
                <label for="code" class="active">Code</label>
            </div>
            <div class="input-field col s12 m6">
                <input id="name" name="name" type="text" value="" autofocus>
                <label for="name" class="active">Name</label>
            </div> 

        </div>    

        <div class="row">
            <div class="input-field col s12 m6"> 
                <textarea id="contact_details" name="address" class="materialize-textarea" ></textarea>
                <label for="address" class="active">Address</label>  

            </div>

            <div class="input-field col s12 m6"> 
                <textarea id="description" name="email" class="materialize-textarea" ></textarea>
                <label for="email" class="active">Email</label>  

            </div>
        </div>
        <div class="row">
            <div class="input-field col s12 m6"> 
                <textarea id="contact_details" name="telephone" class="materialize-textarea" ></textarea>
                <label for="telephone" class="active">Telephone</label>
            </div>
            <div class="input-field col s12 m6"> 
                <textarea id="contact_details" name="company_paymnet_account" class="materialize-textarea" ></textarea>
                <label for="company_paymnet_account" class="active">Company Payment Account</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 m6"> 
                <textarea id="description" name="company_debtor_control_account" class="materialize-textarea" ></textarea>
                <label for="company_debtor_control_account" class="active">Company Debtor Control Account</label>
            </div>
            <div class="input-field col s12 m6"> 
                <textarea id="description" name="company_creditor_control_account" class="materialize-textarea" ></textarea>
                <label for="company_creditor_control_account" class="active">Company Creditor Control Account</label>
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 m6"> 
                <textarea id="description" name="company_advance_receivable_account" class="materialize-textarea" ></textarea>
                <label for="company_advance_receivable_account" class="active">Company Advance Receivable Account</label> 
            </div>
            <div class="input-field col s12 m6"> 
                <textarea id="description" name="company_advance_payable_account" class="materialize-textarea" ></textarea>
                <label for="company_advance_payable_account" class="active">Company Advance Payable Account</label> 
            </div>
        </div>

        <div class="row">
            <div class="input-field col s12 m6"> 

                <input class="btn waves-effect pull-right" name="logo" type="file" id="logo">
                <label for="logo" class="pull-right" class="active">Company Logo</label>
<!--                                <img class="col-sm-6" id="preview"  src="" ></img>-->
            </div>
        </div>

        <div class="row">  
            <div class="input-field col s12 m6 right">
                <button class="btn deep-orange darken-2 waves-effect waves-light right ajax_form_submit" type="button" type="submit" name="action" data-submit_type='edit'>Update
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>

    </form>
</div>   