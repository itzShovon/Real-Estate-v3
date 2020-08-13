@extends('layouts.template')

@section('content')

<section id="One" class="wrapper style3">
    <div class="inner">
        <header class="align-center">
            {{-- <p>Eleifend vitae urna</p> --}}
            <h2>login</h2>
        </header>
    </div>
</section>


<section id="two" class="wrapper style2">
    <div class="inner">
        <div class="box">
            <div class="content">
                <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row uniform">
                        <div class="6u$ 12u$(xsmall)">
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="6u$ 12u$(xsmall)">
                            <input id="password" type="password" name="password" required autocomplete="password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="12u$">
                            <ul class="actions">
                                <li><input type="submit" value="Login" /></li>
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
