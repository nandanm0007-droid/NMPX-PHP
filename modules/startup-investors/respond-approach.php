<?php
require_once 'config/db.php';
require_once 'config/functions.php';
require_role('investor');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf_token(isset($_POST['csrf_token']) ? $_POST['csrf_token'] : '')) {
    $request_id = intval($_POST['request_id']);
    $action = $_POST['action'] === 'accepted' ? 'accepted' : 'rejected';

    $inv = db_find_by('investors', 'user_id', $_SESSION['user_id']);
    $investor_id = $inv ? $inv['id'] : 0;

    $req = db_find('approach_requests', $request_id);

    if (!$req) {
        set_flash('error', 'Request not found.');
    } elseif ($req['investor_id'] != $investor_id) {
        set_flash('error', 'You are not authorized to respond to this request.');
    } else {
        $updated = db_update('approach_requests', $request_id, ['status' => $action]);
        if ($updated) {
            set_flash('success', "Request marked as $action.");
        } else {
            set_flash('error', 'Failed to update request. Please check folder write permissions.');
        }
    }
} else {
    set_flash('error', 'Invalid form submission.');
}
redirect('dashboard.php');