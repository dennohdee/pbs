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
            <button class="btn btn-primary pull-left" data-toggle="modal" data-target="#modal-default">Add Performance</button>
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
      
         <table class="table table-bordered table-striped">
                
                <tr>
                 <th>Staff No.</th>
                 <th>Sur Name</th>
                 <th>Other Name</th>
                 <th>Email</th>
                 <th>Position</th>
                 <th>Phone No.</th>
                 <th>Department</th>
                 
                </tr>
                                
                <tr>
                 <td>{{ $staffs->staffNo }}</td>
                 <td>{{ $staffs->name }}</td>
                 <td>{{ $staffs->otherNames }}</td>
                 <td>{{ $staffs->email }}</td>
                 <td>{{ $staffs->position }}</td>
                 <td>{{ $staffs->phone }}</td>
                 <td>{{ $staffs->department->deptName }}</td>
                 
                </tr>
               
                </table>
               
              <!--/tbl-->
              <h2>Performance Track</h2>
              <h3>Points: @foreach($performs as $perform) {{ $perform->points }} @endforeach</h3>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>S/No.</th>
                 <th>Points</th>
                 <th>Category</th>
                 <th>Added By</th>
                 <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($traces as $traces)
                <tr>
                 <td> {{ ++$i }}</td>
                 <td>{{ $traces->points }}</td>
                 <td>{{ $traces->category->name }}</td>
                 <td>{{ $traces->admin->name }}</td>
                 <td>
                 <form action="{{ route('staff.destroy', $traces->id)}}" method="post">
              
                    <a class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-default-{{ $traces->id }}"><i class="fa fa-edit">Edit</i></a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete traces?')" type="submit"><i class="fa fa-trash">Delete</i></button>
                    </form>
                 </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                <th>S/No.</th>
                 <th>Points</th>
                 <th>Category</th>
                 <th>Added By</th>
                 <th>Actions</th>
                </tr>
                </tfoot>
                </table>
        </div>
      </div>
 
  
      <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Performance</h4>
              </div>
              <div class="modal-body">
                <form action="{{ route('staff.store')}}" name="form2" method="post">
                @csrf
        
                <div class="form-group">
                <input type="hidden" value="{{ $staffs->id }}" name="user_id">
                 @foreach($performs as $perform)
                   <input type="hidden" value="{{ $perform->points }}" name="total">
                 @endforeach
                <strong>Category</strong>
                <select name="category" class="form-control select2" style="width: 100%;" style="border-radius:0px;" required>
                      <option selected="selected" value="">-Select Category-</option> 
                            @foreach($cats as $cat)
                              <option value="{{ $cat->id}}">{{ $cat->name}} </option>    
                              @endforeach 
                </select>
                <strong>Status</strong>
                <select name="status" class="form-control select2" style="width: 100%;" style="border-radius:0px;" required>
                <option selected="selected" value="">-Select Status-</option>    
                       <option value="add">Add</option>    
                       <option value="deduct">Deduct </option>
                </select>
                <strong>Points </strong>
                <select name="points" class="form-control select2" style="width: 100%;" style="border-radius:0px;" required>
                      <option selected="selected" value="">-Select Points-</option>    
                       
                       <option value="10">10 </option>    
                       <option value="20">20 </option>     
                        
                </select>
              </div>
            <div class="pull-left">
            <p>&nbsp; </p>
                <a class="btn btn-sm btn-danger" data-dismiss="modal">Close</a>
            </div>
            <div class="pull-right">
            <p>&nbsp; </p>
                <button type="submit" name="form2" class="btn btn-sm btn-primary">Save</button>
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