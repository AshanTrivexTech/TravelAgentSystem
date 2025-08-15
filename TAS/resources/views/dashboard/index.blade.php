@extends('layouts.tas_app')
@section('content')
	<!-- BEGIN: Subheader -->
	<div class="m-subheader ">
		<div class="d-flex align-items-center">
			<div class="mr-auto">
				<h3 class="m-subheader__title ">
				 Dashboard
				</h3>
			</div>    
			<div>
				<span class="m-subheader__daterange" id="m_dashboard_daterangepicker">
					<span class="m-subheader__daterange-label">
						<span class="m-subheader__daterange-title"></span>
						<span class="m-subheader__daterange-date m--font-brand"></span>
					</span>
					<a href="#" class="btn btn-sm btn-brand m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
						<i class="la la-angle-down"></i>
					</a>
				</span>
			</div>
		</div>
    </div>    
    <!-- END: Subheader -->
    
    <div id="dboard" class="m-content">
     <div class="row">

        

           <div class="col-xl-12">
            <div class="m-portlet">
                    <div class="m-portlet__body  m-portlet__body--no-padding">
                        <div class="row m-row--no-padding m-row--col-separator-xl">
                            <div class="col-sm-12 col-md-4 col-lg-4">

                                <!--begin::Total Profit-->
                                <div class="m-widget24">
                                    <div class="m-widget24__item">
                                        <h4 class="m-widget24__title">
                                           Total Quotations
                                        </h4>
                                        <br>
                                        <span class="m-widget24__desc">
                                            All Users
                                        </span>
                                        <span id="tot_quotes" class="m-widget24__stats m--font-brand">
                                            0
                                        </span>
                                       
                                        <div class="m-widget16" style="padding-left:28px;padding-right:28px;padding-bottom:20px;">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                               
                                                                <div class="m-widget16__body">
            
                                                                    <!--begin::widget item-->
                                                                    <div class="m-widget16__item">
                                                                        <span class="m-widget16__date">
                                                                            New
                                                                        </span>
                                                                        <span id="tot_quotes_new" class="m-widget16__price m--align-right m--font-brand">
                                                                            0
                                                                        </span>
                                                                    </div>
            
                                                                    <!--end::widget item-->
            
                                                                    <!--begin::widget item-->
                                                                    <div class="m-widget16__item">
                                                                        <span class="m-widget16__date">
                                                                            In Process
                                                                        </span>
                                                                        <span id="tot_quotes_in_process" class="m-widget16__price m--align-right m--font-accent">
                                                                           0
                                                                        </span>
                                                                    </div>
            
                                                                    <!--end::widget item-->
            
                                                                    <!--begin::widget item-->
                                                                    <div class="m-widget16__item">
                                                                        <span class="m-widget16__date">
                                                                            Pending
                                                                        </span>
                                                                        <span id="tot_quotes_pending" class="m-widget16__price m--align-right m--font-danger">
                                                                            0
                                                                        </span>
                                                                    </div>
            
                                                                    <!--end::widget item-->
            
                                                                    <!--begin::widget item-->
                                                                    <div class="m-widget16__item">
                                                                        <span class="m-widget16__date">
                                                                                Confirmed
                                                                        </span>
                                                                        <span id="tot_quotes_cf" class="m-widget16__price m--align-right m--font-brand">
                                                                            0
                                                                        </span>
                                                                    </div>                                                                         
                                                                </div>
                                                            </div>                                                           
                                                        </div>
                                                    </div>
                                        
                                        
                                    </div>
                                </div>

                                <!--end::Total Profit-->
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">

                                <!--begin::New Feedbacks-->
                                <div class="m-widget24">
                                    <div class="m-widget24__item">
                                        <h4 class="m-widget24__title">
                                            Bookings
                                        </h4>
                                        <br>
                                        <span class="m-widget24__desc">
                                            Total Bookings
                                        </span>
                                        <span class="m-widget24__stats m--font-info">
                                            0
                                        </span>
                                        
                                        <div class="m-widget16" style="padding-left:28px;padding-right:28px;padding-bottom:20px;">
                                                <div class="row">
                                                    <div class="col-md-12">                                                        
                                                        <div class="m-widget16__body">
    
                                                            <!--begin::widget item-->
                                                            <div class="m-widget16__item">
                                                                <span class="m-widget16__date">
                                                                    New
                                                                </span>
                                                                <span class="m-widget16__price m--align-right m--font-brand">
                                                                    0
                                                                </span>
                                                            </div>
    
                                                            <!--end::widget item-->
    
                                                            <!--begin::widget item-->
                                                            <div class="m-widget16__item">
                                                                <span class="m-widget16__date">
                                                                    In Process
                                                                </span>
                                                                <span class="m-widget16__price m--align-right m--font-accent">
                                                                   0
                                                                </span>
                                                            </div>
    
                                                            <!--end::widget item-->
    
                                                            <!--begin::widget item-->
                                                            <div class="m-widget16__item">
                                                                <span class="m-widget16__date">
                                                                    Pending
                                                                </span>
                                                                <span class="m-widget16__price m--align-right m--font-danger">
                                                                    0
                                                                </span>
                                                            </div>
    
                                                            <!--end::widget item-->
    
                                                            <!--begin::widget item-->
                                                            <div class="m-widget16__item">
                                                                <span class="m-widget16__date">
                                                                        Confirmed
                                                                </span>
                                                                <span class="m-widget16__price m--align-right m--font-brand">
                                                                    0
                                                                </span>
                                                            </div>                                                                         
                                                        </div>
                                                    </div>                                                           
                                                </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <!--end::New Feedbacks-->
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">

                                <!--begin::New Orders-->
                                <div class="m-widget24">
                                    <div class="m-widget24__item">
                                        <h4 class="m-widget24__title">
                                              Ongoing Tours
                                        </h4>
                                        <br>
                                        <span class="m-widget24__desc">
                                            Total 
                                        </span>
                                        <span class="m-widget24__stats m--font-danger">
                                            0
                                        </span>
                                        <div class="m-widget16" style="padding-left:28px;padding-right:28px;padding-bottom:20px;">
                                                <div class="row">
                                                    <div class="col-md-12">                                                        
                                                        <div class="m-widget16__body">
    
                                                            <!--begin::widget item-->
                                                            <div class="m-widget16__item">
                                                                <span class="m-widget16__date">
                                                                    FIT
                                                                </span>
                                                                <span class="m-widget16__price m--align-right m--font-brand">
                                                                    0
                                                                </span>
                                                            </div>
    
                                                            <!--end::widget item-->
    
                                                            <!--begin::widget item-->
                                                            <div class="m-widget16__item">
                                                                <span class="m-widget16__date">
                                                                    Group
                                                                </span>
                                                                <span class="m-widget16__price m--align-right m--font-accent">
                                                                   0
                                                                </span>
                                                            </div>
    
                                                            <!--end::widget item-->
    
                                                            <!--begin::widget item-->
                                                            <div class="m-widget16__item">
                                                                <span class="m-widget16__date">
                                                                    Arrival
                                                                </span>
                                                                <span class="m-widget16__price m--align-right m--font-danger">
                                                                    0
                                                                </span>
                                                            </div>
    
                                                            <!--end::widget item-->
    
                                                            <!--begin::widget item-->
                                                            <div class="m-widget16__item">
                                                                <span class="m-widget16__date">
                                                                        Departure
                                                                </span>
                                                                <span class="m-widget16__price m--align-right m--font-brand">
                                                                    0
                                                                </span>
                                                            </div>                                                                         
                                                        </div>
                                                    </div>                                                           
                                                </div>
                                        </div>
                                    </div>
                                </div>

                                <!--end::New Orders-->
                            </div>                           
                        </div>
                    </div>
            </div>
        </div>
     </div>
        <div class="row">
            <div class="col-xl-5">
                    <div class="m-portlet  m-portlet--full-height ">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <h3 class="m-portlet__head-text">
                                                You Achieved
                                        </h3>
                                    </div>
                                </div>
                                <div class="m-portlet__head-tools">
                                    <ul class="m-portlet__nav">
                                        <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                                            {{-- <a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl m-dropdown__toggle"> --}}
                                                {{-- <i class="fa fa-volume-up m--font-brand" style=""></i> --}}
                                            {{-- </a> --}}

                                            <div class="m-dropdown__wrapper" style="z-index: 101;">
                                                <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 21.5px;"></span>
                                               
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="m-portlet__body">
                                <div class="m-widget16">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="m-widget16__head">
                                                <div class="m-widget16__item">
                                                    <span class="m-widget16__sceduled">
                                                        Type
                                                    </span>
                                                    <span class="m-widget16__amount m--align-right">
                                                        Amount
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="m-widget16__body">

                                                <!--begin::widget item-->
                                                <div class="m-widget16__item">
                                                    <span class="m-widget16__date">
                                                        EPS
                                                    </span>
                                                    <span class="m-widget16__price m--align-right m--font-brand">
                                                        +78,05%
                                                    </span>
                                                </div>

                                                <!--end::widget item-->

                                                <!--begin::widget item-->
                                                <div class="m-widget16__item">
                                                    <span class="m-widget16__date">
                                                        PDO
                                                    </span>
                                                    <span class="m-widget16__price m--align-right m--font-accent">
                                                        21,700
                                                    </span>
                                                </div>

                                                <!--end::widget item-->

                                                <!--begin::widget item-->
                                                <div class="m-widget16__item">
                                                    <span class="m-widget16__date">
                                                        OPL Status
                                                    </span>
                                                    <span class="m-widget16__price m--align-right m--font-danger">
                                                        Negative
                                                    </span>
                                                </div>

                                                <!--end::widget item-->

                                                <!--begin::widget item-->
                                                <div class="m-widget16__item">
                                                    <span class="m-widget16__date">
                                                        Priority
                                                    </span>
                                                    <span class="m-widget16__price m--align-right m--font-brand">
                                                        +500,200
                                                    </span>
                                                </div>

                                                <!--end::widget item-->

                                                <!--begin::widget item-->
                                                <div class="m-widget16__item">
                                                    <span class="m-widget16__date">
                                                        Net Prifit
                                                    </span>
                                                    <span class="m-widget16__price m--align-right m--font-brand">
                                                        $18,540,60
                                                    </span>
                                                </div>

                                                <!--end::widget item-->
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="m-widget16__stats">
                                                <div class="m-widget16__visual">
                                                    <div id="m_chart_support_tickets" style="height: 180px"><svg height="180" version="1.1" width="226" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.84375px; top: -0.921875px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="none" stroke="#00c5dc" d="M118,143.33333333333334A53.333333333333336,53.333333333333336,0,0,0,169.30432749565438,104.57087590582967" stroke-width="2" opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;"></path><path fill="#00c5dc" stroke="#ffffff" d="M118,146.33333333333334A56.333333333333336,56.333333333333336,0,0,0,172.19019591728494,105.3904876755326L194.95649124348154,111.8563138587445A80,80,0,0,1,118,170Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#716aca" d="M169.30432749565438,104.57087590582967A53.333333333333336,53.333333333333336,0,1,0,83.87781414231311,130.9892775825327" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#716aca" stroke="#ffffff" d="M172.19019591728494,105.3904876755326A56.333333333333336,56.333333333333336,0,1,0,81.95844118781822,133.29492444655017L70.01567613762782,147.64117160043662A75,75,0,1,1,190.14671054076396,110.49029424257297Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#f4516c" d="M83.87781414231311,130.9892775825327A53.333333333333336,53.333333333333336,0,0,0,117.98324483945643,143.33333070143885" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#f4516c" stroke="#ffffff" d="M81.95844118781822,133.29492444655017A56.333333333333336,56.333333333333336,0,0,0,117.98230236167585,146.33333055339477L117.9764380554856,164.9999962988984A75,75,0,0,1,70.01567613762782,147.64117160043662Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="118" y="80" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="15px" stroke="none" fill="#a7a7c2" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 15px; font-weight: 800;" font-weight="800" transform="matrix(1.2121,0,0,1.2121,-25.0286,-19.303)" stroke-width="0.825"><tspan dy="6" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Margins</tspan></text><text x="118" y="100" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="14px" stroke="none" fill="#a7a7c2" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 14px;" transform="matrix(1.1111,0,0,1.1111,-13.1215,-10.2222)" stroke-width="0.8999999999999999"><tspan dy="5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">20</tspan></text></svg>
                                                    </div>
                                                </div>
                                                <div class="m-widget16__legends">
                                                    <div class="m-widget16__legend">
                                                        <span class="m-widget16__legend-bullet m--bg-info"></span>
                                                        <span class="m-widget16__legend-text">20% Margins</span>
                                                    </div>
                                                    <div class="m-widget16__legend">
                                                        <span class="m-widget16__legend-bullet m--bg-accent"></span>
                                                        <span class="m-widget16__legend-text">80% Profit</span>
                                                    </div>
                                                    <div class="m-widget16__legend">
                                                        <span class="m-widget16__legend-bullet m--bg-danger"></span>
                                                        <span class="m-widget16__legend-text">10% Lost</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
            </div>
            <div class="col-xl-7">
                    <div class="m-portlet">
                            <div class="m-portlet__body m-portlet__body--no-padding">
                                <div class="row m-row--no-padding m-row--col-separator-xl">
                                    <div class="col-md-12 col-lg-12 col-xl-4">
            
                                        <!--begin:: Widgets/Stats2-1 -->
                                        <div class="m-widget1">
                                            <div class="m-widget1__item">
                                                <div class="row m-row--no-padding align-items-center">
                                                    <div class="col">
                                                        <h3 class="m-widget1__title">Member Profit</h3>
                                                        <span class="m-widget1__desc">Awerage Weekly Profit</span>
                                                    </div>
                                                    <div class="col m--align-right">
                                                        <span class="m-widget1__number m--font-brand">+$17,800</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-widget1__item">
                                                <div class="row m-row--no-padding align-items-center">
                                                    <div class="col">
                                                        <h3 class="m-widget1__title">Orders</h3>
                                                        <span class="m-widget1__desc">Weekly Customer Orders</span>
                                                    </div>
                                                    <div class="col m--align-right">
                                                        <span class="m-widget1__number m--font-danger">+1,800</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-widget1__item">
                                                <div class="row m-row--no-padding align-items-center">
                                                    <div class="col">
                                                        <h3 class="m-widget1__title">Issue Reports</h3>
                                                        <span class="m-widget1__desc">System bugs and issues</span>
                                                    </div>
                                                    <div class="col m--align-right">
                                                        <span class="m-widget1__number m--font-success">-27,49%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
            
                                        <!--end:: Widgets/Stats2-1 -->
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-4">
            
                                        <!--begin:: Widgets/Stats2-2 -->
                                        <div class="m-widget1">
                                            <div class="m-widget1__item">
                                                <div class="row m-row--no-padding align-items-center">
                                                    <div class="col">
                                                        <h3 class="m-widget1__title">IPO Margin</h3>
                                                        <span class="m-widget1__desc">Awerage IPO Margin</span>
                                                    </div>
                                                    <div class="col m--align-right">
                                                        <span class="m-widget1__number m--font-accent">+24%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-widget1__item">
                                                <div class="row m-row--no-padding align-items-center">
                                                    <div class="col">
                                                        <h3 class="m-widget1__title">Payments</h3>
                                                        <span class="m-widget1__desc">Yearly Expenses</span>
                                                    </div>
                                                    <div class="col m--align-right">
                                                        <span class="m-widget1__number m--font-info">+$560,800</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-widget1__item">
                                                <div class="row m-row--no-padding align-items-center">
                                                    <div class="col">
                                                        <h3 class="m-widget1__title">Logistics</h3>
                                                        <span class="m-widget1__desc">Overall Regional Logistics</span>
                                                    </div>
                                                    <div class="col m--align-right">
                                                        <span class="m-widget1__number m--font-warning">-10%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
            
                                        <!--begin:: Widgets/Stats2-2 -->
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-4">
            
                                        <!--begin:: Widgets/Stats2-3 -->
                                        <div class="m-widget1">
                                            <div class="m-widget1__item">
                                                <div class="row m-row--no-padding align-items-center">
                                                    <div class="col">
                                                        <h3 class="m-widget1__title">Orders</h3>
                                                        <span class="m-widget1__desc">Awerage Weekly Orders</span>
                                                    </div>
                                                    <div class="col m--align-right">
                                                        <span class="m-widget1__number m--font-success">+15%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-widget1__item">
                                                <div class="row m-row--no-padding align-items-center">
                                                    <div class="col">
                                                        <h3 class="m-widget1__title">Transactions</h3>
                                                        <span class="m-widget1__desc">Daily Transaction Increase</span>
                                                    </div>
                                                    <div class="col m--align-right">
                                                        <span class="m-widget1__number m--font-danger">+80%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-widget1__item">
                                                <div class="row m-row--no-padding align-items-center">
                                                    <div class="col">
                                                        <h3 class="m-widget1__title">Revenue</h3>
                                                        <span class="m-widget1__desc">Overall Revenue Increase</span>
                                                    </div>
                                                    <div class="col m--align-right">
                                                        <span class="m-widget1__number m--font-primary">+60%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
            
                                        <!--begin:: Widgets/Stats2-3 -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
        
            <div class="row">

                <div class="col-xl-6">
                        <div class="m-portlet m-portlet--full-height ">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <h3 class="m-portlet__head-text">
                                                Special Announcement
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="m-portlet__head-tools">
                                        <ul class="m-portlet__nav">
                                            <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                                                <div class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl">
                                                    <i class="fa fa-volume-up m--font-brand"></i>
                                                </div>
                                                
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="m-portlet__body">
                                    <div class="m-widget3">
                                            @foreach($annoucements->all() as $annoucement)
                                        <div class="m-widget3__item">
                                            <div class="m-widget3__header">
                                                <div class="m-widget3__user-img">
                                                    <img class="m-widget3__img" src="../../assets/app/media/img/users/user4.jpg" alt="">
                                                </div>
                                                <div class="m-widget3__info">
                                                    <span class="m-widget3__username">
                                                        {{$annoucement->name}}
                                                    </span>
                                                    <br>
                                                    <span class="m-widget3__time">
                                                        {{Carbon\Carbon::parse($annoucement->created_at)->diffForHumans()}}
                                                    </span>
                                                </div>
                                                 @if($annoucement->priority==1)
                                                <span class="m-widget3__status m--font-danger">
                                                        Urgent
                                                </span>
                                                 @else
                                                 <span class="m-widget3__status m--font-info">
                                                        Not&nbsp;Urgent
                                                    </span>
                                                    @endif
                                            </div>
                                            <div class="m-widget3__body">
                                               
                                                <p class="m-widget3__text">
                                                    
                                                    {{$annoucement->message}}
                                                    
                                                </p>
                                            </div>
                                        </div>
                                        @endforeach
                                        {{-- <div class="m-widget3__item">
                                            <div class="m-widget3__header">
                                                <div class="m-widget3__user-img">
                                                    <img class="m-widget3__img" src="../../assets/app/media/img/users/user4.jpg" alt="">
                                                </div>
                                                <div class="m-widget3__info">
                                                    <span class="m-widget3__username">
                                                        Lebron King James
                                                    </span>
                                                    <br>
                                                    <span class="m-widget3__time">
                                                        1 day ago
                                                    </span>
                                                </div>
                                                <span class="m-widget3__status m--font-brand">
                                                    Open
                                                </span>
                                            </div>
                                            <div class="m-widget3__body">
                                                <p class="m-widget3__text">
                                                    Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh euismod tinciduntut laoreet doloremagna aliquam erat volutpat.Ut wisi enim ad minim veniam,quis nostrud exerci tation ullamcorper.
                                                </p>
                                            </div>
                                        </div> --}}
                                        {{-- <div class="m-widget3__item">
                                            <div class="m-widget3__header">
                                                <div class="m-widget3__user-img">
                                                    <img class="m-widget3__img" src="../../assets/app/media/img/users/user5.jpg" alt="">
                                                </div>
                                                <div class="m-widget3__info">
                                                    <span class="m-widget3__username">
                                                        Deb Gibson
                                                    </span>
                                                    <br>
                                                    <span class="m-widget3__time">
                                                        3 weeks ago
                                                    </span>
                                                </div>
                                                <span class="m-widget3__status m--font-success">
                                                    Closed
                                                </span>
                                            </div>
                                            <div class="m-widget3__body">
                                                <p class="m-widget3__text">
                                                    Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh euismod tinciduntut laoreet doloremagna aliquam erat volutpat.
                                                </p>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                
                            </div>
                </div>
                <div class="col-xl-6 col-lg-12">
                    
                        <div class="m-portlet m-portlet--full-height ">
                                <div class="m-portlet__head">
                                    <div class="m-portlet__head-caption">
                                        <div class="m-portlet__head-title">
                                            <h3 class="m-portlet__head-text">
                                                Recent Works History
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="m-portlet__head-tools">
                                        <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                                            <li class="nav-item m-tabs__item">
                                                <a class="nav-link m-tabs__link active show" data-toggle="tab" href="#m_widget2_tab1_content" role="tab" aria-selected="true">
                                                    Today
                                                </a>
                                            </li>
                                            <li class="nav-item m-tabs__item">
                                                <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget2_tab2_content" role="tab" aria-selected="false">
                                                    Month
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="m-portlet__body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="m_widget2_tab1_content">

                                            <!--Begin::Timeline 3 -->
                                            <div class="m-timeline-3">
                                                <div class="m-timeline-3__items">
                                                    <div class="m-timeline-3__item m-timeline-3__item--info">
                                                        <span class="m-timeline-3__item-time">09:00</span>
                                                        <div class="m-timeline-3__item-desc">
                                                            <span class="m-timeline-3__item-text">
                                                                Lorem ipsum dolor sit amit,consectetur eiusmdd tempor
                                                            </span>
                                                            <br>
                                                            <span class="m-timeline-3__item-user-name">
                                                                <a href="#" class="m-link m-link--metal m-timeline-3__item-link">
                                                                    By Bob
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="m-timeline-3__item m-timeline-3__item--warning">
                                                        <span class="m-timeline-3__item-time">10:00</span>
                                                        <div class="m-timeline-3__item-desc">
                                                            <span class="m-timeline-3__item-text">
                                                                Lorem ipsum dolor sit amit
                                                            </span>
                                                            <br>
                                                            <span class="m-timeline-3__item-user-name">
                                                                <a href="#" class="m-link m-link--metal m-timeline-3__item-link">
                                                                    By Sean
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="m-timeline-3__item m-timeline-3__item--brand">
                                                        <span class="m-timeline-3__item-time">11:00</span>
                                                        <div class="m-timeline-3__item-desc">
                                                            <span class="m-timeline-3__item-text">
                                                                Lorem ipsum dolor sit amit eiusmdd tempor
                                                            </span>
                                                            <br>
                                                            <span class="m-timeline-3__item-user-name">
                                                                <a href="#" class="m-link m-link--metal m-timeline-3__item-link">
                                                                    By James
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="m-timeline-3__item m-timeline-3__item--success">
                                                        <span class="m-timeline-3__item-time">12:00</span>
                                                        <div class="m-timeline-3__item-desc">
                                                            <span class="m-timeline-3__item-text">
                                                                Lorem ipsum dolor
                                                            </span>
                                                            <br>
                                                            <span class="m-timeline-3__item-user-name">
                                                                <a href="#" class="m-link m-link--metal m-timeline-3__item-link">
                                                                    By James
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="m-timeline-3__item m-timeline-3__item--danger">
                                                        <span class="m-timeline-3__item-time">14:00</span>
                                                        <div class="m-timeline-3__item-desc">
                                                            <span class="m-timeline-3__item-text">
                                                                Lorem ipsum dolor sit amit,consectetur eiusmdd
                                                            </span>
                                                            <br>
                                                            <span class="m-timeline-3__item-user-name">
                                                                <a href="#" class="m-link m-link--metal m-timeline-3__item-link">
                                                                    By Derrick
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="m-timeline-3__item m-timeline-3__item--info">
                                                        <span class="m-timeline-3__item-time">15:00</span>
                                                        <div class="m-timeline-3__item-desc">
                                                            <span class="m-timeline-3__item-text">
                                                                Lorem ipsum dolor sit amit,consectetur
                                                            </span>
                                                            <br>
                                                            <span class="m-timeline-3__item-user-name">
                                                                <a href="#" class="m-link m-link--metal m-timeline-3__item-link">
                                                                    By Iman
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="m-timeline-3__item m-timeline-3__item--brand">
                                                        <span class="m-timeline-3__item-time">17:00</span>
                                                        <div class="m-timeline-3__item-desc">
                                                            <span class="m-timeline-3__item-text">
                                                                Lorem ipsum dolor sit consectetur eiusmdd tempor
                                                            </span>
                                                            <br>
                                                            <span class="m-timeline-3__item-user-name">
                                                                <a href="#" class="m-link m-link--metal m-timeline-3__item-link">
                                                                    By Aziko
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--End::Timeline 3 -->
                                        </div>
                                        <div class="tab-pane" id="m_widget2_tab2_content">

                                            <!--Begin::Timeline 3 -->
                                            <div class="m-timeline-3">
                                                <div class="m-timeline-3__items">
                                                    <div class="m-timeline-3__item m-timeline-3__item--info">
                                                        <span class="m-timeline-3__item-time m--font-focus">09:00</span>
                                                        <div class="m-timeline-3__item-desc">
                                                            <span class="m-timeline-3__item-text">
                                                                Contrary to popular belief, Lorem Ipsum is not simply random text.
                                                            </span>
                                                            <br>
                                                            <span class="m-timeline-3__item-user-name">
                                                                <a href="#" class="m-link m-link--metal m-timeline-3__item-link">
                                                                    By Bob
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="m-timeline-3__item m-timeline-3__item--warning">
                                                        <span class="m-timeline-3__item-time m--font-warning">10:00</span>
                                                        <div class="m-timeline-3__item-desc">
                                                            <span class="m-timeline-3__item-text">
                                                                There are many variations of passages of Lorem Ipsum available.
                                                            </span>
                                                            <br>
                                                            <span class="m-timeline-3__item-user-name">
                                                                <a href="#" class="m-link m-link--metal m-timeline-3__item-link">
                                                                    By Sean
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="m-timeline-3__item m-timeline-3__item--brand">
                                                        <span class="m-timeline-3__item-time m--font-primary">11:00</span>
                                                        <div class="m-timeline-3__item-desc">
                                                            <span class="m-timeline-3__item-text">
                                                                Contrary to popular belief, Lorem Ipsum is not simply random text.
                                                            </span>
                                                            <br>
                                                            <span class="m-timeline-3__item-user-name">
                                                                <a href="#" class="m-link m-link--metal m-timeline-3__item-link">
                                                                    By James
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="m-timeline-3__item m-timeline-3__item--success">
                                                        <span class="m-timeline-3__item-time m--font-success">12:00</span>
                                                        <div class="m-timeline-3__item-desc">
                                                            <span class="m-timeline-3__item-text">
                                                                The standard chunk of Lorem Ipsum used since the 1500s is reproduced.
                                                            </span>
                                                            <br>
                                                            <span class="m-timeline-3__item-user-name">
                                                                <a href="#" class="m-link m-link--metal m-timeline-3__item-link">
                                                                    By James
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="m-timeline-3__item m-timeline-3__item--danger">
                                                        <span class="m-timeline-3__item-time m--font-warning">14:00</span>
                                                        <div class="m-timeline-3__item-desc">
                                                            <span class="m-timeline-3__item-text">
                                                                Latin words, combined with a handful of model sentence structures.
                                                            </span>
                                                            <br>
                                                            <span class="m-timeline-3__item-user-name">
                                                                <a href="#" class="m-link m-link--metal m-timeline-3__item-link">
                                                                    By Derrick
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="m-timeline-3__item m-timeline-3__item--info">
                                                        <span class="m-timeline-3__item-time m--font-info">15:00</span>
                                                        <div class="m-timeline-3__item-desc">
                                                            <span class="m-timeline-3__item-text">
                                                                Contrary to popular belief, Lorem Ipsum is not simply random text.
                                                            </span>
                                                            <br>
                                                            <span class="m-timeline-3__item-user-name">
                                                                <a href="#" class="m-link m-link--metal m-timeline-3__item-link">
                                                                    By Iman
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="m-timeline-3__item m-timeline-3__item--brand">
                                                        <span class="m-timeline-3__item-time m--font-danger">17:00</span>
                                                        <div class="m-timeline-3__item-desc">
                                                            <span class="m-timeline-3__item-text">
                                                                Lorem Ipsum is therefore always free from repetition, injected humour.
                                                            </span>
                                                            <br>
                                                            <span class="m-timeline-3__item-user-name">
                                                                <a href="#" class="m-link m-link--metal m-timeline-3__item-link">
                                                                    By Aziko
                                                                </a>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--End::Timeline 3 -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                </div>
                {{-- <div class="col-md-8">
            
                    <div class="m-portlet">
                    <div class="m-portlet__body m-portlet__body--no-padding">
                        <div class="row m-row--no-padding m-row--col-separator-xl">
                            <div class="col-md-12 col-lg-12 col-xl-4">

                                <!--begin:: Widgets/Stats2-1 -->
                                <div class="m-widget1">
                                    <div class="m-widget1__item">
                                        <div class="row m-row--no-padding align-items-center">
                                            <div class="col">
                                                <h3 class="m-widget1__title">Member Profit</h3>
                                                <span class="m-widget1__desc">Awerage Weekly Profit</span>
                                            </div>
                                            <div class="col m--align-right">
                                                <span class="m-widget1__number m--font-brand">+$17,800</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget1__item">
                                        <div class="row m-row--no-padding align-items-center">
                                            <div class="col">
                                                <h3 class="m-widget1__title">Orders</h3>
                                                <span class="m-widget1__desc">Weekly Customer Orders</span>
                                            </div>
                                            <div class="col m--align-right">
                                                <span class="m-widget1__number m--font-danger">+1,800</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget1__item">
                                        <div class="row m-row--no-padding align-items-center">
                                            <div class="col">
                                                <h3 class="m-widget1__title">Issue Reports</h3>
                                                <span class="m-widget1__desc">System bugs and issues</span>
                                            </div>
                                            <div class="col m--align-right">
                                                <span class="m-widget1__number m--font-success">-27,49%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--end:: Widgets/Stats2-1 -->
                            </div>
                            <div class="col-md-12 col-lg-12 col-xl-4">

                                <!--begin:: Widgets/Stats2-2 -->
                                <div class="m-widget1">
                                    <div class="m-widget1__item">
                                        <div class="row m-row--no-padding align-items-center">
                                            <div class="col">
                                                <h3 class="m-widget1__title">IPO Margin</h3>
                                                <span class="m-widget1__desc">Awerage IPO Margin</span>
                                            </div>
                                            <div class="col m--align-right">
                                                <span class="m-widget1__number m--font-accent">+24%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget1__item">
                                        <div class="row m-row--no-padding align-items-center">
                                            <div class="col">
                                                <h3 class="m-widget1__title">Payments</h3>
                                                <span class="m-widget1__desc">Yearly Expenses</span>
                                            </div>
                                            <div class="col m--align-right">
                                                <span class="m-widget1__number m--font-info">+$560,800</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget1__item">
                                        <div class="row m-row--no-padding align-items-center">
                                            <div class="col">
                                                <h3 class="m-widget1__title">Logistics</h3>
                                                <span class="m-widget1__desc">Overall Regional Logistics</span>
                                            </div>
                                            <div class="col m--align-right">
                                                <span class="m-widget1__number m--font-warning">-10%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--begin:: Widgets/Stats2-2 -->
                            </div>
                            <div class="col-md-12 col-lg-12 col-xl-4">

                                <!--begin:: Widgets/Stats2-3 -->
                                <div class="m-widget1">
                                    <div class="m-widget1__item">
                                        <div class="row m-row--no-padding align-items-center">
                                            <div class="col">
                                                <h3 class="m-widget1__title">Orders</h3>
                                                <span class="m-widget1__desc">Awerage Weekly Orders</span>
                                            </div>
                                            <div class="col m--align-right">
                                                <span class="m-widget1__number m--font-success">+15%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget1__item">
                                        <div class="row m-row--no-padding align-items-center">
                                            <div class="col">
                                                <h3 class="m-widget1__title">Transactions</h3>
                                                <span class="m-widget1__desc">Daily Transaction Increase</span>
                                            </div>
                                            <div class="col m--align-right">
                                                <span class="m-widget1__number m--font-danger">+80%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-widget1__item">
                                        <div class="row m-row--no-padding align-items-center">
                                            <div class="col">
                                                <h3 class="m-widget1__title">Revenue</h3>
                                                <span class="m-widget1__desc">Overall Revenue Increase</span>
                                            </div>
                                            <div class="col m--align-right">
                                                <span class="m-widget1__number m--font-primary">+60%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!--begin:: Widgets/Stats2-3 -->
                            </div>
                        </div>
                    </div>
                </div>
                </div> --}}
            </div>
            
            {{-- <button type="button" onclick="load_dashbord_data()">Req</button> --}}
    </div>    
    
    @include('dashboard.dashbord_js')

@endsection     

