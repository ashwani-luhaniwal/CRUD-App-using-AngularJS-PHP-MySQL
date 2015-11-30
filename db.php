<?php

include('config.php'); 

/**  Switch Case to Get Action from controller  **/

switch($_GET['action'])  {
    case 'add_user' :
            add_user();
            break;

    case 'get_users' :
            get_users();
            break;

    case 'edit_user' :
            edit_user();
            break;

    case 'delete_user' :              
            delete_user();
            break;

    case 'update_user' :
            update_user();
            break;
}


/**  Function to Add User  **/

function add_user() {
    $data = json_decode(file_get_contents("php://input"));
    // print_r($data);

    $full_name      = $data->full_name;
    $addr_first     = $data->addr_first;
    $addr_second    = $data->addr_second;
    $addr_third     = $data->addr_third;
    $postcode       = $data->postcode;
    $dob            = $data->dob;
    $email_addr     = $data->email_addr;
    $position       = $data->position;
    $authorized     = $data->authorized;
    $guid           = $data->guid;

    $query = "SELECT * FROM users WHERE email_addr='".sanitize($email_addr)."'";
    $result = mysql_query($query);
    $rowCount = mysql_num_rows($result);
    // echo $rowCount;

    if ($rowCount == 0) {
        $qry = 'INSERT INTO users (full_name,addr_first,addr_second,addr_third,postcode,dob,email_addr,position,authorized,guid) values ("' . sanitize($full_name) . '","' . sanitize($addr_first) . '","' . sanitize($addr_second) . '","'. sanitize($addr_third) . '","' . sanitize($postcode) .'","' . sanitize($dob) . '","' . sanitize($email_addr) . '","' . sanitize($position) . '","' . sanitize($authorized) .'","' . sanitize($guid) .'")';
        $qry_res = mysql_query($qry);
        echo "User has been Submitted Successfully";
    } else {
        echo "This User has Already been Added";
    }
    
    /*$qry = 'INSERT INTO users (full_name,addr_first,addr_second,addr_third,postcode,dob,email_addr,position,authorized,guid) values ("' . $full_name . '","' . $addr_first . '","' . $addr_second . '","'. $addr_third . '","' . $postcode .'","' . $dob . '","' . $email_addr . '","' . $position . '","' . $authorized .'","' . $guid .'")';
   
    $qry_res = mysql_query($qry);
    if ($qry_res) {
        $arr = array('msg' => "User Added Successfully!!!", 'error' => '');
        $jsn = json_encode($arr);
        // print_r($jsn);
    } 
    else {
        $arr = array('msg' => "", 'error' => 'Error In inserting record');
        $jsn = json_encode($arr);
        // print_r($jsn);
    }*/
}


/**  Function to Get All Users  **/

function get_users() {
    $GUID = $_GET['guid'];
    $qry = mysql_query("SELECT * from users WHERE guid='".sanitize($GUID) . "'");
    $data = array();
    while($rows = mysql_fetch_array($qry))
    {
        $data[] = array(
                    "id"            => $rows['id'],
                    "full_name"     => $rows['full_name'],
                    "addr_first"     => $rows['addr_first'],
                    "addr_second"    => $rows['addr_second'],
                    "addr_third" => $rows['addr_third'],
                    "postcode"      => $rows['postcode'],
                    "dob"           => $rows['dob'],
                    "email_addr"    => $rows['email_addr'],
                    "position"      => $rows['position'],
                    "authorized"    => $rows['authorized']
                    );
    }
    print_r(json_encode($data));
    return json_encode($data);  
}

/**  Function to Edit User  **/

function edit_user() {
    $data = json_decode(file_get_contents("php://input"));     
    $index = $data->user_index; 
    $qry = mysql_query('SELECT * from users WHERE id='.sanitize($index));
    $data = array();
    while($rows = mysql_fetch_array($qry))
    {
        $data[] = array(
                    "id"            =>  $rows['id'],
                    "full_name"     =>  $rows['full_name'],
                    "addr_first"     =>  $rows['addr_first'],
                    "addr_second"    =>  $rows['addr_second'],
                    "addr_third" =>  $rows['addr_third'],
                    "postcode"      => $rows['postcode'],
                    "dob"           => $rows['dob'],
                    "email_addr"    => $rows['email_addr'],
                    "position"      => $rows['position'],
                    "authorized"    => $rows['authorized']
                    );
    }
    print_r(json_encode($data));
    return json_encode($data);  
}


/**  Function to Delete User  **/

function delete_user() {
    $data = json_decode(file_get_contents("php://input"));     
    $index = $data->user_index;     
    //print_r($data)   ;
    $del = mysql_query("DELETE FROM users WHERE id = ".sanitize($index));
    if($del)
        return true;
    return false;     
}


/** Function to Update User **/

function update_user() {
    $data = json_decode(file_get_contents("php://input")); 
    $id             =   $data->id;
    $full_name     =   $data->full_name;    
    $addr_first      =   $data->addr_first;
    $addr_second     =   $data->addr_second;
    $addr_third  =   $data->addr_third;
    $postcode    = $data->postcode;
    $dob        = $data->dob;
    $email_addr = $data->email_addr;
    $position   = $data->position;
    $authorized = $data->authorized;
   // print_r($data);
    
    $qry = "UPDATE users set full_name='".sanitize($full_name)."',addr_first='".sanitize($addr_first)."',addr_second='".sanitize($addr_second)."',addr_third='".sanitize($addr_third)."',postcode='".sanitize($postcode)."',dob='".sanitize($dob)."',email_addr='".sanitize($email_addr)."',position='".sanitize($position)."',authorized='".sanitize($authorized)."' WHERE id=".sanitize($id);
  
    $qry_res = mysql_query($qry);
    if ($qry_res) {
        $arr = array('msg' => "User Updated Successfully!!!", 'error' => '');
        $jsn = json_encode($arr);
        // print_r($jsn);
    } else {
        $arr = array('msg' => "", 'error' => 'Error In Updating record');
        $jsn = json_encode($arr);
        // print_r($jsn);
    }
}

// function to strip unwanted characters from input data
function cleanInput($input) {
    $search = array(
        '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
        '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
        '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
        '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
    );
 
    $output = preg_replace($search, '', $input);
    $output = htmlentities($output);
    $output = preg_replace("/&#?[a-z0-9]+;/i","",$output);
    $output = str_replace(array("'", "\"", "&quot;"), "", htmlspecialchars($output) );
    return $output;
}

// function to send clean & sanitized input to SQL statements.
function sanitize($input) {
    if (is_array($input)) {
        foreach($input as $var=>$val) {
            $output[$var] = sanitize($val);
        }
    }
    else {
        if (get_magic_quotes_gpc()) {
            $input = stripslashes($input);
        }
        //$input = trim( htmlentities( strip_tags( $input,"," ) ) );
        $input  = cleanInput($input);
        $output = mysql_real_escape_string($input);
    }
    return $output;
}

?>