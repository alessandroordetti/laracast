<?php 

require base_path("vendor/autoload.php");

use Postmark\PostmarkClient;
use Postmark\Models\PostmarkAttachment;
use Postmark\Models\PostmarkException;

$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];
$body = $_POST['body'];

/* Quando un file è uploadato viene salvato in una cartella temporanea con un nome un tmp_name */
$file_path = $_FILES["file"]["tmp_name"];
$file_name = $_FILES["file"]["name"];
$file_type = mime_content_type($file_path);

if(! is_uploaded_file($file_path)){
    throw new UnexpectedValueException("Invalid file");
}

try{
    $client = new PostmarkClient("9601448d-bcea-4098-bfc0-9bed1b2c0f90");

    $attachment = PostmarkAttachment::fromFile($file_path, $file_name, $file_type);
    
    $result = $client->sendEmail(
        from : "alessandro.ordetti@unipegaso.it",
        to: "alessandro.ordetti@unipegaso.it",
        subject: "Oggetto di prova",
        htmlBody: $body,
        textBody: strip_tags($body),
        attachments: [$attachment]
    );
    

    return view('contact.view.php', [
        'message' => 'Mail sent!'
    ]);

} catch (PostmarkException $e) {
    echo $e->message;
} catch (Exception $e) {
    echo $e->getMessage();
}

