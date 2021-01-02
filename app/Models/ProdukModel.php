<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
 {
     public function all_data()
     {
         return $this->db->table('tbl_produk')
         ->join('tbl_kategori','tbl_kategori.id_kategori = tbl_produk.id_kategori','left')
         ->orderBy('id_produk', 'DESC')
         ->get()
         ->getResultArray();
     }
     
     public function detail_data($id_produk)
     {
         return $this->db->table('tbl_produk')
         ->join('tbl_kategori','tbl_kategori.id_kategori = tbl_produk.id_kategori','left')
         ->where('id_produk', $id_produk)
         ->get()
         ->getRowArray();
           
     }

     public function add($data)
     {
         $this->db->table('tbl_produk')->insert($data);
     }

     public function edit($data)
     {
         $this->db->table('tbl_produk')
         ->where('id_produk', $data['id_produk'])
         ->update($data);
     }

     public function delete_data($data)
     {
         $this->db->table('tbl_produk')
         ->where('id_produk', $data['id_produk'])
         ->delete($data);
     }


 }
