<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laracasts Tuts</title>
    <style>
        body{
        font-family: monospace;
        font-size: xx-large;
        align-content: space-evenly;
        margin: 0;
        height: 100vh;
        place-items: center;
        display: grid;
    }
    a{
        text-decoration: none;
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
            ],
                ['name' => 'Ernest',
                'age' => '18',
                'gender' => 'male',
                'link' => 'https://www.example.com'
            ],
            ['name' => 'Tina',
            'age' => '19',
            'gender' => 'male',
            'link' => 'https://www.example.com'
        ],
        ['name' => 'Joshua',
        'age' => '20',
        'gender' => 'male',
        'link' => 'https://www.example.com'
        ]
            );

            function filterByAge($studentsData, $age){
                $filteredStudents = [];

                foreach ($studentsData as $data) {
                    if($data["age"] === $age){
                        $filteredStudents[] = $data;
                    }
                }

                return $filteredStudents;
            }
            
        ?>
    
        <?php foreach(filterByAge($studentsData, 18) as $data): ;?>
            <li>
                <a href="<?=$data['link'];?>">
                    <?= $data["name"];?> (<?= $data['age'] ;?>) . <b><?= $data['gender'];?></b>
                </a>
            </li>
        <?php endforeach; ?>


</body>
</html>