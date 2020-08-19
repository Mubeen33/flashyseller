<div  id="hide--pass">
   <span>******</span>
    <button onclick="
    document.getElementById('show--pass').classList.remove('d-none');
    document.getElementById('hide--pass').classList.add('d-none');
    " class="btn btn-info btn-sm">Show</button> 
</div>

<div id="show--pass" class="d-none">
    <p>
        @if($data->password == NULL)
            <small>No Password Set</small>
        @else
            <small>Password is encripted, not for display</small>
        @endif
    </p>
    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
        Update Password
    </button>
    <button class="btn btn-danger btn-sm"
    onclick="
    document.getElementById('show--pass').classList.add('d-none');
    document.getElementById('hide--pass').classList.remove('d-none');
    ">Cancel</button>
</div>


<!-- Modal for password update-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            
            <form action="{{ route('vendor.passUpdate.post') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" name="new_pass" placeholder="Enter New Pass" required="1" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">UPDATE</button>
                </div>
            </form>

      </div>
    </div>
  </div>
</div>