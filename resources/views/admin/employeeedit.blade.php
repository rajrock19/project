@extends('admin.layouts.default')
@section('title')
Admin - Employee Edit
@endsection
@section('content')
<div class="content container-fluid">
     <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <h3 class="page-title">Employee</h3>
            </div>
        </div>
    </div>
    <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Employee</h4>
                            </div>
                            <div class="card-body">
                              <form class="form-valide" action="{{route('employee.update',$user->id)}}" method="Post" enctype="multipart/form-data">
                                @csrf
                                    <div class="row">
                                    <div class="col-md-6 col-xl-6 col-xxl-6 mb-3 form-group">
                                                <label id="name"> Name<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="name" name="name"  value="{{$user->name}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6 col-xxl-6 mb-3 form-group">
                                            <label id="email"> Email<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
                                        </div> 
                                    </div>
                                    <div class="col-md-6 col-xl-6 col-xxl-6 mb-3 form-group">
                                        <label id="phone">Phone<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}" >
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-6 col-xxl-6 mb-3 form-group">
                                    <label id="age"> Age<span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="age" name="age"  value="{{$user->age}}">
                                </div>
                            </div>

                                    <div class="col-md-6 col-xl-6 col-xxl-6 mb-3 form-group">
                                        <label id="address">Address<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="address" name="address"  value="{{$user->address}}">
                                    </div>
                                </div>
                              


                                    </div>
                                    <div class="text-end">
                                        <a href="" class="btn btn-danger">Cancel</a>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
</div>
@stop
