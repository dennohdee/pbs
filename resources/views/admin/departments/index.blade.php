@extends('layouts.admin')
@section('content')
 
<section class="content-header">
      <h1>
        Departments
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('departments.index')}}"><i class="fa fa-cubes"></i> Departments</a></li>
      </ol>
    </section>

    <!--- Main content -->
    <section class="content">
 <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
            <button class="btn btn-primary pull-left" data-toggle="modal" data-target="#modal-default">Add departments</button>
          <div class="box-tools">
          
            <button type="button" class="btn btn-box-tool pull-right" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
        @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <p>{{$message}}</p>
                </div>
              @endif
        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                           <strong>Error! </strong>There were some errors with inputs. 
                         <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul> 
                    </div>
                    
                @endif
         <!--tbl -->
      
         <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>S/No.</th>
                 <th>Department Name</th>
                 <th>Room No.</th>
                 <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($depts as $dept)
                <tr>
                 <td>{{ ++$i }}</td>
                 <td>{!! $dept->deptName !!}</td>
                 <td>{!! $dept->roomNo !!}</td>
                 <td>
                 <form action="{{ route('departments.destroy', $dept->id)}}" method="post">
              
                    <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-default-{{ $dept->id }}"><i class="fa fa-edit">Edit</i></a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete department?')" type="submit"><i class="fa fa-trash">Delete</i></button>
                    </form>
                 </td>
                </tr>
                <!--modal edit-->
                <div class="modal fade" id="modal-default-{{ $dept->id }}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Department</h4>
              </div>
              <div class="modal-body">
              
                <form action="{{ route('departments.update', $dept->id )}}" method="post">
                @csrf
                @method('PUT')
        <div class="form-group">
            <strong>Department Name </strong>
                <input type="text" name="deptName" value="{{$dept->deptName}}" class="form-control" placeholder="Department Name" required>
  
            <strong>Room No. </strong>
                <input type="text" name="roomNo" value="{{ $dept->roomNo}}" class="form-control" placeholder="Room No." required>
              
            </div>
            <div class="pull-left">
            <p>&nbsp; </p>
                <a class="btn btn-sm btn-danger" data-dismiss="modal">Close</a>
            </div>
            <div class="pull-right">
            <p>&nbsp; </p>
                <button type="submit" name="form2" class="btn btn-sm btn-primary" onclick="return confirm('Update department?')">Save</button>
            </div>
        
        </form>
              </div>
              <div class="modal-footer">
                 
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
                <!--end-->
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                <th>S/No.</th>
                 <th>Department Name</th>
                 <th>Room No.</th>
                 <th>Actions</th>
                </tr>
                </tfoot>
                </table>
               
              <!--/tbl-->
        </div>
      </div>
 
  
      <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Department</h4>
              </div>
              <div class="modal-body">
              
                <form action="{{ route('departments.store')}}" method="post">
                @csrf
        <div class="form-group">
            <strong>Department Name </strong>
                <input type="text" name="deptName" value="{{ old('deptName') }}" class="form-control" placeholder="Department Name" required>
  
            <strong>Room No. </strong>
                <input type="text" name="roomNo" value="{{ old('roomNo') }}" class="form-control" placeholder="Room No." required>
              
            </div>
            <div class="pull-left">
            <p>&nbsp; </p>
                <a class="btn btn-sm btn-danger" data-dismiss="modal">Close</a>
            </div>
            <div class="pull-right">
            <p>&nbsp; </p>
                <button type="submit" name="form2" class="btn btn-sm btn-primary" onclick="return confirm('Save department?')">Save</button>
            </div>
        
        </form>
              </div>
              <div class="modal-footer">
                 
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

    </section>

@endsection