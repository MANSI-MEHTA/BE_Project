<?php
	
	require 'vendor/autoload.php';
	
	use Aws\S3\S3Client;
	use Aws\S3\Exception\S3Exception;
	
	$bucketName = 'shahandanchor';
	$IAM_KEY = 'AKIAJYJ7UKT7252RFTYQ';
	$IAM_SECRET = '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';
	try {
		
		$s3 = S3Client::factory(
			array(
				'credentials' => array(
					'key' => $IAM_KEY,
					'secret' => $IAM_SECRET
				),
				'version' => 'latest',
				'region'  => 'us-east-2'
				
			)
		);
	} catch (Exception $e) {
			
		die("Error: " . $e->getMessage());
	}
	if(isset($_POST['submit']))
	{
	$keyName = 'test_example/'. basename($_FILES["varshil"]['name']);
	$pathInS3 = 'https://s3.us-east-2.amazonaws.com/' . $bucketName . '/' . $keyName;
	
	
		$file = $_FILES["varshil"]['tmp_name'];
		$s3->putObject(
			array(
				'Bucket'=>$bucketName,
				'Key' =>  $keyName,
				'SourceFile' => $file,
				'StorageClass' => 'REDUCED_REDUNDANCY'
			)
		);
	
	echo 'Done';
	}
?>	