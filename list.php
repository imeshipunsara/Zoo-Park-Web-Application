<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animals list</title>
    <?php include 'layout-header.php'; ?>
</head>
<body>
    <?php
         # create 5 records of array animals name, description 
        $animals = [
            ['name' => 'Lion', 'description' => 'King of the jungle'],
            ['name' => 'Elephant', 'description' => 'Biggest animal'],
            ['name' => 'Giraffe', 'description' => 'Tallest animal'],
            ['name' => 'Zebra', 'description' => 'Black and white stripes'],
            ['name' => 'Monkey', 'description' => 'Naughty animal'],
        ];
        # print each animal name in p tag
        foreach ($animals as $animal) {
            echo "<h2 class='animal-name'>{$animal['name']}</h2>";
            echo "<p class='animal-description'>".$animal['description']."</p>";
        }
    ?>
</body>
</html>