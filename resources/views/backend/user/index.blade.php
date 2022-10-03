@extends('backend.layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Users
                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('user.create') }}"><i class="icon-plus"></i>Create User</a>
                    </h2>
                    <ul class="float-left breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ul>
                    <p class="float-right">Total Users: {{ \App\Models\User::count() }}</p>
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
                        <h2><strong>User</strong> Lists</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Photo</th>
                                    <th>Role</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->full_name}}</td>
                                        <td>{{ $item->email }}</td>
                                        <td><img src="{{$item->photo}}" alt="Banner-image" style="max-height: 90px; max-width: 120px;"></td>
                                        <td>
                                            @if($item->role == 'admin')
                                                <span class="badge badge-success">{{$item->role}}</span>
                                            @elseif($item->role == 'vendor')
                                                <span class="badge badge-primary">{{$item->role}}</span>
                                            @else
                                                <span class="badge badge-warning">{{$item->role}}</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->phone }}
                                        <td>
                                            <input type="checkbox" name="toogle" value="{{ $item->id }}" {{$item->status=='active' ? 'checked' : ''}} data-toggle="toggle" data-on="Active" data-off="Inactive" data-size="sm" data-onstyle="success" data-offstyle="danger">
                                        </td>
                                        <td>
                                            <a href="{{ route('user.edit' , $item->id ) }}" data-toggle="tooltip" title="Edit" class="float-left btn btn-sm btn-outline-warning" data-placement="bottom"><i class="fas fa-edit"></i></a>
                                            <form class="float-left ml-2" action="{{ route('user.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="#" data-toggle="tooltip" title="Delete" data-id="{{ $item->id }}" class="dtlbtn btn btn-sm btn-outline-danger" data-placement="bottom"><i class="fas fa-trash-alt"></i></a>
                                            </form>
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
    <script>
        $('input[name=toogle]').change(function (){
            var mode =  $(this).prop('checked');
            var id = $(this).val();
            $.ajax({
              url:"{{ route('user.status') }}",
              type:"POST",
              data:{
                  _token: '{{csrf_token()}}',
                    mode:mode,
                      id:id,
              },
                success:function (response){
                  if(response.status){
                      alert(response.msg);
                  }
                  else{
                      alert('Please try again!');
                  }
                }
            })
        })
    </script>
@endsection
