<?php
$conn = null;
try {
    $conn = new PDO('mysql:host=localhost;dbname=vanh-store', 'root', '', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    echo 'Kết nối thất bại ' . $e->getMessage() . '<br>';
}
function getDataBy($table, $where)
{
    if($where==[]){
        $where=1;
    }else{
        foreach ($where as $key => $value) {
            $where[$key] = $key . "='" . $value . "'";
        }
    }
    $where = implode(" AND ", $where);
    $sql = "SELECT * FROM ${table} WHERE ${where}";
    return query($sql)->fetch();
}

function getAll($table, $orderBy=[], $limit=20)
{
    $orderBy = implode(",", $orderBy)??"ORDER BY ".implode(",", $orderBy);
    $sql = "SELECT * FROM ${table}  ${orderBy} LIMIT ${limit}";
    return query($sql)->fetchAll();
}

function addData($table, $data)
{
    foreach ($data as $key => $value) {
        $data[$key] = "'" . $value . "'";
    }
    $cols = implode(",", array_keys($data));
    $values = implode(",", array_values($data));
    $sql = "INSERT INTO ${table} (${cols}) VALUES (${values})";
    return query($sql)->rowCount();
}
function addDataReturnId($table, $data)
{
    foreach ($data as $key => $value) {
        $data[$key] = "'" . $value . "'";
    }
    $cols = implode(",", array_keys($data));
    $values = implode(",", array_values($data));
    $sql = "INSERT INTO ${table} (${cols}) VALUES (${values})";
    return query_returnID($sql);
}

function updateData($table, $data, $where=[])
{
    foreach ($data as $key => $value) {
        $data[$key] = $key . "='" . $value . "'";
    }
    if($where==[]){
        $where=1;
    }else{
        foreach ($where as $key => $value) {
            $where[$key] = $key . "='" . $value . "'";
        }
    }
    $where = implode(" AND ", $where);
    $data = implode(",", $data);
    $sql = "UPDATE ${table} SET ${data} WHERE ${where}";
    return query($sql)->rowCount();
}

function deleteData($table, $where=[])
{
    if($where==[]){
        $where=1;
    }else{
        foreach ($where as $key => $value) {
            $where[$key] = $key . "='" . $value . "'";
        }
    }
    $where = implode(" AND ", $where);
    $sql = "DELETE FROM ${table} WHERE ${where}";
    return query($sql)->rowCount();
}

function query($sql)
{
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt;
}
function query_returnID($sql)
{
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $conn->lastInsertId();
}