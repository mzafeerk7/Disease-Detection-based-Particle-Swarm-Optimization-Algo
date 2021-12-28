<?php
ini_set('max_execution_time', 5000);
require('vendor/autoload.php'); 
$con=mysqli_connect("localhost","root","","medisearcher");
use Goutte\Client;
$client = new Client();

//For A
$crawler = $client->request('GET', 'https://www.webmd.com/drugs/2/alpha/c');
//For Aa, Ab, Ac, Ad
$crawler->filter('ul[class="browse-subletters squares"] li a')->each(function ($link){
	global $client;
	$crawler_sub = $client->request('GET',$link->attr("href"));
	//Crawl each Medicine
	$crawler_sub->filter('ul[class="drug-list"] li a')->each(function ($link){
		global $client;
		global $con;
		
		$medicine_name = $link->text();
		$med_link = $link->attr("href");
		$crawler_n = $client->request('GET',$med_link);
		$uses = '';
		$side_effects = '';
		$precautions = '';
		try {
			global $uses;
			global $side_effects;
			global $precautions;
			$uses = (!empty($crawler_n->filter('div[id="tab-1"] div div p')->text()))?$crawler_n->filter('div[id="tab-1"] div div p')->text():'';
			$side_effects = (!empty($crawler_n->filter('div[id="tab-2"] div div p')->text()))?$crawler_n->filter('div[id="tab-2"] div div p')->text():'';
			$precautions = (!empty($crawler_n->filter('div[id="tab-3"] div div p')->text()))?$crawler_n->filter('div[id="tab-3"] div div p')->text():'';
		} catch(Exception $e){
			$uses = '';
			$side_effects = '';
			$precautions = '';
		}

		mysqli_query($con,"INSERT INTO medicines (medicine_name,medicine_uses,medicine_side_effects,medicine_precautions) VALUES ('{$medicine_name}','{$uses}','{$side_effects}','{$precautions}')");

		echo "<h1>".$medicine_name."</h1>";
		//Uses
		echo "<h3>Uses</h3>";
		$crawler_n->filter('div[id="tab-1"] div div p')->each(function($side){
				echo $side->text();
		});
		//Side Effects
		echo "<h3>Side Effects</h3>";
		$crawler_n->filter('div[id="tab-2"] div div p')->each(function($side){
				echo $side->text();
		});
		//Precautions
		echo "<h3>Precautions</h3>";
		$crawler_n->filter('div[id="tab-3"] div div p')->each(function($side){
				echo $side->text();
		});
		echo "<br>";
	});
	echo "Done : Name : ".$link->text()." | Link : ".$link->attr("href")."<br>";
});
mysqli_close($con);

