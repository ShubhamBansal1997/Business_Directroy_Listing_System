<div class="customer-review">
          <div class="row">
            <div class="col-md-12">
              <h1>Review</h1>
              <div class="review-list">
                @foreach($listing_reviews as $i => $reviews)
                <div class="row">
                  <div class="col-md-2 col-sm-2 hidden-xs">
                    <div class="user-pic"> <img class="img-responsive img-circle" src="{{ URL::asset(\App\User::getUserInfo($reviews->user_id)->image_icon) }}" alt=""> </div>
                  </div>
                  <div class="col-md-10 col-sm-10">
                    <div class="panel panel-default arrow left">
                      <div class="panel-body">
                        <div class="text-left">
                          <h3>{{$reviews->reviews_title}}</h3>
                          <div class="rating"> 
                           
                            @for($x = 0; $x < 5; $x++)
                  
                              @if($x < $reviews->rating)
                                <i class="fa fa-star"></i>
                              @else
                                <i class="fa fa-star-o"></i>
                              @endif
                             
                              @endfor
                             
                           </div>
                        </div>
                        <div class="review-post">
                          <p>{!!$reviews->review!!}</p>
                        </div>
                        <div class="review-user">By <a href="#">{{ \App\User::getUserFullname($reviews->user_id) }}</a>, on <span class="review-date"></span>{{date('d F Y',$reviews->date)}}</div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
                
              </div>
              
              @if(Auth::check() and \App\Reviews::checkUserReview(Auth::id(),$listing->id)=='' and Auth::id()!=$listing->user_id)
                 <div class="review"> <a class="btn tp-btn-primary btn-block tp-btn-lg" role="button" data-toggle="collapse" href="#review" aria-expanded="false" aria-controls="review"> Write A Review </a> </div>
             
              @elseif(\App\Reviews::checkUserReview(Auth::id(),$listing->id)!='')

              <div class="review"><a href="#0" class="btn tp-btn-primary btn-block tp-btn-lg">
            Already reviewed</a></div>
               
              @elseif(Auth::id()!=$listing->user_id)
                 <div class="review"> <a class="btn tp-btn-primary btn-block tp-btn-lg" role="button" href="{{ URL::to('login') }}"> Write A Review </a> </div>
              @endif
             
              <div class="collapse review-list review-form" id="review">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <h1>Write Your Review</h1>
                    {!! Form::open(array('url' => array('submit_review'),'class'=>'','name'=>'review_form','id'=>'review_form','role'=>'form','enctype' => 'multipart/form-data')) !!}

                      <input type="hidden" name="listing_id" value="{{$listing->id}}">  

                      <div class="rating-group">
                        <div class="radio radio-success radio-inline">
                          <input type="radio" name="rating" id="radio1" value="1">
                          <label for="radio1" class="radio-inline"> <span class="rating"><i class="fa fa-star"></i></span> </label>
                        </div>
                        <div class="radio radio-success radio-inline">
                          <input type="radio" name="rating" id="radio2" value="2">
                          <label for="radio2" class="radio-inline"> <span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i></span> </label>
                        </div>
                        <div class="radio radio-success radio-inline">
                          <input type="radio" name="rating" id="radio3" value="3">
                          <label for="radio3" class="radio-inline"> <span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> </label>
                        </div>
                        <div class="radio radio-success radio-inline">
                          <input type="radio" name="rating" id="radio4" value="4">
                          <label for="radio4" class="radio-inline"> <span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> </label>
                        </div>
                        <div class="radio radio-success radio-inline">
                          <input type="radio" name="rating" id="radio5" value="5">
                          <label for="radio5" class="radio-inline"> <span class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> </label>
                        </div>
                      </div>                      
                      <div class="form-group">
                        <label class=" control-label" for="reviews_title">Review Title :-</label>
                        <div class=" ">
                          <input id="reviews_title" name="reviews_title" type="text" placeholder="Review Title" class="form-control input-md" >
                        </div>
                      </div>
                      <div class="form-group">
                        <label class=" control-label">Write Review :-</label>
                        <div class="">
                          <textarea class="form-control" rows="8" id="review" name="review" placeholder="Write Review"></textarea>
                          <div class="textarea-resize"></div>
                        </div>
                      </div>
                      <div class="form-group">
                        <button name="submit" class="btn tp-btn-default tp-btn-lg">Submit Review</button>
                      </div>
                    {!! Form::close() !!} 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>