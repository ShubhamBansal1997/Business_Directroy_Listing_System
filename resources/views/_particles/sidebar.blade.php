<div class="col-md-3 col-sm-4">
        <div class="filter-sidebar">
          <div class="col-md-12 form-title">
            <h2>Refine Your Search</h2>
          </div>
          {!! Form::open(array('url' => 'listings/search/filter','class'=>'','id'=>'search','role'=>'form')) !!}
            <div class="col-md-12 form-group">
              <label class="control-label" for="category">Categories</label>
              <select id="category" name="category" class="form-control">
                <option value="">Select Category</option>
                @foreach(\App\Categories::orderBy('category_name')->get() as $category)
                <option value="{{$category->id}}">{{$category->category_name}}</option>
                @endforeach
                 
              </select>
            </div>
            <div class="col-md-12 form-group rating">
              <label class="control-label">Select Rating </label><br>
                  <div class="radio radio-success radio-inline">
                    <input type="radio" name="rating" id="radio1" value="1" >
                    <label for="radio1" class="radio-inline"> <span class="rating"><i class="fa fa-star"></i></span> </label>
                  </div><br>
                  <div class="radio radio-success radio-inline">
                    <input type="radio" name="rating" id="radio2" value="2">
                    <label for="radio2" class="radio-inline"> <span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i></span> </label>
                  </div><br>
                  <div class="radio radio-success radio-inline">
                    <input type="radio" name="rating" id="radio3" value="3">
                    <label for="radio3" class="radio-inline"> <span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> </label>
                  </div><br>
                  <div class="radio radio-success radio-inline">
                    <input type="radio" name="rating" id="radio4" value="4">
                    <label for="radio4" class="radio-inline"> <span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> </label>
                  </div><br>
                  <div class="radio radio-success radio-inline">
                    <input type="radio" name="rating" id="radio5" value="5">
                    <label for="radio5" class="radio-inline"> <span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> </label>
                  </div>
            </div>
            
            <div class="col-md-12 form-group">
              <button type="submit" class="btn tp-btn-primary tp-btn-lg btn-block">Refine Your Search</button>
              <a href="{{ URL::to('listings') }}" class="btn btn-reset"><i class="fa fa-repeat"></i>Reset</a>
            </div>
          {!! Form::close() !!} 
        </div>
      </div>