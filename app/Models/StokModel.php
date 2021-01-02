<?php

namespace App\Models;

use CodeIgniter\Model;

class StokModel extends Model
 {
     public function all_data()
     {
         return $this->db->table('tbl_stok')
        ->join('tbl_produk','tbl_produk.id_produk = tbl_stok.id_produk','left')
        ->orderBy('id_stok', 'DESC')
         ->get()
         ->getResultArray();
     }

     public function add($data)
     {
         $this->db->table('tbl_stok')->insert($data);
     }

     public function edit($data, $id_stok)
    {
        return $this->db->table('tbl_stok')
        ->update($data, array('id_stok' => $id_stok));
    }

     public function delete_data($id_stok)
     {
        return $this->db->table('tbl_stok')->delete(array('id_stok' => $id_stok));
     }


 }
