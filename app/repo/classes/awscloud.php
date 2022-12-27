<?php

namespace App\repo\classes;

use App\Models\aws;
use App\repo\interfaces\cloudinterface;
use Aws\S3\S3Client;

class awscloud implements cloudinterface{

    public $client;
    public $policy;
    public function __construct()
    {

        $this->client= new S3Client([
            "version"=>"latest",
            "region"=>"us-east-2",
            "credentials"=>
            [
                    "key"=>env("AWS_ACCESS_KEY_ID"),
                    "secret"=>env("AWS_SECRET_ACCESS_KEY")
            ]
        ]);

    }


    public function createBucket($resturant){

        $name ="resturant".rand(1000000,9999999);
        $this->client->createBucket([
            "Bucket"=>$name
        ]);

        return $name;

    }
    public function makePublic($bucketName){


        $this->client->putBucketPolicy([

            "Bucket"=>$bucketName,
            "Policy"=>$this->setPolicy($bucketName)

        ]);


    }


    public function setPolicy($bucketName){


         return  '{
            "Version": "2012-10-17",
            "Statement": [
                {
                    "Effect": "Allow",
                    "Principal": "*",
                    "Action": "*",
                    "Resource": [
                        "arn:aws:s3:::'.$bucketName.'",
                        "arn:aws:s3:::'.$bucketName.'/*"
                    ]
                }
            ]
        }';

    }


    public function store($bucketName,$resturant_id){

        $aws=aws::create([

            "aws_access_key"=>env("AWS_ACCESS_KEY_ID"),
            "aws_secret_access"=>env("AWS_SECRET_ACCESS_KEY"),
            "aws_region"=>env("AWS_DEFAULT_REGION"),
            "aws_bucket"=>$bucketName,
            "resturant_id"=>$resturant_id
        ]);
        adddisk("resturant:" . $resturant_id, env("AWS_ACCESS_KEY_ID"), env("AWS_SECRET_ACCESS_KEY"), env("AWS_DEFAULT_REGION"), $bucketName);
        return $aws;


    }
    public function deleteBucket($bucketName){

        $this->client->deleteBucket([

            "Bucket"=>$bucketName
        ]);
    }


}
