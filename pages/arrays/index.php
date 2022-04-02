<?php
    // Array of students
    $group = array();

    // Parse url params for array of students
    $arr = $_GET['array'];
    if ($arr) {
        $arr = explode('|', $arr);
        foreach ($arr as $val) {
            $parsed = explode(',', $val);
            $group[] = array(
                'sur' => $parsed[0],
                'rat' => $parsed[1],
                'sex' => $parsed[2]
            );
        }
    }

    // Count male/female
    $counter_m = 0;
    $counter_f = 0;
    foreach ($group as $student) {
        if ($student['sex'] == 'M') $counter_m++;
        else $counter_f++;
    }

    // Find student by surname
    function find_student($sur) {
        global $group;
        foreach ($group as $student) {
            if ($student['sur'] == $sur) return $student;
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lab 4 | Arrays</title>
</head>
<body>
    <textarea rows="4"></textarea><br/>
    <button>Зберегти</button>
    <p>Хлопців: <?php echo($counter_m); ?></p>
    <p>Дівчат: <?php echo($counter_f); ?></p>
    <?php
        // Check if find is specified
        if ($_GET['find']) {
            // Find student
            $found = find_student($_GET['find']);

            // If found, output
            if ($found)
                echo '<p>Знайдено: ', $found['sur'], ' | ', $found['rat'], ' | ', ($found['sex'] == 'M' ? 'Хлопець' : 'Дівчина'), '</p>';
            else
                echo '<p>Студента з прізвищем \'', $_GET['find'], '\' не знайдено</p>';
        }
    ?>
    <a href="?array=Kirigaya%2C3.1%2CM|Yuuki%2C4.8%2CF|Asada%2C4.5%2CF|Tsuboi%2C3.6%2CM|Ayano%2C3.9%2CF&find=Yuuki">Заготовка</a>
    <script>
        const arrs = document.querySelector('textarea')
        const sub = document.querySelector('button')

        arrs.value = '<?php if ($arr) echo(join('\\n', $arr)); ?>'

        sub.addEventListener('click', () => {
            location = 'https://urepo.online/arrays?array=' + encodeURIComponent(arrs.value.replaceAll('\n', '|'))
        })
    </script>
</body>
</html>