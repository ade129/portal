<section class="content-header">
    <h1>
        Quotes
        <small>Master</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Home</a>
        <li class="active"><i class="fa fa-database"></i>Master</a>
        <li><a href="{{url('/quotes')}}"><i class="fa fa-quote-left"></i>Quotes</a>
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
                {{ Form::open(array('url' => 'quotes/create-new', 'class' => 'form-horizontal')) }}
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tittle</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="Name" name="tittle" required>
                  </div>
                </div>
            
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tags</label>
                    <div class="col-sm-8">
                      <select name="tag[]" class="form-control select2" multiple="multiple">
                        @foreach ($tags as $tags)
                          <option value="{{$tags->idtags}}">{{$tags->tag_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Subject</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="Subject" name="subject" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">View</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" placeholder="View" name="views" required>
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
                    <a href="{{url('quotes')}}" class="btn btn-warning pull-right">Back</a>
                    <input type="submit" value="Save" class="btn btn-primary">
                  </div>
                </div>
                {{ Form::close() }}
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          
          </section>
          
  
  
  
  