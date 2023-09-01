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
        $ret = $campanha->select(5);
        $this->assertNotEmpty($ret);
    }


    public function testDeleteCampanha(){
        $campanha = new CampanhaModels();
        $ret = $campanha->delete(6);
        $this->assertEquals("campanha removida com sucesso",$ret);
    }
}