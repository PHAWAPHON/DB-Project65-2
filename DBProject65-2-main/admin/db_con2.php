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


// Sense Admin
    public function updateAdmin($AdminID,$username,$password)
    {
       
        $result = $this->con->prepare("UPDATE admins SET 
            AdminUser=?, 
            AdminPass=?
            WHERE AdminID=?");
        $result->bind_param("ssi",$username,$password,$AdminID);
        $result->execute();
        return true;

    }
    public function insertAdmin($username,$password)
    {
        $result = $this->con->prepare("INSERT INTO admins(AdminPass,AdminUser) values(?,?)");
        $result->bind_param("ss",$password,$username);
        $result->execute();
        return $result;

    }
    public function deleteAdmin($AdminID)
    {
        try{
            $stmt=$this->con->prepare("DELETE FROM admins WHERE AdminID=?");
            $stmt->bind_param("s",$AdminID);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }

    }
// Kuk Product
    public function insertProduct($Name,$BrandID,$categoryID,$Stock,$Price,$Img,$Description){
        $result = $this->con->prepare("INSERT INTO product(Name,BrandID,categoryID,Stock,Price,Img,Description) values(?,?,?,?,?,?,?)");
        $result->bind_param("sssssss",$Name,$BrandID,$categoryID,$Stock,$Price,$Img,$Description);
        $result->execute();
        return $result;
    }
    
    public function delete($id){
        try{
            $stmt=$this->con->prepare("DELETE FROM product WHERE ProductID=?");
            $stmt->bind_param("s",$id);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function updateProduct($Name,$BrandID,$categoryID,$Stock,$Price,$Img,$Description,$ProductID){
        $result = $this->con->prepare("UPDATE product SET 
            Name=?,
            BrandID=?, 
            categoryID=?, 
            Stock=?, 
            Price=?, 
            Img=?,
            Description=?
            WHERE ProductID=?");
        $result->bind_param("ssssssss",$Name,$BrandID,$categoryID,$Stock,$Price,$Img,$Description,$ProductID);
        $result->execute();
        return true;
    }
// Narn User
    public function insertUser($username,$password,$email)
    {
        $result = $this->con->prepare("INSERT INTO customer(username,Password,Email) values(?,?,?)");
        $result->bind_param("sss",$username,$password,$email);
        $result->execute();
        return $result;

    }
    public function deleteUser($CustomerID){
        try{
            $stmt=$this->con->prepare("DELETE FROM customer WHERE CustomerID=?");
            $stmt->bind_param("s",$CustomerID);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    public function updateUser($CustomerID,$username,$password,$email)
    {
       
        $result = $this->con->prepare("UPDATE customer SET 
            username=?, 
            Password=?, 
            Email=?
            WHERE CustomerID=?");
        $result->bind_param("sssi",$username,$password,$email,$CustomerID);
        $result->execute();
        return true;

    }
//Yean Transaction
    public function confirm($TransactionID){
        $result = $this->con->prepare("UPDATE transactions SET Status='2' WHERE TransactionID=?");
        $result->bind_param("s",$TransactionID);
        $result->execute();
        return true;
    }
    public function deleteTrans($TransactionID)
    {
        try{
            $stmt=$this->con->prepare("DELETE FROM transactions WHERE TransactionID=?");
            $stmt->bind_param("s",$TransactionID);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }

    }


// Ploy category , brand


    public function updateCate($Name,$categoryID){
        $result = $this->con->prepare("UPDATE category SET Name=? WHERE categoryID=?");
        $result->bind_param("ss",$Name,$categoryID);
        $result->execute();
        return true;
    }

    public function insertCategory($Name){
        $result = $this->con->prepare("INSERT INTO category(Name) values(?)");
        $result->bind_param("s",$Name);
        $result->execute();
        return $result;
    }

    public function deleteCate($categoryID){
        try{
            $stmt=$this->con->prepare("DELETE FROM category WHERE categoryID=?");
            $stmt->bind_param("s",$categoryID);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function updateBrand($BrandName,$BrandID){
        $result = $this->con->prepare("UPDATE brands SET BrandName=? WHERE BrandID=?");
        $result->bind_param("ss",$BrandName,$BrandID);
        $result->execute();
        return true;
    }

    public function deleteBrand($BrandID){
        try{
            $stmt=$this->con->prepare("DELETE FROM brands WHERE BrandID=?");
            $stmt->bind_param("s",$BrandID);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    public function insertBrand($BrandName)
    {
        $result = $this->con->prepare("INSERT INTO Brands(BrandName) values(?)");
        $result->bind_param("s",$BrandName);
        $result->execute();
        return $result;
    }
}
