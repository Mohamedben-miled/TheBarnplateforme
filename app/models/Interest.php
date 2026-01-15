<?php

class Interest extends BaseModel {
    protected $table = 'interests';

    public function getAll() {
        return $this->findAll([], 'name ASC');
    }
}

