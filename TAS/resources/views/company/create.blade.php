
@extends('layouts.tas_app')
@section('content')
	<!-- BEGIN: Subheader -->  
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title m-subheader__title--separator ">
                Compapany Manager
				</h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
									<li class="m-nav__item m-nav__item--home">
										<a href="/dashboard" class="m-nav__link m-nav__link--icon">
											<i class="m-nav__link-icon la la-home"></i>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="" class="m-nav__link">
											<span class="m-nav__link-text">
											Master Data
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="" class="m-nav__link">
											<span class="m-nav__link-text">
                                            Company Manager
											</span>
										</a>
									</li>
									<li class="m-nav__separator">
										-
									</li>
									<li class="m-nav__item">
										<a href="" class="m-nav__link">
											<span class="m-nav__link-text">
                                            Company Master File
											</span>
										</a>
									</li>
								</ul>
			</div>    
			<div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
										
											<div class="m-separator m-separator--dashed d-xl-none"></div>
										</div>
			</div>
		</div>
	</div>
	<!-- END: Subheader -->
	<div class="m-content">
        
    <div class="m-portlet">
									<div class="m-portlet__head">
										<div class="m-portlet__head-caption">
											<div class="m-portlet__head-title">
												<span class="m-portlet__head-icon m--hide">
													<i class="la la-gear"></i>
												</span>
												<h3 class="m-portlet__head-text">
													Company Info
												</h3>
											</div>
										</div>
									</div>
									<!--begin::Form-->
								<form method="POST" action="/company-update/1" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed">
                                     {{csrf_field()}}
                                     <div class="m-portlet__body">
                                        <div class="form-group m-form__group has-danger row">
                                            <div class="col-lg-6">
                                                <label class="form-control-label">
                                                    Name:
                                                </label>
                                                <input required placeholder="Name" id="name" name="name" type="text" class="form-control m-input"  value="">
                                                {{--@if ($errors->has('name'))--}}
                                                        {{--<div class="form-control-feedback">--}}
                                                                {{--{{ $errors->first('name') }}  --}}
                                                        {{--</div>--}}
                                                {{--@endif--}}
                                            </div>
 
                                            <div class="col-lg-6">
                                                <label class="form-control-label">
                                                    Code :
                                                </label>
                                                <input required placeholder="company code" id="code" name="code" type="text" class="form-control m-input"  value="">
                                                {{--@if ($errors->has('address'))--}}
                                                        {{--<div class="form-control-feedback">--}}
                                                                {{--{{ $errors->first('address') }}  --}}
                                                        {{--</div>--}}
                                                {{--@endif--}}
                                            </div>
                                        </div>   
                                        <div class="form-group m-form__group has-danger row">
                                         
                                            <div class="col-lg-6">
                                                <label class="form-control-label">
                                                    Address :
                                                </label>
                                                <input required placeholder="Address" id="address" name="address" type="text" class="form-control m-input"  value="">
                                                {{--@if ($errors->has('address'))--}}
                                                        {{--<div class="form-control-feedback">--}}
                                                                {{--{{ $errors->first('address') }}  --}}
                                                        {{--</div>--}}
                                                {{--@endif--}}
                                            </div>

                                            <div class="col-lg-6">
                                                <label class="form-control-label">
                                                    Email :
                                                </label>
                                                <input required placeholder="Email" id="email" name="email" type="text" class="form-control m-input"  value="">
                                                {{--@if ($errors->has('email'))--}}
                                                        {{--<div class="form-control-feedback">--}}
                                                                {{--{{ $errors->first('email') }}  --}}
                                                        {{--</div>--}}
                                                {{--@endif--}}
                                            </div>
                                        </div>   
                                        <div class="form-group m-form__group has-danger row">
                                         
                                            <div class="col-lg-6">
                                                <label class="form-control-label">
                                                    Telephone :
                                                </label>
                                                <input required placeholder="Telephone" id="telephone" name="telephone" type="text" class="form-control m-input"  value="">
                                                {{--@if ($errors->has('telephone'))--}}
                                                        {{--<div class="form-control-feedback">--}}
                                                                {{--{{ $errors->first('telephone') }}  --}}
                                                        {{--</div>--}}
                                                {{--@endif--}}
                                            </div>

                                            <div class="col-lg-6">
                                                <label class="form-control-label">
                                                    Company Payment Account :
                                                </label>
                                                <input  placeholder="" id="company_paymnet_account" name="company_paymnet_account" type="text" class="form-control m-input"  value="">
                                                {{--@if ($errors->has('company_paymnet_account'))--}}
                                                        {{--<div class="form-control-feedback">--}}
                                                                {{--{{ $errors->first('company_paymnet_account') }}  --}}
                                                        {{--</div>--}}
                                                {{--@endif--}}
                                            </div>
                                        </div>   
                                        <div class="form-group m-form__group has-danger row">
                                         
                                            <div class="col-lg-6">
                                                <label class="form-control-label">
                                                    Company Debtor Control Account :
                                                </label>
                                                <input  placeholder="" id="company_debtor_control_account" name="company_debtor_control_account" type="text" class="form-control m-input"  value="">
                                                {{--@if ($errors->has('company_debtor_control_account'))--}}
                                                        {{--<div class="form-control-feedback">--}}
                                                                {{--{{ $errors->first('company_debtor_control_account') }}  --}}
                                                        {{--</div>--}}
                                                {{--@endif--}}
                                            </div>

                                            <div class="col-lg-6">
                                                <label class="form-control-label">
                                                    Company Creditor Control Account :
                                                </label>
                                                <input  placeholder="" id="company_creditor_control_account" name="company_creditor_control_account" type="text" class="form-control m-input"  value="">
                                                {{--@if ($errors->has('company_creditor_control_account'))--}}
                                                        {{--<div class="form-control-feedback">--}}
                                                                {{--{{ $errors->first('company_creditor_control_account') }}  --}}
                                                        {{--</div>--}}
                                                {{--@endif--}}
                                            </div>
                                        </div>   
                                        <div class="form-group m-form__group has-danger row">
                                         
                                            <div class="col-lg-6">
                                                <label class="form-control-label">
                                                    Company Advance Receivable Account :
                                                </label>
                                                <input  placeholder="" id="company_advance_receivable_account" name="company_advance_receivable_account" type="text" class="form-control m-input"  value="">
                                                {{--@if ($errors->has('company_advance_receivable_account'))--}}
                                                        {{--<div class="form-control-feedback">--}}
                                                                {{--{{ $errors->first('company_advance_receivable_account') }}  --}}
                                                        {{--</div>--}}
                                                {{--@endif--}}
                                            </div>

                                            <div class="col-lg-6">
                                                <label class="form-control-label">
                                                    Company Advance Payable Account :
                                                </label>
                                                <input  placeholder="" id="company_advance_payable_account" name="company_advance_payable_account" type="text" class="form-control m-input"  value="">
                                                {{--@if ($errors->has('company_advance_receivable_account'))--}}
                                                        {{--<div class="form-control-feedback">--}}
                                                                {{--{{ $errors->first('company_advance_receivable_account') }}  --}}
                                                        {{--</div>--}}
                                                {{--@endif--}}
                                            </div>
                                        </div>   
                                        <div class="form-group m-form__group has-danger row">
                                         
                                            {{--  <div class="col-lg-6">
                                                <label class="form-control-label">
                                                    commission :
                                                </label>
                                                <input required placeholder="" id="tour_commission_rate" name="tour_commission_rate" type="text" class="form-control m-input"  value="{{ $element->tour_commission_rate*100 }}">
                                                @if ($errors->has('tour_commission_rate'))
                                                        <div class="form-control-feedback">
                                                                {{ $errors->first('tour_commission_rate') }}  
                                                        </div>
                                                @endif
                                            </div>  --}}

                                            <div class="col-lg-6">
                                                <label class="form-control-label">
                                                    VAT Rate :
                                                </label>
                                                <input required placeholder="" id="vat_rate" name="vat_rate" type="text" class="form-control m-input"  value="">
                                                {{--@if ($errors->has('commition'))--}}
                                                        {{--<div class="form-control-feedback">--}}
                                                                {{--{{ $errors->first('commition') }}  --}}
                                                        {{--</div>--}}
                                                {{--@endif--}}
                                            </div>

                                            <div class="col-lg-6">
                                                <label class="form-control-label">
                                                    NBT Rate :
                                                </label>
                                                <input required placeholder="0" id="nbt_rate" name="nbt_rate" type="text" class="form-control m-input"  value="">
                                                {{--@if ($errors->has('nbt_rate'))--}}
                                                        {{--<div class="form-control-feedback">--}}
                                                                {{--{{ $errors->first('nbt_rate') }}  --}}
                                                        {{--</div>--}}
                                                {{--@endif--}}
                                            </div>

                                        </div>
                                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                            <div class="m-form__actions m-form__actions--solid">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <button type="submit" class="btn btn-primary">
                                                            Save
                                                        </button>
                                                        <button type="reset" class="btn btn-secondary">
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                           
                                            

