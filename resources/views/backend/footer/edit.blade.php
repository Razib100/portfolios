@extends('backend.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Add Footer Information</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Footer Information</li>
                        <li class="breadcrumb-item active">Edit Footer Information</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="col-md-12">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>
                                        {{$error}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="card">
                    <div class="body6">
                        <form action="{{ route('footer.update', $info->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row clearfix">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group mt-3">
                                            <label for="">Summary:</label>
                                            <textarea id="summary" class="form-control no-resize" placeholder="Summary" name="summary">{{ $info->summary }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group mt-3">
                                            <label for="">Description:</label>
                                            <textarea id="description" class="form-control no-resize" placeholder="Description" name="description">{{ $info->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="">Address:<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Address" name="address" value="{{ $info->address }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="">Phone:</label>
                                            <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{ $info->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="">Email:</label>
                                            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ $info->email }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="">Social Media Icon:</label>
                                            <input type="text" class="form-control" placeholder="Social Media Icon" name="social_media_image" value="{{ $info->social_media_image }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="">Social Media Link:</label>
                                            <input type="text" class="form-control" placeholder="Social Media Link" name="social_media_link" value="{{ $info->social_media_link }}">
                                        </div>
                                    </div>
                                </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="submit" class="btn btn-outline-secondary">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#summary').summernote({
            placeholder: 'Summary',
            tabsize: 2,
            height: 100,
            callbacks: {
                onPaste: function (e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                    e.preventDefault();
                    // Firefox fix
                    setTimeout(function () {
                        document.execCommand('insertText', false, bufferText);
                    }, 10);
                }
            }
        });
    </script>
    <script>
        $('#description').summernote({
            placeholder: 'Description',
            tabsize: 2,
            height: 100,
            callbacks: {
                onPaste: function (e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                    e.preventDefault();
                    // Firefox fix
                    setTimeout(function () {
                        document.execCommand('insertText', false, bufferText);
                    }, 10);
                }
            }
        });
    </script>
@endsection
