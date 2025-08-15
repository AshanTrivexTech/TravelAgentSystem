@extends('layouts.tas_app') @section('content')
<!-- BEGIN: Subheader -->
<meta name="_token" content="{{csrf_token()}}" />

<div class="m-content">
    <div class="m-portlet">
        
    <form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" method="POST"  id="add_currencyFrm">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-6">
                            <li class="m-nav__item m-topbar__notifications m-topbar__notifications--img m-dropdown m-dropdown--large m-dropdown--header-bg-fill m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width m-dropdown--open" m-dropdown-toggle="click" m-dropdown-persistent="1" aria-expanded="true">
                                    <a href="#" class="m-nav__link m-dropdown__toggle" id="m_topbar_notification_icon">
                                        {{-- <span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger"></span> --}}
                                        {{-- <span class="m-nav__link-icon"> --}}
                                            {{-- <i class="flaticon-music"></i> --}}
                                        {{-- </span> --}}
                                    </a>
                                    <div class="m-dropdown__wrapper" style="z-index: 101;">
                                        <span class="m-dropdown__arrow m-dropdown__arrow--center"></span>
                                        <div class="m-dropdown__inner">
                                            <div class="m-dropdown__header m--align-center" style="background: url(assets/app/media/img/misc/notification_bg.jpg); background-size: cover;">
                                                <span class="m-dropdown__header-title">7 NEW</span>
                                                <span class="m-dropdown__header-subtitle">USER NOTIFICATIONS</span>
                                            </div>
                                            <div class="m-dropdown__body">
                                                <div class="m-dropdown__content">
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="topbar_notifications_notifications" role="tabpanel">
                                                            <div class="m-scrollable m-scroller ps ps--active-y" data-scrollable="true" data-height="250" data-mobile-height="200" style="height: 250px; overflow: hidden;">
                                                                <div class="m-list-timeline m-list-timeline--skin-light">
                                                                    <div class="m-list-timeline__items">
                                                                        <div class="m-list-timeline__item">
                                                                            <span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>
                                                                            <span class="m-list-timeline__text">12 new users registered</span>
                                                                            <span class="m-list-timeline__time">Just now</span>
                                                                        </div>
                                                                        <div class="m-list-timeline__item">
                                                                            <span class="m-list-timeline__badge"></span>
                                                                            <span class="m-list-timeline__text">System shutdown
                                                                                <span class="m-badge m-badge--success m-badge--wide">pending</span>
                                                                            </span>
                                                                            <span class="m-list-timeline__time">14 mins</span>
                                                                        </div>
                                                                        <div class="m-list-timeline__item">
                                                                            <span class="m-list-timeline__badge"></span>
                                                                            <span class="m-list-timeline__text">New invoice received</span>
                                                                            <span class="m-list-timeline__time">20 mins</span>
                                                                        </div>
                                                                        <div class="m-list-timeline__item">
                                                                            <span class="m-list-timeline__badge"></span>
                                                                            <span class="m-list-timeline__text">DB overloaded 80%
                                                                                <span class="m-badge m-badge--info m-badge--wide">settled</span>
                                                                            </span>
                                                                            <span class="m-list-timeline__time">1 hr</span>
                                                                        </div>
                                                                        <div class="m-list-timeline__item">
                                                                            <span class="m-list-timeline__badge"></span>
                                                                            <span class="m-list-timeline__text">
                                                                                <input type="text" width="50px;" style="border-radius:auto;">
                                                                            </span>
                                                                            <span class="m-list-timeline__time"><i class="fa fa-paper-plane" aria-hidden="true" style="color:navy;"></i></span>
                                                                        </div>
                                                                        
                                                                        
                                                                    </div>
                                                                </div>
                                                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;">
                                                                </div>
                                                            </div>
                                                            <div class="ps__rail-y" style="top: 0px; right: 4px; height: 250px;">
                                                                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 220px;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </li>
                    </div>
                    <div class="col-lg-6">
                                    <div class="row">
                                      <div class="col-lg-8">
                                      </div>
                                     
                                    </div>
                    </div>
                    </div>
                    
                    
                  
                        </form>
                    </div>
                </div>
                                                    
        
      @endsection

