<?php
$uploadDirectory = 'uploads/';
$maxFileSize = 1 * 1024 * 1024; // 1 MB

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

// Function to get the file size in MB
function getFileSizeInMB($file)
{
    $sizeInBytes = filesize($file);
    $sizeInMB = $sizeInBytes / (1024 * 1024); // Convert bytes to MB
    return round($sizeInMB, 2); // Round to 2 decimal places
}

// Handle file upload
if (isset($_FILES['file'])) {
    $uploadedFile = $_FILES['file'];

    if ($uploadedFile['error'] === UPLOAD_ERR_OK) {
        $fileName = $uploadedFile['name'];
        $fileTmpName = $uploadedFile['tmp_name'];
        $fileDestination = $uploadDirectory . $fileName;
        $fileSize = filesize($fileTmpName);

        if ($fileSize <= $maxFileSize) {
            // Move uploaded file to destination directory
            if (move_uploaded_file($fileTmpName, $fileDestination)) {
                echo "File uploaded successfully.";
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "File size exceeds the limit. Please upload a file up to 1 MB.";
        }
    }
}

// Get all files in the upload directory
$files = getFilesInDirectory($uploadDirectory);
?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TemplateXZ - Public</title>
    <style>
        .file-list {
            margin-top: 20px;
        }
        body{
            background-color: #0b0c1b;
        }
        h2{
            color: white;
        }
        .file-size {
            color: white;
        }
    </style>
</head>
<body>
    <h2>Public Share</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="file" required>
        <input type="submit" value="Upload">
    </form>

    <div class="file-list">
        <h2>Uploaded Files</h2>
        <?php if (!empty($files)): ?>
            <ul>
                <?php foreach ($files as $file): ?>
                    <li>
                        <a href="<?php echo $uploadDirectory . $file; ?>" target="_blank">
                            <?php echo $file; ?>
                        </a>
                        <span class="file-size">(<?php echo getFileSizeInMB($uploadDirectory . $file); ?> MB)</span>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No files found.</p>
        <?php endif; ?>
    </div>

    <p style="color: white;">
        Rules:<br> No inappropriate files, images, or illegal content allowed.<br> All uploads are subject to review by our team. Violation of these rules will result in ban!<br>File limit:2mb
