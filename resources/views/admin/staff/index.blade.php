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
        
         <!--tbl -->
      
         <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>S/No.</th>
                 <th>Staff No.</th>
                 <th>Sur Name</th>
                 <th>Other Name</th>
                 <th>ID No.</th>
                 <th>Phone No.</th>
                 <th>Department</th>
                 <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                
                <tr>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td></td>
                 <td>
                 <form action="" method="post">
                    <a class="btn btn-sm btn-success" href="">View</a>
                    <a class="btn btn-sm btn-warning" href="">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Delete staff?')" type="submit">Delete</button>
                    </form>
                 </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                 <th>S/No.</th>
                 <th>Staff No.</th>
                 <th>Sur Name</th>
                 <th>Other Name</th>
                 <th>ID No.</th>
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
                <form action="{{ route('staff.create')}}" method="post">
                @csrf
        <div class="row">
            <div class="col-md-6">
            <strong>Sur Name </strong>
                <input type="text" name="surName1" value="{{ old('surName1') }}" class="form-control" placeholder="Sur Name">
            </div>
            <div class="col-md-6">
            <strong>ID No. </strong>
                <input type="number" name="idNo1" value="{{ old('idNo1') }}" class="form-control" placeholder="ID No.">
            </div>
            <div class="col-md-6">
            <strong>Other Name </strong>
                <input type="text" name="otherName1" value="{{ old('otherName1') }}" class="form-control" placeholder="Other Name">
            </div>
            <div class="col-md-6">
            <strong>Phone No. </strong>
                <input type="text" name="phoneNo1" value="{{ old('phoneNo1') }}" class="form-control" placeholder="Phone No.">
            </div>
            <div class="col-md-6">
            <strong>Email </strong>
                <input type="email" name="email1" value="{{ old('email1') }}" class="form-control" placeholder="Email">
            </div>
            <div class="col-md-6 form-group">
            <strong>Department</strong>
            <select name="department" class="form-control select2" style="width: 100%;" style="border-radius:0px;">
                  <option selected="selected" value="">-Select Department-</option> 
                 
                           <option value=""> </option>    
                             
             </select>
            </div>
            
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