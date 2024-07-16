<?php
$apiUrl = 'http://127.0.0.1:8000/api/volume';
$headers = [
    'Accept: application/json',
    'Content-Type: application/json'
];

for ($productId = 21; $productId <= 40; $productId++) {
    // Determine the number of requests based on productId
    $numRequests = ($productId <= 30) ? 3 : 1;

    for ($i = 1; $i <= $numRequests; $i++) {
        // Generate volumeName and content
        $volumeName = "Volume " . (($i % 5) + 1);
        $content = "Sample content for product $productId, volume $volumeName";

        // Create the data payload
        $data = json_encode([
            'productId' => $productId,
            'volumeName' => $volumeName,
            'content' => $content
        ]);

        // Initialize cURL session
        $ch = curl_init($apiUrl);

        // Set cURL options
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the request and fetch response
        $response = curl_exec($ch);

        // Check for errors
        if ($response === false) {
            echo 'cURL Error: ' . curl_error($ch) . PHP_EOL;
        } else {
            echo 'Response for productId ' . $productId . ': ' . $response . PHP_EOL;
        }

        // Close cURL session
        curl_close($ch);
    }
}
