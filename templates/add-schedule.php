<?php
    
?>

<div class="">

<h1>Schedule Your Post</h1>

<form method="post" id="schedule_form">

  <div class="mb-3">
    <label for="date">Date:</label>
    <input type="date" name="date" id="date" value="date" required>
  </div>

  <div class="mb-3">
    <label for="occasion">Occasion:</label>
    <input type="text" name="occasion" id="occasion" value="occasion" required>
  </div>

  <div class="mb-3">
    <label for="post_title">Post Title:</label>
    <input type="text" name="post_title" id="post_title" value="post_title" required>
  </div>

  <div class="mb-3">
    <label for="author">Author:</label>
    <select name="author" id="author" required>
        <?php
        $users = get_users(array(
            'fields' => array('ID', 'display_name')
        ));
        foreach ($users as $user) {
            echo '<option value="' . $user->ID . '">' . $user->display_name . '</option>';
        }
        ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="reviewer">Reviewer:</label>
    <select name="reviewer" id="reviewer" required>
        <?php
        $admins = get_users(array(
            'role' => 'administrator',
            'fields' => array('ID', 'display_name')
        ));
        foreach ($admins as $admin) {
            echo '<option value="' . $admin->ID . '">' . $admin->display_name . '</option>';
        }
        ?>
    </select>
  </div>

  

  <button type="submit" class="btn btn-primary">Submit</button>

</form>

</div>
