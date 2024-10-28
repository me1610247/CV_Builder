<?php
use Illuminate\Support\Facades\Auth;
?>
<nav class="vertnav navbar navbar-light">
    <!-- nav bar -->
    <div class="w-100 mb-4 d-flex">
      <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
        <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
          <g>
            <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
            <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
            <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
          </g>
        </svg>
      </a>
    </div>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item dropdown">
        <a href="{{route('cv')}}" class="dropdown-toggle nav-link">
          <i class="fe fe-file fe-16"></i>
          <span class="ml-3 item-text">Show CV</span>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item dropdown">
        <a href="{{route('home')}}" class="dropdown-toggle nav-link">
          <i class="fe fe-home fe-16"></i>
          <span class="ml-3 item-text">Dashboard</span>
        </a>
      </li>
    </ul>
    @if (Auth::user()->info()->exists())
    <p class="text-muted nav-heading mt-4 mb-1">
        <span>CV Panel</span>
      </p>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item dropdown">
          <a href="#pages" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <i class="fe fe-file fe-16"></i>
            <span class="ml-3 item-text">Complete CV Sections</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100 w-100" id="pages">
            @if (Auth::user()->info()->exists())
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{route('userCv')}}">
                <span class="ml-1 item-text">Information</span>
              </a>
            </li>
            @endif
            @if (Auth::user()->skills()->exists())
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{route('user.skill')}}">
                <span class="ml-1 item-text">Skills</span>
              </a>
            </li>
            @endif
            @if (Auth::user()->education()->exists())
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{route('user.edu')}}">
                <span class="ml-1 item-text">Education</span>
              </a>
            </li>
            @endif
            @if (Auth::user()->projects()->exists())
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{route('user.projects')}}">
                <span class="ml-1 item-text">Projects</span>
              </a>
            </li>
            @endif
            @if (Auth::user()->experience()->exists())
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{route('user.experience')}}">
                <span class="ml-1 item-text">Experience</span>
              </a>
            </li>
            @endif
            @if (Auth::user()->certificate()->exists())
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{route('user.certificate')}}">
                <span class="ml-1 item-text">Certificate </span>
              </a>
            </li>
            @endif
          </ul>
        </li>
      </ul>
     @endif
      <p class="text-muted nav-heading mt-4 mb-1">
        <span>CV</span>
    </p>
    <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item dropdown">
            @if (Auth::user()->info()->exists() || Auth::user()->skills()->exists() || Auth::user()->education()->exists())
            <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-box fe-16"></i>
                <span class="ml-3 item-text">Edit CV</span>
            </a>
            @else
            <a href="{{route('userCv')}}" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-box fe-16"></i>
                <span class="ml-3 item-text">Add CV</span>
            </a>
            @endif
            
            <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
                {{-- Check if user has information data --}}
                @if (Auth::user()->info()->exists()) <!-- Check if the user has skills -->
                <li class="nav-item">
                    <a class="nav-link pl-3" href="{{ route('edit.info') }}">
                        <span class="ml-1 item-text">Information</span>
                    </a>
                </li>
                @endif
                
                {{-- Check if user has skills data --}}
                @if (Auth::user()->skills()->exists()) <!-- Check if the user has skills -->
                <li class="nav-item">
                    <a class="nav-link pl-3" href="{{ route('edit.skill') }}">
                        <span class="ml-1 item-text">Skills</span>
                    </a>
                </li>
                @endif
                
                {{-- Check if user has education data --}}
                @if (Auth::user()->education()->exists()) <!-- Check if the user has education -->
                <li class="nav-item">
                    <a class="nav-link pl-3" href="{{ route('edit.edu') }}">
                        <span class="ml-1 item-text">Education</span>
                    </a>
                </li>
                @endif
                @if (Auth::user()->projects()->exists()) <!-- Check if the user has projects -->
                <li class="nav-item">
                    <a class="nav-link pl-3" href="{{ route('edit.project') }}">
                        <span class="ml-1 item-text">Projects</span>
                    </a>
                </li>
                @endif
                @if (Auth::user()->experience()->exists()) <!-- Check if the user has projects -->
                <li class="nav-item">
                    <a class="nav-link pl-3" href="{{ route('edit.experience') }}">
                        <span class="ml-1 item-text">Experience</span>
                    </a>
                </li>
                @endif
                @if (Auth::user()->certificate()->exists()) <!-- Check if the user has projects -->
                <li class="nav-item">
                    <a class="nav-link pl-3" href="{{ route('edit.certificate') }}">
                        <span class="ml-1 item-text">Certificate</span>
                    </a>
                </li>
                @endif
            </ul>
        </li>
    </ul>

    <!-- New Section for Missing CV Components -->
    <p class="text-muted nav-heading mt-4 mb-1">
      <span>Complete Your CV To Achieved ATS</span>
    </p>
    <ul class="navbar-nav flex-fill w-100 mb-2">
        @if (!Auth::user()->info()->exists())
        <li class="nav-item">
            <a class="nav-link pl-3" href="{{ route('userCv') }}">
                <span class="ml-1 item-text text-danger">⚠️ Missing: Information</span>
            </a>
        </li>
        @endif
        @if (!Auth::user()->skills()->exists())
        <li class="nav-item">
            <a class="nav-link pl-3" href="{{ route('user.skill') }}">
                <span class="ml-1 item-text text-danger">⚠️ Missing: Skills</span>
            </a>
        </li>
        @endif
        @if (!Auth::user()->education()->exists())
        <li class="nav-item">
            <a class="nav-link pl-3" href="{{ route('user.edu') }}">
                <span class="ml-1 item-text text-danger">⚠️ Missing: Education</span>
            </a>
        </li>
        @endif
        @if (!Auth::user()->projects()->exists())
        <li class="nav-item">
            <a class="nav-link pl-3" href="{{ route('user.projects') }}">
                <span class="ml-1 item-text text-danger">⚠️ Missing: Projects</span>
            </a>
        </li>
        @endif
        @if (!Auth::user()->experience()->exists())
        <li class="nav-item">
            <a class="nav-link pl-3" href="{{ route('user.experience') }}">
                <span class="ml-1 item-text text-danger">⚠️ Missing: Experience</span>
            </a>
        </li>
        @endif
    
        @if (!Auth::user()->certificate()->exists())
        <li class="nav-item">
            <a class="nav-link pl-3" href="{{ route('user.certificate') }}">
                <span class="ml-1 item-text text-danger">⚠️ Missing: Certificate </span>
            </a>
        </li>
        @endif
    </ul>

    <p class="text-muted nav-heading mt-4 mb-1">
      <span>Apps</span>
    </p>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item dropdown">
        <a href="#profile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
          <i class="fe fe-user fe-16"></i>
          <span class="ml-3 item-text">Profile</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100" id="profile">
          <a class="nav-link pl-3" href="{{route('profile.edit')}}"><span class="ml-1">Overview</span></a>
          <a class="nav-link pl-3" href="./profile-settings.html"><span class="ml-1">Settings</span></a>
          <a class="nav-link pl-3" href="./profile-security.html"><span class="ml-1">Security</span></a>
          <a class="nav-link pl-3" href="./profile-notification.html"><span class="ml-1">Notifications</span></a>
        </ul>
    </li>
    </ul>
    <div class="btn-box w-100 mt-4 mb-1">
      <a href="https://themeforest.net/item/tinydash-bootstrap-html-admin-dashboard-template/27511269"
        target="_blank" class="btn mb-2 btn-danger btn-lg btn-block">
        <i class="fe fe-log-out fe-12 mx-2"></i><span class="small">Logout</span>
      </a>
    </div>
  </nav>