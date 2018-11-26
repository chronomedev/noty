<?php
    //Class for handling user input
    //2018 Hansrenee Willysandro
    //www webdesign and development
    class databaseLibrary{ 

        
        public function insertDatabase($koneksi, $namadpn, $namablkg, $password, $username){
            // try{
                $query = "insert into msuser(first_name, last_name, password, username, foto)values(?,?,?,?,?)";
                $sqlCommand = $koneksi->prepare($query);
                $sqlCommand->execute([$namadpn, $namablkg, $password, $username, "ehhh"]);

            // } catch (PDOException $e){
            //     echo "waduh gagal";
            // }
        }

        public function logInDatabase($koneksi, $username, $password){
            session_start();
            $query = "select id_user, first_name from msuser where username='$username' AND password='$password';";
            //$sqlCommand = $koneksi->prepare($query);
            //$sqlCommand->execute([$username, $password]);
            
            $hasil = $koneksi->query($query);
            // var_dump($hasil);
            while($tampung = $hasil->fetch()){
                $a = $tampung['id_user'];
                $b = $tampung['first_name'];
                
            }
            if($a== null){
                echo "username atau passsword salah";
            } else {
                $_SESSION['passing_id'] = $a;
                $_SESSION['first_name'] = $b;
                $_SESSION['passing_pilihan_kategori'] = 'K'.$a.'01';
                $categoryID_parameter = 'K'.$a.'01';
                //echo "<script>window.location.assign('profiledit.php')</script>";
                echo "<script>window.location.assign('dashboard.php?ctg=$categoryID_parameter')</script>";
            }
            // if($hasil->fetch()==null){
            //     echo "username atau password salah";
            // } else {
                
            // }
        }
        

        public function displayUserDetails($koneksi, $id, $instruksi){
            if($instruksi == "low"){
                $query = "select first_name from msuser where id_user = '$id';";
            } else {
                $query = "select first_name, last_name, username from msuser where id_user = '$id';";
                $hasil = $koneksi->query($query);
                $nama;
                 while($user_details = $hasil->fetch()){
                    $user = array("NamaDepan"=>$user_details['first_name'], "NamaBelakang"=>$user_details['last_name'], "Username"=>$user_details['username']);
                }
                return $user;
            }

        }

    }
?>