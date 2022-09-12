@extends('backend.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Banks
                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('bank.create') }}"><i class="icon-plus"></i>Create Bank</a>
                    </h2>
                    <ul class="float-left breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Bank</li>
                    </ul>
                    <p class="float-right">Total Banks: {{ \App\Models\Bank::count() }}</p>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-md-12">
                @include('backend.layouts.notification')
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2><strong>Bank</strong> Lists</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Bank Name</th>
                                    <th>Account No</th>
                                    <th>Photo</th>
                                    <th>Card No</th>
                                    <th>Uses</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($banks as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->acc_no}}</td>
                                        <td><img src="{{$item->photo}}" alt="contact-image" style="max-height: 90px; max-width: 120px;"></td>
                                        <td>{{$item->card_no}}</td>
                                        <td>{{$item->uses}}</td>
                                        <td>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#contactID{{$item->id}}" title="View" class="float-left btn btn-sm btn-outline-success" data-placement="bottom"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('bank.edit' , $item->id ) }}" data-toggle="tooltip" title="Edit" class="ml-2 float-left btn btn-sm btn-outline-warning" data-placement="bottom"><i class="fas fa-edit"></i></a>
                                            <form class="float-left ml-2" action="{{ route('bank.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="#" data-toggle="tooltip" title="Delete" data-id="{{ $item->id }}" class="dtlbtn btn btn-sm btn-outline-danger" data-placement="bottom"><i class="fas fa-trash-alt"></i></a>
                                            </form>
                                        </td>
                                        <!-- Modal -->
                                        <div class="modal fade" id="contactID{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                @php
                                                    $product = \App\Models\Bank::where('id', $item->id)->first();
                                                @endphp
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">{{ \Illuminate\Support\Str::upper( $item->title )  }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <strong>Bank Name:</strong>
                                                                <p>{{ $item->name }}</p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <strong>Account No:</strong>
                                                                <p>{{ $item->acc_no }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <strong>Branch Name:</strong>
                                                                <p>{{ $item->branch_name }}</p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <strong>Card No:</strong>
                                                                <p>{{ $item->card_no }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <strong>User Name:</strong>
                                                                <p>{{ $item->card_user_name }}</p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <strong>Password:</strong>
                                                                <p>*****</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <strong>Uses:</strong>
                                                                <p>{{ $item->uses }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
@endsection

@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.dtlbtn').click(function (e){
            var form = $(this).closest('form');
            var dataID = $(this).data('id');
            e.preventDefault();
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
        })
    </script>
@endsection
