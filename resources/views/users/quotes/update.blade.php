<section class="content-header">
    <h1>
        Quotes
        <small>Master</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i>Home</a>
        <li class="active"><i class="fa fa-database"></i>Master</a>
        <li><a href="{{url('/quotes')}}"><i class="fa fa-quote-left"></i>Quotes</a>
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
        <button type="button" class="btn btn-info btn-xs pull-right" data-toggle="modal" data-target="#myModal">Delete</button>
        </div>
        <div class="box-body">
          {{ Form::open(array('url' => 'quotes/update/'.$quotes->idquotes, 'class' => 'form-horizontal')) }}
          <div class="form-group">
            <label class="col-sm-2 control-label">Tittle</label>
            <div class="col-sm-8">
            <input type="text" class="form-control" value="{{$quotes->tittle}}" name="tittle" required>
            </div>
          </div>
  
          <div class="form-group">
            <label class="col-sm-2 control-label">Tags</label>
            <div class="col-sm-5">
              <select name="tag[]" class="form-control select2" multiple="multiple">
                @foreach ($tags as $tags)
                  <option value="{{$tags->idtags}}"@if(in_array($tags->idtags,$data_tags)) 
                      selected
                  @endif>{{$tags->tag_name}}</option>
                @endforeach
                     </select>
            </div>
          </div>
            
          <div class="form-group">
              <label class="col-sm-2 control-label">Subject</label>
              <div class="col-sm-8">
                <textarea name="subject" rows="5" class="form-control" value="{{$quotes->subject}}"></textarea>
              </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Upload</label>
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
              <a href="{{url('quotes/update/{quotes}')}}" class="btn btn-warning pull-right">Back</a>
              <input type="submit" value="Save" class="btn btn-primary">
            </div>
          </div>
          {{ Form::close() }}
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    

    </section>

    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Delete Quotes</h4>
          </div>
          <div class="modal-body">
            <p>Yakin Ingin Menghapus Quotes??</p>
          </div>
          <div class="modal-footer">
              {{Form::open(array('url' => 'quotes/delete/'.$quotes->idquotes,'method'=>'delete','class' => 'form-horizontal'))}}
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <input type="submit" class="btn btn-danger" value="Yes">
            {{Form::close()}}
          </div>
        </div>
        
      </div>
    </div>