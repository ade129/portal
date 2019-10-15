<section class="content-header">
    <h1>Tags</h1>
    <ol class="breadcrumb">
      <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><i class="fa fa-tags" aria-hidden="true"></i> Tags</li>
    </ol>
</section>


  <!-- Main content -->
  <section class="content">
  
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Index</h3>
        <div class="box-tools pull-right">
          <a href="{{url('tags/create-new')}}" class="btn btn-box-tool" title="Create New"><i class="fa fa-plus"></i> Create New</a>
        </div>
      </div>
      <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Tag Name</th>
            <th>Slug</th>
            <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tags as $tags)
                <tr>
                <td>{{$tags->idtags}}</td>
                <td>{{$tags->tag_name}}</td>
                <td>{{$tags->slug}}</td>
                <td>
                  <center>
                      @if ($tags->active)
                      <span class="label label-success">Active</span>
                      @else
                      <span class="label label-danger">Inactive</span>
                      @endif
                  </center>
                </td>
                <td>
                  <a href="{{url('/tags/update/'.$tags->idtags)}}"><i class="fa fa-pencil-square-o"></i></a>                
                </td>
                </tr>
            @endforeach
          </tbody>  
          </table>
      </div>    
    </div> 
  </section>