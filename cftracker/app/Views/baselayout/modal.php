<?php 		$session = \Config\Services::session(); ?>


<div class="modal fade" data-id="<?= $session->get('user_id') ?>" id="profileModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update New Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal">
        <input class="form-control" type="hidden" name="id" />

        <div class="modal-body">
          <div class="row ">
            <div class="col-md-6">
              <div class="form-group">
                    <label class="control-label">Username</label>
                    <input class="form-control" type="text" name="username" readonly placeholder="ex: Noodles Beef" />
              </div>
            </div>
            <div class="col-md-6 text-center">
              <br>
              <button type="button" class="btn btn-primary change-btn"> <i class="fa fa-edit "></i> Change</button>
              <button type="button" style="display:none" class="toggle-btn btn btn-primary close-btn"> <i class="fa fa-times "></i></button>
              <button type="submit" style="display:none" class="toggle-btn btn btn-primary">Save</button>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                    <label class="control-label">Codename</label>
                    <input class="form-control" type="text" name="codename" readonly placeholder="ex: Noodles Beef" />
              </div>
            </div>
            <div class="col-md-6 text-center">
              <br>
              <button type="button" class="btn btn-primary change-btn"> <i class="fa fa-edit "></i> Change</button>
              <button type="button" style="display:none" class="toggle-btn btn btn-primary close-btn"> <i class="fa fa-times "></i></button>
              <button type="submit" style="display:none" class="toggle-btn btn btn-primary">Save</button>
            </div>
          </div>
          <div class="row ">
            <div class="col-md-6">
              <div class="form-group">
                    <label class="control-label">Password</label>
                    <input class="form-control" type="text" name="password" readonly placeholder="ex: Noodles Beef" />
              </div>
            </div>
            <div class="col-md-6 text-center">
              <br>
              <button type="button" class="btn btn-primary change-btn"> <i class="fa fa-edit "></i> Change</button>
              <button type="button" style="display:none" class="toggle-btn btn btn-primary close-btn"> <i class="fa fa-times "></i></button>
              <button type="submit" style="display:none" class="toggle-btn btn btn-primary">Save</button>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary ml-auto mr-2" data-dismiss="modal">Close</button>
          <!-- <button type="submit" class="btn btn-primary">Save Changes</button> -->
        </div>
      </form>
    </div>
  </div>
</div>
