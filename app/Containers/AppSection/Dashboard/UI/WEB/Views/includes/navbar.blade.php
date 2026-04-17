
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('dashboard.home')}}" class="nav-link">{{ trans('dashboard.Home') }}</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-globe"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
              <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-item">
                {{ $properties['native'] }}
              </a>
          @endforeach
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <div style=" position: relative;top: -10px;">
            <img src="{{auth('web')->user()->getImage()}}" style="width: 41px;" class="img-circle" alt="User Image">
            {{auth('web')->user()->name}}
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          {{-- <a href="" class="dropdown-item">
            {{ trans('dashboard.Profile') ?? trans('admin.Profile') }}
          </a> --}}
          <form id="logout-form" action="{{ route('dashboard.logout') }}" method="POST" class="hidden">@csrf</form>
          <button type="submit" form="logout-form" class="dropdown-item" style="width: 100%; text-align: left; background: none; border: none; padding: 0.5rem 1rem; cursor: pointer;">
            {{ trans('dashboard.Logout') ?? trans('admin.logout') }}
          </button>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->