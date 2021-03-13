<div class="modal fade" id="modal-form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" dat-toogle="validator">
          @csrf {{method_field('POST')}}
          <input type="hidden" name="id" id="id">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter name" name="name">
          </div>
          <div class="form-group">
            <label for="password">email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="email">
          </div>
          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number">
          </div>
          <div class="form-group">
            <label for="religion">Religion</label>
            <select class="form-control" id="religion" name="religion">
              <option>Muslim</option>
              <option>Hindu</option>
              <option>Buddhism</option>
              <option>Christian</option>
              <option>Others</option>
            </select>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="insertbtn" class="btn btn-sm btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
