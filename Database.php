<?php
Class Database
{
    public function connect()
    {
        $mysqli = new mysqli("localhost","root","","super_market");
        return $mysqli;
    }
}