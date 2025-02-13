<?php

namespace Root;


class Assets {

    public $text;

    public function __construct($langue, $db){

        $this->text = [];
        $this->langue = trim($langue, '/');
        $this->db = $db;

    }

    public function text($id){

        if (empty($this->langue)) {

            $t = $this->db->query("SELECT texte FROM texte WHERE id = ?", [$id])->fetch();

        } else {

            $t = $this->db->query("SELECT texte FROM textear WHERE id = ?", [$id])->fetch();
            
        }

        $this->text[$id] = ['id' => $id,'text' => $t->texte];

        return $t->texte;

    }

    public function usedText(){

        return $this->text;

    }

    public function pic($id){

        $img = $this->db->query("SELECT nameI FROM image WHERE idI = ?",[$id])->fetch();

        return $img->nameI;

    }

} 