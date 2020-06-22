@extends('template')


@push('css')
    <style>
        .custombutton{
            width: 100%;
        }
    </style>
@endpush

@section('title')
    New Post
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
                        <div class="page-title-subheading">Make a new Post.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4><i class="icon fa fa-exclamation"></i> ERROR !!!</h4>
                @foreach ($errors->all() as $error)
                    {{ $error }} <br>
                @endforeach
            </div>
        @endif
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <form action="/post" method="post">
                                    @csrf
                                    <div class="position-relative form-group">
                                        <label for="exampleAddress" class="">Title :</label>
                                        <input name="title" id="exampleAddress" placeholder="Please Type a Title...." type="text" class="form-control">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="exampleText" class="">Content :</label>
                                        <textarea name="content" id="exampleText" class="form-control"></textarea>
                                    </div>
                                    <button type="submit" class="mb-2 mr-2 btn-transition btn btn-outline-primary custombutton">Add New Post</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




@push('js')

@endpush
