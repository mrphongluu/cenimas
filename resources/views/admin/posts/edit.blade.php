@extends('layouts.master')
@section('pageTitle', 'Edit Post')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Edit
            <small>Post</small>

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Edit Post</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">
            @if(!empty($errors->all()))
                <div class="callout callout-warning">

                    <h4>Warning!</h4>
                    @foreach ($errors->all() as $message)
                        <p> {{$message}}</p>
                    @endforeach
                </div>
        @endif
            <!-- /.col -->
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li><a href="#settings" data-toggle="tab">Form</a></li>
                    </ul>
                    <div class="tab-content">

                        <!-- /.tab-pane -->

                        <div class="active tab-pane" id="settings">
                            <form class="form-horizontal" id="create" action="{{route('admin.posts.update',$getEdit->id)}}"  method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" value="{{$getEdit->id}}" name="id" id="id">
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Title</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{$getEdit->title}}" required id="title" name="title" placeholder="Title...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Description:</label>

                                    <div class="col-sm-10">
                                        <textarea required placeholder="Description..." class="form-control" name="description" >{{$getEdit->description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Content:</label>

                                    <div class="col-sm-10">
                                        <textarea required placeholder="Content..." name="contents" rows="10" id="editor1" class="ckeditor form-control"  >{{$getEdit->content}}</textarea>
                                        <script type="text/javascript" >
                                            CKEDITOR.replace( 'editor1', {
                                                filebrowserBrowseUrl: '{{asset('ckfinder/ckfinder.html')}}',
                                                filebrowserImageBrowseUrl: '{{asset('ckfinder/ckfinder.html?type=Images')}}',
                                                filebrowserFlashBrowseUrl: '{{asset('ckfinder/ckfinder.html?type=Flash')}}',
                                                filebrowserUploadUrl: '{{asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files')}}',
                                                filebrowserImageUploadUrl: '{{asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images')}}',
                                                filebrowserFlashUploadUrl: '{{asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash')}}'
                                            } );
                                        </script>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Old avatar</label>

                                    <div class="col-sm-10">
                                        <img style="max-width: 600px; max-height: 400px; min-width: 400px; min-height: 300px" src="/storage/avatar/{{$getEdit->avatar}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Avatar</label>

                                    <div class="col-sm-10">
                                        <input type="file" class="form-control"  id="avatar"  name="avatar" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Slug</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{$getEdit->slug}}" required id="slug" name="slug" placeholder="Slug...">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Tags</label>

                                    <div class="col-sm-10">
                                        <input type="text" id="tags" name="tags" class="form-control" value="{{$tagsList}}" data-role="tagsinput"/>
                                        <script>
                                            $("#tags").val();
                                            $("#tags").tagsinput('items');

                                            $('#create').on('keypress',function (e) {
                                                return e.which !== 13;
                                            });

                                        </script>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>

    <!-- /.content -->
</div>


@stop