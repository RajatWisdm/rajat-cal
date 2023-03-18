<h1>Your Schedule</h1>

	<?php

	global $wpdb;
	$table_name = "wdm_scheduled_data";

	$data = $wpdb->get_results("SELECT * FROM $table_name");

	echo '<table id="rg_tbl">';
	echo '<thead><tr><th>Date</th><th>Occasion</th><th>Post Title</th><th>Author</th><th>Reviewer</th></tr></thead>';
	foreach ($data as $row) {
		echo '<tr>';
		echo '<td>' . $row->date . '</td>';
		echo '<td>' . $row->occasion . '</td>';
		echo '<td>' . $row->post_title . '</td>';
		echo '<td>' . get_userdata($row->author)->user_login . '</td>';
		echo '<td>' . get_userdata($row->reviewer)->user_login . '</td>';
		echo '</tr>';
	}

    ?>
<script>
    let table = new DataTable('#rg_tbl');
</script>