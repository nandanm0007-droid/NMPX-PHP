<?php
$file = __DIR__ . '/data/test.txt';
if (file_put_contents($file, 'test123')) {
    echo "Write successful! Your data folder has correct permissions.";
    unlink($file);
} else {
    echo "Write FAILED. Please check folder permissions on the data directory.";
}