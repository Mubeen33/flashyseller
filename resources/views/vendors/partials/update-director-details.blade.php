<form action="{{ route('vendor.vendors.update',$data->id) }}" method="post">
   @csrf
    @method('PUT')
    <div class="card">
    	<br>
    	<h4>Edit</h4>
        <input type="hidden" name="type" value="UpdateDirectorDetails">
	    <div class="card-body pr-0 pl-0">
	        <div class="row">
	            <div class="col-12">
	                        


                        <div class="form-group">
                        	<label>Director First Name</label>
                        	<input type="text" name="director_first_name" value="{{ $data->director_first_name }}"  class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Director Last Name</label>
                            <input type="text" name="director_last_name" value="{{ $data->director_last_name }}"  class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Director Email</label>
                            <input type="email" name="director_email" value="{{ $data->director_email }}" class="form-control">
                        </div>


                        <div class="form-group">
                        	<label>Director Details</label>
                        	<textarea name="director_details" class="form-control" rows="6" cols="10">{{ $data->director_details }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Website URL</label>
                            <input type="text" name="website_url" value="{{ $data->website_url }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Vat Register?</label>
                            <select required="1" name="vat_register" class="form-control">
                                <option value="">Select One</option>
                                <option value="Yes" @if($data->vat_register == "Yes") selected @endif>Yes</option>
                                <option value="No" @if($data->vat_register == "No") selected @endif>No</option>
                            </select>
                        </div>
                        

                        <div class="form-group">
                            <label>Additioinal Info.</label>
                            <textarea name="additional_info" class="form-control" rows="6" cols="10">{{ $data->additional_info }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Product Type</label>
                            <select required="1" name="product_type" class="form-control">
                                <option value="Physical Products" @if($data->product_type == "Physical Products") selected @endif>Physical Product </option>
                                <option value="Digital Products" @if($data->product_type == "Digital Products") selected @endif>Digital Products</option>
                                <option value="Grouped Products" @if($data->product_type == "Grouped Products") selected @endif>Grouped Products</option>
                                <option value="Services" @if($data->product_type == "Services") selected @endif>Services</option>
                            </select>
                        </div>
	                    
                        <button class="btn btn-primary" type="submit" name="update">UPDATE</button>
                        <button id="cancel-director-edit--btn" class="btn btn-danger" type="button">CANCEL</button>
	            </div>
	            
	            </div>
	        </div>
	    </div>
</form>