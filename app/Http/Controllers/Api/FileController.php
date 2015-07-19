<?php

/**
 * @author: Tien Nguyen
 * @version: $Id: UploadFile.php,v 1.0 2015/06/25 16:44 htien Exp $
 */

namespace NhaThieuNhi\Http\Controllers\Api;

use Illuminate\Http\Request;
use Intervention\Image\Exception\NotReadableException;
use NhaThieuNhi\Http\Controllers\Controller;

class FileController extends Controller
{
    public function indexImage($name = NULL)
    {
        try {
            $img = \Image::make(public_path('uploads/' . ($name ?: '../assets/img/blank.gif')));
        }
        catch (NotReadableException $e) {
            return \Image::make(public_path('assets/img/blank.gif'))->response();
        }

        return $img->response();
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function storeImage(Request $request)
    {
        if (! $request->hasFile('file')) {
            return response()->json([
                'status'  => 0,
                'message' => 'No uploaded image.'
            ]);
        }

        $image = $request->file('file');

        if (! $image->isValid()) {
            return response()->json([
                'status'  => 2,
                'message' => 'Corrupted.'
            ]);
        }

        $extension    = $image->getClientOriginalExtension();
        $originalName = $image->getClientOriginalName();
        $imageName    = sha1(\Uuid::generate(1) . $originalName
                             . \Uuid::generate(5, $originalName, \Uuid::NS_DNS)
                             . \Uuid::generate(4))
                        . '.' . $extension;

        $link        = date('Y') . '-' . date('m');
        $destination = public_path() . '/uploads/' . $link;

        if (! file_exists($destination)) {
            mkdir($destination, 0777, TRUE);
        }

        $image->move($destination, $imageName);

        return response()->json([
            'status'  => 1,
            'message' => 'Uploaded OK.',
            'name'    => $link . '/' . $imageName,
            'link'    => 'image/' . $link . '/' . $imageName,
        ]);
    }
}