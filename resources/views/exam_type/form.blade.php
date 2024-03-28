@extends('admin.master')
@if($examType->exists)
    @section('title','Update Student Class')
@else
    @section('title','Add Student Class')
@endif

@section('main_content')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">

            <!-- Basic Forms -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="box-title">Add Class</h4>
                    <a href="{{ route('examType.index') }}" class="btn btn-rounded btn-success mb-3" style="float: right">Student ExamType List</a>
                </div>


                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col">
                            @if($examType->exists)
                            <form action="{{ route('examType.update',$examType->id) }}" method="post" >
                                @method('put')
                                @else
                                    <form action="{{ route('examType.store') }}" method="post" >
                                @endif
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>ExamType Name<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" value="{{ old('name',$examType->name) }}" class="form-control" >
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="text-xs-right">
                                    @if($examType->exists)
                                        <button type="submit" class="form-control btn btn-rounded btn-info">Update</button>
                                    @else
                                        <button type="submit" class="form-control btn btn-rounded btn-info">Add</button>
                                    @endif

                                </div>
                            </form>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
