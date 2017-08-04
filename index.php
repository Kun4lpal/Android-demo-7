<?php
require '..\vendor\autoload.php';
require 'Movies.php';
$app = new \Slim\App;

$app->get(
'/',
function(){
	echo "<h1>HomeWork 7</h1>";
	echo "<form action=\"http://kunal.paliwal.com:81/index.php/\" method=\"post\">";
	echo "Name: <input type=\"text\" name=\"name\"><br />";
	echo "ID: <input type=\"text\" name=\"name\"><br />";
	echo "<input type=\"submit\" value =\"Submit\">";
	echo "</form>";
}
);

$app->get(
'/movies/',
function(){
	//echo "Hello Movies!";
	getMovies();
}
);

$app->get(
'/movies/id/{mid}',
function($request, $response, $args){
	//echo "Hello Movies!";
	getMovieById($args['mid']);
}
);

$app->get(
'/movies/rating/{rat}',
function($request, $response, $args){
	//echo "Hello Movies!";
        aboveRating($args['rat']);
}
);

$app->post(
'/',
function($request, $response, $args){
	$id = $request->getParsedBody();
	echo $id['name']; 
}
);

$app->get(
'/delete',
function($request, $response, $args){
	echo "<form action=\"http://kunal.paliwal.com:81/index.php/delete\" method=\"post\">";
	echo "Name: <input type=\"text\" name=\"name\"><br>";
	echo "<input type=\"submit\" value=\"submit\">";
    echo "</form>";
}
);

$app->post(
'/delete',
function($request, $response, $args){
     $id = $request->getParsedBody();
	 //echo "Hello Movies!";
     del($id['name']);
}
);

$app->get(
'/add',
function(){
        echo "<form action=\"http://kunal.paliwal.com:81/index.php/add\" method=\"post\">";
		echo "Name: <input type=\"text\" name=\"name\"><br />";
        echo "Id: <input type=\"text\" name=\"id\"><br />";
        echo "Description: <input type=\"text\" name=\"desc\"><br />";
        echo "Rating: <input type=\"text\" name=\"rating\"><br />";
        echo "<input type=\"submit\" value=\"submit\">";
        echo "</form>";
}
);

$app->post(
'/add',
function($request, $response, $args){
$id = $request->getParsedBody();
//echo "Hello Movies!";
        addInstance($id['id'],$id['name'],$id['desc'],$id['rating']);
}
);

$app->run();
?>
