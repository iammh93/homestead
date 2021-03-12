<?php
namespace App\Http\GlobalHelper;

trait HttpResponseTrait {
    public function generateSuccessResponse($additional = [], $message = "", $status_code = 200) {
        $message = $message ?: __("general.success");
        $results = [
            "result" => [
                "statuscode" => "OK",
                "message" => $message
            ]
        ];
        $results = array_merge($results, $additional);
        return response()->json($results, $status_code);
    }

    public function generateErrorResponse($additional = [], $message = "Please check your entries and try again.", $status_code = 403) {
        $message = $message ?: __("general.error");
        $results = [
            "result" => [
                "statuscode" => "ERROR",
                "message" => $message
            ]
        ];
        $results = array_merge($results, $additional);
        return response()->json($results, $status_code);
    }

    public static function generateObjectList($objects, $include_select, $key_name = "key") {
        $lists = [];

        if ($include_select) {
            $default = [
                $key_name => 0,
                "value" => __("general.selector.please_select"),
                "show" => true
            ];
            array_push($lists, $default);
        }

        foreach($objects as $key => $object) {
            $list = [
                $key_name => $key,
                "value" => $object,
                "show" => true
            ];
            array_push($lists, $list);
        }
        return $lists;
    }
}
