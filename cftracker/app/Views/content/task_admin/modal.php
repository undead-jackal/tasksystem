<div class="modal fade" id="addTask" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal">
        <div class="modal-body">
          <div class="row justify-content-center">
            <div class="col-md-4">
              <div class="form-group">
                    <label class="control-label">Task Name</label>
                    <input class="form-control" type="text" name="task" placeholder="ex: Noodles Beef" />
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                    <label class="control-label">Assign To</label>
                    <select class="form-control" name="assign">
                      <?= optionUser() ?>
                    </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                    <label class="control-label">Project</label>
                    <select class="form-control" name="project">
                      <?= optionProject() ?>
                    </select>
              </div>
            </div>
          </div>
          <div class="row ">
            <div class="col-md-4">
              <div class="form-group">
                    <label class="control-label">Deadline</label>
                    <input class="form-control" type="text" name="deadline" placeholder="ex: Noodles Beef" />
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-group">
                    <label class="control-label">Instruction</label>
                    <textarea class="summernote" name="instruction" rows="8" cols="80"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary ml-auto mr-2" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Task</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="editTask" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update New Project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal">
        <div class="modal-body">
          <div class="row justify-content-center">
            <div class="col-md-4">
              <div class="form-group">
                    <label class="control-label">Task Name</label>
                    <input type="hidden" name="id" value="">
                    <input class="form-control" type="text" name="task" placeholder="" />
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                    <label class="control-label">Assign To</label>
                    <select class="form-control" name="assign">
                      <?= optionUser() ?>
                    </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                    <label class="control-label">Project</label>
                    <select class="form-control" name="project">
                      <?= optionProject() ?>
                    </select>
              </div>
            </div>
          </div>
          <div class="row ">
            <div class="col-md-4">
              <div class="form-group">
                    <label class="control-label">Deadline</label>
                    <input class="form-control" type="text" name="deadline" placeholder="ex: Noodles Beef" />
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-group">
                    <label class="control-label">Instruction</label>
                    <textarea class="summernote" name="instruction" rows="8" cols="80"></textarea>
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

<div class="modal fade" id="viewTask" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title mr-auto" id="exampleModalLabel"></h5><h5 class="status "></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="form-horizontal">
        <div class="modal-body">
          <div class="row justify-content-center">
            <div class="col-md-4">
              <div class="form-group">
                <input type="hidden" name="id" value="">
                    <label class="control-label">Task</label>
                    <h5 class="name"></h5>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                    <label class="control-label">Project</label>
                    <h5 class="project"></h5>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                    <label class="control-label">Assigned To</label>
                    <h5 class="assign_by"></h5>
              </div>
            </div>
          </div>
          <div class="row ">
            <div class="col-md-4">
              <div class="form-group">
                    <label class="control-label">Deadline</label>
                    <h5 class="deadline"></h5>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                    <label class="control-label">Status</label>
                    <select class="form-control" name="status">
                      <option value="0">Pending</option>
                      <option value="1">Inprogress</option>
                      <option value="2">For QA</option>
                      <!-- <option value="3">Completed</option> -->
                      <option value="4">Unfinished</option>
                    </select>
              </div>
            </div>
          </div>
          <div class="row ">
            <div class="col-md-12">
              <h4>Instruction</h4>
              <div class="instruction p-3">

              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="form-group">
                    <label class="control-label">Content</label>
                    <textarea class="summernote" name="content" rows="8" cols="80"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary ml-auto mr-2" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
