<?php
$uploadDirectory = 'uploads/';
$maxFileSize = 1 * 1024 * 1024 * 1024; // 1 GB in bytes

// Function to get all files in a directory
function getFilesInDirectory($directory)
{
    $files = array();

    if ($handle = opendir($directory)) {
        while (($file = readdir($handle)) !== false) {
            if (!in_array($file, array('.', '..')) && !is_dir($directory . $file)) {
                $files[] = $file;
            }
        }
        closedir($handle);
    }

    return $files;
}

// Function to get the file size in GB
function getFileSizeInGB($file)
{
    $sizeInBytes = filesize($file);
    $sizeInGB = $sizeInBytes / (1024 * 1024 * 1024); // Convert bytes to GB
    return round($sizeInGB, 2); // Round to 2 decimal places
}

// Create a unique folder for each upload
function createUploadFolder($uploadDirectory, $folderName)
{
    $folderPath = $uploadDirectory . $folderName;

    if (!file_exists($folderPath)) {
        mkdir($folderPath, 0777, true);
    }

    return $folderName;
}

// Handle file upload
if (isset($_FILES['file']) && isset($_POST['folder_name'])) {
    $uploadedFile = $_FILES['file'];
    $folderName = $_POST['folder_name'];

    if ($uploadedFile['error'] === UPLOAD_ERR_OK) {
        $fileName = $uploadedFile['name'];
        $fileTmpName = $uploadedFile['tmp_name'];
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $allowedExtensions = array('zip', 'html');

        if (in_array($fileExtension, $allowedExtensions)) {
            $uploadFolder = createUploadFolder($uploadDirectory, $folderName);
            $fileDestination = $uploadDirectory . $uploadFolder . '/' . $fileName;
            $fileSize = filesize($fileTmpName);

            if ($fileSize <= $maxFileSize) {
                // Move uploaded file to destination directory
                if (move_uploaded_file($fileTmpName, $fileDestination)) {
                    echo "File uploaded successfully.";
                } else {
                    echo "Error uploading file.";
                }
            } else {
                echo "File size exceeds the limit. Please upload a file up to 1 GB.";
            }
        } else {
            echo "Only .zip and .html files are allowed.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #0b0c1b;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: white;
            font-size: 24px;
            margin-bottom: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        input[type="file"],
        input[type="text"] {
            background-color: #1f2937;
            border: none;
            border-radius: 4px;
            color: white;
            padding: 10px 15px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #3182ce;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
            padding: 10px 15px;
        }
        
    </style>
</head>
<body>
    <h2>Upload Template</h2>
    <p>Limit: 1gb</p>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="folder_name" placeholder="Template Name" required><br>
        <input type="file" name="file" accept=".zip,.html" required><br>
        <input type="submit" value="Upload">
    </form>

    <?php
$bytes = disk_free_space("/"); // Provide the path to the directory you want to check

// Convert bytes to a human-readable format
$freeSpace = formatBytes($bytes);


// Function to format bytes into a human-readable format
function formatBytes($bytes, $precision = 2) {
    $units = array('B', 'KB', 'MB', 'GB', 'TB');

    $bytes = max($bytes, 0);
    $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
    $pow = min($pow, count($units) - 1);

    $bytes /= (1 << (10 * $pow));

    return round($bytes, $precision) . ' ' . $units[$pow];
}
?>
<style>
.footer {
  left: 0;
  bottom: 0;
  width: 100%;
  color: white;
  text-align: center;
}
</style>

<div class="footer">
  <?php
    echo "Free disk space: $freeSpace";
  ?>
</div>


</body>
</html>
