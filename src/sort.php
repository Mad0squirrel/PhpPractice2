<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Selection Sort</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php

function select_sort($array) {
	for($i = 0; $i < count($array)-1; $i++){
		$minIndex = $i;
		for($j = $i + 1; $j < count($array); $j++) {
			if ($array[$j] < $array[$minIndex]) {
				$minIndex = $j;
			}
		}
		$temp = $array[$i];
		$array[$i] = $array[$minIndex];
		$array[$minIndex] = $temp;
	}
	return $array;
}

    function print_array($array): void
    {
        echo "<pre>[";
        echo implode(", ", $array);
        echo "]</pre>";
    }

    if (isset($_GET['array'])) {
        $array = explode(",", $_GET["array"]);
        echo "<p>Original array:</p>";
        print_array($array);
        $array = select_sort($array);
        echo "<p>Sorted array:</p>";
        print_array($array);
    } 
    else {
        echo "
        <div class='d-flex flex-column min-vh-100 justify-content-center align-items-center'>
            <form action='/sort.php' method='GET'>
                <div class='mb-3'>
                    <label for='arrayInput' class='form-label'>Array</label>
                    <input name='array' type='text' class='form-control' id='arrayInput' aria-describedby='arrayHelp'>
                    <div id='arrayHelp' class='form-text'>Input array</div>
                </div>
                <button type='submit' class='btn btn-primary'>Sort array</button>
            </form>
        </div>
        ";
    }
    ?>
</body>
</html>