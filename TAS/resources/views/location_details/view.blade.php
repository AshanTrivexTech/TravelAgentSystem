@extends('layouts.app')
  
@section('content')
     
<section id="content">
          <!--breadcrumbs start-->
          <div id="breadcrumbs-wrapper">
            <!-- Search for small screen -->
            <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
              <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
            </div>
            <div class="container">
              <div class="row">
                <div class="col s10 m6 l6">
                 <h5 class="breadcrumbs-title">Create a Location</h5>
                  <ol class="breadcrumbs">
                    <li><a href="index.html">Dashboard</a></li>
                    <li><a href="#">Destination Manager</a></li>
                    <li class="active">Locations</li>
                  </ol>
                </div>
                <div class="col s2 m6 l6">
                  <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right gradient-45deg-light-blue-cyan gradient-shadow" href="{{route('location-all-view')}}">
                    <i class="material-icons hide-on-med-and-up">settings</i>
                    <span class="hide-on-small-onl">Back</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!--breadcrumbs end-->
          <!--start container-->
        <div class="container">
        <div class="section">

        <div id="row-grouping" class="section">
            <div class="row"> 
              <div class="col s12">
                  
                <form class="cleafix" method="POST" action="{{route('location-store')}}">
                  {{csrf_field()}}
                  <div class="row">

                    <div class="input-field col s12 m6"> 
                        <input placeholder="unique code" id="code" name="code" type="text" class="validate" maxlength="16" value="{{ old('code') }}">
                        <label for="code">Code (Should be Unique) *</label>  
                        @if ($errors->has('code'))
                          <div class="error"> {{ $errors->first('code') }}  </div>
                        @endif
                    </div>
                    <div class="input-field col s12 m6"> 
                        <input placeholder="unique name" id="name" name="name" type="text" class="validate" maxlength="191" value="{{ old('name') }}" >
                        <label for="name">Name (Should be Unique) *</label>
                        @if ($errors->has('name'))
                          <div class="error"> {{ $errors->first('name') }}  </div>
                        @endif  
                    </div><!--  -->

                    <div class="input-field col s12 m6"> 
                        <select name="city_id" id="city_id">
                        <option value="" disabled @if(is_null(old('city_id'))) selected @endif >Choose your option</option>
                        @if(count($cities))
                            @foreach($cities as $city)
                              <option value="{{$city->id}}" @if(old('city_id') == $city->id) selected @endif >{{$city->code}} - {{$city->name}}</option>
                            @endforeach 
                        @endif
                      </select>
                      <label for="city_id">City</label>
                      @if ($errors->has('city_id'))
                        <div class="error"> {{ $errors->first('city_id') }}  </div>
                      @endif
                    </div>  
 
                    <div class="input-field col s12 m6"> 
                        <select name="status" id="status"> 
                        <option value="1" selected @if(old('status') == 1) selected @endif >Active</option>
                        <option value="0" @if(old('status') == 0) selected @endif >Inactive</option> 
                      </select>
                      <label for="status">Status</label>
                      @if ($errors->has('status'))
                        <div class="error"> {{ $errors->first('status') }}  </div>
                      @endif
                    </div> 
 
                    <div class="input-field col s12 m12 form-submit-btns-wrap">
                        <button class="btn waves-effect red accent-2 pull-right" type="reset" name="action">Reset</button>
                        <button class="btn waves-effect waves-light pull-right" type="submit" name="action">Submit</button>
                    </div> 
  
                </form>
              </div>
            </div>
        </div>
      </section>
  </div>

@endsection 

@section('javascript')
@parent
<script type="text/javascript">
  
</script>

@endsection

