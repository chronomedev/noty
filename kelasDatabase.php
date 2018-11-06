<?php
    //Class for handling user input
    //2018 Hansrenee Willysandro
    //www webdesign and development
    class databaseLibrary{ 

        
        public function insertDatabase($koneksi, $namadpn, $namablkg, $password, $username){
            // try{
                $query = "insert into msuser(first_name, last_name, password, username)values(?,?,?,?)";
                $sqlCommand = $koneksi->prepare($query);
                $sqlCommand->execute([$namadpn, $namablkg, $password, $username]);

            // } catch (PDOException $e){
            //     echo "waduh gagal";
            // }
        }

        public function logInDatabase($koneksi, $username, $password){
            session_start();
            $eh;
            $query = "select id_user from msuser where username='$username' AND password='$password';";
            //$sqlCommand = $koneksi->prepare($query);
            //$sqlCommand->execute([$username, $password]);
            $hasil = $koneksi->query($query);
            while($eh = $hasil->fetch()){
                $a = $eh['id_user'];
            }
            if($a== null){
                echo "username atau passsword salah";
            } else {
                $_SESSION['passing_id'] = $a;
                echo "<script>window.location.assign('profiledit.php')</script>";
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