@extends('layouts.user')
@section('content')
 
<section class="content-header">
      <h1>
        Performances
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{ route('performances.index')}}"><i class="fa fa-fw fa-font"></i> Performances</a></li>
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
      <h3>Totals Points:  <i>@foreach($performances as $perfomance) {{ $perfomance->points }} @endforeach</i></h3>
        <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                 <th>S/No.</th>
                 <th>Performances.</th>
                 <th>Category</th>
                 <th>Description</th>
                 <th>Done By</th>
                 <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($traces as $trace)
                <tr>
                 <td>{{ ++$i }}</td>
                 <td>{{ $trace->points }}</td>
                 <td>{{ $trace->category->name }}</td>
                 <td>{{ $trace->description }}</td>
                 <td>{{ $trace->admin->name }}</td>
                 <td>{{ $trace->points }}</td>
                 <td>
                    <a class="btn btn-sm btn-success" href="">View</a>
                 </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                 <th>S/No.</th>
                 <th>Performances.</th>
                 <th>Category</th>
                 <th>Description</th>
                 <th>Done By</th>
                 <th>Actions</th>
                </tr>
                </tfoot>
                </table>
               
              <!--/tbl-->
        </div>
      </div>

    </section>

@endsection