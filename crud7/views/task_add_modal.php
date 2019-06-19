<!-- Add New -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add Task</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="addtask">
				<div class="col-md-8">
					<div class="col-lg-2">
						<label class="control-label" style="position:relative; top:7px;">Name:</label>
					</div>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="name">
					</div>
				</div>
                <div class="col-md-8">
                <div class="form-group">
                    <label for="normal-input" class="form-control-label">Project Name:</label>
                    <select class="form-control" name="project_name">
                        <?php foreach ($projects as $project) { ?>

                            <option value="<?php echo $project->project_id; ?>"><?php echo $project->name; ?></option>

                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="normal-input" class="form-control-label">User Name:</label>

                    <select class="form-control" name="user_name">
                        <?php foreach ($users as $user) { ?>

                            <option value="<?php echo $user->id; ?>"><?php echo $user->name; ?><?php echo $user->surname; ?></option>

                        <?php } ?>
                    </select>
                </div>
            </div>
				<div style="height:10px;"></div>
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