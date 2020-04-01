<?php
function floydWarshall($graph, $V, $INF)
{
    /* dist[][] will be the output matrix  
    that will finally have the shortest  
    distances between every pair of vertices */
    $dist = array(array());

    /* Initialize the solution matrix same  
    as input graph matrix. Or we can say the  
    initial values of shortest distances are  
    based on shortest paths considering no  
    intermediate vertex. */
    for ($i = 0; $i < $V; $i++)
        for ($j = 0; $j < $V; $j++)
            $dist[$i][$j] = $graph[$i][$j];

    /* Add all vertices one by one to the set  
    of intermediate vertices.  
    ---> Before start of an iteration, we have  
    shortest distances between all pairs of  
    vertices such that the shortest distances  
    consider only the vertices in set  
    {0, 1, 2, .. k-1} as intermediate vertices.  
    ----> After the end of an iteration, vertex  
    no. k is added to the set of intermediate 
    vertices and the set becomes {0, 1, 2, .. k} */
    for ($k = 0; $k < $V; $k++) {
        // Pick all vertices as source one by one  
        for ($i = 0; $i < $V; $i++) {
            // Pick all vertices as destination  
            // for the above picked source  
            for ($j = 0; $j < $V; $j++) {
                // If vertex k is on the shortest path from  
                // i to j, then update the value of dist[i][j]  
                if (
                    $dist[$i][$k] + $dist[$k][$j] <
                    $dist[$i][$j]
                )
                    $dist[$i][$j] = $dist[$i][$k] +
                        $dist[$k][$j];
            }
        }
    }

    // Print the shortest distance matrix  
    printSolution($dist, $V, $INF);
}

/* A utility function to print solution */
function printSolution($dist, $V, $INF)
{
    echo "The following matrix shows the " .
        "shortest distances between " .
        "every pair of vertices \n";
    for ($i = 0; $i < $V; $i++) {
        for ($j = 0; $j < $V; $j++) {
            if ($dist[$i][$j] == $INF)
                echo "INF ";
            else
                echo $dist[$i][$j], " ";
        }
        echo "\n";
    }
}



/* Let us create the following weighted graph  
        10  
(0)------->(3)  
  |        /|\  
5 |         |  
  |         | 1  
 \|/        |  
 (1)------->(2)  
        3     */




// Print the solution  
//floydWarshall($graph, $V, $INF);

// This code is contributed by Ryuga 
?>


<html lang="en">


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Project for Taubs</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="#">A quick and dirty site</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <main role="main" class="container">

        <div class="starter-template">
            <h1>Taubs' Project</h1>
            <?php
            // Driver Code 
            /* Define infinite as a large enough  
                value. This value will be used for 
                vertices not connected to each other */
            $INF = 99999;

            //THIS VARIABLE CONTROLS WHICH GRAPH WE USE FOR TESTING PURPOSES
            //1 for Taubs' graph
            //2 for the nice simple example graph I love so much
            //If I had a webserver we could even make buttons it'd be so cute
            $test = 2;

            switch ($test) {
                case 1:
                    $V = 7;
                    $graph = array(
                        array(0, 1, 2, $INF, $INF, $INF, $INF),
                        array(1, 0, 3, $INF, 4, $INF, $INF),
                        array(2, 3, 0, 3, 2, $INF, $INF),
                        array(INF, $INF, 3, 0, $INF, 3, $INF),
                        array(INF, 4, 2, $INF, 0, 4, 5),
                        array(INF, $INF, $INF, 3, 4, 0, 3),
                        array(INF, $INF, $INF, $INF, 5, 3, 0)
                    );
                    break;
                case 2:
                    $V = 4;
                    $graph = array(
                        array(0, 5, $INF, 10),
                        array($INF, 0, 3, $INF),
                        array($INF, $INF, 0, 1),
                        array($INF, $INF, $INF, 0)
                    );
            }
            ?>
            <p>For array defined as follows: <?php print_r($graph) ?></p>
            <p><?php echo (floydWarshall($graph, $V, $INF)); ?></p>
            <p><?php echo ($graph[0][1]); ?> </p>
        </div>

    </main><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
</body>

</html>

</body>

</html>