{{--  
                                     <div class="row">

                                    <div class="input-field col s12 m12"> 
                                            <input placeholder="name" id="name" name="name" type="text" class="validate" maxlength="191" value="{{ old('name') }}" >
                                            <label for="name">Name</label>
                                            @if ($errors->has('name'))
                                            <div class="error"> {{ $errors->first('name') }}  </div>
                                            @endif  
                                        </div>
                                    </div>
            
                                    <div class="row">
                                        <div class="input-field col s12 m6"> 
                                            <textarea placeholder="Address" id="contact_details" name="address" class="materialize-textarea" >{{old('address')}}</textarea> 
                                            <label for="address">Address</label>  
                                            @if ($errors->has('address'))
                                            <div class="error"> {{ $errors->first('address') }}  </div>
                                            @endif
                                        </div>
            
                                        <div class="input-field col s12 m6"> 
                                            <textarea placeholder="Email" id="description" name="email" class="materialize-textarea" >{{old('email')}}</textarea> 
                                            <label for="email">Email</label>  
                                            @if ($errors->has('email'))
                                            <div class="error"> {{ $errors->first('email') }}  </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12 m6"> 
                                            <textarea placeholder="Telephone" id="contact_details" name="telephone" class="materialize-textarea" >{{old('telephone')}}</textarea> 
                                            <label for="telephone">Telephone</label>  
                                            @if ($errors->has('telephone'))
                                            <div class="error"> {{ $errors->first('telephone') }}  </div>
                                            @endif
                                        </div>
                                        <div class="input-field col s12 m6"> 
                                            <textarea placeholder="Company Payment Account" id="contact_details" name="company_paymnet_account " class="materialize-textarea" >{{old('company_paymnet_account ')}}</textarea> 
                                            <label for="company_paymnet_account">Company Payment Account</label>  
                                            @if ($errors->has('company_paymnet_account '))
                                            <div class="error"> {{ $errors->first('company_paymnet_account ') }}  </div>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="row">
                                        <div class="input-field col s12 m6"> 
                                            <textarea placeholder="Company Debtor Control Account" id="description" name="company_debtor_control_account" class="materialize-textarea" >{{old('company_debtor_control_account')}}</textarea> 
                                            <label for="company_debtor_control_account">Company Debtor Control Account</label>  
                                            @if ($errors->has('company_debtor_control_account'))
                                            <div class="error"> {{ $errors->first('company_debtor_control_account') }}  </div>
                                            @endif
                                        </div>
                                        <div class="input-field col s12 m6"> 
                                            <textarea placeholder="Company Creditor Control Account" id="description" name="company_creditor_control_account" class="materialize-textarea" >{{old('company_creditor_control_account')}}</textarea> 
                                            <label for="company_creditor_control_account">Company Creditor Control Account</label>  
                                            @if ($errors->has('company_creditor_control_account'))
                                            <div class="error"> {{ $errors->first('company_creditor_control_account') }}  </div>
                                            @endif
                                        </div>
                                    </div>
            
                                    <div class="row">
                                        <div class="input-field col s12 m6"> 
                                            <textarea placeholder="Company Advance Receivable Account" id="description" name="company_advance_receivable_account " class="materialize-textarea" >{{old('company_advance_receivable_account')}}</textarea> 
                                            <label for="company_advance_receivable_account ">Company Advance Receivable Account</label>  
                                            @if ($errors->has('company_advance_receivable_account '))
                                            <div class="error"> {{ $errors->first('company_advance_receivable_account ') }}  </div>
                                            @endif
                                        </div>
                                        <div class="input-field col s12 m6"> 
                                            <textarea placeholder="Company Creditor Control Account" id="description" name="company_creditor_control_account" class="materialize-textarea" >{{old('company_advance_payable_account')}}</textarea> 
                                            <label for="company_advance_payable_account">Company Advance Payable Account</label>  
                                            @if ($errors->has('company_advance_payable_account'))
                                            <div class="error"> {{ $errors->first('company_advance_payable_account') }}  </div>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="input-field col s12 m6"> 
                                            
                                            <input class="btn waves-effect pull-right" name="logo" type="file" id="logo">
                                            <label for="logo" class="pull-right">Company Logo</label>
            <!--                                <img class="col-sm-6" id="preview"  src="" ></img>-->
                                        </div>
                                    </div>    
            
                                    <div class="input-field col s12 m12 form-submit-btns-wrap">
                                        <button class="btn waves-effect red accent-2 pull-right" type="reset" name="action">Reset</button>
                                        <button class="btn waves-effect waves-light pull-right" type="submit" name="action">Submit</button>
                                    </div> 
            
									</form>
								
								</div>
                            </div>  --}}
 

@endsection 

@section('Page_Scripts')
@parent
<script src="{{ URL::asset('assets/demo/default/custom/components/forms/widgets/select2.js') }}" type="text/javascript"></script>
@endsection 


	


















