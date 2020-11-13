<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=dl_yeahboy', 'root', '');
} catch (PDOException $e) {
    $e->getMessage();
}

function authorization($login, $password)
{
    global $conn;
    try {
        $query = $conn->prepare("select * from students where login = :login and password = :password;");
        $query->execute(array("login" => $login,
            "password" => $password));
        $result = $query->fetch();
        return $result;
    } catch (Exception $e) {
        $e->getMessage();
    }
    return null;
}

function getStudentByID($id)
{
    global $conn;
    try {
//        $query = $conn->prepare("select * from students where id= :idshka");
        $query = $conn->prepare("select s.id, s.name, s.surname, s.birthday, s.phoneNumber, s.email, s.speciality,s.group_id, g.group_name from students s, `groups` g where s.group_id = g.id and s.id = :idshka");
        $query->execute(array("idshka" => $id));
        $result = $query->fetch();
        return $result;

    } catch (Exception $e) {
        $e->getMessage();
    }
    return null;
}

function getAllSubjectsByID($id)
{
    global $conn;
    try {
        $query = $conn->prepare("select s.nameOfSubject, s.credit, s.code, tc.name, tc.surname
from subjects s,
     students st,
     `groups` g,
     groupsubjects gj,
     teach t, teachers tc
where st.group_id = g.id
  and gj.group_id = g.id
  and gj.teach_id = t.id
    and t.subject_id = s.id
  and t.teacher_id = tc.id
and st.id = :idshka");
        $query->execute(array("idshka" => $id));
        $result = $query->fetchAll();
        return $result;

    } catch (Exception $e) {
        $e->getMessage();
    }
    return null;

}

function getAllTeachers()
{
    global $conn;
    try {
        $query = $conn->prepare("select * from teachers");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    } catch (Exception $e) {
        $e->getMessage();
    }
    return null;
}

function getAllSubjects()
{
    global $conn;
    try {
        $query = $conn->prepare("select * from subjects");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    } catch (Exception $e) {
        $e->getMessage();
    }
    return null;
}

function getAllGroups()
{
    global $conn;
    try {
        $query = $conn->prepare("select * from `groups`");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    } catch (Exception $e) {
        $e->getMessage();
    }
    return null;
}

function getAllStudents()
{
    global $conn;
    try {
        $query = $conn->prepare("select s.id, s.name, s.surname, s.birthday, s.phoneNumber, s.email, s.speciality, s.group_id, g.group_name from students s, `groups` g where s.group_id=g.id;");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    } catch (Exception $e) {
        $e->getMessage();
    }
    return null;
}

function addStudent($name, $surname, $birthd, $phNum, $email, $spec, $grId, $login, $pass)
{
    global $connection;
    try {
        $query = $connection->prepare("INSERT INTO students (id,name,surname,birthday,phoneNumber,email,speciality,group_id,login,password) 
                                                VALUES (null, :n,:sur,CAST('" . $birthd . "' as Date),:ph,:email,:spec,:gr,:log,:paswd) ");

        $query->execute(
            array(
                "n" => $name,
                "sur" => $surname,
                "ph" => $phNum,
                "email" => $email,
                "spec" => $spec,
                "gr" => $grId,
                "log" => $login,
                "paswd" => $pass
            )
        );
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

function addTeacher($name, $surname, $email, $level)
{
    global $conn;
    try {
        $query = $conn->prepare(("insert into teachers(id, name,surname, email, level) values (null, :n,:sur, :em, :l)"));
        $query->execute(array("n" => $name, "sur" => $surname, "em" => $email, "l" => $level));
    } catch (PDOException $e) {
        $e->getMessage();
    }
}


function addSubject($name, $credit, $code)
{
    global $conn;
    try {
        $query = $conn->prepare(("insert into subjects(id, nameOfSubject, credit, code) values (null, :n,:cr, :cd)"));
        $query->execute(array("n" => $name, "cr" => $credit, "cd" => $code));
    } catch (PDOException $e) {
        $e->getMessage();
    }
}

function addTeach($teacherID, $subjID)
{
    global $conn;
    try {
        $query = $conn->prepare("insert into teach(id, teacher_id, subject_id) values (null,:t, :s)");
        $query->execute(array(
            "t" => $teacherID,
            "s" => $subjID
        ));
    } catch (Exception $e) {
        $e->getMessage();
    }
}

function getAllTeach()
{
    global $conn;
    try {
        $query = $conn->prepare("select tch.id,t.id as teacherID, s.id as subID, t.name, t.surname, s.nameOfSubject 
                                            from teachers t, subjects s, teach tch where tch.teacher_id=t.id and tch.subject_id=s.id  
                                            order by tch.id asc");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    } catch (Exception $e) {
        $e->getMessage();
    }
    return null;
}

function getTeacherById($id)
{
    global $conn;
    try {
        $query = $conn->prepare("select * from teachers where id = :id");
        $query->execute(array("id" => $id));
        $result = $query->fetch();
        return $result;
    } catch (Exception $e) {
        $e->getMessage();
    }
    return null;
}

function getSubjectById($id)
{
    global $conn;
    try {
        $query = $conn->prepare("select * from subjects where id = :id");
        $query->execute(array("id" => $id));
        $result = $query->fetch();
        return $result;
    } catch (Exception $e) {
        $e->getMessage();
    }
    return null;
}

//function getStudentById($id)
//{
//    global $conn;
//    try {
//        $query = $conn->prepare("select * from subjects where id = :id");
//        $query->execute(array("id" => $id));
//        $result = $query->fetch();
//        return $result;
//    } catch (Exception $e) {
//        $e->getMessage();
//    }
//    return null;
//}

function getTeachById($id)
{
    global $conn;
    try {
        $query = $conn->prepare("select tch.id, t.id, s.id, t.name, t.surname, s.nameOfSubject from teachers t, subjects s, teach tch where tch.subject_id=s.id and tch.teacher_id=t.id and tch.id = :id");
        $query->execute(array("id" => $id));
        $result = $query->fetch();
        return $result;
    } catch (Exception $e) {
        $e->getMessage();
    }
    return null;
}

function deleteTeacher($id)
{
    global $conn;
    try {
        $query = $conn->prepare("delete from teachers where id = :id");
        $query->execute(array("id" => $id));
//        $result = $query->fetch();
        return true;
    } catch (Exception $e) {
        $e->getMessage();
    }
    return false;
}

function getSubjById($id)
{
    global $conn;
    try {
        $query = $conn->prepare("select * from subjects where id = :id");
        $query->execute(array("id" => $id));
        $result = $query->fetch();
        return $result;
    } catch (Exception $e) {
        $e->getMessage();
    }
    return null;
}
