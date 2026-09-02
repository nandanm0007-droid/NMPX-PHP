<?php
require_once 'config/db.php';
require_once 'config/functions.php';
require_role('startup');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && verify_csrf_token(isset($_POST['csrf_token']) ? $_POST['csrf_token'] : '')) {
    $startup_id = intval($_POST['startup_id']);
    $startup = db_find('startups', $startup_id);

    if ($startup && $startup['user_id'] == $_SESSION['user_id']) {

        if (!empty($startup['pitch_file'])) {
            $filePath = __DIR__ . '/uploads/pitch_decks/' . $startup['pitch_file'];
            if (file_exists($filePath)) {
                @unlink($filePath);
            }
        }

        $relatedRequests = db_where('approach_requests', function ($r) use ($startup_id) {
            return $r['startup_id'] == $startup_id;
        });
        foreach ($relatedRequests as $r) {
            db_delete('approach_requests', $r['id']);
        }

        $relatedInterests = db_where('interests', function ($i) use ($startup_id) {
            return $i['startup_id'] == $startup_id;
        });
        foreach ($relatedInterests as $i) {
            db_delete('interests', $i['id']);
        }

        db_delete('startups', $startup_id);
        set_flash('success', 'Your proposal has been deleted.');
    } else {
        set_flash('error', 'You are not authorized to delete this proposal.');
    }
} else {
    set_flash('error', 'Invalid request.');
}
redirect('dashboard.php');