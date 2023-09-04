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


        ?>


        <?php foreach($studentsData as $data): ;?>
        <?php if ($data["age"] === "18") : ?>
            <li>
                <a href="<?= $data["link"]?>">
                    <?= $data['name']; ?>
                </a>    
            </li>
        <?php endif; ?>
        <?php endforeach; ?>
</body>
</html>