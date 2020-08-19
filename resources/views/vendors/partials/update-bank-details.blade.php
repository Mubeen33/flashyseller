<form action="{{ route('vendor.vendors.update',$data->id) }}" method="post">
   @csrf
    @method('PUT')
    <div class="card">
    	<br>
    	<h4>Edit</h4>
        <input type="hidden" name="type" value="UpdateBankDetails">
	    <div class="card-body pr-0 pl-0">
	        <div class="row">
	            <div class="col-12">
	                        


                        <div class="form-group">
                        	<label>Account Holder</label>
                        	<input type="text" name="account_holder" value="{{ $data->account_holder }}" required="1" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Bank</label>
                            <input type="text" name="bank_name" value="{{ $data->bank_name }}" required="1" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Bank Account</label>
                            <input type="text" name="bank_account" value="{{ $data->bank_account }}" required="1" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Branch Name</label>
                            <input type="text" name="branch_name" value="{{ $data->branch_name }}" required="1" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Branch Code</label>
                            <input type="text" name="branch_code" value="{{ $data->branch_code }}" required="1" class="form-control">
                        </div>

                        
	                    
                        <button class="btn btn-primary" type="submit" name="update">UPDATE</button>
                        <button id="cancel-bank-edit--btn" class="btn btn-danger" type="button">CANCEL</button>
	            </div>
	            
	            </div>
	        </div>
	    </div>
</form>