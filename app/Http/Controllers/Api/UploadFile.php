<?php

/**
 * @author: Tien Nguyen
 * @version: $Id: UploadFile.php,v 1.0 2015/06/25 16:44 htien Exp $
 */

namespace NhaThieuNhi\Http\Controllers\Api;

use Illuminate\Http\Request;
use NhaThieuNhi\Http\Controllers\Controller;
use Webpatser\Uuid\Uuid;

class UploadFile extends Controller
{
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
        $imageName    = sha1(Uuid::generate(1) . $originalName
                             . Uuid::generate(5, $originalName, Uuid::NS_DNS)
                             . Uuid::generate(4))
                        . '.' . $extension;

        $link = $request->getBaseUrl() . '/uploads/' . date('Y') . '-' . date('m');
        $destination = base_path() . (\App::environment('production') ?  '/../../public_html': '/..') . $link;
//        $link = 'uploads/' . date('Y') . '-' . date('m');
//        $destination = base_path() . '/public/' . $link;

        if (! file_exists($destination)) {
            mkdir($destination, 0777, TRUE);
        }

        $image->move($destination, $imageName);

        return response()->json([
            'status'  => 1,
            'message' => 'Uploaded successfully.',
            'link'    => $link . '/' . $imageName,
        ]);
    }
}