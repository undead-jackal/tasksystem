<div class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
              <div class="card">

                <table id="taskTable" class="table">
                    <thead>
                        <th>Task ID</th>
                        <th data-breakpoints="xs sm">Task Title</th>
                        <th data-breakpoints="xs sm">Project</th>
                        <th data-breakpoints="xs sm">Assign By</th>
                        <th data-breakpoints="xs sm">Assign To</th>
                        <th data-breakpoints="xs sm">Status</th>
                        <th data-breakpoints="xs sm">Deadline</th>
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
<script src="<?= getAssets("js/taskuser.min.js") ?>" charset="utf-8"></script>
