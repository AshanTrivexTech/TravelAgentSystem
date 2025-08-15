@extends('layouts.tas_app') @section('content')
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator ">
                Tour Bookings Manager
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
						Tour Manager
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">
                            Post Prefix Manager
											</span>
                    </a>
                </li>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a href="" class="m-nav__link">
                        <span class="m-nav__link-text">
                      Create a    Post Prefix
											</span>
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                <a href="{{route('tour-list')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                    <span>
													<i class="la la-angle-left"></i>
													<span>
														Back
													</span>
                    </span>
                </a>
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
													Create a New booking for {{$gust->name_on_passport}}
					</h3>
                </div>
            </div>
        </div>
        <!--begin::Form-->

     <form class="cleafix" method="POST" action="{{route('tour-store')}}">
                            {{csrf_field()}}
                            <input type="hidden" name="confirmed" value="1"/>
                            <input type="hidden" name="promotion" value="0"/>
                            <input type="hidden" name="postprefix" value="1"/>
                            <input type="hidden" name="ptour_id" value="{{$ptour->id}}"/>
                            <input type="hidden" name="gust_id" value="{{$gust->id}}"/>
                             <div class="m-portlet__body">
        <div class="form-group m-form__group row">
            <div class="col-lg-6">
                <label class="form-control-label">
                    Title:
                </label>
                <input id="title" name="title" type="text"  class="form-control m-input"
                                           value="{{ old('title') }}"  placeholder="Enter Tour Title">
                                  
                <span class="m-form__help">
			
				</span>
            </div>

            <div class="col-lg-3">
               <div class="m-form__group form-group">
					<label>
						Days / Date
					</label>
					<div class="m-radio-list">
						<label class="m-radio m-radio--state-success">
						<input type="radio"  class="with-gap" name="date_range" value="days" id="date_range1">
						Days
						<span></span>
						</label>
						<label class="m-radio m-radio--state-brand">
							<input type="radio" class="with-gap" name="date_range" value="dates" type="radio"
                                               id="date_range2">
									Date
									<span></span>
							</label>
					</div>						
				</div>
                <span class="m-form__help">
				</span>
            </div>
            <div class="col-lg-3">
               <div class="m-form__group form-group">
					<label>
                    No Of Days
					</label>
                    <input  placeholder="0" disabled type="number" id="no_of_days" readonly class="" name="no_of_days"/>
                                      <label for="no_of_days" class="active"></label>
                
                    <span class="m-form__help">
			
            </span>
        </div>
        </div>                   




        </div>
        <div class="form-group m-form__group row">
            <div class="col-lg-6">
                <label class="form-control-label">
                    Start Date:
                </label>
            <input name="start_date" type="text"  class="form-control m-input" placeholder="Select date" id="m_datetimepicker_6" value="{{$postprefix->from_date}}">
             
                <span class="m-form__help">
			
				</span>
            </div>

            <div class="col-lg-6">
                <label class="form-control-label">
                 End Date:
                </label>
            <input  name="end_date" type="text"  class="form-control m-input" placeholder="Select date" id="m_datetimepicker_8" value="{{$postprefix->to_date}}">
               
                <span class="m-form__help">
					
				</span>
            </div>
        </div>
