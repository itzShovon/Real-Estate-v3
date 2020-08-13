@extends('layouts.template')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> --}}

{{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script> --}}


@section('content')

<!-- One -->
    <section id="One" class="wrapper style3">
        <div class="inner">
            <header class="align-center">
                {{-- <p>Eleifend vitae urna</p> --}}
                <h2>Search</h2>
            </header>
        </div>
    </section>

<!-- Two -->
    <section id="two" class="wrapper style2">
        <div class="inner">
            <div class="box">
                <div class="content">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Cover</th>
                                <th>Title</th>
                                <th>Option</th>
                                <th>Category</th>
                                <th>District</th>
                                <th>Price / Rent</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $row)
                                <tr>
                                    <td style="width:20%"><a href="{{url('/show' . '/' . $row->id)}}"><img style="width: 100%" src="storage/{{$row->image}}" alt="Cover"></a></td>
                                    <td><a href="{{url('/show' . '/' . $row->id)}}">{{$row->title}}</a></td>
                                    <td>{{$row->option}}</td>
                                    <td>{{$row->category}}</td>
                                    <td>{{$row->district}}</td>
                                    <td>{{$row->price}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Cover</th>
                                <th>Title</th>
                                <th>Option</th>
                                <th>Category</th>
                                <th>District</th>
                                <th>Price / Rent</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </section>
    @endsection

@section('script')
{{-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script> --}}
{{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> --}}
<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable( );
    } );
</script>
@endsection
