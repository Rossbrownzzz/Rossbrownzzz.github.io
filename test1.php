<!DOCTYPE html>
<style>
form {     
		padding-top: 25px;
		padding-bottom: 25px; 
		padding-left: 25px;
	}
td {
border: 1px solid black;
}
h2 {
	padding-bottom: 25px; 
		padding-left: 25px;
}
table tr:nth-child(odd) {
    background-color: #ccc;
}
table tr:first-child {
	background-color: #9fc5e8;
}
table {
    margin-left: auto;
    margin-right: auto;
}
</style>

<html lang="en">
	<head>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<meta charset= "utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
			<title>Mr.Bengal's Team</title>
	</head>
		
	<body>
		<header>
			<h1>Pokemon</h1>
		</header>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<a class="navbar-brand" href="#">
				<!--<img src="snowman.png" alt="Logo" style="width:40px;"> -->
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav active">
                    <li class="nav-item active">
						<a class="nav-link" href="#">Battle Stats</a>
                    </li>
                    <li class="nav-item">
						<a class="nav-link" href="typematchups.php">Type Matchups</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="eggData.php">Egg Data</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="teambuilder.php">Team Builder</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="creators.html">Creators</a>
                    </li>
				</ul>
			</div>
		</nav>
			<main>
					<h1>
					<?php

					//TODO fix the formatting of the search bar, it looks terrible, and also line "echo $userQuery;" looks terrible too.
					echo
						'<form>
						<label for="queryVal">Search:</label>
						<input type="text" id="queryVal" name="queryVal"><br>
						</form>'; 


					//TODO add some kind of help popup or page thing that has some basic rules of how to search


					//TODO show how many results each search 

					//regex validates input
					$allowable = 
//	name only		 (stat																										equality		num		)( stat																												asc or desc)			(ONLY asc or desc part, no stat search)
"/(([a-z]|[A-Z]|\'|\(|\)|\-)+)$|(((^(hp)|^(hit points)|^(attack)|^(defense)|^(sp\. attack)|^(special attack)|^(sp\. defense)|^(special defense)|^(speed)|^(total)){1}(<|>|<=|>=|=){1}[0-9]+(,){0,1})((^(hp)|^(hit points)|^(attack)|^(defense)|^(sp\. attack)|^(special attack)|^(sp\. defense)|^(special defense)|^(speed)|^(total)){1}(( asc)|( desc)){1}){0,1})|(((^(hp)|^(hit points)|^(attack)|^(defense)|^(sp\. attack)|^(special attack)|^(sp\. defense)|^(special defense)|^(speed)|^(total))(( asc)|( desc))){1})/";

