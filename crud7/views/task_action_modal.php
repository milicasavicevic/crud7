<!-- Delete -->
<div class="modal fade" id="delete<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Member</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid text-center">
				<h5>Are sure you want to delete</h5>
				<h2>Name: <b><?php echo $row['name']; ?></b></h2> 
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="deletetask?id=<?php echo $row['id']; ?>" class="btn btn-danger">Yes</a>
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
                <center><h4 class="modal-title" id="myModalLabel">Edit Task</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="edittask?id=<?php echo $row['id']; ?>">
				<div class="row">
					<div class="col-lg-2">
						<label style="position:relative; top:7px;">Name:</label>
					</div>
					<div class="col-lg-10">
						<input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>">
					</div>
				</div>
				<div style="height:10px;"></div>
				
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