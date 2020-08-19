<form action="{{ route('vendor.vendors.update',$data->id) }}" method="post">
   @csrf
    @method('PUT')
    <div class="card">
    	<br>
    	<h4>Edit</h4>
        <input type="hidden" name="type" value="UpdateWireHouseAddressDetails">
	    <div class="card-body pr-0 pl-0">
	        <div class="row">
	            <div class="col-12">
	                        


                        <div class="form-group">
                        	<label>Address</label>
                        	<input type="text" name="waddress" value="{{ $data->waddress }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Street</label>
                            <input type="text" name="wstreet" value="{{ $data->wstreet }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="wcity" value="{{ $data->wcity }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>State</label>
                            <input type="text" name="wstate" value="{{ $data->wstate }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Sub Rub</label>
                            <input type="text" name="wsubrub" value="{{ $data->wsubrub }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Postal Code</label>
                            <input type="text" name="wzip_code" value="{{ $data->wzip_code }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" name="wcountry" value="{{ $data->wcountry }}" class="form-control">
                        </div>

                        
	                    
                        <button class="btn btn-primary" type="submit" name="update">UPDATE</button>
                        <button id="cancel-wireHouseAddress-edit--btn" class="btn btn-danger" type="button">CANCEL</button>
	            </div>
	            
	            </div>
	        </div>
	    </div>
</form>