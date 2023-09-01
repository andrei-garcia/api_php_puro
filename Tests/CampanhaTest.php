<?php
use PHPUnit\Framework\TestCase;
use Api\Models\CampanhaModels;

class CampanhaTest  extends TestCase {

    public function testObtemCampanhas(){
        $campanha = new CampanhaModels();
        $ret = $campanha->select(null);
        $this->assertNotEmpty($ret);
    }

    public function testObtemCampanha(){
        $campanha = new CampanhaModels();
        $ret = $campanha->select(1);
        $this->assertNotEmpty($ret);
    }
}