<?php

use Core\App;

$db = App::container()->resolve(\Core\Database::class);

$id = $_POST['car'];

$_SESSION['delete'] = 'Failed To Delete';

$delete = $db->query('DELETE FROM cars WHERE id=?', [$id]);

if ($delete)

    $_SESSION['delete'] = 'Deleted Successfully';

header('location:/manage');

exit;
