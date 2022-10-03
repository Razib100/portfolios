@extends('backend.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Add Testimonial</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Testimonial</li>
                        <li class="breadcrumb-item active">Add Testimonial</li>
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
                        <form action="{{ route('testimonial.store') }}" method="post">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group mt-3">
                                        <label for="">Summary:</label>
                                        <textarea id="summary" class="form-control no-resize" placeholder="Summary" name="summary">{{ old('summary')}}</textarea>
                                        <span id="rchars">15</span> Character(s) Remaining
{{--                                        <h5 id="limite_vermelho" style="text-align:right;color:red"></h5>--}}
{{--                                        <h5 id="limite_normal" style="text-align:right"></h5>--}}
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group mt-3">
                                        <label for="">Feedback:</label>
                                        <textarea id="feedback" class="form-control no-resize" placeholder="Write your feedback here....." name="feedback">{{ old('feedback')}}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="">Name:<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{ old('name')}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="">Designation:</label>
                                        <input type="text" class="form-control" placeholder="Designation" name="designation" value="{{ old('designation')}}">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group tagsInputs">
                                        <label for="">Organization Name:</label>
                                        <input type="text" class="form-control" placeholder="Organization Name" name="organization" value="{{ old('organization')}}">
                                    </div>

                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group mt-3">
                                        <label for="">Photo:</label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> Choose
                                                </a>
                                            </span>
                                            <input id="thumbnail" class="form-control" type="text" name="photo">
                                        </div>
                                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="">Status:</label>
                                    <select name="status" class="form-control show-tick">
                                        <option value="">-- Status --</option>
                                        <option value="active" {{ old('status' == 'active' ? 'selected' : '')}}>Active</option>
                                        <option value="inactive" {{ old('status' == 'inactive' ? 'selected' : '')}}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
        $('#lfm').filemanager('image');
    </script>
    <script>
        // $('#summary').on('summernote.keyup', function(e) {
        //     var text = $(this).next('.note-editor').find('.note-editable').text();
        //     var length = text.length;
        //     var num = 220 - length;
        //
        //     if (length > 220) {
        //         $('#limite_normal').hide();
        //         $('#limite_vermelho').text(220 - length).show();
        //     }
        //     else{
        //         $('#limite_vermelho').hide();
        //         $('#limite_normal').text(220 - length).show();
        //     }
        //
        // });

        var maxLength = 15;
        $('#summary').on('summernote.keyup', function(e) {
            var textlen = maxLength - $(this).val().length;
            $('#rchars').text(textlen);
        });
    </script>
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
        $('#feedback').summernote({
            placeholder: 'Feedback',
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
