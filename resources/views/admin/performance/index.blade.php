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
                @foreach($performances as $performance)
                <tr>
                 <td>{{ ++$i }}</td>
                 <td>{{ $performance->user->staffNo }}</td>
                 <td>{{ $performance->user->name }}</td>
                 <td>{{ $performance->user->otherNames }}</td>
                 <td>{{ $performance->user->department->deptName }}</td>
                 <td>{{ $performance->points }}</td>
                 <td>
                 
                    <a class="btn btn-sm btn-success" href="">View</a>
                    
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
                 <th>Performance.</th>
                 <th>Actions</th>
                </tr>
                </tfoot>
                </table>
               
              <!--/tbl-->
        </div>
      </div>
 
  
     
    </section>

@endsection