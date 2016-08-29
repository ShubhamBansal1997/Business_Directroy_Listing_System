<option value="">Select Sub Category</option>
@foreach($subcategories as $i => $subcategory)    
                                 
        <option value="{{$subcategory->id}}">{{$subcategory->sub_category_name}}</option> 
                                                   
@endforeach