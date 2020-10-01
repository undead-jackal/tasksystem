<div class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <button class="btn btn-primary btn-wd" data-toggle="modal" data-target="#addProject">Add Project</button>
                </div>
                <table id="projectTable" class="table">
                    <thead>
                        <th>Id</th>
                        <th data-breakpoints="xs sm">Project</th>
                        <th data-breakpoints="xs sm">Type</th>
                        <th data-breakpoints="xs sm">Status</th>
                        <th data-breakpoints="xs sm">Account Owner</th>
                        <th data-breakpoints="xs sm">Date Added</th>
                        <th data-breakpoints="xs sm">Deadline</th>
                        <th data-breakpoints="xs sm">Created By</th>
                        <th data-breakpoints="xs sm">Action</th>
                    </thead>
                    <tbody></tbody>
                </table>
              </div>
          </div>
        </div>
    </div>
</div>
<?php include 'modal.php'; ?>
<script src="<?= getAssets("js/project.min.js") ?>" charset="utf-8"></script>
