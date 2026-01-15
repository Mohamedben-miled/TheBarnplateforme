<?php

class Partner extends BaseModel {
    protected $table = 'partners';

    public function getAllPartners() {
        $sql = "SELECT p.*, u.first_name as creator_first_name, u.last_name as creator_last_name
                FROM partners p
                LEFT JOIN users u ON p.created_by = u.id
                ORDER BY p.created_at DESC";
        return $this->db->fetchAll($sql);
    }

    public function getPartnersByType($type) {
        return $this->findAll(['type' => $type], 'name ASC');
    }
}

