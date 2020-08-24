<form action="{{ route('vendor.vendors.update',$data->id) }}" method="post">
   @csrf
    @method('PUT')
    <div class="card">
    	<br>
    	<h4>Edit</h4>
        <input type="hidden" name="type" value="UpdateContactDetails">
	    <div class="card-body pr-0 pl-0">
	        <div class="row">
	            <div class="col-12">
	                        


                        <div class="form-group">
                        	<label>Company Name</label>
                        	<input type="text" name="company_name" value="{{ $data->company_name }}" required="1" class="form-control">
                        </div>

                        <div class="form-group">
                        	<label>Business Information</label>
                        	<textarea name="business_information" class="form-control" rows="6" cols="10">{{ $data->business_information }}</textarea>
                        </div>
	                    
                        <button class="btn btn-primary" type="submit" name="update">UPDATE</button>
                        <button id="cancel-contact-edit--btn" class="btn btn-danger" type="button">CANCEL</button>
	            </div>
	            
	            </div>
	        </div>
	    </div>
</form>