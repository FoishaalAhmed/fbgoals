<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\{
    Visitor,
    Query
};

class ContactController extends Controller
{
    public function index()
    {
        (new Visitor())->storeVisitor();
        return view('front.contact');
    }

    public function query(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'required|string:max:15',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|',
        ]);

        $error_array = array();
        $success_output = '';

        if ($validation->fails()) {
            foreach ($validation->messages()->getMessages() as $field_name => $messages) {
                $error_array[] = $messages;
            }
        } else {
            (new Query())->storeQuery($request);
            $success_output = '<div class="alert alert-success"> Query Send Successfully! </div>';
        }

        $output = array(
            'error'   => $error_array,
            'success' => $success_output
        );

        echo json_encode($output);
    }
}
