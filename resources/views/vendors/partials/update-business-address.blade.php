<form action="{{ route('vendor.vendors.update',$data->id) }}" method="post">
   @csrf
    @method('PUT')
    <div class="card">
    	<br>
    	<h4>Edit</h4>
        <input type="hidden" name="type" value="UpdateBusinessAddressDetails">
	    <div class="card-body pr-0 pl-0">
	        <div class="row">
	            <div class="col-12">
	                        


                        <div class="form-group">
                        	<label>Address</label>
                        	<input type="text" name="address" value="{{ $data->address }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Street</label>
                            <input type="text" name="street" value="{{ $data->street }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" value="{{ $data->city }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>State</label>
                            <input type="text" name="state" value="{{ $data->state }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Sub Rub</label>
                            <input type="text" name="subrub" value="{{ $data->subrub }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Postal Code</label>
                            <input type="text" name="zip_code" value="{{ $data->zip_code }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" name="country" value="{{ $data->country }}" class="form-control">
                        </div>

                        
	                    
                        <button class="btn btn-primary" type="submit" name="update">UPDATE</button>
                        <button id="cancel-businessAddress-edit--btn" class="btn btn-danger" type="button">CANCEL</button>
	            </div>
	            
	            </div>
	        </div>
	    </div>
</form>