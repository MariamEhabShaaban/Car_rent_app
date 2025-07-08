<?php

use Core\App;

$db = App::container()->resolve(\Core\Database::class);

$id = $_POST['car'];

$_SESSION['delete'] = 'Failed To Delete';
$car = $db->query('SELECT * FROM cars WHERE id=?', [$id]);
$ext = $car['image_ext'];

$delete = $db->query('DELETE FROM cars WHERE id=?', [$id]);

if ($delete) {

    remove_image($id, $ext, 'cars');

    $_SESSION['delete'] = 'Deleted Successfully';
}
redirect('/manage');
