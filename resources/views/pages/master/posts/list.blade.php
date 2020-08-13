@extends('layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default" data-scroll-height="500">
                    <div class="card-header justify-content-between align-items-center card-header-border-bottom">
                        <h2>Posts List</h2>
                    </div>

                    <div>
                        @foreach ($list as $post)
                            <div class="card-body slim-scroll">
                                <div class="media py-3 align-items-center justify-content-between">
                                    {{-- <div class="d-flex rounded-circle align-items-center justify-content-center mr-3 media-icon iconbox-45 bg-primary text-white">
                                        <i class="mdi mdi-file-delimited font-size-20"></i>
                                    </div> --}}
                                    <div class="media-body pr-3" data-toggle="tooltip" title="Click to show">
                                        <a href="{{url('/master/posts' . '/' . $post->id)}}" class="mt-0 mb-1 font-size-15 text-dark">{{$post->title}}
                                        <p>Created : {{date('d-M-Y', strtotime($post->created_at))}}</p>
                                        <p>Availability : {{date('d-M-Y', strtotime($post->availability))}}</p>
                                        <p>{{date('d-M-Y', strtotime($post->validity))}} till valid</p></a>

                                    </div>
                                    <img src="{{url('/')}}/storage/{{$post->image}}" class="col-4" alt="Cover" srcset="">
                                    {{-- <span class=" font-size-12 d-inline-block" data-toggle="tooltip" title="Submission ending time.">
                                        <i class="mdi mdi-clock-outline"></i> <img src="../storage/{{$user->avatar}}" class="col-6" alt="Avatar" srcset="">
                                    </span> --}}
                                </div>
                            </div>
                        @endforeach
                        {{ $list->links() }}
                    </div>

                    <div class="mt-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
