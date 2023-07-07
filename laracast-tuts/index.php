<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laracasts Tuts</title>
    <style>
        body{
            font-family: sans-serif;
        margin: 0;
        height: 100vh;
        place-items: center;
        display: grid;
    }
    </style>
</head>
<body>

        <?php
            $studentsData = array(
                ['name' => 'Korkoe',
                 'age' => '24',
                 'gender' => 'male',
                 'link' => 'https://www.sample.com'
            ],
            ['name' => 'Joe',
                 'age' => '18',
                 'gender' => 'male',
                 'link' => 'https://www.example.com'
            ]
            );


        ?>

        //this foreach loop program loops through the associative array, studentData and is display their names with a link attached. 

        <?php foreach($studentsData as $data): ;?>
            <li>
                <a href="<?= $data["link"]?>">
                    <?= $data['name']; ?>
                </a>    
            </li>
        <?php endforeach; ?>
</body>
</html>