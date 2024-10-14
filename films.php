<?php
echo <<<EOD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies library</title>
    <style>
        table {
        border-collapse: collapse;
      }
      th,
      td {
        padding: 8px;
      }
    </style>
</head>
<body>
EOD;
$directors = [
    [
        "name" => "James Cameron",
        "country" => "Canada",
        "year" => 1954,
        "films" => [
            ["name" => "The Terminator",
                "year" => 1984,
                "actors" => ["Arnold Schwarzenegger",
                    "Michael Biehn",
                    "Linda Hamilton",
                    "Paul Winfield"]],
            ["name" => "Titanic",
                "year" => 1997,
                "actors" => ["Leonardo DiCaprio",
                    "Kate Winslet",
                    "Billy Zane",
                    "Kathy Bates"]],
            ["name" => "Avatar",
                "year" => 2009,
                "actors" => ["Sam Worthington",
                    "Zoe Saldana",
                    "Stephen Lang",
                    "Michelle Rodriguez"]],
            ["name" => "True Lies",
                "year" => 1994,
                "actors" => ["Arnold Schwarzenegger",
                    "Jamie Lee Curtis",
                    "Tom Arnold",
                    "Bill Paxton"]],
        ],
    ],
    [
        "name" => "Steven Spielberg",
        "country" => "USA",
        "year" => 1946,
        "films" => [
            ["name" => "Jurassic Park",
                "year" => 1993,
                "actors" => ["Sam Neill",
                    "Laura Dern",
                    "Jeff Goldblum",
                    "Richard Attenborough"]],
            ["name" => "Lincoln",
                "year" => 2012,
                "actors" => ["Daniel Day-Lewis",
                    "Sally Field",
                    "David Strathairn",
                    "Joseph Gordon-Levitt"]],
            ["name" => "The Fabelmans",
                "year" => 2022,
                "actors" => ["Michelle Williams",
                    "Paul Dano",
                    "Seth Rogen",
                    "Gabriel LaBelle"]],
            ["name" => "Ready Player One",
                "year" => 2018,
                "actors" => ["Tye Sheridan",
                    "Olivia Cooke",
                    "Ben Mendelsohn",
                    "T.J. Miller"]],
        ],
    ],
    [
        "name" => "Robert Zemeckis",
        "country" => "USA",
        "year" => 1952,
        "films" => [
            ["name" => "Back to the Future",
                "year" => 1985,
                "actors" => ["Michael J. Fox",
                    "Christopher Lloyd",
                    "Lea Thompson",
                    "Crispin Glover"]],
            ["name" => "Flight",
                "year" => 2012,
                "actors" => ["Denzel Washington",
                    "Don Cheadle",
                    "Kelly Reilly",
                    "John Goodman"]],
            ["name" => "Pinocchio",
                "year" => 2022,
                "actors" => ["Tom Hanks",
                    "Benjamin Evan Ainsworth",
                    "Joseph Gordon-Levitt",
                    "Keegan-Michael Key"]],
            ["name" => "The Polar Express",
                "year" => 2004,
                "actors" => ["Tom Hanks",
                    "Don Burgess",
                    "Robert Presley",
                    "Jeremiah O'Driscoll"]],
        ],
    ],
    [
        "name" => "Christopher Nolan",
        "country" => "England",
        "year" => 1970,
        "films" => [
            ["name" => "The Dark Knight",
                "year" => 2008,
                "actors" => ["Christian Bale",
                    "Michael Caine",
                    "Heath Ledger",
                    "Gary Oldman"]],
            ["name" => "Interstellar",
                "year" => 2014,
                "actors" => ["Matthew McConaughey",
                    "Anne Hathaway",
                    "Jessica Chastain",
                    "Bill Irwin"]],
            ["name" => "Tenet",
                "year" => 2020,
                "actors" => ["John David Washington",
                    "Robert Pattinson",
                    "Elizabeth Debicki",
                    "Dimple Kapadia"]],
            ["name" => "Oppenheimer",
                "year" => 2023,
                "actors" => ["Cillian Murphy",
                    "Emily Blunt",
                    "Matt Damon",
                    "Robert Downey Jr."]],
        ],
    ],
];

function search($directors, $data)
{
    $result = [];
    foreach ($directors as $director) {
        if (stripos($director['name'], $data) !== false || stripos($director['country'], $data) !== false) {
            $result[] = $director;
            continue;
        }
        foreach ($director['films'] as $film) {
            if (stripos($film['name'], $data) !== false) {
                $result[] = $director;
            }
            if (stripos($film['year'], $data) !== false) {
                $result[] = $director;
            }
            foreach ($film['actors'] as $actor) {
                if (stripos($actor, $data) !== false) {
                    $result[] = $director;
                }
            }
        }
    }
    return $result;
}

function print_director($director)
{
    echo "<table border='1'>\n";
echo "<tr><th colspan='2'>Director Info</th></tr>\n";
echo "<tr><td>Name</td><td>{$director['name']}</td></tr>\n";
echo "<tr><td>Country</td><td>{$director['country']}</td></tr>\n";
echo "<tr><td>Year of Birth</td><td>{$director['year']}</td></tr>\n";
echo "<tr><th colspan='2'><strong>Films</strong></th></tr>\n";
echo "<tr><th>Film</th><th>Actors</th></tr>\n"; 
foreach ($director['films'] as $film) {
    echo "<tr><td>{$film['name']} ({$film['year']})</td><td>" . implode(", ", $film['actors']) . "</td></tr>\n";
}
echo "</table><br>\n";

}

$subject = 2022;
echo "Search results for \"$subject\":<br/><br/>";
$res = search($directors, $subject);
if (empty($res)) {
    echo "No results found.<br>\n";
} else {
    array_walk($res, "print_director");
}
echo <<<EOD
</body>
</html>
EOD;
