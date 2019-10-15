<section class="content-header">
    <h1>
        Tags
        <small>Master</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Home</a>
        <li class="active"><i class="fa fa-database"></i>Master</a>
        <li><a href="{{url('/tags')}}"><i class="fa fa-pencil"></i>Tags</a>
        <li class="active"><i class="fa fa-plus"></i>Update</a>
    </ol>
  </section>
  
  {{-- main content --}}
  <section>
  
    {{-- default box --}}
    <section class="content">
    <div class="box">
      <div class="box-header with-border"> 
        <h4 class="box-tittle">Update</h4>
        </div>
        <div class="box-body">
          {{ Form::open(array('url' => 'tags/update/'.$tags->idtags, 'class' => 'form-horizontal')) }}
          <div class="form-group">
            <label class="col-sm-2 control-label">Tittle</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" value="{{$tags->tag_name}}" name="tag_name" required>
            </div>
          </div>
  
          <div class="form-group">
              <label class="col-sm-2 control-label">Slug</label>
              <div class="col-sm-8">
              <input type="text" class="form-control" value="{{$tags->slug}}" name="slug" required>
              </div>
          </div>
  
          <div class="form-group">
              <label class="col-sm-2 control-label">Status</label>
          <div class="col-sm-10">
            <div class="checkbox">
              <label>
              <input type="checkbox" name="active" checked> Active
              </label>
            </div>
          </div>
          <br><br>                
          
          <hr>
          <div class="form-group">
            <label class="col-sm-2 control-label"></label>
            <div class="col-sm-8">
              <a href="{{url('tags/update/{tags}')}}" class="btn btn-warning pull-right">Back</a>
              <input type="submit" value="Save" class="btn btn-primary">
            </div>
          </div>
          {{ Form::close() }}
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    
    </section>