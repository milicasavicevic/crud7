<!-- Add New -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add Project</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="/addproject">
				<div class="row">
					<div class="col-lg-2">
						<label class="control-label" style="position:relative; top:7px;">Name:</label>
					</div>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="name">
					</div>
				</div>
				<div style="height:10px;"></div>
				<div class="row">
					<div class="col-lg-2">
						<label class="control-label" style="position:relative; top:7px;">Status:</label>
					</div>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="status">
					</div>
				</div>
				<div style="height:10px;"></div>
				<div class="row">
					<div class="col-lg-2">
						<label class="control-label" style="position:relative; top:7px;">Duration:</label>
					</div>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="duration">
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
                <button type="submit" name="add" class="btn btn-primary">Save</button>
			</form>
            </div>
 
        </div>
    </div>
</div>