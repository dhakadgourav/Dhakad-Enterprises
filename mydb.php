<?php


	$servername="localhost";
	$username="root";
	$password="";
	$dbname ="mydb";

	$conn= mysqli_connect($servername,$username,$password,$dbname);

if( !$conn)
{
	die("Server not formed" . mysql_connect_error());
}


$sql = "DELETE FROM users_g WHERE id=3";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

$sql= " insert into users_g(name,email,password) values ('gourav','dkdhfnfj@gmail.com','abc')";
$sql = "INSERT INTO users_g (name,email,password)
VALUES('John','john@example.com','tytu')";
$sql = "INSERT INTO users_g (name,email,password) VALUES ('Mary','mary@example.com','hii')";
$sql = "INSERT INTO users_g (name,email,password) VALUES ('Julie', 'julie@example.com','fgh')";


$sql="create table admin( username varchar(25) not null primary key, password varchar(30) not null)";
$sql = "INSERT INTO admin VALUES ('gourav','gourav@1996')";

$sql=" create table cus_users_new( username varchar(25) not null primary key,name varchar(30) not null,email varchar(30) not null,password varchar(30) not null,city varchar(30),mobilenumber bigint)";

$sql="insert into cus_users_new values('gourav17','gourav','h@gmail.com','12','der',7867564534)";
$sql=" create table supplier( supplier_id int not null primary key,
								name varchar(25) not null ,
								company_name varchar(25) not null,
								phone_no bigint,
								address text ,
								email_id varchar(40) not null)";

$sql = "INSERT INTO supplier VALUES (1,'Mohan','R&D', 9999992341,'36, J.M. road, Delhi', 'rnd@gmail.com')";
$sql = "INSERT INTO supplier VALUES (2,'Randy','TCS', 9994992341,'45, K.M. road, Delhi', 'tcs@gmail.com')";
$sql = "INSERT INTO supplier VALUES (3,'Makky','Infosys', 9992992341,'8, P.M. road, Delhi', 'infosys@gmail.com')";


$sql=" create table category(category_id int not null primary key,
								name varchar(25) not null,
								availability int not null )";

$sql = "INSERT INTO category VALUES (1,'Fans',2)";
$sql = "INSERT INTO category VALUES (2,'cooler',3)";



$sql=" create table product( product_id int not null primary key,
								name varchar(25) not null ,
								brand_name varchar(25) not null,
								unit_price int not null,
								color varchar(20) ,
								image longblob,
								supply_id int not null,
								categ_id int not null, 
								foreign key (supply_id) references supplier(supplier_id) on delete cascade on update cascade,
								foreign key (categ_id) references category(category_id) on delete cascade on update cascade 
								
								)";

$sql = "INSERT INTO product(product_id ,name  ,brand_name ,unit_price ,color  ,supply_id ,categ_id ) VALUES (1,'Philip_fan','delhi_rnd', 999,'blue', 1,1);";
$sql .= "INSERT INTO product(product_id ,name  ,brand_name ,unit_price ,color  ,supply_id ,categ_id ) VALUES (2,'Pendrive','Sandisk', 456,'red', 2,2);";
$sql .= "INSERT INTO product(product_id ,name  ,brand_name ,unit_price ,color  ,supply_id ,categ_id ) VALUES (3,'Model_x cooler','samphany', 2999,'blue', 3,2)";

$sql=" create table employee( emp_id int not null primary key,
								name varchar(25) not null ,
								gender varchar(5) not null,
								phone_no bigint,
								age int ,
								work_experience int ,
								account_no bigint not null,
								bank_name varchar(30) not null,	
								address text ,
								email_id varchar(40) not null)";


$sql = "INSERT INTO employee VALUES (1,'Henry','M',8787878787,18,2,23456789,'IIT-BHU','delhi_rnd blue road','henry@gmail.com');";
$sql .= "INSERT INTO employee VALUES (2,'Tina','F',9787878787,18,3,23456788,'IIT-BHU','mv_rnd vikas nagar','tina@gmail.com');";
$sql .= "INSERT INTO employee VALUES (3,'Randy','M',8787878785,28,6,23456785,'IIT-BHU','delhi_rnd tilak bavan','randy@gmail.com')";

$sql = "create table prod_cust_cart( cust_name varchar(25) not null,
									prod_id int not null,
									quantity int not null default 0,
									primary key (prod_id, cust_name),
									foreign key (prod_id) references product(product_id) on delete cascade on update cascade,
									foreign key (cust_name) references cus_users_new(username) on delete cascade on update cascade
											 )";


$sql = "INSERT INTO prod_cust_cart VALUES ('gourav17',2,4);";
$sql .= "INSERT INTO prod_cust_cart VALUES ('gourav17',1,1);";
$sql .= "INSERT INTO prod_cust_cart VALUES ('vishal',1,1);";
$sql .= "INSERT INTO prod_cust_cart VALUES ('vishal',1,2)";



$sql = "SELECT id, name, email FROM users_g";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["email"]. "<br>";
    }
} else {
    echo "0 results";
}
if(!mysqli_multi_query($conn,$sql))
{
	echo "Error creating table: " . mysqli_error($conn);
}
else{
	echo "Insert Done";
}

mysqli_close($conn);
?>