<!-- Add -->
<div class="modal fade" id="addNewAuthor">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title"><b>Add Author</b></h4>
      </div>
      <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
        <div class="modal-body">

         
          <div class="form-group">
            <label for="lastname" class="col-sm-3 control-label">Initials</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="initials" name="initials" required>
            </div>
          </div>

          <div class="form-group">
            <label for="age" class="col-sm-3 control-label">Age</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="age" name="age" required>
            </div>
          </div>
          <div class="form-group">
            <label for="country" class="col-sm-3 control-label">Country</label>

            <div class="col-sm-9">
              <input type="text" class="form-control" id="country" name="country" required>
            </div>
          </div>

          <div class="form-group">
            <label for="profile" class="col-sm-3 control-label">Profile Image</label>

            <div class="col-sm-9">
              <input type="file" class="form-control" id="image" name="image">
            </div>
          </div>


        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
          <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
        </div>
        @csrf
      </form>
    </div>
  </div>
</div>