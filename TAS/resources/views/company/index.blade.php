@extends('layouts.tas_app')
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
                  <h5 class="breadcrumbs-title">Manage Companies</h5>
                  <ol class="breadcrumbs">
                    <li><a href="index.html">Dashboard</a></li>
                    <li><a href="#">Company Manager</a></li>
                    <li class="active">Companies</li>
                  </ol>
                </div>

                <div class="col s2 m6 l6">
                  <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right gradient-45deg-light-blue-cyan gradient-shadow" href="">
                    <i class="material-icons hide-on-med-and-up">settings</i>
                    <span class="hide-on-small-onl">Create</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <!--breadcrumbs end-->
          <!--start container-->
          <div class="container">
            <div class="section">
          
              <!--DataTables example-->
              <div id="table-datatables">
              
                <div class="row">
                  <div class="col s12">
                  <div id="row-grouping" class="section">
                        <div class="row">
                        <div class="col s12">
                        {{--@if(count($companies)) --}}
                        <div style="overflow-x:auto;">
                    <table id="data-table" class="data-table display bordered striped highlight" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Name</th> 
                                <th>Address</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Action</th>
                        </thead>
                        <!-- <tfoot>
                        
                        </tfoot> -->
                        <tbody>

                            {{--@foreach($companies as $element)--}}
                            <tr>

                                {{--<td>{{$element->code}}</td>--}}
                                {{--<td>{{$element->name}}</td>--}}
                                {{--<td>{{$element->address}}</td> --}}
                                {{--<td>{{$element->email}}</td> --}}
                                {{--<td>{{$element->telephone}}</td> --}}
                                <td>
                                    <a href="javascript:;" data-href="" class="btn-floating waves-effect waves-light deep-orange darken-2  js_edit_btn " title="edit">
                                        <i class="material-icons">mode_edit</i>
                                    </a> 
                                </td>
                            </tr>
                            
                             {{--<!--    @foreach($element->branches as $branch)--}}
                                {{--<tr>--}}
                                    {{--<td>{{$branch->country->alpha_2}} {{$branch->code}}</td>--}}
                                {{--<tr>--}}
                                {{--@endforeach -->--}}
                                {{----}}
                            {{--@endforeach--}}
                        </tbody>
                    </table>
                        </div>
                    {{--@else --}}
                    {{--@include('includes.global_msgs', ['type' => 'data_empty'])  --}}
                    {{--@endif--}}
                        </div>
                        </div>
              </div>
            </div>
                  </div>
                </div>
              </div>
              <br>
              <div class="divider"></div>
        
            <!-- Floating Action Button -->
            <div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
              <a href="" class="btn-floating btn-large gradient-45deg-light-blue-cyan gradient-shadow">
                <i class="material-icons">add</i>
              </a>
            </div>
            <!-- Floating Action Button -->
          </div>
          <!--end container-->
        </section>

@endsection

@section('javascript')
@parent
<script type="text/javascript">
$(document).ready(function(){
    $('.data-table').DataTable({ 
    });
    //select dropdown hide issue fixed
    $('select').material_select();
});

   
</script>

@endsection