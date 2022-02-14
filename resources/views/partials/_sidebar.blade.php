<div id="sidebar-wrapper" class="d-print-none bg-primary">
  <div class="simplebar-scroll-content">
    <div class="simplebar-content">
      <div class="brand-logo">
        <a href="#">
          <img src="{{ asset('logo.png')}}" class="logo-icon mt-4" alt="logo icon" width="150px">
        </a>
      </div>
      @if(\Auth::user()->isAdmin())
      <ul class="sidebar-menu mt-4 text-right">
        <li class="sidebar-header text-white">{{ __('lang.menu') }}</li>
        <li> <a class="text-white" href="{{ route('admins.dashboard.index') }}">{{ __('lang.dashboard') }} <i class="fa fa-dashboard"></i></a> </li>
        <li> <a class="text-white" href="{{ route('admins.exercises.index') }}">{{ __('lang.exercises') }} <i class="fa fa-dashboard"></i></a> </li>
        <li> <a class="text-white" href="{{ route('admins.matches.index') }}">{{ __('lang.matches') }} <i class="fa fa-dashboard"></i></a> </li>
        <li> <a class="text-white" href="{{ route('admins.players.index') }}">{{ __('lang.players') }} <i class="fa fa-dashboard"></i></a> </li>
        <li> <a class="text-white" href="{{ route('admins.trainers.index') }}">{{ __('lang.trainers') }} <i class="fa fa-dashboard"></i></a> </li>
        <li> <a class="text-white" href="{{ route('admins.age-brackets.index') }}">{{ __('lang.age_brackets') }} <i class="fa fa-dashboard"></i></a> </li>
        <li> <a class="text-white" href="{{ route('admins.times.index') }}">{{ __('lang.times') }} <i class="fa fa-dashboard"></i></a> </li>
        <li> <a class="text-white" href="{{ route('admins.positions.index') }}">{{ __('lang.positions') }} <i class="fa fa-dashboard"></i></a> </li>

      </ul>
      @endif

    </div>
  </div>
</div>