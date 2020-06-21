@extends('template')


@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/af-2.3.5/cr-1.5.2/r-2.2.5/rr-1.2.7/sp-1.1.1/sl-1.3.1/datatables.min.css"/>
    <style>
        .custombutton{
            width: 100%;
        }
    </style>
@endpush

@section('title')
    Post
@endsection

@section('content')
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-menu icon-gradient bg-mean-fruit">
                        </i>
                    </div>
                    <div>Post
                        <div class="page-title-subheading">Post List.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success !!!</h4>
                {{(Session::get('success'))}}
            </div>
        @endif
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <a href="/post/create" class="mb-2 mr-2 btn-transition btn btn-outline-primary custombutton">Add New Post</a>
                                <hr>
                                <table class="mb-0 table table-bordered" id="post_table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Category</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($post as $number => $value)
                                            <tr>
                                                <th scope="row" class="text-center">{{$number + 1}}</th>
                                                <td class="text-center">{{$value->title}}</td>
                                                <td class="text-center">{{$value->name}}</td>
                                                <td class="text-center">
                                                    <a href="/post/{{$value->id}}"><button class="mb-2 mr-2 btn-transition btn btn-outline-alternate">Show</button></a>
                                                    <a href="/post/{{$value->id}}/edit"><button class="mb-2 mr-2 btn-transition btn btn-outline-warning">EDIT</button></a>
                                                    <button class="mb-2 mr-2 btn-transition btn btn-outline-danger" data-toggle="modal" data-target="#post{{$value->id}}">Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    @foreach($post as $number => $value)
        <!-- Small modal -->
        <div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="post_{{$value->id}}">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete {{$value->name}} Post ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <form action="/post/{{$value->id}}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-primary">YES</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.21/af-2.3.5/cr-1.5.2/r-2.2.5/rr-1.2.7/sp-1.1.1/sl-1.3.1/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#post_table').DataTable({
                "language" : {
                    "search" : "anything :",
                }
            });
        } );
    </script>
@endpush
