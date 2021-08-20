<a  href="<?php echo site_url('admin/timeline/index'); ?>" class="btn btn-info"><i class="arrow_left"></i> List</a>
<h5 class="font-20 mt-15 mb-1"><?php echo str_replace('_',' ','Timeline'); ?></h5>
<!--Data display of timeline with id--> 
<?php
	$c = $timeline;
?> 
<table class="table table-striped table-bordered">         
		<tr><td>Subject</td><td><?php echo $c['subject']; ?></td></tr>

<tr><td>Description</td><td><?php echo $c['description']; ?></td></tr>

<tr><td>Created At</td><td><?php echo $c['created_at']; ?></td></tr>

<tr><td>Updated At</td><td><?php echo $c['updated_at']; ?></td></tr>


</table>
<!--End of Data display of timeline with id//--> 