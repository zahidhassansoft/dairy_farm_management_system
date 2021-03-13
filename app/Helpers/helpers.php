<?php
    function rowList($array,$arraykey)
    {

        return (($array->currentPage()-1) * $array->perPage() + $arraykey + 1);
    }

    function uploadFile($file,$request,$path='',$title='')
    {
        if($request->$file!=null)
        {
            $fileName = str_slug($title,'-').'-'.time() . '-' . $request->$file->getClientOriginalName();
            $request->$file->move(public_path($path), $fileName);
            return $path.$fileName;
        }
    }
    
    function make_slug($string) {
        return preg_replace('/\s+/u', '-', trim($string));
    }


