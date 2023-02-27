<?php 

// object oriented so class banako
class Model{

    protected $conn = '';
    protected $servername = "localhost";
    protected $username = "root";
    protected $pass = "";
    protected $db = "learncore";

    // object banauda afai call vayerw value assign hos vanerw constructor use garne.
    function __construct()
    {
        mysqli_report(MYSQLI_REPORT_STRICT);

        try{
            $this->conn = new mysqli($this->servername,$this->username,$this->pass,$this->db);
        }
        catch(Exception $ex){
            echo "Connection Error ". $ex->getMessage();
        }
    }

    function insert_data($tblname,$data){
        // insert into tbls (cols) values (vals); 

        $cols = implode(",",array_keys($data));
        $vals = implode("','",array_values($data));
        $sql = "insert into $tblname ($cols) values ('$vals')";
        
        $insertExc = $this->conn->query($sql);
        if($insertExc){
            $response['data']=null;
            $response['code']=true;
            $response['message']= "data inserted sucessfully";
        }
        else{
            $response['data']=null;
            $response['code']=false;
            $response['message']= "data failed to insert";
        }
        return $response;
    }

    function login($email, $pass){
        // select * from [users] where [email = 'dta'];                 pass verify so yeha no pass as we cant generate same!!
        $sql = "select * from users where email = '$email'";
        $loged = $this->conn->query($sql);
        $test = $loged->fetch_object();

        if ($loged->num_rows > 0 && password_verify($pass, $test->pass)){
            $response['data']= $test;
            $response['code']=true;
            $response['message']= "login sucessfully";

        }else{
            $response['data']=null;
            $response['code']=false;
            $response['message']= "login failed";
        }
        return $response;
    }

    function selectdata(string $tblname,array $where=[]){
        // select * from TBLNAME where id = '1' and fname = 'hari' .....
        
        $sql = "SELECT * FROM $tblname";
        if(!empty($where)){
            $sql .= " WHERE";
            foreach($where as $key => $value){
                $sql .= " $key = '$value' AND"; 
            }
            $sql = rtrim($sql, 'AND');
        }
        $selEx = $this->conn->query($sql);

        if($selEx->num_rows > 0){
            while($data = $selEx->fetch_object()){
                $users[]=$data;
            }

            $response['data']=$users;
            $response['code']=true;
            $response['message']= "data got sucessfully";

        }
        else{
            $response['data']= [];
            $response['code']=false;
            $response['message']= "data retrieve failed!";
        }
        return $response;
    }

    function updatedata($tblname, $data, $where){
        // update [table] [cols] values [val];
                    
        $sql = 'update users set ';  //initial query ! 
        foreach($data as $key => $value){
            $sql .= $key. '='. "'$value' ,";
        }
    
        $sql = rtrim($sql,',');
        $sql .= 'where';

        foreach($where as $key => $value){
            $sql .= " $key = '$value' and";
        }
        $sql = rtrim($sql,'and');

        return $updateEx = $this->conn->query($sql);
    }

    function delete_data($tblname, $where){
        // delete from table where id = 1

        $sql = "DELETE FROM $tblname WHERE";
        foreach($where as $key => $value){
            $sql .= " $key = '$value'";
        }

        return $this->conn->query($sql);
    }
    
}


?>