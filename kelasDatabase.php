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

        public function noteSearch($koneksi, $id_kategori, $nama_note){
            $query = $koneksi->query("select id_note, note_content, tanggal from msnote where id_kategori='$id_kategori' and nama='$nama_note';");
            
            while($tampung = $query->fetch()){
                $note_property = array(
                    "id_note" => $tampung['id_note'],
                    "note_content" => $tampung['note_content'],
                    "tanggal" => $tampung['tanggal']
                );
            }
            return $note_property;
        }

        public function getAllCategory($koneksi, $id_user){
            $query= $koneksi->query("select id_category from mscategory where id_user=$id_user");
            $tampung_kategori = array();
            $i = 0;
            while($tampung = $query->fetch()){
                $tampung_kategori[$i] = $tampung['id_category'];
                $i++;
            }
            if(!isset($tampung_kategori)){
                $tampung_kategori = null;
            }

            return $tampung_kategori;
        }
        
        public function getLastNote($koneksi, $id_kategori){
            $tampung_id;
            $query = $koneksi->query("select id_note from msnote where id_category='$id_kategori';");
            $i = 0;
            while($tampung=$query->fetch()){
                $tampung_id[$i] = $tampung['id_note'];
                $i++;
            } 
            echo var_dump($tampung_id);
            
            if(!isset($tampung_id)){
                return 1;
            } else {
                $ambil_id_terbesar = $tampung_id[count($tampung_id)-1];
                echo var_dump($ambil_id_terbesar)."<br>";
                $pecah = explode("-", $ambil_id_terbesar);
                echo var_dump($pecah)."<br>";
                //$append = $pecah[count($pecah)-2].$pecah[count($pecah)-1];
                $konversiNomor = (int)$pecah[2];
                echo var_dump($konversiNomor);
                return $konversiNomor+1;
                //return $append+1;
            }
            
        }

        public function getFirstCategory($koneksi, $id_user){
            $query = $koneksi->query("select id_category from mscategory where  id_user=$id_user;");

            $tampung_id_Category;
            $i=0;
            while($tampung = $query->fetch()){
                $tampung_id_Category[$i] = $tampung['id_category'];
                $i++;
            }

            if(isset($tampung_id_Category)){
                return $tampung_id_Category[0];

            } else {
                return null;
            }
            
    }

        public function getLastCategory($koneksi, $id_user){
            $query = $koneksi->query("select id_category from mscategory where id_user = $id_user");

            $tampung_id_category;
            $i=0;
            while($tampung = $query->fetch()){
                $tampung_id_category[$i] = $tampung['id_category'];
                $i++;
            }
            if(isset($tampung_id_category)){
                $ambil_terbesar = $tampung_id_category[count($tampung_id_category)-1];
                 $pecah = explode("-", $ambil_terbesar);
                //$append = $pecah[count($pecah)-2].$pecah[count($pecah)-1];

                $konversi_angka = (int)$ambil_terbesar[1];
                echo var_dump($konversi_angka);
             return $konversi_angka+1;

            } else {
                return 1;
            }
            
            
        }

        public function matchOldPassword($koneksi, $old_password, $id_user){
            $query = $koneksi->prepare("select password from msuser where id_user =?");
            $query->execute([$id_user]);
            while($tampung = $query->fetch()){
                if($tampung['password'] == $old_password){
                    return true;
                }
            }
            return false;
        }

        public function unchiper($chipertext){
            $alfabet = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j',
            'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't',
                'u', 'v', 'w', 'x', 'y', 'z');
        
            $karakterSwitch = array('z', 'y', 'x', 'w', 'v', 'u', 't', 's', 'r', 'q',
                'p', 'o', 'n', 'm', 'l', 'k', 'j', 'i', 'h', 'g',
                'f', 'e', 'd', 'c', 'b', 'a');

            $append ="";
            $pecah = str_split($chipertext);
            for($i=0;$i<count($pecah);$i++){
                for($z=0;$z<count($karakterSwitch);$z++){
                    if($pecah[$i]== $karakterSwitch[$z]){
                        $append = $append.$alfabet[$z];
                    }
                }
            }
            return $append;
        }

        public function insertNote($koneksi, $id_note, $judul_note, $isi_note, $tanggal_note, $id_kategori, $foto){
            $query = $koneksi->prepare("insert into msnote(id_note, nama, note_content, tanggal, id_category, foto)values(?,?,?,?,?,?);");
            $query->execute([$id_note, $judul_note, $isi_note, $tanggal_note, $id_kategori, $foto]);
        }

        public function insertCategory($koneksi, $id_category, $category_name, $id_user){
            $query = $koneksi->prepare("insert into mscategory(id_category, category_name, id_user)values(?,?,?);");
            $query->execute([$id_category, $category_name, $id_user]);
        }

        public function displayNotes($koneksi, $id_note){
           
            $query = $koneksi->query("select nama, note_content, tanggal, foto from msnote where id_note ='$id_note'");
            while($tampung = $query->fetch()){
                $noteProperties = array(
                    "id_note" => $id_note,
                     "nama"=> $tampung['nama'],
                     "note_content" => $tampung['note_content'],
                     "tanggal" => $tampung['tanggal'],
                     "foto" => $tampung['foto']
                );
            }
            return $noteProperties;
        }

        public function deleteNotes($koneksi, $id_note){
            $query = $koneksi->prepare("delete from msnote where id_note = ?");
            $query->execute([$id_note]);
        }

        public function deleteCategory($koneksi, $id_category){
            $this->deleteAllNotes($koneksi, $id_category);
            $query = $koneksi->prepare("delete from mscategory where id_category=?");
            $query->execute([$id_category]);
        }

        public function deleteAllNotes($koneksi, $id_category){
            $query = $koneksi->prepare("delete from msnote where id_category =?");
            $query->execute([$id_category]);
        }

        public function updateCategory($koneksi, $id_category, $nama_baru_kategori){
            $query = $koneksi->prepare("update mscategory set category_name=? where id_category = ?");
            $query->execute([$nama_baru_kategori, $id_category]);
        }

        public function updateNote($koneksi, $id_note, $name, $note_content, $tanggal, $foto){
            if($foto == null){
                $query = $koneksi->prepare("update msnote set nama=?, note_content =?, tanggal=? where id_note = ?");
                $query->execute([$name, $note_content, $tanggal, $id_note]);
            } else {
                $query = $koneksi->prepare("update msnote set nama=?, note_content =?, tanggal=?, foto=? where id_note = ?");
                $query->execute([$name, $note_content, $tanggal, $foto, $id_note]);
            }
            
        }



        public function logInDatabase($koneksi, $username, $password){
            session_start();
            $query = "select id_user, first_name from msuser where username='$username' AND password='$password';";
            //$sqlCommand = $koneksi->prepare($query);
            //$sqlCommand->execute([$username, $password]);
            
            $hasil = $koneksi->query($query);
            // var_dump($hasil);
            $tampung;
            while($tampung = $hasil->fetch()){
                $a = $tampung['id_user'];
                $b = $tampung['first_name'];
                
            }
            if($a== null){
                echo "username atau passsword salah";
            } else {
                $_SESSION['passing_id'] = $a;
                $_SESSION['first_name'] = $b;
                $_SESSION['passing_kategori_awal'] = $this->getFirstCategory($koneksi, $a);
                $categoryID_parameter = $this->getFirstCategory($koneksi, $a);
                //echo "<script>window.location.assign('profiledit.php')</script>";
                echo "<script>window.location.assign('dashboard.php?ctg=$categoryID_parameter')</script>";
            }

        }


        public function displayUserDetails($koneksi, $id, $instruksi){
            if($instruksi == "low"){
                $query = "select first_name from msuser where id_user = '$id';";
            } else {
                $query = "select first_name, last_name, username, foto from msuser where id_user = '$id';";
                $hasil = $koneksi->query($query);
                $nama;
                 while($user_details = $hasil->fetch()){
                    $user = array("NamaDepan"=>$user_details['first_name'], 
                    "NamaBelakang"=>$user_details['last_name'], 
                    "Username"=>$user_details['username'],
                    "foto_user" =>$user_details['foto']);
                }
                return $user;
            }

        }

        
        public function updateUser($koneksi, $id_user, $first_name, $last_name, $password, $foto){

            if($foto == null && $password==null){
                $query = $koneksi->prepare("update msuser set first_name=?, last_name =? where id_user=?;");
                $query->execute([$first_name, $last_name, $id_user]);
                return "masuk 1";

            } else if($password == null) {

                $query = $koneksi->prepare("update msuser set first_name=?, last_name =?, foto=? where id_user=?;");
                $query->execute([$first_name, $last_name, $foto, $id_user]);
                return "masuk2";

            } else if($foto == null) {
                $query = $koneksi->prepare("update msuser set first_name=?, last_name =?, password = ? where id_user=?;");
                $query->execute([$first_name, $last_name, $password, $id_user]);
                return "masuk3";
            } else{
                $query = $koneksi->prepare("update msuser set first_name=?, last_name =?, password = ?, foto=? where id_user=?;");
                $query->execute([$first_name, $last_name, $password, $foto, $id_user]);
                return "masuk4";
            }

        }

    }
?>