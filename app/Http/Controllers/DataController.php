<?php

namespace App\Http\Controllers;

use Hamcrest\Type\IsInteger;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function testing(Request $request) {
        $data = $this->convertToRoman($request->data);
        return response()->json([
            'data' => $data
        ]);
    }

    private function checkIfPalindrome(Request $request) {
        # remove non-alphanumeric from string
        $filter1 = preg_replace('/[\W]/', '', $request->data);
        # convert string to lowercase
        $string = strtolower($filter1);
        
        $isPalindrome = true;
        // convert string to array
        $arr = str_split($string);

        # loop through array until it is empty (for even) or only one item remains (for odd)
        while (count($arr) > 1) {
            # check if first and last indexes are the same
            if ($arr[0] === $arr[count($arr) - 1]) {
                # remove the first and last item from the array
                array_pop($arr);
                array_shift($arr);
            }
            else {
                $isPalindrome = false;
                break;
            }
        }

        return response()->json([
            'status' => $isPalindrome
        ]);

    }

    private function checkIfPrime($number) {
        if ($number == 1) {
            return false;
        }
        else {
            // only until half because it is the largest divisible factor
            for ($i = 2; $i <= $number/2; $i++) {
                if ($number % $i == 0) {
                    return false;
                }
            }

            return true;
        }
    }

    private function generateFibonacci($max) {
        $array = [];

        for ($i = 0; $i < $max; $i++) {
            $length = count($array);
            if ($length < 2) {
                array_push($array, $i);
            }
            else {
                array_push($array, $array[$length-1] + $array[$length-2]);
            }
        }

        return implode(",", $array);
    }

    private function convertToRoman($number) {
        $array = [
            1000 => 'M',
            900 => 'CM',
            500 => 'D',
            400 => 'CD',
            100 => 'C',
            90 => 'XC',
            50 => 'L',
            40 => 'XL',
            10 => 'X',
            9 => 'IX',
            5 => 'V',
            4 => 'IV',
            1 => 'I',
        ];
        $text = '';
        foreach($array as $key => $value) {
            while ($number >= $key) {
                $text .= $value;
                $number -= $key;
            }
        }

        return $text;
    }
}
