<?php

namespace App\Models;

use App\Core\Model;

class User extends Model
{

      public function show()
      {
            $query = "SELECT * FROM tb_users";
            $stmt = $this->db->prepare($query);
            $stmt->execute();

            return $this->selects($stmt);
      }

      public function save()
      {
            $email = $_POST['user_email']; 
            $password = $_POST['user_password'];
            $full_nama = $_POST['user_nama'];
            $alamat = $_POST['user_alamat']; 
            $hp = $_POST['user_hp']; 
            $pos = $_POST['user_pos']; 
            $role = $_POST['user_role']; 
            $aktif = $_POST['user_aktif']; 

            $sql = "INSERT INTO tb_users
            SET user_email=:user_email, user_password=PASSWORD(:user_password), user_nama=:user_nama, user_alamat=:user_alamat, user_hp=:user_hp,
            user_pos=:user_pos, user_role=:user_role, user_aktif=:user_aktif"; 
            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(":user_email", $email);
            $stmt->bindParam(":user_password", $password);
            $stmt->bindParam(":user_nama", $full_nama);
            $stmt->bindParam(":user_alamat", $alamat);
            $stmt->bindParam(":user_hp", $hp);
            $stmt->bindParam(":user_pos", $pos);
            $stmt->bindParam(":user_role", $role);
            $stmt->bindParam(":user_aktif", $aktif);


            $stmt->execute();
      }

      public function edit($id)
      {
            $query = "SELECT * FROM tb_users WHERE user_id=:user_id";
            $stmt = $this->db->prepare($query);

            $stmt->bindParam(":user_id", $id);
            $stmt->execute();

            return $this->select($stmt);
      }

      public function update()
      {
          $email = $_POST['email'];
          $password = $_POST['password'];
          $full_nama = $_POST['user_nama'];
          $alamat = $_POST['user_alamat'];
          $hp = $_POST['user_hp'];
          $pos = $_POST['user_pos'];
          $role = $_POST['user_role'];
          $aktif = $_POST['user_aktif'];
          $id = $_POST['user_id'];
      
          if (!empty(trim($password))) {
              $sql = "UPDATE tb_users
                  SET user_email=:user_email, user_password=PASSWORD(:user_password), user_nama=:user_nama, user_alamat=:user_alamat, 
                  user_hp=:user_hp, user_pos=:user_pos, user_role=:user_role, user_aktif=:user_aktif WHERE user_id=:user_id";
          } else {
              $sql = "UPDATE tb_users
                  SET user_email=:user_email, user_nama=:user_nama, user_alamat=:user_alamat, user_hp=:user_hp,
                  user_pos=:user_pos, user_role=:user_role, user_aktif=:user_aktif WHERE user_id=:user_id";
          }
      
          $stmt = $this->db->prepare($sql);
      
          $stmt->bindParam(":user_email", $email);
          if (!empty(trim($password))) {
              $stmt->bindParam(":user_password", $password);
          }
          $stmt->bindParam(":user_nama", $full_nama);
          $stmt->bindParam(":user_alamat", $alamat);
          $stmt->bindParam(":user_hp", $hp);
          $stmt->bindParam(":user_pos", $pos);
          $stmt->bindParam(":user_role", $role);
          $stmt->bindParam(":user_aktif", $aktif);
          $stmt->bindParam(":user_id", $id);
      
          $stmt->execute();
      }
      

      public function delete($id)
      {
            $sql = "DELETE FROM tb_users WHERE user_id=:user_id";
            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(":user_id", $id);
            $stmt->execute();
      }
}
