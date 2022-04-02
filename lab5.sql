-- @block Виводить всі таблиці
SELECT * FROM groups;
SELECT * FROM students;
SELECT * FROM students_hostel;
SELECT * FROM students_rating

-- @block Рахує всіх дівчат на факультеті
SELECT COUNT(*) FROM students
WHERE sex = 2

-- @block Виводить всіх хлопців, відсортованих за алфавітом
SELECT * FROM students
WHERE sex = 1
ORDER BY fio -- 

-- @block Рахує кількість всіх хлопців і дівчат
SELECT
CASE sex 
    WHEN 1 THEN 'Ч'
    WHEN 2 THEN 'Ж'
END AS sex, COUNT(*) FROM students
GROUP BY sex -- 

-- @block Виводить студентів 1 групи, які отримують стипендію
SELECT fio,
CASE sex 
    WHEN 1 THEN 'Ч'
    WHEN 2 THEN 'Ж'
END AS sex, rating
FROM students AS s JOIN students_rating AS sr
ON s.student_id = sr.student_id
WHERE s.group_id = 1 AND sr.stipend = 1

-- @block Виводить 5 перших за рейтингом студентів
SELECT TOP 5 fio, 
CASE sex 
    WHEN 1 THEN 'Ч'
    WHEN 2 THEN 'Ж'
END AS sex, rating
FROM students AS s JOIN students_rating AS sr
ON s.student_id = sr.student_id
ORDER BY rating

-- @block Виводить студентів, що живуть в гуртожитку
SELECT fio, group_id, hostel_id
FROM students AS s JOIN students_hostel AS sh
ON s.student_id = sh.student_id

-- @block Виводить всіх студентів, вказуючи можливий номер гуртожитку
SELECT fio, group_id, hostel_id
FROM students AS s LEFT OUTER JOIN students_hostel AS sh
ON s.student_id = sh.student_id

-- @block Додає рядок в таблицю
INSERT INTO students
VALUES (29, 'Йотунхейм Локі Лейфейсон', 5, '2002-05-18', 1)

-- @block Змінює значення рядка в таблиці
UPDATE students
SET fio = 'Свадільфарі Локі Лейфейсон',
    sex = 2
WHERE student_id = 29

-- @block Видаляє рядок з таблиці
DELETE FROM students
WHERE student_id = 29

-- @block Виводить таблицю студентів
SELECT * FROM students