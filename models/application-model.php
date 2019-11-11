<?php

    class application {

        private  $clg_array = array();
        private  $disId; 
        private  $districts_array = array(); 

        function get_districts(){
            include "connect-db.php";
           
            $query = "SELECT * FROM `districts`;";
           
            $result = mysqli_query($con, $query);
           
            if (!mysqli_query($con, $query)){
                echo("Error description: " . mysqli_error($con));
            }

            $resultRows = mysqli_num_rows($result);

            if ($resultRows >=  0){
                while($row = mysqli_fetch_assoc($result)){
                    
                    $value = $row["distName"];
                    // $key = $row["distId"];
                    array_push($this->districts_array,$value);  
                    // echo $key;              
                }
            }
            return $this->districts_array;
        }


        function find_distId_from_distName($distName){
            include "connect-db.php";
           
            $query = "SELECT * FROM `districts` where distName = "."'$distName'"." ;";
           
            $result = mysqli_query($con, $query);
           
            if (!mysqli_query($con, $query)){
                echo("Error description: " . mysqli_error($con));
            }
    
            $resultRows = mysqli_num_rows($result);
    
            if ($resultRows >=  0){  
                $row = mysqli_fetch_assoc($result);
                $this->disId = $row["distId"];
            }
            echo $this->disId;
            return $this->disId;

        }

        function get_colleges_to_particular_districts($distName){

            $dist = $this->find_distId_from_distName($distName);

            include "connect-db.php";
           
            $query = "SELECT * FROM `colleges` where distId = $dist ;";
           
            $result = mysqli_query($con, $query);
           
            if (!mysqli_query($con, $query)){
                echo("Error description: " . mysqli_error($con));
            }
    
            $resultRows = mysqli_num_rows($result);
    
            if ($resultRows >=  0){

                while($row = mysqli_fetch_assoc($result)){
                    
                    $value = $row["collegeName"];
                    array_push($this->clg_array,$value);     
                           
                }
            }
            return $this->clg_array;
        }
    }



    // create an object of application class
    $app =new application ;
///////////////////////////////////////////////

    //used associative array like python dictionary
    // it will return the list of districts

    $districts_list1 = $app->get_districts(); 

    print_r($districts_list1[0]);



 ///////////////////////////////////////////////////////

    // it takes one parameter district name like ("peashawar")

    // $value = $app->find_distId_from_distName($list1[0]);



//////////////////////////////////////////////////


    // take one parameter (district ID) and reture all colleges in this district in list

    $list = $app->get_colleges_to_particular_districts("mardan"); 
    

    print_r($list);
    // echo $list[0];

////////////////////////////////////////////

    // acess the list item like same as c++ list[0]


?>