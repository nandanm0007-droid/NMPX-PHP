<?php
require_once 'config/db.php';
require_once 'config/functions.php';
require_role('investor');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf_token($_POST['csrf_token'] ?? '')) {
    $interest_id = intval($_POST['interest_id']);
    $status = in_array($_POST['status'], ['interested','contacted','funded']) ? $_POST['status'] : 'interested';

    $inv = db_find_by('investors', 'user_id', $_SESSION['user_id']);
    $investor_id = $inv ? $inv['id'] : 0;

    $interest = db_find('interests', $interest_id);
    if ($interest && $interest['investor_id'] == $investor_id) {
        db_update('interests', $interest_id, ['status' => $status]);
        set_flash('success', 'Status updated.');
    }
}
redirect('dashboard.php');