@extends('backend.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Contacts
                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('contact.create') }}"><i class="icon-plus"></i>Create Contact</a>
                    </h2>
                    <ul class="float-left breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Contact</li>
                    </ul>
                    <p class="float-right">Total Contacts: {{ \App\Models\Contact::count() }}</p>
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
                        <h2><strong>Contact</strong> Lists</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Nick Name</th>
                                    <th>Photo</th>
                                    <th>Phone</th>
                                    <th>Relation</th>
                                    <th>Profession</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contacts as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->full_name}}</td>
                                        <td>{{$item->nick_name}}</td>
                                        <td><img src="{{$item->photo}}" alt="contact-image" style="max-height: 90px; max-width: 120px;"></td>
                                        <td>{{$item->phone}}</td>
                                        <td>{{$item->relation}}</td>
                                        <td>{{$item->profession}}</td>
                                        <td>
                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#contactID{{$item->id}}" title="View" class="float-left btn btn-sm btn-outline-success" data-placement="bottom"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('contact.edit' , $item->id ) }}" data-toggle="tooltip" title="Edit" class="ml-2 float-left btn btn-sm btn-outline-warning" data-placement="bottom"><i class="fas fa-edit"></i></a>
                                            <form class="float-left ml-2" action="{{ route('contact.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="#" data-toggle="tooltip" title="Delet" data-id="{{ $item->id }}" class="dtlbtn btn btn-sm btn-outline-danger" data-placement="bottom"><i class="fas fa-trash-alt"></i></a>
                                            </form>
                                        </td>
                                        <!-- Modal -->
                                        <div class="modal fade" id="contactID{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                @php
                                                    $product = \App\Models\Contact::where('id', $item->id)->first();
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
                                                                <strong>Full Name:</strong>
                                                                <p>{{ $item->full_name }}</p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <strong>Nick Name:</strong>
                                                                <p>{{ $item->nick_name }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <strong>Phone:</strong>
                                                                <p>{{ $item->phone }}</p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <strong>Relation:</strong>
                                                                <p>{{ $item->relation }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <strong>Email:</strong>
                                                                <p>{{ $item->email }}</p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <strong>Education:</strong>
                                                                <p>{{ $item->education }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <strong>Profession:</strong>
                                                                <p>{{ $item->profession }}</p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <strong>Organization:</strong>
                                                                <p>{{ $item->organization }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <strong>Designation:</strong>
                                                                <p>{{ $item->designation }}</p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <strong>Friend Status:</strong>
                                                                <p class="badge badge-danger">{{ $item->friend_status }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <strong>Address:</strong>
                                                                <p>{{ $item->address }}</p>
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
