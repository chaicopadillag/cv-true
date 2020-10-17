<?php
class Ayudas
{
    public static function SubirImagenServidor($foto, $ruta, $ancho_nuevo = 1200, $alto_nuevo = 764)
    {
        $aletoria                    = mt_rand(1, 9999);
        $img                         = $ruta . $aletoria . "." . $foto->guessExtension();
        list($ancho_org, $alto_orig) = getimagesize($foto);
        if ($foto->guessExtension() == 'jpeg') {
            $img_old = imagecreatefromjpeg($foto);
            $img_new = imagecreatetruecolor($ancho_nuevo, $alto_nuevo);
            imagecopyresampled($img_new, $img_old, 0, 0, 0, 0, $ancho_nuevo, $alto_nuevo, $ancho_org, $alto_orig);
            imagejpeg($img_new, $img);
        }
        if ($foto->guessExtension() == "png") {
            $img_old = imagecreatefrompng($foto);
            $img_new = imagecreatetruecolor($ancho_nuevo, $alto_nuevo);
            imagealphablending($img_new, false);
            imagesavealpha($img_new, true);
            imagecopyresampled($img_new, $img_old, 0, 0, 0, 0, $ancho_nuevo, $alto_nuevo, $ancho_org, $alto_orig);
            imagepng($img_new, $img);
        }
        return $img;
    }
}
