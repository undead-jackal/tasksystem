<div class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <button class="btn btn-primary btn-wd" data-toggle="modal" data-target="#addItem">Add New Client</button>
                </div>
                <table id="clientsTable" class="table">
                    <thead>
                        <th>Id</th>
                        <th data-breakpoints="xs sm">Full Name</th>
                        <th data-breakpoints="xs sm">Company</th>
                        <th data-breakpoints="xs sm">Type</th>
                        <th data-breakpoints="xs sm">Email Adress</th>
                        <th data-breakpoints="xs sm">Contact</th>
                        <th data-breakpoints="xs sm">Date Added</th>
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
<script src="<?= getAssets("js/admin.min.js") ?>" charset="utf-8"></script>
