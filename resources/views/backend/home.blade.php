@extends('backend.dashboard')

@section('main')
<main role="main" class="main-content">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="page-title">CV Sections</h2>
          <div class="row">
            <div class="col-md-4 mb-4">
              <div class="card shadow">
                <div class="card-body text-center">
                  <p class="card-title"><strong>Information</strong></p>
                  <p class="card-text">Fill Your Information Details about yourself  e.g., Name , Phone , Address</p>
                  @if (Auth::user()->info()->exists())
                  <a class="btn btn-primary col-md-6" href="{{route('edit.info')}}">Go</a>
                  @else
                  <a class="btn btn-primary col-md-6" href="{{route('userCv')}}">Go</a>
                  @endif
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card shadow">
                <div class="card-body text-center">
                  <p class="card-title"><strong>Skills</strong></p>
                  <p class="card-text">Fill Your Skills Details about yourself  e.g., Web Design , Teamwork , Social Media</p>
                  @if (Auth::user()->skills()->exists())
                  <a class="btn btn-primary col-md-6" href="{{route('edit.skill')}}">Go</a>
                  @else
                  <a class="btn btn-primary col-md-6" href="{{route('user.skill')}}">Go</a>
                  @endif
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card shadow">
                <div class="card-body text-center">
                  <p class="card-title"><strong>Education</strong></p>
                  <p class="card-text">Fill Your Education Details about yourself  e.g., College , School , Degree</p>
                  @if (Auth::user()->education()->exists())
                  <a class="btn btn-primary col-md-6" href="{{route('edit.edu')}}">Go</a>
                  @else
                  <a class="btn btn-primary col-md-6" href="{{route('user.edu')}}">Go</a>
                  @endif
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card shadow">
                <div class="card-body text-center">
                  <p class="card-title"><strong>Projects</strong></p>
                  <p class="card-text">Fill Your Projects you have e.g., Self-study , Gradutaion Project</p>
                  @if (Auth::user()->projects()->exists())
                  <a class="btn btn-primary col-md-6" href="{{route('edit.project')}}">Go</a>
                  @else
                  <a class="btn btn-primary col-md-6" href="{{route('user.projects')}}">Go</a>
                  @endif
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card shadow">
                <div class="card-body text-center">
                  <p class="card-title"><strong>Experience</strong></p>
                  <p class="card-text">Fill Your experiences you have e.g., Work , internship </p>
                  @if (Auth::user()->experience()->exists())
                  <a class="btn btn-primary col-md-6" href="{{route('edit.experience')}}">Go</a>
                  @else
                  <a class="btn btn-primary col-md-6" href="{{route('user.experience')}}">Go</a>
                  @endif
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card shadow">
                <div class="card-body text-center">
                  <p class="card-title"><strong>Certificate</strong></p>
                  <p class="card-text">Fill Your certificates you done e.g., Work , internship </p>
                  @if (Auth::user()->certificate()->exists())
                  <a class="btn btn-primary col-md-6" href="">Go</a>
                  @else
                  <a class="btn btn-primary col-md-6" href="{{route('user.certificate')}}">Go</a>
                  @endif
                </div>
              </div>
            </div>
          </div>
  </main>
@endsection