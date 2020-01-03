@extends('layouts.admin')
@section('content')
 
<section class="content-header">
      <h1>
        Notifications
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admin/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('notification.index')}}"><i class="fa fa-fw fa-font"></i> Notification</a></li>
      </ol>
    </section>

    <!--- Main content -->
    <section class="content">
 <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>
            <button class="btn btn-primary pull-left" data-toggle="modal" data-target="#modal-default">Add Notification</button>
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
                 <th>Name</th>
                 <th>Message</th>
                 <th>Posted By</th>
                 <th>Time</th>
                 <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($notifications as $notification)
                <tr>
                 <td>{{ ++$i }}</td>
                 <td>{{ $notification->user->staffNo }}</td>
                 <td>{{ $notification->user->name }}</td>
                 <td>{{ $notification->message }}</td>
                 <td>{{ $notification->admin->name }}</td>
                 <td>{{ $notification->created_at }}</td>
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
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                 <th>S/No.</th>
                 <th>Staff No.</th>
                 <th>Sur Name</th>
                 <th>Other Name</th>
                 <th>Department</th>
                 <th>Notification.</th>
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
                <h4 class="modal-title">Add Notification</h4>
              </div>
              <div class="modal-body">
                <form action="{{ route('notification.create')}}" method="post">
                @csrf
        <div class="row">
        <div class="col-md-6 form-group">
            <strong>Staff</strong>
            <select name="department" class="form-control select2" style="width: 100%;" style="border-radius:0px;">
                  <option selected="selected" value="">-Select Staff[No. - Name]-</option> 
                 @foreach($staffs as $staff)
                           <option value="{{ $staff->id }}">{{ $staff->staffNo }} - {{ $staff->name }} {{ $staff->otherNames }} </option>    
                  @endforeach  
             </select>
            </div>
            <div class="col-md-6">
            <strong>Subject</strong>
                <input type="text" name="subject" value="{{ old('subject') }}" class="form-control" placeholder="Subject">
            </div>
            </div>
            <div class="pad form-group">
            <strong>Message </strong>
    
				<textarea name="message" id="editor1" class="form-control" required></textarea>
					
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