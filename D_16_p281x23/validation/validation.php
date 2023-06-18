<?php


function usernameValidation($u, $c)
{
    
    $query = "SELECT `username` FROM `users` WHERE `username` = '". $u ."';";
    $result = $c->query($query);
    $row = $result -> num_rows;
    if(empty($u))
    {
        return "Username cannot be blank !";
    }
    elseif(preg_match("/\s/",$u))
    {
        return "Username cannot contain space ! ";
    }
    elseif(strlen($u)<5 || strlen($u) > 25)
    {
        return "Username must be betweein 5 and 25 characters";
    }
    elseif($row > 0)
    {
        return "Username is reserved, please choose another one.";
    }
    else
    {
        return "";
    }
}


function passwordValidation($u)
{
    
    if(empty($u))
    {
        return "Password cannot be blank !";
    }
    elseif(preg_match("/\s/",$u))
    {
        return "Password cannot contain space ! ";
    }
    elseif(strlen($u)<5 || strlen($u) > 50)
    {
        return "Password must be betweein 5 and 50 characters";
    }
    else
    {
        return "";
    }
}

function nameValidation($n)
{
    $n = str_replace(" ", "", $n);
    if(empty($n))
    {
        return "Name cannot be empty";
    }
    elseif(strlen($n) > 50)
    {
        return "Name cannot contain more than 50 characters ";
    }
    else
    {
        return "";
    }
    // elseif(ctype_digit($n) == false || preg_match('/[a-zA-ZŠšĆćČčŽžŠš]/m', $n) == false)
    // {
    //     return "Name must contain only letters ";
    // } ovo je lose postavio
   

}   

function genderValidation($g)
{
    if($g != "m" && $g != 'z' && $g != 'o')
    {
        return "Unknow gender";
    }
    else
    {
        return "";
    }
}

function dobValidation($d)
{
    if($d < "1900/01/01")
    {
        return "Date of birth not valid";
    }
    else
    {
        return "";
    }
}

function profileExists($id, $conn)
{
    $q = "SELECT * FROM `profiles` WHERE `id_user` = $id";
    $result = $conn -> query($q);
    if($result-> num_rows == 0)
    {
        return false;
    }
    else
    {
        $row = $result -> fetch_assoc();
        return $row;
    }
}



?>