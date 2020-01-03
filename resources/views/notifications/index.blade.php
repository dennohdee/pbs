@extends('layouts.user')
@section('content')
 
<section class="content-header">
      <h1>
        Notifications
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('notifications.index')}}"><i class="fa fa-newspaper-o"></i> Notification</a></li>
      </ol>
    </section>

    <!--- Main content -->
    <section class="content">
 <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"></h3>

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
                 <th>Notification</th>
                 <th>Posted By.</th>
                 <th>Time Posted</th>
                </tr>
                </thead>
                <tbody>
                @foreach($notifications as $notification)
                <tr>
                 <td>{{ ++$i }}</td>
                 <td>{{ $notification->message }}</td>
                 <td>{{ $notification->admin->name }}</td>
                 <td>{{ $notification->created_at }}</td>
                
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                 <th>S/No.</th>
                 <th>Notification</th>
                 <th>Posted By.</th>
                 <th>Time Posted</th>
                </tr>
                </tfoot>
                </table>
               
              <!--/tbl-->
      </div>

    </section>

@endsection