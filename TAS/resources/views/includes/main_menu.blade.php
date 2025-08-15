<!-- START LEFT SIDEBAR NAV -->
<aside id="left-sidebar-nav" class="nav-expanded nav-lock nav-collapsible">
  <div class="brand-sidebar">
    <h1 class="logo-wrapper">
      <a href="index.html" class="brand-logo darken-1">
        <img src="{{asset('/images/logo/materialize-logo.png')}}" alt="materialize logo">
        <span class="logo-text hide-on-med-and-down">{{config('custom.short_name')}}</span>
      </a>
      <a href="#" class="navbar-toggler">
        <i class="material-icons">radio_button_checked</i>
      </a>
    </h1>  
  </div>
  <ul id="slide-out" class="side-nav fixed leftside-navigation">
    <!-- pages starting -->

    <li class="no-padding">
      <ul class="collapsible" data-collapsible="locations">
        <li class="bold">
          <a class="collapsible-header waves-effect waves-cyan">
            <i class="material-icons">my_location</i>
            <span class="nav-text">Master Data</span>
          </a>

          <div class="collapsible-body">
            <ul class="collapsible" data-collapsible="locations">

              <li>
                <a href="">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span>Countries</span>
                </a>
              </li>
              <li>
                <a href="">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span>Provinces</span>
                </a>
              </li>
              <li>
                <a href="">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span>Districts</span>
                </a>
              </li>
              <li>
                <a href="">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span>Cities</span>
                </a>
              </li> 
              <li>
                <a href="">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span>Markets</span>
                </a>
              </li>
              <li>
                <a href="">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span>Agents</span>
                </a>
              </li>
              
            
            </ul>
          </div>
        </li>
      </ul>
    </li><!-- first set end -->

    <li class="no-padding">
      <ul class="collapsible" data-collapsible="locations">
        <li class="bold">
          <a class="collapsible-header waves-effect waves-cyan">
            <i class="material-icons">directions</i>
            <span class="nav-text">Destination Manager</span>
          </a>

          <div class="collapsible-body">
            <ul class="collapsible" data-collapsible="locations">

           {{--     <li>
                <a href="{{route('location_payment_type-all-view')}}">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span>Location Payment Types</span>
                </a>
              </li>  --}}

              <li>
                <a href="">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span>Locations</span>
                </a>
              </li>

              <li>
                <a href="">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span>Directions</span>
                </a>
              </li>
             
            </ul>
          </div>
        </li>
      </ul>
    </li><!-- first set end -->

    <li class="no-padding">
      <ul class="collapsible" data-collapsible="currencies">
        <li class="bold">
          <a class="collapsible-header waves-effect waves-cyan">
            <i class="material-icons">money_off</i>
            <span class="nav-text">Currency Manager</span>
          </a>

          <div class="collapsible-body">
            <ul class="collapsible" data-collapsible="currencies">
              <li>
                <a href="">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span>Manual Currency Rates</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </li><!-- second set end -->

    <li class="no-padding">
      <ul class="collapsible" data-collapsible="transport">
        <li class="bold">
          <a class="collapsible-header waves-effect waves-cyan">
            <i class="material-icons">directions_car</i>
            <span class="nav-text">Transport Manager </span>
          </a>

          <div class="collapsible-body">
            <ul class="collapsible" data-collapsible="transport">
              <li>
                <a href="">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span>Vehicle Types</span>
                </a>
              </li>
              <li>
                <a href="">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span>Vehicles</span>
                </a>
              </li>
              <li>
                <a href="">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span>Transport Expenses</span>
                </a>
              </li>
              <li>
                <a href="">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span>Drivers</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </li><!-- third set end -->
    <li class="no-padding">     
                    <ul class="collapsible" data-collapsible="company">
                      <li class="bold">
                        <a class="collapsible-header waves-effect waves-cyan">
                          <i class="material-icons">card_travel</i>
                          <span class="nav-text">Miscellaneous Manager </span>
                        </a>

                        <div class="collapsible-body">
                          <ul class="collapsible" data-collapsible="company">
                            <li>
                              <a href="">
                                <i class="material-icons">keyboard_arrow_right</i>
                                <span>Transport</span>
                              </a>
                            </li>
                            <li>
                              <a href="">
                                <i class="material-icons">keyboard_arrow_right</i>
                                <span>Location</span>
                              </a>
                            </li>
                            <li>
                              <a href="">
                                <i class="material-icons">keyboard_arrow_right</i>
                                <span>Other</span>
                              </a>
                            </li>
                             <li>
                              <a href="">
                                <i class="material-icons">keyboard_arrow_right</i>
                                <span>Suppliers</span>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </li>
                    </ul>
                  </li>
                  <li class="no-padding">
                    <ul class="collapsible" data-collapsible="hotels">
                      <li class="bold">
                        <a class="collapsible-header waves-effect waves-cyan">
                          <i class="material-icons">hotel</i>
                          <span class="nav-text">Hotels Manager </span>
                        </a>

                        <div class="collapsible-body">
                          <ul class="collapsible" data-collapsible="hotels">
                            <li>
                              <a href="">
                                <i class="material-icons">keyboard_arrow_right</i>
                                <span>Hotel Packages</span>
                              </a>
                            </li>
                            <li>
                              <a href="">
                                <i class="material-icons">keyboard_arrow_right</i>
                                <span>Hotel Features</span>
                              </a>
                            </li>
                            <li>
                              <a href="">
                                <i class="material-icons">keyboard_arrow_right</i>
                                <span>Hotel Groups</span>
                              </a>
                            </li>
                            <li>
                              <a href="">
                                <i class="material-icons">keyboard_arrow_right</i>
                                <span>Hotels</span>
                              </a>
                            </li>
                          </ul>
                        </div>
                      </li>
                    </ul>
                  </li><!-- third set end -->

                  <li class="no-padding">
                    <ul class="collapsible" data-collapsible="company">
                      <li class="bold">
                        <a class="collapsible-header waves-effect waves-cyan">
                          <i class="material-icons">card_travel</i>
                          <span class="nav-text">Company Manager </span>
                        </a>

                        <div class="collapsible-body">
                          <ul class="collapsible" data-collapsible="company">
                            <li>
                              <a href="">
                                <i class="material-icons">keyboard_arrow_right</i>
                                <span>Company</span>
                              </a>
                            </li>
                            <li>
                              <a href="">
                                <i class="material-icons">keyboard_arrow_right</i>
                                <span>Branches</span>
                              </a>
                            </li>
                            <!-- <li>
                              <a href="">
                                <i class="material-icons">keyboard_arrow_right</i>
                                <span>Suppliers</span>
                              </a>
                            </li> -->
                          </ul>
                        </div>
                      </li>
                    </ul>
                  </li>
                  <li class="no-padding">
                    <ul class="collapsible" data-collapsible="company">
                      <li class="bold">
                        <a href="">
                          <i class="material-icons">card_travel</i>
                          <span class="nav-text">Supplier Manager </span>
                        </a>
                        </li>
                        </ul>
                        <li>
                  <li class="no-padding">
                    <ul class="collapsible" data-collapsible="users">
                      <li class="bold">
                        <a class="collapsible-header waves-effect waves-cyan">
                          <i class="material-icons">face</i>
                          <span class="nav-text">Users Manager </span>
                        </a>

                        <div class="collapsible-body">
                          <ul class="collapsible" data-collapsible="users">
                            <li>
                              <a href="">
                                <i class="material-icons">keyboard_arrow_right</i>
                                <span>User Roles </span>
                              </a>
                            </li>
                            <li>
                              <a href="">
                                <i class="material-icons">keyboard_arrow_right</i>
                                <span>Users Role Actions</span>
                              </a>
                            </li> 
                            <li>
                              <a href="">
                                <i class="material-icons">keyboard_arrow_right</i>
                                <span>System Users</span>
                              </a>
                            </li>
                            <!-- <li>
                              <a href="">
                                <i class="material-icons">keyboard_arrow_right</i>
                                <span>Tourists</span>
                              </a>
                            </li>

                            <li>
                              <a href="">
                                <i class="material-icons">keyboard_arrow_right</i>
                                <span>Agents</span>
                              </a>
                            </li>
                            <li>
                              <a href="">
                                <i class="material-icons">keyboard_arrow_right</i>
                                <span>Drivers</span>
                              </a>
                            </li> -->
                          </ul>
                        </div>
                      </li>
                    </ul>
                  </li><!-- users set end -->

    <!-- <li class="no-padding">
      <ul class="collapsible" data-collapsible="logs">
        <li class="bold">
          <a class="collapsible-header waves-effect waves-cyan">
            <i class="material-icons">folder</i>
            <span class="nav-text">Logs </span>
          </a>

          <div class="collapsible-body">
            <ul class="collapsible" data-collapsible="logs">
              <li>
                <a href="">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span>Audit Log</span>
                </a>
              </li>
            </ul>
          </div> 
        </li>
      </ul>
    </li>  -->


    <li class="li-hover">
      <p class="ultra-small margin more-text">Tours</p>
    </li>

    <li class="no-padding">
      <ul class="collapsible" data-collapsible="tours">
        <li class="bold">
          <a class="collapsible-header waves-effect waves-cyan">
            <i class="material-icons">airplanemode_active</i>
            <span class="nav-text">Tour Manager </span>
          </a>

          <div class="collapsible-body">
            <ul class="collapsible" data-collapsible="tours">
               <li>
                <a href="">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span>New Tour Quotation</span>
                </a>
              </li> 
             
              <li>
                <a href="">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span>Tour Quotations</span>
                </a>
              </li>
              <li>
                <a href="">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span>Tour Bookings</span>
                </a>
              </li>
              <li>
                <a href="">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span>Tour Promotions</span>
                </a>
              </li>

             
              {{--End--}}
              <li>
                <a href="">
                  <i class="material-icons">keyboard_arrow_right</i>
                  <span>Guides</span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </li>

        <!-- <li class="no-padding">
          <ul class="collapsible" data-collapsible="accordion">
            <li class="bold">
              <a class="collapsible-header  waves-effect waves-cyan">
                <i class="material-icons">photo_filter</i>
                <span class="nav-text">Menu Levels</span>
              </a>
              <div class="collapsible-body">
                <ul class="collapsible" data-collapsible="accordion">
                  <li>
                    <a href="ui-basic-buttons.html">
                      <i class="material-icons">keyboard_arrow_right</i>
                      <span>Second level</span>
                    </a>
                  </li>
                  <li class="bold">
                    <a class="collapsible-header  waves-effect waves-cyan">
                      <i class="material-icons">keyboard_arrow_right</i>
                      <span class="nav-text">Second level child</span>
                    </a>
                    <div class="collapsible-body">
                      <ul class="collapsible" data-collapsible="accordion">
                        <li>
                          <a href="ui-basic-buttons.html">
                            <i class="material-icons">keyboard_arrow_right</i>
                            <span>Third level</span>
                          </a>
                        </li>
                        <li class="bold">
                          <a class="collapsible-header  waves-effect waves-cyan">
                            <i class="material-icons">keyboard_arrow_right</i>
                            <span class="nav-text">Third level child</span>
                          </a>
                          <div class="collapsible-body">
                            <ul class="collapsible" data-collapsible="accordion">
                              <li>
                                <a href="ui-basic-buttons.html">
                                  <i class="material-icons">keyboard_arrow_right</i>
                                  <span>Forth level</span>
                                </a>
                              </li>
                              <li>
                                <a href="ui-extended-buttons.html">
                                  <i class="material-icons">keyboard_arrow_right</i>
                                  <span>Forth level</span>
                                </a>
                              </li>
                            </ul>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </li>
        <li>
          <a href="../../../documentation" target="_blank">
            <i class="material-icons">import_contacts</i>
            <span class="nav-text">Documentation</span>
          </a>
        </li>
        <li>
          <a href="https://pixinvent.ticksy.com" target="_blank">
            <i class="material-icons">help_outline</i>
            <span class="nav-text">Support</span>
          </a>
        </li> -->
      </ul>
      <a href="#" data-activates="slide-out"
      class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only gradient-45deg-light-blue-cyan gradient-shadow">
      <i class="material-icons">menu</i>
    </a>
  </aside>
<!-- END LEFT SIDEBAR NAV-->