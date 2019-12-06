@extends('layouts.admin')
@section('content')
 
<section class="content-header">
      <h1>
        Performance
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('performance.index')}}"><i class="fa fa-fw fa-font"></i> Performance</a></li>
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
        
         <!--tbl -->
      
         <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>S/No.</th>
                 <th>Staff No.</th>
                 <th>Sur Name</th>
                 <th>Other Name</th>
                 <th>Department</th>
                 <th>Performance.</th>
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
                 <th>Department</th>
                 <th>Performance.</th>
                 <th>Actions</th>
                </tr>
                </tfoot>
                </table>
               
              <!--/tbl-->
        </div>
      </div>
 
  
      <div class="modal fade" id="modal-defaultf1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Performance</h4>
              </div>
              <div class="modal-body">
                <form action="{{ route('performance.create')}}" method="post">
                @csrf
        <div class="row">
        <div class="col-md-6 form-group">
            <strong>Staff</strong>
            <select name="department" class="form-control select2" style="width: 100%;" style="border-radius:0px;">
                  <option selected="selected" value="">-Select Staff-</option> 
                 
                           <option value=""> </option>    
                             
             </select>
            </div>
            <div class="col-md-6">
            <strong>Points</strong>
                <input type="number" name="points" value="{{ old('points') }}" class="form-control" placeholder="Points.(+/-)">
            </div>
            </div>
            <div class="pad form-group">
            <strong>Category </strong>
            <select name="category_id" class="form-control select2" style="width: 100%;" style="border-radius:0px;">
                  <option selected="selected" value="">-Select Category-</option> 
                 
                           <option value=""> </option>    
                             
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