<?php

declare(strict_types=1);
function main(string $fileDirectory = null, string $content = null)
{
    // function to create a new file
    // the file should have a unique name, and the content of the function is the current timestamp (UNIX format).
    try {
        $filename = "file_" . time() . ".txt";

        $dummyContent = "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus pariatur debitis minus in d, earum?";

        $content =  $content ?? $dummyContent;

        $directory = $fileDirectory ?? "files/";

        $filepath = $directory . $filename;


        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        $payload = file_put_contents($filepath, $content);

        if ($payload === false) {
            throw new Exception("Error creating file: file_put_contents failed.");
        }

        echo "File created successfully: $filepath ";
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }

}

main();
