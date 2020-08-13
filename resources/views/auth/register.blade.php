@extends('layouts.template')

@section('content')

<section id="One" class="wrapper style3">
    <div class="inner">
        <header class="align-center">
            {{-- <p>Eleifend vitae urna</p> --}}
            <h2>Register</h2>
        </header>
    </div>
</section>


<section id="two" class="wrapper style2">
    <div class="inner">
        <div class="box">
            <div class="content">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row uniform">
                        <div class="6u 12u$(xsmall)">
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="6u$ 12u$(xsmall)">
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
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

                        <div class="6u$ 12u$(xsmall)">
                            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                        </div>


                        <div class="6u$ 12u$(xsmall)">

                            <input id="contact" type="text" name="contact" required autocomplete="contact" placeholder="Contact">
                            {{-- <input id="contact" type="tel" name="contact" value="{{ old('contact') }}" required autocomplete="contact" placeholder="Contact"> --}}

                            @error('contact')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="6u$ 12u$(xsmall)">
                            <div class="select-wrapper">
                                <select id="category" @error('category') is-invalid @enderror name="category" value="{{ old('category') }}" required autocomplete="category">
                                    <option>User Category</option>
                                    <option value="Owner">Owner</option>
                                    <option value="Developer">Developer</option>
                                    <option value="Representator">Representator</option>
                                </select>
                            </div>

                            @error('category')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="6u$ 12u$(xsmall)">
                            <textarea name="address" id="address" value="{{ old('address') }}" required autocomplete="address" placeholder="Enter your address" rows="2"></textarea>
                            {{-- <input id="address" type="text" name="address" value="{{ old('address') }}" required autocomplete="address" placeholder="Address"> --}}

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="6u$ 12u$(xsmall)">
                            <input id="avatar" type="file" accept="image/*" name="avatar" value="{{ old('avatar') }}" required autocomplete="avatar">

                            @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="12u$">
                            <ul class="actions">
                                <li><input type="submit" value="Register" /></li>
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
