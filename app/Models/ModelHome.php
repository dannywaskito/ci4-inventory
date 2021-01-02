<?php
namespace App\Models;
use CodeIgniter\Model;

class ModelHome extends Model
 {

        public function total_kategori()

        {
            return $this->db->table('tbl_kategori')->countAll();
        }

        public function total_produk()
        
        {
            return $this->db->table('tbl_produk')->countAll();
        }

        public function total_stok()
        
        {
            return $this->db->table('tbl_stok')->countAll();
        }

 }