<?php


namespace Aplikacja;


class myIMagick
{
    private function autoRotateImage($image) {
        $orientation = $image->getImageOrientation();

        switch($orientation)    {
            case \imagick::ORIENTATION_BOTTOMRIGHT:
                $image->rotateimage("#000", 180);
                break;
            case \imagick::ORIENTATION_RIGHTTOP:
                $image->rotateimage("#000", 90);
                break;
            case \imagick::ORIENTATION_LEFTBOTTOM:
                $image->rotateimage("#000", -90);
                break;
        }

        $image->setImageOrientation(\imagick::ORIENTATION_TOPLEFT);
}

    public function resizeCropFromCenter($finalW, $finalH, $srcFilePath){

        $finalWHRatio = $finalW/$finalH;
        $im = new \imagick($srcFilePath);
        $im -> setResolution(300, 300);
        $im -> setImageFormat('gif');

        $this->autoRotateImage($im);

        $geo = $im->getImageGeometry();
        $srcImgWidth = $geo['width'];
        $srcImgHeight = $geo['height'];
        $srcWHRatio = $srcImgWidth/$srcImgHeight;

        $resizedH = '';
        $redizedW = '';
        $redizedW = '';
        if($srcWHRatio > $finalWHRatio){
            $resizedH = $finalH;
            $resizedW = $srcWHRatio*$finalH;

            $im -> resizeImage($resizedW, $resizedH, \Imagick::FILTER_LANCZOS, 1);

            $x_crop = $resizedW/2 - ($finalW/2);
            $y_crop = 0;

            $im -> cropImage($finalW, $finalH, $x_crop, $y_crop);
            $im -> setImagePage($finalW, $finalH, 0, 0);
        }else{
            $resizedW = $finalH;
            $resizedH = $finalW/$srcWHRatio;

            $im -> resizeImage($resizedW, $resizedH, \Imagick::FILTER_LANCZOS, 1);

            $x_crop = 0;
            $y_crop = $resizedH/2 - ($finalH/2);

            $im -> cropImage($finalW, $finalH, $x_crop, $y_crop);
            $im -> setImagePage($finalW, $finalH, 0, 0);

        }

        return $im;
    }

    public function resize($finalW, $finalH, $srcFilePath){

        $finalWHRatio = $finalW/$finalH;
        $im = new \imagick($srcFilePath);
        $im -> setResolution(300, 300);
        $im -> setImageFormat('gif');

        $this->autoRotateImage($im);

        $geo = $im->getImageGeometry();
        $srcImgWidth = $geo['width'];
        $srcImgHeight = $geo['height'];
        $srcWHRatio = $srcImgWidth/$srcImgHeight;

        $resizedH = '';
        $redizedW = '';
        $redizedW = '';
        if($srcWHRatio > $finalWHRatio){
            $resizedH = $finalH;
            $resizedW = $srcWHRatio*$finalH;

            $im -> resizeImage($resizedW, $resizedH, \Imagick::FILTER_LANCZOS, 1);

            $x_crop = $resizedW/2 - ($finalW/2);
            $y_crop = 0;

            //$im -> cropImage($finalW, $finalH, $x_crop, $y_crop);
            //$im -> setImagePage($finalW, $finalH, 0, 0);
        }else{
            $resizedW = $finalH;
            $resizedH = $finalW/$srcWHRatio;

            $im -> resizeImage($resizedW, $resizedH, \Imagick::FILTER_LANCZOS, 1);

            $x_crop = 0;
            $y_crop = $resizedH/2 - ($finalH/2);

            //$im -> cropImage($finalW, $finalH, $x_crop, $y_crop);
            //$im -> setImagePage($finalW, $finalH, 0, 0);

        }

        return $im;
    }

}