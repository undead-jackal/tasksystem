<div class="modal fade" id="addProject" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addItem" class="form-horizontal">
        <div class="modal-body">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-group">
                    <label class="control-label">Project Name</label>
                    <input class="form-control" type="text" name="project" placeholder="ex: Noodles Beef" />
              </div>
            </div>
          </div>

          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-group">
                    <label class="control-label">Type</label>
                    <input class="form-control" type="text" name="type" placeholder="ex: 60" />
              </div>
            </div>
          </div>

          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-group">
                    <label class="control-label">Account</label>
                    <select class="form-control" name="account">
                      <?= optionAccount(); ?>
                    </select>
              </div>
            </div>
          </div>

          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-group">
                    <label class="control-label">Deadline</label>
                    <input class="form-control" type="text" name="deadline" value="">
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


<div class="modal fade" id="editProject" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  class="form-horizontal">
        <div class="modal-body">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-group">
                    <label class="control-label">Project Name</label>
                    <input class="form-control" type="hidden" name="id"/>

                    <input class="form-control" type="text" name="project" placeholder="ex: Noodles Beef" />
              </div>
            </div>
          </div>

          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-group">
                    <label class="control-label">Type</label>
                    <input class="form-control" type="text" name="type" placeholder="ex: 60" />
              </div>
            </div>
          </div>

          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-group">
                    <label class="control-label">Account</label>
                    <select class="form-control" name="account">
                      <?= optionAccount(); ?>
                    </select>
              </div>
            </div>
          </div>

          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-group">
                    <label class="control-label">Deadline</label>
                    <input class="form-control" type="text" name="deadline" value="">
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
