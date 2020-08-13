@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default" data-scroll-height="500">
                    <div class="card-header justify-content-between align-items-center card-header-border-bottom">
                        <h2>Users List</h2>
                    </div>

                    <div>
                        @foreach ($users as $user)
                            <div class="card-body slim-scroll">
                                <div class="media py-3 align-items-center justify-content-between">
                                    {{-- <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-primary text-white">
                                        <i class="mdi mdi-file-delimited font-size-20"></i>
                                    </div> --}}
                                    <div class="media-body pr-3" data-toggle="tooltip" title="Click to upgrade user">
                                        <a class="mt-0 mb-1 font-size-15 text-dark">{{$user->name}}</a>
                                        <p>{{$user->email}}</p>
                                        <p>{{$user->contact}}</p>
                                        <p>{{$user->address}}</p>
                                        <p>{{($user->status == true) ? 'Can' : 'Cannot'}} Post</p>

                                        @if ($user->display_name == 'Normal User')
                                            <form method="post" action="{{ route('master.users.upgrade', ['id' => $user->id]) }}">
                                                {{method_field('GET')}}
                                                @csrf
                                                <button type="submit" class="button special" onclick="return confirm('Are you sure?')">Upgrade from {{$user->display_name}}</button>
                                            </form>
                                        @else
                                            <p>{{$user->display_name}}</p>
                                        @endif
                                    </div>
                                    <img src="{{url('/')}}/storage/{{$user->avatar}}" class="col-4" alt="Avatar" srcset="">
                                    {{-- <span class=" font-size-12 d-inline-block" data-toggle="tooltip" title="Submission ending time.">
                                        <i class="mdi mdi-clock-outline"></i> <img src="../storage/{{$user->avatar}}" class="col-6" alt="Avatar" srcset="">
                                    </span> --}}
                                </div>
                            </div>
                        @endforeach
                        {{ $users->links() }}
                    </div>

                    <div class="mt-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> --}}
{{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --}}
@endsection
