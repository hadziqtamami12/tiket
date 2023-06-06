@extends('base')
@include('layouts.navbar')
@section('sidebar')
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-profile">
      <a href="#" class="nav-link">
        <div class="nav-profile-image">
          <img src="../assets/images/faces/face1.jpg" alt="profile">
          <span class="login-status online"></span>
        </div>
        <div class="nav-profile-text d-flex flex-column">
          <span class="font-weight-bold mb-2">David Grey. H</span>
          <span class="text-secondary text-small">Project Manager</span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
      </a>
    </li>


    @if ( Auth::user()->role == 'admin' )
    <li class="nav-item">
      <a class="nav-link {{ (Request::is('dashboard') ? 'active' : '') }}" href="{{ url('dashboard') }}">
        <span class="menu-title">Dashboards</span>
        <i class="mdi mdi-home menu-icon"></i>
      </a>
    </li>
    @endif


  </ul>
</nav>
@endsection