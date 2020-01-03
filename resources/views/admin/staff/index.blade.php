@extends('layouts.admin')
@section('content')
 
<section class="content-header">
      <h1>
        Staff
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('staff.index')}}"><i class="fa fa-fw fa-font"></i> Staff</a></li>
      </ol>
    </section>

    <!--- Main content -->
    <section class="content">
 <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
            <button class="btn btn-primary pull-left" data-toggle="modal" data-target="#modal-default">Add Staff</button>
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
                 <th>Staff No.</th>
                 <th>Sur Name</th>
                 <th>Other Name</th>
                 <th>Email</th>
                 <th>Position</th>
                 <th>Phone No.</th>
                 <th>Department</th>
                 <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($staffs as $staff)
                <tr>
                 <td> {{ ++$i }}</td>
                 <td>{{ $staff->staffNo }}</td>
                 <td>{{ $staff->name }}</td>
                 <td>{{ $staff->otherNames }}</td>
                 <td>{{ $staff->email }}</td>
                 <td>{{ $staff->position }}</td>
                 <td>{{ $staff->phone }}</td>
                 <td>{{ $staff->department->deptName }}</td>
                 <td>
                 <form action="{{ route('staff.destroy', $staff->id)}}" method="post">
              
                  <a href="{{ route('staff.show', $staff->id)}}" class="btn btn-sm btn-success">View</a>
                    <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-default-{{ $staff->id }}"><i class="fa fa-edit">Edit</i></a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete Staff?')" type="submit"><i class="fa fa-trash">Delete</i></button>
                    </form>
                 </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                <th>S/No.</th>
                 <th>Staff No.</th>
                 <th>Sur Name</th>
                 <th>Other Name</th>
                 <th>Email</th>
                 <th>Position</th>
                 <th>Phone No.</th>
                 <th>Department</th>
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
                <h4 class="modal-title">Add Staff</h4>
              </div>
              <div class="modal-body">
                <form action="{{ route('staff.store')}}" name="form1" method="post">
                @csrf
        <div class="row">
            <div class="col-md-6">
            <strong>Sur Name </strong>
                <input type="text" name="name" required value="{{ old('name') }}" class="form-control" placeholder="Sur Name">
            </div>
            <div class="col-md-6">
            <strong>Position. </strong>
                <input type="text" name="position" value="{{ old('position') }}" class="form-control" placeholder="Position">
            </div>
            <div class="col-md-6">
            <strong>Other Name(s) </strong>
                <input type="text" name="otherNames" required value="{{ old('otherNames') }}" class="form-control" placeholder="Other Name(s)">
            </div>
            <div class="col-md-6">
            <strong>Phone No. </strong>
                <input type="text" name="phone" required value="{{ old('phoneNo') }}" class="form-control" placeholder="Phone No.">
            </div>
            <div class="col-md-6">
            <strong>Email </strong>
                <input type="email" name="email" required value="{{ old('email') }}" class="form-control" placeholder="Email">
            </div>
            <div class="col-md-6 form-group">
            <strong>Staff No. </strong>
                <input type="text" name="staffNo" required value="{{ old('text') }}" class="form-control" placeholder="Staff No.">
            </div>
            <div class="col-md-12">
            <strong>Department</strong>
            <select name="deptId" class="form-control select2" style="width: 100%;" style="border-radius:0px;" required>
                  <option selected="selected" value="">-Select Department-</option> 
                        @foreach($depts as $dept)
                           <option value="{{ $dept->id}}">{{ $dept->deptName}} </option>    
                          @endforeach 
             </select>
            </div>
            
            </div>
            <div class="pull-left">
            <p>&nbsp; </p>
                <a class="btn btn-sm btn-danger" data-dismiss="modal">Close</a>
            </div>
            <div class="pull-right">
            <p>&nbsp; </p>
                <button type="submit" name="form1" class="btn btn-sm btn-primary">Save</button>
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