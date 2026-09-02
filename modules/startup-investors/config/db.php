<?php
// ============================================================
// NMPX InvestConnect - JSON flat-file storage layer
// ============================================================

error_reporting(E_ALL);
// Errors are logged but NOT shown to visitors (set to 1 only for local debugging)
ini_set('display_errors', 0);

if (!defined('DATA_DIR')) {
    define('DATA_DIR', __DIR__ . '/../data/');
}

function db_init() {
    if (!is_dir(DATA_DIR)) {
        mkdir(DATA_DIR, 0775, true);
    }
    $tables = ['users', 'startups', 'investors', 'approach_requests', 'interests'];
    foreach ($tables as $t) {
        $file = DATA_DIR . $t . '.json';
        if (!file_exists($file)) {
            file_put_contents($file, json_encode([]));
        }
    }
    $counterFile = DATA_DIR . 'counters.json';
    if (!file_exists($counterFile)) {
        file_put_contents($counterFile, json_encode(array_fill_keys($tables, 0)));
    }

    $users = db_read('users');
    $hasAdmin = false;
    foreach ($users as $u) {
        if ($u['role'] === 'admin') { $hasAdmin = true; break; }
    }
    if (!$hasAdmin) {
        $id = db_next_id('users');
        $users[] = [
            'id' => $id,
            'name' => 'Super Admin',
            'email' => 'admin@platform.com',
            'password' => password_hash('Admin@123', PASSWORD_DEFAULT),
            'role' => 'admin',
            'phone' => '',
            'status' => 'active',
            'created_at' => date('Y-m-d H:i:s')
        ];
        db_write('users', $users);
    }
}

if (!function_exists('db_read')) {
function db_read($table) {
    $file = DATA_DIR . $table . '.json';
    if (!file_exists($file)) return [];
    $fp = fopen($file, 'c+');
    flock($fp, LOCK_SH);
    $content = stream_get_contents($fp);
    flock($fp, LOCK_UN);
    fclose($fp);
    $data = json_decode($content, true);
    return is_array($data) ? $data : [];
}
}

if (!function_exists('db_write')) {
function db_write($table, $rows) {
    $file = DATA_DIR . $table . '.json';
    $fp = fopen($file, 'c+');
    flock($fp, LOCK_EX);
    ftruncate($fp, 0);
    rewind($fp);
    fwrite($fp, json_encode(array_values($rows), JSON_PRETTY_PRINT));
    fflush($fp);
    flock($fp, LOCK_UN);
    fclose($fp);
    return true;
}
}

if (!function_exists('db_next_id')) {
function db_next_id($table) {
    $file = DATA_DIR . 'counters.json';
    $fp = fopen($file, 'c+');
    flock($fp, LOCK_EX);
    $content = stream_get_contents($fp);
    $counters = json_decode($content, true);
    if (!is_array($counters)) $counters = [];
    if (!isset($counters[$table])) $counters[$table] = 0;
    $counters[$table]++;
    $newId = $counters[$table];
    rewind($fp);
    ftruncate($fp, 0);
    fwrite($fp, json_encode($counters));
    fflush($fp);
    flock($fp, LOCK_UN);
    fclose($fp);
    return $newId;
}
}

if (!function_exists('db_insert')) {
function db_insert($table, $data) {
    $rows = db_read($table);
    $id = db_next_id($table);
    $data['id'] = $id;
    if (!isset($data['created_at'])) {
        $data['created_at'] = date('Y-m-d H:i:s');
    }
    $rows[] = $data;
    db_write($table, $rows);
    return $id;
}
}

if (!function_exists('db_find')) {
function db_find($table, $id) {
    foreach (db_read($table) as $row) {
        if ((string)$row['id'] === (string)$id) return $row;
    }
    return null;
}
}

if (!function_exists('db_find_by')) {
function db_find_by($table, $field, $value) {
    foreach (db_read($table) as $row) {
        if (isset($row[$field]) && $row[$field] == $value) return $row;
    }
    return null;
}
}

if (!function_exists('db_where')) {
function db_where($table, $cb) {
    return array_values(array_filter(db_read($table), $cb));
}
}

if (!function_exists('db_all')) {
function db_all($table) {
    return db_read($table);
}
}

if (!function_exists('db_update')) {
function db_update($table, $id, $data) {
    $rows = db_read($table);
    $found = false;
    foreach ($rows as &$row) {
        if ((string)$row['id'] === (string)$id) {
            $row = array_merge($row, $data);
            $found = true;
            break;
        }
    }
    unset($row);
    if ($found) db_write($table, $rows);
    return $found;
}
}

if (!function_exists('db_delete')) {
function db_delete($table, $id) {
    $rows = db_read($table);
    $rows = array_filter($rows, function ($r) use ($id) {
        return (string)$r['id'] !== (string)$id;
    });
    db_write($table, array_values($rows));
    return true;
}
}

if (!function_exists('db_count')) {
function db_count($table, $cb = null) {
    $rows = db_read($table);
    if ($cb === null) return count($rows);
    return count(array_filter($rows, $cb));
}
}

if (!function_exists('db_sort')) {
function db_sort($rows, $field, $desc = true) {
    usort($rows, function ($a, $b) use ($field, $desc) {
        $cmp = strcmp((string)$a[$field], (string)$b[$field]);
        return $desc ? -$cmp : $cmp;
    });
    return $rows;
}
}

db_init();