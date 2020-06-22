@extends('template')


@push('css')
    <style>
        .custombutton{
            width: 100%;
        }
    </style>
@endpush

@section('title')
    Edit Post
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
                        <div class="page-title-subheading">Edit Post.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success !!!</h4>
            </div>
        @endif
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <form action="/post/{{$post->id}}" method="post">
                                    @method('patch')
                                    @csrf
                                    <div class="position-relative form-group">
                                        <label for="exampleAddress" class="">Title :</label>
                                        <input name="title" id="exampleAddress" placeholder="Please Type a Title...." type="text" class="form-control" value="{{$post->title}}">
                                    </div>
                                    <div class="position-relative form-group">
                                        <label for="exampleText" class="">Content :</label>
                                        <textarea name="content" id="exampleText" class="form-control">{{$post->content}}</textarea>
                                    </div>
                                    <button type="submit" class="mb-2 mr-2 btn-transition btn btn-outline-warning custombutton">Edit Post</button>
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
