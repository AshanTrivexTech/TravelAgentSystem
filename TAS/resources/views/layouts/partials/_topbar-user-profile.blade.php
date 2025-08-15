<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" data-dropdown-toggle="click">
	<a href="#" class="m-nav__link m-dropdown__toggle">
		<span class="m-topbar__userpic">
			<img src="{{ URL::asset('assets/app/media/img/users/user4.jpg') }}" class="m--img-rounded m--marginless m--img-centered" alt=""/>
		</span>
		<span class="m-topbar__username m--hide">
			Nick
		</span>
	</a>
	<div class="m-dropdown__wrapper">
		<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
		<div class="m-dropdown__inner">
			<div class="m-dropdown__header m--align-center" style="background: url({{ URL::asset('assets/app/media/img/misc/user_profile_bg.jpg') }}); background-size: cover;">
				<div class="m-card-user m-card-user--skin-dark">
					<div class="m-card-user__pic">
						<img src="{{ URL::asset('assets/app/media/img/users/user4.jpg') }}" class="m--img-rounded m--marginless" alt=""/>
					</div>
					<div class="m-card-user__details">
						<span class="m-card-user__name m--font-weight-500">
						{{ Auth::user()->name }}
						</span>
						<a href="" class="m-card-user__email m--font-weight-300 m-link">
						{{ Auth::user()->email }}
						</a>
					</div>
				</div>
			</div>
			<div class="m-dropdown__body">
				<div class="m-dropdown__content">
					<ul class="m-nav m-nav--skin-light">
						<li class="m-nav__separator m-nav__separator--fit"></li>
						<li class="m-nav__item">
							<button class="btn m-btn--pill   btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
                  Logout</button>
							{{--Logout Action--}}
                {{--<form id="logout-form" action="#" method="POST" style="display: none;">--}}
                  {{--{{ csrf_field() }}--}}
                {{--</form>--}}
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</li>
					</ul>
				</div>
			</div>
		</div>
		
	</div>
	
</li>
