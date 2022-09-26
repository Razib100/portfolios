@extends('backend.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a>Add Bank</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin')}}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Bank</li>
                        <li class="breadcrumb-item active">Edit Bank</li>
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
                        <form action="{{ route('bank.update', $bank->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row clearfix">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="">Bank Name:<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Bank Name" name="name" value="{{ $bank->name }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="">Account No:</label>
                                            <input type="text" class="form-control" placeholder="Account No" name="acc_no" value="{{ $bank->acc_no }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="">Branch Name:<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" placeholder="Branch Name" name="branch_name" value="{{ $bank->branch_name }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="">Card No::</label>
                                            <input type="text" class="form-control" placeholder="Card No:" name="card_no" value="{{ $bank->card_no }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="">Card User Name:</label>
                                            <input type="text" class="form-control" placeholder="Card User Name" name="card_user_name" value="{{ $bank->card_user_name }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label for="">Card Pass:</label>
                                            <input type="text" class="form-control" placeholder="Card Pass" name="card_pass" value="{{ $bank->card_pass }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <label for="">Uses:</label>
                                        <select name="friend_status" class="form-control show-tick">
                                            <option value="">-- Uses --</option>
                                            <option value="salary" {{ $bank->uses == 'salary' ? 'selected' : ''}}>Salary</option>
                                            <option value="savings" {{ $bank->uses == 'savings' ? 'selected' : ''}}>Savings</option>
                                            <option value="credit card" {{ $bank->uses == 'credit card' ? 'selected' : ''}}>Credit Card</option>
                                            <option value="other" {{ $bank->uses == 'other' ? 'selected' : ''}}>Other</option>
                                        </select>
                                    </div>
                                <div class="col-lg-6 col-md-6 col-sm-12" id="userEdit">
                                    <div class="form-group mt-3">
                                        <label for="">Photo</label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                                <i class="fa fa-picture-o"></i> Choose
                                                </a>
                                            </span>
                                            <input id="thumbnail" class="form-control" type="text" name="photo" value="{{ $bank->photo }}">
                                        </div>
                                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
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
        $('#lfm').filemanager('image');
    </script>
@endsection
