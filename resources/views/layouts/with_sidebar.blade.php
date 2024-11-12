@extends('layouts.app')

@section('main_content')
<div class="d-flex">
    <div class="bg-light border-right" id="sidebar-wrapper" style="width: 250px;">
        @include('layouts.partials.sidebar') 
    </div>

    <div class="flex-fill p-3">
        @yield('content') 
    </div>
</div>
@endsection
