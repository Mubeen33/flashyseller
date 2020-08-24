<form action="{{ route('vendor.vendors.update',$data->id) }}" method="post">
   @csrf
    @method('PUT')
    <div class="card">
    	<br>
    	<h4>Edit</h4>
    	<input type="hidden" name="type" value="UpdateSellerDetails">
	    <div class="card-body pr-0 pl-0">
	        <div class="row">
	            <div class="col-12">
	                        
                        <div class="form-group">
                        	<label>Fist Name</label>
                        	<input type="text" name="first_name" value="{{ $data->first_name }}" required="1" class="form-control">
                        </div>

                        <div class="form-group">
                        	<label>Last Name</label>
                        	<input type="text" name="last_name" value="{{ $data->last_name }}" required="1" class="form-control">
                        </div>

                        <div class="form-group">
                        	<label>Phone</label>
                        	<input type="text" name="phone" value="{{ $data->phone }}" class="form-control">
                        </div>

                        <div class="form-group">
                        	<label>Mobile</label>
                        	<input type="text" name="mobile" value="{{ $data->mobile }}" required="1" class="form-control">
                        </div>

                        <div class="form-group">
                        	<label>Email</label>
                        	<input type="email" name="email" value="{{ $data->email }}" class="form-control" required="1">
                        </div>
	                    
                        <button class="btn btn-primary" type="submit" name="update">UPDATE</button>
                        <button id="cancel-seller-edit--btn" class="btn btn-danger" type="button">CANCEL</button>
	            </div>
	            
	            </div>
	        </div>
	    </div>
</form>