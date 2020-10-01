<div class="modal fade" id="addItem" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addItem" class="form-horizontal">
        <div class="modal-body">
          <div class="row justify-content-center">
            <div class="col-md-6">
              <div class="form-group">
                    <label class="control-label">First Name</label>

                    <input class="form-control" type="text" name="fname" placeholder="ex: Noodles Beef" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                    <label class="control-label">Last Name</label>
                    <input class="form-control" type="text" name="lname" placeholder="ex: 60" />
              </div>
            </div>

          </div>
          <div class="row justify-content-center">
            <div class="col-md-6">
              <div class="form-group">
                    <label class="control-label">Company Name</label>
                    <input class="form-control" type="text" name="company" placeholder="ex: 60" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                    <label class="control-label">Type</label>
                    <select class="form-control" name="type">
                      <option value="0">Internal</option>
                      <option value="1">Client</option>
                    </select>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-6">
              <div class="form-group">
                    <label class="control-label">Contact(s)</label>
                    <input class="form-control"  type="text" name="contact" value="" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                    <label class="control-label">Email(s)</label>
                    <input class="form-control" type="text"  name="email"  />
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary ml-auto mr-2" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Item</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="updItem" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Client Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  class="form-horizontal">
        <div class="modal-body">
          <div class="row justify-content-center">
            <div class="col-md-6">
              <div class="form-group">
                    <label class="control-label">First Name</label>
                    <input class="form-control" type="hidden" name="id"/>

                    <input class="form-control" type="text" name="fname" placeholder="ex: Noodles Beef" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                    <label class="control-label">Last Name</label>
                    <input class="form-control" type="text" name="lname" placeholder="ex: 60" />
              </div>
            </div>

          </div>
          <div class="row justify-content-center">
            <div class="col-md-6">
              <div class="form-group">
                    <label class="control-label">Company Name</label>
                    <input class="form-control" type="text" name="company" placeholder="ex: 60" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                    <label class="control-label">Type</label>
                    <select class="form-control" name="type">
                      <option value="0">Internal</option>
                      <option value="1">Client</option>
                    </select>
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-6">
              <div class="form-group">
                    <label class="control-label">Contact(s)</label>
                    <input class="form-control"  type="text" name="contact" value="" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                    <label class="control-label">Email(s)</label>
                    <input class="form-control" type="text"  name="email"  />
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary ml-auto mr-2" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
