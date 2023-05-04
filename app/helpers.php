<?php

if (! function_exists('get_asset')) {
    function get_asset($path) : string
    {
        return '/'.$path;
    }
}


function getAllSuccessMessages()
{
    $message = '';
    $success_messages = session()->get('success');
    if (is_array($success_messages)) {
        foreach ($success_messages as $success_message) {
            $message .= '<p>' . $success_message . '</p>';
        }
    } elseif (is_string($success_messages) && $success_messages) {
        $message .= '<p>' . $success_messages . '</p>';
    }

    return $message;
}

/**
 * getAllErrors : combine errors from validation and session
 *
 * @return string
 */
function getAllErrors($errors)
{
    $message = '';
    if ($errors->any()) {
        foreach ($errors->all() as $error) {
            $message .= '<p>' . $error . '</p>';
        }
    }

    $error_messages = session()->get('error');
    if ($error_messages) {
        if (is_array($error_messages)) {
            foreach ($error_messages as $error_message) {
                $message .= '<p>' . $error_message . '</p>';
            }
        } elseif (is_string($error_messages) && $error_messages) {
            $message .= '<p>' . $error_messages . '</p>';
        }
    }

    return $message;
}

function menu_item_is_active($urls,$seqment)
{
    $array_urls = explode(",",$urls);
    foreach ($array_urls as $url) {
       $active = Str::startsWith(
        $url,
        $seqment
    );
    if($active){
        return true;
    }
    }
    return false;
}

 function get_palns()
{
    return App\Models\Plan::where('type',9356)->orderby('from_year','desc')->pluck('from_year','id');
}

function get_by_parent($parent_id)
{
    return \App\Models\Code::GET_BY_PARENT($parent_id);
}

function mainResponse($status, $message, $data, $key, $validator,$code=200)
{
    try {
        $result['status'] = $status;

        $result['message'] = $message;

        if ($validator && $validator->fails()) {
            $errors = $validator->errors();
            $message = '';
            $result['message'] = $errors;
            return response()->json($result,422);
        } elseif (!is_null($data)) {

                $result[$key] = $data;
        }
        return response()->json($result,$code);
    } catch (Exception $ex) {
        return response()->json([
            'line'             => $ex->getLine(),
            'message'          => $ex->getMessage(),
            'getFile'          => $ex->getFile(),
            'getTrace'         => $ex->getTrace(),
            'getTraceAsString' => $ex->getTraceAsString(),
        ]);
    }

}

function change_key($array)
{
    $array = array_combine(
        array_map(function($k){ return 'P_'.$k; }, array_keys($array)),
        $array
    );
    return $array;
}

?>