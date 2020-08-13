@extends('layouts.template')
@section('content')

<!-- One -->
<section id="One" class="wrapper style3">
    <div class="inner">
        <header class="align-center">
            <p>show recent posts</p>
            {{-- <h2>Generic Page Template</h2> --}}
        </header>
    </div>
</section>

<!-- Two -->
<section id="two" class="wrapper style2">
    <div class="inner">
        <div class="box">
            @foreach ($posts as $row)
                <a href="{{url('/posts' . '/' . $row->id)}}">
                    <div class="content">
                        <header class="align-center">
                            <p>{{ date('d-M-Y', strtotime($row->availability)) }}</p>
                            @if ($row->status == 'PENDING')
                                <p>{{$row->status}}</p>
                            @endif
                            <h2>{{ $row->title }}</h2>
                        </header>
                        <img class="col-4" src="storage/{{$row->image}}" alt="Cover Image">
                        <p class="col-6 float-right">{{ $row->body }}</p>

                        <form method="post" action="{{ route('posts.destroy', $row->id) }}" class="col-2 float-md-left">
                            {{method_field('DELETE')}}
                            @csrf
                            <button type="submit" class="button special" onclick="return confirm('Are you sure?')">Remove</button>
                        </form>
                    </div>
                </a>
            @endforeach
        </div>
        {{ $posts->links() }}
    </div>
</section>
@endsection

@section('script')
@endsection
