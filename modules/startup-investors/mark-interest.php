<?php
require_once 'config/db.php';
require_once 'config/functions.php';
require_role('investor');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf_token($_POST['csrf_token'] ?? '')) {
    $startup_id = intval($_POST['startup_id']);
    $inv = db_find_by('investors', 'user_id', $_SESSION['user_id']);
    $investor_id = $inv ? $inv['id'] : 0;

    $existing = db_where('interests', function ($i) use ($investor_id, $startup_id) {
        return $i['investor_id'] == $investor_id && $i['startup_id'] == $startup_id;
    });
    if (empty($existing)) {
        db_insert('interests', ['investor_id' => $investor_id, 'startup_id' => $startup_id, 'status' => 'interested']);
        set_flash('success', 'Marked as interested! The startup can now see your interest.');
    } else {
        set_flash('info', 'You already marked interest in this startup.');
    }
}
redirect('startup-detail.php?id=' . intval(isset($_POST['startup_id']) ? $_POST['startup_id'] : 0));