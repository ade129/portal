<section class="content-header">
    <h1>
        Tags
        <small>Master</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Home</a>
        <li class="active"><i class="fa fa-database"></i>Master</a>
        <li><a href="{{url('/tags')}}"><i class="fa fa-pencil"></i>Quotes</a>
        <li class="active"><i class="fa fa-plus"></i>Create New</a>
    </ol>
  </section>
  
  {{-- main content --}}
  <section>
  
    {{-- default box --}}
    <section class="content">
  
            <!-- Default box -->
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Create New</h3> 
              </div>
              <div class="box-body">
                {{ Form::open(array('url' => 'tags/create-new', 'class' => 'form-horizontal')) }}
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tag Name</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="Tag Name" name="tag_name" required>
                  </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Slug</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Slug" name="slug" required>
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
                    <a href="{{url('tags')}}" class="btn btn-warning pull-right">Back</a>
                    <input type="submit" value="Save" class="btn btn-primary">
                  </div>
                </div>
                {{ Form::close() }}
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          
          </section>
          
  
  
  
  