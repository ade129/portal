<section class="content-header">
    <h1>Quotes</h1>
    <ol class="breadcrumb">
      <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><i class="fa fa-quote-left" aria-hidden="true"></i> Quotes</li>
    </ol>
</section>


  <!-- Main content -->
  <section class="content">
  
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Index</h3>
        <div class="box-tools pull-right">
          <a href="{{url('quotes/create-new')}}" class="btn btn-box-tool" title="Create New"><i class="fa fa-plus"></i> Create New</a>
        </div>
      </div>
      <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Tittle</th>
            <th>Slug</th>
            <th>Subject</th>
            <th>View</th>
            <th>Status</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($quotes as $quotes)
                <tr>
                <td>{{$quotes->idquotes}}</td>
                <td>{{$quotes->tittle}}</td>
                <td>{{$quotes->slug}}</td>
                <td>{{$quotes->subject}}</td>
                <td>{{$quotes->views}}</td>
                <td>
                  <center>
                      @if ($quotes->active)
                      <span class="label label-success">Active</span>
                      @else
                      <span class="label label-danger">Inactive</span>
                      @endif
                  </center>
                </td>
                <td>
                  <a href="{{url('/quotes/update/'.$quotes->idquotes)}}"><i class="fa fa-pencil-square-o"></i></a>
                </td>
                </tr>
            @endforeach
          </tbody>  
          </table>
      </div>    
    </div> 
  </section>