$allowNameSearch=
"/^(([a-z]|[A-Z]|\'|\(|\)|\-)+)$/";
$allowSingleStatSearch=
"/^(((hp)|(hit points)|(attack)|(defense)|(sp\. attack)|(special attack)|(sp\. defense)|(special defense)|(speed)|(total)){1}(<|>|<=|>=|=){1}[0-9]+)$/";
$allowManyStatSearch=
"/^((((hp)|(hit points)|(attack)|(defense)|(sp\. attack)|(special attack)|(sp\. defense)|(special defense)|(speed)|(total)){1}(<|>|<=|>=|=){1}[0-9]+( , |, | , |,){1})+)(((hp)|(hit points)|(attack)|(defense)|(sp\. attack)|(special attack)|(sp\. defense)|(special defense)|(speed)|(total)){1}(<|>|<=|>=|=){1}[0-9]+)$/";
$allowAscOrDescSearch=
"/^(((hp)|(hit points)|(attack)|(defense)|(sp\. attack)|(special attack)|(sp\. defense)|(special defense)|(speed)|(total)){1}(( asc)|( desc)))$/";
$allowSingleStatAndOrder=
"/^(((hp)|(hit points)|(attack)|(defense)|(sp\. attack)|(special attack)|(sp\. defense)|(special defense)|(speed)|(total)){1}(<|>|<=|>=|=){1}[0-9]+( , |, | ,|,){1}){1}(((hp)|(hit points)|(attack)|(defense)|(sp\. attack)|(special attack)|(sp\. defense)|(special defense)|(speed)|(total)){1}(( asc)|( desc)){1})$/";
$allowStatAndAsc=
"/^((((hp)|(hit points)|(attack)|(defense)|(sp\. attack)|(special attack)|(sp\. defense)|(special defense)|(speed)|(total)){1}(<|>|<=|>=|=){1}[0-9]+( , | ,|, |,){1})+)(((hp)|(hit points)|(attack)|(defense)|(sp\. attack)|(special attack)|(sp\. defense)|(special defense)|(speed)|(total)){1}(( asc)|( desc)){1})$/";
					//if a query is there
					if (isset($_GET['queryVal']) && "" != $_GET['queryVal']){
						// and it is allowable
						if (preg_match($allowNameSearch, $_GET['queryVal'])
						||preg_match($allowSingleStatSearch, $_GET['queryVal'])
						||preg_match($allowManyStatSearch, $_GET['queryVal'])
						||preg_match($allowAscOrDescSearch, $_GET['queryVal'])
						||preg_match($allowSingleStatAndOrder, $_GET['queryVal'])
						||preg_match($allowStatAndAsc, $_GET['queryVal'])
						){
							// accept the query
							$userQuery = $_GET['queryVal'];
							// display the current query conditions
							echo "<h2>Results for: " . $userQuery . "</h2>";
							//reformat it to be searchable based on database schema
							$userQuery = preg_replace("/sp. attack|special attack/", "special_attack", $userQuery);
							$userQuery = preg_replace("/sp. defense|special defense/", "special_defense", $userQuery);
							$userQuery = preg_replace("/total/", "total_points", $userQuery);
							
							//sort out whether or not there was an asc or desc call, and find what was sorted by
							$startsearch = -1;
							$ascORdesc = "";
							$holdbackwards = "";
							if(strpos($userQuery, "asc") != false){
								$startsearch = strpos($userQuery, "asc");
								$ascORdesc = "asc";
							}
							elseif(strpos($userQuery, "desc") != false){
								$startsearch = strpos($userQuery, "desc");
								$ascORdesc = "desc";
							}
							//
							while(($startsearch > 0) && ($userQuery[$startsearch-1] != ",")){
								$holdbackwards = $holdbackwards . $userQuery[$startsearch-1];
								$startsearch = $startsearch - 1;
							}

							//do final formatting now that order is sorted
							$userQuery = preg_replace("/(,| , | ,|, )(hp|hit points|attack|defense|sp\. attack|special attack|sp\. defense|special defense|speed|total|total_points|special_attack|special_defense) (asc|desc)/", "", $userQuery);
							$userQuery = preg_replace("/,| , |, | ,/", " AND ", $userQuery);

							//construct the base query
							$query = "SELECT pokedex_number, pokemon.name, hp, attack, defense, special_attack, special_defense, speed, total_points, legendary_status, pokemontype FROM stats JOIN pokemon ON pokemon.name = stats.name JOIN pokemontype ON pokemon.name = pokemontype.name";
							
							//search by name (ie, not stats so no asc, desc, >, <, or =)
							if(!preg_match("/(asc)|(desc)|>|<|=/", $userQuery))
							{
								//if they were searching name
								if(!preg_match("/(legendary)|(none)|(sub-legendary)|(mythical)/", $userQuery)){
									$query = $query . " WHERE stats.name LIKE \"%" . $userQuery . "%\"";
								}
								//if they were searching by legendary status
								else{
									$query = $query . " WHERE legendary_status = \"" . $userQuery . "\"";
								}
							}
							
							//if it was more than just asc or desc, and not search by name
							if(($startsearch != 0) && (preg_match("/<|>|=/", $userQuery))){
								$query = $query . " WHERE " . $userQuery;
							}
							//if there was an asc or desc part
							if($ascORdesc != ""){
								$query = $query . " ORDER BY " . strrev($holdbackwards) . $ascORdesc;
							}
							$query = $query . ";";
						}
						else{
							echo "<h2>Invalid query</h2>";
							//default if invalid
							$query = "SELECT pokedex_number, pokemon.name, hp, attack, defense, special_attack, special_defense, speed, total_points, legendary_status, pokemontype FROM stats JOIN pokemon ON pokemon.name = stats.name JOIN pokemontype ON pokemon.name = pokemontype.name;";
						}
					}
					else{
						//default
						$query = "SELECT pokedex_number, pokemon.name, hp, attack, defense, special_attack, special_defense, speed, total_points, legendary_status, pokemontype FROM stats JOIN pokemon ON pokemon.name = stats.name JOIN pokemontype ON pokemon.name = pokemontype.name;";
					}
					

					// format as table
					echo "<div><table>";

					displayData($query);



					//TODO add pokemon type to the table, add abbilities to the table 
					
					//TODO MAYBE: depending on space, remove pokedex number from table?

					
					function displayData($sqlquery){
						//establish connection
						$servername = "localhost";
						$username = "admin";
						$password = "workplaceready";
						$dbname = "pokemondb";
						$conn = new mysqli($servername, $username, $password, $dbname);
						
						//ensure connection worked
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
							}

						//query the databse
						$result = $conn->query($sqlquery);


						//TODO make a small space between word starts/ends and the column barrier
						//display all headers
						echo "<tr>";
						//dex
						echo "<td align='center' style='font-size:25px'>pokedex #</td>";
						//name
						echo "<td align='center' style='font-size:25px'>Name</td>";
						//hp
						echo "<td align='center' style='font-size:25px'>hit <br>points</td>";
						//attack
						echo "<td align='center' style='font-size:25px'>attack</td>";
						//defense
						echo "<td align='center' style='font-size:25px'>defense</td>";
						//sp attack
						echo "<td align='center' style='font-size:25px'>sp. <br>attack</td>";
						//sp def
						echo "<td align='center' style='font-size:25px'>sp. <br>defense</td>";
						//speed
						echo "<td align='center' style='font-size:25px'>speed</td>";
						//total
						echo "<td align='center' style='font-size:25px'>total</td>";
						//legendary
						echo "<td align='center' style='font-size:25px'>legendary <br> status</td>";
						echo "<td align='center' style='font-size:25px'>type 1</td>";
						echo "<td align='center' style='font-size:25px'>type 2</td>";
						//echo "<td align='center' style='font-size:25px'>ability 1</td>";
						//echo "<td align='center' style='font-size:25px'>ability 2</td>";
						//echo "<td align='center' style='font-size:25px'>ability 3</td>";

						echo "</tr>\n";

						//display all values
						//TODO add radio buttons with the id and name matching the name of the pokemon.
						$first = 1;
						while($row = $result->fetch_assoc()) {
							//if first iteration
							if($first == 1){$previousrow = $row; 
							$first=0;
							$pokemontype1 = "-";
							$pokemontype2 = "-";
							$ability1 = "-";
							$ability2 = "-";
							$ability3 = "-";
							}

							//if new pokemon, display old one
							if ($row['name'] != $previousrow['name']){
								echo "<tr>";
								echo "<td align='center' style='font-size:25px'>$previousrow[pokedex_number]</td>";
								echo "<td align='center' style='font-size:25px'>$previousrow[name]</td>";
								echo "<td align='center' style='font-size:25px'>$previousrow[hp]</td>";
								echo "<td align='center' style='font-size:25px'>$previousrow[attack]</td>";
								echo "<td align='center' style='font-size:25px'>$previousrow[defense]</td>";
								echo "<td align='center' style='font-size:25px'>$previousrow[special_attack]</td>";
								echo "<td align='center' style='font-size:25px'>$previousrow[special_defense]</td>";
								echo "<td align='center' style='font-size:25px'>$previousrow[speed]</td>";
								echo "<td align='center' style='font-size:25px'>$previousrow[total_points]</td>";
								if($previousrow['legendary_status'] == "None"){
									echo "<td align='center' style='font-size:25px'>-</td>";
								}
								else if($previousrow['legendary_status'] == "Sub-Legendary"){
									echo "<td align='center' style='font-size:25px'>Sub<br>Legendary</td>";
								}
								else{
									echo "<td align='center' style='font-size:25px'>$previousrow[legendary_status]</td>";
								}
								if ($pokemontype1 == "-"){
									echo "<td align='center' style='font-size:25px'>$pokemontype2</td>";
									echo "<td align='center' style='font-size:25px'>$pokemontype1</td>";
								}
								else{
									echo "<td align='center' style='font-size:25px'>$pokemontype1</td>";
									echo "<td align='center' style='font-size:25px'>$pokemontype2</td>";
								}
								//echo "<td align='center' style='font-size:25px'>$ability1</td>";
								//echo "<td align='center' style='font-size:25px'>$ability2</td>";
								//echo "<td align='center' style='font-size:25px'>$ability3</td>";
								$previousrow = $row;
								$pokemontype1 = "-";
								$pokemontype2 = "-";
								$ability1 = "-";
								$ability2 = "-";
								$ability3 = "-";
								echo "</tr>\n";
							}
							
							/*	if($ability1=="-"){
									$ability1 = $row['ability'];
								}
								else if ($ability2=="-" && $row['ability'] != $ability1){
									$ability2 = $row['ability'];
								}
								else if ($ability3=="-" && $row['ability'] != $ability2 && $row['ability'] != $ability1){
									$ability3 = $row['ability'];
								}*/

								if($pokemontype2=="-"){
									$pokemontype2 = $row['pokemontype'];
								}
								else if ($pokemontype1=="-" && $row['pokemontype'] != $pokemontype2){
									$pokemontype1 = $row['pokemontype'];
								}
							
							
							
						}
						echo "</table></div>";
						$conn->close();
				}

					?>
					</h1>
				</main>
			<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	</body>
</html>