<div class="form-group m-form__group row">
        <div class="col-lg-6">
                <label class="form-control-label">
                 Base Currency:
                </label>
                <select class="form-control"  name="base_currencies" id="base_currencies">
                    <option value=""  @if(is_null(old('base_currencies'))) selected @endif >Select Option</option>        
                    @if(count($currencyss))
                    @foreach($currencyss as $curre)
                      <option value="{{$curre->id}}" @if(old('base_currencies') == $curre->id) selected @endif >{{$curre->name}} - ({{$curre->code}})</option>
                    @endforeach 
                @endif
                 </select>
               
                <span class="m-form__help">
					
				</span>
            </div>

            {{-- <div class="col-lg-6">
                <label class="form-control-label">
                    VAT Rate:
                </label>
                <input name="vat_rate" type="text"  class="form-control m-input" placeholder="" >
             
                <span class="m-form__help">
			
				</span>
            </div> --}}

            <div class="col-lg-6">
                <label class="form-control-label">
                 Commission Rate:
                </label>
                <input  name="commission_rate" type="text"  class="form-control m-input" placeholder="">
               
                <span class="m-form__help">
					
				</span>
            </div>
        </div>

         <div class="form-group m-form__group row">
            <div class="col-lg-4">
                <label class="form-control-label">
                    Market:
                </label>
                <div class="m-input-icon m-input-icon--right">
                <select  class="form-control m-input" name="market_id" id="market_id">
                                        <option value="" disabled @if(is_null(old('market_id'))) selected @endif >Choose
                                            Market
                                        </option>
                                        @if(count($markets))
                                            @foreach($markets as $market)
                                                <option value="{{$market->id}}"
                                                        @if(old('market_id') == $market->id) selected @endif >{{$market->code}}
                                                    - {{$market->name}}</option>
                                            @endforeach
                                        @endif
                </select>
                    <span class="m-input-icon__icon m-input-icon__icon--right">
						<span>
						<i class="la la-map-marker"></i>
						</span>
                    </span>
                </div>
                @if ($errors->has('market_id'))
                <div class="form-control-feedback">
                    {{ $errors->first('market_id') }}
                </div>
                @endif
                <span class="m-form__help">
				
				</span>
            </div>

            <div class="col-lg-4">
                <label class="form-control-label">
                    Agent :
                </label>
                <select  class="form-control m-input" name="agent_id" id="agent_id">
                                        <option value="" disabled @if(is_null(old('agent_id'))) selected @endif >Choose
                                            Agent
                                        </option>
                                        @if(count($agents))
                                            @foreach($agents as $agent)
                                                <option value="{{$agent->id}}"
                                                        @if(old('agent_id') == $agent->id) selected @endif >{{$agent->code}}
                                                    - {{$agent->name}}</option>
                                            @endforeach
                                        @endif
                </select>
                @if ($errors->has('status'))
                <div class="form-control-feedback">
                    {{ $errors->first('status') }}
                </div>
                @endif
                <span class="m-form__help">
				
				</span>
            </div>

              <div class="col-lg-4">
                <label class="form-control-label">
                    Branch :
                </label>
                <select  class="form-control m-input" name="branch_id" id="branch_id">
                                        <option value="" disabled @if(is_null(old('branch_id'))) selected @endif >Choose
                                            Branch
                                        </option>
                                        @if(count($branches))
                                            @foreach($branches as $branch)
                                                <option value="{{$branch->id}}"
                                                        @if(old('branch_id') == $branch->id) selected @endif >{{$branch->code}}
                                                    - {{$branch->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                @if ($errors->has('status'))
                <div class="form-control-feedback">
                    {{ $errors->first('status') }}
                </div>
                @endif
                <span class="m-form__help">
				
				</span>
            </div>

        </div>
        <div class="form-group m-form__group row">
            <div class="col-lg-4">
                <label class="form-control-label">
                    Number of Packs (Adult):
                </label>
                <input type="number"  class="form-control m-input"  value="{{ old('no_of_packs_adult') }}"  id="no_of_packs_adult" name="pax">
                <span class="m-form__help">
		
				</span>
            </div>

            <div class="col-lg-4">
                <label class="form-control-label">
                Number of Packs (Children):
                </label>
                <input id="no_of_packs_children" name="pax_children" type="number" class="form-control m-input" value="{{ old('no_of_packs_children') }}">
               
                <span class="m-form__help">
					
				</span>
            </div>
          
            <div class="col-lg-4">
                <label class="form-control-label">
                 Tour Type:
                </label>
                <select  class="form-control m-input" name="tourType" id="tourType">

                        <option value="ROUND">Round Tour</option>
                        <option value="HOTELONLY">Accommodation Only</option>
                        <option value="TRANSPORTONLY">Transport Only</option>

                </select>
                <span class="m-form__help">
					
				</span>
            </div>
        </div>                
        <div class="form-group m-form__group row">
            <div class="col-lg-12"> 
            <label class="form-control-label">
            Remarks :
                </label>                    
            <textarea name="remarks" id="remarks" placeholder="Enter some remarks here"
            class="form-control m-input">{{ old('remarks') }}</textarea>
                                  
                                    @if ($errors->has('remarks'))
                                        <div class="error"> {{ $errors->first('remarks') }}  </div>
                                    @endif

 </div>
        </div>   

                      <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
        <div class="m-form__actions m-form__actions--solid">
            <div class="row">
                <div class="col-lg-6">
                
                    <button class="btn btn-primary" type="submit" name="action">Submit</button>
                    <button type="reset" class="btn btn-secondary">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
      
 </div>
           
        </form>

    </div>
</div>
@endsection

@section('Page_Scripts') @parent

<script src="{{ URL::asset('assets/demo/default/custom/components/forms/widgets/bootstrap-datetimepicker.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/select2/3.2/select2.min.js"></script>

@endsection

@section('Guest_Scripts')
    @parent
    <script type="text/javascript">


        $(document).ready(function () {

            tourCreateFFormInit();

        });

        $('input[type=radio][name=date_range]').change(function () {
            if (this.value == 'days') {
                $('#lblstart').html('Estimated Start Date');
                $('#lblend').html('Estimated End Date');
                $('#no_of_days').removeAttr('disabled');

            } else if (this.value == 'dates') {
                $('#no_of_days').prop('disabled',true);

            }

        });
        $('#end_date').change(function () {
            var startdate = moment($('#start_date').val());
            var endDate = moment($('#end_date').val());
            var noOfDays = endDate.diff(startdate,'days');

            $('#no_of_days').val(noOfDays);
        });
    </script>

@endsection