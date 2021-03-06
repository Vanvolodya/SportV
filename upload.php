<?php
    error_reporting(E_ALL);
    
    require_once 'vendor\autoload.php';
    use WindowsAzure\Common\ServicesBuilder;
    use WindowsAzure\Common\ServiceException;
    
    if ( array_key_exists( "testfile", $_FILES ) )
    {
        if ( $_FILES["testfile"]["error"]!=0 )
        {
            print_r($_FILES);
            exit("<br>Помилка завантаження файлу. Перевірте розмір файлу і параметри сервера.");
        }
        else
        {
            $connectionString = getenv("CUSTOMCONNSTR_blobConnection");
            $blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);
            $content = fopen($_FILES["testfile"]["tmp_name"], "r");
            $blob_name = hash( "sha256", uniqid("awu4hzkf29384hf", true)."jd9hr123794hrf", false );
            $container_name= "files";
            $url = "https://sportvstorage.blob.core.windows.net/files/".$blob_name;
            
            try
            {
                //Upload blob
                $blobRestProxy->createBlockBlob($container_name, $blob_name, $content);
                
                exit('Uploaded as <a href="'.$url.'">file</a>');
            }
            catch(ServiceException $e){
                // Handle exception based on error codes and messages.
                // Error codes and messages are here:
                // http://msdn.microsoft.com/library/azure/dd179439.aspx
                $code = $e->getCode();
                $error_message = $e->getMessage();
                echo $code.": ".$error_message."<br />";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <meta charset="UTF-8"></meta>
    <meta name="viewport" content="width=device-width, initial-scale=1"></meta>
    <link rel="stylesheet" href="w3.css"></link>
    <link rel="stylesheet" href="w3-theme-green.css"></link>
    <body>
        <header class="w3-container w3-card-4 w3-theme">
            <title>SportV</title>
            <h1>SportV</h1>
        </header>
        
        <div class="w3-container" id="itemcontainer">
        </div>
        
        	
		<footer class="w3-container w3-center w3-theme w3-bottom"> 
		</footer>
		
        <div class="w3-card-4 w3-margin">

            <div class="w3-container w3-green">
				<center><h2>Form for uploading</h2></center>
            </div>

            <form class="w3-container" method="POST" action="upload.php" enctype="multipart/form-data">

            <label>File for uploading</label>
            <input class="w3-input" type="file" id="testfile" name="testfile" required>

            <input class="w3-input w3-green" type="submit" Value="OK"> <br>

            </form>

        </div>
    </body>
</html>
