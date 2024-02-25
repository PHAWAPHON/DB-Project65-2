<?php 

class DB_con
{
    private $servername = "localhost";
    private  $username = "root";
    private $password = "";
    private $dbname = "dd";


    public $con;
    function __construct()
    {
        try {
            $this->con = new mysqli($this->servername,$this->username,$this->password,$this->dbname); 
           
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit();
        }


    }
    public function registration($email, $username, $password)
    {
        $check_username = $this->con->query("SELECT * From customer where username = '$username'");
        $check_email = $this->con->query("SELECT * From customer where email = '$email'");

        if ($check_username->num_rows > 0) {
            echo "<script> alert('Username already taken!!!!');</script>";
        } else if ($check_email->num_rows > 0) {
            echo "<script> alert('Email already taken!!!!');</script>";
        } else {
            $result = $this->con->prepare("INSERT INTO customer(email,username,password) values(?,?,?)");
            $result->bind_param("sss",$email,$username,$password);
            $result->execute();
            return $result;
           
        }
    }
    public function singIn($email, $password)
    {
        $stmt = $this->con->prepare("SELECT * FROM customer WHERE Email = ? and Password = ?");
        $stmt->bind_param("ss",$email,$password);
        $stmt->execute();
        $result = $stmt->get_result();
       
        return $result;
    }
    public function test_input($data){
        
            $data = strip_tags($data);
            $data = htmlspecialchars($data);
            $data = stripslashes($data);
            $data = trim($data);
            return $data;
        
    }
    public function message($content, $status) {
        return json_encode(['message' => $content, 'error' => $status]);
    }
    public function insertProduct($ProductName,$ProductID,$Name,$Stock,$Price,$Img){
        $result = $this->con->prepare("INSERT INTO product(ProductID,BrandID,categoryID,Stock,Price,Img) values(?,?,?,?,?,?)");
        $result->bind_param("ssssss",$ProductName,$ProductID,$Name,$Stock,$Price,$Img);
        $result->execute();
        return $result;

    }
    public function singIn_Admin($email, $password)
    {
        $stmt = $this->con->prepare("SELECT * FROM admins WHERE AdminUser = ? and AdminPass = ?");
        $stmt->bind_param("ss",$email,$password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

}

?>


