@extends('admin.layouts.master')
@section('title', __('Label.Dashboard'))
@section('content')

    <!-- Start: Body-Content -->
    <div class="body-content">
      <!-- mobile title -->
      <h1 class="page-title-sm">@yield('title')</h1>

      <div class="row counter-row">
        <div class="col-6 col-sm-4 col-md col-lg-4 col-xl">
          <div class="db-color-card user-card">
            <img src="{{ asset('assets/imgs/user-brown.png') }}" alt="" class="card-icon" />
            <div class="dropdown dropright">
              <a href="#" class="btn head-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ asset('assets/imgs/dot.png') }}" class="dot-icon" />
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="{{ route('user') }}" style="color: #A98471;">{{__('Label.View All')}}</a>
              </div>
            </div>
            <h2 class="counter">
              {{$result['user'] ?: 00}}
              <span>{{__('Label.Users')}}</span>
            </h2>
          </div>
        </div>
       
      
      </div>

      <div class="row counter-row">
       
        <div class="col-6 col-sm-6 col-md col-lg-6 col-xl">
          <div class="db-color-card plan-card">
            <img src="{{ asset('assets/imgs/plan_color.png') }}" alt="" class="card-icon" />
            <div class="dropdown dropright" style="visibility:hidden">
              <a href="#" class="btn head-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ asset('assets/imgs/dot.png') }}" class="dot-icon" />
              </a>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" >
                <a class="dropdown-item" href="{{ route('package') }}" style="color: #201f1e">{{__('Label.View All')}}</a>
              </div>
            </div>
            <h2 class="counter pt-4">
              {{$result['Package'] ?: 00}}
              <span>Subscription Plan</span>
            </h2>
          </div>
        </div>
        <div class="col-6 col-sm-6 col-md col-lg-6 col-xl">
          <div class="db-color-card subscribers-card">
            <img src="{{ asset('assets/imgs/plan_earnings.png') }}" alt="" class="card-icon" />
            <div class="dropdown dropright">
            </div>
            <h2 class="counter ">
              <!-- {{ "$".$result['Transction'] ?: 00}} -->
              {{currency_code()}}{{no_format($result['Transction']) ?: 00}}
              <span> Package Earnings </span>
            </h2>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12 col-xl-12">

          <div class="box-title">
            <h2 class="title">Recently Added Users</h2>
            <a href="{{ route('user') }}" class="btn btn-link">{{__('Label.View All')}}</a>
          </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>
                    {{__('Label.Full Name')}}
                  </th>
                  <th>
                    {{__('Label.Email')}}
                  </th>
                  <th>
                    {{__('Label.Number')}}
                  </th>
                 
                  <th>
                    {{__('Label.Created Date')}}
                  </th>
                </tr>
              </thead>
              <tbody>
                @if(isset($user_data))
                @foreach ($user_data as $value)
                  <tr>
                    <td>
                      <span class="avatar-control">
                        <?php 
                          if($value->image){
                            $app = Get_Image('user') . $value->image; 
                          } else {
                            $app = URL::asset('/assets/imgs/1.png'); 
                          }
                        ?>
                        <img src="{{ $app }}" class="avatar-img">
                        @if($value->name)
                          {{$value->name}}
                        @else
                          -
                        @endif
                      </span>
                    </td>
                    <td>
                      @if($value->email)
                        {{$value->email}}
                      @else($value->email == 'null')
                        -
                      @endif
                    </td>
                    <td>
                      @if($value->mobile)
                        {{$value->mobile}}
                      @else($value->mobile == 'null')
                        -
                      @endif
                    </td>
                   
                    <td>{{ date("d-m-Y", strtotime($value->created_at));}}</td>
                  </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>

         

        </div>   

       
      </div>                    

    </div>
    <!-- End: Body-Content -->
  </div>
  <!-- End: Right Contenct -->
@endsection