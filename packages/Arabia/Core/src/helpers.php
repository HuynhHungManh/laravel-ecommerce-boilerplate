<?php
    if (! function_exists('validationResponse')) {
        function validationResponse($data)
        {
            $errorResponses = [];
            foreach ($data as $pointer => $errors) {
                if (is_array($errors)) {
                    foreach ($errors as $key => $error) {
                        $errorResponses[] = [
                            'detail' => $error,
                            'source' => [
                                'pointer' => $pointer
                            ]
                        ];
                    }
                }
            }

            return response()->json([
                'errors' => $errorResponses
            ], 400);
        }
    }
?>
