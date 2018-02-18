<?php
/**
 * Created by PhpStorm.
 * User: Elf
 * Date: 30/05/2017
 * Time: 22:29
 */

namespace app\Classes\ImageUploading;

use Illuminate\Support\Facades\File;

class ImageUploading
{

    /**
     * ImageUploading constructor.
     * @param $request
     */

    private $name;
    private $path;
    private $extension;
    private $change_name;
    private $request;


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    public function __construct($request = null, $path = null, $change_name = false)
    {

        $this->request = $request;
        if ($request != null) {
            $this->extension = $request->extension();
        }
        $this->path = $path;
        $this->change_name = $change_name;


    }

    public function setImage()
    {
        $ext = strtolower($this->extension);
        if ($ext == "jpeg" or $ext == "jpg" or $ext == "png") {
            if ($this->change_name) {
                $file_name = uniqid(rand(), true) . "." . $this->extension;
            } else {
                $file_name = $this->request->getClientOriginalName();
            }
            $this->name = $file_name;
            $this->request->move($this->path, $file_name);
            return (array("name_file" => $this->name, "status" => true));
        } else {
            return (array("name_file" => "", "status" => false));
        }
    }

    public function Edit_Image($old_img)
    {
        $ext = strtolower($this->extension);
        if ($ext == "jpeg" or $ext == "jpg" or $ext == "png") {
            if ($this->change_name) {
                $file_name = uniqid(rand(), true) . "." . $this->extension;
            } else {
                $file_name = $this->request->getClientOriginalName();
            }
            $this->name = $file_name;
            if ($old_img != null) {
                File::delete($old_img);
                $this->request->move($this->path, $file_name);

            } else {
                $this->request->move($this->path, $file_name);
            }
            return (array("name_file" => $this->name, "status" => true));
        } else {
            return (array("name_file" => "", "status" => false));
        }
    }

    public function delete_Image($path_img)
    {
        if ($path_img != null) {
            File::delete($path_img);
            return (array('status' => '350'));
        } elseif ($path_img == null) {
            return (array('status' => '350'));
        } else {
            return (array('status' => '300'));
        }

    }


}