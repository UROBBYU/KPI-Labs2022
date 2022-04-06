<?php
    $ret = array();

    class Dekanat {
        private $BD;

        function __construct() {
            $this->BD = new PDO("sqlsrv:Server=localhost,1433;Database=KPI", "testname", "testpass");
            $this->BD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        function getGroupData(int $group_id) {
            return $this->select('groups', 'group_id = ' . $group_id)[0];
        }

        function getStudentsList() {
            return $this->select('students');
        }

        function getStudentData(int $id) {
            return $this->select('students', 'student_id = ' . $id)[0];
        }

        function select(string $table, string $condition = null) {
            $stmt = $this->BD->query('SELECT * FROM [' . $table . ']' . ($condition ? ' WHERE ' . $condition : ''));
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        function insert(string $table, string ...$values) {
            foreach ($values as &$val) {
                if (!is_numeric($val)) $val = "'" . $val . "'";
            }
            $this->BD->query('INSERT INTO [' . $table . '] VALUES (' . implode(',', $values) . ')');
        }

        function update(string $table, string $key, mixed $value, string $condition = null) {
            if (!is_numeric($value)) $value = "'" . $value . "'";
            $this->BD->query('UPDATE [' . $table . '] SET ' . $key . ' = ' . $value . ($condition ? ' WHERE ' . $condition : ''));
        }

        function delete(string $table, string $condition = null) {
            $this->BD->query('DELETE FROM [' . $table . ']' . ($condition ? ' WHERE ' . $condition : ''));
        }
    }

    $dek = new Dekanat();

    $type = $_GET['type'];

    switch ($type) {
        case 'getall':
            $ret['groups'] = $dek->select('groups');
            $ret['students'] = $dek->select('students');
            $ret['students_hostel'] = $dek->select('students_hostel');
            $ret['students_rating'] = $dek->select('students_rating');
            break;

        case 'add':
            $dek->insert($_GET['table'], ...explode('/', $_GET['values']));
            break;

        case 'delete':
            $dek->delete($_GET['table'], $_GET['condition']);
            break;

        case 'update':
            $dek->update($_GET['table'], $_GET['key'], $_GET['value'], $_GET['condition']);
            break;
        
        default:
            $ret['err'] = 'Invalid Type!';
            $ret['req'] = $_GET;
            break;
    }

    header('Content-Type: application/json');
    echo json_encode($ret);
?>