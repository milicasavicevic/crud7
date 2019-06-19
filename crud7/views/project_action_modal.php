<!-- Delete -->
<div class="modal fade" id="delete<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Project</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid text-center">
				<h5>Are sure you want to delete</h5>
				<h2> <b><?php echo $row['name']; ?></b></h2> 
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="deleteproject?id=<?php echo $row['id']; ?>" class="btn btn-danger">Yes</a>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
 
<!-- Edit -->
<div class="modal fade" id="edit<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Project</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="editproject?id=<?php echo $row['id']; ?>">
				<div class="row">
					<div class="col-lg-2">
						<label style="position:relative; top:7px;">Name:</label>
					</div>
					<div class="col-lg-10">
						<input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>">
					</div>
				</div>
				<div style="height:10px;"></div>
				<div class="row">
					<div class="col-lg-2">
						<label style="position:relative; top:7px;">Status:</label>
					</div>
					<div class="col-lg-10">
						<input type="text" name="status" class="form-control" value="<?php echo $row['status']; ?>">
					</div>
				</div>
				<div style="height:10px;"></div>
				<div class="row">
					<div class="col-lg-2">
						<label style="position:relative; top:7px;">Duration:</label>
					</div>
					<div class="col-lg-10">
						<input type="text" name="duration" class="form-control" value="<?php echo $row['duration']; ?>">
					</div>
				</div>
				<div style="height:10px;"></div>
				<div class="row">
					<div class="col-lg-2">
						<label class="control-label" style="position:relative; top:7px;">Client Name:</label>
					</div>
					<div class="col-lg-10">
						<select class="form-control" name="client_id">
                        <?php foreach ($clients as $client) { ?>

                            <option value="<?php echo $client->id; ?>"><?php echo $client->name; ?><?php echo $client->surname; ?></option>

                        <?php } ?>
                    </select>
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="submit" name="edit" class="btn btn-warning">Save</button>
            </div>
			</form>
        </div>
    </div>
</div>
<!-- /.modal -->