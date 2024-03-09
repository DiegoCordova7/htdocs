<?php
class SuperSaiyajin extends Saiyajin
{

    public string $clase = "Super Saiyajin";

    public function Transformacion()
    {

        if ($this->nivel_pelea >= 1500) {
            $texto = $this->nombre . " se transformo en " . $this->clase;
        } else {
            $texto = $this->nombre . " NO se transformo en " . $this->clase;
        }
        return $this->Transformacion() . " - " . $texto;
    }
}
