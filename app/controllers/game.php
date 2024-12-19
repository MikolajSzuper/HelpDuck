<?php
class Game extends Controller {
    public function index()
    {
        $this->view(view: 'game/index');
    }
}
?>