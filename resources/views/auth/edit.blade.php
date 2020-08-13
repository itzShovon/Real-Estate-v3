@extends('layouts.template')

@section('content')

<section id="One" class="wrapper style3">
    <div class="inner">
        <header class="align-center">
            <p>{{auth()->user()->email}}</p>
            <h2>{{auth()->user()->name}}</h2>
        </header>
    </div>
</section>


<section id="two" class="wrapper style2">
    <div class="inner">
        <div class="box">
            <div class="content">
                <form method="POST" action="{{ route('users.update', auth()->user()->id) }}" enctype="multipart/form-data">
                    {{ method_field('PUT') }}
                    <div class="row uniform">
                        @csrf

                        <div class="6u$ 12u$(xsmall)">
                            <input id="password" type="password" name="password" autocomplete="password" placeholder="New Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="6u$ 12u$(xsmall)">
                            <input id="password2" type="password" name="password2" autocomplete="password2" placeholder="Confirm Password">
                            @error('password2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="6u$ 12u$(xsmall)">
                            <input id="avatar" type="file" accept="image/*" name="avatar" value="{{ old('avatar') }}" autocomplete="avatar">

                            @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="6u$">
                            <ul class="actions">
                                <li><input type="submit" value="Update" /></li>
                                <li><input type="reset" value="Reset" class="alt" /></li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


@endsection
